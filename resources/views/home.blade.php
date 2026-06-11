@extends('layouts.storefront')

@section('title', 'DonutHub — Freshly Made, Always Glazed')

@section('content')

    {{-- Hero Section --}}
    <section class="relative min-h-[75vh] flex items-center bg-[#4A3220] overflow-hidden py-16" id="hero-section">
        {{-- Wavy/ring patterns --}}
        <div class="absolute inset-0 opacity-20 pointer-events-none">
            <svg class="w-full h-full text-white" viewBox="0 0 1000 1000" fill="none" stroke="currentColor" stroke-width="2">
                <circle cx="900" cy="500" r="100"/>
                <circle cx="900" cy="500" r="200"/>
                <circle cx="900" cy="500" r="300"/>
                <circle cx="900" cy="500" r="400"/>
                <circle cx="900" cy="500" r="500"/>
                <circle cx="900" cy="500" r="600"/>
                
                <circle cx="100" cy="200" r="100"/>
                <circle cx="100" cy="200" r="200"/>
                <circle cx="100" cy="200" r="300"/>
            </svg>
        </div>

        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10 w-full">
            <div class="grid lg:grid-cols-12 gap-12 items-center">
                {{-- Text column (7 cols) --}}
                <div class="lg:col-span-7 space-y-6 text-left">
                    <div class="flex items-center gap-3">
                        <span class="font-sans text-5xl sm:text-7xl font-bold text-white tracking-tight leading-none">
                            “Get
                        </span>
                        <span class="px-4 py-1.5 rounded-full bg-[#FF4E02] text-white text-xs sm:text-sm font-bold uppercase tracking-wide">
                            New!
                        </span>
                    </div>
                    <h1 class="font-sans text-5xl sm:text-7xl font-bold text-white tracking-tight leading-none">
                        Chocked!”
                    </h1>
                    <p class="text-lg sm:text-xl text-[#F5ECE7] max-w-lg leading-relaxed">
                        Get it? Chocked? choc-ked? choked?- Nevermind..
                    </p>
                    <div class="pt-4">
                        <a href="{{ route('menu.index') }}" class="inline-flex items-center justify-center px-10 py-4 rounded-full bg-[#FF4E02] text-white font-bold text-lg hover:scale-105 transition-all shadow-lg shadow-[#FF4E02]/25" id="hero-cta">
                            Order Now
                        </a>
                    </div>
                </div>

                {{-- Image column (5 cols) --}}
                <div class="lg:col-span-5 flex justify-center relative">
                    {{-- Wavy circular pattern container for donut --}}
                    <div class="relative w-80 h-80 sm:w-96 sm:h-96 rounded-full flex items-center justify-center overflow-hidden">
                        {{-- Concentric wavy circle background in brown shades --}}
                        <div class="absolute inset-0 bg-gradient-to-tr from-[#3a2312] via-[#4A3220] to-[#6d4a35] opacity-90"></div>
                        <div class="absolute w-[80%] h-[80%] rounded-full border-4 border-[#6d4a35] opacity-50 animate-pulse"></div>
                        <div class="absolute w-[60%] h-[60%] rounded-full border-4 border-[#6d4a35] opacity-50"></div>
                        
                        <img src="{{ asset('images/donuts/chocked.png') }}" alt="Chocked Donut"
                             class="w-64 h-64 sm:w-80 sm:h-80 object-cover z-10 transition-transform duration-500 hover:scale-110 hover:rotate-6">
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- Explore Our Doughnuts Section --}}
    <section class="py-16 bg-[#F1E8DF]">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex items-center gap-6 mb-12">
                {{-- Cute orange winking mascot face icon --}}
                <svg class="w-16 h-16 text-[#FF4E02] shrink-0" viewBox="0 0 100 100" fill="currentColor">
                    <!-- Head shape (semi rounded/winking cut) -->
                    <path d="M10,50 A40,40 0 1,0 90,50 A40,40 0 0,0 10,50" fill="#FF4E02"/>
                    <!-- Smile/mouth sticking out tongue -->
                    <path d="M40,65 Q50,75 60,65" stroke="white" stroke-width="4" fill="none" stroke-linecap="round"/>
                    <path d="M52,69 Q55,78 58,69" fill="white"/>
                    <!-- Eye 1 (wink) -->
                    <path d="M25,45 Q35,35 40,45" stroke="white" stroke-width="4" fill="none" stroke-linecap="round"/>
                    <!-- Eye 2 (circle) -->
                    <circle cx="65" cy="42" r="5" fill="white"/>
                </svg>
                
                <h2 class="font-sans text-3xl sm:text-4xl font-extrabold text-[#4A3220] tracking-tight">
                    Explore Our <span class="text-[#FF4E02]">Doughnuts!</span>
                </h2>
            </div>

            {{-- 4 column donut row matching prototype layout --}}
            <div class="grid grid-cols-2 md:grid-cols-4 gap-6">
                {{-- Sugar Coat --}}
                <a href="{{ route('menu.index') }}" class="group bg-[#FAF4EE] rounded-3xl p-6 shadow-sm border border-[#E8D4C9] hover:shadow-lg transition-all duration-300 text-center">
                    <div class="aspect-square flex items-center justify-center p-4 bg-white/50 rounded-2xl mb-4 overflow-hidden">
                        <img src="{{ asset('images/donuts/sugar-coat.png') }}" alt="Sugar-Coat Donut" class="w-32 h-32 object-cover group-hover:scale-115 transition-transform duration-300">
                    </div>
                    <h3 class="font-black text-lg text-[#FF4E02] uppercase tracking-wider">Sugar-Coat</h3>
                </a>

                {{-- Melted Mellow --}}
                <a href="{{ route('menu.index') }}" class="group bg-[#FAF4EE] rounded-3xl p-6 shadow-sm border border-[#E8D4C9] hover:shadow-lg transition-all duration-300 text-center">
                    <div class="aspect-square flex items-center justify-center p-4 bg-white/50 rounded-2xl mb-4 overflow-hidden">
                        <img src="{{ asset('images/donuts/melted-mellow.png') }}" alt="Melted Mellow Donut" class="w-32 h-32 object-cover group-hover:scale-115 transition-transform duration-300">
                    </div>
                    <h3 class="font-black text-lg text-[#FF4E02] uppercase tracking-wider">Melted Mellow</h3>
                </a>

                {{-- Fortnut (Prinkles) --}}
                <a href="{{ route('menu.index') }}" class="group bg-[#FAF4EE] rounded-3xl p-6 shadow-sm border border-[#E8D4C9] hover:shadow-lg transition-all duration-300 text-center relative">
                    <span class="absolute top-3 right-3 bg-purple-600 text-white text-[9px] font-bold px-2 py-0.5 rounded-full uppercase tracking-wider">Limited!</span>
                    <div class="aspect-square flex items-center justify-center p-4 bg-white/50 rounded-2xl mb-4 overflow-hidden">
                        <img src="{{ asset('images/donuts/prinkles.png') }}" alt="Fortnut Donut" class="w-32 h-32 object-cover group-hover:scale-115 transition-transform duration-300">
                    </div>
                    <h3 class="font-black text-lg text-[#FF4E02] uppercase tracking-wider">Fortnut</h3>
                </a>

                {{-- Pisstaco --}}
                <a href="{{ route('menu.index') }}" class="group bg-[#FAF4EE] rounded-3xl p-6 shadow-sm border border-[#E8D4C9] hover:shadow-lg transition-all duration-300 text-center">
                    <div class="aspect-square flex items-center justify-center p-4 bg-white/50 rounded-2xl mb-4 overflow-hidden">
                        <img src="{{ asset('images/donuts/pisstaco.png') }}" alt="Pisstaco Donut" class="w-32 h-32 object-cover group-hover:scale-115 transition-transform duration-300">
                    </div>
                    <h3 class="font-black text-lg text-[#FF4E02] uppercase tracking-wider">Pisstaco</h3>
                </a>
            </div>
        </div>
    </section>

    {{-- Sub-banner image --}}
    <section class="h-44 bg-cover bg-center" style="background-image: url('{{ asset('images/hero-donuts.png') }}')">
        <div class="w-full h-full bg-gradient-to-r from-[#FF4E02]/30 to-[#4A3220]/50 backdrop-brightness-75"></div>
    </section>

    {{-- Box Sets Section --}}
    <section class="py-16 bg-[#F1E8DF]">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-12">
                <h2 class="font-black text-5xl sm:text-6xl text-[#FF4E02] tracking-tighter uppercase leading-none">
                    Box<br>Sets
                </h2>
            </div>

            <div class="space-y-8 max-w-4xl mx-auto">
                {{-- Party of Three --}}
                <div class="bg-[#FAF4EE] rounded-3xl overflow-hidden border border-[#E8D4C9] shadow-sm flex flex-col md:flex-row items-center justify-between p-6 gap-6">
                    <div class="flex-1 space-y-4 text-left">
                        <h3 class="text-2xl font-black text-[#4A3220] uppercase tracking-wide">Party of Three</h3>
                        <p class="text-sm text-[#8B644D] leading-relaxed">
                            A sweet little party in every box. Choose any 3 freshly made donuts with your favorite flavors, glazes, and toppings. Perfect for sharing, gifting, or enjoying your own mini donut celebration.
                        </p>
                        <div>
                            <a href="{{ route('menu.index') }}" class="inline-block px-8 py-3 bg-[#FF4E02] text-white font-bold rounded-full hover:scale-105 transition-all text-sm uppercase">
                                Order Now
                            </a>
                        </div>
                    </div>
                    
                    {{-- Graphic placeholder --}}
                    <div class="w-56 h-36 bg-[#708A49] rounded-2xl flex items-center justify-center p-4 relative overflow-hidden shrink-0">
                        <div class="absolute w-28 h-28 bg-[#8BA762] rounded-full -left-4 -bottom-4"></div>
                        <img src="{{ asset('images/donuts/sugar-coat.png') }}" class="w-24 h-24 object-cover relative z-10 -mr-6">
                        <img src="{{ asset('images/donuts/pisstaco.png') }}" class="w-20 h-20 object-cover relative z-10 rotate-12 -mt-4">
                    </div>
                </div>

                {{-- Half-Dozen Box --}}
                <div class="bg-[#FAF4EE] rounded-3xl overflow-hidden border border-[#E8D4C9] shadow-sm flex flex-col md:flex-row items-center justify-between p-6 gap-6">
                    <div class="flex-1 space-y-4 text-left md:order-2">
                        <h3 class="text-2xl font-black text-[#4A3220] uppercase tracking-wide">Half-Dozen Box</h3>
                        <p class="text-sm text-[#8B644D] leading-relaxed">
                            Pick any 6 delicious donuts and create your own flavor combination. Perfect for small cravings, gifting, or sharing a sweet moment with someone special.
                        </p>
                        <div>
                            <a href="{{ route('menu.index') }}" class="inline-block px-8 py-3 bg-[#FF4E02] text-white font-bold rounded-full hover:scale-105 transition-all text-sm uppercase">
                                Order Now
                            </a>
                        </div>
                    </div>
                    
                    {{-- Graphic placeholder --}}
                    <div class="w-56 h-36 bg-[#FF4E02] rounded-2xl flex items-center justify-center p-4 relative overflow-hidden shrink-0 md:order-1">
                        <div class="absolute w-28 h-28 bg-[#FF7D45] rounded-full -right-4 -bottom-4"></div>
                        <img src="{{ asset('images/donuts/melted-mellow.png') }}" class="w-20 h-20 object-cover relative z-10 -mr-4">
                        <img src="{{ asset('images/donuts/sugar-coat.png') }}" class="w-20 h-20 object-cover relative z-10 rotate-45 -ml-4">
                        <img src="{{ asset('images/donuts/prinkles.png') }}" class="w-22 h-22 object-cover relative z-10">
                    </div>
                </div>

                {{-- The Dozen Box --}}
                <div class="bg-[#FAF4EE] rounded-3xl overflow-hidden border border-[#E8D4C9] shadow-sm flex flex-col md:flex-row items-center justify-between p-6 gap-6">
                    <div class="flex-1 space-y-4 text-left">
                        <h3 class="text-2xl font-black text-[#4A3220] uppercase tracking-wide">The Dozen Box</h3>
                        <p class="text-sm text-[#8B644D] leading-relaxed">
                            Enjoy 12 freshly made donuts customized with your favorite flavors, glazes, and toppings. Perfect for family, friends, parties, or sweet celebrations.
                        </p>
                        <div>
                            <a href="{{ route('menu.index') }}" class="inline-block px-8 py-3 bg-[#FF4E02] text-white font-bold rounded-full hover:scale-105 transition-all text-sm uppercase">
                                Order Now
                            </a>
                        </div>
                    </div>
                    
                    {{-- Graphic placeholder --}}
                    <div class="w-56 h-36 bg-[#FAF4EE] rounded-2xl overflow-hidden border border-[#E8D4C9] flex items-center justify-center p-2 shrink-0 bg-white">
                        <img src="{{ asset('images/hero-donuts.png') }}" class="w-full h-full object-cover rounded-xl">
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection
