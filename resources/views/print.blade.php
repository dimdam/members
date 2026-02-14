<!DOCTYPE html>
<html lang="el">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Εκλογές {{ $date }}</title>
    @vite('resources/css/app.css')
    <style>
        @page { margin: 16mm; }
        body { background: white; }
        table { width: 100%; border-collapse: collapse; }
        th, td { border: 1px solid #0f172a; padding: 8px; }
        th { background: #f1f5f9; text-transform: uppercase; font-size: 11px; letter-spacing: 0.06em; }
        .ballot-title { text-align: center; font-weight: 700; font-size: 18px; }
        .ballot-sub { text-align: center; font-size: 12px; color: #475569; }
        .checkbox { width: 18px; height: 18px; border: 1px solid #0f172a; display: inline-block; }
        .controls { display: flex; justify-content: flex-end; gap: 8px; margin-bottom: 12px; }
        .btn { border: 1px solid #cbd5f5; padding: 6px 10px; border-radius: 8px; font-size: 12px; }
        @media print {
            .controls { display: none; }
            a { text-decoration: none; color: inherit; }
        }
    </style>
</head>
<body class="font-sans text-slate-900">
    <div class="max-w-4xl mx-auto">
        <div class="controls">
            <a href="/" class="btn">Αρχική</a>
            <button class="btn" onclick="window.print()">Εκτύπωση</button>
        </div>

        <div class="text-center">
            <p class="text-sm uppercase tracking-widest text-slate-500">Πολιτιστικός / Μορφωτικός Σύλλογος</p>
            <h1 class="ballot-title">ΨΗΦΟΔΕΛΤΙΟ ΕΚΛΟΓΩΝ {{ $date }}</h1>
            <p class="ballot-sub">Επιλέγουμε έως 5 άτομα για Δ.Σ. και έως 3 άτομα για εφορευτική επιτροπή.</p>
        </div>

        <div class="mt-8">
            <h2 class="text-sm font-semibold uppercase tracking-widest text-slate-600 mb-2">Υποψήφιοι Δ.Σ.</h2>
            <table>
                <thead>
                    <tr>
                        <th class="w-24 text-center">Επιλογή</th>
                        <th>Ονοματεπώνυμο</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($members as $member)
                        @if ($member->is_a_candidate)
                            <tr>
                                <td class="text-center"><span class="checkbox"></span></td>
                                <td>{{ $member->name }}</td>
                            </tr>
                        @endif
                    @endforeach
                </tbody>
            </table>
        </div>

        <div class="mt-10">
            <h2 class="text-sm font-semibold uppercase tracking-widest text-slate-600 mb-2">Υποψήφιοι Εφορευτικής</h2>
            <table>
                <thead>
                    <tr>
                        <th class="w-24 text-center">Επιλογή</th>
                        <th>Ονοματεπώνυμο</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($members as $member)
                        @if ($member->is_a_scrutineer_candidate)
                            <tr>
                                <td class="text-center"><span class="checkbox"></span></td>
                                <td>{{ $member->name }}</td>
                            </tr>
                        @endif
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

</body>
</html>
