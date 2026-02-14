<div class="min-h-screen bg-gray-100">
    <div class="max-w-6xl mx-auto px-6 py-10">
        <div class="bg-white rounded-2xl shadow-xl overflow-hidden border border-gray-100">
            <div class="px-8 py-10 bg-gradient-to-br from-slate-900 to-slate-700 text-white">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-sm uppercase tracking-widest text-slate-300">Κεντρικός Πίνακας</p>
                        <h1 class="text-3xl sm:text-4xl font-semibold mt-2">Σύλλογος Αγ. Βλασίου Πηλίου</h1>
                        <p class="text-slate-200 mt-2">Διαχείριση μελών, συνδρομών και εκλογών με καθαρή εικόνα.</p>
                    </div>
                    <div class="hidden sm:block text-right">
                        <p class="text-xs text-slate-300">Έτος λειτουργίας</p>
                        <p class="text-2xl font-semibold">{{ $date }}</p>
                    </div>
                </div>
            </div>

            <div class="px-8 py-8 bg-white">
                <div class="grid grid-cols-1 sm:grid-cols-3 gap-4">
                    <div class="rounded-xl border border-slate-100 p-4">
                        <p class="text-xs uppercase tracking-widest text-slate-400">Σύνολο Μελών</p>
                        <p class="text-2xl font-semibold text-slate-900 mt-2">{{ $totalMembers }}</p>
                    </div>
                    <div class="rounded-xl border border-slate-100 p-4">
                        <p class="text-xs uppercase tracking-widest text-slate-400">Ενεργά Μέλη</p>
                        <p class="text-2xl font-semibold text-emerald-600 mt-2">{{ $activeMembers }}</p>
                    </div>
                    <div class="rounded-xl border border-slate-100 p-4">
                        <p class="text-xs uppercase tracking-widest text-slate-400">Ανενεργά Μέλη</p>
                        <p class="text-2xl font-semibold text-rose-600 mt-2">{{ $inactiveMembers }}</p>
                    </div>
                </div>

                <div class="mt-8">
                    <h2 class="text-lg font-semibold text-slate-800">Γρήγορες ενέργειες</h2>
                    <p class="text-sm text-slate-500 mt-1">Επίλεξε τη ροή που χρειάζεσαι.</p>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mt-6">
                    <a href="/members" class="group block">
                        <div class="p-6 rounded-xl border border-slate-200 hover:border-slate-900 transition">
                            <div class="flex items-center justify-between">
                                <div>
                                    <p class="text-sm text-slate-500">Συνδρομές</p>
                                    <p class="text-xl font-semibold text-slate-900 mt-1">Γενική εικόνα</p>
                                </div>
                                <div class="text-slate-400 group-hover:text-slate-900 transition">→</div>
                            </div>
                        </div>
                    </a>

                    <button wire:click="createMember()" class="group text-left w-full">
                        <div class="p-6 rounded-xl border border-slate-200 hover:border-slate-900 transition">
                            <div class="flex items-center justify-between">
                                <div>
                                    <p class="text-sm text-slate-500">Μέλη</p>
                                    <p class="text-xl font-semibold text-slate-900 mt-1">Προσθήκη νέου</p>
                                </div>
                                <div class="text-slate-400 group-hover:text-slate-900 transition">＋</div>
                            </div>
                        </div>
                    </button>

                    <a href="/elections-first-step" class="group block">
                        <div class="p-6 rounded-xl border border-slate-200 hover:border-slate-900 transition">
                            <div class="flex items-center justify-between">
                                <div>
                                    <p class="text-sm text-slate-500">Εκλογές</p>
                                    <p class="text-xl font-semibold text-slate-900 mt-1">Διαδικασία {{ $date }}</p>
                                </div>
                                <div class="text-slate-400 group-hover:text-slate-900 transition">→</div>
                            </div>
                        </div>
                    </a>

                    <button wire:click="message" class="group text-left w-full">
                        <div class="p-6 rounded-xl border border-slate-200 hover:border-slate-900 transition">
                            <div class="flex items-center justify-between">
                                <div>
                                    <p class="text-sm text-slate-500">Επικοινωνία</p>
                                    <p class="text-xl font-semibold text-slate-900 mt-1">Αποστολή μηνύματος</p>
                                </div>
                                <div class="text-slate-400 group-hover:text-slate-900 transition">→</div>
                            </div>
                        </div>
                    </button>
                    </div>
                </div>
            </div>
        </div>

        @if($isOpen)
            @include('livewire.add_member')
        @endif
    </div>
</div>
