<!DOCTYPE html>
<html lang="en" class="dark">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modern Admin Dashboard - Tailwind</title>
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <!-- Icons -->
    <script src="https://unpkg.com/lucide@latest"></script>
    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
    
    <script>
        tailwind.config = {
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
                            DEFAULT: '#818cf8', // Soft Indigo for Dark
                            dark: '#4F46E5',    // Deeper for Light
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
    </script>

    <style>
        /* Custom Scrollbar for a cleaner look */
        ::-webkit-scrollbar { width: 6px; }
        ::-webkit-scrollbar-track { background: transparent; }
        ::-webkit-scrollbar-thumb { background: #4F46E5; border-radius: 10px; }

        /* Glass Utilities not fully covered by Tailwind defaults */
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
        <div class="flex items-center gap-3 mb-10 text-2xl font-bold dark:text-white drop-shadow-[0_0_15px_rgba(129,140,248,0.3)]">
            <div class="p-2 rounded-xl bg-gradient-to-br from-indigo-600 to-purple-500 text-white shadow-[0_0_15px_rgba(79,70,229,0.4)]">
                <i data-lucide="layout-dashboard" class="w-6 h-6"></i>
            </div>
            <span>StarterKit</span>
        </div>

        <!-- Menu Group 1 -->
        <div class="mb-8">
            <div class="text-xs uppercase tracking-widest text-slate-500 dark:text-slate-400 font-bold mb-4 pl-3">Main Menu</div>
            <a href="#" class="nav-link active group flex items-center gap-3 px-4 py-3 rounded-xl mb-2 font-medium transition-all duration-300 hover:translate-x-1 border border-transparent hover:bg-black/5 dark:hover:bg-white/5 hover:border-black/5 dark:hover:border-white/5">
                <i data-lucide="home" class="w-5 h-5 group-[.active]:text-indigo-500 dark:group-[.active]:text-indigo-400"></i>
                <span class="group-[.active]:text-indigo-600 dark:group-[.active]:text-indigo-400">Dashboard</span>
            </a>
            <a href="#" class="nav-link group flex items-center gap-3 px-4 py-3 rounded-xl mb-2 text-slate-600 dark:text-slate-400 font-medium transition-all duration-300 hover:translate-x-1 hover:bg-black/5 dark:hover:bg-white/5 hover:text-slate-900 dark:hover:text-white">
                <i data-lucide="users" class="w-5 h-5"></i>
                <span>Users</span>
            </a>
            <a href="#" class="nav-link group flex items-center gap-3 px-4 py-3 rounded-xl mb-2 text-slate-600 dark:text-slate-400 font-medium transition-all duration-300 hover:translate-x-1 hover:bg-black/5 dark:hover:bg-white/5 hover:text-slate-900 dark:hover:text-white">
                <i data-lucide="shield" class="w-5 h-5"></i>
                <span>Roles</span>
            </a>
            <a href="#" class="nav-link group flex items-center gap-3 px-4 py-3 rounded-xl mb-2 text-slate-600 dark:text-slate-400 font-medium transition-all duration-300 hover:translate-x-1 hover:bg-black/5 dark:hover:bg-white/5 hover:text-slate-900 dark:hover:text-white">
                <i data-lucide="lock" class="w-5 h-5"></i>
                <span>Permissions</span>
            </a>
        </div>

        <!-- Menu Group 2 -->
        <div class="mb-8">
            <div class="text-xs uppercase tracking-widest text-slate-500 dark:text-slate-400 font-bold mb-4 pl-3">System</div>
            <a href="#" class="nav-link group flex items-center gap-3 px-4 py-3 rounded-xl mb-2 text-slate-600 dark:text-slate-400 font-medium transition-all duration-300 hover:translate-x-1 hover:bg-black/5 dark:hover:bg-white/5 hover:text-slate-900 dark:hover:text-white">
                <i data-lucide="settings" class="w-5 h-5"></i>
                <span>Settings</span>
            </a>
            <a href="#" class="nav-link group flex items-center gap-3 px-4 py-3 rounded-xl mb-2 text-slate-600 dark:text-slate-400 font-medium transition-all duration-300 hover:translate-x-1 hover:bg-black/5 dark:hover:bg-white/5 hover:text-slate-900 dark:hover:text-white">
                <i data-lucide="help-circle" class="w-5 h-5"></i>
                <span>Get Help</span>
            </a>
        </div>

        <!-- Profile -->
        <div class="mt-auto flex items-center gap-3 p-3 bg-black/5 dark:bg-white/5 border border-transparent dark:border-white/5 rounded-2xl cursor-pointer hover:bg-black/10 dark:hover:bg-white/10 transition-colors">
            <div class="w-10 h-10 rounded-full bg-gradient-to-br from-blue-500 to-violet-500 flex items-center justify-center text-white font-bold shadow-lg shadow-blue-500/30">
                SA
            </div>
            <div class="overflow-hidden">
                <h4 class="text-sm font-bold truncate dark:text-slate-200">Super Admin</h4>
                <p class="text-xs text-slate-500 dark:text-slate-400 truncate">admin@demo.com</p>
            </div>
            <i data-lucide="more-vertical" class="w-4 h-4 ml-auto text-slate-400"></i>
        </div>
    </nav>

    <!-- Main Content -->
    <main class="flex-1 md:ml-[280px] p-6 w-full transition-all duration-300">

        <!-- Header -->
        <header class="flex flex-col md:flex-row justify-between items-start md:items-center mb-10 gap-4 animate-fade-in">
            <!-- Breadcrumbs -->
            <div class="flex items-center gap-2 text-slate-500 dark:text-slate-400 text-sm">
                <i data-lucide="home" class="w-4 h-4"></i>
                <span>/</span>
                <span class="text-slate-900 dark:text-white font-semibold">Dashboard</span>
            </div>

            <!-- Actions -->
            <div class="flex gap-4">
                <!-- Theme Toggle -->
                <button id="theme-toggle" class="p-2.5 rounded-xl bg-white/50 dark:bg-slate-800/50 border border-gray-200 dark:border-white/5 text-slate-600 dark:text-slate-400 hover:text-indigo-600 dark:hover:text-white hover:bg-white dark:hover:bg-slate-700 hover:shadow-[0_0_15px_rgba(129,140,248,0.3)] hover:-translate-y-0.5 transition-all">
                    <i data-lucide="sun" class="w-5 h-5 block dark:hidden"></i>
                    <i data-lucide="moon" class="w-5 h-5 hidden dark:block"></i>
                </button>

                <button class="p-2.5 rounded-xl bg-white/50 dark:bg-slate-800/50 border border-gray-200 dark:border-white/5 text-slate-600 dark:text-slate-400 hover:text-indigo-600 dark:hover:text-white hover:bg-white dark:hover:bg-slate-700 hover:-translate-y-0.5 transition-all">
                    <i data-lucide="github" class="w-5 h-5"></i>
                </button>
                <button class="p-2.5 rounded-xl bg-white/50 dark:bg-slate-800/50 border border-gray-200 dark:border-white/5 text-slate-600 dark:text-slate-400 hover:text-indigo-600 dark:hover:text-white hover:bg-white dark:hover:bg-slate-700 hover:-translate-y-0.5 transition-all relative">
                    <i data-lucide="bell" class="w-5 h-5"></i>
                    <span class="absolute top-2 right-2.5 w-2 h-2 bg-red-500 rounded-full animate-pulse"></span>
                </button>
                <button class="p-2.5 rounded-xl bg-white/50 dark:bg-slate-800/50 border border-gray-200 dark:border-white/5 text-red-500 dark:text-red-400 hover:bg-red-50 dark:hover:bg-red-900/20 hover:-translate-y-0.5 transition-all">
                    <i data-lucide="log-out" class="w-5 h-5"></i>
                </button>
            </div>
        </header>

        <!-- Stats Grid -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-10">
            <!-- Card 1 -->
            <div class="relative overflow-hidden bg-white/80 dark:bg-slate-800/60 glass rounded-3xl p-6 shadow-sm border border-white/20 dark:border-white/5 flex flex-col justify-between h-[180px] hover:-translate-y-1 hover:shadow-xl hover:shadow-indigo-500/10 hover:border-indigo-500/30 transition-all group animate-fade-in [animation-delay:0.1s]">
                <div class="absolute inset-0 bg-gradient-to-tr from-transparent via-white/5 to-transparent -translate-x-full group-hover:translate-x-full transition-transform duration-700"></div>
                <div class="flex justify-between items-start z-10">
                    <div class="w-12 h-12 rounded-2xl flex items-center justify-center bg-indigo-50 dark:bg-white/5 border border-indigo-100 dark:border-white/5 shadow-inner">
                        <i data-lucide="users" class="w-6 h-6 text-indigo-500 dark:text-indigo-400"></i>
                    </div>
                    <span class="px-3 py-1 rounded-full text-xs font-bold uppercase tracking-wider bg-emerald-100/50 dark:bg-emerald-500/10 text-emerald-600 dark:text-emerald-400 border border-emerald-200 dark:border-emerald-500/20 flex items-center gap-1">
                        <i data-lucide="activity" class="w-3 h-3"></i> Active
                    </span>
                </div>
                <div class="z-10">
                    <div class="text-5xl font-bold bg-gradient-to-r from-slate-700 to-slate-400 dark:from-white dark:to-slate-400 bg-clip-text text-transparent">3</div>
                    <div class="text-sm text-slate-500 dark:text-slate-400 mt-1">Registered Users</div>
                </div>
            </div>

            <!-- Card 2 -->
            <div class="relative overflow-hidden bg-white/80 dark:bg-slate-800/60 glass rounded-3xl p-6 shadow-sm border border-white/20 dark:border-white/5 flex flex-col justify-between h-[180px] hover:-translate-y-1 hover:shadow-xl hover:shadow-amber-500/10 hover:border-amber-500/30 transition-all group animate-fade-in [animation-delay:0.2s]">
                <div class="absolute inset-0 bg-gradient-to-tr from-transparent via-white/5 to-transparent -translate-x-full group-hover:translate-x-full transition-transform duration-700"></div>
                <div class="flex justify-between items-start z-10">
                    <div class="w-12 h-12 rounded-2xl flex items-center justify-center bg-amber-50 dark:bg-white/5 border border-amber-100 dark:border-white/5 shadow-inner">
                        <i data-lucide="shield-check" class="w-6 h-6 text-amber-500 dark:text-amber-400"></i>
                    </div>
                    <span class="px-3 py-1 rounded-full text-xs font-bold uppercase tracking-wider bg-blue-100/50 dark:bg-blue-500/10 text-blue-600 dark:text-blue-400 border border-blue-200 dark:border-blue-500/20 flex items-center gap-1">
                        <i data-lucide="check" class="w-3 h-3"></i> Secure
                    </span>
                </div>
                <div class="z-10">
                    <div class="text-5xl font-bold bg-gradient-to-r from-slate-700 to-slate-400 dark:from-white dark:to-slate-400 bg-clip-text text-transparent">1</div>
                    <div class="text-sm text-slate-500 dark:text-slate-400 mt-1">Total Roles</div>
                </div>
            </div>

            <!-- Card 3 -->
            <div class="relative overflow-hidden bg-white/80 dark:bg-slate-800/60 glass rounded-3xl p-6 shadow-sm border border-white/20 dark:border-white/5 flex flex-col justify-between h-[180px] hover:-translate-y-1 hover:shadow-xl hover:shadow-red-500/10 hover:border-red-500/30 transition-all group animate-fade-in [animation-delay:0.3s]">
                <div class="absolute inset-0 bg-gradient-to-tr from-transparent via-white/5 to-transparent -translate-x-full group-hover:translate-x-full transition-transform duration-700"></div>
                <div class="flex justify-between items-start z-10">
                    <div class="w-12 h-12 rounded-2xl flex items-center justify-center bg-red-50 dark:bg-white/5 border border-red-100 dark:border-white/5 shadow-inner">
                        <i data-lucide="key" class="w-6 h-6 text-red-500 dark:text-red-400"></i>
                    </div>
                    <span class="px-3 py-1 rounded-full text-xs font-bold uppercase tracking-wider bg-amber-100/50 dark:bg-amber-500/10 text-amber-600 dark:text-amber-400 border border-amber-200 dark:border-amber-500/20 flex items-center gap-1">
                        <i data-lucide="lock" class="w-3 h-3"></i> Protected
                    </span>
                </div>
                <div class="z-10">
                    <div class="text-5xl font-bold bg-gradient-to-r from-slate-700 to-slate-400 dark:from-white dark:to-slate-400 bg-clip-text text-transparent">32</div>
                    <div class="text-sm text-slate-500 dark:text-slate-400 mt-1">Total Permissions</div>
                </div>
            </div>

             <!-- Card 4 -->
             <div class="relative overflow-hidden bg-white/80 dark:bg-slate-800/60 glass rounded-3xl p-6 shadow-sm border border-white/20 dark:border-white/5 flex flex-col justify-between h-[180px] hover:-translate-y-1 hover:shadow-xl hover:shadow-emerald-500/10 hover:border-emerald-500/30 transition-all group animate-fade-in [animation-delay:0.4s]">
                <div class="absolute inset-0 bg-gradient-to-tr from-transparent via-white/5 to-transparent -translate-x-full group-hover:translate-x-full transition-transform duration-700"></div>
                <div class="flex justify-between items-start z-10">
                    <div class="w-12 h-12 rounded-2xl flex items-center justify-center bg-emerald-50 dark:bg-white/5 border border-emerald-100 dark:border-white/5 shadow-inner">
                        <i data-lucide="monitor" class="w-6 h-6 text-emerald-500 dark:text-emerald-400"></i>
                    </div>
                    <span class="px-3 py-1 rounded-full text-xs font-bold uppercase tracking-wider bg-emerald-100/50 dark:bg-emerald-500/10 text-emerald-600 dark:text-emerald-400 border border-emerald-200 dark:border-emerald-500/20 flex items-center gap-1">
                        <i data-lucide="wifi" class="w-3 h-3"></i> Online
                    </span>
                </div>
                <div class="z-10">
                    <div class="text-5xl font-bold bg-gradient-to-r from-slate-700 to-slate-400 dark:from-white dark:to-slate-400 bg-clip-text text-transparent">1</div>
                    <div class="text-sm text-slate-500 dark:text-slate-400 mt-1">Active Sessions</div>
                </div>
            </div>
        </div>

        <!-- Bottom Sections -->
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-6 animate-fade-in [animation-delay:0.5s]">
            <!-- Quick Actions -->
            <div class="lg:col-span-2 bg-white/80 dark:bg-slate-800/60 glass rounded-3xl p-6 shadow-sm border border-white/20 dark:border-white/5">
                <div class="flex justify-between items-center mb-6 border-b border-gray-200 dark:border-white/5 pb-4">
                    <h3 class="text-xl font-semibold dark:text-slate-200">Quick Actions</h3>
                    <i data-lucide="zap" class="text-amber-400 drop-shadow-[0_0_8px_rgba(251,191,36,0.6)]"></i>
                </div>
                <div class="grid grid-cols-1 sm:grid-cols-3 gap-4">
                    <button class="flex flex-col items-center justify-center gap-3 p-8 rounded-2xl bg-black/5 dark:bg-white/5 border border-dashed border-gray-300 dark:border-white/10 hover:border-indigo-500 hover:bg-indigo-50 dark:hover:bg-indigo-500/10 hover:scale-[1.02] transition-all group">
                        <i data-lucide="user-plus" class="w-8 h-8 text-indigo-500 dark:text-indigo-400 group-hover:rotate-6 transition-transform drop-shadow-md"></i>
                        <span class="font-medium text-slate-600 dark:text-slate-400 group-hover:text-slate-900 dark:group-hover:text-white transition-colors">Create User</span>
                    </button>
                    <button class="flex flex-col items-center justify-center gap-3 p-8 rounded-2xl bg-black/5 dark:bg-white/5 border border-dashed border-gray-300 dark:border-white/10 hover:border-indigo-500 hover:bg-indigo-50 dark:hover:bg-indigo-500/10 hover:scale-[1.02] transition-all group">
                        <i data-lucide="shield-plus" class="w-8 h-8 text-indigo-500 dark:text-indigo-400 group-hover:rotate-6 transition-transform drop-shadow-md"></i>
                        <span class="font-medium text-slate-600 dark:text-slate-400 group-hover:text-slate-900 dark:group-hover:text-white transition-colors">Add Role</span>
                    </button>
                    <button class="flex flex-col items-center justify-center gap-3 p-8 rounded-2xl bg-black/5 dark:bg-white/5 border border-dashed border-gray-300 dark:border-white/10 hover:border-indigo-500 hover:bg-indigo-50 dark:hover:bg-indigo-500/10 hover:scale-[1.02] transition-all group">
                        <i data-lucide="file-text" class="w-8 h-8 text-indigo-500 dark:text-indigo-400 group-hover:rotate-6 transition-transform drop-shadow-md"></i>
                        <span class="font-medium text-slate-600 dark:text-slate-400 group-hover:text-slate-900 dark:group-hover:text-white transition-colors">View Logs</span>
                    </button>
                </div>
            </div>

            <!-- Recent Sessions -->
            <div class="bg-white/80 dark:bg-slate-800/60 glass rounded-3xl p-6 shadow-sm border border-white/20 dark:border-white/5">
                <div class="flex justify-between items-center mb-6 border-b border-gray-200 dark:border-white/5 pb-4">
                    <h3 class="text-xl font-semibold dark:text-slate-200">Current Session</h3>
                </div>
                <div class="flex items-center justify-between py-3 border-b border-gray-200 dark:border-white/5 mb-4">
                    <div class="flex items-center gap-3">
                        <div class="p-2.5 rounded-xl bg-black/5 dark:bg-white/5 text-slate-500 dark:text-slate-400">
                            <i data-lucide="chrome" class="w-5 h-5"></i>
                        </div>
                        <div>
                            <div class="font-semibold text-sm dark:text-slate-200">Chrome on Windows</div>
                            <div class="text-xs text-slate-500 dark:text-slate-400">192.168.1.1</div>
                        </div>
                    </div>
                    <div class="w-2.5 h-2.5 bg-emerald-500 rounded-full animate-pulse-glow"></div>
                </div>
                <button class="w-full py-3 rounded-xl bg-black/5 dark:bg-white/5 text-slate-600 dark:text-slate-400 hover:bg-black/10 dark:hover:bg-white/10 hover:text-slate-900 dark:hover:text-white transition-all font-medium text-sm">
                    Manage All Sessions
                </button>
            </div>
        </div>
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

        // Load saved theme
        if (localStorage.theme === 'dark' || (!('theme' in localStorage) && window.matchMedia('(prefers-color-scheme: dark)').matches)) {
            htmlElement.classList.add('dark');
        } else {
            htmlElement.classList.remove('dark');
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

        // Active State Logic
        const navLinks = document.querySelectorAll('.nav-link');
        navLinks.forEach(link => {
            link.addEventListener('click', (e) => {
                navLinks.forEach(l => {
                    l.classList.remove('active');
                    l.classList.remove('bg-black/5', 'dark:bg-white/5');

                    const icon = l.querySelector('i');
                    const span = l.querySelector('span');
                    if(icon) icon.classList.remove('text-indigo-500', 'dark:text-indigo-400');
                    if(span) span.classList.remove('text-indigo-600', 'dark:text-indigo-400');
                });

                const current = e.currentTarget;
                current.classList.add('active');

                // Active styles via JS for specific elements inside
                // (Though Tailwind group classes handle most hover/active states now)
            });
        });
    </script>

</body>
</html>
