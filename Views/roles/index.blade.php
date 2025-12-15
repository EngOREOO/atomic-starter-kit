@extends('ultimate::layouts.admin')

@section('title', 'Roles')

@section('content')
<div class="space-y-6 animate-slide-up">
    <!-- Toolbar -->
    <div class="flex flex-col md:flex-row justify-between gap-4 bg-white/80 dark:bg-slate-800/60 glass rounded-3xl p-6 shadow-sm border border-white/20 dark:border-white/5">
        <form action="{{ route('admin.roles.index') }}" method="GET" class="flex gap-4 flex-1">
             <div class="relative w-full max-w-md">
                <input type="text" name="search" value="{{ request('search') }}" placeholder="Search roles..." class="w-full pl-10 pr-4 py-3 rounded-xl bg-gray-50 dark:bg-slate-900/50 border border-gray-200 dark:border-white/10 focus:border-indigo-500 focus:bg-white dark:focus:bg-slate-900 focus:ring-4 focus:ring-indigo-500/10 outline-none transition-all placeholder:text-slate-400 dark:placeholder:text-slate-600 text-slate-800 dark:text-slate-200">
                <i data-lucide="search" class="w-5 h-5 absolute left-3 top-3.5 text-slate-400"></i>
            </div>
        </form>

        <a href="{{ route('admin.roles.create') }}" class="px-6 py-3 rounded-xl bg-indigo-600 text-white font-bold shadow-lg shadow-indigo-600/30 hover:bg-indigo-700 hover:shadow-indigo-600/50 hover:-translate-y-0.5 transition-all flex items-center gap-2">
            <i data-lucide="shield-plus" class="w-5 h-5"></i>
            Add Role
        </a>
    </div>

    <!-- Roles Table Card -->
    <div class="bg-white/80 dark:bg-slate-800/60 glass rounded-3xl p-6 shadow-sm border border-white/20 dark:border-white/5">
        <div class="overflow-x-auto">
            <table class="w-full text-left border-collapse">
                <thead>
                    <tr class="border-b border-gray-200 dark:border-white/5">
                        <th class="py-4 px-4 text-xs font-bold uppercase tracking-wider text-slate-500 dark:text-slate-400">Role Name</th>
                        <th class="py-4 px-4 text-xs font-bold uppercase tracking-wider text-slate-500 dark:text-slate-400">Permissions</th>
                        <th class="py-4 px-4 text-xs font-bold uppercase tracking-wider text-slate-500 dark:text-slate-400 text-right">Actions</th>
                    </tr>
                </thead>
                <tbody class="text-sm">
                    @foreach($roles as $role)
                    <tr class="group hover:bg-indigo-50/50 dark:hover:bg-white/5 transition-colors border-b border-gray-100 dark:border-white/5">
                        <td class="py-4 px-4">
                            <div class="flex items-center gap-3">
                                <div class="w-10 h-10 rounded-xl bg-indigo-50 dark:bg-indigo-500/10 flex items-center justify-center text-indigo-600 dark:text-indigo-400 border border-indigo-100 dark:border-indigo-500/20">
                                    <i data-lucide="shield" class="w-5 h-5"></i>
                                </div>
                                <span class="font-semibold text-slate-800 dark:text-white">{{ $role->name }}</span>
                            </div>
                        </td>
                        <td class="py-4 px-4">
                            <div class="flex flex-wrap gap-1">
                                @forelse($role->permissions->take(5) as $permission)
                                    <span class="px-2 py-0.5 rounded text-xs font-medium bg-slate-100 dark:bg-slate-700 text-slate-600 dark:text-slate-300 border border-slate-200 dark:border-slate-600">
                                        {{ $permission->name }}
                                    </span>
                                @empty
                                    <span class="text-slate-400 italic text-xs">No permissions</span>
                                @endforelse
                                @if($role->permissions->count() > 5)
                                    <span class="px-2 py-0.5 rounded text-xs font-medium bg-gray-100 dark:bg-white/5 text-gray-500 border border-gray-200 dark:border-white/10">
                                        +{{ $role->permissions->count() - 5 }} more
                                    </span>
                                @endif
                            </div>
                        </td>
                        <td class="py-4 px-4 text-right">
                            <div class="flex items-center justify-end gap-2 opacity-0 group-hover:opacity-100 transition-opacity">
                                <a href="{{ route('admin.roles.edit', $role->id) }}" class="p-2 rounded-lg hover:bg-indigo-50 dark:hover:bg-indigo-500/20 text-slate-400 hover:text-indigo-600 transition-colors" title="Edit">
                                    <i data-lucide="edit-3" class="w-4 h-4"></i>
                                </a>
                                <form action="{{ route('admin.roles.destroy', $role->id) }}" method="POST" onsubmit="return confirm('Are you sure?');" class="inline">
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
            {{ $roles->links() }}
        </div>
    </div>
</div>
@endsection
