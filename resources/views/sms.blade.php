<x-app-layout>
    <div class="max-w-3xl mx-auto">
        <div class="bg-white rounded-2xl shadow-xl border border-slate-100 p-8">
            <h2 class="text-2xl font-semibold text-slate-900">Αποστολή Μηνύματος</h2>
            <p class="text-sm text-slate-500 mt-1">
                Το μήνυμα θα σταλεί μόνο σε μέλη με ενεργή συνδρομή.
            </p>

            <form method="POST" action="/sendsms" class="mt-6 space-y-4">
                @csrf
                <div>
                    <label for="body" class="block text-sm font-medium text-slate-700">Μήνυμα</label>
                    <textarea id="body" name="body" rows="4" maxlength="160"
                        class="mt-2 w-full rounded-xl border border-slate-200 px-4 py-2.5 text-slate-900 focus:border-slate-700 focus:ring-2 focus:ring-slate-200"
                        placeholder="Πληκτρολογήστε εδώ το μήνυμά σας."></textarea>
                    @error('body') <p class="text-rose-600 text-xs mt-2">Το πεδίο μηνύματος είναι απαραίτητο.</p>@enderror
                </div>

                <div class="text-sm text-slate-500">
                    <span id="current">0</span><span id="maximum"> / 160</span>
                </div>

                <div class="pt-2 flex flex-col sm:flex-row sm:items-center sm:justify-end gap-3">
                    <button type="button" onclick="location.href='/'"
                        class="px-4 py-2.5 rounded-xl border border-slate-200 text-sm font-semibold text-slate-700 hover:border-slate-400 hover:text-slate-900 transition">
                        Ακύρωση
                    </button>
                    <button type="submit"
                        class="px-4 py-2.5 rounded-xl bg-slate-900 text-sm font-semibold text-white hover:bg-slate-800 transition">
                        Αποστολή
                    </button>
                </div>
            </form>
        </div>
    </div>

    <script>
        const textarea = document.querySelector('#body');
        const current = document.querySelector('#current');
        const maximum = document.querySelector('#maximum');

        textarea.addEventListener('input', () => {
            const count = textarea.value.length;
            current.textContent = count;
            const color = count >= 140 ? '#8f0001' : count > 120 ? '#8f0001' : count > 100 ? '#841c1c' : count > 90 ? '#793535' : '#64748b';
            current.style.color = color;
            maximum.style.color = count >= 140 ? '#8f0001' : '#64748b';
        });
    </script>
</x-app-layout>
