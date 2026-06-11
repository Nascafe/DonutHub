@extends('layouts.storefront')

@section('title', 'Your Cart — DonutHub')

@section('content')
    <section class="py-12 bg-[#F1E8DF] min-h-[80vh]">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
            {{-- Page Title --}}
            <div class="mb-8 text-left">
                <h1 class="font-black text-3xl text-[#4A3220] uppercase tracking-tight">Shopping Cart</h1>
            </div>

            @if(!$cart || $cart->items->isEmpty())
                {{-- Empty State matching prototype colors --}}
                <div class="bg-white rounded-3xl p-12 text-center border border-[#E8D4C9] shadow-sm animate-fade-in-up">
                    <div class="w-24 h-24 bg-white rounded-full border-4 border-[#FF4E02] flex items-center justify-center mx-auto mb-6">
                        <span class="text-5xl animate-bounce">🍩</span>
                    </div>
                    <h2 class="text-2xl font-black text-[#4A3220] mb-2 uppercase">Your Cart is Empty</h2>
                    <p class="text-[#8B644D] max-w-md mx-auto mb-8">
                        Explore our fresh-baked menu and add your favorite glazed treats!
                    </p>
                    <a href="{{ route('menu.index') }}" class="inline-flex items-center gap-2 px-8 py-3.5 bg-[#FF4E02] text-white font-bold rounded-full hover:scale-105 transition-all uppercase text-sm">
                        <span>Browse Menu</span>
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"/></svg>
                    </a>
                </div>
            @else
                <div class="space-y-6">
                    {{-- Cart Items List --}}
                    <div class="space-y-4">
                        @foreach($cart->items as $item)
                            <div class="bg-white rounded-2xl p-6 border border-[#E8D4C9] shadow-sm flex flex-col sm:flex-row items-start sm:items-center justify-between gap-6">
                                {{-- Item Meta & Image --}}
                                <div class="flex items-center gap-4 min-w-0">
                                    <div class="w-16 h-16 bg-[#F5ECE7] rounded-xl flex-shrink-0 flex items-center justify-center p-2 border border-[#E8D4C9] overflow-hidden">
                                        <img src="{{ asset($item->donut->image) }}" alt="{{ $item->donut->name }}" class="w-full h-full object-cover rounded-lg">
                                    </div>
                                    <div class="text-left min-w-0">
                                        <h3 class="text-xl font-black text-[#FF4E02] uppercase tracking-wide truncate">
                                            <a href="{{ route('menu.show', $item->donut) }}">{{ $item->donut->name }}</a>
                                        </h3>
                                        <p class="text-sm text-[#8B644D] font-semibold mt-0.5">
                                            RM {{ number_format($item->donut->price, 2) }}
                                        </p>
                                    </div>
                                </div>

                                {{-- Quantity Controls & Total & Actions --}}
                                <div class="flex flex-wrap items-center justify-between sm:justify-end gap-6 sm:gap-10 w-full sm:w-auto">
                                    {{-- Quantity form --}}
                                    <form action="{{ route('cart.update', $item) }}" method="POST" class="flex items-center gap-3">
                                        @csrf
                                        @method('PATCH')
                                        
                                        {{-- Minus Button --}}
                                        <button type="button" 
                                                @click="let input = $el.nextElementSibling; if(input.value > 1) { input.value--; $el.closest('form').submit(); }"
                                                class="w-8 h-8 rounded-full bg-[#6d4a35] hover:bg-[#FF4E02] text-white flex items-center justify-center transition-all font-black text-lg focus:outline-none">
                                            &minus;
                                        </button>
                                        
                                        <input type="number" name="quantity" value="{{ $item->quantity }}" min="1" max="99" 
                                               class="w-8 bg-transparent border-0 text-center font-bold text-lg p-0 text-[#4A3220] focus:ring-0 focus:outline-none"
                                               @change="$el.closest('form').submit()">
                                        
                                        {{-- Plus Button --}}
                                        <button type="button" 
                                                @click="let input = $el.previousElementSibling; if(input.value < 99) { input.value++; $el.closest('form').submit(); }"
                                                class="w-8 h-8 rounded-full bg-[#6d4a35] hover:bg-[#FF4E02] text-white flex items-center justify-center transition-all font-black text-lg focus:outline-none">
                                            &plus;
                                        </button>
                                    </form>

                                    {{-- Item Total --}}
                                    <div class="text-right sm:min-w-[100px]">
                                        <span class="text-2xl font-black text-[#4A3220]">
                                            RM {{ number_format($item->donut->price * $item->quantity, 2) }}
                                        </span>
                                    </div>

                                    {{-- Remove --}}
                                    <form action="{{ route('cart.remove', $item) }}" method="POST" onsubmit="return confirm('Remove this sweet donut from your cart?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="flex items-center gap-1 text-red-600 hover:text-red-800 transition-colors font-bold text-xs uppercase" title="Remove item">
                                            <svg class="w-4 h-4 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
                                            </svg>
                                            <span>Remove</span>
                                        </button>
                                    </form>
                                </div>
                            </div>
                        @endforeach
                    </div>

                    {{-- Summary Card & Checkout Details Form --}}
                    <div class="bg-white rounded-2xl p-6 border border-[#E8D4C9] shadow-sm">
                        <form action="{{ route('checkout.store') }}" method="POST" class="space-y-6">
                            @csrf

                            {{-- Payment method + Notes fields (integrated cleanly so checkout succeeds) --}}
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 pt-2 pb-4 border-b border-[#E8D4C9]">
                                <div>
                                    <label class="block text-sm font-extrabold text-[#4A3220] uppercase tracking-wide mb-2">Payment Method</label>
                                    <select name="payment_method" class="w-full rounded-xl border-[#E8D4C9] text-sm focus:border-[#FF4E02] focus:ring-[#FF4E02] text-[#4A3220] font-bold">
                                        <option value="cod" selected>💵 Cash on Delivery (COD)</option>
                                        <option value="gcash">💳 Simulated GCash / Card</option>
                                    </select>
                                    @error('payment_method')
                                        <p class="text-xs text-red-500 mt-1">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div>
                                    <label for="notes" class="block text-sm font-extrabold text-[#4A3220] uppercase tracking-wide mb-2">Special Instructions</label>
                                    <input type="text" id="notes" name="notes" placeholder="E.g., Deliver to the front desk"
                                           class="w-full rounded-xl border-[#E8D4C9] text-sm focus:border-[#FF4E02] focus:ring-[#FF4E02] text-[#4A3220] placeholder-gray-400">
                                    @error('notes')
                                        <p class="text-xs text-red-500 mt-1">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>

                            {{-- Total amount row --}}
                            <div class="flex items-center justify-between py-2">
                                <span class="text-2xl font-black text-[#4A3220] uppercase">Total</span>
                                <span class="text-4xl font-black text-[#4A3220]">
                                    RM {{ number_format($cart->total, 2) }}
                                </span>
                            </div>

                            {{-- Actions --}}
                            <div class="flex flex-col sm:flex-row items-center justify-center gap-4 pt-4">
                                <a href="{{ route('menu.index') }}" 
                                   class="w-full sm:w-auto px-10 py-3.5 border-2 border-[#4A3220] text-[#4A3220] font-bold rounded-full hover:bg-[#F5ECE7] transition-all text-center uppercase text-sm tracking-wide">
                                    Continue Shopping
                                </a>
                                <button type="submit" 
                                        class="w-full sm:w-auto px-10 py-3.5 bg-[#FF4E02] text-white font-bold rounded-full hover:bg-[#E03D00] hover:scale-105 transition-all text-center uppercase text-sm tracking-wide shadow-md shadow-[#FF4E02]/25">
                                    Proceed To Checkout
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            @endif
        </div>
    </section>
@endsection
