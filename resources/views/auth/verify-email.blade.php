<x-guest-layout>
    <div class="min-h-screen flex items-center justify-center px-6 py-10">
        <div class="w-full max-w-2xl bg-white rounded-2xl shadow-2xl border border-slate-100 p-8 sm:p-10">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-sm text-slate-500">Επαλήθευση email</p>
                    <h2 class="text-2xl font-semibold text-slate-900 mt-1">Ενεργοποίηση λογαριασμού</h2>
                </div>
                <a href="/" class="text-slate-400 hover:text-slate-700 transition">
                    <x-application-logo class="w-10 h-10 fill-current" />
                </a>
            </div>

            <div class="mt-4 text-sm text-slate-600">
                {{ __('Thanks for signing up! Before getting started, could you verify your email address by clicking on the link we just emailed to you? If you didn\'t receive the email, we will gladly send you another.') }}
            </div>

            @if (session('status') == 'verification-link-sent')
                <div class="mt-4 font-medium text-sm text-emerald-600">
                    {{ __('A new verification link has been sent to the email address you provided during registration.') }}
                </div>
            @endif

            <div class="mt-6 flex flex-col sm:flex-row sm:items-center sm:justify-between gap-3">
                <form method="POST" action="{{ route('verification.send') }}">
                    @csrf
                    <x-button class="bg-slate-900 hover:bg-slate-800 focus:ring-slate-700">
                        {{ __('Resend Verification Email') }}
                    </x-button>
                </form>

                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="text-sm font-semibold text-slate-600 hover:text-slate-900">
                        {{ __('Log out') }}
                    </button>
                </form>
            </div>
        </div>
    </div>
</x-guest-layout>
