{{-- @php
    dd($config);
@endphp --}}

{{-- Hero Section Component --}}
<section class="relative min-h-screen flex items-center justify-center overflow-hidden">
    <!-- Background with animated gradients -->
    <div class="absolute inset-0 bg-gradient-to-br from-blue-900 via-purple-900 to-indigo-900">
        <div class="absolute inset-0 bg-black/20"></div>
        
        <!-- Animated background elements -->
        <div class="absolute top-0 left-0 w-full h-full">
            <div class="absolute top-20 left-10 w-72 h-72 bg-blue-500/20 rounded-full blur-3xl animate-float"></div>
            <div class="absolute top-40 right-20 w-96 h-96 bg-purple-500/20 rounded-full blur-3xl animate-float" style="animation-delay: 2s;"></div>
            <div class="absolute bottom-20 left-1/4 w-80 h-80 bg-indigo-400/20 rounded-full blur-3xl animate-float" style="animation-delay: 4s;"></div>
        </div>
        
        <!-- Grid pattern overlay -->
        <div class="absolute inset-0 opacity-10">
            <div class="absolute inset-0" style="background-image: radial-gradient(circle at 1px 1px, rgba(255,255,255,0.3) 1px, transparent 0); background-size: 50px 50px;"></div>
        </div>
    </div>

    @php
    $bgColors = [
        'blue' => 'bg-blue-700',
        'green' => 'bg-green-700',
        'purple' => 'bg-purple-700',
        'orange' => 'bg-orange-700',
        'red' => 'bg-red-700',
    ];

    $bgColor = $bgColors[$config['badge_color'] ?? 'blue'] ?? 'bg-white/10';

    $textColors = [
        'gray-900' => 'text-black',
        'blue-600' => 'text-blue-600',
        'purple-600' => 'text-purple-600',
        'green-600' => 'text-green-600',
        'white' => 'text-white',
    ];
    $textColor = $textColors[$config['title_color'] ?? 'white'] ?? 'text-white';

@endphp


    <!-- Content -->
    <div class="relative z-10 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-20">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">
            <!-- Left Column - Text Content -->
            <div class="text-center lg:text-left">
                <!-- Badge -->
                <div class="inline-flex items-center px-4 py-2 rounded-full {{  $bgColor }} backdrop-blur-sm border border-white/20 text-white text-sm font-medium mb-8 animate-fade-in">
                    <i class="fas fa-rocket mr-2 text-{{ $bgColor }}"></i>
                    {{ $config['badge_text'] ?? 'Nova versão disponível' }}
                </div>

                <!-- Main Heading -->
                <h1 class="text-5xl md:text-7xl font-bold mb-6 leading-tight">
                    <span class="typing-animation {{ $textColor }}">
                        {{ $config['title'] ?? 'Sistema de Gestão Completo' }}
                    </span>
                </h1>

                <!-- Subtitle -->
                <p class="text-xl md:text-2xl text-gray-300 mb-8 leading-relaxed max-w-2xl mx-auto lg:mx-0">
                    {{ $config['subtitle'] ?? 'Transforme sua empresa com nossa plataforma de gestão integrada' }}
                </p>

                <!-- CTA Buttons -->
                <div class="flex flex-col sm:flex-row gap-4 justify-center lg:justify-start mb-12">
                    <a href="{{ $config['primary_button_url'] ?? '#' }}" 
                       class="group bg-gradient-to-r from-blue-600 to-purple-600 hover:from-blue-700 hover:to-purple-700 text-white px-8 py-4 rounded-xl text-lg font-semibold transition-all duration-300 transform hover:scale-105 shadow-2xl hover:shadow-blue-500/25 flex items-center justify-center">
                        <i class="fas fa-play mr-2"></i>
                        {{ $config['primary_button_text'] ?? 'Começar Agora' }}
                        <i class="fas fa-arrow-right ml-2 group-hover:translate-x-1 transition-transform duration-300"></i>
                    </a>
                    <a href="{{ $config['secondary_button_url'] ?? '#' }}" 
                       class="group border-2 border-white/30 text-white hover:bg-white/10 hover:border-white/50 px-8 py-4 rounded-xl text-lg font-semibold transition-all duration-300 backdrop-blur-sm flex items-center justify-center">
                        <i class="fas fa-info-circle mr-2"></i>
                        {{ $config['secondary_button_text'] ?? 'Saiba Mais' }}
                    </a>
                </div>

                <!-- Stats -->
                <div class="grid grid-cols-3 gap-8 max-w-md mx-auto lg:mx-0">
                    <div class="text-center">
                        <div class="text-3xl font-bold text-white counter" data-target="{{ $config['stat1_number'] ?? '10000' }}">{{ $config['stat1_number'] ?? '10000' }}</div>
                        <div class="text-sm text-gray-300">{{ $config['stat1_label'] ?? 'Usuários Ativos' }}</div>
                    </div>
                    
                </div>
            </div>

            <!-- Right Column - Visual Content -->
            <div class="relative lg:block hidden">
                <!-- Main visual container -->
                <div class="relative">
                    <!-- Dashboard mockup -->
                    <div class="relative bg-white/10 backdrop-blur-sm rounded-2xl p-6 shadow-2xl border border-white/20">
                        <!-- Dashboard header -->
                        <div class="flex items-center justify-between mb-6">
                            <div class="flex items-center space-x-3">
                                <div class="w-3 h-3 bg-red-500 rounded-full"></div>
                                <div class="w-3 h-3 bg-yellow-500 rounded-full"></div>
                                <div class="w-3 h-3 bg-green-500 rounded-full"></div>
                            </div>
                            <div class="text-white/60 text-sm">Dashboard</div>
                        </div>
                        
                        <!-- Dashboard content -->
                        <div class="space-y-4">
                            <!-- Chart area -->
                            <div class="h-32 bg-gradient-to-r from-blue-500/20 to-purple-500/20 rounded-lg flex items-end justify-around p-4">
                                <div class="w-4 bg-blue-400 rounded-t" style="height: 60%"></div>
                                <div class="w-4 bg-purple-400 rounded-t" style="height: 80%"></div>
                                <div class="w-4 bg-blue-400 rounded-t" style="height: 45%"></div>
                                <div class="w-4 bg-purple-400 rounded-t" style="height: 90%"></div>
                                <div class="w-4 bg-blue-400 rounded-t" style="height: 70%"></div>
                            </div>
                            
                            <!-- Stats cards -->
                            <div class="grid grid-cols-2 gap-4">
                                <div class="bg-white/5 rounded-lg p-4">
                                    <div class="text-white/60 text-sm">Vendas</div>
                                    <div class="text-white text-xl font-bold">R$ 12.5k</div>
                                </div>
                                <div class="bg-white/5 rounded-lg p-4">
                                    <div class="text-white/60 text-sm">Crescimento</div>
                                    <div class="text-green-400 text-xl font-bold">+23%</div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Floating elements -->
                    <div class="absolute -top-4 -right-4 w-20 h-20 bg-blue-500/20 rounded-full blur-xl animate-pulse-slow"></div>
                    <div class="absolute -bottom-4 -left-4 w-16 h-16 bg-purple-500/20 rounded-full blur-xl animate-pulse-slow" style="animation-delay: 1s;"></div>
                    
                    <!-- Notification card -->
                    <div class="absolute top-8 -left-8 bg-white/10 backdrop-blur-sm rounded-xl p-4 border border-white/20 animate-float">
                        <div class="flex items-center space-x-3">
                            <div class="w-10 h-10 bg-gradient-to-r from-blue-500 to-purple-500 rounded-full flex items-center justify-center">
                                <i class="fas fa-bell text-white text-sm"></i>
                            </div>
                            <div>
                                <div class="text-white text-sm font-medium">Nova notificação</div>
                                <div class="text-white/60 text-xs">Você tem 3 mensagens</div>
                            </div>
                        </div>
                    </div>

                    <!-- Success metric card -->
                    <div class="absolute bottom-8 -right-8 bg-white/10 backdrop-blur-sm rounded-xl p-4 border border-white/20 animate-float" style="animation-delay: 2s;">
                        <div class="text-center">
                            <div class="text-green-400 text-2xl font-bold">98%</div>
                            <div class="text-white/60 text-xs">Taxa de Sucesso</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Scroll indicator -->
    <div class="absolute bottom-8 left-1/2 transform -translate-x-1/2 animate-bounce">
        <div class="w-6 h-10 border-2 border-white/30 rounded-full flex justify-center">
            <div class="w-1 h-3 bg-white/60 rounded-full mt-2 animate-pulse"></div>
        </div>
    </div>
</section>
