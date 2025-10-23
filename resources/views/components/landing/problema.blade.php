{{-- Problema / Dor do Usuário Component --}}
<section id="problema" class="py-20 px-4 bg-black/20">
    <div class="max-w-6xl mx-auto">
        <h2 class="text-4xl md:text-5xl font-bold text-center mb-16">
            {{ $title ?? 'Você já passou por isso?' }}
        </h2>
        
        <div class="grid md:grid-cols-3 gap-8">
            @foreach($problems ?? [
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
            ] as $problem)
                <div class="text-center p-6 bg-white/5 rounded-xl border border-white/10 hover:bg-white/10 transition-all duration-300">
                    <div class="w-16 h-16 {{ $problem['iconBg'] }} rounded-full mx-auto mb-4 flex items-center justify-center">
                        <svg class="w-8 h-8 {{ $problem['iconColor'] }}" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="{{ $problem['icon'] }}"></path>
                        </svg>
                    </div>
                    <h3 class="text-xl font-semibold mb-3">{{ $problem['title'] }}</h3>
                    <p class="text-gray-300">{{ $problem['description'] }}</p>
                </div>
            @endforeach
        </div>
    </div>
</section>
