@extends('layouts.admin')

@section('admin-title', 'Dashboard')

@section('admin-content')
    <div class="space-y-8 animate-fade-in-up">
        
        {{-- Stats Grid (4 Cards matching mockup style) --}}
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
            {{-- Card 1: Views / Customers --}}
            <div class="bg-white rounded-2xl p-6 border border-[#E8D4C9] shadow-sm flex flex-col justify-between text-left space-y-4">
                <div class="w-11 h-11 bg-gray-100 rounded-full flex items-center justify-center text-xl shrink-0">
                    👁️
                </div>
                <div>
                    <p class="text-2xl font-bold text-[#4A3220]">{{ number_format($totalCustomers) }}</p>
                    <p class="text-xs text-gray-400 font-semibold mt-1">Total Customers</p>
                </div>
                <div class="flex items-center justify-between text-xs pt-1">
                    <span class="text-green-500 font-bold flex items-center gap-0.5">
                        0.95% <svg class="w-3 h-3 fill-current rotate-180" viewBox="0 0 24 24"><path d="M12 21l-12-18h24z"/></svg>
                    </span>
                </div>
            </div>

            {{-- Card 2: Revenue / Profit --}}
            <div class="bg-white rounded-2xl p-6 border border-[#E8D4C9] shadow-sm flex flex-col justify-between text-left space-y-4">
                <div class="w-11 h-11 bg-gray-100 rounded-full flex items-center justify-center text-xl shrink-0">
                    🛒
                </div>
                <div>
                    <p class="text-2xl font-bold text-[#4A3220]">RM {{ number_format($totalRevenue, 2) }}</p>
                    <p class="text-xs text-gray-400 font-semibold mt-1">Total Profit</p>
                </div>
                <div class="flex items-center justify-between text-xs pt-1">
                    <span class="text-green-500 font-bold flex items-center gap-0.5">
                        4.35% <svg class="w-3 h-3 fill-current rotate-180" viewBox="0 0 24 24"><path d="M12 21l-12-18h24z"/></svg>
                    </span>
                </div>
            </div>

            {{-- Card 3: Total Product --}}
            <div class="bg-white rounded-2xl p-6 border border-[#E8D4C9] shadow-sm flex flex-col justify-between text-left space-y-4">
                <div class="w-11 h-11 bg-gray-100 rounded-full flex items-center justify-center text-xl shrink-0">
                    👜
                </div>
                <div>
                    <p class="text-2xl font-bold text-[#4A3220]">{{ $totalDonuts ?? 14 }}</p>
                    <p class="text-xs text-gray-400 font-semibold mt-1">Total Product</p>
                </div>
                <div class="flex items-center justify-between text-xs pt-1">
                    <span class="text-green-500 font-bold flex items-center gap-0.5">
                        2.59% <svg class="w-3 h-3 fill-current rotate-180" viewBox="0 0 24 24"><path d="M12 21l-12-18h24z"/></svg>
                    </span>
                </div>
            </div>

            {{-- Card 4: Total Users --}}
            <div class="bg-white rounded-2xl p-6 border border-[#E8D4C9] shadow-sm flex flex-col justify-between text-left space-y-4">
                <div class="w-11 h-11 bg-gray-100 rounded-full flex items-center justify-center text-xl shrink-0">
                    👥
                </div>
                <div>
                    <p class="text-2xl font-bold text-[#4A3220]">{{ number_format($totalCustomers) }}</p>
                    <p class="text-xs text-gray-400 font-semibold mt-1">Total Users</p>
                </div>
                <div class="flex items-center justify-between text-xs pt-1">
                    <span class="text-green-500 font-bold flex items-center gap-0.5">
                        0.95% <svg class="w-3 h-3 fill-current rotate-180" viewBox="0 0 24 24"><path d="M12 21l-12-18h24z"/></svg>
                    </span>
                </div>
            </div>
        </div>

        {{-- Charts Row (2 Columns matching TailAdmin style) --}}
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
            {{-- Left: Main Revenue/Sales Line Chart (2 Columns) --}}
            <div class="lg:col-span-2 bg-white rounded-2xl p-6 border border-[#E8D4C9] shadow-sm flex flex-col justify-between text-left space-y-6">
                <div class="flex flex-wrap justify-between items-center gap-4">
                    {{-- Legend keys --}}
                    <div class="flex gap-6">
                        <div class="flex items-center gap-2">
                            <span class="w-3 h-3 rounded-full bg-[#FF4E02]"></span>
                            <div>
                                <p class="text-sm font-bold text-[#4A3220]">Total Revenue</p>
                                <p class="text-[10px] text-gray-400 font-semibold">12.04.2022 - 12.05.2022</p>
                            </div>
                        </div>
                        <div class="flex items-center gap-2">
                            <span class="w-3 h-3 rounded-full bg-[#4A3220]"></span>
                            <div>
                                <p class="text-sm font-bold text-[#4A3220]">Total Sales</p>
                                <p class="text-[10px] text-gray-400 font-semibold">12.04.2022 - 12.05.2022</p>
                            </div>
                        </div>
                    </div>
                    
                    {{-- Toggle Buttons --}}
                    <div class="bg-gray-100 p-1 rounded-xl flex gap-1 text-[11px] font-bold text-gray-500 uppercase tracking-wide shrink-0">
                        <span class="bg-white text-gray-700 px-3 py-1.5 rounded-lg shadow-sm cursor-pointer">Day</span>
                        <span class="px-3 py-1.5 cursor-pointer">Week</span>
                        <span class="px-3 py-1.5 cursor-pointer">Month</span>
                    </div>
                </div>

                {{-- Visual SVG Chart Graph (High fidelity mockup lines) --}}
                <div class="relative w-full h-64 border-b border-gray-100 flex items-end">
                    {{-- Grid lines behind --}}
                    <div class="absolute inset-0 flex flex-col justify-between pointer-events-none opacity-20">
                        <div class="border-t border-[#4A3220] w-full"></div>
                        <div class="border-t border-[#4A3220] w-full"></div>
                        <div class="border-t border-[#4A3220] w-full"></div>
                        <div class="border-t border-[#4A3220] w-full"></div>
                        <div class="border-t border-[#4A3220] w-full"></div>
                    </div>

                    {{-- SVG Line Paths --}}
                    <svg class="absolute inset-0 w-full h-full" viewBox="0 0 600 240" preserveAspectRatio="none">
                        {{-- Light orange gradient fill --}}
                        <defs>
                            <linearGradient id="orangeGrad" x1="0" y1="0" x2="0" y2="1">
                                <stop offset="0%" stop-color="#FF4E02" stop-opacity="0.25"/>
                                <stop offset="100%" stop-color="#FF4E02" stop-opacity="0"/>
                            </linearGradient>
                            <linearGradient id="brownGrad" x1="0" y1="0" x2="0" y2="1">
                                <stop offset="0%" stop-color="#4A3220" stop-opacity="0.15"/>
                                <stop offset="100%" stop-color="#4A3220" stop-opacity="0"/>
                            </linearGradient>
                        </defs>

                        {{-- Line 1 (Revenue - Orange) --}}
                        <path d="M 0,180 Q 50,150 100,160 T 200,100 T 300,150 T 400,90 T 500,120 T 600,60" fill="none" stroke="#FF4E02" stroke-width="4" stroke-linecap="round"/>
                        <path d="M 0,180 Q 50,150 100,160 T 200,100 T 300,150 T 400,90 T 500,120 T 600,60 L 600,240 L 0,240 Z" fill="url(#orangeGrad)"/>
                        
                        {{-- Line 2 (Sales - Brown) --}}
                        <path d="M 0,210 Q 50,190 100,200 T 200,140 T 300,190 T 400,130 T 500,170 T 600,100" fill="none" stroke="#4A3220" stroke-width="3" stroke-linecap="round"/>
                        <path d="M 0,210 Q 50,190 100,200 T 200,140 T 300,190 T 400,130 T 500,170 T 600,100 L 600,240 L 0,240 Z" fill="url(#brownGrad)"/>

                        {{-- Small dots on values --}}
                        <circle cx="200" cy="100" r="5" fill="#FF4E02" stroke="white" stroke-width="2"/>
                        <circle cx="400" cy="90" r="5" fill="#FF4E02" stroke="white" stroke-width="2"/>
                        <circle cx="600" cy="60" r="5" fill="#FF4E02" stroke="white" stroke-width="2"/>
                    </svg>
                </div>
                
                {{-- Months labels --}}
                <div class="flex justify-between text-[10px] font-bold text-gray-400 uppercase tracking-wider px-2">
                    <span>Sep</span>
                    <span>Oct</span>
                    <span>Nov</span>
                    <span>Dec</span>
                    <span>Jan</span>
                    <span>Feb</span>
                    <span>Mar</span>
                    <span>Apr</span>
                    <span>May</span>
                    <span>Jun</span>
                    <span>Jul</span>
                    <span>Aug</span>
                </div>
            </div>

            {{-- Right: Profit this week (1 Column) --}}
            <div class="bg-white rounded-2xl p-6 border border-[#E8D4C9] shadow-sm flex flex-col justify-between text-left space-y-6">
                <div class="flex justify-between items-center">
                    <h3 class="font-black text-sm text-[#4A3220] uppercase tracking-wide">Profit this week</h3>
                    
                    {{-- Timeframe Selector dropdown --}}
                    <select class="rounded-lg text-[10px] font-bold py-1 px-3 border-gray-200 focus:border-[#FF4E02] focus:ring-[#FF4E02] bg-gray-50 text-gray-500 uppercase">
                        <option>This Week</option>
                        <option>Last Week</option>
                    </select>
                </div>

                {{-- Mockup Bar Chart Container using pure HTML/CSS heights --}}
                <div class="flex justify-between items-end h-56 px-2 relative border-b border-gray-100">
                    {{-- Horizontal baseline grids --}}
                    <div class="absolute inset-0 flex flex-col justify-between pointer-events-none opacity-20">
                        <div class="border-t border-[#4A3220] w-full"></div>
                        <div class="border-t border-[#4A3220] w-full"></div>
                        <div class="border-t border-[#4A3220] w-full"></div>
                        <div class="border-t border-[#4A3220] w-full"></div>
                    </div>

                    {{-- Mon --}}
                    <div class="flex flex-col items-center gap-1 w-8 relative z-10">
                        <div class="flex flex-col gap-0.5 w-4 items-end">
                            <div class="bg-blue-400 w-full h-8 rounded-t-sm"></div>
                            <div class="bg-[#FF4E02] w-full h-16 rounded-b-sm"></div>
                        </div>
                        <span class="text-[10px] font-bold text-gray-400 uppercase">M</span>
                    </div>

                    {{-- Tue --}}
                    <div class="flex flex-col items-center gap-1 w-8 relative z-10">
                        <div class="flex flex-col gap-0.5 w-4 items-end">
                            <div class="bg-blue-400 w-full h-12 rounded-t-sm"></div>
                            <div class="bg-[#FF4E02] w-full h-20 rounded-b-sm"></div>
                        </div>
                        <span class="text-[10px] font-bold text-gray-400 uppercase">T</span>
                    </div>

                    {{-- Wed --}}
                    <div class="flex flex-col items-center gap-1 w-8 relative z-10">
                        <div class="flex flex-col gap-0.5 w-4 items-end">
                            <div class="bg-blue-400 w-full h-10 rounded-t-sm"></div>
                            <div class="bg-[#FF4E02] w-full h-18 rounded-b-sm"></div>
                        </div>
                        <span class="text-[10px] font-bold text-gray-400 uppercase">W</span>
                    </div>

                    {{-- Thu --}}
                    <div class="flex flex-col items-center gap-1 w-8 relative z-10">
                        <div class="flex flex-col gap-0.5 w-4 items-end">
                            <div class="bg-blue-400 w-full h-14 rounded-t-sm"></div>
                            <div class="bg-[#FF4E02] w-full h-24 rounded-b-sm"></div>
                        </div>
                        <span class="text-[10px] font-bold text-gray-400 uppercase">T</span>
                    </div>

                    {{-- Fri --}}
                    <div class="flex flex-col items-center gap-1 w-8 relative z-10">
                        <div class="flex flex-col gap-0.5 w-4 items-end">
                            <div class="bg-blue-400 w-full h-6 rounded-t-sm"></div>
                            <div class="bg-[#FF4E02] w-full h-10 rounded-b-sm"></div>
                        </div>
                        <span class="text-[10px] font-bold text-gray-400 uppercase">F</span>
                    </div>

                    {{-- Sat --}}
                    <div class="flex flex-col items-center gap-1 w-8 relative z-10">
                        <div class="flex flex-col gap-0.5 w-4 items-end">
                            <div class="bg-blue-400 w-full h-16 rounded-t-sm"></div>
                            <div class="bg-[#FF4E02] w-full h-22 rounded-b-sm"></div>
                        </div>
                        <span class="text-[10px] font-bold text-gray-400 uppercase">S</span>
                    </div>

                    {{-- Sun --}}
                    <div class="flex flex-col items-center gap-1 w-8 relative z-10">
                        <div class="flex flex-col gap-0.5 w-4 items-end">
                            <div class="bg-blue-400 w-full h-20 rounded-t-sm"></div>
                            <div class="bg-[#FF4E02] w-full h-28 rounded-b-sm"></div>
                        </div>
                        <span class="text-[10px] font-bold text-gray-400 uppercase">S</span>
                    </div>
                </div>
            </div>
        </div>

        {{-- Bottom Table: Recent Customer Orders --}}
        <div class="bg-white rounded-2xl border border-[#E8D4C9] shadow-sm overflow-hidden text-left">
            <div class="p-6 border-b border-[#E8D4C9] bg-[#FAF4EE] flex justify-between items-center">
                <h3 class="font-black text-lg text-[#4A3220] uppercase tracking-wide">Recent Customer Orders</h3>
                <a href="{{ route('admin.orders.index') }}" class="text-xs font-bold text-[#FF4E02] hover:underline uppercase tracking-wide">
                    View All Orders &rarr;
                </a>
            </div>

            <div class="overflow-x-auto">
                <table class="w-full text-left border-collapse">
                    <thead>
                        <tr class="border-b border-[#E8D4C9] bg-gray-50 text-[10px] uppercase font-bold text-gray-400 tracking-wider">
                            <th class="px-6 py-4">Order Number</th>
                            <th class="px-6 py-4">Customer</th>
                            <th class="px-6 py-4">Status</th>
                            <th class="px-6 py-4">Special Notes</th>
                            <th class="px-6 py-4">Total Amount</th>
                            <th class="px-6 py-4 text-right">Action</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-[#E8D4C9] text-sm text-[#4A3220]">
                        @forelse($recentOrders as $order)
                            @php
                                $badgeStyle = match($order->status) {
                                    'pending' => 'bg-amber-50 text-amber-700',
                                    'preparing' => 'bg-blue-50 text-blue-700',
                                    'ready' => 'bg-purple-50 text-purple-700',
                                    'completed' => 'bg-green-50 text-green-700',
                                    'cancelled' => 'bg-red-50 text-red-700',
                                    default => 'bg-gray-50 text-gray-700'
                                };
                            @endphp
                            <tr class="hover:bg-gray-50/50 transition-colors">
                                <td class="px-6 py-4 font-mono font-bold">{{ $order->order_number }}</td>
                                <td class="px-6 py-4">
                                    <div class="font-bold">{{ $order->user->name }}</div>
                                    <div class="text-xs text-gray-400 font-semibold">{{ $order->user->email }}</div>
                                </td>
                                <td class="px-6 py-4">
                                    <span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full text-xs font-bold uppercase tracking-wider {{ $badgeStyle }}">
                                        {{ $order->status }}
                                    </span>
                                </td>
                                <td class="px-6 py-4 truncate max-w-[200px]">
                                    @if($order->notes)
                                        <span class="text-xs italic text-[#8B644D]">"{{ $order->notes }}"</span>
                                    @else
                                        <span class="text-gray-300 text-xs italic">No instructions</span>
                                    @endif
                                </td>
                                <td class="px-6 py-4 font-black">RM {{ number_format($order->total_amount, 2) }}</td>
                                <td class="px-6 py-4 text-right">
                                    <a href="{{ route('admin.orders.show', $order) }}" 
                                       class="px-4 py-1.5 bg-[#4A3220] hover:bg-[#FF4E02] text-white text-xs font-bold rounded-full transition-all uppercase tracking-wide">
                                        Details
                                    </a>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6" class="px-6 py-12 text-center text-gray-400 font-bold">
                                    No customer orders found.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>

    </div>
@endsection
