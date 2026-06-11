<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="description" content="DonutHub — Freshly made, always glazed. Order premium handcrafted donuts online.">

    <title>@yield('title', 'DonutHub — Freshly Made, Always Glazed')</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;500;600;700;800&family=Poppins:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>
        html { scroll-behavior: smooth; }
        [x-cloak] { display: none !important; }
    </style>
</head>
<body class="font-body text-gray-800 bg-[#F1E8DF] antialiased">

    {{-- Flash Messages --}}
    @if(session('success'))
        <div x-data="{ show: true }" x-show="show" x-init="setTimeout(() => show = false, 4000)"
             x-transition:enter="transition ease-out duration-300"
             x-transition:enter-start="opacity-0 -translate-y-4"
             x-transition:enter-end="opacity-100 translate-y-0"
             x-transition:leave="transition ease-in duration-200"
             x-transition:leave-start="opacity-100 translate-y-0"
             x-transition:leave-end="opacity-0 -translate-y-4"
             class="fixed top-20 right-4 z-[9999] bg-green-500 text-white px-6 py-3 rounded-xl shadow-2xl flex items-center gap-3 font-medium">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
            {{ session('success') }}
        </div>
    @endif

    @if(session('error'))
        <div x-data="{ show: true }" x-show="show" x-init="setTimeout(() => show = false, 4000)"
             x-transition
             class="fixed top-20 right-4 z-[9999] bg-red-500 text-white px-6 py-3 rounded-xl shadow-2xl flex items-center gap-3 font-medium">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/></svg>
            {{ session('error') }}
        </div>
    @endif

    {{-- Navigation --}}
    <nav class="fixed top-0 left-0 right-0 z-50 bg-[#FF4E02] shadow-md transition-all duration-300" id="main-nav">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-center h-20">

                {{-- Logo --}}
                <a href="{{ route('home') }}" class="flex items-center gap-3 group" id="nav-logo">
                    <svg class="w-10 h-10 text-white fill-current shrink-0" viewBox="0 0 100 100">
                        <circle cx="50" cy="50" r="40" stroke="white" stroke-width="12" fill="none"/>
                        <circle cx="50" cy="50" r="14" fill="#FF4E02"/>
                        <path d="M35,30 Q45,20 50,30 T65,30" stroke="white" stroke-width="4" fill="none" stroke-linecap="round"/>
                        <circle cx="50" cy="50" r="6" fill="white"/>
                    </svg>
                    <div class="flex flex-col text-white font-sans tracking-tight leading-none">
                        <span class="font-extrabold text-2xl uppercase tracking-tighter">Donut</span>
                        <span class="font-bold text-lg tracking-wider opacity-90 uppercase">Hub</span>
                    </div>
                </a>

                {{-- Right-aligned Group: Links + Cart + Auth --}}
                <div class="hidden lg:flex items-center gap-8">
                    <a href="{{ route('home') }}"
                       class="text-white hover:opacity-85 font-semibold uppercase tracking-wider text-sm transition-all {{ request()->routeIs('home') ? 'underline underline-offset-8 decoration-2' : '' }}">
                        Home
                    </a>
                    <a href="{{ route('menu.index') }}"
                       class="text-white hover:opacity-85 font-semibold uppercase tracking-wider text-sm transition-all {{ request()->routeIs('menu.*') ? 'underline underline-offset-8 decoration-2' : '' }}">
                        Menu
                    </a>
                    
                    <span class="h-5 w-px bg-white/20"></span>

                    @auth
                        {{-- Cart --}}
                        <a href="{{ route('cart.index') }}" class="relative p-2 text-white hover:opacity-85 transition-all" id="nav-cart">
                            <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 100 4 2 2 0 000-4z"/>
                            </svg>
                            @if(auth()->user()->cart && auth()->user()->cart->items->count() > 0)
                                <span class="absolute -top-1 -right-1 bg-white text-[#FF4E02] text-[10px] font-bold rounded-full w-5 h-5 flex items-center justify-center border border-[#FF4E02] shadow-sm">
                                    {{ auth()->user()->cart->items->count() }}
                                </span>
                            @endif
                        </a>

                        {{-- User Dropdown --}}
                        <div x-data="{ open: false }" class="relative">
                            <button @click="open = !open" class="flex items-center gap-2 text-white hover:opacity-85 font-semibold py-2 transition-all">
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                                </svg>
                                <span>{{ Auth::user()->name }}</span>
                                <svg class="w-4 h-4 transition-transform" :class="open && 'rotate-180'" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/></svg>
                            </button>
                            <div x-show="open" @click.away="open = false"
                                 x-transition:enter="transition ease-out duration-200"
                                 x-transition:enter-start="opacity-0 scale-95"
                                 x-transition:enter-end="opacity-100 scale-100"
                                 x-transition:leave="transition ease-in duration-100"
                                 x-transition:leave-start="opacity-100 scale-100"
                                 x-transition:leave-end="opacity-0 scale-95"
                                 class="absolute right-0 mt-2 w-56 bg-white rounded-2xl shadow-xl border border-gray-100 py-2 z-50 text-gray-800" x-cloak>
                                @if(auth()->user()->isAdmin() || auth()->user()->isStaff())
                                    <a href="{{ route('admin.dashboard') }}" class="flex items-center gap-3 px-4 py-3 text-sm font-bold text-[#FF4E02] hover:bg-[#FF4E02]/10 transition-colors">
                                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2V6zM14 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V6zM4 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2v-2zM14 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z"/></svg>
                                        Admin Panel
                                    </a>
                                @endif
                                <a href="{{ route('orders.index') }}" class="flex items-center gap-3 px-4 py-3 text-sm hover:bg-donut-orange-50 transition-colors">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v10a2 2 0 002 2h8a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"/></svg>
                                    My Orders
                                </a>
                                <a href="{{ route('profile.edit') }}" class="flex items-center gap-3 px-4 py-3 text-sm hover:bg-donut-orange-50 transition-colors">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/></svg>
                                    Profile
                                </a>
                                <hr class="my-2 border-gray-100">
                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf
                                    <button type="submit" class="w-full flex items-center gap-3 px-4 py-3 text-sm text-red-500 hover:bg-red-50 transition-colors">
                                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"/></svg>
                                        Log Out
                                    </button>
                                </form>
                            </div>
                        </div>
                    @else
                        {{-- Cart icon --}}
                        <a href="{{ route('cart.index') }}" class="relative p-2 text-white hover:opacity-85 transition-all" id="nav-cart">
                            <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 100 4 2 2 0 000-4z"/>
                            </svg>
                        </a>
                        <a href="{{ route('login') }}" class="flex items-center gap-2 text-white hover:opacity-85 font-semibold py-2 transition-all" id="nav-login">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                            </svg>
                            <span>Login</span>
                        </a>
                    @endauth
                </div>

                {{-- Mobile Hamburger --}}
                <div class="lg:hidden flex items-center gap-4">
                    @auth
                        <a href="{{ route('cart.index') }}" class="relative p-2 text-white hover:opacity-85 transition-all">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 100 4 2 2 0 000-4z"/></svg>
                        </a>
                    @endauth
                    <button @click="open = !open" class="p-2 rounded-lg text-white hover:bg-white/10 transition-all" id="mobile-menu-btn">
                        <svg x-show="!open" class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/></svg>
                        <svg x-show="open" class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" x-cloak><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/></svg>
                    </button>
                </div>
            </div>
        </div>

        {{-- Mobile Menu --}}
        <div x-show="open" @click.away="open = false"
             x-transition
             class="lg:hidden bg-[#FF4E02] border-t border-white/10 shadow-xl" x-cloak>
            <div class="max-w-7xl mx-auto px-4 py-6 space-y-2">
                <a href="{{ route('home') }}" class="block px-4 py-3 rounded-xl text-base font-semibold text-white hover:bg-white/10">Home</a>
                <a href="{{ route('menu.index') }}" class="block px-4 py-3 rounded-xl text-base font-semibold text-white hover:bg-white/10">Menu</a>
                @auth
                    @if(auth()->user()->isAdmin() || auth()->user()->isStaff())
                        <a href="{{ route('admin.dashboard') }}" class="block px-4 py-3 rounded-xl text-base font-bold text-white hover:bg-white/10">Admin Panel</a>
                    @endif
                    <a href="{{ route('orders.index') }}" class="block px-4 py-3 rounded-xl text-base font-semibold text-white hover:bg-white/10">My Orders</a>
                    <a href="{{ route('profile.edit') }}" class="block px-4 py-3 rounded-xl text-base font-semibold text-white hover:bg-white/10">Profile</a>
                    <hr class="border-white/10">
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" class="w-full text-left px-4 py-3 rounded-xl text-base font-semibold text-white hover:bg-white/10">Log Out</button>
                    </form>
                @else
                    <hr class="border-white/10">
                    <a href="{{ route('login') }}" class="block px-4 py-3 rounded-xl text-base font-semibold text-white hover:bg-white/10">Login</a>
                @endauth
            </div>
        </div>
    </nav>

    {{-- Main Content --}}
    <main class="pt-20">
        @yield('content')
    </main>

    {{-- Footer --}}
    <footer class="bg-donut-brown-700 text-white mt-20">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-16">
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-12">
                {{-- Brand --}}
                <div class="lg:col-span-1">
                    <img src="{{ asset('images/donuthub-logo.png') }}" alt="DonutHub" class="h-12 w-auto mb-4 brightness-200">
                    <p class="text-donut-brown-200 text-sm leading-relaxed">Freshly made, always glazed. Handcrafted donuts made with love and the finest ingredients since 2024.</p>
                    <div class="flex gap-4 mt-6">
                        <a href="#" class="w-10 h-10 rounded-full bg-white/10 hover:bg-donut-pink-500 flex items-center justify-center transition-all" aria-label="Facebook">
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24"><path d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z"/></svg>
                        </a>
                        <a href="#" class="w-10 h-10 rounded-full bg-white/10 hover:bg-donut-pink-500 flex items-center justify-center transition-all" aria-label="Instagram">
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24"><path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zM12 0C8.741 0 8.333.014 7.053.072 2.695.272.273 2.69.073 7.052.014 8.333 0 8.741 0 12c0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98C8.333 23.986 8.741 24 12 24c3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98C15.668.014 15.259 0 12 0zm0 5.838a6.162 6.162 0 100 12.324 6.162 6.162 0 000-12.324zM12 16a4 4 0 110-8 4 4 0 010 8zm6.406-11.845a1.44 1.44 0 100 2.881 1.44 1.44 0 000-2.881z"/></svg>
                        </a>
                        <a href="#" class="w-10 h-10 rounded-full bg-white/10 hover:bg-donut-pink-500 flex items-center justify-center transition-all" aria-label="Twitter">
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24"><path d="M23.953 4.57a10 10 0 01-2.825.775 4.958 4.958 0 002.163-2.723c-.951.555-2.005.959-3.127 1.184a4.92 4.92 0 00-8.384 4.482C7.69 8.095 4.067 6.13 1.64 3.162a4.822 4.822 0 00-.666 2.475c0 1.71.87 3.213 2.188 4.096a4.904 4.904 0 01-2.228-.616v.06a4.923 4.923 0 003.946 4.827 4.996 4.996 0 01-2.212.085 4.936 4.936 0 004.604 3.417 9.867 9.867 0 01-6.102 2.105c-.39 0-.779-.023-1.17-.067a13.995 13.995 0 007.557 2.209c9.053 0 13.998-7.496 13.998-13.985 0-.21 0-.42-.015-.63A9.935 9.935 0 0024 4.59z"/></svg>
                        </a>
                    </div>
                </div>

                {{-- Quick Links --}}
                <div>
                    <h3 class="text-lg font-bold mb-6 relative pb-3 after:content-[''] after:absolute after:bottom-0 after:left-0 after:w-10 after:h-0.5 after:bg-[#FF4E02]">Quick Links</h3>
                    <ul class="space-y-3">
                        <li><a href="{{ route('home') }}" class="text-donut-brown-200 hover:text-[#FF4E02] transition-colors text-sm">Home</a></li>
                        <li><a href="{{ route('menu.index') }}" class="text-donut-brown-200 hover:text-[#FF4E02] transition-colors text-sm">Our Menu</a></li>
                    </ul>
                </div>

                {{-- Customer Service --}}
                <div>
                    <h3 class="text-lg font-bold mb-6 relative pb-3 after:content-[''] after:absolute after:bottom-0 after:left-0 after:w-10 after:h-0.5 after:bg-[#FF4E02]">Customer Service</h3>
                    <ul class="space-y-3">
                        @auth
                            <li><a href="{{ route('orders.index') }}" class="text-donut-brown-200 hover:text-[#FF4E02] transition-colors text-sm">My Orders</a></li>
                            <li><a href="{{ route('cart.index') }}" class="text-donut-brown-200 hover:text-[#FF4E02] transition-colors text-sm">My Cart</a></li>
                            <li><a href="{{ route('profile.edit') }}" class="text-donut-brown-200 hover:text-[#FF4E02] transition-colors text-sm">My Account</a></li>
                        @else
                            <li><a href="{{ route('login') }}" class="text-donut-brown-200 hover:text-[#FF4E02] transition-colors text-sm">Sign In</a></li>
                            <li><a href="{{ route('register') }}" class="text-donut-brown-200 hover:text-[#FF4E02] transition-colors text-sm">Create Account</a></li>
                        @endauth
                    </ul>
                </div>

                {{-- Contact --}}
                <div>
                    <h3 class="text-lg font-bold mb-6 relative pb-3 after:content-[''] after:absolute after:bottom-0 after:left-0 after:w-10 after:h-0.5 after:bg-donut-pink-500">Get in Touch</h3>
                    <ul class="space-y-4">
                        <li class="flex items-start gap-3">
                            <svg class="w-5 h-5 text-donut-pink-400 mt-0.5 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
                            <span class="text-donut-brown-200 text-sm">IIUM Gombak, Selangor, Malaysia</span>
                        </li>
                        <li class="flex items-start gap-3">
                            <svg class="w-5 h-5 text-donut-pink-400 mt-0.5 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/></svg>
                            <span class="text-donut-brown-200 text-sm">hello@donuthub.com</span>
                        </li>
                        <li class="flex items-start gap-3">
                            <svg class="w-5 h-5 text-donut-pink-400 mt-0.5 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/></svg>
                            <span class="text-donut-brown-200 text-sm">+601112345678</span>
                        </li>
                    </ul>
                </div>
            </div>

            {{-- Bottom Bar --}}
            <div class="border-t border-white/10 mt-12 pt-8 flex flex-col md:flex-row justify-between items-center gap-4">
                <p class="text-donut-brown-200 text-sm">&copy; {{ date('Y') }} DonutHub. All rights reserved.</p>
                <p class="text-donut-brown-300 text-xs">Freshly Made, Always Glazed 🍩</p>
            </div>
        </div>
    </footer>

</body>
</html>
