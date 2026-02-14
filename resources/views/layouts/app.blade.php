<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ΠΟΛΙΤΙΣΤΙΚΟΣ ΜΟΡΦΩΤΙΚΟΣ ΣΥΛΛΟΓΟΣ ΑΓΙΟΥ ΒΛΑΣΙΟΥ ΠΗΛΙΟΥ</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&family=Space+Grotesk:wght@500;600;700&display=swap" rel="stylesheet">
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <livewire:styles />


</head>

<body class="font-sans antialiased">
    <div class="min-h-screen app-shell">
        @include('layouts.navigation')
        @if (session('status'))
            <div class="max-w-7xl mx-auto px-6 pt-4">
                <div class="rounded-xl border border-emerald-100 bg-emerald-50 px-4 py-3 text-sm text-emerald-700">
                    {{ session('status') }}
                </div>
            </div>
        @endif
        <main class="max-w-7xl mx-auto px-6 py-8">
            {{ $slot }}
        </main>
    </div>

    <livewire:scripts/>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <x-livewire-alert::scripts />

</body>
</html>
