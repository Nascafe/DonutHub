<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Http\Request;

class CheckoutController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'payment_method' => 'required|string',
            'notes' => 'nullable|string|max:500',
        ]);

        $cart = auth()->user()->cart;

        if (!$cart || $cart->items->isEmpty()) {
            return redirect()->route('cart.index')->with('error', 'Your cart is empty!');
        }

        $cart->load('items.donut');

        $order = Order::create([
            'user_id' => auth()->id(),
            'order_number' => Order::generateOrderNumber(),
            'total_amount' => $cart->total,
            'status' => 'pending',
            'type' => 'online',
            'notes' => $request->notes,
            'payment_method' => $request->payment_method,
        ]);

        foreach ($cart->items as $item) {
            OrderItem::create([
                'order_id' => $order->id,
                'donut_id' => $item->donut_id,
                'quantity' => $item->quantity,
                'price' => $item->donut->price,
            ]);

            // Reduce stock
            $item->donut->decrement('stock', $item->quantity);
        }

        // Clear cart
        $cart->items()->delete();

        return redirect()->route('orders.show', $order)->with('success', 'Order placed successfully!');
    }
}
