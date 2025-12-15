@extends('ultimate::layouts.admin')

@section('title', 'Profile Settings')

@section('content')
<div class="space-y-6 animate-slide-up">
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
                    <div class="w-full h-full flex items-center justify-center bg-gradient-to-br from-indigo-500 to-purple-600 text-white">
                        {{ strtoupper(substr($user->name, 0, 1)) }}
                    </div>
                </div>
                <div class="absolute bottom-2 right-2 w-6 h-6 bg-emerald-500 rounded-full border-4 border-white dark:border-slate-800"></div>
            </div>

            <!-- Info -->
            <div class="flex-1 mb-2">
                <h2 class="text-3xl font-bold text-slate-800 dark:text-white">{{ $user->name }}</h2>
                <div class="flex flex-wrap items-center gap-4 text-slate-500 dark:text-slate-400 mt-1">
                    <div class="flex items-center gap-1.5"><i data-lucide="shield" class="w-4 h-4 text-indigo-500"></i> {{ $user->roles->pluck('name')->join(', ') ?: 'User' }}</div>
                    <div class="flex items-center gap-1.5"><i data-lucide="mail" class="w-4 h-4"></i> {{ $user->email }}</div>
                    <div class="flex items-center gap-1.5"><i data-lucide="calendar" class="w-4 h-4"></i> Joined {{ $user->created_at->format('F Y') }}</div>
                </div>
            </div>

            <!-- Actions -->
            <div class="flex gap-3 mb-2">
                <a href="{{ route('admin.dashboard') }}" class="px-5 py-2.5 rounded-xl bg-white dark:bg-slate-700 border border-gray-200 dark:border-white/10 text-slate-700 dark:text-slate-200 font-medium hover:bg-gray-50 dark:hover:bg-slate-600 transition-colors shadow-sm">
                    Back to Dashboard
                </a>
            </div>
        </div>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
        <!-- Left Column: Personal Info -->
        <div class="space-y-6">
            <div class="bg-white/80 dark:bg-slate-800/60 glass rounded-3xl p-6 shadow-sm border border-white/20 dark:border-white/5">
                <h3 class="text-lg font-bold text-slate-800 dark:text-white mb-4">About Me</h3>
                <p class="text-slate-500 dark:text-slate-400 text-sm leading-relaxed mb-6">
                    A user of the Atomic Starter Kit system.
                </p>

                <h4 class="text-xs font-bold uppercase text-slate-400 mb-3 tracking-wider">Contact</h4>
                <ul class="space-y-3">
                    <li class="flex items-center gap-3 text-sm text-slate-600 dark:text-slate-300">
                        <div class="p-2 rounded-lg bg-indigo-50 dark:bg-indigo-500/10 text-indigo-600 dark:text-indigo-400"><i data-lucide="mail" class="w-4 h-4"></i></div>
                        {{ $user->email }}
                    </li>
                </ul>
            </div>
        </div>

        <!-- Right Column: Settings Form -->
        <div class="lg:col-span-2 bg-white/80 dark:bg-slate-800/60 glass rounded-3xl p-8 shadow-sm border border-white/20 dark:border-white/5">
            <div class="flex items-center gap-2 mb-6 border-b border-gray-200 dark:border-white/5 pb-4">
                <i data-lucide="user-cog" class="w-6 h-6 text-indigo-500"></i>
                <h3 class="text-xl font-bold text-slate-800 dark:text-white">Account Settings</h3>
            </div>

            <form method="post" action="{{ route('admin.profile.update') }}" class="space-y-8">
                @csrf
                @method('patch')

                <!-- Personal Details -->
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div class="group md:col-span-2">
                        <label class="block text-xs font-bold uppercase tracking-wider text-slate-500 dark:text-slate-400 mb-2">Name</label>
                        <input type="text" name="name" value="{{ old('name', $user->name) }}" required class="w-full px-4 py-3 rounded-xl bg-gray-50 dark:bg-slate-900/50 border border-gray-200 dark:border-white/10 focus:border-indigo-500 focus:bg-white dark:focus:bg-slate-900 outline-none transition-all text-slate-800 dark:text-slate-200" autocomplete="name">
                        @error('name') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                    </div>

                    <div class="group md:col-span-2">
                        <label class="block text-xs font-bold uppercase tracking-wider text-slate-500 dark:text-slate-400 mb-2">Email Address</label>
                        <div class="relative">
                            <input type="email" name="email" value="{{ old('email', $user->email) }}" required class="w-full pl-10 pr-4 py-3 rounded-xl bg-gray-50 dark:bg-slate-900/50 border border-gray-200 dark:border-white/10 focus:border-indigo-500 focus:bg-white dark:focus:bg-slate-900 outline-none transition-all text-slate-800 dark:text-slate-200" autocomplete="username">
                            <i data-lucide="mail" class="w-5 h-5 absolute left-3 top-3.5 text-slate-400"></i>
                        </div>
                        @error('email') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                    </div>
                </div>

                <div class="flex justify-end">
                    <button type="submit" class="px-5 py-2.5 rounded-xl bg-indigo-600 text-white font-medium hover:bg-indigo-700 transition-colors shadow-lg shadow-indigo-600/20">
                        Save Changes
                    </button>
                </div>
            </form>
            
            <div class="border-t border-gray-200 dark:border-white/5 pt-6 mt-8">
                 <h4 class="text-sm font-bold text-slate-800 dark:text-white mb-4">Update Password</h4>
                 <form method="post" action="{{ route('password.update') }}" class="space-y-4">
                    @csrf
                    @method('put')
                    
                    <div>
                        <label class="block text-xs font-bold uppercase tracking-wider text-slate-500 dark:text-slate-400 mb-2">Current Password</label>
                        <input type="password" name="current_password" class="w-full px-4 py-3 rounded-xl bg-gray-50 dark:bg-slate-900/50 border border-gray-200 dark:border-white/10 focus:border-indigo-500 focus:bg-white dark:focus:bg-slate-900 outline-none transition-all text-slate-800 dark:text-slate-200">
                    </div>
                    
                    <div>
                        <label class="block text-xs font-bold uppercase tracking-wider text-slate-500 dark:text-slate-400 mb-2">New Password</label>
                        <input type="password" name="password" class="w-full px-4 py-3 rounded-xl bg-gray-50 dark:bg-slate-900/50 border border-gray-200 dark:border-white/10 focus:border-indigo-500 focus:bg-white dark:focus:bg-slate-900 outline-none transition-all text-slate-800 dark:text-slate-200">
                    </div>
                    
                    <div>
                        <label class="block text-xs font-bold uppercase tracking-wider text-slate-500 dark:text-slate-400 mb-2">Confirm Password</label>
                        <input type="password" name="password_confirmation" class="w-full px-4 py-3 rounded-xl bg-gray-50 dark:bg-slate-900/50 border border-gray-200 dark:border-white/10 focus:border-indigo-500 focus:bg-white dark:focus:bg-slate-900 outline-none transition-all text-slate-800 dark:text-slate-200">
                    </div>

                    <div class="flex justify-end">
                        <button type="submit" class="px-5 py-2.5 rounded-xl bg-slate-800 dark:bg-slate-700 text-white font-medium hover:bg-slate-900 dark:hover:bg-slate-600 transition-colors">
                            Update Password
                        </button>
                    </div>
                 </form>
            </div>
        </div>
    </div>
</div>
@endsection
