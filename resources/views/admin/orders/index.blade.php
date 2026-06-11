@extends('layouts.admin')

@section('admin-title', 'Manage Customer Orders')

@section('admin-content')
    <div class="space-y-6 animate-fade-in-up">
        
        {{-- Card Container --}}
        <div class="bg-white rounded-3xl border border-[#E8D4C9] shadow-sm overflow-hidden">
            {{-- Header --}}
            <div class="p-6 border-b border-[#E8D4C9] flex justify-between items-center bg-[#FAF4EE]">
                <h2 class="font-black text-lg text-[#4A3220] uppercase tracking-wide">Customer Orders Listing</h2>
                <span class="text-xs font-bold bg-[#FF4E02]/10 text-[#FF4E02] px-3 py-1 rounded-full uppercase">
                    Total: {{ $orders->total() }} Orders
                </span>
            </div>

            {{-- Table --}}
            <div class="overflow-x-auto">
                <table class="w-full text-left border-collapse">
                    <thead>
                        <tr class="border-b border-[#E8D4C9] bg-gray-50 text-[10px] uppercase font-bold text-gray-400 tracking-wider">
                            <th class="px-6 py-4">Order ID</th>
                            <th class="px-6 py-4">Customer Details</th>
                            <th class="px-6 py-4">Date &amp; Time</th>
                            <th class="px-6 py-4">Payment Method</th>
                            <th class="px-6 py-4">Special Notes</th>
                            <th class="px-6 py-4">Status Manager</th>
                            <th class="px-6 py-4">Grand Total</th>
                            <th class="px-6 py-4 text-right">Action</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-[#E8D4C9] text-sm text-[#4A3220]">
                        @forelse($orders as $order)
                            <tr class="hover:bg-gray-50/50 transition-colors">
                                {{-- Order Number --}}
                                <td class="px-6 py-4 font-mono font-bold">{{ $order->order_number }}</td>
                                
                                {{-- Customer Info --}}
                                <td class="px-6 py-4">
                                    <div class="font-bold">{{ $order->user->name }}</div>
                                    <div class="text-xs text-gray-400 font-semibold">{{ $order->user->email }}</div>
                                    @if($order->user->phone)
                                        <div class="text-[10px] text-gray-400 mt-0.5">{{ $order->user->phone }}</div>
                                    @endif
                                </td>

                                {{-- Date/Time --}}
                                <td class="px-6 py-4 text-xs text-gray-400 font-medium">
                                    {{ $order->created_at->format('M d, Y h:i A') }}
                                    <div class="text-[10px] text-gray-400 mt-0.5">{{ $order->created_at->diffForHumans() }}</div>
                                </td>

                                {{-- Payment --}}
                                <td class="px-6 py-4 font-bold uppercase text-xs">
                                    {{ $order->payment_method === 'cod' ? '💵 COD' : '💳 Online / GCash' }}
                                </td>

                                {{-- Special Notes --}}
                                <td class="px-6 py-4 max-w-[180px] truncate">
                                    @if($order->notes)
                                        <span class="text-xs italic text-[#8B644D]" title="{{ $order->notes }}">
                                            "{{ $order->notes }}"
                                        </span>
                                    @else
                                        <span class="text-gray-300 text-xs italic">No instructions</span>
                                    @endif
                                </td>

                                {{-- Status Form Manager --}}
                                <td class="px-6 py-4">
                                    <form action="{{ route('admin.orders.update', $order) }}" method="POST" class="inline-block">
                                        @csrf
                                        @method('PATCH')
                                        <select name="status" onchange="this.form.submit()" 
                                                class="rounded-full text-xs font-bold py-1 px-3 border border-[#E8D4C9] focus:border-[#FF4E02] focus:ring-[#FF4E02] bg-[#FAF4EE] text-[#4A3220] cursor-pointer">
                                            <option value="pending" {{ $order->status === 'pending' ? 'selected' : '' }}>Pending</option>
                                            <option value="preparing" {{ $order->status === 'preparing' ? 'selected' : '' }}>Preparing</option>
                                            <option value="ready" {{ $order->status === 'ready' ? 'selected' : '' }}>Ready</option>
                                            <option value="completed" {{ $order->status === 'completed' ? 'selected' : '' }}>Completed</option>
                                            <option value="cancelled" {{ $order->status === 'cancelled' ? 'selected' : '' }}>Cancelled</option>
                                        </select>
                                    </form>
                                </td>

                                {{-- Total --}}
                                <td class="px-6 py-4 font-black">RM {{ number_format($order->total_amount, 2) }}</td>

                                {{-- Action --}}
                                <td class="px-6 py-4 text-right">
                                    <a href="{{ route('admin.orders.show', $order) }}" 
                                       class="px-4 py-1.5 bg-[#4A3220] hover:bg-[#FF4E02] text-white text-xs font-bold rounded-full transition-all uppercase tracking-wide">
                                        Details
                                    </a>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="8" class="px-6 py-16 text-center text-gray-400 font-bold">
                                    No customer orders found in the database.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            {{-- Pagination Links Footer --}}
            @if($orders->hasPages())
                <div class="px-6 py-4 border-t border-[#E8D4C9] bg-gray-50">
                    {{ $orders->links() }}
                </div>
            @endif
        </div>

    </div>
@endsection
