<?php
return [
    "header" => [
        "myaccount" => "My Account",
        "signup" => "Sign Up",
        "signin" => "Sign In",
        "language" => "Language",
        "english" => "English",
        "french" => "French",
        "chinese" => "Chinese",
        "german" => "German",
        "spanish" => "Spanish",
        "mission" => "Mission",
        "team" => "Our Team",
        "subject" => "Subject",
        "tech" => "Technical",
        "logout" => "Log Out",
        "myorders" => "My Orders",
        "employee_menu" => "Employee Area",
        "dashboard" => "Dashboard",
        "package_list" => "Package List",
        "manage_employees" => "Employee Management",
    ],

    "footer" => [
        "contact" => "Contact",
        "FAQ" => "FAQ",
        "contact_list" => "Contact List",
        "network" => "Networks",
        "github" => "GitHub",
        "linkedin" => "LinkedIn",
        "right_reserved" => "All rights reserved."
    ],

    "home" => [
        "title" => "Home",
        "meta_desc" => "Homepage",
        "content" => [
            "package" => [
                "title" => "Track Your Package",
                "text" => "Find your package by entering the tracking ID sent to you by email.",
                "form_placeholder" => "Your package ID",
                "form_button" => "Search",
            ],

            "security" => [
                "title" => "Track Your Package",
                "text" => "In the hands of our employees, your package will be <strong>safe</strong>. We will deliver it as soon as possible. You can check the estimates by tracking your package in your account or simply entering the tracking ID in the search bar.",
                "alt_img" => "Warehouse illustration",
            ],

            "contact" => [
                "title" => "Find Us",
                "text_address" => "<strong>Address:</strong> 123 Rue de l’Exemple, 75000 Paris, France",
                "text_phone" => "<strong>Phone:</strong> +33 0 00 00 00 00",
            ],

            "marketing_switch" => [
                "prefix" => "YOUR PACKAGE",
                "suffix" => "GUARANTEED!",
                "flip_phrases" => [
                    "ON TIME",
                    "SAFE",
                    "ANYWHERE IN THE WORLD"
                ]
            ],

        ],
    ],

    "FAQ" => [
        "title" => "FAQ",
        "meta_desc" => "Questions and Answers Page",
        "content" => [
            "block-1" => [
                "title" => "How do I track my order?",
                "text" => "Once your order is shipped, you will receive a tracking number by email. You can use it on our website to track the delivery status in real-time."
            ],
            "block-2" => [
                "title" => "What are the delivery times?",
                "text" => "Delivery times depend on your location and the delivery method chosen. Standard orders usually arrive within 3-5 business days, while express delivery arrives within 24-48 hours."
            ],
            "block-3" => [
                "title" => "Can I change my delivery address?",
                "text" => "Yes, as long as your order hasn’t been shipped. Log into your account and change the address in the 'My Orders' section."
            ],
            "block-4" => [
                "title" => "What if my order is damaged or lost?",
                "text" => "Contact our customer service within 48 hours of receiving it. We will offer an exchange or refund depending on the situation."
            ],
            "block-5" => [
                "title" => "Can I track my package from abroad?",
                "text" => "Yes, our tracking works internationally. You can enter your tracking number on our website or the partner carrier's site to check your package status."
            ],
            "block-6" => [
                "title" => "What are the delivery fees?",
                "text" => "Fees vary according to weight, package size, and delivery distance. They are clearly shown during checkout and before payment."
            ],
            "block-7" => [
                "title" => "Can I cancel my order?",
                "text" => "You can cancel your order as long as it hasn't been shipped. After shipping, follow the return procedure or contact customer service."
            ],

        ],
    ],

    "contact" => [
        "title" => "Contact",
        "meta_desc" => "Contact Page",
        "content" => [
            "title" => "Our Contacts",
            "mail" =>"Email: No email",
            "github" =>"GitHub: https://github.com/Absolut-Warehouse/",
            "instagram" => "Instagram: No account",
            "twitter" => "Twitter: No account",
            "facebook" => "Facebook: No account",
            "linkedin" => "LinkedIn",
            "linkedin1" => "<a href='https://www.linkedin.com/in/gauthier-defrance/'>Gauthier</a>",
            "linkedin2" => "<a href='https://www.linkedin.com/in/thomas-hornung-365ab8381/'>Thomas</a>",
            "linkedin3" => "<a href='#linkedin'>Hoahan</a>",
        ],
    ],

    "mission" => [
        "title" => "Mission",
        "meta_desc" => "Description of the mission and project",
        "content" => [
            "intro" => [
                "title" => "Our Mission",
                "text" => "Our mission is mainly to set up a web server, an application server, a database, and an application client."
            ],
            "project" => [
                "title" => "Our Project",
                "text" => "For this mission, we developed a functional warehouse capable of efficiently managing incoming and outgoing packages."
            ],
            "project_list" => [
                "title" => "Project Components",
                "items" => [
                    ["icon" => "🌐", "text" => "Web server for displaying and creating certain data."],
                    ["icon" => "🖥️", "text" => "Application server for processing orders."],
                    ["icon" => "💾", "text" => "Database to store information about packages and users."],
                    ["icon" => "📱", "text" => "Application client for interacting with the warehouse management system."]
                ]
            ],
            "goal" => [
                "title" => "Educational Goal",
                "text" => "The aim is to learn how a database (PostgreSQL) works while using it and to implement our own network protocol between server and client application."
            ]
        ]
    ],

    "myaccount" => [
        "title" => "My Account",
        "meta_desc" => "User account page",
        "content" => [],
    ],

    "search" => [
        "title" => "Search",
        "meta_desc" => "Search for an order or a package",
        "content" => [
            "intro" => [
                "title" => "Track your package",
                "text" => "Enter your package ID below to track its status in <strong>real time</strong>."
            ],
            "form" => [
                "placeholder" => "Your package ID",
                "button" => "Search"
            ],
            "status_labels" => [
                "package_code" => "Package code",
                "refrigerated" => "Refrigerated",
                "fragile" => "Fragile",
                "weight" => "Weight",
                "arrived_at" => "Arrived at the warehouse",
                "departed_at" => "Departed from the warehouse",
                "estimated_delivery" => "Estimated delivery",
                "status" => "Current status",
                "not_found" => "<em>Order not found.</em>"
            ]
        ]
    ],


    "signin" => [
        "title" => "Sign In",
        "meta_desc" => "User sign-in page",
        "content" => [
            "title" => "Sign In",
            "email_label" => "Email address",
            "email_placeholder" => "Enter your email",
            "password_label" => "Password",
            "password_placeholder" => "Your password",
            "submit_button" => "Sign In",
            "signup_link" => "No account?",
        ]
    ],

    "signup" => [
        "title" => "Sign Up",
        "meta_desc" => "User sign-up page",
        "content" => [
            "title" => "Sign Up",
            "name_label" => "Your name",
            "name_content" => "Your name",
            "surname_label" => "Your surname",
            "surname_content" => "Your surname",
            "email_label" => "Email address",
            "email_placeholder" => "Enter your email",
            "password_label" => "Password",
            "password_2_label" => "Repeat your password",
            "password_placeholder" => "Password",
            "submit_button" => "Sign Up",
            "signin_link" => "Already have an account?"
        ]
    ],

    "team" => [
        "title" => "Team",
        "meta_desc" => "Page presenting team members",
        "content" => [
            "title" => "Our Team",
            "description" => "Our team consists of three people for this fictional project. We are all third-year students at the University of Cergy-Pontoise.",
            "members" => [
                [
                    "name" => "Thomas Hornung",
                    "mission" => "Main Mission:"
                ],
                [
                    "name" => "Hoahan Yu",
                    "mission" => "Main Mission:"
                ],
                [
                    "name" => "Gauthier Defrance",
                    "mission" => "Main Mission: Website"
                ],
            ]
        ]
    ],

    "tech" => [
        "title" => "Technical",
        "meta_desc" => "Technical information about connection and server",
        "intro" => "Technical information about connection and server environment.",
        "labels" => [
            "ip" => "IP Address",
            "browser" => "Browser",
            "server_time" => "Server Time",
            "php_version" => "PHP",
            "memory_limit" => "Memory",
            "server_software" => "Server",
            "protocol" => "Protocol / Method",
            "headers" => "Headers",
            "extensions" => "Loaded PHP extensions",
            "extensions_count" => "extensions",
            "extra" => "Other info",
            "accept_language" => "Accept-Language",
            "referer" => "Referer",
            "remote_port" => "Remote port",
            "server_name" => "Server name",
            "none" => "None"
        ],
        "note" => "Displayed information is retrieved from HTTP headers and PHP environment. Avoid sharing sensitive data."
    ],

    "error" => [
        "title" => "Error",
        "meta_desc" => "Error page",
        "content" => [
            "code" => "???",
            "message" => "Unknown error.",
            "back_home" => "Back to home",
            "not_correct_search" => "Invalid order number.",
            "missing_fields" => "All fields are required.",
            "bad_information" => "Incorrect email or password.",
            "already_used_mail" => "This email is already used",
            "password_too_short" => "Password must be at least 6 characters.",
            "passwords_not_match" => "Passwords do not match.",
        ]
    ],

    "account" => [
        "title" => "My Account",
        "meta_desc" => "User account management page",
        "content" => [
            "profile_title" => "User Profile",
            "label_name" => "Name",
            "label_firstname" => "First Name",
            "label_email" => "Email",
            "label_phone" => "Phone",
            "label_gender" => "Gender",
            "gender_male" => "Male",
            "gender_female" => "Female",
            "gender_other" => "Other",
            "update_profile_btn" => "Update",
            "update_profile_success" => "Profile updated successfully.",
            "update_profile_error" => "An error occurred while updating profile.",

            "address_title" => "Address",
            "address_line1" => "Address line 1",
            "address_line2" => "Address line 2",
            "city" => "City",
            "postal_code" => "Postal code",
            "country" => "Country",
            "update_address_btn" => "Update Address",
            "no_address_defined" => "Not defined",
            "update_address_success" => "Address updated successfully.",
            "update_address_error" => "An error occurred while saving the address.",
            "address_missing_fields" => "Please fill in all required address fields.",

            "delete_account_btn" => "Delete my account",
            "delete_account_confirm" => "Are you sure you want to delete your account?",
            "delete_account_success" => "Your account has been deleted.",
            "delete_account_error" => "An error occurred while deleting your account.",

            "error_title" => "Error",
            "success_title" => "Success",
        ]
    ],


    "orders" => [
        "title" => "My Packages",
        "no_packages" => "<em>You have no packages.</em>",
        "table" => [
            "order_id" => "Order ID",
            "package_code" => "Package Code",
            "refrigerated" => "Refrigerated",
            "fragile" => "Fragile",
            "weight" => "Weight (kg)",
            "status" => "Status",
            "entry_time" => "Entry Time",
            "exit_time" => "Exit Time",
            "estimated_delivery" => "Estimated Delivery"
        ],
        "status" => [
            "in_storage" => "<span class='status in_storage'>In Storage</span>",
            "outbound" => "<span class='status outbound'>In Transit</span>",
            "delivered" => "<span class='status delivered'>Delivered</span>",
            "picked_up" => "<span class='status picked_up'>Picked Up</span>"
        ],
        "status_texts" => [
            "pending" => "<em>Pending</em>",
            "no_data" => "<em>Not available</em>"
        ],
        "common" => [
            "yes" => "Yes",
            "no" => "No"
        ]
    ],


    "employee_dashboard" => [
        "title" => "Employee Dashboard",
        "welcome" => "Welcome",
        "section_account_role" => "Account and Role Information",
        "label_full_name" => "Full Name",
        "label_email" => "Email",
        "label_phone" => "Phone",
        "section_employment" => "Employment Details",
        "label_employee_id" => "Employee ID",
        "label_position" => "Position",
        "label_hire_date" => "Hire Date",
        "label_not_available" => "N/A",
        "section_terminals" => "Assigned Terminals",
        "terminal_assigned_text" => "You are assigned to the following terminals:",
        "terminal_id_label" => "Terminal",
        "terminal_name_unknown" => "Unknown Name",
        "terminal_location_label" => "Location",
        "terminal_location_unspecified" => "Unspecified Address",
        "no_terminal_assigned" => "You currently have no assigned terminals. Contact your manager.",
    ],

    "employee_edit" => [
        "page_title" => "Edit Employee",
        "header_prefix" => "Editing :",
        "label_role" => "Role/Position",
        "label_hire_date" => "Hire Date",
        "instruction_text" => "Please edit the following employment information:",
        "button_submit" => "Save Changes",
        "button_delete" => "Delete Account",
        "debug_error_title" => "🛑 Employee Information Loading Error",
        "debug_error_text" => "Employee information could not be loaded.",
        "debug_error_content_title" => "Content of employee:",
        "delete_confirm_prompt" => "Are you sure you want to DELETE the account of employee %s (#%s)? This action is irreversible.",
        "delete_confirm_default" => "This employee",
    ],

    "employee_list" => [
        "page_title" => "Employee Management",
        "button_add" => "Add Employee",
        "table_header" => [
            "full_name" => "Full Name",
            "role" => "Role",
            "email" => "Email",
            "phone" => "Phone",
            "status" => "Status",
            "actions" => "Actions",
        ],
        "role" => [
            "manager" => "Manager",
            "dispatcher" => "Dispatcher",
            "delivery_driver" => "Delivery Driver",
            "unknown" => "Unknown",
        ],
        "status" => [
            "online" => "Online 🟢",
            "inactive" => "Inactive",
            "never_connected" => "Never Connected",
        ],
        "no_employees_found" => "No employees found.",
        "action_edit" => "Edit ✏️",
        "action_edit_title" => "Edit Employee",
    ],

    "package_list" => [
        "page_title" => "Package Management",
        "search_placeholder" => "Package Code or Location...",
        "search_button" => "Search",
        "reset_button" => "Reset",
        "table_header" => [
            "code" => "Package Code",
            "infos" => "Info",
            "weight" => "Weight (kg)",
            "location" => "Location",
            "destination" => "Destination",
            "status" => "Status",
            "entry" => "Entry",
            "exit" => "Exit",
            "estimated_delivery" => "Estimated Delivery",
        ],
        "no_packages_found" => "No packages found.",
        "info_fragile" => "Fragile ⚠️",
        "info_refrigerated" => "Refrigerated ❄️",
        "location_not_stored" => "Not Stored",
        "destination_na" => "N/A",
        "pagination_prev" => "« Previous",
        "pagination_next" => "Next »",
        "pagination_summary_prefix" => "Page",
        "pagination_summary_middle" => "of",
        "pagination_summary_suffix" => "(Total:",
    ],

    "status_display" => [
        "in_storage" => "In Storage",
        "outbound" => "Out for Delivery",
        "delivered" => "Delivered",
        "picked_up" => "Picked Up",
        "cancelled" => "Cancelled",
        "unknown" => "Unknown",
    ],

    "employee_create" => [
        "page_title" => "Add Employee",
        "main_header" => "➕ Add New Employee (Account Association)",
        "description" => "Please provide the email of an existing user to associate it with an employee role and then set their employment information.",
        "error_prefix" => "Error Creating:",
        "section_user_account" => "User Account",
        "label_email" => "Existing User Email:",
        "placeholder_email" => "Ex: name.surname@company.com",
        "hint_email" => "This user must already exist in the database.",
        "section_employment_info" => "Employment Information",
        "label_position" => "Position/Role:",
        "option_select_position" => "-- Select Position --",
        "label_hire_date" => "Hire Date:",
        "button_cancel" => "Cancel",
        "button_submit" => "✅ Add Employee",
    ],


];
