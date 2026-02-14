<x-app-layout>
    <x-slot name="header">

    </x-slot>

    <div class="my-8">
        <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
            <div>
                <h2 class="text-2xl font-semibold text-slate-900">Συνδρομές</h2>
                <p class="text-sm text-slate-500 mt-1">Κατάσταση μελών, ανανεώσεις και επεξεργασία στοιχείων.</p>
            </div>
        </div>

        <livewire:datatables />
        {{-- @livewire('datatables', ['paid_subscription' => $member->paid_subscription]) --}}


{{-- @livewire('datatables') --}}

    </div>
</x-app-layout>
