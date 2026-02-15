<!DOCTYPE html>
<html lang="el">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Εκλογές {{ $date }}</title>
    @vite('resources/css/app.css')
    <style>
        @page { size: A4; margin: 10mm; }
        html, body { background: white; margin: 0; padding: 0; }
        .print-page {
            width: calc(210mm - 20mm);
            height: calc(297mm - 20mm);
            margin: 0 auto;
            padding: 0;
            box-sizing: border-box;
            page-break-after: avoid;
            page-break-inside: avoid;
        }
        .print-content {
            transform-origin: top center;
            font-size: var(--ballot-font, 12px);
            line-height: var(--ballot-line, 1.35);
        }
        table { width: 100%; border-collapse: separate; border-spacing: 0; border: 1px solid #0f172a; }
        th, td { border-bottom: 1px solid #0f172a; border-right: 1px solid #0f172a; padding: var(--ballot-pad, 8px); }
        th:first-child, td:first-child { border-left: 1px solid #0f172a; }
        tr:last-child td { border-bottom: 0; }
        th { background: #f1f5f9; text-transform: uppercase; font-size: var(--ballot-head, 11px); letter-spacing: 0.06em; }
        .ballot-title { text-align: center; font-weight: 700; font-size: 18px; }
        .ballot-sub { text-align: center; font-size: 12px; color: #475569; }
        .checkbox { width: 16px; height: 16px; border: 1px solid #0f172a; display: inline-block; }
        .controls { display: flex; justify-content: flex-end; gap: 8px; margin-bottom: 12px; }
        .btn { border: 1px solid #cbd5f5; padding: 6px 10px; border-radius: 8px; font-size: 12px; }
        table, tr, td, th, .ballot-section { break-inside: avoid; page-break-inside: avoid; }
        @media print {
            .no-print { display: none !important; height: 0 !important; margin: 0 !important; padding: 0 !important; }
            a { text-decoration: none; color: inherit; }
            html, body { width: 210mm; height: 297mm; overflow: hidden; }
        }
    </style>
</head>
<body class="font-sans text-slate-900">
    <div class="max-w-4xl mx-auto no-print">
        <div class="controls">
            <form method="POST" action="{{ route('elections.reset') }}">
                @csrf
                <button type="submit" class="btn">Αρχική</button>
            </form>
            <button class="btn" onclick="window.print()">Εκτύπωση</button>
        </div>
    </div>

    <div id="ballot-page" class="print-page">
        <div id="ballot-content" class="print-content">
            <div class="text-center">
                <p class="text-sm uppercase tracking-widest text-slate-500">Πολιτιστικός / Μορφωτικός Σύλλογος</p>
                <h1 class="ballot-title">ΨΗΦΟΔΕΛΤΙΟ ΕΚΛΟΓΩΝ {{ $date }}</h1>
                <p class="ballot-sub">Επιλέγουμε έως 5 άτομα για Δ.Σ. και έως 3 άτομα για εφορευτική επιτροπή.</p>
            </div>

            <div class="mt-8 ballot-section">
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

            <div class="mt-10 ballot-section">
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
    </div>

    <script>
        function fitBallotToPage() {
            const page = document.getElementById('ballot-page');
            const content = document.getElementById('ballot-content');
            if (!page || !content) return;

            content.style.transform = 'none';
            content.style.width = '100%';

            const pageHeight = page.clientHeight;
            const contentHeight = content.scrollHeight;

            let fontSize = 14;
            let lineHeight = 1.45;
            const minFont = 9.5;
            const basePad = 10;
            const baseHead = 12;

            content.style.setProperty('--ballot-font', fontSize + 'px');
            content.style.setProperty('--ballot-line', lineHeight);
            content.style.setProperty('--ballot-pad', basePad + 'px');
            content.style.setProperty('--ballot-head', baseHead + 'px');

            let guard = 0;
            while (content.scrollHeight > pageHeight && fontSize > minFont && guard < 40) {
                fontSize -= 0.5;
                lineHeight = Math.max(1.15, lineHeight - 0.02);
                const ratio = fontSize / 12;
                content.style.setProperty('--ballot-font', fontSize + 'px');
                content.style.setProperty('--ballot-line', lineHeight);
                content.style.setProperty('--ballot-pad', Math.max(4, Math.round(basePad * ratio)) + 'px');
                content.style.setProperty('--ballot-head', Math.max(9, Math.round(baseHead * ratio)) + 'px');
                guard++;
            }
        }

        window.addEventListener('load', () => setTimeout(fitBallotToPage, 100));
        window.addEventListener('resize', fitBallotToPage);
        window.addEventListener('beforeprint', fitBallotToPage);
    </script>

</body>
</html>
