@extends('layouts.storefront')

@section('title', 'Order ' . $order->order_number . ' — DonutHub')

@section('content')
    <section class="py-12 bg-cream min-h-[90vh]">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            {{-- Breadcrumb --}}
            <div class="mb-8 flex flex-wrap justify-between items-center gap-4">
                <div>
                    <nav class="flex text-sm font-semibold text-gray-500 mb-2">
                        <a href="{{ route('home') }}" class="hover:text-donut-pink-500 transition-colors">Home</a>
                        <span class="mx-2">/</span>
                        <a href="{{ route('orders.index') }}" class="hover:text-donut-pink-500 transition-colors">My Orders</a>
                        <span class="mx-2">/</span>
                        <span class="text-donut-brown-700">{{ $order->order_number }}</span>
                    </nav>
                    <h1 class="font-display text-4xl font-bold text-donut-brown-700">Order Details 🍩</h1>
                </div>
                <a href="{{ route('orders.index') }}" class="inline-flex items-center gap-2 px-5 py-2.5 rounded-full border-2 border-donut-brown-300 text-donut-brown-600 font-semibold hover:bg-donut-brown-50 transition-all">
                    <svg class="w-5 h-5 rotate-180" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"/></svg>
                    <span>Back to Orders</span>
                </a>
            </div>

            <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
                {{-- Left details column (2 columns) --}}
                <div class="lg:col-span-2 space-y-8">
                    {{-- Status Progress Timeline Tracker --}}
                    <div class="bg-white rounded-3xl p-8 border border-gray-100 shadow-sm">
                        <h2 class="text-xl font-bold text-donut-brown-700 mb-6 flex items-center gap-2">
                            <span>📦</span> Track Your Order
                        </h2>

                        @php
                            $stages = [
                                'pending' => ['label' => 'Order Placed', 'desc' => 'Your order is in queue'],
                                'preparing' => ['label' => 'Baking & Glazing', 'desc' => 'Our bakers are working their magic'],
                                'ready' => ['label' => 'Ready for Pickup', 'desc' => 'Fresh out of the oven, waiting for you'],
                                'completed' => ['label' => 'Completed', 'desc' => 'Enjoy your delicious donuts!']
                            ];
                            
                            $currentStageIndex = match($order->status) {
                                'pending' => 0,
                                'preparing' => 1,
                                'ready' => 2,
                                'completed' => 3,
                                'cancelled' => -1,
                                default => 0
                            };
                        @endphp

                        @if($order->status === 'cancelled')
                            <div class="bg-red-50 border border-red-200 rounded-2xl p-4 flex items-center gap-3 text-red-700 font-medium">
                                <span class="text-2xl">❌</span>
                                <div>
                                    <p class="font-bold">This order has been cancelled.</p>
                                    <p class="text-xs text-red-500">If this was a mistake, please place a new order or contact support.</p>
                                </div>
                            </div>
                        @else
                            {{-- Horizontal timeline for large screens, vertical for mobile --}}
                            <div class="relative flex flex-col md:flex-row justify-between items-start md:items-center gap-8 md:gap-4 mt-4">
                                {{-- Line connector behind steps --}}
                                <div class="hidden md:block absolute top-[18px] left-[5%] right-[5%] h-1 bg-gray-100 -z-1">
                                    <div class="h-full bg-donut-pink-500 transition-all duration-500" style="width: {{ $currentStageIndex * 33.33 }}%"></div>
                                </div>

                                @foreach(array_values($stages) as $index => $stage)
                                    @php
                                        $isDone = $index <= $currentStageIndex;
                                        $isCurrent = $index === $currentStageIndex;
                                    @endphp
                                    <div class="flex md:flex-col items-center gap-4 md:gap-2 text-center md:flex-1 relative z-10">
                                        {{-- Step Circle Indicator --}}
                                        <div class="w-10 h-10 rounded-full flex items-center justify-center font-bold text-sm border-4 transition-all duration-300
                                                    {{ $isCurrent ? 'bg-white border-donut-pink-500 text-donut-pink-600 scale-110 shadow-lg shadow-donut-pink-500/20' : '' }}
                                                    {{ $isDone && !$isCurrent ? 'bg-donut-pink-500 border-donut-pink-500 text-white' : '' }}
                                                    {{ !$isDone ? 'bg-white border-gray-200 text-gray-400' : '' }}">
                                            @if($isDone && !$isCurrent)
                                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 13l4 4L19 7"/></svg>
                                            @else
                                                {{ $index + 1 }}
                                            @endif
                                        </div>

                                        {{-- Label & Description --}}
                                        <div class="text-left md:text-center">
                                            <p class="font-bold text-sm {{ $isDone ? 'text-donut-brown-700' : 'text-gray-400' }}">{{ $stage['label'] }}</p>
                                            <p class="text-xs {{ $isCurrent ? 'text-donut-pink-500 font-semibold' : 'text-gray-400' }} mt-0.5">{{ $stage['desc'] }}</p>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        @endif
                    </div>

                    {{-- Items Details Table --}}
                    <div class="bg-white rounded-3xl border border-gray-100 shadow-sm overflow-hidden">
                        <div class="p-6 bg-gray-50/50 border-b border-gray-100 font-bold text-donut-brown-700 flex justify-between items-center">
                            <span>Ordered Items</span>
                            <span class="text-sm font-semibold text-gray-500">{{ $order->items->sum('quantity') }} items</span>
                        </div>

                        <div class="divide-y divide-gray-100">
                            @foreach($order->items as $item)
                                <div class="p-6 flex flex-col sm:flex-row sm:items-center justify-between gap-4">
                                    <div class="flex items-center gap-4">
                                        {{-- Image --}}
                                        <div class="w-16 h-16 bg-gradient-to-br from-cream to-donut-pink-50 rounded-xl flex-shrink-0 flex items-center justify-center p-2 border border-gray-100 overflow-hidden">
                                            <img src="{{ asset($item->donut->image) }}" alt="{{ $item->donut->name }}" class="w-full h-full object-cover rounded-lg">
                                        </div>
                                        <div>
                                            <h3 class="font-bold text-donut-brown-700 hover:text-donut-pink-600 transition-colors">
                                                <a href="{{ route('menu.show', $item->donut) }}">{{ $item->donut->name }}</a>
                                            </h3>
                                            <p class="text-xs font-semibold px-2 py-0.5 rounded-full bg-donut-pink-50 text-donut-pink-500 inline-block mt-1">
                                                {{ $item->donut->category->name ?? 'Donut' }}
                                            </p>
                                        </div>
                                    </div>
                                    
                                    <div class="flex items-center justify-between sm:justify-end gap-12 text-sm">
                                        <div class="text-gray-500">
                                            RM {{ number_format($item->price, 2) }} <span class="text-xs">x {{ $item->quantity }}</span>
                                        </div>
                                        <div class="text-right font-extrabold text-donut-brown-700 min-w-[80px]">
                                            RM {{ number_format($item->subtotal, 2) }}
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>

                    {{-- Feedback / Review Form (if completed and has no review yet) --}}
                    @if($order->status === 'completed')
                        <div class="bg-gradient-to-br from-donut-brown-700 to-donut-brown-600 text-white rounded-3xl p-8 shadow-xl relative overflow-hidden">
                            <div class="absolute inset-0 opacity-10">
                                <div class="absolute -top-10 -right-10 w-40 h-40 border border-white rounded-full"></div>
                                <div class="absolute -bottom-10 -left-10 w-60 h-60 border border-white rounded-full"></div>
                            </div>
                            
                            <div class="relative z-10">
                                <div class="flex items-center gap-3 mb-4">
                                    <span class="text-3xl animate-bounce">✨</span>
                                    <h2 class="text-2xl font-display font-bold">Leave a Sweet Review</h2>
                                </div>
                                <p class="text-donut-brown-100 text-sm mb-6 max-w-xl">
                                    We hope you loved your fresh-baked glazed donuts! Please share your experience with the community by leaving us a rating and comment.
                                </p>

                                <form action="{{ route('reviews.store') }}" method="POST" class="space-y-4">
                                    @csrf

                                    {{-- Rating Selector --}}
                                    <div>
                                        <label class="block text-sm font-semibold mb-2">Your Rating</label>
                                        <div class="flex gap-2" x-data="{ hoverRating: 0, rating: 5 }">
                                            <input type="hidden" name="rating" x-model="rating">
                                            @for($i = 1; $i <= 5; $i++)
                                                <button type="button" 
                                                        @click="rating = {{ $i }}"
                                                        @mouseenter="hoverRating = {{ $i }}"
                                                        @mouseleave="hoverRating = 0"
                                                        class="w-8 h-8 focus:outline-none transition-all hover:scale-110">
                                                    <svg :class="(hoverRating || rating) >= {{ $i }} ? 'text-amber-400' : 'text-white/20'" 
                                                         class="w-full h-full fill-current transition-colors duration-150" viewBox="0 0 20 20">
                                                        <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/>
                                                    </svg>
                                                </button>
                                            @endfor
                                        </div>
                                        @error('rating')
                                            <p class="text-xs text-red-400 mt-1">{{ $message }}</p>
                                        @enderror
                                    </div>

                                    {{-- Comment --}}
                                    <div>
                                        <label for="comment" class="block text-sm font-semibold mb-2">Write Your Thoughts</label>
                                        <textarea id="comment" name="comment" rows="3" required
                                                  placeholder="Tell us what you liked (or how we can improve!)..."
                                                  class="w-full rounded-2xl border-0 bg-white/10 text-white placeholder-white/40 focus:ring-2 focus:ring-donut-pink-400 text-sm p-4"></textarea>
                                        @error('comment')
                                            <p class="text-xs text-red-400 mt-1">{{ $message }}</p>
                                        @enderror
                                    </div>

                                    {{-- Submit --}}
                                    <button type="submit" 
                                            class="inline-flex items-center gap-2 px-6 py-3 rounded-full bg-donut-pink-500 hover:bg-donut-pink-600 text-white font-bold text-sm shadow-lg hover:scale-105 active:scale-95 transition-all">
                                        Submit Review 🍩
                                    </button>
                                </form>
                            </div>
                        </div>
                    @endif
                </div>

                {{-- Right column summary card (1 column) --}}
                <div class="space-y-6">
                    {{-- Order & Customer Meta Details --}}
                    <div class="bg-white rounded-3xl p-6 border border-gray-100 shadow-sm space-y-6">
                        <h2 class="text-xl font-bold text-donut-brown-700 pb-4 border-b border-gray-100">Order Summary</h2>

                        {{-- Metadata list --}}
                        <div class="space-y-4">
                            <div class="flex justify-between items-start gap-2 text-sm">
                                <span class="text-gray-400 font-semibold">Order Number</span>
                                <span class="font-mono font-bold text-donut-brown-700 text-right">{{ $order->order_number }}</span>
                            </div>
                            <div class="flex justify-between items-start gap-2 text-sm">
                                <span class="text-gray-400 font-semibold">Placed Date</span>
                                <span class="font-semibold text-donut-brown-700 text-right">{{ $order->created_at->format('M d, Y h:i A') }}</span>
                            </div>
                            <div class="flex justify-between items-start gap-2 text-sm">
                                <span class="text-gray-400 font-semibold">Payment Method</span>
                                <span class="font-semibold text-donut-brown-700 text-right uppercase">{{ $order->payment_method === 'cod' ? 'Cash on Delivery' : 'Online / GCash' }}</span>
                            </div>
                            @if($order->notes)
                                <hr class="border-gray-100">
                                <div>
                                    <span class="text-gray-400 text-sm font-semibold block mb-1">Notes:</span>
                                    <div class="bg-cream rounded-2xl p-4 text-sm text-donut-brown-600 border border-donut-brown-100 italic">
                                        "{{ $order->notes }}"
                                    </div>
                                </div>
                            @endif
                        </div>
                    </div>

                    {{-- Billing summary --}}
                    <div class="bg-white rounded-3xl p-6 border border-gray-100 shadow-sm space-y-4">
                        <div class="flex justify-between text-gray-500 text-sm">
                            <span>Subtotal</span>
                            <span class="font-semibold text-donut-brown-700">RM {{ number_format($order->total_amount, 2) }}</span>
                        </div>
                        <div class="flex justify-between text-gray-500 text-sm">
                            <span>Delivery Fee</span>
                            <span class="font-semibold text-green-600">FREE</span>
                        </div>
                        <div class="flex justify-between text-gray-500 text-sm">
                            <span>Taxes (Included)</span>
                            <span class="font-semibold text-donut-brown-700">RM {{ number_format($order->total_amount * 0.12, 2) }}</span>
                        </div>
                        <hr class="border-gray-100">
                        <div class="flex justify-between items-center text-lg font-bold">
                            <span class="text-donut-brown-700">Grand Total</span>
                            <span class="text-2xl font-extrabold text-[#FF4E02]">RM {{ number_format($order->total_amount, 2) }}</span>
                        </div>
                    </div>

                    {{-- Customer Info details --}}
                    <div class="bg-white rounded-3xl p-6 border border-gray-100 shadow-sm space-y-4">
                        <h3 class="text-base font-bold text-donut-brown-700 pb-3 border-b border-gray-100">Customer Details</h3>
                        <div class="space-y-3 text-sm">
                            <div>
                                <span class="text-gray-400 font-semibold block">Name</span>
                                <span class="font-bold text-donut-brown-700">{{ $order->user->name }}</span>
                            </div>
                            <div>
                                <span class="text-gray-400 font-semibold block">Email Address</span>
                                <span class="font-bold text-donut-brown-700">{{ $order->user->email }}</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
