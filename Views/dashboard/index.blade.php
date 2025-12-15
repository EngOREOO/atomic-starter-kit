@extends('ultimate::layouts.admin')

@section('title', 'Dashboard')

@section('content')
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
                <div class="text-5xl font-bold bg-gradient-to-r from-slate-700 to-slate-400 dark:from-white dark:to-slate-400 bg-clip-text text-transparent">{{ \App\Models\User::count() }}</div>
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
                <div class="text-5xl font-bold bg-gradient-to-r from-slate-700 to-slate-400 dark:from-white dark:to-slate-400 bg-clip-text text-transparent">{{ \Vendor\UltimateStarterKit\Models\Role::count() }}</div>
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
                <div class="text-5xl font-bold bg-gradient-to-r from-slate-700 to-slate-400 dark:from-white dark:to-slate-400 bg-clip-text text-transparent">{{ \Vendor\UltimateStarterKit\Models\Permission::count() }}</div>
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
                <a href="{{ route('admin.users.create') }}" class="flex flex-col items-center justify-center gap-3 p-8 rounded-2xl bg-black/5 dark:bg-white/5 border border-dashed border-gray-300 dark:border-white/10 hover:border-indigo-500 hover:bg-indigo-50 dark:hover:bg-indigo-500/10 hover:scale-[1.02] transition-all group">
                    <i data-lucide="user-plus" class="w-8 h-8 text-indigo-500 dark:text-indigo-400 group-hover:rotate-6 transition-transform drop-shadow-md"></i>
                    <span class="font-medium text-slate-600 dark:text-slate-400 group-hover:text-slate-900 dark:group-hover:text-white transition-colors">Create User</span>
                </a>
                <a href="{{ route('admin.roles.create') }}" class="flex flex-col items-center justify-center gap-3 p-8 rounded-2xl bg-black/5 dark:bg-white/5 border border-dashed border-gray-300 dark:border-white/10 hover:border-indigo-500 hover:bg-indigo-50 dark:hover:bg-indigo-500/10 hover:scale-[1.02] transition-all group">
                    <i data-lucide="shield-plus" class="w-8 h-8 text-indigo-500 dark:text-indigo-400 group-hover:rotate-6 transition-transform drop-shadow-md"></i>
                    <span class="font-medium text-slate-600 dark:text-slate-400 group-hover:text-slate-900 dark:group-hover:text-white transition-colors">Add Role</span>
                </a>
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
@endsection
