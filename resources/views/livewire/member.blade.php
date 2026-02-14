<div class="max-w-2xl">
    <div class="bg-white rounded-2xl shadow-xl border border-slate-100 p-8">
        <h2 class="text-2xl font-semibold text-slate-900">Προσθήκη Νέου Μέλους</h2>
        <p class="text-sm text-slate-500 mt-1">Συμπλήρωσε τα βασικά στοιχεία και αποθήκευσε.</p>

        <form class="mt-6 space-y-4">
            <div>
                <label for="name" class="block text-sm font-medium text-slate-700">Ονοματεπώνυμο</label>
                <input type="text" id="name" wire:model="name"
                    class="mt-2 w-full rounded-xl border border-slate-200 px-4 py-2.5 text-slate-900 focus:border-slate-700 focus:ring-2 focus:ring-slate-200"
                    placeholder="Εισάγετε ονοματεπώνυμο">
                @error('name') <span class="text-rose-600 text-xs">Το oνοματεπώνυμο είναι απαραίτητο.</span>@enderror
            </div>

            <div>
                <label for="phone_number" class="block text-sm font-medium text-slate-700">Αριθμός κινητού τηλεφώνου (προαιρετικό)</label>
                <input type="tel" id="phone_number" wire:model="phone_number"
                    class="mt-2 w-full rounded-xl border border-slate-200 px-4 py-2.5 text-slate-900 focus:border-slate-700 focus:ring-2 focus:ring-slate-200"
                    placeholder="π.χ. 69XXXXXXXX">
                @error('phone_number') <span class="text-rose-600 text-xs">Ο αριθμός πρέπει να έχει 10 ψηφία και να ξεκινά από 6.</span>@enderror
            </div>

            <div class="pt-2">
                <button wire:click.prevent="save()"
                    class="inline-flex items-center justify-center rounded-xl bg-slate-900 px-5 py-2.5 text-sm font-semibold text-white hover:bg-slate-800 transition">
                    Αποθήκευση
                </button>
            </div>
        </form>
    </div>
</div>
