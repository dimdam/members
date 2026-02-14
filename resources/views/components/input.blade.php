@props(['disabled' => false])

<input {{ $disabled ? 'disabled' : '' }} {!! $attributes->merge(['class' => 'rounded-xl border-slate-200 focus:border-slate-700 focus:ring-2 focus:ring-slate-200']) !!}>
