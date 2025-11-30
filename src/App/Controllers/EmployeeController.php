<?php

namespace App\Controllers;

use Core\Auth;
use Core\Lang;
use App\Models\Employee;
use App\Models\Package;
use App\Models\Terminal;
use App\Models\WorksOn;

class EmployeeController
{
    private function guard()
    {
        $user = Auth::user();
        if (!$user || !$user->isEmployee()) {
            redirect('/');
            exit;
        }
        return $user;
    }

    public function dashboard(): string
    {
        // 1. Authentification et Autorisation
        $user = $this->guard();

        // Si la route a un requireEmployee(), cette vérification est redondante
        // mais elle sert de filet de sécurité.
        if (!$user->isEmployee()) {
            redirect('/account'); // Redirection vers le compte standard si pas employé
            exit;
        }

        $lang = Lang::get();

        // 2. Récupération des informations de l'employé
        // Cette méthode dans votre modèle User doit joindre les tables user et employee.
        $employeeInfo = $user->employeeInfo();

        // Si l'utilisateur est marqué comme 'employee' mais n'a pas d'entrée dans la table 'employee'
        if (empty($employeeInfo) || !isset($employeeInfo['employee_id'])) {
            // Loggez l'erreur, et forcez une déconnexion ou une redirection
            error_log("Employé sans entrée 'employee' trouvée pour l'utilisateur: " . $user->getEmail());
            redirect('/logout');
            exit;
        }

        // 3. Récupération des terminaux assignés
        // La méthode getTerminalsForEmployee doit être implémentée dans votre modèle WorksOn.
        $terminals = (new WorksOn())
            ->getTerminalsForEmployee($employeeInfo['employee_id']);

        // 4. Préparation des données pour la vue
        $data = [
            "lang" => $lang,
            "user" => $user,
            "employee" => $employeeInfo, // Contient toutes les infos jointes (employee + user)
            "terminals" => $terminals,
            "page_title" => "Espace employé"
        ];

        return view("pages/employee_dashboard", $data);
    }

    // Exemple de ce que vous feriez dans votre EmployeeController.php

    public function packages()
    {
        $packageModel = new Package();

        // Paramètres de pagination
        $limit = 15;
        $page = (int) ($_GET['page'] ?? 1);
        if ($page < 1) $page = 1;
        $offset = ($page - 1) * $limit;

        // Paramètres de recherche et de tri
        $search = $_GET['q'] ?? '';
        $sort = $_GET['sort'] ?? 'item.item_entry_time';
        $dir = $_GET['dir'] ?? 'DESC';

        // 1. Récupérer le total (pour la navigation)
        $totalPackages = $packageModel->countAll($search);

        // 2. Récupérer les paquets paginés
        $packages = $packageModel->getAllWithItemAndSpace($search, $sort, $dir, $limit, $offset);

        $lang = Lang::get();

        $data = [
            "lang" => $lang,
            'packages' => $packages,
            'filters' => ['q' => $search, 'sort' => $sort, 'dir' => $dir],
            'pagination' => [
                "lang" => $lang,
                'total' => $totalPackages,
                'limit' => $limit,
                'currentPage' => $page,
                'totalPages' => ceil($totalPackages / $limit)
            ]
        ];

        return view("pages/package_employee", $data);
    }

    public function employees(): string
    {
        $user = $this->guard();

        if (!$user->isManager()) {
            redirect('/dashboard');
            exit;
        }

        $lang = Lang::get();

        $employees = (new Employee())->getAllWithUserInfo();

        $data = [
            "lang" => $lang,
            "employees" => $employees,
            "page_title" => "Gestion des employés"
        ];

        return view("pages/employee_manager", $data);
    }


    public function edit()
    {
        $user = $this->guard();

        if (!$user->isManager()) {
            redirect('/dashboard');
            exit;
        }

        // 1. Récupération de l'ID via GET
        $employeeId = (int) ($_GET['id'] ?? 0);

        if ($employeeId === 0) {
            // Rediriger si l'ID est manquant ou invalide
            redirect('/employee');
            exit;
        }

        $lang = Lang::get();
        $employeeModel = new \App\Models\Employee();

        // 2. Récupérer l'employé et ses infos utilisateur
        $employee = $employeeModel->getEmployeeDetails($employeeId);

        if (!$employee) {
            http_response_code(404);
            redirect('/employees');
            exit;
        }

        $data = [
            "lang" => $lang,
            "employee" => $employee, // Contient l'objet/tableau de l'employé
            "page_title" => "Modification de l'employé #" . $employeeId
        ];

        // 3. Afficher le formulaire de modification (que nous créerons ensuite)
        return view("pages/employee_edit", $data);
    }


    public function update()
    {
        $user = $this->guard();

        if (!$user->isManager()) {
            redirect('/dashboard');
            exit;
        }

        // 1. Récupération et validation des données du formulaire POST
        $employeeId = (int) ($_POST['employee_id'] ?? 0);
        $position   = $_POST['position'] ?? null;
        $hireDate   = $_POST['hire_date'] ?? null;
        $sexe       = $_POST['sexe'] ?? null;
        // On récupère l'email original (clé de jointure pour mettre à jour la table 'user')
        $originalEmail = $_POST['user_email'] ?? null;

        // Validation minimale
        if ($employeeId === 0 || empty($position) || empty($hireDate) || empty($originalEmail)) {
            // Loggez l'erreur et redirigez avec un message si possible
            redirect('/employee/edit/' . $employeeId . '?error=missing_fields');
            exit;
        }

        $employeeModel = new \App\Models\Employee();

        // 2. Préparation des données pour la mise à jour
        $employeeData = [
            'position' => $position,
            'hire_date' => $hireDate,
        ];

        $userData = [
            'sexe' => $sexe
        ];

        // 3. Appel de la méthode de mise à jour dans le modèle
        // (Cette méthode de modèle devra gérer la mise à jour sur les deux tables: employee et user)
        $success = $employeeModel->updateEmployeeDetails($employeeId, $employeeData, $originalEmail, $userData);

        if ($success) {
            redirect('/manage?success=update_ok');
        } else {
            redirect('/employee/edit/' . $employeeId . '?error=update_failed');
        }
        exit;
    }

    /**
     * Traite la requête POST pour supprimer un employé et son compte utilisateur.
     */
    public function delete()
    {
        $user = $this->guard();

        if (!$user->isManager()) {
            redirect('/dashboard');
            exit;
        }

        // 1. Récupération de l'ID à supprimer
        $employeeId = (int) ($_POST['employee_id'] ?? 0);

        if ($employeeId === 0) {
            redirect('/employees?error=invalid_id');
            exit;
        }

        $employeeModel = new \App\Models\Employee();

        // 2. Appel de la méthode de suppression dans le modèle
        // (Si la clé étrangère est configurée avec ON DELETE CASCADE, seule la suppression de l'employé est nécessaire.)
        $success = $employeeModel->deleteEmployee($employeeId);

        if ($success) {
            redirect('/manage?success=delete_ok');
        } else {
            redirect('/employee/edit/' . $employeeId . '?error=delete_failed');
        }
        exit;
    }



    /**
     * Affiche le formulaire pour créer un nouvel employé.
     */
    public function createForm(): string
    {
        $user = $this->guard();

        if (!$user->isManager()) {
            redirect('/dashboard');
            exit;
        }

        $lang = Lang::get();

        // Définitions pour les listes déroulantes de la vue (à passer à la vue)
        $positions = ['Gestionnaire', 'Répartiteur', 'Livreur'];
        $sexes = ['H', 'F', 'N'];

        $data = [
            "lang" => $lang,
            "page_title" => "Ajouter un nouvel employé",
            "positions" => $positions,
            "sexes" => $sexes,
            "employee" => []
        ];

        return view("pages/employee_create", $data); // Assurez-vous de créer cette vue !
    }

// ---

    /**
     * Traite la requête POST pour créer un nouvel utilisateur (table 'user')
     * et un nouvel employé (table 'employee').
     */
    public function create()
    {
        $user = $this->guard();

        if (!$user->isManager()) {
            redirect('/dashboard');
            exit;
        }

        // 1. Récupération des données POST
        $data = [
            'email' => $_POST['email'] ?? null,
            'position' => $_POST['position'] ?? null,
            'hire_date' => $_POST['hire_date'] ?? null,
        ];

        // Validation minimale
        if (empty($data['email']) || empty($data['position']) || empty($data['hire_date'])) {
            redirect('/employee/create?error=' . urlencode('Tous les champs requis doivent être remplis.'));
            exit;
        }

        $employeeModel = new \App\Models\Employee();
        $userModel = new \App\Models\User();

        // 2. Démarrer la transaction
        if (!$employeeModel->beginTransaction()) {
            // Erreur critique de base de données (ex: connexion perdue)
            redirect('/employee/create?error=' . urlencode('Erreur critique de base de données lors du démarrage de la transaction.'));
            exit;
        }

        try {
            // --- A. VÉRIFICATION DE L'UTILISATEUR ---

            // 1. Vérifier si l'utilisateur existe dans la table 'user'
            $existingUser = $userModel->findByEmailNormalized($data['email']);

            if (!$existingUser) {
                $errorMsg = "L'utilisateur avec l'email '{$data['email']}' n'existe pas.";
                $employeeModel->rollBack(); // Annulation de la transaction (même si rien n'a été fait)
                redirect('/employee/create?error=' . urlencode($errorMsg));
                exit;
            }

            // 2. Vérifier s'il est déjà un employé
            $isAlreadyEmployee = $employeeModel->where('user_email', $data['email'])->exists();

            if ($isAlreadyEmployee) {
                // Remplacer throw par une redirection immédiate
                $errorMsg = "Cet utilisateur est déjà enregistré comme employé.";
                $employeeModel->rollBack();
                redirect('/employee/create?error=' . urlencode($errorMsg));
                exit;
            }

            // --- B. CRÉATION DE L'ENTRÉE EMPLOYÉ ---
            $employeeData = [
                'user_email' => $data['email'],
                'position' => $data['position'],
                'hire_date' => $data['hire_date'],
            ];

            $employeeId = $employeeModel->create($employeeData);

            if (!$employeeId) {
                throw new \Exception("Échec de l'insertion dans la table employé. La base de données n'a pas retourné d'ID.");
            }

            // --- C. MISE À JOUR DU RÔLE UTILISATEUR ---
            $roleUpdated = $userModel->updateByEmail($data['email'], ['role' => 'employee']);

            if (!$roleUpdated) {
                throw new \Exception("Échec de la mise à jour du rôle utilisateur à 'employee'.");
            }

            // 3. Valider la transaction si tout est OK
            $employeeModel->commit();
            redirect('/manage?success=' . urlencode("L'employé #{$employeeId} a été créé et le rôle mis à jour."));
            // L'utilisation de `urlencode` pour les messages de succès est aussi recommandée

        } catch (\Exception $e) {
            // 4. Bloc de sécurité (Erreurs imprévues: clé unique violée, erreur SQL, etc.)
            $employeeModel->rollBack();
            error_log("EMPLOYEE CREATE UNEXPECTED ERROR: " . $e->getMessage());

            // Message d'erreur générique ou spécifique pour le débogage (moins d'infos à l'utilisateur final)
            $userErrorMsg = "Une erreur inattendue est survenue : " . $e->getMessage();
            redirect('/employee/create?error=' . urlencode($userErrorMsg));
        }
        exit;
    }


}
