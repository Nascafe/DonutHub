<button {{ $attributes->merge(['type' => 'submit', 'class' => 'inline-flex items-center px-6 py-3 bg-[#FF4E02] border border-transparent rounded-full font-bold text-xs text-white uppercase tracking-widest hover:scale-105 active:bg-[#FF4E02]/90 focus:outline-none focus:ring-2 focus:ring-[#FF4E02] focus:ring-offset-2 transition ease-in-out duration-150 shadow-md shadow-[#FF4E02]/10']) }}>
    {{ $slot }}
</button>

