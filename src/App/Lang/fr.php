<?php
return [
  "header" => [
        "myaccount" => "Mon compte",
        "signup" => "S'inscrire",
        "signin" => "Se connecter",
        "language" => "Langage",
        "english" => "Anglais",
        "french" => "Français",
        "chinese" => "Chinois",
        "german" => "Allemand",
        "spanish" => "Espagnol",
        "mission" => "Objectif",
        "team" => "Notre équipe",
        "subject" => "Sujet",
        "tech" => "Technique",
          "logout" => "Se déconnecter",
          "myorders" => "Mes commandes",
          "employee_menu" => "Espace Employé",
          "dashboard" => "Tableau de bord",
          "package_list" => "Liste des packages",
          "manage_employees" => "Gestion Des Employés",
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
                            "title" => "À propos de votre colis",
                            "text" => "Dans les mains de nos employés, votre colis sera en <strong>sécurité</strong>.Nous vous livrerons votre colis dans le plus bref délais.Vous pouvez consulter les estimations en cherchant votre colis sur votre compte ou en insérer simplement l'identifiant de votre colis dans la barre de recherche.",
                            "alt_img" => "Dessin d&apos un entrepôt",
                        ],

                        "contact" => [
                            "title" => "Nous retrouver",
                            "text_address" => "<strong>Adresse :</strong> 123 Rue de l’Exemple, 75000 Paris, France",
                            "text_phone" => "<strong>Téléphone :</strong> +33 0 00 00 00 00",
                        ],

                      "marketing_switch" => [
                          "prefix" => "VOTRE COLIS",
                          "suffix" => "GARANTI !",
                          "flip_phrases" => [
                              "À L'HEURE",
                              "EN SÉCURITÉ",
                              "PARTOUT DANS LE MONDE"
                          ]
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
            "github" =>"Github : https://github.com/Absolut-Warehouse/",
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
                "text" => "Entrez l'identifiant de votre colis ci-dessous pour suivre son état en <strong>temps réel</strong>."
            ],
            "form" => [
                "placeholder" => "ID de votre colis",
                "button" => "Rechercher"
            ],
            "status_labels" => [
                "package_code" => "Code du package",
                "refrigerated" => "Réfrigéré",
                "fragile" => "Fragile",
                "weight" => "Poids",
                "arrived_at" => "Arrivée dans l'entrepôt",
                "departed_at" => "Départ de l'entrepôt",
                "estimated_delivery" => "Livraison estimée",
                "status" => "Statut actuel",
                "not_found" => "<em>Commande introuvable.</em>"
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
            "signup_link" => "Pas de compte ?",
        ]
    ],

    "signup" => [
        "title" => "Inscription",
        "meta_desc" => "Page d'inscription des utilisateurs",
        "content" => [
            "title" => "Inscription",
            "name_label" => "Votre nom",
            "name_content" => "Votre nom",
            "surname_label" => "Votre prénom",
            "surname_content" => "Votre prénom",
            "email_label" => "Adresse e-mail",
            "email_placeholder" => "Entrez votre e-mail",
            "password_label" => "Mot de passe",
            "password_2_label" => "Répetez votre mot de passe",
            "password_placeholder" => "Mot de passe",
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
            "back_home" => "Retour à l’accueil",
            "not_correct_search" => "Numéro de commande invalide.",
            "missing_fields" => "Tous les champs sont obligatoires.",
            "bad_information" => "Email ou mot de passe incorrect.",
            "already_used_mail" => "Cette email est déjà utilisé",
            "password_too_short" => "Le mot de passe doit contenir au moins 6 caractères.",
            "passwords_not_match" => "Les mots de passe ne correspondent pas.",
        ]
    ],

    "account" => [
        "title" => "Mon compte",
        "meta_desc" => "Page de gestion du compte utilisateur",
        "content" => [
            // Profil utilisateur
            "profile_title" => "Profil utilisateur",
            "label_name" => "Nom",
            "label_firstname" => "Prénom",
            "label_email" => "Email",
            "label_phone" => "Téléphone",
            "label_gender" => "Sexe",
            "gender_male" => "Homme",
            "gender_female" => "Femme",
            "gender_other" => "Autre",
            "update_profile_btn" => "Mettre à jour",
            "update_profile_success" => "Profil mis à jour avec succès.",
            "update_profile_error" => "Une erreur est survenue lors de la mise à jour du profil.",

            // Adresse
            "address_title" => "Adresse",
            "address_line1" => "Adresse ligne 1",
            "address_line2" => "Adresse ligne 2",
            "city" => "Ville",
            "postal_code" => "Code postal",
            "country" => "Pays",
            "update_address_btn" => "Mettre à jour l'adresse",
            "no_address_defined" => "Non définie",
            "update_address_success" => "Adresse mise à jour avec succès.",
            "update_address_error" => "Une erreur est survenue lors de l'enregistrement de l'adresse.",
            "address_missing_fields" => "Veuillez remplir tous les champs obligatoires de l’adresse.",

            // Suppression du compte
            "delete_account_btn" => "Supprimer mon compte",
            "delete_account_confirm" => "Voulez-vous vraiment supprimer votre compte ?",
            "delete_account_success" => "Votre compte a bien été supprimé.",
            "delete_account_error" => "Une erreur est survenue lors de la suppression du compte.",

            // Messages génériques
            "error_title" => "Erreur",
            "success_title" => "Succès",
        ]
    ],

    "orders" => [
        "title" => "Mes colis",
        "no_packages" => "<em>Vous n’avez aucun colis.</em>",
        "table" => [
            "order_id" => "ID Commande",
            "package_code" => "Code Colis",
            "refrigerated" => "Réfrigéré",
            "fragile" => "Fragile",
            "weight" => "Poids (kg)",
            "status" => "Statut",
            "entry_time" => "Entrée",
            "exit_time" => "Sortie",
            "estimated_delivery" => "Livraison estimée"
        ],
        "status" => [
            "in_storage" => "<span class='status in_storage'>En stockage</span>",
            "outbound" => "<span class='status outbound'>En transit</span>",
            "delivered" => "<span class='status delivered'>Livré</span>",
            "picked_up" => "<span class='status picked_up'>Récupéré</span>"
        ],
        "status_texts" => [
            "pending" => "<em>En attente</em>",
            "no_data" => "<em>Non disponible</em>",
        ],
        "common" => [
            "yes" => "Oui",
            "no" => "Non"
        ]
    ],


    "employee_dashboard" => [
        "title" => "Tableau de bord Employé",
        "welcome" => "Bienvenue",
        "section_account_role" => "Infos de Compte et Rôle",
        "label_full_name" => "Nom complet",
        "label_email" => "Email",
        "label_phone" => "Téléphone",
        "section_employment" => "Détails d'Emploi",
        "label_employee_id" => "ID Employé",
        "label_position" => "Poste",
        "label_hire_date" => "Recrutement",
        "label_not_available" => "N/A",
        "section_terminals" => "Terminaux Assignés",
        "terminal_assigned_text" => "Vous êtes affecté(e) aux terminaux suivants :",
        "terminal_id_label" => "Terminal",
        "terminal_name_unknown" => "Nom inconnu",
        "terminal_location_label" => "Lieu",
        "terminal_location_unspecified" => "Adresse non spécifiée",
        "no_terminal_assigned" => "Vous n'avez actuellement aucun terminal assigné. Contactez votre gestionnaire.",
    ],

    "employee_edit" => [
        "page_title" => "Modifier l'Employé",
        "header_prefix" => "Modification de :",
        "label_role" => "Rôle/Poste",
        "label_hire_date" => "Date de recrutement",
        "instruction_text" => "Veuillez modifier les informations d'emploi ci-dessous :",
        "button_submit" => "Enregistrer les modifications",
        "button_delete" => "Supprimer le compte",
        "debug_error_title" => "🛑 Erreur de Chargement des Informations d'Employé",
        "debug_error_text" => "Les informations de l'employé n'ont pas pu être chargées.",
        "debug_error_content_title" => "Contenu de \$employee:",
        "delete_confirm_prompt" => "Êtes-vous sûr de vouloir SUPPRIMER le compte de l'employé %s (#%s) ? Cette action est irréversible.", // %s seront remplacés par le nom et l'ID
        "delete_confirm_default" => "Cet employé",
    ],

    "employee_list" => [
        "page_title" => "Gestion des Employés",
        "button_add" => "Ajouter un employé",
        "table_header" => [
            "full_name" => "Nom Complet",
            "role" => "Rôle",
            "email" => "Email",
            "phone" => "Téléphone",
            "status" => "Statut",
            "actions" => "Actions",
        ],
        "role" => [
            "manager" => "Gestionnaire",
            "dispatcher" => "Répartiteur",
            "delivery_driver" => "Livreur",
            "unknown" => "Inconnu",
        ],
        "status" => [
            "online" => "En ligne 🟢",
            "inactive" => "Inactif",
            "never_connected" => "Inactif",
        ],
        "no_employees_found" => "Aucun employé trouvé.",
        "action_edit" => "Modifier ✏️",
        "action_edit_title" => "Modifier l'employé",
    ],

    "package_list" => [
        "page_title" => "Gestion des packages",
        "search_placeholder" => "Code colis ou Emplacement...",
        "search_button" => "Rechercher",
        "reset_button" => "Réinitialiser",
        "table_header" => [
            "code" => "Code Colis",
            "infos" => "Infos",
            "weight" => "Poids (kg)",
            "location" => "Emplacement",
            "destination" => "Destination",
            "status" => "Statut",
            "entry" => "Entrée",
            "exit" => "Sortie",
            "estimated_delivery" => "Livraison Est.",
        ],
        "no_packages_found" => "Aucun colis trouvé.",
        "info_fragile" => "Fragile ⚠️",
        "info_refrigerated" => "Frais ❄️",
        "location_not_stored" => "Non rangé",
        "destination_na" => "N/D",
        "pagination_prev" => "« Précédent",
        "pagination_next" => "Suivant »",
        "pagination_summary_prefix" => "Page",
        "pagination_summary_middle" => "sur",
        "pagination_summary_suffix" => "(Total:",
    ],

    "status_display" => [
        "in_storage" => "En Stock",
        "outbound" => "En cours de livraison",
        "delivered" => "Livré",
        "picked_up" => "Retiré",
        "cancelled" => "Annulé",
        "unknown" => "Inconnu",
    ],

    "employee_create" => [
        "page_title" => "Ajouter un employé",
        "main_header" => "➕ Ajouter un nouvel employé (Association de compte)",
        "description" => "Veuillez fournir l'email d'un utilisateur existant pour l'associer à un rôle d'employé, puis définissez ses informations d'emploi.",
        "error_prefix" => "Erreur lors de la création :",
        "section_user_account" => "Compte Utilisateur",
        "label_email" => "Email de l'utilisateur existant :",
        "placeholder_email" => "Ex: nom.prenom@entreprise.com",
        "hint_email" => "Cet utilisateur doit déjà exister dans la base de données.",
        "section_employment_info" => "Informations d'Emploi",
        "label_position" => "Poste / Rôle :",
        "option_select_position" => "-- Sélectionnez un poste --",
        "label_hire_date" => "Date de recrutement :",
        "button_cancel" => "Annuler",
        "button_submit" => "✅ Ajouter l'employé",
    ],



];