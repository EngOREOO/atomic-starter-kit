@extends('ultimate::layouts.admin')

@section('title', 'Permissions')

@section('content')
<div class="space-y-6 animate-slide-up">
    <!-- Toolbar -->
    <div class="flex flex-col md:flex-row justify-between gap-4 bg-white/80 dark:bg-slate-800/60 glass rounded-3xl p-6 shadow-sm border border-white/20 dark:border-white/5">
        <div class="flex gap-4 flex-1">
             <div class="relative w-full max-w-md">
                <input type="text" placeholder="Search permissions..." class="w-full pl-10 pr-4 py-3 rounded-xl bg-gray-50 dark:bg-slate-900/50 border border-gray-200 dark:border-white/10 focus:border-indigo-500 focus:bg-white dark:focus:bg-slate-900 focus:ring-4 focus:ring-indigo-500/10 outline-none transition-all placeholder:text-slate-400 dark:placeholder:text-slate-600 text-slate-800 dark:text-slate-200">
                <i data-lucide="search" class="w-5 h-5 absolute left-3 top-3.5 text-slate-400"></i>
            </div>
            <div class="relative">
                 <select class="appearance-none w-full pl-4 pr-10 py-3 rounded-xl bg-gray-50 dark:bg-slate-900/50 border border-gray-200 dark:border-white/10 focus:border-indigo-500 focus:bg-white dark:focus:bg-slate-900 outline-none transition-all text-slate-600 dark:text-slate-300 cursor-pointer">
                    <option value="">All Modules</option>
                    @foreach($permissions->unique('module') as $p)
                        <option value="{{ $p->module }}">{{ $p->module_label }}</option>
                    @endforeach
                </select>
                <i data-lucide="chevron-down" class="w-4 h-4 absolute right-3 top-4 text-slate-400 pointer-events-none"></i>
            </div>
        </div>
    </div>

    <!-- Permissions Table Card -->
    <div class="bg-white/80 dark:bg-slate-800/60 glass rounded-3xl p-6 shadow-sm border border-white/20 dark:border-white/5">
        <div class="overflow-x-auto">
            <table class="w-full text-left border-collapse">
                <thead>
                    <tr class="border-b border-gray-200 dark:border-white/5">
                        <th class="py-4 px-4 text-xs font-bold uppercase tracking-wider text-slate-500 dark:text-slate-400">Permission Name</th>
                        <th class="py-4 px-4 text-xs font-bold uppercase tracking-wider text-slate-500 dark:text-slate-400">Module</th>
                        <th class="py-4 px-4 text-xs font-bold uppercase tracking-wider text-slate-500 dark:text-slate-400">Details</th>
                         <th class="py-4 px-4 text-xs font-bold uppercase tracking-wider text-slate-500 dark:text-slate-400 text-right">Scope</th>
                    </tr>
                </thead>
                <tbody class="text-sm">
                    @foreach($permissions as $permission)
                    <tr class="group hover:bg-indigo-50/50 dark:hover:bg-white/5 transition-colors border-b border-gray-100 dark:border-white/5">
                        <td class="py-4 px-4">
                            <div class="flex items-center gap-3">
                                <div class="w-8 h-8 rounded-lg bg-emerald-50 dark:bg-emerald-500/10 flex items-center justify-center text-emerald-600 dark:text-emerald-400 border border-emerald-100 dark:border-emerald-500/20">
                                    <i data-lucide="key" class="w-4 h-4"></i>
                                </div>
                                <div>
                                    <div class="font-medium text-slate-700 dark:text-slate-300">{{ $permission->feature_label }} - {{ $permission->action_label }}</div>
                                    <div class="text-[10px] text-slate-400 font-mono">{{ $permission->name }}</div>
                                </div>
                            </div>
                        </td>
                        <td class="py-4 px-4">
                            <span class="px-2.5 py-1 rounded-md text-xs font-medium bg-slate-100 dark:bg-slate-700 text-slate-600 dark:text-slate-300 border border-slate-200 dark:border-slate-600">
                                {{ $permission->module_label }}
                            </span>
                        </td>
                         <td class="py-4 px-4">
                            <div class="text-xs text-slate-500 dark:text-slate-400">
                                <span class="font-semibold">Feature:</span> {{ $permission->feature }} <br>
                                <span class="font-semibold">Action:</span> {{ $permission->action }}
                            </div>
                        </td>
                         <td class="py-4 px-4 text-right">
                           <span class="text-xs text-slate-400">{{ $permission->guard_name ?? 'global' }}</span>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <!-- Pagination -->
        <div class="mt-6">
            {{ $permissions->links() }}
        </div>
    </div>
</div>
@endsection
