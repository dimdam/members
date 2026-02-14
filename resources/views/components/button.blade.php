<button {{ $attributes->merge(['type' => 'submit', 'class' => 'inline-flex items-center justify-center px-4 py-2.5 bg-slate-900 border border-transparent rounded-xl font-semibold text-sm text-white hover:bg-slate-800 focus:outline-none focus:ring-2 focus:ring-slate-300 disabled:opacity-50 transition']) }}>
    {{ $slot }}
</button>
