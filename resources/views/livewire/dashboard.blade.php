<div>



        <div class="min-h-screen min-w-screen flex items-center justify-center bg-gray-100">
            <div class="flex flex-col px-6 py-4 bg-white shadow-lg">
                <h1 class="mb-8 text-gray-800 leading-6">Παρακαλώ επιλέξτε:</h1>
                <ul class="flex flex-col space-y-4 text-gray-900">
                    <a href="/members">
                        <div
                            class="bg-white text-blue-500 border-2 border-blue-500 hover:bg-blue-500 hover:text-white rounded-md w-full px-6 py-4 ">
                            Γενική Εικόνα Συνδρομών</div>
                    </a>
                    <a href="#" wire:click="createMember()">
                        <div
                            class="bg-white text-blue-500 border-2 border-blue-500 hover:bg-blue-500 hover:text-white rounded-md w-full px-6 py-4 ">
                            Προσθήκη Νέου Μέλους</div>
                    </a>            @if($isOpen)

                    @include('livewire.add_member')

                @endif
                    <a href="/elections-first-step">
                        <div
                            class="bg-white text-blue-500 border-2 border-blue-500 hover:bg-blue-500 hover:text-white rounded-md w-full px-6 py-4 ">
                            Εκλογές {{ $date }}</div>
                    </a>
                    <a href="/sms">
                        <div
                            class="bg-white text-blue-500 border-2 border-blue-500 hover:bg-blue-500 hover:text-white rounded-md w-full px-6 py-4 ">
                            Αποστολή Μηνύματος</div>
                    </a>
                    <ul>
                        <div>
                        </div>



</div>

