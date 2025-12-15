@extends('ultimate::layouts.admin')

@section('title', 'User Management')

@section('content')
<div class="space-y-6 animate-slide-up">
    <!-- Toolbar -->
    <div class="flex flex-col md:flex-row justify-between gap-4 bg-white/80 dark:bg-slate-800/60 glass rounded-3xl p-6 shadow-sm border border-white/20 dark:border-white/5">
        <form action="{{ route('admin.users.index') }}" method="GET" class="flex gap-4 flex-1">
             <div class="relative w-full max-w-md">
                <input type="text" name="search" value="{{ request('search') }}" placeholder="Search users by name, email..." class="w-full pl-10 pr-4 py-3 rounded-xl bg-gray-50 dark:bg-slate-900/50 border border-gray-200 dark:border-white/10 focus:border-indigo-500 focus:bg-white dark:focus:bg-slate-900 focus:ring-4 focus:ring-indigo-500/10 outline-none transition-all placeholder:text-slate-400 dark:placeholder:text-slate-600 text-slate-800 dark:text-slate-200">
                <i data-lucide="search" class="w-5 h-5 absolute left-3 top-3.5 text-slate-400"></i>
            </div>
            <button type="submit" class="p-3 rounded-xl bg-gray-50 dark:bg-slate-900/50 border border-gray-200 dark:border-white/10 hover:bg-gray-100 dark:hover:bg-slate-700 text-slate-600 dark:text-slate-300 transition-colors flex items-center gap-2">
                <i data-lucide="filter" class="w-5 h-5"></i>
                <span class="hidden sm:inline">Search</span>
            </button>
        </form>

        <a href="{{ route('admin.users.create') }}" class="px-6 py-3 rounded-xl bg-indigo-600 text-white font-bold shadow-lg shadow-indigo-600/30 hover:bg-indigo-700 hover:shadow-indigo-600/50 hover:-translate-y-0.5 transition-all flex items-center gap-2">
            <i data-lucide="user-plus" class="w-5 h-5"></i>
            Add User
        </a>
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
                        <th class="py-4 px-4 text-xs font-bold uppercase tracking-wider text-slate-500 dark:text-slate-400">Joined</th>
                        <th class="py-4 px-4 text-xs font-bold uppercase tracking-wider text-slate-500 dark:text-slate-400 text-right">Actions</th>
                    </tr>
                </thead>
                <tbody class="text-sm">
                    @foreach($users as $user)
                    <tr class="group hover:bg-indigo-50/50 dark:hover:bg-white/5 transition-colors border-b border-gray-100 dark:border-white/5">
                        <td class="py-4 px-4">
                            <div class="flex items-center gap-4">
                                <div class="w-10 h-10 rounded-full bg-slate-200 dark:bg-slate-700 overflow-hidden border-2 border-white dark:border-slate-600 flex items-center justify-center font-bold text-slate-500 animate-pulse-glow">
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
                                <span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full text-xs font-medium bg-indigo-100 dark:bg-indigo-500/20 text-indigo-700 dark:text-indigo-300 border border-indigo-200 dark:border-indigo-500/30">
                                    <div class="w-1.5 h-1.5 rounded-full bg-indigo-500"></div> {{ $role->name }}
                                </span>
                                @endforeach
                            @else
                                <span class="text-slate-400 text-xs">No Role</span>
                            @endif
                        </td>
                        <td class="py-4 px-4">
                            <span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full text-xs font-medium bg-emerald-100 dark:bg-emerald-500/20 text-emerald-700 dark:text-emerald-300 border border-emerald-200 dark:border-emerald-500/30">
                                Active
                            </span>
                        </td>
                        <td class="py-4 px-4 text-slate-500 dark:text-slate-400">
                            {{ $user->created_at->diffForHumans() }}
                        </td>
                        <td class="py-4 px-4 text-right">
                            <div class="flex items-center justify-end gap-2 opacity-0 group-hover:opacity-100 transition-opacity">
                                <a href="{{ route('admin.users.edit', $user) }}" class="p-2 rounded-lg hover:bg-indigo-50 dark:hover:bg-indigo-500/20 text-slate-400 hover:text-indigo-600 transition-colors" title="Edit">
                                    <i data-lucide="edit-3" class="w-4 h-4"></i>
                                </a>
                                <form action="{{ route('admin.users.destroy', $user) }}" method="POST" onsubmit="return confirm('Are you sure?');" class="inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="p-2 rounded-lg hover:bg-red-50 dark:hover:bg-red-500/20 text-slate-400 hover:text-red-600 transition-colors" title="Delete">
                                        <i data-lucide="trash-2" class="w-4 h-4"></i>
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <!-- Pagination -->
        <div class="mt-6">
            {{ $users->links() }}
        </div>
    </div>
</div>
@endsection
