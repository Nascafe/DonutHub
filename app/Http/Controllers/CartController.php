<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\CartItem;
use App\Models\Donut;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function index()
    {
        $cart = auth()->user()->cart;
        if ($cart) {
            $cart->load('items.donut');
        }
        return view('cart.index', compact('cart'));
    }

    public function add(Request $request, Donut $donut)
    {
        $request->validate(['quantity' => 'integer|min:1|max:99']);
        $quantity = $request->input('quantity', 1);

        $cart = auth()->user()->cart ?? Cart::create(['user_id' => auth()->id()]);

        $cartItem = $cart->items()->where('donut_id', $donut->id)->first();

        if ($cartItem) {
            $cartItem->update(['quantity' => $cartItem->quantity + $quantity]);
        } else {
            $cart->items()->create([
                'donut_id' => $donut->id,
                'quantity' => $quantity,
            ]);
        }

        return redirect()->back()->with('success', $donut->name . ' added to cart!');
    }

    public function update(Request $request, CartItem $cartItem)
    {
        $request->validate(['quantity' => 'required|integer|min:1|max:99']);
        $cartItem->update(['quantity' => $request->quantity]);

        return redirect()->route('cart.index')->with('success', 'Cart updated!');
    }

    public function remove(CartItem $cartItem)
    {
        $cartItem->delete();
        return redirect()->route('cart.index')->with('success', 'Item removed from cart!');
    }
}
