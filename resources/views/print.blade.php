<x-printheader>

    <style>

        table {

            table-layout: fixed;
            width: 20%;
            /* border: 1px solid black; */
            /* must have this set */
        }
        td {
  border: 2px solid black;
}

    </style>
        <p class="text-center p-0">ΠΟΛΙΤΙΣΤΙΚΟΣ/ΜΟΡΦΩΤΙΚΟΣ ΣΥΛΛΟΓΟΣ ΑΓΙΟΥ ΒΛΑΣΙΟΥ ΠΗΛΙΟΥ</p>
<p class="text-center p-0"> Εκλογές {{ $date }}</p>

    <div class="flex flex-col mt-0">

        <p class="text-center font-bold text-sm p-2">Για το Δ/Σ επιλέγουμε έως 5 άτομα και για εφορευτική επιτροπή επιλεγουμε έως 3 άτομα. </p>

        <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg mt-0 block p-0">

            <table class="min-w-full divide-y divide-gray-200 w-1/2 p-0 ">
                <thead>
                    <tr>
                        <th class=" w-1/6 py-3 px-6 text-center">
                            <span
                                class=" w-1/2 text-center text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">Επιλογη</span>
                        </th>
                        <th class=" ">
                            <span
                                class=" text-center text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">Ονοματεπωνυμο Υποψηφιου για Διοικητικο Συμβουλιο</span>

                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    @foreach ($members as $member)
                    @if ($member->is_a_candidate)
                    <tr>
                        <td class="py-3 px-6 text-center whitespace-nowrap">
                            {{-- <input type="checkbox"
                                class="form-checkbox h-6 w-6 text-indigo-600 transition duration-150 ease-in-out"> --}}

                        </td>
                        <td class="py-3 px-6  w-1/6 text-left whitespace-nowrap">


                            <div class="ml-4">
                                <div class="text-sm leading-5 text-center  font-medium text-black">

                                    {{ $member->name }}


                                </div>
                            </div>
                        </td>

                    </tr>
                    @endif
                    @endforeach
                </tbody>
            </table>



            <table class="min-w-full divide-y divide-gray-200 ">
                <thead>
                    <tr>
                        <th class="w-1/6 text-center">
                            <span
                                class=" text-center text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">Επιλογη</span>
                        </th>
                        <th >

                            <span
                                class=" text-center text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">Ονοματεπωνυμο Υποψηφιου για Εφορευτικη Επιτροπη</span>


                        </th>

                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    @foreach ($members as $member)
                    @if ($member->is_a_scrutineer_candidate)
                    <tr>
                        <td class="   text-center whitespace-nowrap">
                            {{-- <input type="checkbox"
                                class="form-checkbox h-6 w-6 text-indigo-600 transition duration-150 ease-in-out"> --}}

                        </td>
                        <td class="py-3 px-6  w-1/6 text-left whitespace-nowrap">


                            <div class="ml-4">
                                <div class="text-sm leading-5 text-center  font-medium text-black">


                                    {{ $member->name }}


                                </div>
                            </div>
                        </td>

                    </tr>
                    @endif
                    @endforeach
                </tbody>
            </table>
        </div>


    </div>

    <script>
        window.addEventListener("load", window.print());
      </script>
</x-printheader>
