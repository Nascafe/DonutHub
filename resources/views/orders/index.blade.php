@extends('layouts.storefront')

@section('title', 'My Orders — DonutHub')

@section('content')
    <section class="py-12 bg-cream min-h-[80vh]">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            {{-- Breadcrumb --}}
            <div class="mb-8">
                <nav class="flex text-sm font-semibold text-gray-500 mb-2">
                    <a href="{{ route('home') }}" class="hover:text-donut-pink-500 transition-colors">Home</a>
                    <span class="mx-2">/</span>
                    <span class="text-donut-brown-700">My Orders</span>
                </nav>
                <h1 class="font-display text-4xl font-bold text-donut-brown-700">Order History 📦</h1>
            </div>

            @if($orders->isEmpty())
                {{-- Empty State --}}
                <div class="bg-white rounded-3xl p-12 text-center border border-gray-100 shadow-sm max-w-2xl mx-auto mt-8 animate-fade-in-up">
                    <div class="w-32 h-32 bg-donut-pink-50 rounded-full flex items-center justify-center mx-auto mb-6">
                        <span class="text-6xl animate-bounce">🍩</span>
                    </div>
                    <h2 class="text-2xl font-bold text-donut-brown-700 mb-3">No Orders Placed Yet</h2>
                    <p class="text-gray-500 max-w-md mx-auto mb-8">
                        Ready to satisfy your cravings? Order fresh-baked, high-fidelity glazed donuts now and start tracking your order status!
                    </p>
                    <a href="{{ route('menu.index') }}" class="inline-flex items-center gap-2 px-8 py-4 rounded-full bg-gradient-to-r from-donut-pink-500 to-donut-pink-600 text-white font-semibold shadow-lg shadow-donut-pink-500/25 hover:shadow-donut-pink-500/40 hover:scale-105 transition-all duration-300">
                        <span>Browse Menu & Order</span>
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"/></svg>
                    </a>
                </div>
            @else
                {{-- Orders List --}}
                <div class="space-y-6">
                    @foreach($orders as $order)
                        @php
                            $statusConfig = match($order->status) {
                                'pending' => ['bg' => 'bg-amber-50', 'text' => 'text-amber-700', 'border' => 'border-amber-200', 'label' => 'Pending'],
                                'preparing' => ['bg' => 'bg-blue-50', 'text' => 'text-blue-700', 'border' => 'border-blue-200', 'label' => 'Preparing'],
                                'ready' => ['bg' => 'bg-purple-50', 'text' => 'text-purple-700', 'border' => 'border-purple-200', 'label' => 'Ready for Pickup'],
                                'completed' => ['bg' => 'bg-green-50', 'text' => 'text-green-700', 'border' => 'border-green-200', 'label' => 'Completed'],
                                'cancelled' => ['bg' => 'bg-red-50', 'text' => 'text-red-700', 'border' => 'border-red-200', 'label' => 'Cancelled'],
                                default => ['bg' => 'bg-gray-50', 'text' => 'text-gray-700', 'border' => 'border-gray-200', 'label' => 'Unknown'],
                            };
                        @endphp
                        <div class="bg-white rounded-3xl p-6 border border-gray-100 shadow-sm hover:shadow-md transition-all duration-300 flex flex-col md:flex-row items-start md:items-center justify-between gap-6">
                            {{-- Order Meta Info --}}
                            <div class="space-y-2">
                                <div class="flex items-center gap-3">
                                    <span class="text-sm font-bold text-gray-400">Order ID:</span>
                                    <span class="font-mono font-bold text-donut-brown-700">{{ $order->order_number }}</span>
                                </div>
                                <div class="flex items-center gap-6 text-sm text-gray-500">
                                    <div>
                                        <span class="font-semibold text-gray-400">Date:</span> {{ $order->created_at->format('M d, Y h:i A') }}
                                    </div>
                                    <div>
                                        <span class="font-semibold text-gray-400">Payment:</span> 
                                        <span class="uppercase font-semibold text-donut-brown-600">{{ $order->payment_method === 'cod' ? 'Cash on Delivery' : 'Online / GCash' }}</span>
                                    </div>
                                </div>

                                {{-- Mini Donut Thumbnails preview --}}
                                <div class="flex flex-wrap items-center gap-2 pt-2">
                                    @foreach($order->items->take(4) as $item)
                                        <div class="w-10 h-10 rounded-xl bg-gradient-to-br from-cream to-donut-pink-50 p-1 border border-gray-100 flex items-center justify-center" title="{{ $item->donut->name }} x{{ $item->quantity }}">
                                            <img src="{{ asset($item->donut->image) }}" alt="{{ $item->donut->name }}" class="w-full h-full object-cover rounded-lg">
                                        </div>
                                    @endforeach
                                    @if($order->items->count() > 4)
                                        <div class="w-10 h-10 rounded-xl bg-gray-50 border border-gray-100 flex items-center justify-center text-xs font-bold text-gray-500">
                                            +{{ $order->items->count() - 4 }}
                                        </div>
                                    @endif
                                </div>
                            </div>

                            {{-- Status Badge & Total & CTA --}}
                            <div class="flex flex-row md:flex-col items-center md:items-end justify-between md:justify-center w-full md:w-auto gap-4 pt-4 md:pt-0 border-t md:border-t-0 border-gray-100">
                                <div class="flex items-center md:flex-col items-start gap-4 md:gap-1">
                                    <span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full text-xs font-bold border {{ $statusConfig['bg'] }} {{ $statusConfig['text'] }} {{ $statusConfig['border'] }}">
                                        <span class="w-1.5 h-1.5 rounded-full bg-current"></span>
                                        {{ $statusConfig['label'] }}
                                    </span>
                                    <div class="text-right">
                                        <p class="text-xs text-gray-400 font-semibold md:hidden">Total Amount</p>
                                        <p class="text-xl font-extrabold text-[#FF4E02]">RM {{ number_format($order->total_amount, 2) }}</p>
                                    </div>
                                </div>

                                <a href="{{ route('orders.show', $order) }}" 
                                   class="px-5 py-2.5 rounded-full text-sm font-semibold border-2 border-donut-brown-200 text-donut-brown-600 hover:border-donut-pink-500 hover:text-white hover:bg-donut-pink-500 transition-all duration-300">
                                    View Details
                                </a>
                            </div>
                        </div>
                    @endforeach

                    {{-- Pagination links --}}
                    <div class="mt-8">
                        {{ $orders->links() }}
                    </div>
                </div>
            @endif
        </div>
    </section>
@endsection
