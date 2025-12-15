@extends('ultimate::layouts.admin')

@section('title', 'Create User')

@section('content')
<div class="max-w-4xl mx-auto animate-slide-up">
    <div class="bg-white/80 dark:bg-slate-800/60 glass rounded-3xl p-8 shadow-sm border border-white/20 dark:border-white/5">
        <div class="flex items-center gap-4 mb-8 border-b border-gray-200 dark:border-white/5 pb-6">
            <div class="w-12 h-12 rounded-2xl bg-indigo-50 dark:bg-indigo-500/10 flex items-center justify-center text-indigo-600 dark:text-indigo-400 border border-indigo-100 dark:border-indigo-500/20 shadow-inner">
                <i data-lucide="user-plus" class="w-6 h-6"></i>
            </div>
            <div>
                <h2 class="text-2xl font-bold text-slate-800 dark:text-white">Create New User</h2>
                <p class="text-slate-500 dark:text-slate-400">Add a new user to the system.</p>
            </div>
        </div>

        <form action="{{ route('admin.users.store') }}" method="POST" class="space-y-6">
            @csrf

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <!-- Name -->
                <div class="group">
                    <label class="block text-xs font-bold uppercase tracking-wider text-slate-500 dark:text-slate-400 mb-2">Full Name</label>
                    <div class="relative">
                        <input type="text" name="name" value="{{ old('name') }}" class="w-full pl-10 pr-4 py-3 rounded-xl bg-gray-50 dark:bg-slate-900/50 border border-gray-200 dark:border-white/10 focus:border-indigo-500 focus:bg-white dark:focus:bg-slate-900 focus:ring-4 focus:ring-indigo-500/10 outline-none transition-all placeholder:text-slate-400 dark:placeholder:text-slate-600 text-slate-800 dark:text-slate-200" required>
                        <i data-lucide="user" class="w-5 h-5 absolute left-3 top-3.5 text-slate-400 group-focus-within:text-indigo-500 transition-colors"></i>
                    </div>
                    @error('name') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                </div>

                <!-- Email -->
                <div class="group">
                    <label class="block text-xs font-bold uppercase tracking-wider text-slate-500 dark:text-slate-400 mb-2">Email Address</label>
                    <div class="relative">
                        <input type="email" name="email" value="{{ old('email') }}" class="w-full pl-10 pr-4 py-3 rounded-xl bg-gray-50 dark:bg-slate-900/50 border border-gray-200 dark:border-white/10 focus:border-indigo-500 focus:bg-white dark:focus:bg-slate-900 focus:ring-4 focus:ring-indigo-500/10 outline-none transition-all placeholder:text-slate-400 dark:placeholder:text-slate-600 text-slate-800 dark:text-slate-200" required>
                        <i data-lucide="mail" class="w-5 h-5 absolute left-3 top-3.5 text-slate-400 group-focus-within:text-indigo-500 transition-colors"></i>
                    </div>
                    @error('email') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                </div>

                <!-- Password -->
                <div class="group">
                    <label class="block text-xs font-bold uppercase tracking-wider text-slate-500 dark:text-slate-400 mb-2">Password</label>
                    <div class="relative">
                        <input type="password" name="password" class="w-full pl-10 pr-4 py-3 rounded-xl bg-gray-50 dark:bg-slate-900/50 border border-gray-200 dark:border-white/10 focus:border-indigo-500 focus:bg-white dark:focus:bg-slate-900 focus:ring-4 focus:ring-indigo-500/10 outline-none transition-all placeholder:text-slate-400 dark:placeholder:text-slate-600 text-slate-800 dark:text-slate-200" required>
                        <i data-lucide="lock" class="w-5 h-5 absolute left-3 top-3.5 text-slate-400 group-focus-within:text-indigo-500 transition-colors"></i>
                    </div>
                    @error('password') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                </div>

                <!-- Confirm Password -->
                <div class="group">
                    <label class="block text-xs font-bold uppercase tracking-wider text-slate-500 dark:text-slate-400 mb-2">Confirm Password</label>
                    <div class="relative">
                        <input type="password" name="password_confirmation" class="w-full pl-10 pr-4 py-3 rounded-xl bg-gray-50 dark:bg-slate-900/50 border border-gray-200 dark:border-white/10 focus:border-indigo-500 focus:bg-white dark:focus:bg-slate-900 focus:ring-4 focus:ring-indigo-500/10 outline-none transition-all placeholder:text-slate-400 dark:placeholder:text-slate-600 text-slate-800 dark:text-slate-200" required>
                        <i data-lucide="lock-check" class="w-5 h-5 absolute left-3 top-3.5 text-slate-400 group-focus-within:text-indigo-500 transition-colors"></i>
                    </div>
                </div>
            </div>

            <!-- Roles Selection -->
            <div class="pt-4">
                <label class="block text-xs font-bold uppercase tracking-wider text-slate-500 dark:text-slate-400 mb-3">Assign Role</label>
                <div class="grid grid-cols-1 md:grid-cols-3 gap-3">
                    @foreach($roles as $role)
                    <label class="flex items-center gap-3 p-3 rounded-xl border border-gray-200 dark:border-white/10 cursor-pointer hover:bg-gray-50 dark:hover:bg-white/5 transition-all group">
                        <input type="checkbox" name="roles[]" value="{{ $role->name }}" class="w-4 h-4 rounded text-indigo-600 focus:ring-indigo-500 border-gray-300 dark:border-slate-600 bg-gray-100 dark:bg-slate-700">
                        <span class="text-sm font-medium text-slate-700 dark:text-slate-300 group-hover:text-slate-900 dark:group-hover:text-white transition-colors">{{ $role->name }}</span>
                    </label>
                    @endforeach
                </div>
                 @error('roles') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
            </div>

            <!-- Actions -->
            <div class="flex items-center justify-end gap-3 pt-6 border-t border-gray-200 dark:border-white/5 mt-4">
                <a href="{{ route('admin.users.index') }}" class="px-6 py-3 rounded-xl border border-gray-200 dark:border-white/10 text-slate-600 dark:text-slate-300 font-medium hover:bg-gray-50 dark:hover:bg-white/5 transition-all">Cancel</a>
                <button type="submit" class="px-6 py-3 rounded-xl bg-indigo-600 text-white font-bold shadow-lg shadow-indigo-600/30 hover:bg-indigo-700 hover:shadow-indigo-600/50 hover:-translate-y-0.5 transition-all flex items-center gap-2">
                    <i data-lucide="check" class="w-5 h-5"></i>
                    Create User
                </button>
            </div>
        </form>
    </div>
</div>
@endsection
