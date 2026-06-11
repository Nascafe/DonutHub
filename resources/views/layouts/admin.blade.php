<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Admin Portal — DonutHub</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>
        [x-cloak] { display: none !important; }
    </style>
</head>
<body class="font-body text-gray-800 bg-[#F1E8DF] antialiased min-h-screen flex">

    {{-- Flash Messages --}}
    @if(session('success'))
        <div x-data="{ show: true }" x-show="show" x-init="setTimeout(() => show = false, 4000)"
             x-transition
             class="fixed top-6 right-6 z-[9999] bg-[#8BA762] text-white px-6 py-3 rounded-xl shadow-2xl flex items-center gap-3 font-bold uppercase text-xs">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M5 13l4 4L19 7"/></svg>
            {{ session('success') }}
        </div>
    @endif

    {{-- Left Sidebar: TailAdmin style in DonutHub Brand Dark Brown --}}
    <aside class="w-72 bg-[#4A3220] text-white flex-shrink-0 flex flex-col justify-between hidden md:flex border-r border-[#6D4A35]/25">
        <div>
            {{-- DonutHub Header: logo + original brand name --}}
            <div class="h-20 bg-[#3a2312] px-8 flex items-center gap-3 border-b border-[#6D4A35]/25">
                <svg class="w-9 h-9 text-white fill-current shrink-0" viewBox="0 0 100 100">
                    <circle cx="50" cy="50" r="40" stroke="white" stroke-width="12" fill="none"/>
                    <circle cx="50" cy="50" r="14" fill="#FF4E02"/>
                    <path d="M35,30 Q45,20 50,30 T65,30" stroke="white" stroke-width="4" fill="none" stroke-linecap="round"/>
                    <circle cx="50" cy="50" r="6" fill="white"/>
                </svg>
                <div class="flex flex-col text-white font-sans tracking-tight leading-none text-left">
                    <span class="font-extrabold text-2xl uppercase tracking-tighter">Donut</span>
                    <span class="font-bold text-lg tracking-wider opacity-90 uppercase">Hub</span>
                </div>
            </div>

            {{-- Sidebar Menu Section --}}
            <div class="p-6">
                <p class="text-[10px] uppercase font-bold text-donut-brown-300 tracking-widest mb-4">Menu</p>
                <nav class="space-y-1">
                    {{-- Dashboard --}}
                    <a href="{{ route('admin.dashboard') }}" 
                       class="flex items-center justify-between px-4 py-3 rounded-lg text-sm font-semibold transition-all
                              {{ request()->routeIs('admin.dashboard') ? 'bg-[#3a2312] text-white' : 'text-donut-brown-100 hover:bg-white/5 hover:text-white' }}">
                        <div class="flex items-center gap-3">
                            <span class="text-lg">📊</span>
                            <span>Dashboard</span>
                        </div>
                        <svg class="w-4 h-4 opacity-50" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/></svg>
                    </a>

                    {{-- Orders list --}}
                    <a href="{{ route('admin.orders.index') }}" 
                       class="flex items-center justify-between px-4 py-3 rounded-lg text-sm font-semibold transition-all
                              {{ request()->routeIs('admin.orders.*') ? 'bg-[#3a2312] text-white' : 'text-donut-brown-100 hover:bg-white/5 hover:text-white' }}">
                        <div class="flex items-center gap-3">
                            <span class="text-lg">📦</span>
                            <span>Orders</span>
                        </div>
                    </a>

                    {{-- Reports --}}
                    <a href="{{ route('admin.reports.index') }}" 
                       class="flex items-center justify-between px-4 py-3 rounded-lg text-sm font-semibold transition-all
                              {{ request()->routeIs('admin.reports.*') ? 'bg-[#3a2312] text-white' : 'text-donut-brown-100 hover:bg-white/5 hover:text-white' }}">
                        <div class="flex items-center gap-3">
                            <span class="text-lg">📈</span>
                            <span>Reports</span>
                        </div>
                    </a>
                </nav>

                <p class="text-[10px] uppercase font-bold text-donut-brown-300 tracking-widest mt-8 mb-4">Support</p>
                <nav class="space-y-1">
                    {{-- Messages --}}
                    <a href="#" class="flex items-center justify-between px-4 py-3 rounded-lg text-sm font-semibold text-donut-brown-100 hover:bg-white/5 hover:text-white transition-all">
                        <div class="flex items-center gap-3">
                            <span class="text-lg">✉️</span>
                            <span>Messages</span>
                        </div>
                        <span class="bg-[#FF4E02] text-white text-[10px] font-bold px-2 py-0.5 rounded-full">5</span>
                    </a>

                    {{-- Storefront --}}
                    <a href="{{ route('home') }}" class="flex items-center gap-3 px-4 py-3 rounded-lg text-sm font-semibold text-donut-brown-100 hover:bg-white/5 hover:text-white transition-all">
                        <span class="text-lg">🏠</span>
                        <span>View Storefront</span>
                    </a>
                </nav>
            </div>
        </div>

        {{-- Log Out Footer --}}
        <div class="p-6 border-t border-[#6D4A35]/25 bg-[#3a2312]/20">
            <div class="flex items-center gap-3 mb-4">
                <div class="w-9 h-9 rounded-full bg-[#FF4E02] flex items-center justify-center text-white text-xs font-black uppercase shrink-0">
                    {{ substr(auth()->user()->name, 0, 1) }}
                </div>
                <div class="min-w-0 text-left">
                    <p class="text-xs font-black truncate leading-tight">{{ auth()->user()->name }}</p>
                    <p class="text-[10px] text-donut-brown-200 font-semibold truncate">{{ auth()->user()->role }}</p>
                </div>
            </div>
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit" class="w-full py-2.5 bg-white/5 hover:bg-red-500/20 hover:text-red-300 rounded-xl text-xs font-bold transition-all uppercase tracking-wide">
                    Log Out
                </button>
            </form>
        </div>
    </aside>

    {{-- Main Content Window --}}
    <div class="flex-1 flex flex-col min-w-0 overflow-y-auto">
        {{-- TailAdmin Header Bar --}}
        <header class="h-20 bg-white border-b border-[#E8D4C9] flex items-center justify-between px-8 shrink-0 md:sticky top-0 z-30">
            {{-- Search Bar --}}
            <div class="flex-1 max-w-lg relative">
                <span class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none text-gray-400">
                    🔍
                </span>
                <input type="text" placeholder="Type to search..." 
                       class="w-full pl-10 pr-4 py-2 border-0 bg-transparent text-sm focus:ring-0 text-[#4A3220] placeholder-gray-400">
            </div>

            {{-- Right side: Controls & User --}}
            <div class="flex items-center gap-6">
                {{-- Theme Switch / Bells --}}
                <div class="flex items-center gap-4 text-gray-500">
                    {{-- Toggle --}}
                    <div class="w-10 h-6 bg-gray-200 rounded-full p-1 cursor-pointer flex items-center justify-start">
                        <div class="w-4 h-4 bg-white rounded-full shadow-sm"></div>
                    </div>
                    
                    {{-- Notification --}}
                    <span class="relative cursor-pointer text-xl">
                        🔔
                        <span class="absolute top-0 right-0 w-2 h-2 bg-[#FF4E02] rounded-full border border-white"></span>
                    </span>
                    
                    {{-- Message --}}
                    <span class="relative cursor-pointer text-xl">
                        💬
                        <span class="absolute top-0 right-0 w-2 h-2 bg-[#FF4E02] rounded-full border border-white"></span>
                    </span>
                </div>

                <span class="h-6 w-px bg-gray-200"></span>

                {{-- User Profile Card --}}
                <div class="flex items-center gap-3">
                    <div class="text-right">
                        <p class="text-sm font-bold text-[#4A3220] leading-tight">{{ auth()->user()->name }}</p>
                        <p class="text-[10px] text-gray-400 font-semibold uppercase mt-0.5">{{ auth()->user()->role }}</p>
                    </div>
                    <div class="w-10 h-10 rounded-full bg-[#4A3220] flex items-center justify-center text-white text-sm font-bold border border-[#E8D4C9] overflow-hidden shrink-0">
                        {{ substr(auth()->user()->name, 0, 1) }}
                    </div>
                </div>
            </div>
        </header>

        {{-- Contents Slot --}}
        <main class="p-8 flex-1">
            @yield('admin-content')
        </main>
    </div>

</body>
</html>
