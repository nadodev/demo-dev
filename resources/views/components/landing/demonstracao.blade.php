{{-- Demonstração / Prints Component --}}
<section id="demonstracao" class="py-20 px-4 bg-black/20">
    <div class="max-w-6xl mx-auto">
        <h2 class="text-4xl md:text-5xl font-bold text-center mb-16">
            {{ $title ?? 'Veja como funciona' }}
        </h2>
        
        <div class="grid md:grid-cols-2 gap-8">
            @foreach($demos ?? [
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
            ] as $demo)
                <div class="bg-white/5 rounded-xl p-6 border border-white/10">
                    <div class="bg-gradient-to-r {{ $demo['gradient'] }} h-64 rounded-lg mb-4 flex items-center justify-center">
                        <div class="text-center">
                            <div class="w-16 h-16 bg-white/20 rounded-full mx-auto mb-4 flex items-center justify-center">
                                <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="{{ $demo['icon'] }}"></path>
                                </svg>
                            </div>
                            <p class="text-white font-semibold">{{ $demo['title'] }}</p>
                        </div>
                    </div>
                    <h3 class="text-xl font-semibold mb-2">{{ $demo['subtitle'] }}</h3>
                    <p class="text-gray-300">{{ $demo['description'] }}</p>
                </div>
            @endforeach
        </div>

        @if(isset($showCta) && $showCta)
            <div class="text-center mt-12">
                <a href="{{ $ctaLink ?? '#cta-final' }}" class="inline-block bg-gradient-to-r from-purple-600 to-blue-600 hover:from-purple-700 hover:to-blue-700 text-white px-8 py-4 rounded-full text-xl font-semibold shadow-lg hover:shadow-xl transform hover:scale-105 transition-all duration-300">
                    {{ $ctaText ?? 'Veja como funciona' }}
                </a>
            </div>
        @endif
    </div>
</section>
