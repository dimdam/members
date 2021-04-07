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
                    <div class="flex items-center h-5">
                        <input wire:model="paid_membership" id="paid_membership" type="checkbox"
                            class="form-checkbox h-4 w-4 text-indigo-600 transition duration-150 ease-in-out">
                    </div>
                    <div class="ml-3 text-sm leading-5">
                        <label for="active" class="font-medium text-gray-700">Ενεργά Μέλη</label>
                    </div>
                </div>
            </div>

            <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg mt-4 table-auto">

                <table class="min-w-full divide-y divide-gray-200 ">
                    <thead>
                        <tr>
                            <th class="px-6 py-3 text-left">
                                <div class="flex items-center">
                                    <button wire:click="sortBy('name')"
                                        class=" text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">Ονοματεπωνυμο:</button>
                                    <x-sort-icon field="name" :sortField="$sortField" :sortAsc="$sortAsc" />
                                </div>
                            </th>
                            <th
                                class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">

                                <span>Τελευταιο ετος καταβολης συνδρομης:</span>

                            </th>
                            <th class="px-6 py-3 text-left ">
                                <span
                                    class=" text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">Κατασταση:</span>
                            </th>
                            <th class="px-6 py-3"></th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        @foreach ($members as $member)
                        <tr>
                            <td class="w-4/12 px-6 py-4 whitespace-no-wrap">
                                <div class="flex items-center">
                                    <div class="flex-shrink-0 h-10 w-10">
                                        <img class="h-10 w-10 rounded-full"
                                            src="https://www.gravatar.com/avatar/?d=mp&f=y" alt="">
                                    </div>
                                    <div class="ml-4">
                                        <div class="text-sm leading-5 font-medium text-gray-900">
                                            {{ $member->name }}
                                        </div>
                                    </div>
                                </div>
                            </td>
                            <td class="w-4/12 px-6 py-4 whitespace-no-wrap">
                                <div class="text-sm leading-5 text-gray-900"> {{ $member->updated_at->format('Y') }}
                                </div>
                            </td>
                            <td class="px-6 py-4 whitespace-no-wrap">
                               @if ($member->paid_membership)


                                {{-- @if ($member->updated_at->format('Y')===$now) --}}
                                <span
                                    class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                                    Ενεργό μέλος
                                </span>
                                {{-- <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium leading-4 bg-red-100 text-red-800">
                                            Inactive
                                        </span> --}}
                                @else
                                <span
                                    class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium leading-4 bg-red-100 text-red-800">
                                    Ανενεργό μέλος
                                </span>
                                @endif
                            </td>

                            <td class="px-6 py-4 whitespace-no-wrap text-right text-sm leading-5 font-medium">
                                @if (!$member->paid_membership)


                                {{-- <form action="/members/{{ $member->id }}" method="post">
                                @method('PATCH')
                                @csrf --}}

                                <form>
                                    <input type="hidden" wire:model="member_id">

                                    @if ($confirmation===$member->id)
                                    <button wire:click.prevent="update({{ $member->id }})"
                                        class=" text-red-500 hover:text-red-900">Επιβεβαίωση Ανανέωσης </button>
                                    @else
                                <button wire:click.prevent="confirmUpdate({{ $member->id }})" class="text-indigo-600 hover:text-indigo-900">Ανανέωση Συνδρομής</button>
                                @endif
                                {{-- <button type="submit" id="id" value="{{ $member->id }}"  wire:click="update({{$member['id']}})"   wire:model="member" class="text-indigo-600 hover:text-indigo-900">Renew
                                </button> --}}
                                </form>




                                {{-- <a wire:model="renew" href="#"
                                    class="text-indigo-600 hover:text-indigo-900">Renew</a>  --}}
                                @endif

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
