<div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0">
    <div>
        {{ $logo }}
    </div>

    <div class="w-full sm:max-w-md mt-6 px-6 py-6 bg-white shadow-xl overflow-hidden rounded-2xl border border-slate-100">
        {{ $slot }}
    </div>
</div>
