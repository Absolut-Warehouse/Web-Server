<?php

return [

    "app_info" => [
        "company_name" => "Orange Box",
        "app_version"  => "0.1",
        "app_author"   => "Hoahan Yu, Thomas Hornung, Gauthier Defrance",
        "environment"  => "production", // "development" | "staging" | "production"
        "timezone"     => "Europe/Paris",
        "base_url"     => "https://gauthierdefrance.alwaysdata.net",
        "debug"        => false // active ou désactive les messages d’erreur détaillés
    ],

    /**
     * Paramètres de langue
     */
    "language_info" => [
        "installed_languages" => ["fr", "en",],
        "default_language" => "fr",
    ],

    "db_info" => [
        "host" => "Xxxx.xxxx.xxxx.xxxx",
        "database" => "dbname",
        "port" => "XXXX",
        "user" => "username",
        "password" => "password",
    ],

    "security" => [
        "session_name" => "orangebox_session",
        "session_lifetime" => 3600, // en secondes
        "csrf_protection" => true,
        "encryption_key"  => "CHANGE_THIS_TO_A_SECURE_RANDOM_KEY"
    ],


];
