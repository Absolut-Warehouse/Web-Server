<?php

return [

    "app_info" => [
        "company_name" => "Absolut Warehouse",
        "app_version"  => "0.2",
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
        "installed_languages" => ["fr", "en", "es", "ch", "de"],
        "default_language" => "fr",
    ],

    /**
     * Don't share theses DATA !!!!
     */
    "db_info" => [
        "host" => "postgresql-yuhaohan.alwaysdata.net",
        "database" => "yuhaohan_project_db",
        "port" => "5432",
        "user" => "yuhaohan_gauthier",
        "password" => "12ABC_#",
    ],

    "security" => [
        "session_name" => "absolut_warehouse_session",
        "session_lifetime" => 3600, // en secondes
        "csrf_protection" => true,
        "encryption_key"  => "49844484984654652315498"
    ],


];