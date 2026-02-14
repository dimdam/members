<x-guest-layout>
    <div class="min-h-screen flex items-center justify-center px-6 py-10">
        <div class="w-full max-w-2xl bg-white rounded-2xl shadow-2xl border border-slate-100 p-8 sm:p-10">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-sm text-slate-500">Επιβεβαίωση</p>
                    <h2 class="text-2xl font-semibold text-slate-900 mt-1">Επαλήθευση κωδικού</h2>
                </div>
                <a href="/" class="text-slate-400 hover:text-slate-700 transition">
                    <x-application-logo class="w-10 h-10 fill-current" />
                </a>
            </div>

            <p class="text-sm text-slate-600 mt-4">
                Πρόκειται για προστατευμένη ενέργεια. Επιβεβαίωσε τον κωδικό σου.
            </p>

            <x-auth-validation-errors class="mt-6" :errors="$errors" />

            <form method="POST" action="{{ route('password.confirm') }}" class="mt-6 space-y-4">
                @csrf

                <div>
                    <x-label for="password" :value="__('Password')" class="text-slate-700" />
                    <x-input id="password" class="block mt-1 w-full border-slate-200 focus:border-slate-700 focus:ring-slate-700"
                             type="password" name="password" required autocomplete="current-password" />
                </div>

                <div class="pt-2">
                    <x-button class="w-full justify-center bg-slate-900 hover:bg-slate-800 focus:ring-slate-700">
                        {{ __('Confirm') }}
                    </x-button>
                </div>
            </form>
        </div>
    </div>
</x-guest-layout>
