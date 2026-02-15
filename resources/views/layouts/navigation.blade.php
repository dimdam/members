<nav x-data="{ open: false }" class="bg-white/90 backdrop-blur border-b border-slate-100 sticky top-0 z-40">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex items-center justify-between h-16">
            <div class="flex items-center gap-3">
                <a href="{{ route('dashboard') }}" class="flex items-center gap-3">
                    <div class="h-10 w-10 rounded-xl bg-slate-900/90 text-white flex items-center justify-center text-sm font-semibold">
                        <x-application-logo class="h-6 w-6 fill-current text-white" />
                    </div>
                    <div class="hidden sm:block">
                        <div class="text-sm font-semibold text-slate-900">Σουίτα Μελών</div>
                        <div class="text-xs text-slate-500">Σύλλογος Αγ. Βλασίου Πηλίου</div>
                    </div>
                </a>
                <div class="hidden lg:flex items-center gap-2 ml-6">
                    <a href="/members" class="px-3 py-1.5 rounded-lg text-xs font-semibold text-slate-600 hover:text-slate-900 hover:bg-slate-100 transition">
                        Συνδρομές
                    </a>
                    <a href="/elections-first-step" class="px-3 py-1.5 rounded-lg text-xs font-semibold text-slate-600 hover:text-slate-900 hover:bg-slate-100 transition">
                        Εκλογές
                    </a>
                </div>
            </div>

            <div class="hidden sm:flex items-center gap-4">
                <div class="flex items-center gap-3 bg-slate-50 border border-slate-100 rounded-full px-3 py-1.5">
                    <div class="h-8 w-8 rounded-full bg-slate-200 flex items-center justify-center text-xs font-semibold text-slate-600">
                        {{ mb_substr(Auth::user()->name, 0, 1) }}
                    </div>
                    <div class="text-xs text-slate-600">{{ Auth::user()->name }}</div>
                </div>
                <x-dropdown align="right" width="48">
                    <x-slot name="trigger">
                        <button class="inline-flex items-center px-3 py-2 rounded-lg border border-slate-200 text-xs font-semibold text-slate-700 hover:border-slate-400 hover:text-slate-900 transition">
                            Μενού
                            <svg class="ml-2 h-4 w-4" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                            </svg>
                        </button>
                    </x-slot>
                    <x-slot name="content">
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <x-dropdown-link :href="route('logout')"
                                    onclick="event.preventDefault(); this.closest('form').submit();">
                                {{ __('Log out') }}
                            </x-dropdown-link>
                        </form>
                    </x-slot>
                </x-dropdown>
            </div>

            <div class="-mr-2 flex items-center sm:hidden">
                <button @click="open = ! open" class="inline-flex items-center justify-center p-2 rounded-md text-slate-500 hover:text-slate-900 hover:bg-slate-100 focus:outline-none transition">
                    <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path :class="{'hidden': open, 'inline-flex': ! open }" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                        <path :class="{'hidden': ! open, 'inline-flex': open }" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Responsive Navigation Menu -->
    <div :class="{'block': open, 'hidden': ! open}" class="hidden sm:hidden border-t border-slate-100 bg-white">
        <div class="px-4 py-3">
            <div class="text-sm font-semibold text-slate-900">{{ Auth::user()->name }}</div>
            <div class="text-xs text-slate-500">{{ Auth::user()->email }}</div>
        </div>
        <div class="px-4 pb-3 space-y-1">
            <a href="/members" class="block px-3 py-2 rounded-lg text-sm text-slate-700 hover:bg-slate-100">Συνδρομές</a>
            <a href="/elections-first-step" class="block px-3 py-2 rounded-lg text-sm text-slate-700 hover:bg-slate-100">Εκλογές</a>
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <x-responsive-nav-link :href="route('logout')"
                        onclick="event.preventDefault(); this.closest('form').submit();">
                    {{ __('Log out') }}
                </x-responsive-nav-link>
            </form>
        </div>
    </div>
</nav>
