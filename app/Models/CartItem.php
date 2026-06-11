<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CartItem extends Model
{
    use HasFactory;

    protected $fillable = [
        'cart_id',
        'donut_id',
        'quantity',
    ];

    public function cart()
    {
        return $this->belongsTo(Cart::class);
    }

    public function donut()
    {
        return $this->belongsTo(Donut::class);
    }

    public function getSubtotalAttribute()
    {
        return $this->donut->price * $this->quantity;
    }
}
