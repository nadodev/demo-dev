{{-- Hero Section Component --}}
<section id="hero" class="min-h-screen flex items-center justify-center px-4 py-20">
    <div class="max-w-6xl mx-auto text-center">
        <h1 class="text-5xl md:text-7xl font-bold mb-6 bg-gradient-to-r from-white via-purple-200 to-blue-200 bg-clip-text text-transparent">
            {{ $title ?? 'Transforme suas ideias em sistemas prontos para vender' }}
        </h1>
        
        <p class="text-xl md:text-2xl text-gray-300 mb-8 max-w-4xl mx-auto">
            {{ $subtitle ?? 'Template + Sistema Base + Guia + Mini Curso + Marketing para afiliados' }}
        </p>

        {{-- Mockup/Demo --}}
        <div class="mb-12">
            <div class="bg-white/10 backdrop-blur-sm rounded-2xl p-8 max-w-4xl mx-auto border border-white/20">
                @if(isset($mockup))
                    {!! $mockup !!}
                @else
                    <div class="bg-gradient-to-r from-purple-500 to-blue-500 h-64 rounded-lg flex items-center justify-center">
                        <div class="text-center">
                            <div class="w-16 h-16 bg-white/20 rounded-full mx-auto mb-4 flex items-center justify-center">
                                <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path>
                                </svg>
                            </div>
                            <p class="text-white font-semibold">{{ $mockupText ?? 'Sistema em Funcionamento' }}</p>
                        </div>
                    </div>
                @endif
            </div>
        </div>

        {{-- CTA Principal --}}
        <a href="{{ $ctaLink ?? '#cta-final' }}" class="inline-block bg-gradient-to-r from-purple-600 to-blue-600 hover:from-purple-700 hover:to-blue-700 text-white px-8 py-4 rounded-full text-xl font-semibold shadow-lg hover:shadow-xl transform hover:scale-105 transition-all duration-300">
            {{ $ctaText ?? 'Quero meu kit agora' }}
        </a>
    </div>
</section>
