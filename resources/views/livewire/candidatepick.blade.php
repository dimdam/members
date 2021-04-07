<div>
    <div>
        <div class="flex flex-col mt-8">

            <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                    <div class="flex items-center justify-between">
                        <div class="max-w-lg w-full lg:max-w-xs">
                            <label for="search" class="sr-only">Search</label>
                            <div class="relative">
                                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                    <svg class="h-5 w-5 text-gray-400" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd"
                                            d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z"
                                            clip-rule="evenodd"></path>
                                    </svg>
                                </div>
                                <input wire:model="search" id="search"
                                    class="block w-full pl-10 pr-3 py-2 border border-gray-300 rounded-md leading-5 bg-white placeholder-gray-500 focus:outline-none focus:placeholder-gray-400 focus:border-blue-300 focus:shadow-outline-blue sm:text-sm transition duration-150 ease-in-out"
                                    placeholder="Αναζήτηση" type="search">
                            </div>
                        </div>
                        <div class="relative flex items-start">



                            <div class="flex space-x-2 md:space-x-3">
                                <button onclick="location.href='/'"
                                    class="bg-transparent hover:bg-blue-500 text-blue-700 font-semibold hover:text-white py-2 px-4 border border-blue-500 hover:border-transparent rounded">Επιστροφή
                                    στην Αρχική Σελίδα </button>

                                <button wire:click.prevent="viewSelection()"
                                    class="bg-transparent hover:bg-blue-500 text-blue-700 font-semibold hover:text-white py-2 px-4 border border-blue-500 hover:border-transparent rounded">
                                    Εκτύπωση Ψηφοδελτίου</button>
                            </div>
                        </div>
                    </div>

                    <h2 class="text-center pt-4 font-bold underline"> ΕΠΙΛΟΓΗ ΥΠΟΨΗΦΙΩΝ ΓΙΑ ΔΙΟΙΚΗΤΙΚΟ ΣΥΜΒΟΥΛΙΟ</h2>


                    <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg mt-4 table-auto">

                        <table class="min-w-full divide-y divide-gray-200 ">
                            <thead>
                                <tr>
                                    <th class="px-6 py-3 text-left ">
                                        <span
                                            class=" text-center text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">επιλογη</span>
                                    </th>
                                    <th class="px-6 py-3 text-center">
                                        <div class="flex items-center">
                                            <button wire:click="sortBy('name')"
                                                class=" text-center text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">Ονοματεπωνυμο</button>
                                            <x-sort-icon field="name" :sortField="$sortField" :sortAsc="$sortAsc" />
                                        </div>
                                    </th>

                                </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-200">
                                @foreach ($members as $member)
                                <tr>
                                    <td
                                        class="px-6 py-4 text-left whitespace-no-wrap  border-gray-500 text-sm leading-5">
                                        <input type="checkbox" wire:model="multi.{{ $member->id }}"
                                            class="form-checkbox h-4 w-4 text-indigo-600 transition duration-150 ease-in-out">

                                    </td>
                                    <td class="w-4/12 px-6 py-4 whitespace-no-wrap">


                                        <div class="ml-4">
                                            <div class="text-sm leading-5 text-left font-medium text-gray-900">
                                                {{ $member->name }}

                                            </div>
                                        </div>
                                    </td>

                                    {{-- <td class="px-6 py-4 whitespace-no-wrap">
                                        @if ($member->paid_membership)


                                        {{-- @if ($member->updated_at->format('Y')===$now) --}}
                                    {{-- <span --}}
                                    {{-- class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                                            Active
                                        </span> --}}
                                    {{-- <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium leading-4 bg-red-100 text-red-800">
                                                    Inactive
                                                </span> --}}
                                    {{-- @else
                                        <span
                                            class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium leading-4 bg-red-100 text-red-800">
                                            Inactive
                                        </span>
                                        @endif
                                    </td> --}}

                                    <td class="px-6 py-4 whitespace-no-wrap text-right text-sm leading-5 font-medium">


                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                    <div class="mt-8">
                        {{ $members->links() }}
                    </div>
                </div>
            </div>
            <div class="h-96"></div>
        </div>
    </div>
</div>
