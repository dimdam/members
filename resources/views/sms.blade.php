<x-app-layout>

<body class="h-screen overflow-hidden flex items-center justify-center" style="background: #edf2f7;">


<!-- overlay -->
<div id="modal_overlay" class="hidden absolute inset-0 bg-black bg-opacity-30 h-screen w-full flex justify-center items-start md:items-center pt-10 md:pt-0">

<!-- modal -->
<div id="modal" class="pacity-0 transform -translate-y-full scale-150  relative w-10/12 md:w-1/2 h-1/2 md:h-3/4 bg-white rounded shadow-lg transition-opacity transition-transform duration-300">

    <!-- button close -->
    {{-- <button
    onclick="openModal(false)"
    class="absolute -top-3 -right-3 bg-red-500 hover:bg-red-600 text-2xl w-10 h-10 rounded-full focus:outline-none text-white">
    &cross;
    </button> --}}

    <!-- header -->
    <div class="px-4 py-3 border-b border-gray-200">
    <p class="text-l font-semibold text-gray-600">Σας υπενθυμίζουμε οτι το μήνυμα θα το λάβουν μόνο όσοι έχουν ενεργή συνδρομή.</p>

    </div>

    <div class="w-full p-3">
        <form method="POST" action="/sendsms">
            @csrf
            <label for="body">Μήνυμα:</label>
        <textarea class="form-textarea mt-1 mb-2 block w-full" rows="3" maxlength="160" name="body" id="body"  placeholder="Πληκτρολογήστε εδώ το μήνυμά σας."></textarea>

        @error('body') <p class="text-red-500 bottom-8">{{ "Το πεδίο μηνύματος είναι απαραίτητο." }}</p>@enderror
        <div id = "count" class="text-right p-0.5 pb-6 text-sm">

            <span id="current">0</span>
    <span id="maximum">/ 160</span>

        </div>
    </div>

    <!-- footer -->
    <div class="absolute bottom-0 left-0 px-4 py-3 w-full flex justify-end items-center gap-3">
    <button class="bg-green-500 hover:bg-green-600 px-4 py-2 rounded text-white focus:outline-none" type="submit">Αποστολή</button>
</form>
    <button
    onclick="location.href='/'"
        formaction="/"
        class="bg-red-500 hover:bg-red-600 px-4 py-2 rounded text-white focus:outline-none"
    >Ακύρωση</button>
    </div>
</div>

</div>

<script>
const modal_overlay = document.querySelector('#modal_overlay');
const modal = document.querySelector('#modal');

function openModal (value){
    const modalCl = modal.classList
    const overlayCl = modal_overlay

    if(value){
    overlayCl.classList.remove('hidden')
    setTimeout(() => {
        modalCl.remove('opacity-0')
        modalCl.remove('-translate-y-full')
        modalCl.remove('scale-150')
    }, 100);
    } else {
    modalCl.add('-translate-y-full')
    setTimeout(() => {
        modalCl.add('opacity-0')
        modalCl.add('scale-150')
    }, 100);
    setTimeout(() => overlayCl.classList.add('hidden'), 300);
    }
}
openModal(true)

$('textarea').keyup(function() {

    var characterCount = $(this).val().length,
        current = $('#current'),
        maximum = $('#maximum'),
        theCount = $('#count');

    current.text(characterCount);


    /*This isn't entirely necessary, just playin around*/
    // if (characterCount < 70) {
    //   current.css('color', '#666');
    // }
    // if (characterCount > 70 && characterCount < 90) {
    //   current.css('color', '#6d5555');
    // }
    if (characterCount > 90 && characterCount < 100) {
      current.css('color', '#793535');
    }
    if (characterCount > 100 && characterCount < 120) {
      current.css('color', '#841c1c');
    }
    if (characterCount > 120 && characterCount < 139) {
      current.css('color', '#8f0001');
    }

    if (characterCount >= 140) {
      maximum.css('color', '#8f0001');
      current.css('color', '#8f0001');
      theCount.css('font-weight','bold');
    } else {
    //   maximum.css('color','#666');
      theCount.css('font-weight','normal');
    }


  });
</script>
</body>
</x-app-layout>
