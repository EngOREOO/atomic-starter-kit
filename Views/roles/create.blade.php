@extends('ultimate::layouts.admin')

@section('title', 'Create Role')

@section('content')
<div class="max-w-4xl mx-auto animate-slide-up">
    <div class="bg-white/80 dark:bg-slate-800/60 glass rounded-3xl p-8 shadow-sm border border-white/20 dark:border-white/5">
        <div class="flex items-center gap-4 mb-8 border-b border-gray-200 dark:border-white/5 pb-6">
            <div class="w-12 h-12 rounded-2xl bg-indigo-50 dark:bg-indigo-500/10 flex items-center justify-center text-indigo-600 dark:text-indigo-400 border border-indigo-100 dark:border-indigo-500/20 shadow-inner">
                <i data-lucide="shield-plus" class="w-6 h-6"></i>
            </div>
            <div>
                <h2 class="text-2xl font-bold text-slate-800 dark:text-white">Create New Role</h2>
                <p class="text-slate-500 dark:text-slate-400">Define a new role and assign its permissions.</p>
            </div>
        </div>

        <form action="{{ route('admin.roles.store') }}" method="POST" class="space-y-8">
            @csrf

            <!-- Role Name -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div class="group">
                    <label class="block text-xs font-bold uppercase tracking-wider text-slate-500 dark:text-slate-400 mb-2">Role Name</label>
                    <div class="relative">
                        <input type="text" name="name" value="{{ old('name') }}" placeholder="e.g. Content Editor" class="w-full pl-10 pr-4 py-3 rounded-xl bg-gray-50 dark:bg-slate-900/50 border border-gray-200 dark:border-white/10 focus:border-indigo-500 focus:bg-white dark:focus:bg-slate-900 focus:ring-4 focus:ring-indigo-500/10 outline-none transition-all placeholder:text-slate-400 dark:placeholder:text-slate-600 text-slate-800 dark:text-slate-200" required autofocus>
                        <i data-lucide="tag" class="w-5 h-5 absolute left-3 top-3.5 text-slate-400 group-focus-within:text-indigo-500 transition-colors"></i>
                    </div>
                    @error('name') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                </div>
                
                 <div class="group">
                    <label class="block text-xs font-bold uppercase tracking-wider text-slate-500 dark:text-slate-400 mb-2">Slug (Optional)</label>
                    <div class="relative">
                        <input type="text" name="slug" value="{{ old('slug') }}" placeholder="e.g. content-editor" class="w-full pl-10 pr-4 py-3 rounded-xl bg-gray-50 dark:bg-slate-900/50 border border-gray-200 dark:border-white/10 focus:border-indigo-500 focus:bg-white dark:focus:bg-slate-900 focus:ring-4 focus:ring-indigo-500/10 outline-none transition-all placeholder:text-slate-400 dark:placeholder:text-slate-600 text-slate-800 dark:text-slate-200">
                        <i data-lucide="code" class="w-5 h-5 absolute left-3 top-3.5 text-slate-400 group-focus-within:text-indigo-500 transition-colors"></i>
                    </div>
                    @error('slug') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                </div>
            </div>

            <div class="group">
                <label class="block text-xs font-bold uppercase tracking-wider text-slate-500 dark:text-slate-400 mb-2">Description</label>
                <textarea name="description" rows="2" class="w-full px-4 py-3 rounded-xl bg-gray-50 dark:bg-slate-900/50 border border-gray-200 dark:border-white/10 focus:border-indigo-500 focus:bg-white dark:focus:bg-slate-900 outline-none transition-all text-slate-800 dark:text-slate-200" placeholder="Brief description of this role..."></textarea>
            </div>

            <!-- Permissions Selection -->
            <div>
                <div class="flex items-center justify-between mb-6 sticky top-0 bg-white/95 dark:bg-slate-800/95 backdrop-blur z-10 py-4 border-b border-gray-100 dark:border-white/5">
                    <label class="block text-xs font-bold uppercase tracking-wider text-slate-500 dark:text-slate-400">Assign Permissions</label>
                    
                    <label class="flex items-center gap-2 cursor-pointer text-sm text-indigo-600 dark:text-indigo-400 font-medium hover:text-indigo-700 dark:hover:text-indigo-300 transition-colors bg-indigo-50 dark:bg-indigo-500/10 px-3 py-1.5 rounded-lg border border-indigo-100 dark:border-indigo-500/20">
                        <input type="checkbox" id="select-all" class="w-4 h-4 rounded text-indigo-600 focus:ring-indigo-500 border-gray-300 dark:border-slate-600 bg-white dark:bg-slate-700">
                        Select All Permissions
                    </label>
                </div>

                <div class="space-y-8">
                    @foreach($permissions as $module => $modulePermissions)
                    <div class="animate-fade-in-up" style="animation-delay: {{ $loop->index * 50 }}ms">
                        <div class="flex items-center gap-3 mb-4">
                            <div class="h-px flex-1 bg-gray-200 dark:bg-white/10"></div>
                            <h3 class="text-sm font-bold uppercase tracking-widest text-slate-400 dark:text-slate-500">{{ ucfirst($module) }}</h3>
                            <div class="h-px flex-1 bg-gray-200 dark:bg-white/10"></div>
                        </div>
                        
                        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-3">
                            @foreach($modulePermissions as $permission)
                            <label class="flex items-center gap-3 p-3 rounded-xl border border-gray-200 dark:border-white/10 cursor-pointer hover:bg-gray-50 dark:hover:bg-white/5 transition-all group hover:border-indigo-200 dark:hover:border-indigo-500/30 hover:shadow-sm">
                                <input type="checkbox" name="permissions[]" value="{{ $permission->id }}" class="permission-checkbox w-4 h-4 rounded text-indigo-600 focus:ring-indigo-500 border-gray-300 dark:border-slate-600 bg-gray-100 dark:bg-slate-700 group-hover:border-indigo-400 transition-colors">
                                <div class="flex flex-col">
                                    <span class="text-sm font-medium text-slate-700 dark:text-slate-300 group-hover:text-slate-900 dark:group-hover:text-white transition-colors">{{ $permission->feature_label }} - {{ $permission->action_label }}</span>
                                    <span class="text-[10px] text-slate-400">{{ $permission->name }}</span>
                                </div>
                            </label>
                            @endforeach
                        </div>
                    </div>
                    @endforeach
                </div>
                 @error('permissions') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
            </div>

            <!-- Actions -->
            <div class="flex items-center justify-end gap-3 pt-6 border-t border-gray-200 dark:border-white/5 sticky bottom-0 bg-white/95 dark:bg-slate-800/95 backdrop-blur py-4 z-10 -mx-8 px-8 -mb-4 rounded-b-3xl">
                <a href="{{ route('admin.roles.index') }}" class="px-6 py-3 rounded-xl border border-gray-200 dark:border-white/10 text-slate-600 dark:text-slate-300 font-medium hover:bg-gray-50 dark:hover:bg-white/5 transition-all">Cancel</a>
                <button type="submit" class="px-6 py-3 rounded-xl bg-indigo-600 text-white font-bold shadow-lg shadow-indigo-600/30 hover:bg-indigo-700 hover:shadow-indigo-600/50 hover:-translate-y-0.5 transition-all flex items-center gap-2">
                    <i data-lucide="check" class="w-5 h-5"></i>
                    Create Role
                </button>
            </div>
        </form>
    </div>
</div>

<script>
    document.getElementById('select-all').addEventListener('change', function() {
        const checkboxes = document.querySelectorAll('.permission-checkbox');
        checkboxes.forEach(cb => cb.checked = this.checked);
    });
</script>
@endsection
