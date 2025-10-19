<?php

namespace App\Controllers;

use App\Models\Address;
use App\Models\User;
use App\Models\UserActivity;
use Core\Auth;
use Core\Lang;
use Exception;
use Random\RandomException;
require_once BASE_PATH . '/Core/helpers.php';

class AccountController
{
    /**
     * @throws Exception
     */
    public function signin(): false|string
    {
        $lang = Lang::get();
        $content = [];
        $data =  ["lang" => $lang, "content" => $content];
        return view('pages/signin', $data);
    }

    /**
     * @throws Exception
     */
    public function signup(): false|string
    {
        $lang = Lang::get();
        $content = [];
        $data =  ["lang" => $lang, "content" => $content];
        return view('pages/signup', $data);
    }

    /**
     * @throws RandomException
     */
    public function signinQuery(): void
    {
        $lang = Lang::get();
        $email = trim($_POST['email'] ?? '');
        $password = $_POST['password'] ?? '';

        if (!$email || !$password) {
            flash('error', $lang["error"]["content"]["missing_fields"]);
            redirect('/signin');
        }

        $user = User::query()->where('email', $email)->first();


        //Vérification hashé
        if (!$user || !password_verify($password, $user['password'])) {
            flash('error', $lang["error"]["content"]["bad_information"]);
            redirect('/signin');
        }

        //        Depreciate, était valide quand nos mot de passe étaient en clair.
        //        if (!$user || !$password==$user['password']) {
        //            flash('error', $lang["error"]["content"]["bad_information"]);
        //            redirect('/signin');
        //        }

        // Connexion réussie
        Auth::login($user);
        redirect('/'); // redirection vers la page d'accueil
    }

    /**
     * @throws RandomException
     */
    public function signupQuery(): void
    {
        $lang = Lang::get();

        // Récupération et nettoyage des champs
        $nom = trim($_POST['name'] ?? '');
        $prenom = trim($_POST['surname'] ?? '');
        $email = trim($_POST['email'] ?? '');
        $password = $_POST['password'] ?? '';
        $password2 = $_POST['password2'] ?? '';

        // Vérification des champs obligatoires
        if (!$nom || !$prenom || !$email || !$password || !$password2) {
            flash('error', $lang["error"]["content"]["missing_fields"]);
            redirect('/signup');
        }

        // Vérification que les deux mots de passe sont identiques
        if ($password !== $password2) {
            flash('error', $lang["error"]["content"]["passwords_not_match"]);
            redirect('/signup');
        }

        // Vérification de la longueur minimale du mot de passe
        if (strlen($password) < 6) {
            flash('error', $lang["error"]["content"]["password_too_short"]);
            redirect('/signup');
        }

        // Vérifie que l'utilisateur n'existe pas déjà
        if (User::query()->where('email', $email)->exists()) {
            flash('error', $lang["error"]["content"]["already_used_mail"]);
            redirect('/signup');
        }

        // Crée le nouvel utilisateur
        $userModel = new User();
        $userId = $userModel->create([
            'user_nom' => $nom,
            'user_prenom' => $prenom,
            'email' => $email,
            'password' => password_hash($password, PASSWORD_DEFAULT),
        ]);

        error_log("User model :" . $userId);

        // Génération du session_token
        $sessionToken = generateUuid32();

        // Création automatique de la ligne dans user_activity
        $userActivityModel = new UserActivity();
        $activity_id = $userActivityModel->create([
            'user_id' => $userId,
            'created_at' => date('Y-m-d H:i:s'),
            'last_login' => date('Y-m-d H:i:s'),
            'last_action' => date('Y-m-d H:i:s'),
            'session_token' => $sessionToken
        ]);

        error_log("User activity :" . $activity_id);

        // Récupère l'utilisateur créé
        $user = $userModel->find($userId);

        // Connexion automatique après inscription
        Auth::login($user);

        redirect('/'); // Redirection vers l'accueil
    }


    public function home() {
        $lang = Lang::get();

        // Récupère l'utilisateur connecté
        $user = Auth::user(); // retourne un tableau ou null

        $addressModel = new Address();
        $address = null;

        $address = null;
        if ($user) {
            $address = $addressModel->where('user_email', $user['email'])->first();
        }

        $content = [
            'user_nom' => $user['user_nom'] ?? '',
            'user_prenom' => $user['user_prenom'] ?? '',
            'email' => $user['email'] ?? '',
            'user_phone_number' => $user['user_phone_number'] ?? '',
            'sexe' => $user['sexe'] ?? '',
            'address' => $address ? ($address['street_number'] . ' ' . $address['street']) : 'Non définie',
            'address_line1' => $address['street'] ?? '',
            'address_line2' => $address['complementary'] ?? '',
            'city' => $address['city'] ?? '',
            'postal_code' => $address['postal_code'] ?? '',
            'country' => $address['country'] ?? ''
        ];

        $data = ["lang" => $lang, "content" => $content];

        return view('pages/account', $data);
    }




    public function logout(): void {
        Auth::logout();
        redirect('/');
    }

    /**
     * @throws RandomException
     */
    function generateUuid32(): string
    {
        $data = random_bytes(16);

        // version 4 UUID
        $data[6] = chr((ord($data[6]) & 0x0f) | 0x40);
        $data[8] = chr((ord($data[8]) & 0x3f) | 0x80);

        return bin2hex($data); // 32 caractères hexadécimaux
    }


    /**
     * Met à jour les informations du profil utilisateur
     */
    public function updateProfile(): void
    {
        $user = Auth::user();
        if (!$user) {
            redirect('/signin');
            exit;
        }

        $userModel = new User();
        $errors = []; // tableau pour accumuler les erreurs

        // Récupération et nettoyage des champs
        $fields = [
            'user_nom' => trim($_POST['user_nom'] ?? ''),
            'user_prenom' => trim($_POST['user_prenom'] ?? ''),
            'user_phone_number' => trim($_POST['user_phone_number'] ?? null),
            'sexe' => trim($_POST['sexe'] ?? null)
        ];

        // Transforme les champs vides en NULL
        $fields['sexe'] = $fields['sexe'] ?: null;
        $fields['user_phone_number'] = $fields['user_phone_number'] ?: null;

        // Validation nom/prénom
        if (strlen($fields['user_nom']) < 2) {
            $errors[] = "Le nom doit contenir au moins 2 caractères.";
        }
        if (strlen($fields['user_prenom']) < 2) {
            $errors[] = "Le prénom doit contenir au moins 2 caractères.";
        }

        // Validation téléphone
        if (!empty($fields['user_phone_number']) && !preg_match('/^\+?[0-9]{6,14}$/', $fields['user_phone_number'])) {
            $errors[] = "Numéro de téléphone invalide.";
        }

        // Validation sexe (si nécessaire)
        $validSexes = ['H', 'F', 'O', null];
        if (!in_array($fields['sexe'], $validSexes, true)) {
            $errors[] = "Valeur du sexe invalide.";
        }

        // Si erreurs, on stocke et on redirige
        if (!empty($errors)) {
            $_SESSION['error'] = implode('<br>', $errors);
            redirect('/account');
            exit;
        }

        // Mise à jour
        try {
            $userModel->update($user['user_id'], $fields);
            $_SESSION['success'] = "Profil mis à jour avec succès.";
        } catch (\PDOException $e) {
            // Gestion des erreurs SQL
            $_SESSION['error'] = "Une erreur est survenue lors de la mise à jour du profil : " . $e->getMessage();
        }

        redirect('/account');
    }



    /**
     * Met à jour ou crée l’adresse de l’utilisateur
     */
    public function updateAddress(): void
    {
        $user = Auth::user();
        if (!$user) {
            redirect('/signin');
            exit;
        }

        $addressModel = new Address();
        $fields = [
            'country' => trim($_POST['country'] ?? ''),
            'postal_code' => trim($_POST['postal_code'] ?? ''),
            'city' => trim($_POST['city'] ?? ''),
            'street' => trim($_POST['address_line1'] ?? ''),
            'complementary' => trim($_POST['address_line2'] ?? ''),
            'street_number' => '1',
            'user_email' => $user['email']
        ];

        // Validation basique
        if (empty($fields['country']) || empty($fields['postal_code']) || empty($fields['city'])) {
            $_SESSION['error'] = "Veuillez remplir tous les champs obligatoires de l’adresse.";
            redirect('/account');
            exit;
        }

        // Vérifier si l'adresse existe déjà
        $existing = $addressModel->query()
            ->where('user_email', $user['email'])
            ->first();

        if ($existing) {
            // Mettre à jour l'adresse existante
            $addressModel->update($existing['address_id'], $fields);
        } else {
            // Insertion manuelle avec requête SQL
            $sql = "INSERT INTO address (country, postal_code, city, street, complementary, street_number, user_email)
                VALUES (:country, :postal_code, :city, :street, :complementary, :street_number, :user_email)";

            $addressModel->query($sql, $fields);
        }

        $_SESSION['success'] = "Adresse mise à jour avec succès.";
        redirect('/account');
    }


    /**
     * Supprime le compte de l’utilisateur
     */
    public function delete(): void
    {
        $user = Auth::user();
        if (!$user) {
            redirect('/signin');
            exit;
        }

        $userModel = new User();
        $userModel->delete($user['user_id']);

        // Nettoyage de la session
        session_destroy();

        redirect('/');
    }

}