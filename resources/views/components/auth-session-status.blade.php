@props(['status'])

@if ($status)
    <div {{ $attributes->merge(['class' => 'rounded-xl border border-emerald-100 bg-emerald-50 px-4 py-3 text-sm text-emerald-700']) }}>
        {{ $status }}
    </div>
@endif
