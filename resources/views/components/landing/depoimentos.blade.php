{{-- Depoimentos / Prova Social Component --}}
<section id="depoimentos" class="py-20 px-4 bg-black/20">
    <div class="max-w-6xl mx-auto">
        <h2 class="text-4xl md:text-5xl font-bold text-center mb-16">
            {{ $title ?? 'O que nossos clientes dizem' }}
        </h2>
        
        <div class="grid md:grid-cols-3 gap-8">
            @foreach($testimonials ?? [
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
            ] as $testimonial)
                <div class="bg-white/5 rounded-xl p-6 border border-white/10">
                    <div class="flex items-center mb-4">
                        <div class="w-12 h-12 bg-gradient-to-r {{ $testimonial['avatarBg'] }} rounded-full flex items-center justify-center text-white font-bold">
                            {{ $testimonial['avatar'] }}
                        </div>
                        <div class="ml-4">
                            <h4 class="font-semibold">{{ $testimonial['name'] }}</h4>
                            <p class="text-gray-400 text-sm">{{ $testimonial['role'] }}</p>
                        </div>
                    </div>
                    <p class="text-gray-300">{{ $testimonial['text'] }}</p>
                </div>
            @endforeach
        </div>
    </div>
</section>
