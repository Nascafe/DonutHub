<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\Donut;
use Carbon\Carbon;

class ReportController extends Controller
{
    public function index()
    {
        $totalRevenue = Order::where('status', 'completed')->sum('total_amount');
        $monthlyRevenue = Order::where('status', 'completed')
            ->where('created_at', '>=', Carbon::now()->subMonths(6))
            ->sum('total_amount');

        $totalOrders = Order::count();
        $completedOrders = Order::where('status', 'completed')->count();
        $cancelledOrders = Order::where('status', 'cancelled')->count();

        $topDonuts = Donut::withCount('orderItems')
            ->orderByDesc('order_items_count')
            ->take(10)
            ->get();

        $ordersByStatus = Order::selectRaw('status, COUNT(*) as count')
            ->groupBy('status')
            ->pluck('count', 'status')
            ->toArray();

        $ordersByType = Order::selectRaw('type, COUNT(*) as count')
            ->groupBy('type')
            ->pluck('count', 'type')
            ->toArray();

        return view('admin.reports', compact(
            'totalRevenue', 'monthlyRevenue', 'totalOrders',
            'completedOrders', 'cancelledOrders', 'topDonuts',
            'ordersByStatus', 'ordersByType'
        ));
    }
}
