<button {{ $attributes->merge(['type' => 'button', 'class' => 'inline-flex items-center px-6 py-3 bg-white border-2 border-donut-brown-200 rounded-full font-bold text-xs text-[#4A3220] uppercase tracking-widest shadow-sm hover:bg-donut-brown-50 focus:outline-none focus:ring-2 focus:ring-donut-brown-300 focus:ring-offset-2 disabled:opacity-25 transition ease-in-out duration-150']) }}>
    {{ $slot }}
</button>

