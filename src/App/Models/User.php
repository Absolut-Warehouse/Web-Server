<?php
namespace App\Models;

use Core\Model;

class User extends Model
{
    protected string $table = 'user';
    protected string $primaryKey = 'user_id';
    protected array $fillable = ["user_nom", "user_prenom", "password", "email", "user_phone_number", "sexe"];

    public function address(): ?array
    {
        return (new Address())->where('user_id', $this->id)->first();
    }

    public function getEmail(): string
    {
        return $this->email;
    }

    public function getFullName(): string
    {
        return $this->user_prenom . ' ' . $this->user_nom;
    }

    public function packagesSent(): array
    {
        return (new Package())->where('sender_id', $this->id)->get();
    }

    public function packagesReceived(): array
    {
        return (new Package())->where('recipient_id', $this->id)->get();
    }

    /**
     * Vérifie si l'utilisateur est un employé
     */
    public function isEmployee(): bool
    {
        $employee = (new Employee())->where('user_email', $this->email)->first();
        return !empty($employee);
    }

    /**
     * Récupère les infos de l'employé si l'utilisateur est employé
     */
    public function employeeInfo(): ?array
    {
        return (new Employee())->where('user_email', $this->email)->first();
    }

    /**
     * Vérifie si l'utilisateur est Gestionnaire (Manager)
     */
    public function isManager(): bool
    {
        $employee = (new Employee())
            ->where('user_email', $this->email)
            ->where('position', 'Gestionnaire')
            ->first();

        return !empty($employee);
    }


    public function isAdmin(): bool
    {
        $employee = (new Employee())
            ->where('user_email', $this->email)
            ->where('position', 'Gestionnaire')
            ->first();

        return !empty($employee);
    }


    public function updateByEmail(string $email, array $data): bool
    {
        // 1. Filtrer les données (s'assurer que seules les colonnes fillable sont incluses)
        $data = array_intersect_key($data, array_flip($this->fillable));
        if (empty($data)) {
            return true; // Aucune donnée à mettre à jour, on considère que c'est un succès
        }

        // 2. Construire la clause SET et les paramètres
        $sets = [];
        $params = [];
        $i = 0;

        foreach ($data as $col => $val) {
            $param = ':u' . $i++;
            // Utilise la méthode quoteIdentifier du Core\Model pour les noms de colonnes
            $sets[] = $this->quoteIdentifier($col) . ' = ' . $param;
            $params[$param] = $val;
        }

        // 3. Construction de la requête SQL (UPDATE)
        $sql = sprintf(
            'UPDATE %s SET %s WHERE %s = :email_val',
            $this->quoteIdentifier($this->table),
            implode(', ', $sets),
            $this->quoteIdentifier('email') // La colonne WHERE
        );

        $stmt = $this->db->prepare($sql);

        // 4. Lier les valeurs SET
        foreach ($params as $p => $v) {
            $stmt->bindValue($p, $v);
        }

        // 5. Lier l'email de référence
        $stmt->bindValue(':email_val', $email);

        // 6. Exécuter la requête
        return $stmt->execute();
    }

    public function findByEmailNormalized(string $email): ?array
    {
        // Normaliser l'email de recherche
        $normalizedEmail = strtolower(trim($email));

        // Utiliser une requête SQL brute si le Query Builder n'est pas assez flexible
        $sql = 'SELECT * FROM "user" WHERE LOWER(TRIM(email)) = :email LIMIT 1';

        $stmt = $this->db->prepare($sql);
        $stmt->bindValue(':email', $normalizedEmail);
        $stmt->execute();

        $result = $stmt->fetch(\PDO::FETCH_ASSOC);
        return $result ?: null;
    }

}