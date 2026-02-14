<x-guest-layout>
    <div class="min-h-screen flex items-center justify-center px-6 py-10">
        <div class="w-full max-w-5xl">
            <div class="bg-white rounded-2xl shadow-2xl overflow-hidden border border-slate-100">
                <div class="grid grid-cols-1 lg:grid-cols-2">
                    <div class="hidden lg:flex flex-col justify-between p-10 bg-gradient-to-br from-slate-900 to-slate-700 text-white">
                        <div>
                            <h1 class="text-3xl font-semibold mt-3">Πολιτιστικός &amp; Μορφωτικός Σύλλογος</h1>
                            <p class="text-slate-200 mt-4">
                                Κεντρική διαχείριση μελών, συνδρομών και εκλογών.
                            </p>
                        </div>
                    </div>

                    <div class="p-8 sm:p-10">
                        <div class="flex items-center justify-between">
                            <div>
                                <p class="text-sm text-slate-500">Καλώς ήρθες</p>
                                <h2 class="text-2xl font-semibold text-slate-900 mt-1">Σύνδεση</h2>
                            </div>
                            <a href="/" class="text-slate-400 hover:text-slate-700 transition">
                                <x-application-logo class="w-10 h-10 fill-current" />
                            </a>
                        </div>

                        <x-auth-session-status class="mt-6" :status="session('status')" />
                        <x-auth-validation-errors class="mt-4" :errors="$errors" />

                        <form method="POST" action="{{ route('login') }}" class="mt-6 space-y-4">
                            @csrf

                            <div>
                                <x-label for="email" :value="__('Email')" class="text-slate-700" />
                                <x-input id="email" class="block mt-1 w-full border-slate-200 focus:border-slate-700 focus:ring-slate-700"
                                         type="email" name="email" :value="old('email')" required autofocus />
                            </div>

                            <div>
                                <x-label for="password" :value="__('Password')" class="text-slate-700" />
                                <x-input id="password" class="block mt-1 w-full border-slate-200 focus:border-slate-700 focus:ring-slate-700"
                                         type="password" name="password" required autocomplete="current-password" />
                            </div>

                            <div class="flex items-center justify-between">
                                <label for="remember_me" class="inline-flex items-center">
                                    <input id="remember_me" type="checkbox" class="rounded border-slate-300 text-slate-900 shadow-sm focus:border-slate-700 focus:ring focus:ring-slate-200 focus:ring-opacity-50" name="remember">
                                    <span class="ml-2 text-sm text-slate-600">{{ __('Remember me') }}</span>
                                </label>

                                @if (Route::has('password.request'))
                                    <a class="text-sm text-slate-500 hover:text-slate-900" href="{{ route('password.request') }}">
                                        {{ __('Forgot your password?') }}
                                    </a>
                                @endif
                            </div>

                            <div class="pt-2">
                                <x-button class="w-full justify-center bg-slate-900 hover:bg-slate-800 focus:ring-slate-700">
                                    {{ __('Log in') }}
                                </x-button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <div class="mt-4 text-center text-xs text-slate-500">
                Κατασκευή για τον Πολιτιστικό Σύλλογο Αγίου Βλασίου — Δημήτρης Δάμτσας © 2021–{{ now()->year }}
            </div>
        </div>
    </div>
</x-guest-layout>
