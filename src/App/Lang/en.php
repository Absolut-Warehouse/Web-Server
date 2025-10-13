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
                "form_placeholder" => "Your Package ID",
                "form_button" => "Track",
            ],

            "security" => [
                "title" => "Track Your Package",
                "text" => "In the hands of our employees, your package will be <strong>secure</strong>. We will deliver your package as quickly as possible. You can check estimates by tracking your package in your account or simply enter your package ID in the search bar.",
                "alt_img" => "Warehouse illustration",
            ],

            "contact" => [
                "title" => "Find Us",
                "text_address" => "<strong>Address:</strong> 123 Example Street, 75000 Paris, France",
                "text_phone" => "<strong>Phone:</strong> +33 0 00 00 00 00",
            ],
        ],
    ],

    "FAQ" => [
        "title" => "FAQ",
        "meta_desc" => "Questions and Answers Page",
        "content" => [
            "block-1" => [
                "title" => "How can I track my order?",
                "text" => "Once your order is shipped, you will receive a tracking number by email. You can use it on our website to track the delivery status in real time."
            ],
            "block-2" => [
                "title" => "What are the delivery times?",
                "text" => "Delivery times depend on your location and the chosen shipping method. Standard orders usually arrive within 3 to 5 business days, while express delivery arrives within 24 to 48 hours."
            ],
            "block-3" => [
                "title" => "Can I change my delivery address?",
                "text" => "Yes, as long as your order has not been shipped yet. Log in to your account and modify the address in the 'My Orders' section."
            ],
            "block-4" => [
                "title" => "What should I do if my order is damaged or lost?",
                "text" => "Contact our customer service within 48 hours of receiving the order. We will offer you a replacement or a refund depending on the situation."
            ],
            "block-5" => [
                "title" => "Can I track my package from abroad?",
                "text" => "Yes, our tracking works internationally. You can enter your tracking number on our website or the partner carrier's website to see the current status of your package."
            ],
            "block-6" => [
                "title" => "What are the shipping fees?",
                "text" => "Fees vary depending on the weight, size of your package, and delivery distance. They are clearly displayed during checkout and before payment."
            ],
            "block-7" => [
                "title" => "Can I cancel my order?",
                "text" => "You can cancel your order as long as it has not been shipped yet. After shipment, follow the return procedure or contact our customer service."
            ],
        ],
    ],

    "contact" => [
        "title" => "Contact",
        "meta_desc" => "Questions and Answers Page",
        "content" => [
            "title" => "Our Contacts",
            "mail" =>"Email: No email",
            "github" =>"Github: https://github.com/Orange-Box-Warehouse",
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
                "text" => "Our mission mainly involves setting up a web server, an application server, a database, and a client application."
            ],
            "project" => [
                "title" => "Our Project",
                "text" => "For this mission, we developed a functional warehouse capable of efficiently managing incoming and outgoing packages."
            ],
            "project_list" => [
                "title" => "Project Components",
                "items" => [
                    ["icon" => "🌐", "text" => "Web server for displaying some data and creating other data."],
                    ["icon" => "🖥️", "text" => "Application server for processing orders."],
                    ["icon" => "💾", "text" => "Database for storing information about packages and users."],
                    ["icon" => "📱", "text" => "Client application to allow interaction with the warehouse management system."]
                ]
            ],
            "goal" => [
                "title" => "Educational Objective",
                "text" => "The goal of the project is to learn how a database (PostgreSQL) works while using it, and also to implement our own network protocol between the server and client application."
            ]
        ]
    ],

    "myaccount" => [
        "title" => "My Account",
        "meta_desc" => "User account page",
        "content" => [

        ],
    ],

    "search" => [
        "title" => "Search",
        "meta_desc" => "Search for an order or package",
        "content" => [
            "intro" => [
                "title" => "Track Your Package",
                "text" => "Enter your package ID below to track its status in real time."
            ],
            "form" => [
                "placeholder" => "Package ID",
                "button" => "Track"
            ],
            "status_labels" => [
                "arrived" => "Arrived at the warehouse:",
                "departed" => "Departed from the warehouse:",
                "estimated" => "Estimated delivery:",
                "current_status" => "Current status:",
                "not_found" => "Order not found."
            ]
        ]
    ],

    "signin" => [
        "title" => "Sign In",
        "meta_desc" => "User login page",
        "content" => [
            "title" => "Sign In",
            "email_label" => "Email Address",
            "email_placeholder" => "Enter your email",
            "password_label" => "Password",
            "password_placeholder" => "Your password",
            "submit_button" => "Sign In",
            "signup_link" => "No account?"
        ]
    ],

    "signup" => [
        "title" => "Sign Up",
        "meta_desc" => "User registration page",
        "content" => [
            "title" => "Sign Up",
            "name_label" => "Full Name",
            "name_placeholder" => "Your Name",
            "email_label" => "Email Address",
            "email_placeholder" => "Enter your email",
            "password_label" => "Password",
            "password_placeholder" => "Create a password",
            "submit_button" => "Sign Up",
            "signin_link" => "Already have an account?"
        ]
    ],

    "team" => [
        "title" => "Team",
        "meta_desc" => "Page presenting the team members",
        "content" => [
            "title" => "Our Team",
            "description" => "Our team is composed of three people for this fictional project. We are all third-year students at Cergy Pontoise University.",
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
        "meta_desc" => "Technical information about the connection and the server",
        "intro" => "Technical information about the connection and the server environment.",
        "labels" => [
            "ip" => "IP Address",
            "browser" => "Browser",
            "server_time" => "Server Time",
            "php_version" => "PHP",
            "memory_limit" => "Memory",
            "server_software" => "Server",
            "protocol" => "Protocol / Method",
            "headers" => "Headers",
            "extensions" => "Loaded PHP Extensions",
            "extensions_count" => "extensions",
            "extra" => "Other Info",
            "accept_language" => "Accept-Language",
            "referer" => "Referer",
            "remote_port" => "Remote Port",
            "server_name" => "Server Name",
            "none" => "None"
        ],
        "note" => "The displayed information is retrieved from HTTP headers and the PHP environment. Avoid sharing sensitive data."
    ],


    "error" => [
        "title" => "Error",
        "meta_desc" => "Error page",
        "content" => [
            "code" => "???",
            "message" => "Unknown error.",
            "back_home" => "Back to Home"
        ]
    ],

];
