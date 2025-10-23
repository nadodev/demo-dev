<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', config('system.app.name'))</title>
    <meta name="description" content="@yield('description', 'Sistema de gestão completo para sua empresa')">
    
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    
    <!-- FontAwesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
    
    <!-- Custom Tailwind Config -->
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    fontFamily: {
                        'sans': ['Inter', 'system-ui', 'sans-serif'],
                    },
                    colors: {
                        primary: {
                            50: '#eff6ff',
                            100: '#dbeafe',
                            200: '#bfdbfe',
                            300: '#93c5fd',
                            400: '#60a5fa',
                            500: '#3b82f6',
                            600: '#2563eb',
                            700: '#1d4ed8',
                            800: '#1e40af',
                            900: '#1e3a8a',
                        },
                        secondary: {
                            50: '#f8fafc',
                            100: '#f1f5f9',
                            200: '#e2e8f0',
                            300: '#cbd5e1',
                            400: '#94a3b8',
                            500: '#64748b',
                            600: '#475569',
                            700: '#334155',
                            800: '#1e293b',
                            900: '#0f172a',
                        }
                    },
                    animation: {
                        'fade-in': 'fadeIn 0.5s ease-in-out',
                        'slide-up': 'slideUp 0.5s ease-out',
                        'float': 'float 6s ease-in-out infinite',
                        'pulse-slow': 'pulse 3s ease-in-out infinite',
                        'bounce-slow': 'bounce 2s infinite',
                    },
                    keyframes: {
                        fadeIn: {
                            '0%': { opacity: '0', transform: 'translateY(20px)' },
                            '100%': { opacity: '1', transform: 'translateY(0)' }
                        },
                        slideUp: {
                            '0%': { opacity: '0', transform: 'translateY(30px)' },
                            '100%': { opacity: '1', transform: 'translateY(0)' }
                        },
                        float: {
                            '0%, 100%': { transform: 'translateY(0px)' },
                            '50%': { transform: 'translateY(-20px)' }
                        }
                    }
                }
            }
        }
    </script>
    
    <!-- Custom Styles -->
    <style>
        .line-clamp-2 {
            display: -webkit-box;
            -webkit-line-clamp: 2;
            -webkit-box-orient: vertical;
            overflow: hidden;
        }
        .line-clamp-3 {
            display: -webkit-box;
            -webkit-line-clamp: 3;
            -webkit-box-orient: vertical;
            overflow: hidden;
        }
        .typing-animation {
            animation: typing 2s steps(40, end), blink-caret 0.75s step-end infinite;
        }
        @keyframes typing {
            from { width: 0 }
            to { width: 100% }
        }
        @keyframes blink-caret {
            from, to { border-color: transparent }
            50% { border-color: orange; }
        }
    </style>
</head>
<body class="font-sans antialiased bg-gray-50">
    <!-- Navigation -->
    @include('public-page.components.nav', ['config' => $navigationConfig ?? []])
    
    <!-- Main Content -->
    <main>
        @yield('content')
    </main>
    
    <!-- Footer -->
    @include('public-page.components.footer', ['config' => $footerConfig ?? []])
    
    <!-- Scripts -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const mobileMenuButton = document.getElementById('mobile-menu-button');
            const mobileMenu = document.getElementById('mobile-menu');
            
            if (mobileMenuButton && mobileMenu) {
                const menuIcon = document.getElementById('menu-icon');
                
                mobileMenuButton.addEventListener('click', function(e) {
                    e.preventDefault();
                    mobileMenu.classList.toggle('hidden');
                    
                    if (menuIcon) {
                        if (mobileMenu.classList.contains('hidden')) {
                            menuIcon.className = 'fas fa-bars text-xl';
                        } else {
                            menuIcon.className = 'fas fa-times text-xl';
                        }
                    }
                });
                
                document.addEventListener('click', function(e) {
                    if (!mobileMenuButton.contains(e.target) && !mobileMenu.contains(e.target)) {
                        mobileMenu.classList.add('hidden');
                        if (menuIcon) {
                            menuIcon.className = 'fas fa-bars text-xl';
                        }
                    }
                });
            }
            
            const navbar = document.getElementById('navbar');
            if (navbar) {
                window.addEventListener('scroll', function() {
                    if (window.scrollY > 50) {
                        navbar.classList.add('bg-white/95', 'backdrop-blur-md', 'shadow-2xl');
                        navbar.classList.remove('bg-gradient-to-r', 'from-slate-900', 'via-blue-900', 'to-indigo-900');
                        
                        const links = navbar.querySelectorAll('a');
                        links.forEach(link => {
                            if (link.classList.contains('text-white/90') || link.classList.contains('text-white')) {
                                link.classList.remove('text-white/90', 'text-white');
                                link.classList.add('text-gray-700');
                            }
                            if (link.classList.contains('hover:text-white')) {
                                link.classList.remove('hover:text-white');
                                link.classList.add('hover:text-blue-600');
                            }
                        });
                        
                        const logoText = navbar.querySelector('.text-xl');
                        if (logoText) {
                            logoText.classList.remove('text-white');
                            logoText.classList.add('text-gray-900');
                        }
                        
                        const logoSubtitle = navbar.querySelector('.text-xs');
                        if (logoSubtitle) {
                            logoSubtitle.classList.remove('text-blue-200');
                            logoSubtitle.classList.add('text-gray-500');
                        }
                        
                        const mobileButton = navbar.querySelector('#mobile-menu-button');
                        if (mobileButton) {
                            mobileButton.classList.remove('text-gray-900', 'hover:text-blue-300');
                            mobileButton.classList.add('text-gray-700', 'hover:text-blue-600');
                        }
                        
                        mobileMenu.classList.remove('bg-gradient-to-b', 'from-slate-900', 'to-blue-900');
                        mobileMenu.classList.add('bg-white');
                        
                        const mobileLinks = mobileMenu.querySelectorAll('a');
                        mobileLinks.forEach(link => {
                            link.classList.remove('text-white/90', 'text-white');
                            link.classList.add('text-gray-700');
                            link.classList.remove('hover:text-white');
                            link.classList.add('hover:text-blue-600');
                        });
                        
                    } else {
                        navbar.classList.remove('bg-white/95', 'backdrop-blur-md', 'shadow-2xl');
                        navbar.classList.add('bg-gradient-to-r', 'from-slate-900', 'via-blue-900', 'to-indigo-900');
                        
                        const links = navbar.querySelectorAll('a');
                        links.forEach(link => {
                            if (link.classList.contains('text-gray-700')) {
                                link.classList.remove('text-gray-700');
                                link.classList.add('text-white/90');
                            }
                            if (link.classList.contains('hover:text-blue-600')) {
                                link.classList.remove('hover:text-blue-600');
                                link.classList.add('hover:text-white');
                            }
                        });
                        
                        const logoText = navbar.querySelector('.text-xl');
                        if (logoText) {
                            logoText.classList.remove('text-gray-900');
                            logoText.classList.add('text-white');
                        }
                        
                        const logoSubtitle = navbar.querySelector('.text-xs');
                        if (logoSubtitle) {
                            logoSubtitle.classList.remove('text-gray-500');
                            logoSubtitle.classList.add('text-blue-200');
                        }
                        
                        const mobileButton = navbar.querySelector('#mobile-menu-button');
                        if (mobileButton) {
                            mobileButton.classList.remove('text-gray-700', 'hover:text-blue-600');
                            mobileButton.classList.add('text-white', 'hover:text-blue-300');
                        }
                        
                        mobileMenu.classList.remove('bg-white');
                        mobileMenu.classList.add('bg-gradient-to-b', 'from-slate-900', 'to-blue-900');
                        
                        const mobileLinks = mobileMenu.querySelectorAll('a');
                        mobileLinks.forEach(link => {
                            link.classList.remove('text-gray-700');
                            link.classList.add('text-white/90');
                            link.classList.remove('hover:text-blue-600');
                            link.classList.add('hover:text-white');
                        });
                    }
                });
            }
            
            const counters = document.querySelectorAll('.counter');
            counters.forEach(counter => {
                const target = parseInt(counter.getAttribute('data-target'));
                const increment = target / 100;
                let current = 0;
                
                const updateCounter = () => {
                    if (current < target) {
                        current += increment;
                        counter.textContent = Math.ceil(current);
                        setTimeout(updateCounter, 20);
                    } else {
                        counter.textContent = target;
                    }
                };
                
                updateCounter();
            });
            
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
            
            if (navbar) {
                window.addEventListener('scroll', function() {
                    if (window.scrollY > 50) {
                        navbar.classList.add('bg-white/95', 'backdrop-blur-md');
                        navbar.classList.remove('bg-transparent');
                    } else {
                        navbar.classList.remove('bg-white/95', 'backdrop-blur-md');
                        navbar.classList.add('bg-transparent');
                    }
                });
            }
        });
    </script>
</body>
</html>
