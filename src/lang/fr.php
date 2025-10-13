<?php
return [
  "header" => [
        "myaccount" => "Mon compte",
        "signup" => "S'inscrire",
        "signin" => "Se connecter",
        "language" => "Language",
        "english" => "Anglais",
        "french" => "Français",
        "chinese" => "Chinois",
        "german" => "Allemand",
        "spanish" => "Espagnol",
        "mission" => "Objectif",
        "team" => "Notre équipe",
        "subject" => "Sujet",
        "tech" => "Technique",
  ],


  "footer" => [
        "contact" => "Contact",
        "FAQ" => "FAQ",
        "contact_list" => "Liste des contacts",
        "network" => "Réseaux",
        "github" => "GitHub",
        "linkedin" => "LinkedIn",
        "right_reserved" => "Tous droits réservés."
  ],

  "home" => [
                  "title" => "Accueil",
                  "meta_desc" => "Page d'accueil",
                  "content" => [
                        "package" => [
                          "title" => "Chercher votre colis",
                          "text" => "Retrouvez votre colis en donnant l'id de suivis de votre colis transmis par mail.",
                          "form_placeholder" => "ID de votre colis",
                          "form_button" => "Rechercher",
                        ],

                        "security" => [
                            "title" => "Chercher votre colis",
                            "text" => "Dans les mains de nos employés, votre colis sera en <strong>sécurité</strong>.Nous vous livrerons votre colis dans le plus bref délais.Vous pouvez consulter les estimations en cherchant votre colis sur votre compte ou en insérer simplement l'identifiant de votre colis dans la barre de recherche.",
                            "alt_img" => "Dessin d&apos un entrepôt",
                        ],

                        "contact" => [
                            "title" => "Nous retrouver",
                            "text_address" => "<strong>Adresse :</strong> 123 Rue de l’Exemple, 75000 Paris, France",
                            "text_phone" => "<strong>Téléphone :</strong> +33 0 00 00 00 00",
                        ],
                  ],
            ],
    "FAQ" => [
        "title" => "FAQ",
        "meta_desc" => "Page de questions réponses",
            "content" => [
                "block-1" => [
                    "title" => "Comment suivre ma commande ?",
                    "text" => "Une fois votre commande expédiée, vous recevrez un numéro de suivi par email. Vous pouvez l’utiliser sur notre site pour suivre l’état de votre livraison en temps réel."
                ],
                "block-2" => [
                    "title" => "Quels sont les délais de livraison ?",
                    "text" => "Les délais dépendent de votre emplacement et du mode de livraison choisi. En général, les commandes standard arrivent sous 3 à 5 jours ouvrés, tandis que la livraison express arrive sous 24 à 48 heures."
                ],
                "block-3" => [
                    "title" => "Puis-je modifier mon adresse de livraison ?",
                    "text" => "Oui, tant que votre commande n’a pas encore été expédiée. Connectez-vous à votre compte et modifiez l’adresse dans la section 'Mes commandes'."
                ],
                "block-4" => [
                    "title" => "Que faire si ma commande est endommagée ou perdue ?",
                    "text" => "Contactez notre service client dans les 48 heures suivant la réception. Nous vous proposerons un échange ou un remboursement selon la situation."
                ],
                "block-5" => [
                    "title" => "Puis-je suivre mon colis depuis l’étranger ?",
                    "text" => "Oui, notre suivi fonctionne à l’international. Vous pouvez entrer votre numéro de suivi sur notre site ou sur le site du transporteur partenaire pour connaître l’état de votre colis."
                ],
                "block-6" => [
                    "title" => "Quels sont les frais de livraison ?",
                    "text" => "Les frais varient selon le poids, la taille de votre colis et la distance de livraison. Ils sont indiqués clairement lors de la validation de la commande et avant le paiement."
                ],
                "block-7" => [
                    "title" => "Puis-je annuler ma commande ?",
                    "text" => "Vous pouvez annuler votre commande tant qu’elle n’a pas encore été expédiée. Après expédition, veuillez suivre la procédure de retour ou contacter notre service client."
                ],

        ],
    ],

    "contact" => [
        "title" => "Contact",
        "meta_desc" => "Page de questions réponses",
        "content" => [
            "title" => "Nos contacts",
            "mail" =>"Email : Pas d&apos;email",
            "github" =>"Github : https://github.com/Orange-Box-Warehouse",
            "instagram" => "Instagram : Pas de compte",
            "twitter" => "Twitter : Pas de compte",
            "facebook" => "Facebook : Pas de compte",
            "linkedin" => "Linkedin",
            "linkedin1" => "<a href='https://www.linkedin.com/in/gauthier-defrance/'>Gauthier</a>",
            "linkedin2" => "<a href='https://www.linkedin.com/in/thomas-hornung-365ab8381/'>Thomas</a>",
            "linkedin3" => "<a href='#linkedin'>Hoahan</a>",
        ],
    ],

    "mission" => [
        "title" => "Objectif",
        "meta_desc" => "Description de la mission et du projet",
        "content" => [
            "intro" => [
                "title" => "Notre mission",
                "text" => "Notre mission consiste principalement à mettre en place un serveur web, un serveur applicatif, une base de données et un client applicatif."
            ],
            "project" => [
                "title" => "Notre projet",
                "text" => "Pour cette mission, nous avons développé un entrepôt fonctionnel capable de gérer les colis entrants et sortants de manière efficace."
            ],
            "project_list" => [
                "title" => "Composants du projet",
                "items" => [
                    ["icon" => "🌐", "text" => "Serveur web pour l'affichage de certaines données et la création d'autres données."],
                    ["icon" => "🖥️", "text" => "Serveur applicatif pour le traitement des commandes."],
                    ["icon" => "💾", "text" => "Base de données pour stocker les informations sur les colis et les utilisateurs."],
                    ["icon" => "📱", "text" => "Client applicatif pour permettre l’interaction avec le système de gestion de l’entrepôt."]
                ]
            ],
            "goal" => [
                "title" => "Objectif pédagogique",
                "text" => "Le but du projet est d'apprendre le fonctionnement d'une base de données (PostgreSQL) tout en l'utilisant, et de mettre en place notre propre protocole réseau entre le serveur et le client applicatif."
            ]
        ]
    ],


    "myaccount" => [
        "title" => "Mon compte",
        "meta_desc" => "Page de questions réponses",
        "content" => [

        ],
    ],

    "search" => [
        "title" => "Rechercher",
        "meta_desc" => "Rechercher une commande ou un colis",
        "content" => [
            "intro" => [
                "title" => "Chercher votre colis",
                "text" => "Entrez l'identifiant de votre colis ci-dessous pour suivre son état en temps réel."
            ],
            "form" => [
                "placeholder" => "ID de votre colis",
                "button" => "Rechercher"
            ],
            "status_labels" => [
                "arrived" => "Arrivée dans l'entrepôt :",
                "departed" => "Départ de l'entrepôt :",
                "estimated" => "Livraison estimée :",
                "current_status" => "Statut actuel :",
                "not_found" => "Commande introuvable."
            ]
        ]
    ],
    "signin" => [
        "title" => "Connexion",
        "meta_desc" => "Page de connexion des utilisateurs",
        "content" => [
            "title" => "Connexion",
            "email_label" => "Adresse e-mail",
            "email_placeholder" => "Entrez votre e-mail",
            "password_label" => "Mot de passe",
            "password_placeholder" => "Votre mot de passe",
            "submit_button" => "Se connecter",
            "signup_link" => "Pas de compte ?"
        ]
    ],

    "signup" => [
        "title" => "Inscription",
        "meta_desc" => "Page d'inscription des utilisateurs",
        "content" => [
            "title" => "Inscription",
            "name_label" => "Nom complet",
            "name_placeholder" => "Votre nom",
            "email_label" => "Adresse e-mail",
            "email_placeholder" => "Entrez votre e-mail",
            "password_label" => "Mot de passe",
            "password_placeholder" => "Créez un mot de passe",
            "submit_button" => "S'inscrire",
            "signin_link" => "Déjà un compte ?"
        ]
    ],

    "team" => [
        "title" => "Equipe",
        "meta_desc" => "Page présentant les membres de l'équipe",
        "content" => [
            "title" => "Notre équipe",
            "description" => "Notre équipe est composée de trois personnes pour ce projet fictif. Nous sommes tous étudiants en 3ème année à la faculté de Cergy Pontoise.",
            "members" => [
                [
                    "name" => "Thomas Hornung",
                    "mission" => "Main Mission :"
                ],
                [
                    "name" => "Hoahan Yu",
                    "mission" => "Main Mission :"
                ],
                [
                    "name" => "Gauthier Defrance",
                    "mission" => "Main Mission : Site web"
                ],
            ]
        ]
    ],


    "tech" => [
        "title" => "Technique",
        "meta_desc" => "Informations techniques sur la connexion et le serveur",
        "intro" => "Informations techniques sur la connexion et l’environnement serveur.",
        "labels" => [
            "ip" => "Adresse IP",
            "browser" => "Navigateur",
            "server_time" => "Heure du serveur",
            "php_version" => "PHP",
            "memory_limit" => "Mémoire",
            "server_software" => "Serveur",
            "protocol" => "Protocole / Méthode",
            "headers" => "En-têtes",
            "extensions" => "Extensions PHP chargées",
            "extensions_count" => "extensions",
            "extra" => "Autres infos",
            "accept_language" => "Accept-Language",
            "referer" => "Referer",
            "remote_port" => "Port distant",
            "server_name" => "Nom du serveur",
            "none" => "Aucune"
        ],
        "note" => "Les informations affichées sont récupérées depuis les en-têtes HTTP et l'environnement PHP. Évitez de partager des données sensibles."
    ],



    "error" => [
        "title" => "Erreur",
        "meta_desc" => "Page d'erreur",
        "content" => [
            "code" => "???",
            "message" => "Erreur inconnue.",
            "back_home" => "Retour à l’accueil"
        ]
    ],

];