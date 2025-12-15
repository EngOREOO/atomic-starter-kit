@component('ultimate::layouts.guest')
    <form method="POST" action="{{ route('admin.register') }}">
        @csrf

        <!-- Name -->
        <div>
            <label for="name" class="block font-medium text-sm text-gray-200">Name</label>
            <input id="name" class="block mt-1 w-full rounded-lg border-white/10 bg-white/5 text-white placeholder-gray-400 focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm p-2.5" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
            @error('name')
                <p class="mt-2 text-sm text-red-400">{{ $message }}</p>
            @enderror
        </div>

        <!-- Email Address -->
        <div class="mt-4">
            <label for="email" class="block font-medium text-sm text-gray-200">Email</label>
            <input id="email" class="block mt-1 w-full rounded-lg border-white/10 bg-white/5 text-white placeholder-gray-400 focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm p-2.5" type="email" name="email" :value="old('email')" required autocomplete="username" />
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
            <a class="underline text-sm text-gray-300 hover:text-white rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('admin.login') }}">
                Already registered?
            </a>

            <button type="submit" class="ms-4 inline-flex items-center px-4 py-2 bg-indigo-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-indigo-500 focus:bg-indigo-700 active:bg-indigo-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150">
                Register
            </button>
        </div>
    </form>
@endcomponent
