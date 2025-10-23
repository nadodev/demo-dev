{{-- Sticky CTA Component --}}
<div id="sticky-cta" class="fixed bottom-6 right-6 z-50 hidden">
    <a href="{{ $ctaLink ?? '#cta-final' }}" class="bg-gradient-to-r from-purple-600 to-blue-600 hover:from-purple-700 hover:to-blue-700 text-white px-6 py-3 rounded-full font-semibold shadow-lg hover:shadow-xl transform hover:scale-105 transition-all duration-300">
        {{ $ctaText ?? 'Quero meu kit agora' }}
    </a>
</div>
