{{-- <style>

    table {

        table-layout: fixed;
        width: 50%;
        /* border: 1px solid black; */
        /* must have this set */
    }
    /* td {
border: 2px solid black;
} */

</style> --}}
<div class="flex flex-col mt-6">
    <div class="bg-white rounded-2xl shadow-xl border border-slate-100 overflow-hidden">
        <div class="px-6 py-5 border-b border-slate-100">
            <div class="flex flex-col lg:flex-row lg:items-center lg:justify-between gap-4">
                <div>
                    <h2 class="text-xl font-semibold text-slate-900">Επιλογή Υποψηφίων Εφορευτικής</h2>
                    <p class="text-sm text-slate-500 mt-1">Επίλεξε μέλη που θα συμμετέχουν ως υποψήφιοι.</p>
                </div>
                <div class="flex flex-col sm:flex-row gap-3">
                    <button onclick="location.href='{{ url()->previous() }}'"
                        class="px-4 py-2 rounded-xl border border-slate-200 text-sm font-semibold text-slate-700 hover:border-slate-400 hover:text-slate-900 transition">
                        Επιστροφή
                    </button>
                    <button wire:click.prevent="viewSelection()"
                        class="px-4 py-2 rounded-xl bg-slate-900 text-sm font-semibold text-white hover:bg-slate-800 transition">
                        Συνέχεια
                    </button>
                </div>
            </div>
        </div>

        <div class="px-6 py-4 border-b border-slate-100 bg-slate-50">
            <div class="flex items-center gap-2 text-xs font-semibold text-slate-600">
                <span class="px-2 py-1 rounded-full bg-slate-900 text-white">Βήμα 1</span>
                <span>Επιλογή υποψηφίων εφορευτικής</span>
            </div>
        </div>

        <div class="px-6 py-4 border-b border-slate-100">
            <div class="max-w-lg w-full lg:max-w-xs">
                <label for="search" class="sr-only">Search</label>
                <div class="relative">
                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                        <svg class="h-5 w-5 text-slate-400" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd"
                                d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z"
                                clip-rule="evenodd"></path>
                        </svg>
                    </div>
                    <input wire:model="search" id="search"
                        class="block w-full pl-10 pr-3 py-2.5 border border-slate-200 rounded-xl leading-5 bg-white placeholder-slate-400 focus:outline-none focus:border-slate-700 focus:ring-2 focus:ring-slate-200 sm:text-sm transition"
                        placeholder="Αναζήτηση μέλους" type="search">
                </div>
            </div>
        </div>

        <div class="overflow-x-auto">
            <table class="min-w-full divide-y divide-slate-100">
                <thead class="bg-slate-50">
                    <tr>
                        <th class="px-6 py-3 text-left text-xs font-semibold text-slate-500 uppercase tracking-wider">Επιλογή</th>
                        <th class="px-6 py-3 text-left">
                            <div class="flex items-center gap-2">
                                <button wire:click="sortBy('name')"
                                    class="text-xs font-semibold text-slate-500 uppercase tracking-wider">Ονοματεπώνυμο</button>
                                <x-sort-icon field="name" :sortField="$sortField" :sortAsc="$sortAsc" />
                            </div>
                        </th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-slate-100">
                    @foreach ($members as $member)
                    <tr class="hover:bg-slate-50 transition">
                        <td class="px-6 py-4">
                            <input type="checkbox" wire:model="multi.{{ $member->id }}"
                                class="form-checkbox h-4 w-4 text-slate-900 border-slate-300 rounded">
                        </td>
                        <td class="px-6 py-4">
                            <div class="flex items-center gap-3">
                                <div class="h-10 w-10 rounded-full bg-slate-100 flex items-center justify-center text-slate-500 text-sm font-semibold">
                                    {{ mb_substr($member->name, 0, 1) }}
                                </div>
                                <div class="text-sm font-semibold text-slate-900">
                                    {{ $member->name }}
                                </div>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        @if ($members->count() === 0)
            <div class="px-6 py-10 text-center">
                <p class="text-sm text-slate-500">Δεν υπάρχουν διαθέσιμα μέλη για επιλογή.</p>
            </div>
        @endif

        <div class="px-6 py-4 bg-white">
            {{ $members->links() }}
        </div>
    </div>
</div>
