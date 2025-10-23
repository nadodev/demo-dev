<?php

return [
    // Configurações gerais da landing page
    'brand' => [
        'name' => 'DevStarter Kit',
        'description' => 'Transforme suas ideias em sistemas prontos para vender.',
        'email' => 'contato@devstarterkit.com',
        'phone' => '+55 (11) 99999-9999',
    ],

    // Hero Section
    'hero' => [
        'title' => 'Transforme suas ideias em sistemas prontos para vender',
        'subtitle' => 'Template + Sistema Base + Guia + Mini Curso + Marketing para afiliados',
        'cta_text' => 'Quero meu kit agora',
        'cta_link' => '#cta-final',
        'mockup_text' => 'Sistema em Funcionamento',
    ],

    // Problema Section
    'problema' => [
        'title' => 'Você já passou por isso?',
        'problems' => [
            [
                'icon' => 'M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z',
                'iconColor' => 'text-red-400',
                'iconBg' => 'bg-red-500/20',
                'title' => 'Perde horas criando sistemas do zero',
                'description' => 'Tempo precioso gasto reinventando a roda quando você poderia estar vendendo'
            ],
            [
                'icon' => 'M9.172 16.172a4 4 0 015.656 0M9 12h6m-6-4h6m2 5.291A7.962 7.962 0 0112 15c-2.34 0-4.29-1.009-5.824-2.709',
                'iconColor' => 'text-yellow-400',
                'iconBg' => 'bg-yellow-500/20',
                'title' => 'Não sabe como criar landing pages que convertem',
                'description' => 'Design bonito não é suficiente - você precisa de estratégia de conversão'
            ],
            [
                'icon' => 'M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z',
                'iconColor' => 'text-blue-400',
                'iconBg' => 'bg-blue-500/20',
                'title' => 'Falta conhecimento técnico avançado',
                'description' => 'Laravel, autenticação, dashboard - conceitos que levam tempo para dominar'
            ]
        ]
    ],

    // Solução Section
    'solucao' => [
        'title' => 'Tudo que você precisa em um só lugar',
        'items' => [
            [
                'icon' => 'M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z',
                'iconColor' => 'text-purple-400',
                'iconBg' => 'bg-purple-500/20',
                'title' => 'Template de Landing Page',
                'description' => 'Pronto para personalizar com suas cores, textos e imagens'
            ],
            [
                'icon' => 'M10 20l4-16m4 4l4 4-4 4M6 16l-4-4 4-4',
                'iconColor' => 'text-blue-400',
                'iconBg' => 'bg-blue-500/20',
                'title' => 'Sistema Base Laravel',
                'description' => 'CRUD completo, login, dashboard e autenticação funcionando'
            ],
            [
                'icon' => 'M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.746 0 3.332.477 4.5 1.253v13C19.832 18.477 18.246 18 16.5 18c-1.746 0-3.332.477-4.5 1.253',
                'iconColor' => 'text-green-400',
                'iconBg' => 'bg-green-500/20',
                'title' => 'Guia de Personalização',
                'description' => 'Passo a passo detalhado para customizar tudo'
            ],
            [
                'icon' => 'M15 10l4.553-2.276A1 1 0 0121 8.618v6.764a1 1 0 01-1.447.894L15 14M5 18h8a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v8a2 2 0 002 2z',
                'iconColor' => 'text-red-400',
                'iconBg' => 'bg-red-500/20',
                'title' => 'Mini Curso',
                'description' => 'Gravações simples de tela mostrando como usar'
            ],
            [
                'icon' => 'M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z',
                'iconColor' => 'text-yellow-400',
                'iconBg' => 'bg-yellow-500/20',
                'title' => 'Kit de Marketing para Afiliados',
                'description' => 'Textos, imagens e roteiros prontos para usar'
            ],
            [
                'icon' => 'M13 10V3L4 14h7v7l9-11h-7z',
                'iconColor' => 'text-indigo-400',
                'iconBg' => 'bg-indigo-500/20',
                'title' => 'Suporte Completo',
                'description' => 'Ajuda durante todo o processo de implementação'
            ]
        ]
    ],

    // Demonstração Section
    'demonstracao' => [
        'title' => 'Veja como funciona',
        'showCta' => true,
        'ctaText' => 'Veja como funciona',
        'ctaLink' => '#cta-final',
        'demos' => [
            [
                'gradient' => 'from-purple-500 to-blue-500',
                'icon' => 'M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z',
                'title' => 'Dashboard Administrativo',
                'subtitle' => 'Interface Intuitiva',
                'description' => 'Painel completo para gerenciar usuários, dados e configurações'
            ],
            [
                'gradient' => 'from-green-500 to-teal-500',
                'icon' => 'M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z',
                'title' => 'Sistema de Login',
                'subtitle' => 'Autenticação Segura',
                'description' => 'Login, registro e recuperação de senha funcionando perfeitamente'
            ]
        ]
    ],

    // Benefícios Section
    'beneficios' => [
        'title' => 'Por que escolher o DevStarter Kit?',
        'benefits' => [
            [
                'icon' => 'M13 10V3L4 14h7v7l9-11h-7z',
                'iconColor' => 'text-yellow-400',
                'iconBg' => 'bg-yellow-500/20',
                'title' => '⚡ Rápido para usar',
                'description' => 'Personalize e lance em horas, não semanas'
            ],
            [
                'icon' => 'M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z',
                'iconColor' => 'text-green-400',
                'iconBg' => 'bg-green-500/20',
                'title' => '🔒 Seguro e escalável',
                'description' => 'Código limpo e arquitetura profissional'
            ],
            [
                'icon' => 'M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z',
                'iconColor' => 'text-blue-400',
                'iconBg' => 'bg-blue-500/20',
                'title' => '🌐 Design moderno',
                'description' => 'Responsivo e com visual profissional'
            ],
            [
                'icon' => 'M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1',
                'iconColor' => 'text-purple-400',
                'iconBg' => 'bg-purple-500/20',
                'title' => '💼 Pronto para vender',
                'description' => 'Ou revender como afiliado'
            ]
        ]
    ],

    // Depoimentos Section
    'depoimentos' => [
        'title' => 'O que nossos clientes dizem',
        'testimonials' => [
            [
                'name' => 'Maria Silva',
                'role' => 'Desenvolvedora',
                'avatar' => 'M',
                'avatarBg' => 'from-purple-500 to-blue-500',
                'text' => '"Economizei semanas de desenvolvimento. O kit é completo e bem estruturado. Recomendo!"'
            ],
            [
                'name' => 'João Santos',
                'role' => 'Empreendedor',
                'avatar' => 'J',
                'avatarBg' => 'from-green-500 to-teal-500',
                'text' => '"Consegui lançar meu sistema em 3 dias. A documentação é excelente e o suporte também."'
            ],
            [
                'name' => 'Ana Costa',
                'role' => 'Freelancer',
                'avatar' => 'A',
                'avatarBg' => 'from-red-500 to-pink-500',
                'text' => '"Perfeito para freelancers que querem entregar projetos profissionais rapidamente."'
            ]
        ]
    ],

    // CTA Final Section
    'cta_final' => [
        'title' => 'Pronto para criar seu primeiro sistema profissional?',
        'subtitle' => 'Junte-se a centenas de desenvolvedores que já transformaram suas ideias em realidade',
        'offerTitle' => 'Oferta Especial de Lançamento',
        'pricing' => [
            'current' => 'R$ 297',
            'original' => 'R$ 497'
        ],
        'ctaText' => 'Quero meu kit agora',
        'ctaLink' => '#',
        'guarantees' => [
            'Garantia de 30 dias',
            'Acesso imediato',
            'Suporte completo'
        ]
    ],

    // Footer
    'footer' => [
        'socialLinks' => [
            ['name' => 'Twitter', 'url' => '#'],
            ['name' => 'LinkedIn', 'url' => '#'],
            ['name' => 'GitHub', 'url' => '#']
        ],
        'supportLinks' => [
            ['name' => 'FAQ', 'url' => '#'],
            ['name' => 'Documentação', 'url' => '#'],
            ['name' => 'Contato', 'url' => '#']
        ]
    ],

    // Sticky CTA
    'sticky_cta' => [
        'ctaText' => 'Quero meu kit agora',
        'ctaLink' => '#cta-final'
    ]
];
