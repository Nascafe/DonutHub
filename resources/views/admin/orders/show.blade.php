@extends('layouts.admin')

@section('admin-title')
    Order Details: {{ $order->order_number }}
@endsection

@section('admin-content')
    <div class="space-y-8 animate-fade-in-up">
        
        {{-- Header Actions --}}
        <div class="flex flex-wrap justify-between items-center gap-4">
            <a href="{{ route('admin.orders.index') }}" 
               class="inline-flex items-center gap-2 px-5 py-2.5 rounded-full border-2 border-[#4A3220] text-[#4A3220] font-bold text-xs uppercase hover:bg-[#F5ECE7] transition-all">
                &larr; Back to Orders List
            </a>
            
            <div class="flex items-center gap-3">
                <span class="text-xs font-bold text-gray-400 uppercase">Current Status:</span>
                @php
                    $statusConfig = match($order->status) {
                        'pending' => ['bg' => 'bg-amber-50', 'text' => 'text-amber-700', 'border' => 'border-amber-200', 'label' => 'Pending'],
                        'preparing' => ['bg' => 'bg-blue-50', 'text' => 'text-blue-700', 'border' => 'border-blue-200', 'label' => 'Preparing'],
                        'ready' => ['bg' => 'bg-purple-50', 'text' => 'text-purple-700', 'border' => 'border-purple-200', 'label' => 'Ready'],
                        'completed' => ['bg' => 'bg-green-50', 'text' => 'text-green-700', 'border' => 'border-green-200', 'label' => 'Completed'],
                        'cancelled' => ['bg' => 'bg-red-50', 'text' => 'text-red-700', 'border' => 'border-red-200', 'label' => 'Cancelled'],
                        default => ['bg' => 'bg-gray-50', 'text' => 'text-gray-700', 'border' => 'border-gray-200', 'label' => 'Unknown'],
                    };
                @endphp
                <span class="inline-flex items-center gap-1.5 px-3.5 py-1.5 rounded-full text-xs font-bold border {{ $statusConfig['bg'] }} {{ $statusConfig['text'] }} {{ $statusConfig['border'] }}">
                    <span class="w-1.5 h-1.5 rounded-full bg-current"></span>
                    {{ $statusConfig['label'] }}
                </span>
            </div>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
            {{-- Order Items Breakdown (2 Columns) --}}
            <div class="lg:col-span-2 space-y-8">
                
                {{-- Status Updater Card --}}
                <div class="bg-white rounded-3xl p-6 border border-[#E8D4C9] shadow-sm text-left">
                    <h3 class="font-black text-base text-[#4A3220] uppercase tracking-wide mb-4">Manage Order Status</h3>
                    
                    <form action="{{ route('admin.orders.update', $order) }}" method="POST" class="flex flex-col sm:flex-row items-start sm:items-center gap-4">
                        @csrf
                        @method('PATCH')
                        
                        <div class="flex-1 w-full">
                            <select name="status" 
                                    class="w-full rounded-xl border-[#E8D4C9] text-sm focus:border-[#FF4E02] focus:ring-[#FF4E02] text-[#4A3220] font-bold bg-[#FAF4EE] py-3 px-4">
                                <option value="pending" {{ $order->status === 'pending' ? 'selected' : '' }}>⏳ Pending in Queue</option>
                                <option value="preparing" {{ $order->status === 'preparing' ? 'selected' : '' }}>🥣 Preparing / Baking &amp; Glazing</option>
                                <option value="ready" {{ $order->status === 'ready' ? 'selected' : '' }}>📦 Ready for Pickup / Delivery</option>
                                <option value="completed" {{ $order->status === 'completed' ? 'selected' : '' }}>✅ Completed / Order Fulfilled</option>
                                <option value="cancelled" {{ $order->status === 'cancelled' ? 'selected' : '' }}>❌ Cancelled</option>
                            </select>
                        </div>
                        
                        <button type="submit" 
                                class="w-full sm:w-auto px-8 py-3 bg-[#FF4E02] text-white font-bold rounded-xl hover:bg-[#E03D00] transition-all uppercase text-xs tracking-wider shrink-0 shadow-md">
                            Update Status
                        </button>
                    </form>
                </div>

                {{-- Items table --}}
                <div class="bg-white rounded-3xl border border-[#E8D4C9] shadow-sm overflow-hidden">
                    <div class="p-6 border-b border-[#E8D4C9] bg-[#FAF4EE]">
                        <h3 class="font-black text-base text-[#4A3220] uppercase tracking-wide">Ordered Items List</h3>
                    </div>
                    
                    <div class="divide-y divide-[#E8D4C9]">
                        @foreach($order->items as $item)
                            <div class="p-6 flex flex-col sm:flex-row items-start sm:items-center justify-between gap-4">
                                <div class="flex items-center gap-4">
                                    <div class="w-16 h-16 bg-[#F5ECE7] rounded-xl flex-shrink-0 flex items-center justify-center p-2 border border-[#E8D4C9] overflow-hidden">
                                        <img src="{{ asset($item->donut->image) }}" alt="{{ $item->donut->name }}" class="w-full h-full object-cover rounded-lg">
                                    </div>
                                    <div class="text-left">
                                        <h4 class="font-black text-sm text-[#FF4E02] uppercase tracking-wide">{{ $item->donut->name }}</h4>
                                        <span class="text-xs font-semibold px-2 py-0.5 rounded-full bg-donut-brown-50 text-donut-brown-600 mt-1 inline-block">
                                            {{ $item->donut->category->name ?? 'Glazed' }}
                                        </span>
                                    </div>
                                </div>
                                <div class="flex items-center gap-8 text-sm">
                                    <div class="text-gray-400 font-semibold">
                                        RM {{ number_format($item->price, 2) }} <span class="text-xs">x {{ $item->quantity }}</span>
                                    </div>
                                    <div class="text-right font-black text-[#4A3220] min-w-[80px]">
                                        RM {{ number_format($item->subtotal, 2) }}
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>

            {{-- Summary & Customer Info (1 Column) --}}
            <div class="space-y-8 text-left">
                {{-- Bill Summary --}}
                <div class="bg-white rounded-3xl p-6 border border-[#E8D4C9] shadow-sm space-y-4">
                    <h3 class="font-black text-base text-[#4A3220] uppercase tracking-wide pb-3 border-b border-[#E8D4C9]">Billing Details</h3>
                    
                    <div class="space-y-3 text-sm">
                        <div class="flex justify-between text-gray-500">
                            <span>Subtotal</span>
                            <span class="font-bold text-[#4A3220]">RM {{ number_format($order->total_amount, 2) }}</span>
                        </div>
                        <div class="flex justify-between text-gray-500">
                            <span>Delivery</span>
                            <span class="font-bold text-green-600">FREE</span>
                        </div>
                        <hr class="border-[#E8D4C9]">
                        <div class="flex justify-between items-center text-lg font-black">
                            <span class="text-[#4A3220]">Grand Total</span>
                            <span class="text-2xl text-[#FF4E02]">RM {{ number_format($order->total_amount, 2) }}</span>
                        </div>
                    </div>
                </div>

                {{-- Customer Details --}}
                <div class="bg-white rounded-3xl p-6 border border-[#E8D4C9] shadow-sm space-y-4">
                    <h3 class="font-black text-base text-[#4A3220] uppercase tracking-wide pb-3 border-b border-[#E8D4C9]">Customer Details</h3>
                    
                    <div class="space-y-4 text-sm">
                        <div>
                            <span class="text-xs text-gray-400 font-bold uppercase tracking-wider block">Customer Name</span>
                            <span class="font-bold text-[#4A3220]">{{ $order->user->name }}</span>
                        </div>
                        <div>
                            <span class="text-xs text-gray-400 font-bold uppercase tracking-wider block">Email Address</span>
                            <span class="font-bold text-[#4A3220]">{{ $order->user->email }}</span>
                        </div>
                        <div>
                            <span class="text-xs text-gray-400 font-bold uppercase tracking-wider block">Contact Number</span>
                            <span class="font-bold text-[#4A3220]">{{ $order->user->phone ?? 'Not provided' }}</span>
                        </div>
                        <div>
                            <span class="text-xs text-gray-400 font-bold uppercase tracking-wider block">Shipping Address</span>
                            <span class="font-bold text-[#4A3220]">{{ $order->user->address ?? 'Not provided' }}</span>
                        </div>
                    </div>
                </div>

                {{-- Delivery Notes --}}
                @if($order->notes)
                    <div class="bg-[#FAF4EE] rounded-3xl p-6 border border-[#E8D4C9] space-y-2">
                        <h3 class="font-black text-sm text-[#4A3220] uppercase tracking-wide">Delivery Notes / Instructions</h3>
                        <p class="text-sm text-[#8B644D] italic leading-relaxed">
                            "{{ $order->notes }}"
                        </p>
                    </div>
                @endif
            </div>
        </div>

    </div>
@endsection
