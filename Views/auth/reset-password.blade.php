@component('ultimate::layouts.guest')
    <form method="POST" action="{{ route('admin.password.store') }}">
        @csrf

        <!-- Password Reset Token -->
        <input type="hidden" name="token" value="{{ $request->route('token') }}">

        <!-- Email Address -->
        <div>
            <label for="email" class="block font-medium text-sm text-gray-200">Email</label>
            <input id="email" class="block mt-1 w-full rounded-lg border-white/10 bg-white/5 text-white placeholder-gray-400 focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm p-2.5" type="email" name="email" :value="old('email', $request->email)" required autofocus autocomplete="username" />
            @error('email')
                <p class="mt-2 text-sm text-red-400">{{ $message }}</p>
            @enderror
        </div>

        <!-- Password -->
        <div class="mt-4">
            <label for="password" class="block font-medium text-sm text-gray-200">Password</label>
            <input id="password" class="block mt-1 w-full rounded-lg border-white/10 bg-white/5 text-white placeholder-gray-400 focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm p-2.5" type="password" name="password" required autocomplete="new-password" />
            @error('password')
                <p class="mt-2 text-sm text-red-400">{{ $message }}</p>
            @enderror
        </div>

        <!-- Confirm Password -->
        <div class="mt-4">
            <label for="password_confirmation" class="block font-medium text-sm text-gray-200">Confirm Password</label>
            <input id="password_confirmation" class="block mt-1 w-full rounded-lg border-white/10 bg-white/5 text-white placeholder-gray-400 focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm p-2.5" type="password" name="password_confirmation" required autocomplete="new-password" />
            @error('password_confirmation')
                <p class="mt-2 text-sm text-red-400">{{ $message }}</p>
            @enderror
        </div>

        <div class="flex items-center justify-end mt-4">
            <button type="submit" class="inline-flex items-center px-4 py-2 bg-indigo-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-indigo-500 focus:bg-indigo-700 active:bg-indigo-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150">
                Reset Password
            </button>
        </div>
    </form>
@endcomponent
