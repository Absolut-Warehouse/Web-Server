<?php
return [
    "header" => [
        "myaccount" => "Mein Konto",
        "signup" => "Registrieren",
        "signin" => "Anmelden",
        "language" => "Sprache",
        "english" => "Englisch",
        "french" => "Französisch",
        "chinese" => "Chinesisch",
        "german" => "Deutsch",
        "spanish" => "Spanisch",
        "mission" => "Ziel",
        "team" => "Unser Team",
        "subject" => "Thema",
        "tech" => "Technik",
    ],

    "footer" => [
        "contact" => "Kontakt",
        "FAQ" => "FAQ",
        "contact_list" => "Kontaktliste",
        "network" => "Netzwerke",
        "github" => "GitHub",
        "linkedin" => "LinkedIn",
        "right_reserved" => "Alle Rechte vorbehalten."
    ],

    "home" => [
        "title" => "Startseite",
        "meta_desc" => "Startseite",
        "content" => [
            "package" => [
                "title" => "Ihr Paket suchen",
                "text" => "Finden Sie Ihr Paket, indem Sie die per E-Mail übermittelte Sendungsverfolgungs-ID eingeben.",
                "form_placeholder" => "Ihre Paket-ID",
                "form_button" => "Suchen",
            ],
            "security" => [
                "title" => "Ihr Paket suchen",
                "text" => "In den Händen unserer Mitarbeiter ist Ihr Paket <strong>sicher</strong>. Wir liefern Ihr Paket so schnell wie möglich. Sie können die Schätzungen einsehen, indem Sie Ihr Paket in Ihrem Konto suchen oder einfach die Paket-ID in die Suchleiste eingeben.",
                "alt_img" => "Lagerhauszeichnung",
            ],
            "contact" => [
                "title" => "Kontaktieren Sie uns",
                "text_address" => "<strong>Adresse:</strong> 123 Beispielstraße, 75000 Paris, Frankreich",
                "text_phone" => "<strong>Telefon:</strong> +33 0 00 00 00 00",
            ],
        ],
    ],

    "FAQ" => [
        "title" => "FAQ",
        "meta_desc" => "Fragen und Antworten",
        "content" => [
            "block-1" => [
                "title" => "Wie kann ich meine Bestellung verfolgen?",
                "text" => "Sobald Ihre Bestellung versandt wurde, erhalten Sie per E-Mail eine Sendungsnummer. Sie können diese auf unserer Website verwenden, um den Lieferstatus in Echtzeit zu verfolgen."
            ],
            "block-2" => [
                "title" => "Wie lange dauert die Lieferung?",
                "text" => "Die Lieferzeiten hängen von Ihrem Standort und der gewählten Lieferart ab. Standardbestellungen kommen normalerweise innerhalb von 3 bis 5 Werktagen an, Expresslieferungen innerhalb von 24 bis 48 Stunden."
            ],
            "block-3" => [
                "title" => "Kann ich meine Lieferadresse ändern?",
                "text" => "Ja, solange Ihre Bestellung noch nicht versandt wurde. Melden Sie sich bei Ihrem Konto an und ändern Sie die Adresse im Abschnitt 'Meine Bestellungen'."
            ],
            "block-4" => [
                "title" => "Was tun, wenn meine Bestellung beschädigt oder verloren ist?",
                "text" => "Kontaktieren Sie unseren Kundenservice innerhalb von 48 Stunden nach Erhalt. Wir bieten je nach Situation einen Austausch oder eine Rückerstattung an."
            ],
            "block-5" => [
                "title" => "Kann ich mein Paket aus dem Ausland verfolgen?",
                "text" => "Ja, unsere Sendungsverfolgung funktioniert international. Sie können die Sendungsnummer auf unserer Website oder auf der Website des Partnerspediteurs eingeben, um den Status Ihres Pakets zu erfahren."
            ],
            "block-6" => [
                "title" => "Wie hoch sind die Versandkosten?",
                "text" => "Die Kosten variieren je nach Gewicht, Größe Ihres Pakets und Lieferdistanz. Sie werden beim Bestellabschluss klar angezeigt, bevor Sie bezahlen."
            ],
            "block-7" => [
                "title" => "Kann ich meine Bestellung stornieren?",
                "text" => "Sie können Ihre Bestellung stornieren, solange sie noch nicht versandt wurde. Nach dem Versand folgen Sie bitte dem Rücksendeverfahren oder kontaktieren Sie unseren Kundenservice."
            ],
        ],
    ],

    "contact" => [
        "title" => "Kontakt",
        "meta_desc" => "Fragen und Antworten",
        "content" => [
            "title" => "Unsere Kontakte",
            "mail" => "E-Mail: Keine E-Mail",
            "github" => "Github: https://github.com/Orange-Box-Warehouse",
            "instagram" => "Instagram: Kein Konto",
            "twitter" => "Twitter: Kein Konto",
            "facebook" => "Facebook: Kein Konto",
            "linkedin" => "Linkedin",
            "linkedin1" => "<a href='https://www.linkedin.com/in/gauthier-defrance/'>Gauthier</a>",
            "linkedin2" => "<a href='https://www.linkedin.com/in/thomas-hornung-365ab8381/'>Thomas</a>",
            "linkedin3" => "<a href='#linkedin'>Hoahan</a>",
        ],
    ],

    "mission" => [
        "title" => "Ziel",
        "meta_desc" => "Beschreibung der Mission und des Projekts",
        "content" => [
            "intro" => [
                "title" => "Unsere Mission",
                "text" => "Unsere Mission besteht hauptsächlich darin, einen Webserver, einen Anwendungsserver, eine Datenbank und eine Client-Anwendung einzurichten."
            ],
            "project" => [
                "title" => "Unser Projekt",
                "text" => "Für diese Mission haben wir ein funktionierendes Lager entwickelt, das eingehende und ausgehende Pakete effizient verwalten kann."
            ],
            "project_list" => [
                "title" => "Projektkomponenten",
                "items" => [
                    ["icon" => "🌐", "text" => "Webserver zur Anzeige und Erstellung bestimmter Daten."],
                    ["icon" => "🖥️", "text" => "Anwendungsserver zur Verarbeitung von Bestellungen."],
                    ["icon" => "💾", "text" => "Datenbank zum Speichern von Paket- und Benutzerdaten."],
                    ["icon" => "📱", "text" => "Client-Anwendung zur Interaktion mit dem Lagerverwaltungssystem."]
                ]
            ],
            "goal" => [
                "title" => "Bildungsziel",
                "text" => "Das Ziel des Projekts ist es, den Betrieb einer Datenbank (PostgreSQL) zu lernen und gleichzeitig zu nutzen und ein eigenes Netzwerkprotokoll zwischen Server und Client einzurichten."
            ]
        ]
    ],

    "myaccount" => [
        "title" => "Mein Konto",
        "meta_desc" => "Fragen und Antworten",
        "content" => [],
    ],

    "search" => [
        "title" => "Suchen",
        "meta_desc" => "Bestellung oder Paket suchen",
        "content" => [
            "intro" => [
                "title" => "Ihr Paket suchen",
                "text" => "Geben Sie unten die Paket-ID ein, um den Status in Echtzeit zu verfolgen."
            ],
            "form" => [
                "placeholder" => "Ihre Paket-ID",
                "button" => "Suchen"
            ],
            "status_labels" => [
                "arrived" => "Ankunft im Lager:",
                "departed" => "Abgang aus dem Lager:",
                "estimated" => "Voraussichtliche Lieferung:",
                "current_status" => "Aktueller Status:",
                "not_found" => "Bestellung nicht gefunden."
            ]
        ]
    ],

    "signin" => [
        "title" => "Anmelden",
        "meta_desc" => "Benutzer-Anmeldeseite",
        "content" => [
            "title" => "Anmelden",
            "email_label" => "E-Mail-Adresse",
            "email_placeholder" => "Geben Sie Ihre E-Mail ein",
            "password_label" => "Passwort",
            "password_placeholder" => "Ihr Passwort",
            "submit_button" => "Anmelden",
            "signup_link" => "Noch kein Konto?"
        ]
    ],

    "signup" => [
        "title" => "Registrieren",
        "meta_desc" => "Benutzer-Registrierungsseite",
        "content" => [
            "title" => "Registrieren",
            "name_label" => "Vollständiger Name",
            "name_placeholder" => "Ihr Name",
            "email_label" => "E-Mail-Adresse",
            "email_placeholder" => "Geben Sie Ihre E-Mail ein",
            "password_label" => "Passwort",
            "password_placeholder" => "Passwort erstellen",
            "submit_button" => "Registrieren",
            "signin_link" => "Bereits ein Konto?"
        ]
    ],

    "team" => [
        "title" => "Team",
        "meta_desc" => "Seite mit den Teammitgliedern",
        "content" => [
            "title" => "Unser Team",
            "description" => "Unser Team besteht aus drei Personen für dieses fiktive Projekt. Wir sind alle Drittsemester an der Universität Cergy Pontoise.",
            "members" => [
                [
                    "name" => "Thomas Hornung",
                    "mission" => "Hauptaufgabe:"
                ],
                [
                    "name" => "Hoahan Yu",
                    "mission" => "Hauptaufgabe:"
                ],
                [
                    "name" => "Gauthier Defrance",
                    "mission" => "Hauptaufgabe: Website"
                ],
            ]
        ]
    ],

    "tech" => [
        "title" => "Technik",
        "meta_desc" => "Technische Informationen zu Verbindung und Server",
        "intro" => "Technische Informationen zu Verbindung und Serverumgebung.",
        "labels" => [
            "ip" => "IP-Adresse",
            "browser" => "Browser",
            "server_time" => "Serverzeit",
            "php_version" => "PHP",
            "memory_limit" => "Speicher",
            "server_software" => "Server",
            "protocol" => "Protokoll / Methode",
            "headers" => "Header",
            "extensions" => "Geladene PHP-Erweiterungen",
            "extensions_count" => "Erweiterungen",
            "extra" => "Weitere Infos",
            "accept_language" => "Accept-Language",
            "referer" => "Referer",
            "remote_port" => "Entfernter Port",
            "server_name" => "Servername",
            "none" => "Keine"
        ],
        "note" => "Die angezeigten Informationen stammen aus HTTP-Headern und der PHP-Umgebung. Teilen Sie keine sensiblen Daten."
    ],

    "error" => [
        "title" => "Fehler",
        "meta_desc" => "Fehlerseite",
        "content" => [
            "code" => "???",
            "message" => "Unbekannter Fehler.",
            "back_home" => "Zurück zur Startseite",
            "not_correct_search" => "Ungültige Bestellnummer.",
        ]
    ],

];
