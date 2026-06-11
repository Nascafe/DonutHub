@extends('layouts.storefront')

@section('title', $donut->name . ' — DonutHub')

@section('content')

    {{-- Breadcrumb --}}
    <section class="bg-cream pt-6 pb-0">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <nav class="flex items-center gap-2 text-sm text-gray-500">
                <a href="{{ route('home') }}" class="hover:text-donut-pink-500 transition-colors">Home</a>
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg>
                <a href="{{ route('menu.index') }}" class="hover:text-donut-pink-500 transition-colors">Menu</a>
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg>
                <span class="text-donut-brown-700 font-medium">{{ $donut->name }}</span>
            </nav>
        </div>
    </section>

    {{-- Product Detail --}}
    <section class="bg-cream py-12">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid lg:grid-cols-2 gap-12 items-start">
                {{-- Image --}}
                <div class="bg-gradient-to-br from-white to-donut-pink-50 rounded-3xl p-12 flex items-center justify-center shadow-sm">
                    <img src="{{ asset($donut->image) }}" alt="{{ $donut->name }}"
                         class="w-80 h-80 object-cover rounded-full animate-float" id="donut-detail-image">
                </div>

                {{-- Details --}}
                <div class="animate-fade-in-up">
                    <div class="flex items-center gap-3 mb-4">
                        <span class="text-sm font-semibold text-donut-pink-500 bg-donut-pink-50 px-3 py-1.5 rounded-full">{{ $donut->category->name ?? 'Donut' }}</span>
                        @if($donut->is_limited)
                            <span class="text-sm font-semibold text-amber-600 bg-amber-50 px-3 py-1.5 rounded-full">🔥 Limited Edition</span>
                        @endif
                        @if($donut->is_featured)
                            <span class="text-sm font-semibold text-emerald-600 bg-emerald-50 px-3 py-1.5 rounded-full">⭐ Featured</span>
                        @endif
                    </div>

                    <h1 class="font-display text-4xl sm:text-5xl font-bold text-donut-brown-700" id="donut-detail-name">{{ $donut->name }}</h1>

                    <div class="flex items-center gap-4 mt-4">
                        <span class="text-4xl font-bold text-donut-pink-600">RM {{ number_format($donut->price, 2) }}</span>
                    </div>

                    <p class="text-gray-600 leading-relaxed mt-6 text-lg">{{ $donut->description }}</p>

                    {{-- Stock Status --}}
                    <div class="mt-6 flex items-center gap-2">
                        @if($donut->stock > 10)
                            <span class="w-3 h-3 rounded-full bg-green-500"></span>
                            <span class="text-sm font-medium text-green-600">In Stock ({{ $donut->stock }} available)</span>
                        @elseif($donut->stock > 0)
                            <span class="w-3 h-3 rounded-full bg-amber-500 animate-pulse"></span>
                            <span class="text-sm font-medium text-amber-600">Low Stock — Only {{ $donut->stock }} left!</span>
                        @else
                            <span class="w-3 h-3 rounded-full bg-red-500"></span>
                            <span class="text-sm font-medium text-red-600">Out of Stock</span>
                        @endif
                    </div>

                    {{-- Add to Cart --}}
                    @auth
                        @if($donut->stock > 0)
                            <form action="{{ route('cart.add', $donut) }}" method="POST" class="mt-8" id="add-to-cart-form">
                                @csrf
                                <div class="flex items-center gap-4">
                                    <div x-data="{ qty: 1 }" class="flex items-center gap-0 bg-gray-100 rounded-full">
                                        <button type="button" @click="qty = Math.max(1, qty - 1)" class="w-12 h-12 rounded-full flex items-center justify-center text-gray-600 hover:bg-gray-200 transition-colors">
                                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 12H4"/></svg>
                                        </button>
                                        <input type="number" name="quantity" x-model="qty" min="1" max="{{ $donut->stock }}" class="w-16 text-center bg-transparent border-0 text-lg font-bold text-donut-brown-700 focus:ring-0" readonly>
                                        <button type="button" @click="qty = Math.min({{ $donut->stock }}, qty + 1)" class="w-12 h-12 rounded-full flex items-center justify-center text-gray-600 hover:bg-gray-200 transition-colors">
                                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"/></svg>
                                        </button>
                                    </div>
                                    <button type="submit" class="flex-1 inline-flex items-center justify-center gap-3 px-8 py-4 rounded-full bg-gradient-to-r from-donut-pink-500 to-donut-pink-600 text-white font-bold text-lg shadow-xl shadow-donut-pink-500/30 hover:shadow-donut-pink-500/50 hover:scale-[1.02] transition-all duration-300" id="add-to-cart-btn">
                                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 100 4 2 2 0 000-4z"/></svg>
                                        Add to Cart
                                    </button>
                                </div>
                            </form>
                        @endif
                    @else
                        <div class="mt-8">
                            <a href="{{ route('login') }}" class="inline-flex items-center justify-center gap-3 w-full px-8 py-4 rounded-full bg-gradient-to-r from-donut-pink-500 to-donut-pink-600 text-white font-bold text-lg shadow-xl shadow-donut-pink-500/30 hover:shadow-donut-pink-500/50 transition-all duration-300">
                                Sign In to Order
                            </a>
                        </div>
                    @endauth
                </div>
            </div>
        </div>
    </section>

    {{-- Related Donuts --}}
    @if($relatedDonuts->count() > 0)
    <section class="py-16 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <h2 class="font-display text-3xl font-bold text-donut-brown-700 mb-8">You May Also Like</h2>
            <div class="grid grid-cols-2 lg:grid-cols-4 gap-6">
                @foreach($relatedDonuts as $related)
                    <a href="{{ route('menu.show', $related) }}" class="group bg-white rounded-2xl border border-gray-100 overflow-hidden shadow-sm hover:shadow-xl transition-all duration-300 hover:-translate-y-1">
                        <div class="bg-gradient-to-br from-cream to-donut-pink-50 p-6">
                            <img src="{{ asset($related->image) }}" alt="{{ $related->name }}"
                                 class="w-28 h-28 object-cover rounded-full mx-auto group-hover:scale-110 transition-transform duration-300">
                        </div>
                        <div class="p-4 text-center">
                            <h3 class="font-bold text-donut-brown-700 group-hover:text-donut-pink-600 transition-colors">{{ $related->name }}</h3>
                            <p class="text-lg font-bold text-donut-pink-600 mt-1">RM {{ number_format($related->price, 2) }}</p>
                        </div>
                    </a>
                @endforeach
            </div>
        </div>
    </section>
    @endif

@endsection
