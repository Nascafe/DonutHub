@extends('layouts.storefront')

@section('title', 'Our Menu — DonutHub')

@section('content')
    <div class="bg-[#F1E8DF] min-h-screen py-8">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 space-y-12">
            
            {{-- Green Taste Green Banner --}}
            <div class="bg-[#8BA762] rounded-3xl p-8 lg:p-12 shadow-md relative overflow-hidden flex flex-col md:flex-row items-center justify-between gap-8">
                {{-- Decorative leaves/pistachio drawings --}}
                <div class="absolute inset-0 opacity-15 pointer-events-none">
                    <svg class="w-full h-full text-white" viewBox="0 0 100 100" fill="none" stroke="currentColor" stroke-width="1">
                        <circle cx="10" cy="10" r="5" />
                        <path d="M10,10 Q20,5 30,10 T50,10" />
                        <circle cx="80" cy="20" r="8" />
                        <path d="M70,80 Q80,75 90,80" />
                    </svg>
                </div>
                
                <div class="space-y-4 text-left relative z-10">
                    <h1 class="font-sans text-5xl lg:text-6xl font-black text-[#1F330C] leading-none uppercase">
                        Taste<br>Green
                    </h1>
                    <p class="text-white text-base lg:text-lg font-bold tracking-wider uppercase opacity-90">
                        The all new limited pistachio donuts
                    </p>
                    <div class="pt-2">
                        <a href="#menu-grid" class="inline-block px-8 py-3 bg-[#1F330C] text-white font-bold rounded-full hover:scale-105 transition-all text-sm uppercase">
                            Order Now
                        </a>
                    </div>
                </div>

                {{-- Banner image --}}
                <div class="relative w-64 h-64 shrink-0 flex items-center justify-center">
                    <div class="absolute w-52 h-52 bg-[#9CBD73] rounded-full"></div>
                    <img src="{{ asset('images/donuts/pisstaco.png') }}" alt="Pisstaco Donut" class="w-56 h-56 object-cover relative z-10 transition-transform duration-300 hover:scale-110">
                </div>
            </div>

            {{-- Categories --}}
            <div class="flex items-center gap-2 overflow-x-auto py-2 scrollbar-hide">
                <a href="{{ route('menu.index') }}"
                   class="shrink-0 px-6 py-2 rounded-full text-xs font-bold uppercase transition-all {{ !$selectedCategory ? 'bg-[#FF4E02] text-white' : 'bg-white text-[#4A3220] border border-[#E8D4C9] hover:bg-[#FF4E02]/10' }}">
                    All Donuts
                </a>
                @foreach($categories as $category)
                    <a href="{{ route('menu.category', $category) }}"
                       class="shrink-0 px-6 py-2 rounded-full text-xs font-bold uppercase transition-all {{ $selectedCategory && $selectedCategory->id === $category->id ? 'bg-[#FF4E02] text-white' : 'bg-white text-[#4A3220] border border-[#E8D4C9] hover:bg-[#FF4E02]/10' }}">
                        {{ $category->name }}
                    </a>
                @endforeach
            </div>

            {{-- Donuts Grid (5 columns on desktop) --}}
            <div id="menu-grid" class="space-y-6">
                @if($donuts->count() > 0)
                    <div class="grid grid-cols-2 md:grid-cols-5 gap-6">
                        @foreach($donuts as $donut)
                            <div class="bg-white rounded-3xl p-5 border border-[#E8D4C9] shadow-sm hover:shadow-md transition-all duration-300 flex flex-col justify-between" id="donut-card-{{ $donut->slug }}">
                                <div class="relative">
                                    {{-- Banner Tags --}}
                                    @if($donut->is_limited)
                                        @php
                                            $tagColor = match($donut->slug) {
                                                'pisstaco' => 'bg-[#8BA762]',
                                                'chocked' => 'bg-[#4A3220]',
                                                default => 'bg-purple-600'
                                            };
                                        @endphp
                                        <span class="absolute top-0 right-0 {{ $tagColor }} text-white text-[9px] font-bold px-2 py-0.5 rounded-full uppercase tracking-wider">Limited!</span>
                                    @endif

                                    <a href="{{ route('menu.show', $donut) }}" class="block p-2">
                                        <img src="{{ asset($donut->image) }}" alt="{{ $donut->name }}" class="w-32 h-32 object-cover mx-auto transition-transform duration-300 hover:scale-105">
                                    </a>
                                </div>

                                <div class="space-y-3 mt-4 text-center">
                                    <h3 class="font-black text-sm text-[#FF4E02] uppercase tracking-wide min-h-[40px] flex items-center justify-center leading-tight">
                                        <a href="{{ route('menu.show', $donut) }}">{{ $donut->name }}</a>
                                    </h3>
                                    <p class="font-extrabold text-sm text-[#4A3220]">
                                        RM {{ number_format($donut->price, 2) }}
                                    </p>
                                    <div>
                                        @auth
                                            <form action="{{ route('cart.add', $donut) }}" method="POST">
                                                @csrf
                                                <input type="hidden" name="quantity" value="1">
                                                <button type="submit" class="w-full py-2 bg-[#FF4E02] text-white text-xs font-bold rounded-full hover:scale-105 hover:bg-[#E03D00] transition-all uppercase tracking-wide">
                                                    Add to cart
                                                </button>
                                            </form>
                                        @else
                                            <a href="{{ route('login') }}" class="block w-full py-2 bg-[#FF4E02] text-white text-xs font-bold rounded-full hover:scale-105 hover:bg-[#E03D00] transition-all uppercase tracking-wide text-center">
                                                Add to cart
                                            </a>
                                        @endauth
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                @else
                    <div class="bg-white rounded-3xl p-12 text-center border border-[#E8D4C9]">
                        <span class="text-5xl block mb-4">🍩</span>
                        <h3 class="text-xl font-bold text-[#4A3220]">No donuts found</h3>
                        <p class="text-gray-400 mt-2">Check back soon for new flavor creations!</p>
                    </div>
                @endif
            </div>

            {{-- BOX SETS Footer Card Container --}}
            <div class="space-y-6 pt-12">
                <div class="text-center">
                    <h2 class="font-black text-4xl text-[#FF4E02] tracking-tighter uppercase">
                        Box Sets
                    </h2>
                </div>

                {{-- Dark brown container containing 3 customize cards --}}
                <div class="bg-[#4A3220] rounded-3xl p-6 md:p-8 shadow-xl">
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                        {{-- Card 1: Part of Three --}}
                        <div class="bg-[#FAF4EE] rounded-3xl p-5 border border-[#6D4A35] flex flex-col justify-between items-center text-center space-y-4">
                            <h3 class="font-black text-lg text-[#FF4E02] uppercase tracking-wide">Part of Three</h3>
                            <div class="w-36 h-28 bg-[#8BA762] rounded-2xl flex items-center justify-center p-2 relative overflow-hidden">
                                <div class="absolute w-20 h-20 bg-[#9CBD73] rounded-full -left-2 -bottom-2"></div>
                                <img src="{{ asset('images/donuts/sugar-coat.png') }}" class="w-16 h-16 object-cover relative z-10 -mr-4">
                                <img src="{{ asset('images/donuts/prinkles.png') }}" class="w-16 h-16 object-cover relative z-10 rotate-12">
                            </div>
                            <a href="{{ route('menu.index') }}" class="px-8 py-2 bg-[#FF4E02] text-white text-xs font-bold rounded-full hover:scale-105 transition-all uppercase tracking-wide">
                                Customize
                            </a>
                        </div>

                        {{-- Card 2: Half Dozen --}}
                        <div class="bg-[#FAF4EE] rounded-3xl p-5 border border-[#6D4A35] flex flex-col justify-between items-center text-center space-y-4">
                            <h3 class="font-black text-lg text-[#FF4E02] uppercase tracking-wide">Half Dozen</h3>
                            <div class="w-36 h-28 bg-[#FF4E02] rounded-2xl flex items-center justify-center p-2 relative overflow-hidden">
                                <div class="absolute w-20 h-20 bg-[#FF7D45] rounded-full -right-2 -bottom-2"></div>
                                <img src="{{ asset('images/donuts/melted-mellow.png') }}" class="w-16 h-16 object-cover relative z-10">
                                <img src="{{ asset('images/donuts/pisstaco.png') }}" class="w-16 h-16 object-cover relative z-10 rotate-12 -ml-4">
                            </div>
                            <a href="{{ route('menu.index') }}" class="px-8 py-2 bg-[#FF4E02] text-white text-xs font-bold rounded-full hover:scale-105 transition-all uppercase tracking-wide">
                                Customize
                            </a>
                        </div>

                        {{-- Card 3: Dozen --}}
                        <div class="bg-[#FAF4EE] rounded-3xl p-5 border border-[#6D4A35] flex flex-col justify-between items-center text-center space-y-4">
                            <h3 class="font-black text-lg text-[#FF4E02] uppercase tracking-wide">Dozen</h3>
                            <div class="w-36 h-28 bg-white rounded-2xl overflow-hidden border border-[#E8D4C9]">
                                <img src="{{ asset('images/hero-donuts.png') }}" class="w-full h-full object-cover">
                            </div>
                            <a href="{{ route('menu.index') }}" class="px-8 py-2 bg-[#FF4E02] text-white text-xs font-bold rounded-full hover:scale-105 transition-all uppercase tracking-wide">
                                Customize
                            </a>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection
