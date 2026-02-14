<div class="flex flex-col mt-6">
    <div class="bg-white rounded-2xl shadow-xl border border-slate-100 overflow-hidden">
        <div class="px-6 py-5 border-b border-slate-100">
            <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
                <div>
                    <h2 class="text-xl font-semibold text-slate-900">Συνδρομές Μελών</h2>
                    <p class="text-sm text-slate-500 mt-1">Γρήγορη αναζήτηση, ενημέρωση και ανανέωση.</p>
                </div>
                <div class="max-w-lg w-full sm:max-w-xs">
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
                <div class="flex items-center gap-2">
                    <label for="perPage" class="text-xs font-semibold text-slate-500">Εγγραφές</label>
                    <select id="perPage" wire:model="perPage"
                        class="rounded-xl border border-slate-200 bg-white text-sm text-slate-700 focus:border-slate-700 focus:ring-2 focus:ring-slate-200">
                        <option value="5">5</option>
                        <option value="10">10</option>
                        <option value="20">20</option>
                        <option value="50">50</option>
                    </select>
                </div>
            </div>
        </div>

        <div class="overflow-x-auto">
            <table class="min-w-full divide-y divide-slate-100">
                <thead class="bg-slate-50 sticky top-0 z-10">
                    <tr>
                        <th class="px-6 py-3 text-left">
                            <div class="flex items-center gap-2">
                                <button wire:click="sortBy('name')"
                                    class="text-xs font-semibold text-slate-500 uppercase tracking-wider">Ονοματεπώνυμο</button>
                                <x-sort-icon field="name" :sortField="$sortField" :sortAsc="$sortAsc" />
                            </div>
                        </th>
                        <th class="px-6 py-3 text-left text-xs font-semibold text-slate-500 uppercase tracking-wider">
                            Τηλέφωνο
                        </th>
                        <th class="px-6 py-3 text-left text-xs font-semibold text-slate-500 uppercase tracking-wider">
                            Τελευταίο έτος
                        </th>
                        <th class="px-6 py-3 text-left">
                            <div class="flex items-center gap-2">
                                <button wire:click="sortBy('paid_membership')"
                                    class="text-xs font-semibold text-slate-500 uppercase tracking-wider">Κατάσταση</button>
                                <x-sort-icon field="paid_membership" :sortField="$sortField" :sortAsc="$sortAsc" />
                            </div>
                        </th>
                        <th class="px-6 py-3 text-right text-xs font-semibold text-slate-500 uppercase tracking-wider">
                            Ενέργειες
                        </th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-slate-100">
                    @foreach ($members as $member)
                    <tr class="hover:bg-slate-50 transition">
                        <td class="px-6 py-4">
                            <div class="flex items-center gap-3">
                                <div class="h-10 w-10 rounded-full bg-slate-100 flex items-center justify-center text-slate-500 text-sm font-semibold">
                                    {{ mb_substr($member->name, 0, 1) }}
                                </div>
                                <div>
                                    <a href="#" class="text-sm font-semibold text-slate-900 hover:text-slate-700"
                                        wire:click="editMember({{ $member->id }})">{{ $member->name }}</a>
                                    <p class="text-xs text-slate-500">ID #{{ $member->id }}</p>
                                </div>
                            </div>
                        </td>
                        <td class="px-6 py-4">
                            <span class="text-sm text-slate-700">
                                @if ($member->phone_number)
                                    •••• {{ substr($member->phone_number, -4) }}
                                @else
                                    Όχι
                                @endif
                            </span>
                        </td>
                        <td class="px-6 py-4">
                            <span class="text-sm text-slate-700">
                                @php
                                    $renewedAt = $member->membership_renewed_at
                                        ? \Illuminate\Support\Carbon::parse($member->membership_renewed_at)
                                        : \Illuminate\Support\Carbon::parse($member->updated_at);
                                @endphp
                                {{ $renewedAt->format('Y') }}
                            </span>
                        </td>
                        <td class="px-6 py-4">
                            @php
                                $renewedAt = $member->membership_renewed_at
                                    ? \Illuminate\Support\Carbon::parse($member->membership_renewed_at)
                                    : \Illuminate\Support\Carbon::parse($member->updated_at);
                            @endphp
                            @if ($renewedAt && $renewedAt->format('Y') >= $now - 3)
                                <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-semibold bg-emerald-100 text-emerald-700">
                                    Ενεργό μέλος
                                </span>
                            @else
                                <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-semibold bg-rose-100 text-rose-700">
                                    Ανενεργό μέλος
                                </span>
                            @endif
                        </td>
                        <td class="px-6 py-4 text-right">
                            @php
                                $year = $renewedAt ? $renewedAt->format('Y') : null;
                                $previousYear = $now - 1;
                                $needsRenewal = !$year || (int) $year < $previousYear;
                            @endphp
                            @if ($needsRenewal)
                                <form class="inline-flex items-center gap-2">
                                    <input type="hidden" wire:model="member_id">
                                    @if ($confirmation === $member->id)
                                        <button type="button" wire:click.prevent="update_subscription({{ $member->id }})"
                                            class="px-3 py-1.5 rounded-lg text-xs font-semibold bg-rose-600 text-white hover:bg-rose-500 transition">
                                            Επιβεβαίωση
                                        </button>
                                        <button type="button" wire:click.prevent="cancelRenewal"
                                            class="px-3 py-1.5 rounded-lg text-xs font-semibold border border-slate-200 text-slate-700 hover:border-slate-700 hover:text-slate-900 transition">
                                            Άκυρο
                                        </button>
                                    @else
                                        <button type="button" wire:click.prevent="confirmUpdate({{ $member->id }})"
                                            class="px-3 py-1.5 rounded-lg text-xs font-semibold border border-slate-200 text-slate-700 hover:border-slate-700 hover:text-slate-900 transition">
                                            Ανανέωση
                                        </button>
                                    @endif
                                </form>
                            @endif
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        @if($isOpen)
            @include('livewire.edit_member')
        @endif

        @if ($members->count() === 0)
            <div class="px-6 py-10 text-center">
                <p class="text-sm text-slate-500">Δεν βρέθηκαν μέλη με αυτά τα κριτήρια.</p>
            </div>
        @endif

        <div class="px-6 py-4 bg-white">
            {{ $members->links() }}
        </div>
    </div>
</div>
