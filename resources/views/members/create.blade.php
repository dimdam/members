<x-app-layout>
    <x-slot name="header">

    </x-slot>

    <div class="my-8">
        {{-- <h2 class="text-lg font-semibold mt-4">Συνδρομές</h2> --}}

        {{-- @livewire('datatables', ['paid_subscription' => $member->paid_subscription]) --}}


{{-- @livewire('datatables') --}}
<livewire:member   />

    </div>
</x-app-layout>
