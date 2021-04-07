<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ΠΟΛΙΤΙΣΤΙΚΟΣ ΜΟΡΦΩΤΙΚΟΣ ΣΥΛΛΟΓΟΣ ΑΓΙΟΥ ΒΛΑΣΙΟΥ ΠΗΛΙΟΥ</title>
    <link rel="stylesheet" href="/css/app.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" rel="stylesheet">
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

    <livewire:styles />

    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.7.0/dist/alpine.min.js" ></script>
    {{-- <script src="https://unpkg.com/taggle/src/taggle.js" defer></script> --}}


</head>

<body class="font-sans antialiased">
    <div class="min-h-screen bg-gray-100">
        @include('layouts.navigation')

    <main class="container mx-auto ">
        {{ $slot }}
    </main>

    <livewire:scripts/>
    {!! Toastr::message() !!}
</body>


<script>

window.addEventListener('alert', event => {

             toastr[event.detail.type](event.detail.message,

             event.detail.title ?? ''), toastr.options = {

                    "closeButton": true,

                    "progressBar": true,

                }

            });

</script>


</html>
