{{-- Footer Component --}}
<footer class="py-12 px-4 bg-black/40 border-t border-white/10">
    <div class="max-w-6xl mx-auto">
        <div class="grid md:grid-cols-4 gap-8">
            <div>
                <h3 class="text-xl font-bold mb-4">{{ $brandName ?? 'DevStarter Kit' }}</h3>
                <p class="text-gray-400">{{ $brandDescription ?? 'Transforme suas ideias em sistemas prontos para vender.' }}</p>
            </div>
            
            <div>
                <h4 class="font-semibold mb-4">Contato</h4>
                <p class="text-gray-400 mb-2">{{ $contact['email'] ?? 'contato@devstarterkit.com' }}</p>
                <p class="text-gray-400">{{ $contact['phone'] ?? '+55 (11) 99999-9999' }}</p>
            </div>
            
            <div>
                <h4 class="font-semibold mb-4">Redes Sociais</h4>
                <div class="flex space-x-4">
                    @foreach($socialLinks ?? [
                        ['name' => 'Twitter', 'url' => '#'],
                        ['name' => 'LinkedIn', 'url' => '#'],
                        ['name' => 'GitHub', 'url' => '#']
                    ] as $social)
                        <a href="{{ $social['url'] }}" class="text-gray-400 hover:text-white transition-colors">{{ $social['name'] }}</a>
                    @endforeach
                </div>
            </div>
            
            <div>
                <h4 class="font-semibold mb-4">Suporte</h4>
                @foreach($supportLinks ?? [
                    ['name' => 'FAQ', 'url' => '#'],
                    ['name' => 'Documentação', 'url' => '#'],
                    ['name' => 'Contato', 'url' => '#']
                ] as $link)
                    <a href="{{ $link['url'] }}" class="text-gray-400 hover:text-white transition-colors block mb-2">{{ $link['name'] }}</a>
                @endforeach
            </div>
        </div>
        
        <div class="border-t border-white/10 mt-8 pt-8 text-center text-gray-400">
            <p>&copy; {{ date('Y') }} {{ $brandName ?? 'DevStarter Kit' }}. Todos os direitos reservados.</p>
        </div>
    </div>
</footer>
