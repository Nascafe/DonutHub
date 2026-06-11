@props(['disabled' => false])

<input @disabled($disabled) {{ $attributes->merge(['class' => 'rounded-2xl border-2 border-donut-brown-200 focus:border-[#FF4E02] focus:ring-[#FF4E02] shadow-sm px-4 py-3 text-[#4A3220] bg-white/70']) }}>

