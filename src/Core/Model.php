<?php
namespace Core;

use PDO;

abstract class Model
{
    protected string $table;
    protected array $fillable = [];
    protected PDO $db;
    protected string $primaryKey = 'id';

    // Query builder state
    protected array $wheres = [];
    protected array $bindings = [];
    protected ?int $limit = null;
    protected ?int $offset = null;
    protected ?string $orderBy = null;
    protected array $selects = ['*'];

    public function __construct()
    {
        $this->db = Database::getConnection();

        if (empty($this->table)) {
            $class = (new \ReflectionClass($this))->getShortName();
            $this->table = strtolower($class) . 's'; //Exemple le Model : User -> users
        }
    }


    /**
     * Permet de faire des appels du type :
     *
     * $user = User::query()   <------------- Au lieu de (new User()) à chaque requêtes.
     * ->where('email', 'bob@mail.com')
     * ->first();
     * @return self
     */
    public static function query(): self
    {
        return new static();
    }

    /* ----------------- Helpers ----------------- */

    /**
     * Quote un identifiant (table/colonne) pour PostgreSQL
     * gère l'échappement des doubles quotes internes.
     */
    protected function quoteIdentifier(string $identifier): string
    {
        // Si c'est un alias "table.column" on quote chaque partie
        if (strpos($identifier, '.') !== false) {
            return implode('.', array_map(fn($p) => '"' . str_replace('"', '""', $p) . '"', explode('.', $identifier)));
        }
        return '"' . str_replace('"', '""', $identifier) . '"';
    }

    protected function resetQuery(): void
    {
        $this->wheres = [];
        $this->bindings = [];
        $this->limit = null;
        $this->offset = null;
        $this->orderBy = null;
        $this->selects = ['*'];
    }

    /* ----------------- Query builder chainable ----------------- */

    /**
     * where('col','op', value) or where('col', value)
     */
    public function where(string $column, $operatorOrValue, $value = null): self
    {
        if ($value === null) {
            $value = $operatorOrValue;
            $operatorOrValue = '=';
        }

        $operator = strtoupper(trim($operatorOrValue));
        $param = ':w' . count($this->bindings);
        $this->wheres[] = sprintf('%s %s %s', $this->quoteIdentifier($column), $operator, $param);
        $this->bindings[$param] = $value;
        return $this;
    }

    /**
     * orWhere('col', val) or orWhere('col','op',val)
     */
    public function orWhere(string $column, $operatorOrValue, $value = null): self
    {
        if ($value === null) {
            $value = $operatorOrValue;
            $operatorOrValue = '=';
        }

        $operator = strtoupper(trim($operatorOrValue));
        $param = ':w' . count($this->bindings);
        if (empty($this->wheres)) {
            $this->wheres[] = sprintf('%s %s %s', $this->quoteIdentifier($column), $operator, $param);
        } else {
            // on préfixe la condition par OR (stockée en tant que clause distincte)
            $last = array_pop($this->wheres);
            $combined = '(' . $last . ' OR ' . sprintf('%s %s %s', $this->quoteIdentifier($column), $operator, $param) . ')';
            $this->wheres[] = $combined;
        }
        $this->bindings[$param] = $value;
        return $this;
    }

    public function orderBy(string $column, string $direction = 'ASC'): self
    {
        $dir = strtoupper($direction) === 'DESC' ? 'DESC' : 'ASC';
        $this->orderBy = $this->quoteIdentifier($column) . ' ' . $dir;
        return $this;
    }

    public function limit(int $limit): self
    {
        $this->limit = $limit;
        return $this;
    }

    public function offset(int $offset): self
    {
        $this->offset = $offset;
        return $this;
    }

    /**
     * select('id','name') ou select(['id','name'])
     */
    public function select(...$columns): self
    {
        if (count($columns) === 1 && is_array($columns[0])) {
            $columns = $columns[0];
        }
        $this->selects = array_map(fn($c) => $c === '*' ? '*' : $this->quoteIdentifier($c), $columns);
        return $this;
    }

    /* ----------------- Execution ----------------- */

    protected function buildSelectSql(): string
    {
        $sql = 'SELECT ' . implode(', ', $this->selects) . ' FROM ' . $this->quoteIdentifier($this->table);

        if (!empty($this->wheres)) {
            $sql .= ' WHERE ' . implode(' AND ', $this->wheres);
        }

        if (!empty($this->orderBy)) {
            $sql .= ' ORDER BY ' . $this->orderBy;
        }

        if ($this->limit !== null) {
            $sql .= ' LIMIT ' . (int)$this->limit;
        }

        if ($this->offset !== null) {
            $sql .= ' OFFSET ' . (int)$this->offset;
        }

        return $sql;
    }

    public function get(): array
    {
        $sql = $this->buildSelectSql();
        $stmt = $this->db->prepare($sql);
        foreach ($this->bindings as $param => $val) {
            $stmt->bindValue($param, $val);
        }
        $stmt->execute();
        $results = $stmt->fetchAll();
        $this->resetQuery();
        return $results;
    }

    public function first(): ?array
    {
        $this->limit(1);
        $rows = $this->get();
        return $rows[0] ?? null;
    }

    /* ----------------- CRUD ----------------- */

    public function all(): array
    {
        // simple select *
        $stmt = $this->db->query('SELECT * FROM ' . $this->quoteIdentifier($this->table));
        return $stmt->fetchAll();
    }

    public function find(int $id): ?array
    {
        $primaryKey = $this->primaryKey ?? 'id';
        $result = $this->where($primaryKey, $id)->first();
        return $result ?: null;
    }

    /**
     * create() utilise INSERT ... RETURNING id pour PG
     * $fillable doit contenir les colonnes autorisées.
     *
     * @return int id inséré
     */
    public function create(array $data): int
    {
        $data = array_intersect_key($data, array_flip($this->fillable));
        if (empty($data)) {
            throw new \InvalidArgumentException('Aucune donnée valide fournie pour create()');
        }

        $cols = array_keys($data);
        $placeholders = [];
        $values = array_values($data);

        foreach ($cols as $i => $col) {
            $placeholders[] = ':p' . $i;
        }

        $sql = sprintf(
            'INSERT INTO %s (%s) VALUES (%s) RETURNING %s',
            $this->quoteIdentifier($this->table),
            implode(', ', array_map([$this, 'quoteIdentifier'], $cols)),
            implode(', ', $placeholders),
            $this->quoteIdentifier($this->primaryKey)
        );

        $stmt = $this->db->prepare($sql);

        // binder en utilisant $placeholders et $values
        foreach ($placeholders as $i => $placeholder) {
            $stmt->bindValue($placeholder, $values[$i]);
        }

        $stmt->execute();
        return (int)$stmt->fetchColumn();
    }


    /**
     * update par id (utilise $fillable)
     */
    public function update(int $id, array $data, ?string $primaryKey = null): bool
    {
        // Si aucun nom de clé primaire n’est fourni, on utilise celle du modèle (ou 'id' par défaut)
        $primaryKey = $primaryKey ?? ($this->primaryKey ?? 'id');

        // Filtrer uniquement les colonnes autorisées
        $data = array_intersect_key($data, array_flip($this->fillable));
        if (empty($data)) {
            return false;
        }

        // Construire la requête SQL dynamiquement
        $sets = [];
        $params = [];
        $i = 0;

        foreach ($data as $col => $val) {
            $param = ':u' . $i++;
            $sets[] = $this->quoteIdentifier($col) . ' = ' . $param;
            $params[$param] = $val;
        }

        $sql = sprintf(
            'UPDATE %s SET %s WHERE %s = :id',
            $this->quoteIdentifier($this->table),
            implode(', ', $sets),
            $this->quoteIdentifier($primaryKey)
        );

        $stmt = $this->db->prepare($sql);

        // Lier toutes les valeurs
        foreach ($params as $p => $v) {
            $stmt->bindValue($p, $v);
        }

        $stmt->bindValue(':id', $id, PDO::PARAM_INT);

        return $stmt->execute();
    }



    /**
     * Supprime les lignes correspondant à la requête courante
     * Exemple :
     *   (new User())->where('name', 'bob')->delete();
     */
    public function delete(): int
    {
        if (empty($this->wheres)) {
            throw new \RuntimeException("delete() sans where() est interdit (sécurité)");
        }

        $sql = 'DELETE FROM ' . $this->quoteIdentifier($this->table)
            . ' WHERE ' . implode(' AND ', $this->wheres);

        $stmt = $this->db->prepare($sql);
        foreach ($this->bindings as $param => $val) {
            $stmt->bindValue($param, $val);
        }

        $stmt->execute();
        $count = $stmt->rowCount();

        $this->resetQuery(); // pour éviter les fuites de bindings
        return $count;
    }

    /* ----------------- Transactions ----------------- */

    public function beginTransaction(): bool { return $this->db->beginTransaction(); }
    public function commit(): bool { return $this->db->commit(); }
    public function rollBack(): bool { return $this->db->rollBack(); }

    public function exists(): bool
    {
        $sql = 'SELECT 1 FROM ' . $this->quoteIdentifier($this->table);

        if (!empty($this->wheres)) {
            $sql .= ' WHERE ' . implode(' AND ', $this->wheres);
        }

        $sql .= ' LIMIT 1';

        $stmt = $this->db->prepare($sql);
        foreach ($this->bindings as $param => $val) {
            $stmt->bindValue($param, $val);
        }
        $stmt->execute();
        $this->resetQuery();
        return $stmt->fetch() !== false;
    }

    public function count(): int
    {
        $sql = 'SELECT COUNT(*) FROM ' . $this->quoteIdentifier($this->table);

        if (!empty($this->wheres)) {
            $sql .= ' WHERE ' . implode(' AND ', $this->wheres);
        }

        $stmt = $this->db->prepare($sql);
        foreach ($this->bindings as $param => $val) {
            $stmt->bindValue($param, $val);
        }
        $stmt->execute();
        $this->resetQuery();
        return (int)$stmt->fetchColumn();
    }


    public function hasMany(string $relatedModel, string $foreignKey, ?string $localKey = null): array
    {
        $localKey = $localKey ?? $this->primaryKey;
        $relatedInstance = new $relatedModel();
        return $relatedInstance->where($foreignKey, $this->$localKey)->get();
    }

    public function belongsTo(string $relatedClass, string $foreignKey, ?string $ownerKey = null): ?array
    {
        $ownerKey = $ownerKey ?? (new $relatedClass())->primaryKey;
        $foreignId = $this->$foreignKey ?? null;
        if ($foreignId === null) return null;
        $related = new $relatedClass();
        return $related->where($ownerKey, $foreignId)->first();
    }

    public function paginate(int $perPage = 10, int $page = 1): array
    {
        $offset = ($page - 1) * $perPage;
        $this->limit($perPage)->offset($offset);
        $data = $this->get();
        $total = $this->count();

        return [
            'data' => $data,
            'total' => $total,
            'per_page' => $perPage,
            'current_page' => $page,
            'last_page' => ceil($total / $perPage),
        ];
    }


}
