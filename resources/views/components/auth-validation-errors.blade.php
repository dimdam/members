@props(['errors'])

@if ($errors->any())
    <div {{ $attributes->merge(['class' => 'rounded-xl border border-rose-100 bg-rose-50 px-4 py-3']) }}>
        <div class="font-medium text-rose-700">
            {{ __('Whoops! Something went wrong.') }}
        </div>

        <ul class="mt-2 list-disc list-inside text-sm text-rose-700">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
