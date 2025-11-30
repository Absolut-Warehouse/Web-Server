<?php

namespace App\Models;

use Core\Model;

class WorksOn extends Model
{
    protected string $table = "works_on";
    protected string $primaryKey = ""; // table pivot → pas de clé simple

    protected array $fillable = [
        "terminal_id",
        "employee_id"
    ];

    /**
     * Retourne tous les terminaux assignés à un employé
     */
    public function getTerminalsForEmployee(int $employeeId): array
    {
        return $this->select('terminal.*')
            ->join('terminal', 'terminal.terminal_id', '=', 'works_on.terminal_id')
            ->where('works_on.employee_id', $employeeId)
            ->get();
    }


    /**
     * Retourne tous les employés affectés à un terminal
     */
    public function getEmployeesForTerminal(int $terminalId): array
    {
        return $this->query()
            ->select("employee.*, user.user_nom, user.user_prenom, user.email")
            ->join("employee", "employee.employee_id", "=", "works_on.employee_id")
            ->join("user", "user.email", "=", "employee.user_email")
            ->where("terminal_id", $terminalId)
            ->get();
    }

    /**
     * Assigner un terminal à un employé
     */
    public function assign(int $employeeId, int $terminalId): bool
    {
        return $this->create([
            "employee_id" => $employeeId,
            "terminal_id" => $terminalId
        ]);
    }

    /**
     * Retirer un employé d’un terminal
     */
    public function unassign(int $employeeId, int $terminalId): bool
    {
        return $this->query()
            ->where("employee_id", $employeeId)
            ->where("terminal_id", $terminalId)
            ->delete();
    }
}
