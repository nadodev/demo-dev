{{-- CTA Final / Conversão Component --}}
<section id="cta-final" class="py-20 px-4">
    <div class="max-w-4xl mx-auto text-center">
        <h2 class="text-4xl md:text-5xl font-bold mb-8">
            {{ $title ?? 'Pronto para criar seu primeiro sistema profissional?' }}
        </h2>
        
        <p class="text-xl text-gray-300 mb-12">
            {{ $subtitle ?? 'Junte-se a centenas de desenvolvedores que já transformaram suas ideias em realidade' }}
        </p>

        <div class="bg-gradient-to-r from-purple-600 to-blue-600 rounded-2xl p-8 mb-8">
            <h3 class="text-2xl font-bold mb-4">{{ $offerTitle ?? 'Oferta Especial de Lançamento' }}</h3>
            
            @if(isset($pricing))
                <div class="text-4xl font-bold mb-2">{{ $pricing['current'] ?? 'R$ 297' }}</div>
                @if(isset($pricing['original']))
                    <div class="text-lg text-purple-200 mb-6">De {{ $pricing['original'] }} por apenas {{ $pricing['current'] }}</div>
                @endif
            @else
                <div class="text-4xl font-bold mb-2">R$ 297</div>
                <div class="text-lg text-purple-200 mb-6">De R$ 497 por apenas R$ 297</div>
            @endif
            
            <a href="{{ $ctaLink ?? '#' }}" class="inline-block bg-white text-purple-600 px-8 py-4 rounded-full text-xl font-semibold shadow-lg hover:shadow-xl transform hover:scale-105 transition-all duration-300">
                {{ $ctaText ?? 'Quero meu kit agora' }}
            </a>
        </div>

        @if(isset($guarantees) && count($guarantees) > 0)
            <div class="text-sm text-gray-400">
                <p>
                    @foreach($guarantees as $guarantee)
                        ✅ {{ $guarantee }} 
                        @if(!$loop->last) • @endif
                    @endforeach
                </p>
            </div>
        @else
            <div class="text-sm text-gray-400">
                <p>✅ Garantia de 30 dias • ✅ Acesso imediato • ✅ Suporte completo</p>
            </div>
        @endif
    </div>
</section>
