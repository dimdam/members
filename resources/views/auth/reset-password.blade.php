<x-guest-layout>
    <div class="min-h-screen flex items-center justify-center px-6 py-10">
        <div class="w-full max-w-2xl bg-white rounded-2xl shadow-2xl border border-slate-100 p-8 sm:p-10">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-sm text-slate-500">Αλλαγή κωδικού</p>
                    <h2 class="text-2xl font-semibold text-slate-900 mt-1">Ορισμός νέου κωδικού</h2>
                </div>
                <a href="/" class="text-slate-400 hover:text-slate-700 transition">
                    <x-application-logo class="w-10 h-10 fill-current" />
                </a>
            </div>

            <x-auth-validation-errors class="mt-6" :errors="$errors" />

            <form method="POST" action="{{ route('password.update') }}" class="mt-6 space-y-4">
                @csrf

                <input type="hidden" name="token" value="{{ $request->route('token') }}">

                <div>
                    <x-label for="email" :value="__('Email')" class="text-slate-700" />
                    <x-input id="email" class="block mt-1 w-full border-slate-200 focus:border-slate-700 focus:ring-slate-700"
                             type="email" name="email" :value="old('email', $request->email)" required autofocus />
                </div>

                <div>
                    <x-label for="password" :value="__('Password')" class="text-slate-700" />
                    <x-input id="password" class="block mt-1 w-full border-slate-200 focus:border-slate-700 focus:ring-slate-700"
                             type="password" name="password" required />
                </div>

                <div>
                    <x-label for="password_confirmation" :value="__('Confirm Password')" class="text-slate-700" />
                    <x-input id="password_confirmation" class="block mt-1 w-full border-slate-200 focus:border-slate-700 focus:ring-slate-700"
                             type="password" name="password_confirmation" required />
                </div>

                <div class="pt-2">
                    <x-button class="w-full justify-center bg-slate-900 hover:bg-slate-800 focus:ring-slate-700">
                        {{ __('Reset Password') }}
                    </x-button>
                </div>
            </form>
        </div>
    </div>
</x-guest-layout>
