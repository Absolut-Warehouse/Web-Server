<?php
namespace App\Models;

use Core\Model;

class Employee extends Model
{
    protected string $table = 'employee';
    protected string $primaryKey = 'employee_id';

    // Correction : user_id n'existe pas dans ta table employee, c'est user_email
    protected array $fillable = [
        'position',
        'hire_date',
        'user_email'
    ];

    /**
     * Relation vers User
     * Attention : Le lien se fait via 'email' et non 'id' selon ton schéma SQL
     */
    public function user(): ?array
    {
        // On doit spécifier les clés car ce ne sont pas les standards id/user_id
        // belongsTo(Classe, FK_actuelle, PK_autre_table)
        return $this->belongsTo(User::class, 'user_email', 'email');
    }

    // Dans App\Models\Employee.php

    public function getAllWithUserInfo(): array
    {
        $query = $this->query()
            ->select([
                'employee.employee_id',
                'employee.position',
                'employee.hire_date',
                'user.user_nom',
                'user.user_prenom',
                'user.email',
                'user.user_phone_number',
                'user_activity.last_action',
            ])
            ->join('user', 'employee.user_email', '=', 'user.email', 'INNER')
            ->join('user_activity', 'user.user_id', '=', 'user_activity.user_id', 'LEFT');

        return $query->get();
    }


    // Dans App\Models\Employee.php

    // Dans App\Models\Employee.php

    public function getEmployeeDetails(int $employeeId): ?array
    {
        $query = $this->query()
            // 1. Sélectionner toutes les colonnes nécessaires (similaire à getAllWithUserInfo)
            ->select([
                'employee.employee_id',
                'employee.position',
                'employee.hire_date',
                'user.user_nom',
                'user.user_prenom',
                'user.email',
                'user.user_phone_number',
                'user.sexe', // Ajout du sexe
                'user_activity.last_action',
            ])

            // 2. Joindre les tables nécessaires
            ->join('user', 'employee.user_email', '=', 'user.email', 'INNER')
            ->join('user_activity', 'user.user_id', '=', 'user_activity.user_id', 'LEFT')

            // 3. Filtrer par l'ID de l'employé (le changement crucial)
            ->where('employee.employee_id', '=', $employeeId);

        $result = $query->first();

        return $result ?: null; // Retourne l'employé trouvé ou null
    }

    public function deleteEmployee(int $employeeId): bool
    {
        $rowsAffected = $this->query()
            ->where('employee_id', '=', $employeeId)
            ->delete();
        return $rowsAffected > 0;
    }


    /**
     * Met à jour les détails de l'employé (table 'employee') et les détails de l'utilisateur (table 'user')
     * dans une transaction unique.
     */
    public function updateEmployeeDetails(int $employeeId, array $employeeData, string $userEmail, array $userData): bool
    {
        // 1. Démarrer la transaction
        if (!$this->beginTransaction()) {
            return false;
        }

        try {
            // --- Mise à jour de la table 'employee' ---
            // Le Core\Model::update utilise $this->primaryKey (employee_id)
            $employeeUpdated = $this->update($employeeId, $employeeData, 'employee_id');

            if (!$employeeUpdated) {
                // Si la mise à jour de l'employé échoue ou n'affecte aucune ligne
                $this->rollBack();
                return false;
            }

            $userModel = new User();

            $userUpdated = $userModel->updateByEmail($userEmail, $userData);


            if (!$userUpdated) {
                // Si la mise à jour de l'utilisateur échoue
                $this->rollBack();
                return false;
            }

            // 2. Si les deux mises à jour réussissent, valider la transaction
            $this->commit();
            return true;

        } catch (\Exception $e) {
            // 3. En cas d'exception, annuler la transaction
            $this->rollBack();
            // Loggez l'erreur $e->getMessage()
            return false;
        }
    }

}