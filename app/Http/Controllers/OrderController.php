<?php

namespace App\Http\Controllers;

use App\Models\Order;

class OrderController extends Controller
{
    public function index()
    {
        $orders = auth()->user()->orders()->with('items.donut')->latest()->paginate(10);
        return view('orders.index', compact('orders'));
    }

    public function show(Order $order)
    {
        if ($order->user_id !== auth()->id() && !auth()->user()->isAdmin() && !auth()->user()->isStaff()) {
            abort(403);
        }

        $order->load('items.donut', 'user');
        return view('orders.show', compact('order'));
    }
}
