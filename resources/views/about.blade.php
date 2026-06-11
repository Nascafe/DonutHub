@extends('layouts.storefront')

@section('title', 'Our Sweet Story — DonutHub')

@section('content')
    {{-- Hero Section --}}
    <section class="relative py-20 bg-gradient-to-br from-cream via-donut-pink-50 to-white overflow-hidden">
        {{-- Decorative Blobs --}}
        <div class="absolute top-10 left-10 w-72 h-72 bg-donut-pink-200/20 rounded-full blur-3xl animate-pulse-slow"></div>
        <div class="absolute bottom-10 right-10 w-96 h-96 bg-gold/10 rounded-full blur-3xl"></div>

        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
            <div class="grid lg:grid-cols-2 gap-12 items-center">
                {{-- Text Content --}}
                <div class="animate-fade-in-up">
                    <span class="text-donut-pink-500 font-semibold text-sm uppercase tracking-widest">About DonutHub</span>
                    <h1 class="font-display text-4xl sm:text-5xl lg:text-6xl font-bold text-donut-brown-700 mt-3 leading-tight">
                        Spreading Joy, One <span class="text-transparent bg-clip-text bg-gradient-to-r from-donut-pink-500 to-donut-pink-700">Glazed Ring</span> at a Time.
                    </h1>
                    <p class="text-gray-600 mt-6 leading-relaxed">
                        Founded in 2024, DonutHub started with a simple, sweet dream: to reinvent the classic donut experience using artisan recipes, premium locally-sourced ingredients, and state-of-the-art baking techniques.
                    </p>
                    <p class="text-gray-600 mt-4 leading-relaxed">
                        Every single donut we serve is prepared fresh in our kitchen, shaped by hand, and coated in our signature glazes. We believe that life is short, and it deserves to be sweet!
                    </p>
                    <div class="mt-8 flex flex-wrap gap-4">
                        <a href="{{ route('menu.index') }}" class="inline-flex items-center gap-2 px-8 py-4 rounded-full bg-gradient-to-r from-donut-pink-500 to-donut-pink-600 text-white font-semibold shadow-xl shadow-donut-pink-500/30 hover:shadow-donut-pink-500/50 hover:scale-105 transition-all duration-300">
                            <span>Browse Our Flavors</span>
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"/></svg>
                        </a>
                    </div>
                </div>

                {{-- Illustrative visual element --}}
                <div class="relative flex justify-center">
                    <div class="relative w-full max-w-md bg-white rounded-3xl p-8 shadow-2xl border border-gray-100/50">
                        <span class="absolute -top-6 -left-6 text-6xl rotate-12">🍩</span>
                        <span class="absolute -bottom-6 -right-6 text-6xl -rotate-12">✨</span>
                        
                        <div class="space-y-6">
                            <div class="flex items-start gap-4">
                                <span class="text-3xl">🧑‍🍳</span>
                                <div>
                                    <h3 class="font-bold text-donut-brown-700 text-base">Expertly Crafted</h3>
                                    <p class="text-sm text-gray-500 mt-1">Made by master pastry chefs who live for the perfect dough rise.</p>
                                </div>
                            </div>
                            <div class="flex items-start gap-4">
                                <span class="text-3xl">🍓</span>
                                <div>
                                    <h3 class="font-bold text-donut-brown-700 text-base">100% Real Ingredients</h3>
                                    <p class="text-sm text-gray-500 mt-1">No artificial flavorings or preservatives. Only real chocolate, fruits, and organic flour.</p>
                                </div>
                            </div>
                            <div class="flex items-start gap-4">
                                <span class="text-3xl">☀️</span>
                                <div>
                                    <h3 class="font-bold text-donut-brown-700 text-base">Served Warm Daily</h3>
                                    <p class="text-sm text-gray-500 mt-1">Our kitchen ovens run 24/7 to guarantee warm glazed donuts every single morning.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- The Baking Promise --}}
    <section class="py-20 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-16">
                <span class="text-donut-pink-500 font-semibold text-sm uppercase tracking-widest">Our Promise</span>
                <h2 class="font-display text-4xl font-bold text-donut-brown-700 mt-3">The DonutHub Standard</h2>
                <p class="text-gray-500 mt-4 max-w-2xl mx-auto">We follow a strict set of quality guidelines to ensure that every visit to DonutHub is filled with sweet smiles.</p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                {{-- Standard 1 --}}
                <div class="bg-cream rounded-3xl p-8 border border-donut-brown-100/30 text-center hover:shadow-lg transition-all">
                    <div class="w-16 h-16 bg-white rounded-2xl flex items-center justify-center text-3xl mx-auto mb-6 shadow-sm">
                        🥣
                    </div>
                    <h3 class="text-xl font-bold text-donut-brown-700 mb-3">Secret Dough Recipe</h3>
                    <p class="text-sm text-gray-600 leading-relaxed">
                        Our special brioche dough is proofed for exactly 18 hours, creating an unbelievably soft, airy texture that melts in your mouth.
                    </p>
                </div>

                {{-- Standard 2 --}}
                <div class="bg-cream rounded-3xl p-8 border border-donut-brown-100/30 text-center hover:shadow-lg transition-all">
                    <div class="w-16 h-16 bg-white rounded-2xl flex items-center justify-center text-3xl mx-auto mb-6 shadow-sm">
                        🍫
                    </div>
                    <h3 class="text-xl font-bold text-donut-brown-700 mb-3">Double-Dipped Glazing</h3>
                    <p class="text-sm text-gray-600 leading-relaxed">
                        Why glaze once when you can double it? We double-dip all of our rings to guarantee a thick, premium finish and full flavor explosion.
                    </p>
                </div>

                {{-- Standard 3 --}}
                <div class="bg-cream rounded-3xl p-8 border border-donut-brown-100/30 text-center hover:shadow-lg transition-all">
                    <div class="w-16 h-16 bg-white rounded-2xl flex items-center justify-center text-3xl mx-auto mb-6 shadow-sm">
                        📦
                    </div>
                    <h3 class="text-xl font-bold text-donut-brown-700 mb-3">Eco-Friendly Packaging</h3>
                    <p class="text-sm text-gray-600 leading-relaxed">
                        Our signature pink boxes are made from 100% biodegradable and recyclable materials. Sweet for you, safe for the planet.
                    </p>
                </div>
            </div>
        </div>
    </section>

    {{-- Meet the Team Section --}}
    <section class="py-20 bg-cream">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-16">
                <span class="text-donut-pink-500 font-semibold text-sm uppercase tracking-widest">Our Team</span>
                <h2 class="font-display text-4xl font-bold text-donut-brown-700 mt-3">The Sweet Minds Behind the Dough</h2>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">
                {{-- Team 1 --}}
                <div class="bg-white rounded-3xl p-6 border border-gray-100 text-center hover:scale-105 transition-all duration-300">
                    <div class="w-24 h-24 rounded-full bg-gradient-to-br from-donut-pink-400 to-donut-pink-500 text-white font-extrabold text-3xl flex items-center justify-center mx-auto mb-4 shadow-md">
                        M
                    </div>
                    <h3 class="text-lg font-bold text-donut-brown-700">Marco Dela Cruz</h3>
                    <span class="text-xs font-semibold text-donut-pink-500 bg-donut-pink-50 px-3 py-1 rounded-full uppercase tracking-wider block w-max mx-auto mt-2">Founder & CEO</span>
                    <p class="text-xs text-gray-400 mt-4 italic">"I wanted to build a place where donuts aren't just snacks, but a high-fidelity art form."</p>
                </div>

                {{-- Team 2 --}}
                <div class="bg-white rounded-3xl p-6 border border-gray-100 text-center hover:scale-105 transition-all duration-300">
                    <div class="w-24 h-24 rounded-full bg-gradient-to-br from-amber-400 to-amber-500 text-white font-extrabold text-3xl flex items-center justify-center mx-auto mb-4 shadow-md">
                        S
                    </div>
                    <h3 class="text-lg font-bold text-donut-brown-700">Sofia Santos</h3>
                    <span class="text-xs font-semibold text-donut-pink-500 bg-donut-pink-50 px-3 py-1 rounded-full uppercase tracking-wider block w-max mx-auto mt-2">Master Pastry Chef</span>
                    <p class="text-xs text-gray-400 mt-4 italic">"Glazing is my meditation. Every drizzle must be exact, smooth, and utterly mouthwatering."</p>
                </div>

                {{-- Team 3 --}}
                <div class="bg-white rounded-3xl p-6 border border-gray-100 text-center hover:scale-105 transition-all duration-300">
                    <div class="w-24 h-24 rounded-full bg-gradient-to-br from-purple-400 to-purple-500 text-white font-extrabold text-3xl flex items-center justify-center mx-auto mb-4 shadow-md">
                        K
                    </div>
                    <h3 class="text-lg font-bold text-donut-brown-700">Kenji Tan</h3>
                    <span class="text-xs font-semibold text-donut-pink-500 bg-donut-pink-50 px-3 py-1 rounded-full uppercase tracking-wider block w-max mx-auto mt-2">Flavor Alchemist</span>
                    <p class="text-xs text-gray-400 mt-4 italic">"I enjoy combining local Filipino elements with global glazing trends. Ube Glaze is next!"</p>
                </div>
            </div>
        </div>
    </section>

    {{-- Store Coordinates & Hours --}}
    <section class="py-20 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="bg-gradient-to-br from-donut-brown-700 to-donut-brown-600 text-white rounded-3xl p-8 lg:p-12 shadow-2xl relative overflow-hidden">
                <div class="absolute inset-0 opacity-10">
                    <div class="absolute top-1/2 left-1/4 w-96 h-96 border border-white rounded-full"></div>
                </div>
                
                <div class="relative z-10 grid lg:grid-cols-2 gap-12 items-center">
                    <div>
                        <span class="text-donut-pink-400 font-semibold text-sm uppercase tracking-widest">Find Us</span>
                        <h2 class="font-display text-4xl font-bold mt-2">Come Visit the Hub 🍩</h2>
                        <p class="text-donut-brown-100 mt-4 leading-relaxed">
                            Watch our master bakers work live behind the glass counters, and catch the donuts straight out of the hot glazing tunnels!
                        </p>
                        
                        <div class="mt-8 space-y-6">
                            <div class="flex items-start gap-4">
                                <span class="text-2xl">📍</span>
                                <div>
                                    <h4 class="font-bold text-white">Main Flagship Store</h4>
                                    <p class="text-sm text-donut-brown-200 mt-1">IIUM Gombak, 53100 Gombak Selangor</p>
                                </div>
                            </div>
                            <div class="flex items-start gap-4">
                                <span class="text-2xl">⏰</span>
                                <div>
                                    <h4 class="font-bold text-white">Opening Hours</h4>
                                    <p class="text-sm text-donut-brown-200 mt-1">Monday - Sunday: 7:00 AM - 9:00 PM</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="bg-white/10 backdrop-blur-sm border border-white/20 rounded-3xl p-6 text-center">
                        <span class="text-5xl block mb-4">💬</span>
                        <h3 class="text-xl font-bold mb-2">Have a Question?</h3>
                        <p class="text-sm text-donut-brown-200 mb-6">Need bulk box orders for a wedding, birthday, or corporate event? Send us an email!</p>
                        <a href="mailto:hello@donuthub.com" class="inline-flex items-center gap-2 px-6 py-3 rounded-full bg-white text-donut-brown-700 font-bold text-sm shadow-md hover:scale-105 transition-all">
                            📧 Contact hello@donuthub.com
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
