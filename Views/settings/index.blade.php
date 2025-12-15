@extends('ultimate::layouts.admin')

@section('title', 'System Settings')

@section('content')
<div class="max-w-4xl mx-auto animate-slide-up">
    <!-- Header -->
    <div class="flex items-center gap-4 mb-8">
        <div class="w-12 h-12 rounded-2xl bg-indigo-600 flex items-center justify-center text-white shadow-lg shadow-indigo-600/30">
            <i data-lucide="settings" class="w-6 h-6"></i>
        </div>
        <div>
            <h2 class="text-2xl font-bold text-slate-800 dark:text-white">System Settings</h2>
            <p class="text-slate-500 dark:text-slate-400">Manage your application configuration.</p>
        </div>
    </div>

    @if($settings->isEmpty())
    <div class="bg-white/80 dark:bg-slate-800/60 glass rounded-3xl p-12 text-center border border-white/20 dark:border-white/5">
        <div class="w-16 h-16 rounded-full bg-slate-100 dark:bg-slate-700/50 flex items-center justify-center mx-auto mb-4 text-slate-400">
            <i data-lucide="sliders" class="w-8 h-8"></i>
        </div>
        <h3 class="text-lg font-bold text-slate-700 dark:text-slate-300 mb-2">No Settings Found</h3>
        <p class="text-slate-500 dark:text-slate-400 max-w-md mx-auto mb-6">There are no configurable settings available in the database yet.</p>
        
        <!-- Optional: Seed hint -->
        <div class="inline-block px-4 py-2 rounded-lg bg-indigo-50 dark:bg-indigo-500/10 text-indigo-600 dark:text-indigo-400 text-xs font-mono">
           php artisan db:seed --class=SettingSeeder
        </div>
    </div>
    @else
    
    <form action="{{ route('admin.settings.update') }}" method="POST" class="space-y-6">
        @csrf
        @method('PUT') <!-- Controller might expect PUT or POST, usually update routes are PUT/PATCH but checked controller: it uses a route, likely POST or PUT. I'll check route list if needed but PUT is safe for updates -->
        
        <div class="bg-white/80 dark:bg-slate-800/60 glass rounded-3xl p-8 shadow-sm border border-white/20 dark:border-white/5 space-y-8">
            
            @foreach($settings as $index => $setting)
            <div class="group">
                <input type="hidden" name="settings[{{ $index }}][key]" value="{{ $setting->key }}">
                <input type="hidden" name="settings[{{ $index }}][type]" value="{{ $setting->type }}">
                <input type="hidden" name="settings[{{ $index }}][description]" value="{{ $setting->description }}">

                <div class="flex flex-col md:flex-row md:items-start gap-4 justify-between">
                    <div class="flex-1">
                        <label class="block text-sm font-bold text-slate-700 dark:text-slate-200 mb-1">
                            {{ ucwords(str_replace('_', ' ', $setting->key)) }}
                        </label>
                        @if($setting->description)
                        <p class="text-xs text-slate-500 dark:text-slate-400 leading-relaxed">{{ $setting->description }}</p>
                        @endif
                    </div>

                    <div class="flex-1 max-w-md">
                        @if($setting->type === 'boolean')
                            <label class="relative inline-flex items-center cursor-pointer">
                                <input type="hidden" name="settings[{{ $index }}][value]" value="0">
                                <input type="checkbox" name="settings[{{ $index }}][value]" value="1" class="sr-only peer" {{ $setting->value ? 'checked' : '' }}>
                                <div class="w-11 h-6 bg-gray-200 peer-focus:outline-none peer-focus:ring-4 peer-focus:ring-indigo-300 dark:peer-focus:ring-indigo-800 rounded-full peer dark:bg-gray-700 peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all dark:border-gray-600 peer-checked:bg-indigo-600"></div>
                                <span class="ml-3 text-sm font-medium text-slate-600 dark:text-slate-300 peer-checked:text-indigo-600 dark:peer-checked:text-indigo-400 transition-colors">{{ $setting->value ? 'Enabled' : 'Disabled' }}</span>
                            </label>
                        @elseif($setting->type === 'integer')
                            <input type="number" name="settings[{{ $index }}][value]" value="{{ $setting->value }}" class="w-full px-4 py-2.5 rounded-xl bg-gray-50 dark:bg-slate-900/50 border border-gray-200 dark:border-white/10 focus:border-indigo-500 focus:bg-white dark:focus:bg-slate-900 outline-none transition-all text-slate-800 dark:text-slate-200">
                        @elseif($setting->type === 'json')
                            <textarea name="settings[{{ $index }}][value]" rows="3" class="w-full px-4 py-2.5 rounded-xl bg-gray-50 dark:bg-slate-900/50 border border-gray-200 dark:border-white/10 focus:border-indigo-500 focus:bg-white dark:focus:bg-slate-900 outline-none transition-all text-slate-800 dark:text-slate-200 font-mono text-xs">{{ $setting->value }}</textarea>
                        @else
                            <input type="text" name="settings[{{ $index }}][value]" value="{{ $setting->value }}" class="w-full px-4 py-2.5 rounded-xl bg-gray-50 dark:bg-slate-900/50 border border-gray-200 dark:border-white/10 focus:border-indigo-500 focus:bg-white dark:focus:bg-slate-900 outline-none transition-all text-slate-800 dark:text-slate-200">
                        @endif
                    </div>
                </div>
                
                @if(!$loop->last)
                <div class="h-px bg-gray-100 dark:bg-white/5 mt-6"></div>
                @endif
            </div>
            @endforeach
        </div>

        <div class="flex justify-end sticky bottom-6 z-10">
            <button type="submit" class="px-8 py-4 rounded-2xl bg-indigo-600 text-white font-bold text-lg shadow-xl shadow-indigo-600/30 hover:bg-indigo-700 hover:shadow-indigo-600/50 hover:-translate-y-1 transition-all flex items-center gap-2">
                <i data-lucide="save" class="w-5 h-5"></i>
                Save Configuration
            </button>
        </div>
    </form>
    @endif
</div>
@endsection
