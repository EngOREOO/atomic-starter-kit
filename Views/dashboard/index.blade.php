@extends('ultimate::layouts.admin')

@section('title', 'Dashboard')

@section('content')
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
                    <div class="text-5xl font-bold bg-gradient-to-r from-slate-700 to-slate-400 dark:from-white dark:to-slate-400 bg-clip-text text-transparent">{{ \App\Models\User::count() }}</div>
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
                    <div class="text-5xl font-bold bg-gradient-to-r from-slate-700 to-slate-400 dark:from-white dark:to-slate-400 bg-clip-text text-transparent">{{ \Vendor\UltimateStarterKit\Models\Role::count() }}</div>
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
                    <div class="text-5xl font-bold bg-gradient-to-r from-slate-700 to-slate-400 dark:from-white dark:to-slate-400 bg-clip-text text-transparent">{{ \Vendor\UltimateStarterKit\Models\Permission::count() }}</div>
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
                    <a href="{{ route('admin.users.index') }}" class="text-sm text-indigo-500 font-medium hover:text-indigo-400 transition-colors">View All</a>
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
                            @foreach(\App\Models\User::latest()->take(5)->get() as $user)
                            <tr class="group hover:bg-indigo-50/50 dark:hover:bg-white/5 transition-colors border-b border-gray-100 dark:border-white/5">
                                <td class="py-4 px-4">
                                    <div class="flex items-center gap-3">
                                        <div class="w-9 h-9 rounded-full bg-gradient-to-tr from-indigo-500 to-purple-500 flex items-center justify-center text-white font-bold text-xs shadow-md shadow-indigo-500/20">
                                            {{ strtoupper(substr($user->name, 0, 1)) }}
                                        </div>
                                        <div>
                                            <div class="font-semibold text-slate-800 dark:text-white group-hover:text-indigo-600 dark:group-hover:text-indigo-400 transition-colors">{{ $user->name }}</div>
                                            <div class="text-xs text-slate-500 dark:text-slate-400">{{ $user->email }}</div>
                                        </div>
                                    </div>
                                </td>
                                <td class="py-4 px-4">
                                    @if($user->roles->count() > 0)
                                        @foreach($user->roles as $role)
                                        <span class="px-2.5 py-1 rounded-md text-xs font-medium bg-indigo-100 dark:bg-indigo-500/20 text-indigo-700 dark:text-indigo-300 border border-indigo-200 dark:border-indigo-500/30">{{ $role->name }}</span>
                                        @endforeach
                                    @else
                                        <span class="text-slate-400 text-xs italic">No Role</span>
                                    @endif
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
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>

            <!-- Create Role Form (Mini) -->
            <div class="bg-white/80 dark:bg-slate-800/60 glass rounded-3xl p-6 shadow-sm border border-white/20 dark:border-white/5 flex flex-col h-full">
                <div class="mb-6 pb-4 border-b border-gray-200 dark:border-white/5">
                    <h3 class="text-xl font-bold text-slate-800 dark:text-white">Quick Add Role</h3>
                </div>

                <form method="POST" action="{{ route('admin.roles.store') }}" class="flex flex-col gap-5 h-full">
                    @csrf
                    <div class="group">
                        <label class="block text-xs font-bold uppercase tracking-wider text-slate-500 dark:text-slate-400 mb-2">Role Name</label>
                        <div class="relative">
                            <input type="text" name="name" placeholder="e.g. Manager" class="w-full pl-10 pr-4 py-3 rounded-xl bg-gray-50 dark:bg-slate-900/50 border border-gray-200 dark:border-white/10 focus:border-indigo-500 focus:bg-white dark:focus:bg-slate-900 focus:ring-4 focus:ring-indigo-500/10 outline-none transition-all placeholder:text-slate-400 dark:placeholder:text-slate-600 text-slate-800 dark:text-slate-200" required>
                            <i data-lucide="shield" class="w-5 h-5 absolute left-3 top-3.5 text-slate-400 group-focus-within:text-indigo-500 transition-colors"></i>
                        </div>
                    </div>

                    <div>
                        <label class="block text-xs font-bold uppercase tracking-wider text-slate-500 dark:text-slate-400 mb-3">Quick Permissions</label>
                        <div class="grid grid-cols-2 gap-3">
                            <label class="flex items-center gap-3 p-3 rounded-xl border border-gray-200 dark:border-white/10 cursor-pointer hover:bg-gray-50 dark:hover:bg-white/5 transition-all">
                                <input type="checkbox" name="permissions[]" value="view-dashboard" class="w-4 h-4 rounded text-indigo-600 focus:ring-indigo-500 border-gray-300 dark:border-slate-600 bg-gray-100 dark:bg-slate-700">
                                <span class="text-sm font-medium dark:text-slate-300">View</span>
                            </label>
                            <label class="flex items-center gap-3 p-3 rounded-xl border border-indigo-200 dark:border-indigo-500/30 bg-indigo-50 dark:bg-indigo-500/10 cursor-pointer transition-all">
                                <input type="checkbox" name="permissions[]" class="w-4 h-4 rounded text-indigo-600 focus:ring-indigo-500 border-indigo-300 dark:border-indigo-500/50 bg-indigo-100 dark:bg-slate-700">
                                <span class="text-sm font-medium text-indigo-700 dark:text-indigo-300">Write</span>
                            </label>
                        </div>
                    </div>

                    <button type="submit" class="mt-auto w-full py-3 px-4 rounded-xl bg-gradient-to-r from-indigo-600 to-violet-600 text-white font-bold shadow-lg shadow-indigo-600/30 hover:shadow-indigo-600/50 hover:scale-[1.02] transition-all flex items-center justify-center gap-2">
                        <i data-lucide="check" class="w-5 h-5"></i> Save Role
                    </button>
                </form>
            </div>
        </div>
    </div>
@endsection
