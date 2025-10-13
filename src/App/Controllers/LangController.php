<?php

namespace App\Controllers;
use Core\Router;
use Core\Lang;


class LangController
{
    /**
     * Change la langue de l'utilisateur et la stocke dans un cookie
     */
    public function setLang(): string
    {
        // Récupérer le code langue depuis la requête GET ou POST
        $langCode = $_GET['lang'] ?? null;

        if ($langCode) {
            $langCode = strtolower(trim($langCode));

            // Vérifier que la langue est bien dans la liste des langues installées
            $supportedLanguages = Lang::getConfig()['installed_languages'];
            if (in_array($langCode, $supportedLanguages, true)) {

                // Stocker dans un cookie pour 7 jours
                setcookie('lang', $langCode, [
                    'expires' => time() + 7 * 24 * 60 * 60, // 7 jours
                    'path' => '/',
                    'secure' => isset($_SERVER['HTTPS']), // true si HTTPS
                    'httponly' => false,
                    'samesite' => 'Lax'
                ]);

                // Recharger les traductions (optionnel ici)
                Lang::init($langCode);
                redirect_back();
            } else {
                $lang = Lang::get();
                $content = ["error_code" => 404, "message" => "Not supported language."];
                $data =  ["lang" => $lang, "content" => $content];
                return view("errors/error", $data);
            }
        }

        $lang = Lang::get();
        $content = ["error_code" => 404, "message" => "No lang given."];
        $data =  ["lang" => $lang, "content" => $content];
        return view("errors/error", $data);
    }
}