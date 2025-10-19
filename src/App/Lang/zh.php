<?php
return [
    "header" => [
        "myaccount" => "我的账户",
        "signup" => "注册",
        "signin" => "登录",
        "language" => "语言",
        "english" => "英语",
        "french" => "法语",
        "chinese" => "中文",
        "german" => "德语",
        "spanish" => "西班牙语",
        "mission" => "使命",
        "team" => "团队",
        "subject" => "主题",
        "tech" => "技术",
    ],

    "footer" => [
        "contact" => "联系",
        "FAQ" => "常见问题",
        "contact_list" => "联系人列表",
        "network" => "社交网络",
        "github" => "GitHub",
        "linkedin" => "LinkedIn",
        "right_reserved" => "版权所有。"
    ],

    "home" => [
        "title" => "首页",
        "meta_desc" => "主页",
        "content" => [
            "package" => [
                "title" => "查找您的包裹",
                "text" => "通过输入邮件中提供的包裹追踪ID来查找您的包裹。",
                "form_placeholder" => "您的包裹ID",
                "form_button" => "搜索",
            ],

            "security" => [
                "title" => "查找您的包裹",
                "text" => "在我们员工手中，您的包裹将被<strong>安全</strong>保管。我们会尽快送达。您可以通过在账户中查找包裹或在搜索栏中输入包裹ID来查看预计时间。",
                "alt_img" => "仓库示意图",
            ],

            "contact" => [
                "title" => "联系我们",
                "text_address" => "<strong>地址：</strong>法国巴黎75000示例街123号",
                "text_phone" => "<strong>电话：</strong>+33 0 00 00 00 00",
            ],
        ],
    ],

    "FAQ" => [
        "title" => "常见问题",
        "meta_desc" => "问题解答页面",
        "content" => [
            "block-1" => [
                "title" => "如何追踪我的订单？",
                "text" => "订单发货后，您会收到一个追踪号码的邮件。您可以在我们的网站上使用它实时跟踪订单状态。"
            ],
            "block-2" => [
                "title" => "配送时间是多少？",
                "text" => "配送时间取决于您的位置和选择的配送方式。标准订单通常在3-5个工作日内送达，快递在24-48小时内送达。"
            ],
            "block-3" => [
                "title" => "我可以修改收货地址吗？",
                "text" => "可以，只要订单尚未发货。登录您的账户，在“我的订单”中修改地址。"
            ],
            "block-4" => [
                "title" => "如果我的订单损坏或丢失怎么办？",
                "text" => "请在收到订单后48小时内联系客服。我们会根据情况提供换货或退款。"
            ],
            "block-5" => [
                "title" => "我可以从国外追踪包裹吗？",
                "text" => "可以，我们的追踪服务支持国际。您可以在我们网站或合作承运商网站上输入追踪号码查看包裹状态。"
            ],
            "block-6" => [
                "title" => "配送费用是多少？",
                "text" => "费用根据包裹重量、大小和配送距离而异。结账时会明确显示，付款前可查看。"
            ],
            "block-7" => [
                "title" => "我可以取消订单吗？",
                "text" => "只要订单未发货，您可以取消。发货后请按照退货流程或联系客服。"
            ],

        ],
    ],

    "contact" => [
        "title" => "联系",
        "meta_desc" => "联系页面",
        "content" => [
            "title" => "我们的联系方式",
            "mail" =>"邮箱: 无",
            "github" =>"GitHub: https://github.com/Absolut-Warehouse/",
            "instagram" => "Instagram: 无",
            "twitter" => "Twitter: 无",
            "facebook" => "Facebook: 无",
            "linkedin" => "LinkedIn",
            "linkedin1" => "<a href='https://www.linkedin.com/in/gauthier-defrance/'>Gauthier</a>",
            "linkedin2" => "<a href='https://www.linkedin.com/in/thomas-hornung-365ab8381/'>Thomas</a>",
            "linkedin3" => "<a href='#linkedin'>Hoahan</a>",
        ],
    ],

    "mission" => [
        "title" => "使命",
        "meta_desc" => "任务和项目描述",
        "content" => [
            "intro" => [
                "title" => "我们的使命",
                "text" => "我们的使命主要是搭建一个Web服务器、应用服务器、数据库和客户端应用。"
            ],
            "project" => [
                "title" => "我们的项目",
                "text" => "本次任务中，我们开发了一个功能齐全的仓库，能够高效管理进出包裹。"
            ],
            "project_list" => [
                "title" => "项目组件",
                "items" => [
                    ["icon" => "🌐", "text" => "Web服务器，用于显示和创建数据。"],
                    ["icon" => "🖥️", "text" => "应用服务器，用于处理订单。"],
                    ["icon" => "💾", "text" => "数据库，用于存储包裹和用户信息。"],
                    ["icon" => "📱", "text" => "客户端应用，用于与仓库管理系统交互。"]
                ]
            ],
            "goal" => [
                "title" => "教育目标",
                "text" => "项目目标是学习数据库（PostgreSQL）的工作原理并使用它，同时在服务器与客户端之间实现自定义网络协议。"
            ]
        ]
    ],

    "myaccount" => [
        "title" => "我的账户",
        "meta_desc" => "用户账户页面",
        "content" => [],
    ],

    "search" => [
        "title" => "搜索",
        "meta_desc" => "搜索订单或包裹",
        "content" => [
            "intro" => [
                "title" => "追踪您的包裹",
                "text" => "在下方输入您的包裹编号，以便实时 <strong>跟踪</strong> 状态。"
            ],
            "form" => [
                "placeholder" => "您的包裹编号",
                "button" => "搜索"
            ],
            "status_labels" => [
                "package_code" => "包裹代码",
                "refrigerated" => "冷藏",
                "fragile" => "易碎",
                "weight" => "重量",
                "arrived_at" => "到达仓库",
                "departed_at" => "离开仓库",
                "estimated_delivery" => "预计送达",
                "status" => "当前状态",
                "not_found" => "<em>未找到订单。</em>"
            ]
        ]
    ],


    "signin" => [
        "title" => "登录",
        "meta_desc" => "用户登录页面",
        "content" => [
            "title" => "登录",
            "email_label" => "电子邮箱",
            "email_placeholder" => "输入您的邮箱",
            "password_label" => "密码",
            "password_placeholder" => "您的密码",
            "submit_button" => "登录",
            "signup_link" => "没有账户？",
        ]
    ],

    "signup" => [
        "title" => "注册",
        "meta_desc" => "用户注册页面",
        "content" => [
            "title" => "注册",
            "name_label" => "您的名字",
            "name_content" => "您的名字",
            "surname_label" => "您的姓氏",
            "surname_content" => "您的姓氏",
            "email_label" => "电子邮箱",
            "email_placeholder" => "输入您的邮箱",
            "password_label" => "密码",
            "password_2_label" => "重复密码",
            "password_placeholder" => "密码",
            "submit_button" => "注册",
            "signin_link" => "已有账户？"
        ]
    ],

    "team" => [
        "title" => "团队",
        "meta_desc" => "团队成员页面",
        "content" => [
            "title" => "我们的团队",
            "description" => "本项目团队由三人组成，均为Cergy-Pontoise大学三年级学生。",
            "members" => [
                [
                    "name" => "Thomas Hornung",
                    "mission" => "主要任务："
                ],
                [
                    "name" => "Hoahan Yu",
                    "mission" => "主要任务："
                ],
                [
                    "name" => "Gauthier Defrance",
                    "mission" => "主要任务：网站"
                ],
            ]
        ]
    ],

    "tech" => [
        "title" => "技术",
        "meta_desc" => "连接和服务器的技术信息",
        "intro" => "连接和服务器环境的技术信息。",
        "labels" => [
            "ip" => "IP地址",
            "browser" => "浏览器",
            "server_time" => "服务器时间",
            "php_version" => "PHP版本",
            "memory_limit" => "内存",
            "server_software" => "服务器",
            "protocol" => "协议/方法",
            "headers" => "请求头",
            "extensions" => "加载的PHP扩展",
            "extensions_count" => "扩展",
            "extra" => "其他信息",
            "accept_language" => "Accept-Language",
            "referer" => "Referer",
            "remote_port" => "远程端口",
            "server_name" => "服务器名称",
            "none" => "无"
        ],
        "note" => "显示的信息来自HTTP头和PHP环境，请勿分享敏感数据。"
    ],

    "error" => [
        "title" => "错误",
        "meta_desc" => "错误页面",
        "content" => [
            "code" => "???",
            "message" => "未知错误。",
            "back_home" => "返回首页",
            "not_correct_search" => "订单号无效。",
            "missing_fields" => "所有字段均为必填。",
            "bad_information" => "邮箱或密码错误。",
            "already_used_mail" => "此邮箱已被使用",
            "password_too_short" => "密码至少6位。",
            "passwords_not_match" => "密码不匹配。",
        ]
    ],

    "account" => [
        "title" => "我的账户",
        "meta_desc" => "用户账户管理页面",
        "content" => [
            "profile_title" => "用户资料",
            "label_name" => "姓名",
            "label_firstname" => "名",
            "label_email" => "邮箱",
            "label_phone" => "电话",
            "label_gender" => "性别",
            "gender_male" => "男",
            "gender_female" => "女",
            "gender_other" => "其他",
            "update_profile_btn" => "更新",
            "update_profile_success" => "资料更新成功。",
            "update_profile_error" => "更新资料时发生错误。",

            "address_title" => "地址",
            "address_line1" => "地址行1",
            "address_line2" => "地址行2",
            "city" => "城市",
            "postal_code" => "邮编",
            "country" => "国家",
            "update_address_btn" => "更新地址",
            "no_address_defined" => "未定义",
            "update_address_success" => "地址更新成功。",
            "update_address_error" => "保存地址时发生错误。",
            "address_missing_fields" => "请填写地址所有必填字段。",

            "delete_account_btn" => "删除账户",
            "delete_account_confirm" => "确定要删除您的账户吗？",
            "delete_account_success" => "您的账户已删除。",
            "delete_account_error" => "删除账户时发生错误。",

            "error_title" => "错误",
            "success_title" => "成功",
        ]
    ],

    "orders" => [
        "title" => "我的包裹",
        "no_packages" => "<em>您没有包裹。</em>",
        "table" => [
            "order_id" => "订单编号",
            "package_code" => "包裹代码",
            "refrigerated" => "冷藏",
            "fragile" => "易碎",
            "weight" => "重量 (kg)",
            "status" => "状态",
            "entry_time" => "入库时间",
            "exit_time" => "出库时间",
            "estimated_delivery" => "预计送达"
        ],
        "status" => [
            "in_storage" => "<span class='status in_storage'>存储中</span>",
            "outbound" => "<span class='status outbound'>运输中</span>",
            "delivered" => "<span class='status delivered'>已送达</span>",
            "picked_up" => "<span class='status picked_up'>已取货</span>"
        ],
        "status_texts" => [
            "pending" => "<em>等待中</em>",
            "no_data" => "<em>不可用</em>"
        ],
        "common" => [
            "yes" => "是",
            "no" => "否"
        ]
    ],

];
