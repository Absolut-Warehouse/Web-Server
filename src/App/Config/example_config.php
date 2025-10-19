<?php

return [

    "app_info" => [
        "company_name" => "Absolut Warehouse",
        "app_version"  => "0.2",
        "app_author"   => "Hoahan Yu, Thomas Hornung, Gauthier Defrance",
        "environment"  => "production", // "development" | "staging" | "production"
        "timezone"     => "Europe/Paris",
        "base_url"     => "https://mywebsite.domain.tld",
        "debug"        => false // active ou désactive les messages d’erreur détaillés
    ],

    /**
     * Paramètres de langue
     */
    "language_info" => [
        "installed_languages" => ["fr", "en", "es", "ch", "de"],
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
        "session_name" => "absolut_warehouse_session",
        "session_lifetime" => 3600, // en secondes
        "csrf_protection" => true,
        "encryption_key"  => "XXXXXXXXXX"
    ],


];
