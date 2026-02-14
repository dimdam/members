<div>
    <div class="fixed inset-0 z-50 flex items-center justify-center px-4 py-8">
        <div class="absolute inset-0 bg-slate-900/60"></div>

        <div class="relative w-full max-w-lg bg-white rounded-2xl shadow-2xl border border-slate-100">
            <div class="px-6 py-5 border-b border-slate-100">
                <h3 class="text-lg font-semibold text-slate-900">Επεξεργασία Στοιχείων</h3>
                <p class="text-sm text-slate-500 mt-1">Ενημέρωσε τα στοιχεία του μέλους.</p>
            </div>

            <form class="px-6 py-5 space-y-4">
                <div>
                    <label for="name" class="block text-sm font-medium text-slate-700">Ονοματεπώνυμο</label>
                    <input type="text"
                        class="mt-2 w-full rounded-xl border border-slate-200 px-4 py-2.5 text-slate-900 focus:border-slate-700 focus:ring-2 focus:ring-slate-200"
                        id="name" wire:model="name">
                    @error('name') <span class="text-rose-600 text-xs">{{ "Το oνοματεπώνυμο είναι απαραίτητο." }}</span>@enderror
                </div>

                <div>
                    <label for="phone_number" class="block text-sm font-medium text-slate-700">Αριθμός κινητού τηλεφώνου</label>
                    <input type="tel"
                        class="mt-2 w-full rounded-xl border border-slate-200 px-4 py-2.5 text-slate-900 focus:border-slate-700 focus:ring-2 focus:ring-slate-200"
                        id="phone_number" placeholder="Εισάγετε εδώ τον αριθμό κινητού τηλεφώνου"
                        wire:model="phone_number">
                    @error('phone_number') <span class="text-rose-600 text-xs">{{ $message }}</span>@enderror
                </div>
            </form>

            <div class="px-6 py-4 bg-slate-50 border-t border-slate-100 flex flex-col sm:flex-row-reverse gap-3">
                <button wire:click.prevent="update_member_details()" type="button"
                    class="inline-flex justify-center rounded-xl bg-slate-900 px-5 py-2.5 text-sm font-semibold text-white hover:bg-slate-800 transition">
                    Αποθήκευση
                </button>
                <button wire:click="closeModal()" type="button"
                    class="inline-flex justify-center rounded-xl border border-slate-200 px-5 py-2.5 text-sm font-semibold text-slate-700 hover:border-slate-400 hover:text-slate-900 transition">
                    Ακύρωση
                </button>
            </div>
        </div>
    </div>
</div>
