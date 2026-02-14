<x-guest-layout>
    <div class="min-h-screen flex items-center justify-center px-6 py-10">
        <div class="w-full max-w-2xl bg-white rounded-2xl shadow-2xl border border-slate-100 p-8 sm:p-10">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-sm text-slate-500">Επαναφορά</p>
                    <h2 class="text-2xl font-semibold text-slate-900 mt-1">Ξέχασες τον κωδικό;</h2>
                </div>
                <a href="/" class="text-slate-400 hover:text-slate-700 transition">
                    <x-application-logo class="w-10 h-10 fill-current" />
                </a>
            </div>

            <p class="text-sm text-slate-600 mt-4">
                Συμπλήρωσε το email σου και θα σου σταλεί σύνδεσμος επαναφοράς.
            </p>

            <x-auth-session-status class="mt-6" :status="session('status')" />
            <x-auth-validation-errors class="mt-4" :errors="$errors" />

            <form method="POST" action="{{ route('password.email') }}" class="mt-6 space-y-4">
                @csrf

                <div>
                    <x-label for="email" :value="__('Email')" class="text-slate-700" />
                    <x-input id="email" class="block mt-1 w-full border-slate-200 focus:border-slate-700 focus:ring-slate-700"
                             type="email" name="email" :value="old('email')" required autofocus />
                </div>

                <div class="pt-2">
                    <x-button class="w-full justify-center bg-slate-900 hover:bg-slate-800 focus:ring-slate-700">
                        {{ __('Email Password Reset Link') }}
                    </x-button>
                </div>
            </form>
        </div>
    </div>
</x-guest-layout>
