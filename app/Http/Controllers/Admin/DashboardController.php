<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\User;
use App\Models\Donut;
use App\Models\Category;
use Carbon\Carbon;

class DashboardController extends Controller
{
    public function index()
    {
        $totalOrders = Order::count();
        $totalRevenue = Order::where('status', 'completed')->sum('total_amount');
        $totalCustomers = User::where('role', 'customer')->count();
        $totalDonuts = Donut::count();

        $pendingOrders = Order::where('status', 'pending')->count();
        $preparingOrders = Order::where('status', 'preparing')->count();

        $recentOrders = Order::with('user', 'items.donut')->latest()->take(5)->get();

        // Monthly revenue for chart
        $monthlyRevenue = Order::where('status', 'completed')
            ->where('created_at', '>=', Carbon::now()->subMonths(6))
            ->selectRaw('strftime("%m", created_at) as month, SUM(total_amount) as total')
            ->groupBy('month')
            ->orderBy('month')
            ->pluck('total', 'month')
            ->toArray();

        // Top selling donuts
        $topDonuts = Donut::withCount('orderItems')
            ->orderByDesc('order_items_count')
            ->take(5)
            ->get();

        return view('admin.dashboard', compact(
            'totalOrders', 'totalRevenue', 'totalCustomers', 'totalDonuts',
            'pendingOrders', 'preparingOrders', 'recentOrders',
            'monthlyRevenue', 'topDonuts'
        ));
    }
}
