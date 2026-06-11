<?php

namespace App\Http\Controllers;

use App\Models\Donut;
use App\Models\Category;
use App\Models\Review;

class HomeController extends Controller
{
    public function index()
    {
        $featuredDonuts = Donut::where('is_featured', true)->where('is_available', true)->take(6)->get();
        $limitedDonuts = Donut::where('is_limited', true)->where('is_available', true)->get();
        $categories = Category::withCount('donuts')->get();
        $reviews = Review::with('user')->latest()->take(3)->get();

        return view('home', compact('featuredDonuts', 'limitedDonuts', 'categories', 'reviews'));
    }

    public function about()
    {
        return view('about');
    }
}
