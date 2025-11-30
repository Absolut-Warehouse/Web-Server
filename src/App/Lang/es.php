<?php
return [
    "header" => [
        "myaccount" => "Mi Cuenta",
        "signup" => "Registrarse",
        "signin" => "Iniciar Sesión",
        "language" => "Idioma",
        "english" => "Inglés",
        "french" => "Francés",
        "chinese" => "Chino",
        "german" => "Alemán",
        "spanish" => "Español",
        "mission" => "Objetivo",
        "team" => "Nuestro Equipo",
        "subject" => "Tema",
        "tech" => "Técnico",
        "logout" => "Cerrar Sesión",
        "myorders" => "Mis Pedidos",
        "employee_menu" => "Área de Empleados",
        "dashboard" => "Panel de Control",
        "package_list" => "Lista de Paquetes",
        "manage_employees" => "Gestión de Empleados",
    ],

    "footer" => [
        "contact" => "Contacto",
        "FAQ" => "Preguntas frecuentes",
        "contact_list" => "Lista de contactos",
        "network" => "Redes",
        "github" => "GitHub",
        "linkedin" => "LinkedIn",
        "right_reserved" => "Todos los derechos reservados."
    ],

    "home" => [
        "title" => "Inicio",
        "meta_desc" => "Página principal",
        "content" => [
            "package" => [
                "title" => "Buscar su paquete",
                "text" => "Encuentre su paquete ingresando el ID de seguimiento enviado por correo electrónico.",
                "form_placeholder" => "ID de su paquete",
                "form_button" => "Buscar",
            ],

            "security" => [
                "title" => "Buscar su paquete",
                "text" => "En manos de nuestros empleados, su paquete estará <strong>seguro</strong>. Lo entregaremos lo antes posible. Puede consultar las estimaciones buscando su paquete en su cuenta o ingresando simplemente el ID en la barra de búsqueda.",
                "alt_img" => "Ilustración de un almacén",
            ],

            "contact" => [
                "title" => "Encuéntranos",
                "text_address" => "<strong>Dirección:</strong> 123 Rue de l’Exemple, 75000 París, Francia",
                "text_phone" => "<strong>Teléfono:</strong> +33 0 00 00 00 00",
            ],

            "marketing_switch" => [
                "prefix" => "SU PAQUETE",
                "suffix" => "¡GARANTIZADO!",
                "flip_phrases" => [
                    "A TIEMPO",
                    "SEGURO",
                    "EN CUALQUIER LUGAR DEL MUNDO"
                ]
            ],

        ],
    ],

    "FAQ" => [
        "title" => "Preguntas frecuentes",
        "meta_desc" => "Página de preguntas y respuestas",
        "content" => [
            "block-1" => [
                "title" => "¿Cómo puedo rastrear mi pedido?",
                "text" => "Una vez que su pedido sea enviado, recibirá un número de seguimiento por correo electrónico. Puede usarlo en nuestro sitio web para seguir el estado de su entrega en tiempo real."
            ],
            "block-2" => [
                "title" => "¿Cuáles son los tiempos de entrega?",
                "text" => "Los tiempos dependen de su ubicación y del método de entrega elegido. Los pedidos estándar suelen llegar en 3-5 días hábiles, mientras que la entrega express llega en 24-48 horas."
            ],
            "block-3" => [
                "title" => "¿Puedo cambiar mi dirección de entrega?",
                "text" => "Sí, siempre que su pedido no haya sido enviado. Inicie sesión en su cuenta y modifique la dirección en la sección 'Mis pedidos'."
            ],
            "block-4" => [
                "title" => "¿Qué hacer si mi pedido está dañado o se pierde?",
                "text" => "Contacte a nuestro servicio al cliente dentro de las 48 horas posteriores a la recepción. Le ofreceremos un intercambio o reembolso según la situación."
            ],
            "block-5" => [
                "title" => "¿Puedo rastrear mi paquete desde el extranjero?",
                "text" => "Sí, nuestro seguimiento funciona internacionalmente. Puede ingresar su número de seguimiento en nuestro sitio o en el sitio del transportista asociado."
            ],
            "block-6" => [
                "title" => "¿Cuáles son los costos de envío?",
                "text" => "Los costos varían según el peso, tamaño del paquete y distancia de entrega. Se muestran claramente durante el pago antes de finalizar la compra."
            ],
            "block-7" => [
                "title" => "¿Puedo cancelar mi pedido?",
                "text" => "Puede cancelar su pedido siempre que no haya sido enviado. Después del envío, siga el procedimiento de devolución o contacte a nuestro servicio al cliente."
            ],

        ],
    ],

    "contact" => [
        "title" => "Contacto",
        "meta_desc" => "Página de contacto",
        "content" => [
            "title" => "Nuestros contactos",
            "mail" =>"Email: No disponible",
            "github" =>"GitHub: https://github.com/Absolut-Warehouse/",
            "instagram" => "Instagram: No disponible",
            "twitter" => "Twitter: No disponible",
            "facebook" => "Facebook: No disponible",
            "linkedin" => "LinkedIn",
            "linkedin1" => "<a href='https://www.linkedin.com/in/gauthier-defrance/'>Gauthier</a>",
            "linkedin2" => "<a href='https://www.linkedin.com/in/thomas-hornung-365ab8381/'>Thomas</a>",
            "linkedin3" => "<a href='#linkedin'>Hoahan</a>",
        ],
    ],

    "mission" => [
        "title" => "Misión",
        "meta_desc" => "Descripción de la misión y del proyecto",
        "content" => [
            "intro" => [
                "title" => "Nuestra misión",
                "text" => "Nuestra misión consiste principalmente en configurar un servidor web, un servidor de aplicaciones, una base de datos y un cliente de aplicación."
            ],
            "project" => [
                "title" => "Nuestro proyecto",
                "text" => "Para esta misión, desarrollamos un almacén funcional capaz de gestionar paquetes entrantes y salientes de manera eficiente."
            ],
            "project_list" => [
                "title" => "Componentes del proyecto",
                "items" => [
                    ["icon" => "🌐", "text" => "Servidor web para mostrar y crear ciertos datos."],
                    ["icon" => "🖥️", "text" => "Servidor de aplicaciones para procesar pedidos."],
                    ["icon" => "💾", "text" => "Base de datos para almacenar información de paquetes y usuarios."],
                    ["icon" => "📱", "text" => "Cliente de aplicación para interactuar con el sistema de gestión del almacén."]
                ]
            ],
            "goal" => [
                "title" => "Objetivo educativo",
                "text" => "El objetivo del proyecto es aprender cómo funciona una base de datos (PostgreSQL) mientras se utiliza, y crear nuestro propio protocolo de red entre el servidor y el cliente de aplicación."
            ]
        ]
    ],

    "myaccount" => [
        "title" => "Mi Cuenta",
        "meta_desc" => "Página de usuario",
        "content" => [],
    ],

    "search" => [
        "title" => "Buscar",
        "meta_desc" => "Buscar un pedido o paquete",
        "content" => [
            "intro" => [
                "title" => "Rastrear su paquete",
                "text" => "Ingrese el ID de su paquete a continuación para seguir su estado en <strong>tiempo real</strong>."
            ],
            "form" => [
                "placeholder" => "ID de su paquete",
                "button" => "Buscar"
            ],
            "status_labels" => [
                "package_code" => "Código del paquete",
                "refrigerated" => "Refrigerado",
                "fragile" => "Frágil",
                "weight" => "Peso",
                "arrived_at" => "Llegada al almacén",
                "departed_at" => "Salida del almacén",
                "estimated_delivery" => "Entrega estimada",
                "status" => "Estado actual",
                "not_found" => "<em>Pedido no encontrado.</em>"
            ]
        ]
    ],


    "signin" => [
        "title" => "Iniciar sesión",
        "meta_desc" => "Página de inicio de sesión",
        "content" => [
            "title" => "Iniciar sesión",
            "email_label" => "Correo electrónico",
            "email_placeholder" => "Ingrese su correo",
            "password_label" => "Contraseña",
            "password_placeholder" => "Su contraseña",
            "submit_button" => "Iniciar sesión",
            "signup_link" => "¿No tiene cuenta?",
        ]
    ],

    "signup" => [
        "title" => "Registrarse",
        "meta_desc" => "Página de registro",
        "content" => [
            "title" => "Registrarse",
            "name_label" => "Su nombre",
            "name_content" => "Su nombre",
            "surname_label" => "Su apellido",
            "surname_content" => "Su apellido",
            "email_label" => "Correo electrónico",
            "email_placeholder" => "Ingrese su correo",
            "password_label" => "Contraseña",
            "password_2_label" => "Repita su contraseña",
            "password_placeholder" => "Contraseña",
            "submit_button" => "Registrarse",
            "signin_link" => "¿Ya tiene cuenta?"
        ]
    ],

    "team" => [
        "title" => "Equipo",
        "meta_desc" => "Página de miembros del equipo",
        "content" => [
            "title" => "Nuestro equipo",
            "description" => "Nuestro equipo está compuesto por tres personas para este proyecto ficticio. Todos somos estudiantes de tercer año en la Universidad de Cergy-Pontoise.",
            "members" => [
                [
                    "name" => "Thomas Hornung",
                    "mission" => "Misión principal:"
                ],
                [
                    "name" => "Hoahan Yu",
                    "mission" => "Misión principal:"
                ],
                [
                    "name" => "Gauthier Defrance",
                    "mission" => "Misión principal: Sitio web"
                ],
            ]
        ]
    ],

    "tech" => [
        "title" => "Técnico",
        "meta_desc" => "Información técnica sobre conexión y servidor",
        "intro" => "Información técnica sobre la conexión y el entorno del servidor.",
        "labels" => [
            "ip" => "Dirección IP",
            "browser" => "Navegador",
            "server_time" => "Hora del servidor",
            "php_version" => "PHP",
            "memory_limit" => "Memoria",
            "server_software" => "Servidor",
            "protocol" => "Protocolo / Método",
            "headers" => "Encabezados",
            "extensions" => "Extensiones PHP cargadas",
            "extensions_count" => "extensiones",
            "extra" => "Otra información",
            "accept_language" => "Accept-Language",
            "referer" => "Referer",
            "remote_port" => "Puerto remoto",
            "server_name" => "Nombre del servidor",
            "none" => "Ninguno"
        ],
        "note" => "La información mostrada se obtiene de los encabezados HTTP y del entorno PHP. Evite compartir datos sensibles."
    ],

    "error" => [
        "title" => "Error",
        "meta_desc" => "Página de error",
        "content" => [
            "code" => "???",
            "message" => "Error desconocido.",
            "back_home" => "Volver a inicio",
            "not_correct_search" => "Número de pedido inválido.",
            "missing_fields" => "Todos los campos son obligatorios.",
            "bad_information" => "Correo o contraseña incorrectos.",
            "already_used_mail" => "Este correo ya está en uso",
            "password_too_short" => "La contraseña debe tener al menos 6 caracteres.",
            "passwords_not_match" => "Las contraseñas no coinciden.",
        ]
    ],

    "account" => [
        "title" => "Mi Cuenta",
        "meta_desc" => "Página de gestión de cuenta de usuario",
        "content" => [
            "profile_title" => "Perfil de usuario",
            "label_name" => "Nombre",
            "label_firstname" => "Apellido",
            "label_email" => "Correo electrónico",
            "label_phone" => "Teléfono",
            "label_gender" => "Género",
            "gender_male" => "Hombre",
            "gender_female" => "Mujer",
            "gender_other" => "Otro",
            "update_profile_btn" => "Actualizar",
            "update_profile_success" => "Perfil actualizado correctamente.",
            "update_profile_error" => "Ocurrió un error al actualizar el perfil.",

            "address_title" => "Dirección",
            "address_line1" => "Dirección línea 1",
            "address_line2" => "Dirección línea 2",
            "city" => "Ciudad",
            "postal_code" => "Código postal",
            "country" => "País",
            "update_address_btn" => "Actualizar dirección",
            "no_address_defined" => "No definida",
            "update_address_success" => "Dirección actualizada correctamente.",
            "update_address_error" => "Ocurrió un error al guardar la dirección.",
            "address_missing_fields" => "Por favor complete todos los campos obligatorios.",

            "delete_account_btn" => "Eliminar mi cuenta",
            "delete_account_confirm" => "¿Está seguro de que desea eliminar su cuenta?",
            "delete_account_success" => "Su cuenta ha sido eliminada.",
            "delete_account_error" => "Ocurrió un error al eliminar la cuenta.",

            "error_title" => "Error",
            "success_title" => "Éxito",
        ]
    ],

    "orders" => [
        "title" => "Mis Paquetes",
        "no_packages" => "<em>No tiene paquetes.</em>",
        "table" => [
            "order_id" => "ID Pedido",
            "package_code" => "Código del Paquete",
            "refrigerated" => "Refrigerado",
            "fragile" => "Frágil",
            "weight" => "Peso (kg)",
            "status" => "Estado",
            "entry_time" => "Entrada",
            "exit_time" => "Salida",
            "estimated_delivery" => "Entrega Estimada"
        ],
        "status" => [
            "in_storage" => "<span class='status in_storage'>En Almacén</span>",
            "outbound" => "<span class='status outbound'>En Tránsito</span>",
            "delivered" => "<span class='status delivered'>Entregado</span>",
            "picked_up" => "<span class='status picked_up'>Recogido</span>"
        ],
        "status_texts" => [
            "pending" => "<em>En espera</em>",
            "no_data" => "<em>No disponible</em>"
        ],
        "common" => [
            "yes" => "Sí",
            "no" => "No"
        ]
    ],


    "employee_dashboard" => [
        "title" => "Tablero de Empleados",
        "welcome" => "Bienvenido",
        "section_account_role" => "Información de Cuenta y Rol",
        "label_full_name" => "Nombre Completo",
        "label_email" => "Correo Electrónico",
        "label_phone" => "Teléfono",
        "section_employment" => "Detalles del Empleo",
        "label_employee_id" => "ID del Empleado",
        "label_position" => "Puesto",
        "label_hire_date" => "Fecha de Contratación",
        "label_not_available" => "No Disponible",
        "section_terminals" => "Terminales Asignados",
        "terminal_assigned_text" => "Estás asignado(a) a los siguientes terminales:",
        "terminal_id_label" => "Terminal",
        "terminal_name_unknown" => "Nombre Desconocido",
        "terminal_location_label" => "Ubicación",
        "terminal_location_unspecified" => "Dirección no especificada",
        "no_terminal_assigned" => "Actualmente no tienes ningún terminal asignado. Contacta a tu administrador.",
    ],

    "employee_edit" => [
        "page_title" => "Editar Empleado",
        "header_prefix" => "Edición de :",
        "label_role" => "Rol/Puesto",
        "label_hire_date" => "Fecha de Contratación",
        "instruction_text" => "Por favor, edita la siguiente información del empleo:",
        "button_submit" => "Guardar Cambios",
        "button_delete" => "Eliminar Cuenta",
        "debug_error_title" => "🛑 Error al Cargar la Información del Empleado",
        "debug_error_text" => "No se pudo cargar la información del empleado.",
        "debug_error_content_title" => "Contenido de employee:",
        "delete_confirm_prompt" => "¿Estás seguro de que deseas ELIMINAR la cuenta del empleado %s (#%s)? Esta acción es irreversible.",
        "delete_confirm_default" => "Este empleado",
    ],

    "employee_list" => [
        "page_title" => "Gestión de Empleados",
        "button_add" => "Añadir Empleado",
        "table_header" => [
            "full_name" => "Nombre Completo",
            "role" => "Rol",
            "email" => "Correo Electrónico",
            "phone" => "Teléfono",
            "status" => "Estado",
            "actions" => "Acciones",
        ],
        "role" => [
            "manager" => "Gerente",
            "dispatcher" => "Despachador",
            "delivery_driver" => "Conductor de Entrega",
            "unknown" => "Desconocido",
        ],
        "status" => [
            "online" => "En Línea 🟢",
            "inactive" => "Inactivo",
            "never_connected" => "Nunca Conectado",
        ],
        "no_employees_found" => "No se encontraron empleados.",
        "action_edit" => "Editar ✏️",
        "action_edit_title" => "Editar Empleado",
    ],

    "package_list" => [
        "page_title" => "Gestión de Paquetes",
        "search_placeholder" => "Código de Paquete o Ubicación...",
        "search_button" => "Buscar",
        "reset_button" => "Restablecer",
        "table_header" => [
            "code" => "Código del Paquete",
            "infos" => "Información",
            "weight" => "Peso (kg)",
            "location" => "Ubicación",
            "destination" => "Destino",
            "status" => "Estado",
            "entry" => "Entrada",
            "exit" => "Salida",
            "estimated_delivery" => "Entrega Estimada",
        ],
        "no_packages_found" => "No se encontraron paquetes.",
        "info_fragile" => "Frágil ⚠️",
        "info_refrigerated" => "Refrigerado ❄️",
        "location_not_stored" => "No Almacenado",
        "destination_na" => "N/D",
        "pagination_prev" => "« Anterior",
        "pagination_next" => "Siguiente »",
        "pagination_summary_prefix" => "Página",
        "pagination_summary_middle" => "de",
        "pagination_summary_suffix" => "(Total:",
    ],

    "status_display" => [
        "in_storage" => "En Almacén",
        "outbound" => "En Envío",
        "delivered" => "Entregado",
        "picked_up" => "Recogido",
        "cancelled" => "Cancelado",
        "unknown" => "Desconocido",
    ],

    "employee_create" => [
        "page_title" => "Añadir Empleado",
        "main_header" => "➕ Añadir Nuevo Empleado (Asociar Cuenta)",
        "description" => "Proporcione el correo electrónico de un usuario existente para asociarlo a un rol de empleado y luego defina su información de empleo.",
        "error_prefix" => "Error al crear:",
        "section_user_account" => "Cuenta de Usuario",
        "label_email" => "Correo Electrónico del Usuario Existente:",
        "placeholder_email" => "Ejemplo: nombre.apellido@empresa.com",
        "hint_email" => "Este usuario debe existir ya en la base de datos.",
        "section_employment_info" => "Información de Empleo",
        "label_position" => "Puesto/Rol:",
        "option_select_position" => "-- Seleccione un Puesto --",
        "label_hire_date" => "Fecha de Contratación:",
        "button_cancel" => "Cancelar",
        "button_submit" => "✅ Añadir Empleado",
    ],

];
