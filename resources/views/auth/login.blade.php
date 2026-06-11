@extends('layouts.storefront')

@section('title', 'Login — DonutHub')

@section('content')
    <div class="relative min-h-[85vh] flex items-center justify-center bg-[#4A3220] py-16 px-4 sm:px-6 lg:px-8">
        {{-- Checkerboard and Wavy Overlay Background --}}
        <div class="absolute inset-0 opacity-20 pointer-events-none overflow-hidden">
            <svg class="w-full h-full text-white" viewBox="0 0 100 100" preserveAspectRatio="none" fill="currentColor">
                <path d="M0,0 L20,0 C10,20 30,30 20,50 C10,70 30,80 20,100 L0,100 Z" opacity="0.3"/>
                <path d="M40,0 L60,0 C50,20 70,30 60,50 C50,70 70,80 60,100 L40,100 Z" opacity="0.3"/>
                <path d="M80,0 L100,0 C90,20 110,30 100,50 C90,70 110,80 100,100 L80,100 Z" opacity="0.3"/>
                
                <path d="M0,20 L100,20 C80,30 70,10 50,20 C30,30 20,10 0,20 Z" opacity="0.2"/>
                <path d="M0,60 L100,60 C80,70 70,50 50,60 C30,70 20,50 0,60 Z" opacity="0.2"/>
            </svg>
        </div>

        <div class="bg-white rounded-[2.5rem] shadow-2xl p-8 sm:p-12 w-full max-w-md border border-[#E8D4C9] relative z-10 text-center animate-fade-in-up">
            {{-- Circular Avatar --}}
            <div class="w-20 h-20 rounded-full border-2 border-[#4A3220] flex items-center justify-center mx-auto mb-6 bg-white shrink-0">
                <svg class="w-10 h-10 text-[#4A3220]" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="1.5">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 6a3.75 3.75 0 1 1-7.5 0 3.75 3.75 0 0 1 7.5 0zM4.501 20.118a7.5 7.5 0 0 1 14.998 0A17.933 17.933 0 0 1 12 21.75c-2.676 0-5.216-.584-7.499-1.632z" />
                </svg>
            </div>

            {{-- Title & Subtitle --}}
            <h2 class="text-2xl font-black text-[#4A3220] mb-1 uppercase tracking-tight">Welcome Back</h2>
            <p class="text-xs text-gray-500 mb-8 font-bold uppercase tracking-wide">Log in to continue your donut journey</p>

            <!-- Session Status -->
            <x-auth-session-status class="mb-4 text-left" :status="session('status')" />

            <form method="POST" action="{{ route('login') }}" class="space-y-4">
                @csrf

                {{-- Email Field (placeholder Username) --}}
                <div class="relative text-left">
                    <input id="email" type="email" name="email" placeholder="Username" value="{{ old('email') }}" required autofocus autocomplete="username"
                           class="w-full px-6 py-3.5 rounded-full border-2 border-gray-400 text-sm focus:border-[#4A3220] focus:ring-[#4A3220] text-[#4A3220] font-bold placeholder-gray-500 bg-transparent">
                    @error('email')
                        <p class="text-xs text-red-500 mt-1 pl-4">{{ $message }}</p>
                    @enderror
                </div>

                {{-- Password Field --}}
                <div class="relative text-left">
                    <input id="password" type="password" name="password" placeholder="Password" required autocomplete="current-password"
                           class="w-full px-6 py-3.5 rounded-full border-2 border-gray-400 text-sm focus:border-[#4A3220] focus:ring-[#4A3220] text-[#4A3220] font-bold placeholder-gray-500 bg-transparent">
                    @error('password')
                        <p class="text-xs text-red-500 mt-1 pl-4">{{ $message }}</p>
                    @enderror
                </div>

                {{-- Forgot Password --}}
                <div class="text-center mt-3">
                    @if (Route::has('password.request'))
                        <a class="text-xs text-gray-400 hover:text-[#4A3220] transition-colors font-bold uppercase" href="{{ route('password.request') }}">
                            Forgot Password?
                        </a>
                    @endif
                </div>

                {{-- Submit Button --}}
                <div class="flex justify-center mt-8">
                    <button type="submit" class="px-12 py-3 bg-[#4A3220] hover:bg-[#3d2314] text-white font-black rounded-full hover:scale-105 transition-all text-sm uppercase tracking-wide shadow-md">
                        Login
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection
