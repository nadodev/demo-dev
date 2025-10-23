# DevStarter Kit - Guia de Configuração

## 📋 Visão Geral

O DevStarter Kit utiliza um **arquivo de configuração unificado** que controla tanto a **Landing Page** quanto o **Sistema Base**. Isso permite personalização completa sem necessidade de modificar código PHP ou Blade.

## 📁 Localização do Arquivo

O arquivo de configuração principal está localizado em:
```
config/devstarter.php
```

## 🔧 Como Personalizar

### 1. Informações Básicas do Sistema

```php
'app' => [
    'name' => 'Seu Sistema',                    // Nome do sistema
    'description' => 'Descrição do seu sistema', // Descrição
    'version' => '1.0.0',                       // Versão
    'author' => 'Seu Nome',                     // Autor
    'email' => 'contato@seusite.com',           // Email de contato
    'phone' => '(11) 99999-9999',               // Telefone
    'website' => 'https://seusite.com',          // Website
],
```

### 2. Landing Page - Hero Section

```php
'landing' => [
    'hero' => [
        'title' => 'Seu título principal',
        'subtitle' => 'Seu subtítulo',
        'description' => 'Descrição do seu produto',
        'cta_text' => 'Texto do botão principal',
        'cta_link' => '/register',
        'secondary_cta_text' => 'Texto do botão secundário',
        'secondary_cta_link' => '#demo',
    ],
],
```

### 3. Landing Page - Seção de Problemas

```php
'problema' => [
    'title' => 'Título da seção',
    'problems' => [
        [
            'icon' => 'M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z',
            'iconColor' => 'text-red-400',
            'iconBg' => 'bg-red-500/20',
            'title' => 'Título do problema',
            'description' => 'Descrição do problema',
        ],
    ],
],
```

### 4. Landing Page - Seção de Solução

```php
'solucao' => [
    'title' => 'Título da seção',
    'features' => [
        [
            'icon' => 'M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z',
            'iconColor' => 'text-purple-400',
            'iconBg' => 'bg-purple-500/20',
            'title' => 'Título do recurso',
            'description' => 'Descrição do recurso',
        ],
    ],
],
```

### 5. Landing Page - Depoimentos

```php
'depoimentos' => [
    'title' => 'O que nossos clientes dizem',
    'testimonials' => [
        [
            'name' => 'Nome do Cliente',
            'role' => 'Cargo/Profissão',
            'avatar' => 'N',                    // Primeira letra do nome
            'avatarBg' => 'from-purple-500 to-blue-500',
            'text' => '"Depoimento do cliente"',
        ],
    ],
],
```

### 6. Landing Page - CTA Final

```php
'cta_final' => [
    'title' => 'Título do CTA',
    'subtitle' => 'Subtítulo do CTA',
    'description' => 'Descrição da oferta',
    'offerTitle' => 'Oferta Especial',
    'pricing' => [
        'current' => 'R$ 297',                 // Preço atual
        'original' => 'R$ 497',               // Preço original
    ],
    'cta_text' => 'Texto do botão',
    'cta_link' => '#',
    'guarantees' => [
        'Garantia de 30 dias',
        'Acesso imediato',
        'Suporte completo',
    ],
],
```

### 7. Sistema Base - Branding

```php
'system' => [
    'branding' => [
        'logo' => '/images/logo.png',         // Caminho do logo
        'logo_dark' => '/images/logo-dark.png', // Logo para tema escuro
        'favicon' => '/favicon.ico',           // Favicon
        'company_name' => 'Nome da Empresa',
        'tagline' => 'Slogan da empresa',
    ],
],
```

### 8. Sistema Base - Cores

```php
'colors' => [
    'primary' => '#7c3aed',                   // Cor primária (Purple)
    'secondary' => '#1f2937',                // Cor secundária (Gray)
    'success' => '#10b981',                  // Cor de sucesso (Green)
    'warning' => '#f59e0b',                  // Cor de aviso (Yellow)
    'danger' => '#ef4444',                   // Cor de perigo (Red)
    'info' => '#3b82f6',                     // Cor de informação (Blue)
],
```

### 9. Sistema Base - Mensagens

```php
'messages' => [
    'welcome' => 'Bem-vindo ao sistema!',
    'login_success' => 'Login realizado com sucesso!',
    'logout_success' => 'Logout realizado com sucesso!',
    'register_success' => 'Cadastro realizado com sucesso!',
    'update_success' => 'Atualizado com sucesso!',
    'delete_success' => 'Excluído com sucesso!',
],
```

### 10. Sistema Base - Módulos

```php
'modules' => [
    'clients' => [
        'enabled' => true,                    // Ativar/desativar módulo
        'name' => 'Clientes',
        'icon' => 'M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z',
        'description' => 'Gerencie seus clientes',
    ],
    'products' => [
        'enabled' => true,
        'name' => 'Produtos',
        'icon' => 'M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4',
        'description' => 'Controle seu catálogo',
    ],
    'sales' => [
        'enabled' => false,                  // Módulo desabilitado
        'name' => 'Vendas',
        'description' => 'Gerencie suas vendas',
    ],
],
```

## 🛠️ Helpers Disponíveis

O sistema inclui helpers para facilitar o acesso às configurações:

### Helpers Básicos

```php
// Acessar configuração completa
devstarter()

// Acessar configuração específica
devstarter('app.name')
devstarter('system.colors.primary')

// Acessar configurações da landing page
devstarter_landing('hero.title')
devstarter_landing('problema.problems')

// Acessar configurações do sistema
devstarter_system('branding.logo')
devstarter_system('modules.clients.enabled')

// Acessar configurações gerais do app
devstarter_app('name')
devstarter_app('email')
```

### Exemplos de Uso nas Views

```blade
{{-- Título da página --}}
<title>{{ devstarter_app('name') }}</title>

{{-- Título do hero --}}
<h1>{{ devstarter_landing('hero.title') }}</h1>

{{-- Cor primária --}}
<div style="color: {{ devstarter_system('colors.primary') }}">
    Texto com cor primária
</div>

{{-- Verificar se módulo está ativo --}}
@if(devstarter_system('modules.clients.enabled'))
    <a href="/clients">Clientes</a>
@endif
```

## 🎨 Personalização de Cores

### Cores Disponíveis no Tailwind

```php
// Cores principais
'primary' => '#7c3aed',     // Purple-500
'secondary' => '#1f2937',   // Gray-800
'success' => '#10b981',     // Emerald-500
'warning' => '#f59e0b',     // Amber-500
'danger' => '#ef4444',      // Red-500
'info' => '#3b82f6',        // Blue-500
```

### Cores de Ícones na Landing Page

```php
// Cores de texto dos ícones
'iconColor' => 'text-red-400',    // Vermelho claro
'iconColor' => 'text-blue-400',   // Azul claro
'iconColor' => 'text-green-400',  // Verde claro
'iconColor' => 'text-purple-400', // Roxo claro
'iconColor' => 'text-yellow-400', // Amarelo claro

// Cores de fundo dos ícones
'iconBg' => 'bg-red-500/20',      // Vermelho com transparência
'iconBg' => 'bg-blue-500/20',     // Azul com transparência
'iconBg' => 'bg-green-500/20',    // Verde com transparência
'iconBg' => 'bg-purple-500/20',   // Roxo com transparência
'iconBg' => 'bg-yellow-500/20',  // Amarelo com transparência
```

## 📱 Ícones SVG

O sistema utiliza ícones SVG do Heroicons. Você pode encontrar mais ícones em:
- [Heroicons](https://heroicons.com/)
- [Heroicons GitHub](https://github.com/tailwindlabs/heroicons)

### Exemplos de Ícones

```php
// Ícones comuns
'M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z'  // Relógio
'M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z' // Check circle
'M13 10V3L4 14h7v7l9-11h-7z'                   // Raio
'M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z' // Usuários
```

## 🔄 Ativação/Desativação de Módulos

Para ativar ou desativar módulos do sistema:

```php
'modules' => [
    'clients' => [
        'enabled' => true,    // Módulo ativo
    ],
    'products' => [
        'enabled' => true,    // Módulo ativo
    ],
    'sales' => [
        'enabled' => false,   // Módulo inativo
    ],
    'reports' => [
        'enabled' => false,   // Módulo inativo
    ],
    'payments' => [
        'enabled' => false,   // Módulo inativo
    ],
    'automation' => [
        'enabled' => false,   // Módulo inativo
    ],
],
```

## 📝 Exemplo Completo de Personalização

```php
<?php

return [
    'app' => [
        'name' => 'Meu Sistema de Gestão',
        'description' => 'Sistema completo para gestão empresarial',
        'email' => 'contato@meusistema.com',
        'phone' => '(11) 99999-9999',
    ],

    'landing' => [
        'hero' => [
            'title' => 'Transforme sua empresa com nosso sistema',
            'subtitle' => 'Gestão completa e inteligente',
            'cta_text' => 'Começar Agora',
            'cta_link' => '/register',
        ],
        'problema' => [
            'title' => 'Você enfrenta estes problemas?',
            'problems' => [
                [
                    'icon' => 'M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z',
                    'iconColor' => 'text-red-400',
                    'iconBg' => 'bg-red-500/20',
                    'title' => 'Perda de tempo',
                    'description' => 'Muito tempo gasto com tarefas administrativas',
                ],
            ],
        ],
    ],

    'system' => [
        'branding' => [
            'company_name' => 'Meu Sistema',
            'logo' => '/images/meu-logo.png',
        ],
        'colors' => [
            'primary' => '#3b82f6',    // Azul
            'secondary' => '#1f2937', // Cinza escuro
        ],
        'modules' => [
            'clients' => ['enabled' => true],
            'products' => ['enabled' => true],
            'sales' => ['enabled' => false],
        ],
    ],
];
```

## 🚀 Próximos Passos

1. **Personalize** o arquivo `config/devstarter.php` com suas informações
2. **Teste** as mudanças acessando a landing page e o sistema
3. **Ajuste** cores, textos e módulos conforme necessário
4. **Implemente** módulos adicionais se necessário

## 📞 Suporte

Para dúvidas sobre configuração:
- Email: contato@devstarterkit.com
- Documentação: [Link para docs]
- GitHub: [Link para repositório]

---

**Nota**: Sempre faça backup do arquivo de configuração antes de fazer alterações importantes.
