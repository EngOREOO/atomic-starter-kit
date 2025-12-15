<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="dark">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Dashboard') - {{ config('app.name', 'Laravel') }}</title>
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <!-- Icons -->
    <script src="https://unpkg.com/lucide@latest"></script>
    
    <!-- Scripts & Styles -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    
    <script>
        tailwind = {
            config: {
                darkMode: 'class',
                theme: {
                    fontFamily: {
                        sans: ['Outfit', 'sans-serif'],
                    },
                    extend: {
                        colors: {
                            dark: {
                                bg: '#0f172a',
                                card: 'rgba(30, 41, 59, 0.7)',
                                hover: 'rgba(51, 65, 85, 0.8)'
                            },
                            light: {
                                bg: '#F1F5F9',
                                card: 'rgba(255, 255, 255, 0.8)',
                                hover: '#ffffff'
                            },
                            primary: {
                                DEFAULT: '#818cf8',
                                dark: '#4F46E5',
                                glow: 'rgba(129, 140, 248, 0.3)'
                            }
                        },
                        animation: {
                            'fade-in': 'fadeIn 0.6s ease-out forwards',
                            'pulse-glow': 'pulseGlow 2s infinite',
                        },
                        keyframes: {
                            fadeIn: {
                                '0%': { opacity: '0', transform: 'translateY(20px)' },
                                '100%': { opacity: '1', transform: 'translateY(0)' },
                            },
                            pulseGlow: {
                                '0%': { boxShadow: '0 0 0 0 rgba(52, 211, 153, 0.4)' },
                                '70%': { boxShadow: '0 0 0 6px rgba(52, 211, 153, 0)' },
                                '100%': { boxShadow: '0 0 0 0 rgba(52, 211, 153, 0)' },
                            }
                        }
                    }
                }
            }
        }
    </script>
    <script src="https://cdn.tailwindcss.com"></script>

    <style>
        /* Custom Scrollbar */
        ::-webkit-scrollbar { width: 6px; }
        ::-webkit-scrollbar-track { background: transparent; }
        ::-webkit-scrollbar-thumb { background: #4F46E5; border-radius: 10px; }

        /* Glass Utilities */
        .glass {
            backdrop-filter: blur(12px);
            -webkit-backdrop-filter: blur(12px);
        }
    </style>
</head>
<body class="bg-light-bg dark:bg-dark-bg text-slate-800 dark:text-slate-100 transition-colors duration-300 min-h-screen flex overflow-x-hidden bg-[radial-gradient(circle_at_10%_20%,rgba(79,70,229,0.15)_0%,transparent_40%),radial-gradient(circle_at_90%_80%,rgba(16,185,129,0.1)_0%,transparent_40%)]">

    <!-- Sidebar -->
    <nav class="fixed left-0 top-0 h-full w-[280px] bg-white/70 dark:bg-slate-900/60 glass border-r border-gray-200 dark:border-white/5 p-6 flex flex-col z-50 transition-transform duration-300 -translate-x-full md:translate-x-0" id="sidebar">
        <!-- Logo -->
        <a href="{{ route('admin.dashboard') }}" class="flex items-center gap-3 mb-10 text-2xl font-bold dark:text-white drop-shadow-[0_0_15px_rgba(129,140,248,0.3)]">
            <div class="p-2 rounded-xl bg-gradient-to-br from-indigo-600 to-purple-500 text-white shadow-[0_0_15px_rgba(79,70,229,0.4)]">
                <i data-lucide="layout-dashboard" class="w-6 h-6"></i>
            </div>
            <span>StarterKit</span>
        </a>

        <!-- Menu Group 1 -->
        <div class="mb-8">
            <div class="text-xs uppercase tracking-widest text-slate-500 dark:text-slate-400 font-bold mb-4 pl-3">Main Menu</div>
            
            <a href="{{ route('admin.dashboard') }}" 
               class="nav-link group flex items-center gap-3 px-4 py-3 rounded-xl mb-2 font-medium transition-all duration-300 hover:translate-x-1 border border-transparent 
               {{ request()->routeIs('admin.dashboard') ? 'active bg-black/5 dark:bg-white/5 border-black/5 dark:border-white/5' : 'hover:bg-black/5 dark:hover:bg-white/5 hover:border-black/5 dark:hover:border-white/5' }}">
                <i data-lucide="home" class="w-5 h-5 {{ request()->routeIs('admin.dashboard') ? 'text-indigo-500 dark:text-indigo-400' : '' }}"></i>
                <span class="{{ request()->routeIs('admin.dashboard') ? 'text-indigo-600 dark:text-indigo-400' : 'text-slate-600 dark:text-slate-400 group-hover:text-slate-900 dark:group-hover:text-white' }}">Dashboard</span>
            </a>

            @if(method_exists(auth()->user(), 'hasPermission') && (auth()->user()->hasPermission('admin.users.index') || auth()->user()->isSuperAdmin()))
            <a href="{{ route('admin.users.index') }}" 
               class="nav-link group flex items-center gap-3 px-4 py-3 rounded-xl mb-2 font-medium transition-all duration-300 hover:translate-x-1 border border-transparent
               {{ request()->routeIs('admin.users.*') ? 'active bg-black/5 dark:bg-white/5 border-black/5 dark:border-white/5' : 'hover:bg-black/5 dark:hover:bg-white/5 hover:border-black/5 dark:hover:border-white/5' }}">
                <i data-lucide="users" class="w-5 h-5 {{ request()->routeIs('admin.users.*') ? 'text-indigo-500 dark:text-indigo-400' : '' }}"></i>
                <span class="{{ request()->routeIs('admin.users.*') ? 'text-indigo-600 dark:text-indigo-400' : 'text-slate-600 dark:text-slate-400 group-hover:text-slate-900 dark:group-hover:text-white' }}">Users</span>
            </a>
            @endif

            @if(method_exists(auth()->user(), 'hasPermission') && (auth()->user()->hasPermission('admin.roles.index') || auth()->user()->isSuperAdmin()))
            <a href="{{ route('admin.roles.index') }}" 
               class="nav-link group flex items-center gap-3 px-4 py-3 rounded-xl mb-2 font-medium transition-all duration-300 hover:translate-x-1 border border-transparent
               {{ request()->routeIs('admin.roles.*') ? 'active bg-black/5 dark:bg-white/5 border-black/5 dark:border-white/5' : 'hover:bg-black/5 dark:hover:bg-white/5 hover:border-black/5 dark:hover:border-white/5' }}">
                <i data-lucide="shield" class="w-5 h-5 {{ request()->routeIs('admin.roles.*') ? 'text-indigo-500 dark:text-indigo-400' : '' }}"></i>
                <span class="{{ request()->routeIs('admin.roles.*') ? 'text-indigo-600 dark:text-indigo-400' : 'text-slate-600 dark:text-slate-400 group-hover:text-slate-900 dark:group-hover:text-white' }}">Roles</span>
            </a>
            @endif

            @if(method_exists(auth()->user(), 'hasPermission') && (auth()->user()->hasPermission('admin.permissions.index') || auth()->user()->isSuperAdmin()))
            <a href="{{ route('admin.permissions.index') }}" 
               class="nav-link group flex items-center gap-3 px-4 py-3 rounded-xl mb-2 font-medium transition-all duration-300 hover:translate-x-1 border border-transparent
               {{ request()->routeIs('admin.permissions.*') ? 'active bg-black/5 dark:bg-white/5 border-black/5 dark:border-white/5' : 'hover:bg-black/5 dark:hover:bg-white/5 hover:border-black/5 dark:hover:border-white/5' }}">
                <i data-lucide="lock" class="w-5 h-5 {{ request()->routeIs('admin.permissions.*') ? 'text-indigo-500 dark:text-indigo-400' : '' }}"></i>
                <span class="{{ request()->routeIs('admin.permissions.*') ? 'text-indigo-600 dark:text-indigo-400' : 'text-slate-600 dark:text-slate-400 group-hover:text-slate-900 dark:group-hover:text-white' }}">Permissions</span>
            </a>
            @endif
        </div>

        <!-- Menu Group 2 -->
        <div class="mb-8">
            <div class="text-xs uppercase tracking-widest text-slate-500 dark:text-slate-400 font-bold mb-4 pl-3">System</div>
            
            <a href="{{ route('admin.settings.index') }}" 
               class="nav-link group flex items-center gap-3 px-4 py-3 rounded-xl mb-2 font-medium transition-all duration-300 hover:translate-x-1 border border-transparent
               {{ request()->routeIs('admin.settings.*') ? 'active bg-black/5 dark:bg-white/5 border-black/5 dark:border-white/5' : 'hover:bg-black/5 dark:hover:bg-white/5 hover:border-black/5 dark:hover:border-white/5' }}">
                <i data-lucide="settings" class="w-5 h-5 {{ request()->routeIs('admin.settings.*') ? 'text-indigo-500 dark:text-indigo-400' : '' }}"></i>
                <span class="{{ request()->routeIs('admin.settings.*') ? 'text-indigo-600 dark:text-indigo-400' : 'text-slate-600 dark:text-slate-400 group-hover:text-slate-900 dark:group-hover:text-white' }}">Settings</span>
            </a>
            
            <a href="https://github.com" target="_blank" class="nav-link group flex items-center gap-3 px-4 py-3 rounded-xl mb-2 text-slate-600 dark:text-slate-400 font-medium transition-all duration-300 hover:translate-x-1 hover:bg-black/5 dark:hover:bg-white/5 hover:text-slate-900 dark:hover:text-white">
                <i data-lucide="help-circle" class="w-5 h-5"></i>
                <span>Get Help</span>
            </a>
        </div>

        <!-- Profile -->
        <a href="{{ route('admin.profile.edit') }}" class="mt-auto flex items-center gap-3 p-3 bg-black/5 dark:bg-white/5 border border-transparent dark:border-white/5 rounded-2xl cursor-pointer hover:bg-black/10 dark:hover:bg-white/10 transition-colors">
            <div class="w-10 h-10 rounded-full bg-gradient-to-br from-blue-500 to-violet-500 flex items-center justify-center text-white font-bold shadow-lg shadow-blue-500/30">
                {{ strtoupper(substr(auth()->user()->name, 0, 1)) }}
            </div>
            <div class="overflow-hidden">
                <h4 class="text-sm font-bold truncate dark:text-slate-200">{{ auth()->user()->name }}</h4>
                <p class="text-xs text-slate-500 dark:text-slate-400 truncate">{{ auth()->user()->email }}</p>
            </div>
            <i data-lucide="more-vertical" class="w-4 h-4 ml-auto text-slate-400"></i>
        </a>
    </nav>

    <!-- Main Content -->
    <main class="flex-1 md:ml-[280px] p-6 w-full transition-all duration-300">

        <!-- Header -->
        <header class="flex flex-col md:flex-row justify-between items-start md:items-center mb-10 gap-4 animate-fade-in">
            <!-- Breadcrumbs -->
            <div class="flex items-center gap-2 text-slate-500 dark:text-slate-400 text-sm">
                <i data-lucide="home" class="w-4 h-4"></i>
                <span>/</span>
                <span class="text-slate-900 dark:text-white font-semibold">@yield('title', 'Dashboard')</span>
            </div>

            <!-- Actions -->
            <div class="flex gap-4">
                <!-- Theme Toggle -->
                <button id="theme-toggle" class="p-2.5 rounded-xl bg-white/50 dark:bg-slate-800/50 border border-gray-200 dark:border-white/5 text-slate-600 dark:text-slate-400 hover:text-indigo-600 dark:hover:text-white hover:bg-white dark:hover:bg-slate-700 hover:shadow-[0_0_15px_rgba(129,140,248,0.3)] hover:-translate-y-0.5 transition-all">
                    <i data-lucide="sun" class="w-5 h-5 block dark:hidden"></i>
                    <i data-lucide="moon" class="w-5 h-5 hidden dark:block"></i>
                </button>

                <a href="https://github.com/EngOREOO/atomic-starter-kit" target="_blank" class="p-2.5 rounded-xl bg-white/50 dark:bg-slate-800/50 border border-gray-200 dark:border-white/5 text-slate-600 dark:text-slate-400 hover:text-indigo-600 dark:hover:text-white hover:bg-white dark:hover:bg-slate-700 hover:-translate-y-0.5 transition-all flex items-center justify-center">
                    <i data-lucide="github" class="w-5 h-5"></i>
                </a>
                
                <button class="p-2.5 rounded-xl bg-white/50 dark:bg-slate-800/50 border border-gray-200 dark:border-white/5 text-slate-600 dark:text-slate-400 hover:text-indigo-600 dark:hover:text-white hover:bg-white dark:hover:bg-slate-700 hover:-translate-y-0.5 transition-all relative">
                    <i data-lucide="bell" class="w-5 h-5"></i>
                    <span class="absolute top-2 right-2.5 w-2 h-2 bg-red-500 rounded-full animate-pulse"></span>
                </button>

                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="p-2.5 rounded-xl bg-white/50 dark:bg-slate-800/50 border border-gray-200 dark:border-white/5 text-red-500 dark:text-red-400 hover:bg-red-50 dark:hover:bg-red-900/20 hover:-translate-y-0.5 transition-all">
                        <i data-lucide="log-out" class="w-5 h-5"></i>
                    </button>
                </form>
            </div>
        </header>

        <!-- Flash Messages -->
        @if(session('success'))
            <div class="mb-6 p-4 rounded-xl bg-emerald-500/10 border border-emerald-500/20 text-emerald-600 dark:text-emerald-400 flex items-center gap-3">
                <i data-lucide="check-circle" class="w-5 h-5"></i>
                {{ session('success') }}
            </div>
        @endif

        @if(session('error'))
            <div class="mb-6 p-4 rounded-xl bg-red-500/10 border border-red-500/20 text-red-600 dark:text-red-400 flex items-center gap-3">
                <i data-lucide="alert-circle" class="w-5 h-5"></i>
                {{ session('error') }}
            </div>
        @endif

        <!-- Page Content -->
        @yield('content')
        
    </main>

    <!-- Mobile Menu Button (Floating) -->
    <button id="mobile-menu-btn" class="md:hidden fixed bottom-6 right-6 w-14 h-14 bg-indigo-600 text-white rounded-full shadow-lg shadow-indigo-600/30 flex items-center justify-center z-50 hover:scale-110 transition-transform">
        <i data-lucide="menu" class="w-6 h-6"></i>
    </button>

    <script>
        // Init Icons
        lucide.createIcons();

        // Theme Toggle Logic
        const themeToggleBtn = document.getElementById('theme-toggle');
        const htmlElement = document.documentElement;

        // Load saved theme (Default to Dark)
        if (localStorage.theme === 'light') {
            htmlElement.classList.remove('dark');
        } else {
            htmlElement.classList.add('dark');
        }

        themeToggleBtn.addEventListener('click', () => {
            if (htmlElement.classList.contains('dark')) {
                htmlElement.classList.remove('dark');
                localStorage.theme = 'light';
            } else {
                htmlElement.classList.add('dark');
                localStorage.theme = 'dark';
            }
        });

        // Mobile Menu Logic
        const mobileMenuBtn = document.getElementById('mobile-menu-btn');
        const sidebar = document.getElementById('sidebar');

        mobileMenuBtn.addEventListener('click', () => {
            sidebar.classList.toggle('-translate-x-full');
            // Change icon
            const icon = sidebar.classList.contains('-translate-x-full') ? 'menu' : 'x';
            mobileMenuBtn.innerHTML = `<i data-lucide="${icon}" class="w-6 h-6"></i>`;
            lucide.createIcons();
        });

        // Close sidebar when clicking outside on mobile
        document.addEventListener('click', (e) => {
            if (window.innerWidth < 768) {
                if (!sidebar.contains(e.target) && !mobileMenuBtn.contains(e.target)) {
                    sidebar.classList.add('-translate-x-full');
                    mobileMenuBtn.innerHTML = `<i data-lucide="menu" class="w-6 h-6"></i>`;
                    lucide.createIcons();
                }
            }
        });
    </script>
</body>
</html>
