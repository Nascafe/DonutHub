@extends('layouts.admin')

@section('admin-title', 'Sales & Inventory Reports')

@section('admin-content')
    <div class="space-y-8 animate-fade-in-up">
        
        {{-- High-level widgets --}}
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
            {{-- Total Revenue --}}
            <div class="bg-white rounded-3xl p-6 border border-[#E8D4C9] shadow-sm text-left">
                <p class="text-xs text-gray-400 font-bold uppercase tracking-wider">Total Sales Revenue</p>
                <p class="text-3xl font-black text-[#FF4E02] mt-1">RM {{ number_format($totalRevenue, 2) }}</p>
                <div class="text-[10px] text-gray-400 font-bold uppercase mt-2">All Completed Orders</div>
            </div>

            {{-- Recent Sales --}}
            <div class="bg-white rounded-3xl p-6 border border-[#E8D4C9] shadow-sm text-left">
                <p class="text-xs text-gray-400 font-bold uppercase tracking-wider">6-Month Revenue</p>
                <p class="text-3xl font-black text-[#4A3220] mt-1">RM {{ number_format($monthlyRevenue, 2) }}</p>
                <div class="text-[10px] text-gray-400 font-bold uppercase mt-2">Past 6 months cumulative</div>
            </div>

            {{-- Order Volume --}}
            <div class="bg-white rounded-3xl p-6 border border-[#E8D4C9] shadow-sm text-left">
                <p class="text-xs text-gray-400 font-bold uppercase tracking-wider">All-Time Volume</p>
                <p class="text-3xl font-black text-[#4A3220] mt-1">{{ $totalOrders }} orders</p>
                <div class="text-[10px] text-gray-400 font-bold uppercase mt-2">Completion Rate: 
                    @if($totalOrders > 0)
                        {{ number_format(($completedOrders / $totalOrders) * 100, 1) }}%
                    @else
                        0%
                    @endif
                </div>
            </div>

            {{-- Completed vs Cancelled --}}
            <div class="bg-white rounded-3xl p-6 border border-[#E8D4C9] shadow-sm text-left">
                <p class="text-xs text-gray-400 font-bold uppercase tracking-wider">Cancellation Rate</p>
                <p class="text-3xl font-black text-red-500 mt-1">
                    @if($totalOrders > 0)
                        {{ number_format(($cancelledOrders / $totalOrders) * 100, 1) }}%
                    @else
                        0%
                    @endif
                </p>
                <div class="text-[10px] text-gray-400 font-bold uppercase mt-2">{{ $cancelledOrders }} cancelled orders</div>
            </div>
        </div>

        {{-- Reports Breakdown grids --}}
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
            
            {{-- Left column: Top products --}}
            <div class="bg-white rounded-3xl border border-[#E8D4C9] shadow-sm overflow-hidden text-left">
                <div class="p-6 border-b border-[#E8D4C9] bg-[#FAF4EE]">
                    <h3 class="font-black text-base text-[#4A3220] uppercase tracking-wide">Top 10 Product Sales</h3>
                </div>
                <div class="p-6 divide-y divide-[#E8D4C9] space-y-4">
                    @forelse($topDonuts as $donut)
                        <div class="flex items-center justify-between gap-4 pt-4 first:pt-0">
                            <div class="flex items-center gap-3 min-w-0">
                                <div class="w-10 h-10 bg-[#F5ECE7] rounded-xl flex-shrink-0 flex items-center justify-center p-1 border border-[#E8D4C9] overflow-hidden">
                                    <img src="{{ asset($donut->image) }}" alt="{{ $donut->name }}" class="w-full h-full object-cover rounded-lg">
                                </div>
                                <div class="text-left min-w-0">
                                    <span class="font-black text-sm text-[#FF4E02] uppercase tracking-wide truncate block">{{ $donut->name }}</span>
                                    <span class="text-[10px] text-gray-400 font-bold uppercase">{{ $donut->category->name ?? 'Category' }}</span>
                                </div>
                            </div>
                            
                            {{-- Visual CSS sales bar --}}
                            <div class="flex-1 max-w-[150px] bg-gray-100 rounded-full h-2 overflow-hidden hidden sm:block">
                                @php
                                    $maxSales = max($topDonuts->pluck('order_items_count')->toArray() ?: [1]);
                                    $percentage = ($donut->order_items_count / $maxSales) * 100;
                                @endphp
                                <div class="bg-[#FF4E02] h-full rounded-full" style="width: {{ $percentage }}%"></div>
                            </div>

                            <div class="shrink-0 text-right">
                                <span class="text-xs font-black text-[#4A3220] bg-donut-brown-50 px-2.5 py-1 rounded-full uppercase">
                                    {{ $donut->order_items_count }} orders
                                </span>
                            </div>
                        </div>
                    @empty
                        <p class="text-sm text-gray-400 text-center font-bold py-6">No sales stats recorded yet.</p>
                    @endforelse
                </div>
            </div>

            {{-- Right column: Status and type details --}}
            <div class="space-y-8 text-left">
                
                {{-- Status Distribution --}}
                <div class="bg-white rounded-3xl border border-[#E8D4C9] shadow-sm overflow-hidden">
                    <div class="p-6 border-b border-[#E8D4C9] bg-[#FAF4EE]">
                        <h3 class="font-black text-base text-[#4A3220] uppercase tracking-wide">Status Distribution</h3>
                    </div>
                    <div class="p-6 space-y-4">
                        @foreach(['pending', 'preparing', 'ready', 'completed', 'cancelled'] as $status)
                            @php
                                $count = $ordersByStatus[$status] ?? 0;
                                $statusLabel = match($status) {
                                    'pending' => 'Pending in Queue',
                                    'preparing' => 'Preparing / Baking',
                                    'ready' => 'Ready for Pickup',
                                    'completed' => 'Completed Orders',
                                    'cancelled' => 'Cancelled Orders',
                                    default => $status
                                };
                                $barColor = match($status) {
                                    'pending' => 'bg-amber-400',
                                    'preparing' => 'bg-blue-400',
                                    'ready' => 'bg-purple-400',
                                    'completed' => 'bg-green-500',
                                    'cancelled' => 'bg-red-500',
                                };
                                $pct = $totalOrders > 0 ? ($count / $totalOrders) * 100 : 0;
                            @endphp
                            <div class="space-y-1">
                                <div class="flex justify-between text-xs font-bold text-[#4A3220] uppercase tracking-wide">
                                    <span>{{ $statusLabel }}</span>
                                    <span>{{ $count }} ({{ number_format($pct, 1) }}%)</span>
                                </div>
                                <div class="w-full bg-gray-100 rounded-full h-2.5 overflow-hidden">
                                    <div class="{{ $barColor }} h-full rounded-full" style="width: {{ $pct }}%"></div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>

                {{-- Sales Channels --}}
                <div class="bg-[#FAF4EE] rounded-3xl p-6 border border-[#E8D4C9] space-y-4">
                    <h3 class="font-black text-base text-[#4A3220] uppercase tracking-wide">Order Channel Types</h3>
                    
                    @php
                        $onlineCount = $ordersByType['online'] ?? 0;
                        $instoreCount = $ordersByType['instore'] ?? 0;
                        $totalChannels = $onlineCount + $instoreCount;
                        $onlinePct = $totalChannels > 0 ? ($onlineCount / $totalChannels) * 100 : 0;
                        $instorePct = $totalChannels > 0 ? ($instoreCount / $totalChannels) * 100 : 0;
                    @endphp
                    
                    <div class="space-y-4 text-xs font-bold text-[#4A3220] uppercase">
                        <div>
                            <div class="flex justify-between mb-1">
                                <span>🌐 Web Storefront Ordering</span>
                                <span>{{ $onlineCount }} ({{ number_format($onlinePct, 1) }}%)</span>
                            </div>
                            <div class="w-full bg-white rounded-full h-2.5 overflow-hidden border border-[#E8D4C9]">
                                <div class="bg-[#FF4E02] h-full rounded-full" style="width: {{ $onlinePct }}%"></div>
                            </div>
                        </div>

                        <div>
                            <div class="flex justify-between mb-1">
                                <span>🏬 In-Store Walk-ins</span>
                                <span>{{ $instoreCount }} ({{ number_format($instorePct, 1) }}%)</span>
                            </div>
                            <div class="w-full bg-white rounded-full h-2.5 overflow-hidden border border-[#E8D4C9]">
                                <div class="bg-[#4A3220] h-full rounded-full" style="width: {{ $instorePct }}%"></div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>

    </div>
@endsection
