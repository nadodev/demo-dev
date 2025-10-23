{{-- Solução / O que está incluso Component --}}
<section id="solucao" class="py-20 px-4">
    <div class="max-w-6xl mx-auto">
        <h2 class="text-4xl md:text-5xl font-bold text-center mb-16">
            {{ $title ?? 'Tudo que você precisa em um só lugar' }}
        </h2>
        
        <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
            @foreach($items ?? [
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
            ] as $item)
                <div class="bg-white/5 rounded-xl p-6 border border-white/10 hover:bg-white/10 transition-all duration-300 hover:scale-105">
                    <div class="w-12 h-12 {{ $item['iconBg'] }} rounded-lg mb-4 flex items-center justify-center">
                        <svg class="w-6 h-6 {{ $item['iconColor'] }}" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="{{ $item['icon'] }}"></path>
                        </svg>
                    </div>
                    <h3 class="text-xl font-semibold mb-3">{{ $item['title'] }}</h3>
                    <p class="text-gray-300">{{ $item['description'] }}</p>
                </div>
            @endforeach
        </div>
    </div>
</section>
