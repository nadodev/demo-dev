<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $news->title }} - {{ config('system.app.name') }}</title>
    <meta name="description" content="{{ $news->excerpt }}">
    
    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
    
    <!-- FontAwesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    
    <style>
        body { font-family: 'Inter', sans-serif; }
        .animate-fade-in { animation: fadeIn 0.6s ease-in-out; }
        .animate-slide-up { animation: slideUp 0.6s ease-out; }
        
        @keyframes fadeIn {
            from { opacity: 0; }
            to { opacity: 1; }
        }
        
        @keyframes slideUp {
            from { transform: translateY(30px); opacity: 0; }
            to { transform: translateY(0); opacity: 1; }
        }
    </style>
</head>
<body class="bg-gray-50">
    <!-- Navigation -->
    @include('public-page.components.nav', ['config' => $navigationConfig])

    <main class="pt-16">
        <!-- Hero Section -->
        <div class="bg-gradient-to-r from-blue-600 to-purple-600 py-16">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="text-center text-white">
                    <div class="flex items-center justify-center mb-4">
                        <span class="px-3 py-1 bg-white/20 rounded-full text-sm font-medium">
                            {{ ucfirst($news->status) }}
                        </span>
                    </div>
                    <h1 class="text-3xl sm:text-4xl lg:text-5xl font-bold mb-4">
                        {{ $news->title }}
                    </h1>
                    <p class="text-xl text-blue-100 mb-6 max-w-3xl mx-auto">
                        {{ $news->excerpt }}
                    </p>
                    <div class="flex items-center justify-center text-blue-100">
                        <i class="fas fa-calendar-alt mr-2"></i>
                        <span>{{ $news->published_at->format('d/m/Y H:i') }}</span>
                    </div>
                </div>
            </div>
        </div>

        <!-- Content -->
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
                <!-- Main Content -->
                <div class="lg:col-span-2">
                    <article class="bg-white rounded-xl shadow-lg p-8">
                        @if($news->featured_image)
                            <img src="{{ asset('storage/' . $news->featured_image) }}" 
                                 alt="{{ $news->title }}" 
                                 class="w-full h-64 object-cover rounded-lg mb-8">
                        @endif
                        
                        <div class="prose prose-lg max-w-none">
                            {!! nl2br(e($news->content)) !!}
                        </div>
                        
                        <!-- Share Buttons -->
                        <div class="mt-8 pt-8 border-t border-gray-200">
                            <h3 class="text-lg font-semibold text-gray-900 mb-4">Compartilhar</h3>
                            <div class="flex space-x-4">
                                <a href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode(request()->url()) }}" 
                                   target="_blank" 
                                   class="flex items-center px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition-colors duration-200">
                                    <i class="fab fa-facebook-f mr-2"></i>
                                    Facebook
                                </a>
                                <a href="https://twitter.com/intent/tweet?url={{ urlencode(request()->url()) }}&text={{ urlencode($news->title) }}" 
                                   target="_blank" 
                                   class="flex items-center px-4 py-2 bg-blue-400 text-white rounded-lg hover:bg-blue-500 transition-colors duration-200">
                                    <i class="fab fa-twitter mr-2"></i>
                                    Twitter
                                </a>
                                <a href="https://www.linkedin.com/sharing/share-offsite/?url={{ urlencode(request()->url()) }}" 
                                   target="_blank" 
                                   class="flex items-center px-4 py-2 bg-blue-700 text-white rounded-lg hover:bg-blue-800 transition-colors duration-200">
                                    <i class="fab fa-linkedin-in mr-2"></i>
                                    LinkedIn
                                </a>
                            </div>
                        </div>
                    </article>
                </div>

                <!-- Sidebar -->
                <div class="space-y-6">
                    <!-- Related News -->
                    @if($relatedNews->count() > 0)
                        <div class="bg-white rounded-xl shadow-lg p-6">
                            <h3 class="text-lg font-semibold text-gray-900 mb-4">Notícias Relacionadas</h3>
                            <div class="space-y-4">
                                @foreach($relatedNews as $related)
                                    <div class="flex space-x-3">
                                        @if($related->featured_image)
                                            <img src="{{ asset('storage/' . $related->featured_image) }}" 
                                                 alt="{{ $related->title }}" 
                                                 class="w-16 h-16 object-cover rounded-lg">
                                        @else
                                            <div class="w-16 h-16 bg-gray-200 rounded-lg flex items-center justify-center">
                                                <i class="fas fa-newspaper text-gray-400"></i>
                                            </div>
                                        @endif
                                        <div class="flex-1">
                                            <h4 class="font-medium text-gray-900 text-sm mb-1">
                                                <a href="{{ route('public.news.show', $related) }}" 
                                                   class="hover:text-blue-600 transition-colors duration-200">
                                                    {{ Str::limit($related->title, 50) }}
                                                </a>
                                            </h4>
                                            <p class="text-xs text-gray-500">
                                                {{ $related->published_at->format('d/m/Y') }}
                                            </p>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    @endif

                    <!-- Back to News -->
                    <div class="bg-white rounded-xl shadow-lg p-6">
                        <a href="{{ route('public-page.index') }}#news" 
                           class="inline-flex items-center text-blue-600 hover:text-blue-700 transition-colors duration-200">
                            <i class="fas fa-arrow-left mr-2"></i>
                            Voltar para Notícias
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <!-- Footer -->
    @include('public-page.components.footer', ['config' => $footerConfig])

    <!-- JavaScript -->
    <script>
        // Smooth scroll for anchor links
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function (e) {
                e.preventDefault();
                const target = document.querySelector(this.getAttribute('href'));
                if (target) {
                    target.scrollIntoView({
                        behavior: 'smooth',
                        block: 'start'
                    });
                }
            });
        });

        // Mobile menu toggle
        document.getElementById('mobile-menu-button')?.addEventListener('click', function() {
            const mobileMenu = document.getElementById('mobile-menu');
            mobileMenu.classList.toggle('hidden');
        });

        // Navbar scroll effect
        window.addEventListener('scroll', function() {
            const navbar = document.getElementById('navbar');
            if (window.scrollY > 100) {
                navbar.classList.add('bg-white/98', 'shadow-xl');
                navbar.classList.remove('bg-white/95');
            } else {
                navbar.classList.remove('bg-white/98', 'shadow-xl');
                navbar.classList.add('bg-white/95');
            }
        });
    </script>
</body>
</html>
