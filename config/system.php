<?php

return [
    // Configurações gerais do sistema
    'app' => [
        'name' => 'DevStarter Kit',
        'version' => '1.0.0',
        'description' => 'Sistema base completo para desenvolvimento rápido',
        'logo' => 'images/logo.png',
        'favicon' => 'images/favicon.ico',
    ],

    // Configurações de cores e tema
    'theme' => [
        'primary_color' => '#8B5CF6', // purple-500
        'secondary_color' => '#3B82F6', // blue-500
        'success_color' => '#10B981', // emerald-500
        'warning_color' => '#F59E0B', // amber-500
        'error_color' => '#EF4444', // red-500
        'dark_mode' => false,
    ],

    // Configurações do dashboard
    'dashboard' => [
        'items_per_page' => 10,
        'show_recent_items' => 5,
        'enable_charts' => true,
        'enable_notifications' => true,
    ],

    // Configurações de produtos
    'products' => [
        'default_status' => 'active',
        'allowed_categories' => [
            'software',
            'serviço',
            'produto físico',
            'curso',
            'consultoria',
        ],
        'max_image_size' => 2048, // KB
        'allowed_image_types' => ['jpeg', 'png', 'jpg', 'gif'],
    ],

    // Configurações de clientes
    'clients' => [
        'default_status' => 'active',
        'allowed_statuses' => ['active', 'inactive', 'pending'],
        'require_company' => false,
    ],

    // Configurações de usuários
    'users' => [
        'default_role' => 'user',
        'allowed_roles' => ['admin', 'user'],
        'require_email_verification' => false,
        'min_password_length' => 8,
    ],

    // Configurações de upload
    'uploads' => [
        'max_file_size' => 5120, // KB
        'allowed_extensions' => ['jpg', 'jpeg', 'png', 'gif', 'pdf', 'doc', 'docx'],
        'storage_disk' => 'public',
    ],

    // Configurações de email
    'mail' => [
        'from_name' => 'DevStarter Kit',
        'from_email' => 'noreply@devstarterkit.com',
        'enable_notifications' => true,
    ],

    // Configurações de paginação
    'pagination' => [
        'default_per_page' => 10,
        'per_page_options' => [5, 10, 25, 50],
    ],

    // Configurações de cache
    'cache' => [
        'enable' => true,
        'ttl' => 3600, // 1 hora
    ],

    // Configurações de logs
    'logging' => [
        'enable' => true,
        'level' => 'info',
        'channels' => ['daily'],
    ],

    // Configurações de API (futuro)
    'api' => [
        'enable' => false,
        'rate_limit' => 60, // requests per minute
        'version' => 'v1',
    ],

    // Configurações de backup
    'backup' => [
        'enable' => false,
        'frequency' => 'daily',
        'retention_days' => 30,
    ],

    // Configurações de segurança
    'security' => [
        'enable_2fa' => false,
        'session_timeout' => 120, // minutos
        'max_login_attempts' => 5,
        'lockout_duration' => 15, // minutos
    ],

    // Configurações de desenvolvimento
    'development' => [
        'debug_mode' => env('APP_DEBUG', false),
        'show_queries' => false,
        'enable_profiler' => false,
    ],
];
