{{-- Benefícios / Resultados Component --}}
<section id="beneficios" class="py-20 px-4">
    <div class="max-w-6xl mx-auto">
        <h2 class="text-4xl md:text-5xl font-bold text-center mb-16">
            {{ $title ?? 'Por que escolher o DevStarter Kit?' }}
        </h2>
        
        <div class="grid md:grid-cols-2 lg:grid-cols-4 gap-8">
            @foreach($benefits ?? [
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
            ] as $benefit)
                <div class="text-center p-6 bg-white/5 rounded-xl border border-white/10 hover:bg-white/10 transition-all duration-300">
                    <div class="w-16 h-16 {{ $benefit['iconBg'] }} rounded-full mx-auto mb-4 flex items-center justify-center">
                        <svg class="w-8 h-8 {{ $benefit['iconColor'] }}" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="{{ $benefit['icon'] }}"></path>
                        </svg>
                    </div>
                    <h3 class="text-xl font-semibold mb-3">{{ $benefit['title'] }}</h3>
                    <p class="text-gray-300">{{ $benefit['description'] }}</p>
                </div>
            @endforeach
        </div>
    </div>
</section>
