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
                        'fade-in': 'fadeIn 0.5s ease-out forwards',
                        'slide-up': 'slideUp 0.5s ease-out forwards',
                        'pulse-glow': 'pulseGlow 2s infinite',
                    },
                    keyframes: {
                        fadeIn: {
                            '0%': { opacity: '0' },
                            '100%': { opacity: '1' },
                        },
                        slideUp: {
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
        /* Custom Scrollbar */
        ::-webkit-scrollbar { width: 6px; height: 6px; }
        ::-webkit-scrollbar-track { background: transparent; }
        ::-webkit-scrollbar-thumb { background: #4F46E5; border-radius: 10px; }

        /* Glass Utilities */
        .glass {
            backdrop-filter: blur(12px);
            -webkit-backdrop-filter: blur(12px);
        }

        /* Toggle Switch Styling */
        .toggle-checkbox:checked {
            right: 0;
            border-color: #68D391;
        }
        .toggle-checkbox:checked + .toggle-label {
            background-color: #68D391;
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
            <button onclick="switchView('dashboard')" class="w-full nav-link active group flex items-center gap-3 px-4 py-3 rounded-xl mb-2 font-medium transition-all duration-300 hover:translate-x-1 border border-transparent hover:bg-black/5 dark:hover:bg-white/5 hover:border-black/5 dark:hover:border-white/5 text-left">
                <i data-lucide="home" class="w-5 h-5 group-[.active]:text-indigo-500 dark:group-[.active]:text-indigo-400"></i>
                <span class="group-[.active]:text-indigo-600 dark:group-[.active]:text-indigo-400">Dashboard</span>
            </button>
            <button onclick="switchView('users')" class="w-full nav-link group flex items-center gap-3 px-4 py-3 rounded-xl mb-2 text-slate-600 dark:text-slate-400 font-medium transition-all duration-300 hover:translate-x-1 hover:bg-black/5 dark:hover:bg-white/5 hover:text-slate-900 dark:hover:text-white text-left">
                <i data-lucide="users" class="w-5 h-5 group-[.active]:text-indigo-500 dark:group-[.active]:text-indigo-400"></i>
                <span class="group-[.active]:text-indigo-600 dark:group-[.active]:text-indigo-400">Users</span>
            </button>
            <button class="w-full nav-link group flex items-center gap-3 px-4 py-3 rounded-xl mb-2 text-slate-600 dark:text-slate-400 font-medium transition-all duration-300 hover:translate-x-1 hover:bg-black/5 dark:hover:bg-white/5 hover:text-slate-900 dark:hover:text-white text-left">
                <i data-lucide="shield" class="w-5 h-5"></i>
                <span>Roles</span>
            </button>
            <button class="w-full nav-link group flex items-center gap-3 px-4 py-3 rounded-xl mb-2 text-slate-600 dark:text-slate-400 font-medium transition-all duration-300 hover:translate-x-1 hover:bg-black/5 dark:hover:bg-white/5 hover:text-slate-900 dark:hover:text-white text-left">
                <i data-lucide="lock" class="w-5 h-5"></i>
                <span>Permissions</span>
            </button>
        </div>

        <!-- Menu Group 2 -->
        <div class="mb-8">
            <div class="text-xs uppercase tracking-widest text-slate-500 dark:text-slate-400 font-bold mb-4 pl-3">System</div>
            <button onclick="switchView('profile')" class="w-full nav-link group flex items-center gap-3 px-4 py-3 rounded-xl mb-2 text-slate-600 dark:text-slate-400 font-medium transition-all duration-300 hover:translate-x-1 hover:bg-black/5 dark:hover:bg-white/5 hover:text-slate-900 dark:hover:text-white text-left">
                <i data-lucide="settings" class="w-5 h-5 group-[.active]:text-indigo-500 dark:group-[.active]:text-indigo-400"></i>
                <span class="group-[.active]:text-indigo-600 dark:group-[.active]:text-indigo-400">Settings</span>
            </button>
            <button class="w-full nav-link group flex items-center gap-3 px-4 py-3 rounded-xl mb-2 text-slate-600 dark:text-slate-400 font-medium transition-all duration-300 hover:translate-x-1 hover:bg-black/5 dark:hover:bg-white/5 hover:text-slate-900 dark:hover:text-white text-left">
                <i data-lucide="help-circle" class="w-5 h-5"></i>
                <span>Get Help</span>
            </button>
        </div>

        <!-- Profile Link (Bottom) -->
        <div onclick="switchView('profile')" class="mt-auto flex items-center gap-3 p-3 bg-black/5 dark:bg-white/5 border border-transparent dark:border-white/5 rounded-2xl cursor-pointer hover:bg-black/10 dark:hover:bg-white/10 transition-colors group">
            <div class="w-10 h-10 rounded-full bg-gradient-to-br from-blue-500 to-violet-500 flex items-center justify-center text-white font-bold shadow-lg shadow-blue-500/30 group-hover:scale-105 transition-transform">
                SA
            </div>
            <div class="overflow-hidden">
                <h4 class="text-sm font-bold truncate dark:text-slate-200">Super Admin</h4>
                <p class="text-xs text-slate-500 dark:text-slate-400 truncate">admin@demo.com</p>
            </div>
            <i data-lucide="chevron-right" class="w-4 h-4 ml-auto text-slate-400 group-hover:translate-x-1 transition-transform"></i>
        </div>
    </nav>

    <!-- Main Content Area -->
    <main class="flex-1 md:ml-[280px] p-6 w-full transition-all duration-300">

        <!-- Header (Shared) -->
        <header class="flex flex-col md:flex-row justify-between items-start md:items-center mb-10 gap-4 animate-fade-in">
            <!-- Breadcrumbs -->
            <div class="flex items-center gap-2 text-slate-500 dark:text-slate-400 text-sm">
                <i data-lucide="home" class="w-4 h-4"></i>
                <span>/</span>
                <span id="page-title" class="text-slate-900 dark:text-white font-semibold">Dashboard</span>
            </div>

            <!-- Global Actions -->
            <div class="flex gap-4">
                <button id="theme-toggle" class="p-2.5 rounded-xl bg-white/50 dark:bg-slate-800/50 border border-gray-200 dark:border-white/5 text-slate-600 dark:text-slate-400 hover:text-indigo-600 dark:hover:text-white hover:bg-white dark:hover:bg-slate-700 hover:shadow-[0_0_15px_rgba(129,140,248,0.3)] hover:-translate-y-0.5 transition-all">
                    <i data-lucide="sun" class="w-5 h-5 block dark:hidden"></i>
                    <i data-lucide="moon" class="w-5 h-5 hidden dark:block"></i>
                </button>
                <button class="p-2.5 rounded-xl bg-white/50 dark:bg-slate-800/50 border border-gray-200 dark:border-white/5 text-slate-600 dark:text-slate-400 hover:text-indigo-600 dark:hover:text-white hover:bg-white dark:hover:bg-slate-700 hover:-translate-y-0.5 transition-all relative">
                    <i data-lucide="bell" class="w-5 h-5"></i>
                    <span class="absolute top-2 right-2.5 w-2 h-2 bg-red-500 rounded-full animate-pulse"></span>
                </button>
            </div>
        </header>

        <!-- VIEW: DASHBOARD (Default) -->
        <div id="view-dashboard" class="space-y-6 animate-slide-up">
            <!-- Stats Grid -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
                <!-- Card 1 -->
                <div class="relative overflow-hidden bg-white/80 dark:bg-slate-800/60 glass rounded-3xl p-6 shadow-sm border border-white/20 dark:border-white/5 flex flex-col justify-between h-[180px] hover:-translate-y-1 hover:shadow-xl hover:shadow-indigo-500/10 hover:border-indigo-500/30 transition-all group">
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
                <div class="relative overflow-hidden bg-white/80 dark:bg-slate-800/60 glass rounded-3xl p-6 shadow-sm border border-white/20 dark:border-white/5 flex flex-col justify-between h-[180px] hover:-translate-y-1 hover:shadow-xl hover:shadow-amber-500/10 hover:border-amber-500/30 transition-all group">
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
                <div class="relative overflow-hidden bg-white/80 dark:bg-slate-800/60 glass rounded-3xl p-6 shadow-sm border border-white/20 dark:border-white/5 flex flex-col justify-between h-[180px] hover:-translate-y-1 hover:shadow-xl hover:shadow-red-500/10 hover:border-red-500/30 transition-all group">
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
                 <div class="relative overflow-hidden bg-white/80 dark:bg-slate-800/60 glass rounded-3xl p-6 shadow-sm border border-white/20 dark:border-white/5 flex flex-col justify-between h-[180px] hover:-translate-y-1 hover:shadow-xl hover:shadow-emerald-500/10 hover:border-emerald-500/30 transition-all group">
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

            <!-- Dashboard Widgets Grid -->
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
                <!-- Recent Users Widget -->
                <div class="lg:col-span-2 bg-white/80 dark:bg-slate-800/60 glass rounded-3xl p-6 shadow-sm border border-white/20 dark:border-white/5 flex flex-col">
                    <div class="flex justify-between items-center mb-6 pb-4 border-b border-gray-200 dark:border-white/5">
                        <div>
                            <h3 class="text-xl font-bold text-slate-800 dark:text-white">Recent Users</h3>
                            <p class="text-sm text-slate-500 dark:text-slate-400">Latest registrations</p>
                        </div>
                        <button onclick="switchView('users')" class="text-sm text-indigo-500 font-medium hover:text-indigo-400 transition-colors">View All</button>
                    </div>

                    <div class="overflow-x-auto">
                        <table class="w-full text-left border-collapse">
                            <thead>
                                <tr class="border-b border-gray-200 dark:border-white/5">
                                    <th class="py-4 px-4 text-xs font-bold uppercase tracking-wider text-slate-500 dark:text-slate-400">User</th>
                                    <th class="py-4 px-4 text-xs font-bold uppercase tracking-wider text-slate-500 dark:text-slate-400">Role</th>
                                    <th class="py-4 px-4 text-xs font-bold uppercase tracking-wider text-slate-500 dark:text-slate-400">Status</th>
                                    <th class="py-4 px-4 text-xs font-bold uppercase tracking-wider text-slate-500 dark:text-slate-400 text-right">Actions</th>
                                </tr>
                            </thead>
                            <tbody class="text-sm">
                                <tr class="group hover:bg-indigo-50/50 dark:hover:bg-white/5 transition-colors border-b border-gray-100 dark:border-white/5">
                                    <td class="py-4 px-4">
                                        <div class="flex items-center gap-3">
                                            <div class="w-9 h-9 rounded-full bg-gradient-to-tr from-pink-500 to-rose-500 flex items-center justify-center text-white font-bold text-xs shadow-md shadow-pink-500/20">JD</div>
                                            <div>
                                                <div class="font-semibold text-slate-800 dark:text-white group-hover:text-indigo-600 dark:group-hover:text-indigo-400 transition-colors">John Doe</div>
                                                <div class="text-xs text-slate-500 dark:text-slate-400">john@example.com</div>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="py-4 px-4">
                                        <span class="px-2.5 py-1 rounded-md text-xs font-medium bg-indigo-100 dark:bg-indigo-500/20 text-indigo-700 dark:text-indigo-300 border border-indigo-200 dark:border-indigo-500/30">Admin</span>
                                    </td>
                                    <td class="py-4 px-4">
                                        <div class="flex items-center gap-2">
                                            <div class="w-1.5 h-1.5 rounded-full bg-emerald-500 shadow-[0_0_8px_rgba(16,185,129,0.5)]"></div>
                                            <span class="text-slate-600 dark:text-slate-300">Active</span>
                                        </div>
                                    </td>
                                    <td class="py-4 px-4 text-right">
                                        <button class="p-2 hover:bg-white dark:hover:bg-slate-700 rounded-lg transition-colors"><i data-lucide="more-horizontal" class="w-4 h-4 text-slate-400"></i></button>
                                    </td>
                                </tr>
                                <tr class="group hover:bg-indigo-50/50 dark:hover:bg-white/5 transition-colors border-b border-gray-100 dark:border-white/5">
                                    <td class="py-4 px-4">
                                        <div class="flex items-center gap-3">
                                            <div class="w-9 h-9 rounded-full bg-gradient-to-tr from-blue-500 to-cyan-500 flex items-center justify-center text-white font-bold text-xs shadow-md shadow-blue-500/20">AS</div>
                                            <div>
                                                <div class="font-semibold text-slate-800 dark:text-white group-hover:text-indigo-600 dark:group-hover:text-indigo-400 transition-colors">Alice Smith</div>
                                                <div class="text-xs text-slate-500 dark:text-slate-400">alice@example.com</div>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="py-4 px-4">
                                        <span class="px-2.5 py-1 rounded-md text-xs font-medium bg-slate-100 dark:bg-slate-700/50 text-slate-600 dark:text-slate-300 border border-slate-200 dark:border-slate-600">Editor</span>
                                    </td>
                                    <td class="py-4 px-4">
                                        <div class="flex items-center gap-2">
                                            <div class="w-1.5 h-1.5 rounded-full bg-emerald-500 shadow-[0_0_8px_rgba(16,185,129,0.5)]"></div>
                                            <span class="text-slate-600 dark:text-slate-300">Active</span>
                                        </div>
                                    </td>
                                    <td class="py-4 px-4 text-right">
                                        <button class="p-2 hover:bg-white dark:hover:bg-slate-700 rounded-lg transition-colors"><i data-lucide="more-horizontal" class="w-4 h-4 text-slate-400"></i></button>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>

                <!-- Create Role Form (Mini) -->
                <div class="bg-white/80 dark:bg-slate-800/60 glass rounded-3xl p-6 shadow-sm border border-white/20 dark:border-white/5 flex flex-col h-full">
                    <div class="mb-6 pb-4 border-b border-gray-200 dark:border-white/5">
                        <h3 class="text-xl font-bold text-slate-800 dark:text-white">Quick Add Role</h3>
                    </div>

                    <form onsubmit="event.preventDefault();" class="flex flex-col gap-5 h-full">
                        <div class="group">
                            <label class="block text-xs font-bold uppercase tracking-wider text-slate-500 dark:text-slate-400 mb-2">Role Name</label>
                            <div class="relative">
                                <input type="text" placeholder="e.g. Super Admin" class="w-full pl-10 pr-4 py-3 rounded-xl bg-gray-50 dark:bg-slate-900/50 border border-gray-200 dark:border-white/10 focus:border-indigo-500 focus:bg-white dark:focus:bg-slate-900 focus:ring-4 focus:ring-indigo-500/10 outline-none transition-all placeholder:text-slate-400 dark:placeholder:text-slate-600 text-slate-800 dark:text-slate-200">
                                <i data-lucide="shield" class="w-5 h-5 absolute left-3 top-3.5 text-slate-400 group-focus-within:text-indigo-500 transition-colors"></i>
                            </div>
                        </div>

                        <div>
                            <label class="block text-xs font-bold uppercase tracking-wider text-slate-500 dark:text-slate-400 mb-3">Permissions</label>
                            <div class="grid grid-cols-2 gap-3">
                                <label class="flex items-center gap-3 p-3 rounded-xl border border-gray-200 dark:border-white/10 cursor-pointer hover:bg-gray-50 dark:hover:bg-white/5 transition-all">
                                    <input type="checkbox" class="w-4 h-4 rounded text-indigo-600 focus:ring-indigo-500 border-gray-300 dark:border-slate-600 bg-gray-100 dark:bg-slate-700">
                                    <span class="text-sm font-medium dark:text-slate-300">Read</span>
                                </label>
                                <label class="flex items-center gap-3 p-3 rounded-xl border border-indigo-200 dark:border-indigo-500/30 bg-indigo-50 dark:bg-indigo-500/10 cursor-pointer transition-all">
                                    <input type="checkbox" checked class="w-4 h-4 rounded text-indigo-600 focus:ring-indigo-500 border-indigo-300 dark:border-indigo-500/50 bg-indigo-100 dark:bg-slate-700">
                                    <span class="text-sm font-medium text-indigo-700 dark:text-indigo-300">Write</span>
                                </label>
                            </div>
                        </div>

                        <button class="mt-auto w-full py-3 px-4 rounded-xl bg-gradient-to-r from-indigo-600 to-violet-600 text-white font-bold shadow-lg shadow-indigo-600/30 hover:shadow-indigo-600/50 hover:scale-[1.02] transition-all flex items-center justify-center gap-2">
                            <i data-lucide="check" class="w-5 h-5"></i> Save Role
                        </button>
                    </form>
                </div>
            </div>
        </div>

        <!-- VIEW: USERS (New Page) -->
        <div id="view-users" class="hidden animate-slide-up space-y-6">
            <!-- Toolbar -->
            <div class="flex flex-col md:flex-row justify-between gap-4 bg-white/80 dark:bg-slate-800/60 glass rounded-3xl p-6 shadow-sm border border-white/20 dark:border-white/5">
                <div class="flex gap-4 flex-1">
                     <div class="relative w-full max-w-md">
                        <input type="text" placeholder="Search users by name, email..." class="w-full pl-10 pr-4 py-3 rounded-xl bg-gray-50 dark:bg-slate-900/50 border border-gray-200 dark:border-white/10 focus:border-indigo-500 focus:bg-white dark:focus:bg-slate-900 focus:ring-4 focus:ring-indigo-500/10 outline-none transition-all placeholder:text-slate-400 dark:placeholder:text-slate-600 text-slate-800 dark:text-slate-200">
                        <i data-lucide="search" class="w-5 h-5 absolute left-3 top-3.5 text-slate-400"></i>
                    </div>
                    <button class="p-3 rounded-xl bg-gray-50 dark:bg-slate-900/50 border border-gray-200 dark:border-white/10 hover:bg-gray-100 dark:hover:bg-slate-700 text-slate-600 dark:text-slate-300 transition-colors flex items-center gap-2">
                        <i data-lucide="filter" class="w-5 h-5"></i>
                        <span class="hidden sm:inline">Filter</span>
                    </button>
                </div>

                <button class="px-6 py-3 rounded-xl bg-indigo-600 text-white font-bold shadow-lg shadow-indigo-600/30 hover:bg-indigo-700 hover:shadow-indigo-600/50 hover:-translate-y-0.5 transition-all flex items-center gap-2">
                    <i data-lucide="user-plus" class="w-5 h-5"></i>
                    Add User
                </button>
            </div>

            <!-- Users Table Card -->
            <div class="bg-white/80 dark:bg-slate-800/60 glass rounded-3xl p-6 shadow-sm border border-white/20 dark:border-white/5">
                <div class="overflow-x-auto">
                    <table class="w-full text-left border-collapse">
                        <thead>
                            <tr class="border-b border-gray-200 dark:border-white/5">
                                <th class="py-4 px-4 text-xs font-bold uppercase tracking-wider text-slate-500 dark:text-slate-400">User Details</th>
                                <th class="py-4 px-4 text-xs font-bold uppercase tracking-wider text-slate-500 dark:text-slate-400">Role</th>
                                <th class="py-4 px-4 text-xs font-bold uppercase tracking-wider text-slate-500 dark:text-slate-400">Status</th>
                                <th class="py-4 px-4 text-xs font-bold uppercase tracking-wider text-slate-500 dark:text-slate-400">Last Login</th>
                                <th class="py-4 px-4 text-xs font-bold uppercase tracking-wider text-slate-500 dark:text-slate-400 text-right">Actions</th>
                            </tr>
                        </thead>
                        <tbody class="text-sm">
                            <!-- User 1 -->
                            <tr class="group hover:bg-indigo-50/50 dark:hover:bg-white/5 transition-colors border-b border-gray-100 dark:border-white/5">
                                <td class="py-4 px-4">
                                    <div class="flex items-center gap-4">
                                        <div class="w-10 h-10 rounded-full bg-slate-200 dark:bg-slate-700 overflow-hidden border-2 border-white dark:border-slate-600">
                                            <img src="https://api.dicebear.com/7.x/avataaars/svg?seed=John" alt="User" class="w-full h-full object-cover">
                                        </div>
                                        <div>
                                            <div class="font-semibold text-slate-800 dark:text-white group-hover:text-indigo-600 dark:group-hover:text-indigo-400 transition-colors">John Doe</div>
                                            <div class="text-xs text-slate-500 dark:text-slate-400">john.doe@example.com</div>
                                        </div>
                                    </div>
                                </td>
                                <td class="py-4 px-4">
                                    <span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full text-xs font-medium bg-indigo-100 dark:bg-indigo-500/20 text-indigo-700 dark:text-indigo-300 border border-indigo-200 dark:border-indigo-500/30">
                                        <div class="w-1.5 h-1.5 rounded-full bg-indigo-500"></div> Admin
                                    </span>
                                </td>
                                <td class="py-4 px-4">
                                    <span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full text-xs font-medium bg-emerald-100 dark:bg-emerald-500/20 text-emerald-700 dark:text-emerald-300 border border-emerald-200 dark:border-emerald-500/30">
                                        Active
                                    </span>
                                </td>
                                <td class="py-4 px-4 text-slate-500 dark:text-slate-400">
                                    2 hours ago
                                </td>
                                <td class="py-4 px-4 text-right">
                                    <div class="flex items-center justify-end gap-2 opacity-0 group-hover:opacity-100 transition-opacity">
                                        <button class="p-2 rounded-lg hover:bg-indigo-50 dark:hover:bg-indigo-500/20 text-slate-400 hover:text-indigo-600 transition-colors" title="Edit">
                                            <i data-lucide="edit-3" class="w-4 h-4"></i>
                                        </button>
                                        <button class="p-2 rounded-lg hover:bg-red-50 dark:hover:bg-red-500/20 text-slate-400 hover:text-red-600 transition-colors" title="Delete">
                                            <i data-lucide="trash-2" class="w-4 h-4"></i>
                                        </button>
                                    </div>
                                </td>
                            </tr>

                            <!-- User 2 -->
                            <tr class="group hover:bg-indigo-50/50 dark:hover:bg-white/5 transition-colors border-b border-gray-100 dark:border-white/5">
                                <td class="py-4 px-4">
                                    <div class="flex items-center gap-4">
                                        <div class="w-10 h-10 rounded-full bg-slate-200 dark:bg-slate-700 overflow-hidden border-2 border-white dark:border-slate-600">
                                            <img src="https://api.dicebear.com/7.x/avataaars/svg?seed=Alice" alt="User" class="w-full h-full object-cover">
                                        </div>
                                        <div>
                                            <div class="font-semibold text-slate-800 dark:text-white group-hover:text-indigo-600 dark:group-hover:text-indigo-400 transition-colors">Alice Smith</div>
                                            <div class="text-xs text-slate-500 dark:text-slate-400">alice.smith@example.com</div>
                                        </div>
                                    </div>
                                </td>
                                <td class="py-4 px-4">
                                    <span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full text-xs font-medium bg-slate-100 dark:bg-slate-700 text-slate-600 dark:text-slate-300 border border-slate-200 dark:border-slate-600">
                                        <div class="w-1.5 h-1.5 rounded-full bg-slate-500"></div> Editor
                                    </span>
                                </td>
                                <td class="py-4 px-4">
                                    <span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full text-xs font-medium bg-amber-100 dark:bg-amber-500/20 text-amber-700 dark:text-amber-300 border border-amber-200 dark:border-amber-500/30">
                                        Pending
                                    </span>
                                </td>
                                <td class="py-4 px-4 text-slate-500 dark:text-slate-400">
                                    1 day ago
                                </td>
                                <td class="py-4 px-4 text-right">
                                    <div class="flex items-center justify-end gap-2 opacity-0 group-hover:opacity-100 transition-opacity">
                                        <button class="p-2 rounded-lg hover:bg-indigo-50 dark:hover:bg-indigo-500/20 text-slate-400 hover:text-indigo-600 transition-colors" title="Edit">
                                            <i data-lucide="edit-3" class="w-4 h-4"></i>
                                        </button>
                                        <button class="p-2 rounded-lg hover:bg-red-50 dark:hover:bg-red-500/20 text-slate-400 hover:text-red-600 transition-colors" title="Delete">
                                            <i data-lucide="trash-2" class="w-4 h-4"></i>
                                        </button>
                                    </div>
                                </td>
                            </tr>

                             <!-- User 3 -->
                             <tr class="group hover:bg-indigo-50/50 dark:hover:bg-white/5 transition-colors border-b border-gray-100 dark:border-white/5">
                                <td class="py-4 px-4">
                                    <div class="flex items-center gap-4">
                                        <div class="w-10 h-10 rounded-full bg-slate-200 dark:bg-slate-700 overflow-hidden border-2 border-white dark:border-slate-600">
                                            <img src="https://api.dicebear.com/7.x/avataaars/svg?seed=Robert" alt="User" class="w-full h-full object-cover">
                                        </div>
                                        <div>
                                            <div class="font-semibold text-slate-800 dark:text-white group-hover:text-indigo-600 dark:group-hover:text-indigo-400 transition-colors">Robert Fox</div>
                                            <div class="text-xs text-slate-500 dark:text-slate-400">robert.fox@example.com</div>
                                        </div>
                                    </div>
                                </td>
                                <td class="py-4 px-4">
                                    <span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full text-xs font-medium bg-slate-100 dark:bg-slate-700 text-slate-600 dark:text-slate-300 border border-slate-200 dark:border-slate-600">
                                        <div class="w-1.5 h-1.5 rounded-full bg-slate-500"></div> Viewer
                                    </span>
                                </td>
                                <td class="py-4 px-4">
                                    <span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full text-xs font-medium bg-gray-100 dark:bg-gray-700/50 text-gray-600 dark:text-gray-400 border border-gray-200 dark:border-gray-600">
                                        Inactive
                                    </span>
                                </td>
                                <td class="py-4 px-4 text-slate-500 dark:text-slate-400">
                                    2 weeks ago
                                </td>
                                <td class="py-4 px-4 text-right">
                                    <div class="flex items-center justify-end gap-2 opacity-0 group-hover:opacity-100 transition-opacity">
                                        <button class="p-2 rounded-lg hover:bg-indigo-50 dark:hover:bg-indigo-500/20 text-slate-400 hover:text-indigo-600 transition-colors" title="Edit">
                                            <i data-lucide="edit-3" class="w-4 h-4"></i>
                                        </button>
                                        <button class="p-2 rounded-lg hover:bg-red-50 dark:hover:bg-red-500/20 text-slate-400 hover:text-red-600 transition-colors" title="Delete">
                                            <i data-lucide="trash-2" class="w-4 h-4"></i>
                                        </button>
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>

                <!-- Pagination -->
                <div class="mt-6 flex flex-col sm:flex-row justify-between items-center gap-4 text-sm text-slate-500 dark:text-slate-400 border-t border-gray-200 dark:border-white/5 pt-6">
                    <div>Showing <span class="font-semibold text-slate-800 dark:text-white">1-10</span> of <span class="font-semibold text-slate-800 dark:text-white">48</span> users</div>
                    <div class="flex gap-2">
                        <button class="px-4 py-2 rounded-xl border border-gray-200 dark:border-white/10 hover:bg-gray-50 dark:hover:bg-white/5 disabled:opacity-50 transition-colors">Previous</button>
                        <button class="px-4 py-2 rounded-xl bg-indigo-600 text-white shadow-lg shadow-indigo-600/20 hover:bg-indigo-700 transition-colors">1</button>
                        <button class="px-4 py-2 rounded-xl border border-gray-200 dark:border-white/10 hover:bg-gray-50 dark:hover:bg-white/5 transition-colors">2</button>
                        <button class="px-4 py-2 rounded-xl border border-gray-200 dark:border-white/10 hover:bg-gray-50 dark:hover:bg-white/5 transition-colors">3</button>
                        <button class="px-4 py-2 rounded-xl border border-gray-200 dark:border-white/10 hover:bg-gray-50 dark:hover:bg-white/5 transition-colors">Next</button>
                    </div>
                </div>
            </div>
        </div>

        <!-- VIEW: PROFILE (Hidden by Default) -->
        <div id="view-profile" class="hidden animate-slide-up space-y-6">
            <!-- Profile Header Card -->
            <div class="relative overflow-hidden bg-white/80 dark:bg-slate-800/60 glass rounded-3xl shadow-sm border border-white/20 dark:border-white/5">
                <!-- Banner Background -->
                <div class="h-48 bg-gradient-to-r from-indigo-600 via-purple-600 to-pink-500 relative">
                    <div class="absolute inset-0 bg-black/10"></div>
                </div>

                <div class="px-8 pb-8 flex flex-col md:flex-row items-end -mt-16 gap-6">
                    <!-- Avatar -->
                    <div class="relative">
                        <div class="w-32 h-32 rounded-full border-4 border-white dark:border-slate-800 bg-slate-200 dark:bg-slate-700 flex items-center justify-center text-4xl font-bold text-slate-500 dark:text-slate-300 shadow-xl overflow-hidden">
                            <img src="https://api.dicebear.com/7.x/avataaars/svg?seed=Felix" alt="Avatar" class="w-full h-full object-cover">
                        </div>
                        <div class="absolute bottom-2 right-2 w-6 h-6 bg-emerald-500 rounded-full border-4 border-white dark:border-slate-800"></div>
                    </div>

                    <!-- Info -->
                    <div class="flex-1 mb-2">
                        <h2 class="text-3xl font-bold text-slate-800 dark:text-white">Super Admin</h2>
                        <div class="flex flex-wrap items-center gap-4 text-slate-500 dark:text-slate-400 mt-1">
                            <div class="flex items-center gap-1.5"><i data-lucide="shield" class="w-4 h-4 text-indigo-500"></i> Administrator</div>
                            <div class="flex items-center gap-1.5"><i data-lucide="map-pin" class="w-4 h-4"></i> Cairo, Egypt</div>
                            <div class="flex items-center gap-1.5"><i data-lucide="calendar" class="w-4 h-4"></i> Joined March 2024</div>
                        </div>
                    </div>

                    <!-- Actions -->
                    <div class="flex gap-3 mb-2">
                        <button class="px-5 py-2.5 rounded-xl bg-white dark:bg-slate-700 border border-gray-200 dark:border-white/10 text-slate-700 dark:text-slate-200 font-medium hover:bg-gray-50 dark:hover:bg-slate-600 transition-colors shadow-sm">
                            Cancel
                        </button>
                        <button class="px-5 py-2.5 rounded-xl bg-indigo-600 text-white font-medium hover:bg-indigo-700 transition-colors shadow-lg shadow-indigo-600/20">
                            Save Changes
                        </button>
                    </div>
                </div>
            </div>

            <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
                <!-- Left Column: Personal Info -->
                <div class="space-y-6">
                    <div class="bg-white/80 dark:bg-slate-800/60 glass rounded-3xl p-6 shadow-sm border border-white/20 dark:border-white/5">
                        <h3 class="text-lg font-bold text-slate-800 dark:text-white mb-4">About Me</h3>
                        <p class="text-slate-500 dark:text-slate-400 text-sm leading-relaxed mb-6">
                            Senior Administrator with 5+ years of experience in managing cloud infrastructure and user roles. Passionate about UI/UX and clean code.
                        </p>

                        <h4 class="text-xs font-bold uppercase text-slate-400 mb-3 tracking-wider">Contact</h4>
                        <ul class="space-y-3">
                            <li class="flex items-center gap-3 text-sm text-slate-600 dark:text-slate-300">
                                <div class="p-2 rounded-lg bg-indigo-50 dark:bg-indigo-500/10 text-indigo-600 dark:text-indigo-400"><i data-lucide="mail" class="w-4 h-4"></i></div>
                                admin@demo.com
                            </li>
                            <li class="flex items-center gap-3 text-sm text-slate-600 dark:text-slate-300">
                                <div class="p-2 rounded-lg bg-pink-50 dark:bg-pink-500/10 text-pink-600 dark:text-pink-400"><i data-lucide="phone" class="w-4 h-4"></i></div>
                                +20 123 456 7890
                            </li>
                            <li class="flex items-center gap-3 text-sm text-slate-600 dark:text-slate-300">
                                <div class="p-2 rounded-lg bg-blue-50 dark:bg-blue-500/10 text-blue-600 dark:text-blue-400"><i data-lucide="globe" class="w-4 h-4"></i></div>
                                www.admin-dashboard.com
                            </li>
                        </ul>
                    </div>

                    <!-- Skills/Tags -->
                    <div class="bg-white/80 dark:bg-slate-800/60 glass rounded-3xl p-6 shadow-sm border border-white/20 dark:border-white/5">
                        <h3 class="text-lg font-bold text-slate-800 dark:text-white mb-4">Skills</h3>
                        <div class="flex flex-wrap gap-2">
                            <span class="px-3 py-1 rounded-full text-xs font-medium bg-slate-100 dark:bg-slate-700 text-slate-600 dark:text-slate-300">UI Design</span>
                            <span class="px-3 py-1 rounded-full text-xs font-medium bg-slate-100 dark:bg-slate-700 text-slate-600 dark:text-slate-300">Management</span>
                            <span class="px-3 py-1 rounded-full text-xs font-medium bg-slate-100 dark:bg-slate-700 text-slate-600 dark:text-slate-300">Development</span>
                            <span class="px-3 py-1 rounded-full text-xs font-medium bg-indigo-100 dark:bg-indigo-500/20 text-indigo-700 dark:text-indigo-300 border border-indigo-200 dark:border-indigo-500/30">Leadership</span>
                        </div>
                    </div>
                </div>

                <!-- Right Column: Settings Form -->
                <div class="lg:col-span-2 bg-white/80 dark:bg-slate-800/60 glass rounded-3xl p-8 shadow-sm border border-white/20 dark:border-white/5">
                    <div class="flex items-center gap-2 mb-6 border-b border-gray-200 dark:border-white/5 pb-4">
                        <i data-lucide="user-cog" class="w-6 h-6 text-indigo-500"></i>
                        <h3 class="text-xl font-bold text-slate-800 dark:text-white">Account Settings</h3>
                    </div>

                    <div class="space-y-8">
                        <!-- Personal Details -->
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div class="group">
                                <label class="block text-xs font-bold uppercase tracking-wider text-slate-500 dark:text-slate-400 mb-2">First Name</label>
                                <input type="text" value="Super" class="w-full px-4 py-3 rounded-xl bg-gray-50 dark:bg-slate-900/50 border border-gray-200 dark:border-white/10 focus:border-indigo-500 focus:bg-white dark:focus:bg-slate-900 outline-none transition-all text-slate-800 dark:text-slate-200">
                            </div>
                            <div class="group">
                                <label class="block text-xs font-bold uppercase tracking-wider text-slate-500 dark:text-slate-400 mb-2">Last Name</label>
                                <input type="text" value="Admin" class="w-full px-4 py-3 rounded-xl bg-gray-50 dark:bg-slate-900/50 border border-gray-200 dark:border-white/10 focus:border-indigo-500 focus:bg-white dark:focus:bg-slate-900 outline-none transition-all text-slate-800 dark:text-slate-200">
                            </div>
                            <div class="group md:col-span-2">
                                <label class="block text-xs font-bold uppercase tracking-wider text-slate-500 dark:text-slate-400 mb-2">Email Address</label>
                                <div class="relative">
                                    <input type="email" value="admin@demo.com" class="w-full pl-10 pr-4 py-3 rounded-xl bg-gray-50 dark:bg-slate-900/50 border border-gray-200 dark:border-white/10 focus:border-indigo-500 focus:bg-white dark:focus:bg-slate-900 outline-none transition-all text-slate-800 dark:text-slate-200">
                                    <i data-lucide="mail" class="w-5 h-5 absolute left-3 top-3.5 text-slate-400"></i>
                                </div>
                            </div>
                        </div>

                        <!-- Notifications Toggle -->
                        <div class="border-t border-gray-200 dark:border-white/5 pt-6">
                            <h4 class="text-sm font-bold text-slate-800 dark:text-white mb-4">Notifications</h4>
                            <div class="space-y-4">
                                <div class="flex items-center justify-between">
                                    <div>
                                        <div class="text-sm font-medium text-slate-700 dark:text-slate-200">Email Notifications</div>
                                        <div class="text-xs text-slate-500 dark:text-slate-400">Receive emails about account activity</div>
                                    </div>
                                    <div class="relative inline-block w-12 mr-2 align-middle select-none transition duration-200 ease-in">
                                        <input type="checkbox" name="toggle" id="toggle1" class="toggle-checkbox absolute block w-6 h-6 rounded-full bg-white border-4 appearance-none cursor-pointer border-gray-300 dark:border-slate-600 transition-all duration-300"/>
                                        <label for="toggle1" class="toggle-label block overflow-hidden h-6 rounded-full bg-gray-300 dark:bg-slate-700 cursor-pointer"></label>
                                    </div>
                                </div>
                                <div class="flex items-center justify-between">
                                    <div>
                                        <div class="text-sm font-medium text-slate-700 dark:text-slate-200">Push Notifications</div>
                                        <div class="text-xs text-slate-500 dark:text-slate-400">Receive push notifications on mobile</div>
                                    </div>
                                    <div class="relative inline-block w-12 mr-2 align-middle select-none transition duration-200 ease-in">
                                        <input type="checkbox" name="toggle" id="toggle2" checked class="toggle-checkbox absolute block w-6 h-6 rounded-full bg-white border-4 appearance-none cursor-pointer border-gray-300 dark:border-slate-600 transition-all duration-300"/>
                                        <label for="toggle2" class="toggle-label block overflow-hidden h-6 rounded-full bg-gray-300 dark:bg-slate-700 cursor-pointer"></label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <!-- Mobile Menu Button -->
    <button id="mobile-menu-btn" class="md:hidden fixed bottom-6 right-6 w-14 h-14 bg-indigo-600 text-white rounded-full shadow-lg shadow-indigo-600/30 flex items-center justify-center z-50 hover:scale-110 transition-transform">
        <i data-lucide="menu" class="w-6 h-6"></i>
    </button>

    <script>
        // Init Icons
        lucide.createIcons();

        // --- Navigation Logic (Single Page App Feel) ---
        function switchView(viewName) {
            const views = ['dashboard', 'profile', 'users'];
            const pageTitle = document.getElementById('page-title');
            const navButtons = document.querySelectorAll('.nav-link');

            // Hide all views first
            views.forEach(v => {
                const el = document.getElementById('view-' + v);
                if(el) el.classList.add('hidden');
            });

            // Show selected view
            const selectedView = document.getElementById('view-' + viewName);
            if(selectedView) selectedView.classList.remove('hidden');

            // Update Title & Sidebar
            let titleText = 'Dashboard';
            if(viewName === 'profile') titleText = 'Profile Settings';
            if(viewName === 'users') titleText = 'User Management';

            pageTitle.textContent = titleText;

            // Update sidebar active state
            navButtons.forEach(btn => {
                btn.classList.remove('active');
                const span = btn.querySelector('span');
                if(span && span.textContent.toLowerCase() === titleText.split(' ')[0].toLowerCase()) { // Simple match
                     btn.classList.add('active');
                }
                // Match "Settings" to "Profile" view
                if(viewName === 'profile' && span.textContent === 'Settings') btn.classList.add('active');
                if(viewName === 'users' && span.textContent === 'Users') btn.classList.add('active');
            });

            // Close mobile menu if open
            if(window.innerWidth < 768) {
                document.getElementById('sidebar').classList.add('-translate-x-full');
            }
        }

        // --- Theme Toggle Logic ---
        const themeToggleBtn = document.getElementById('theme-toggle');
        const htmlElement = document.documentElement;

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

        // --- Mobile Menu Logic ---
        const mobileMenuBtn = document.getElementById('mobile-menu-btn');
        const sidebar = document.getElementById('sidebar');

        mobileMenuBtn.addEventListener('click', () => {
            sidebar.classList.toggle('-translate-x-full');
            const icon = sidebar.classList.contains('-translate-x-full') ? 'menu' : 'x';
            mobileMenuBtn.innerHTML = `<i data-lucide="${icon}" class="w-6 h-6"></i>`;
            lucide.createIcons();
        });

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
