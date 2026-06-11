<?php

namespace App\Http\Controllers;

use App\Models\Donut;
use App\Models\Category;

class MenuController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        $donuts = Donut::where('is_available', true)->with('category')->get();
        $selectedCategory = null;

        return view('menu.index', compact('categories', 'donuts', 'selectedCategory'));
    }

    public function category(Category $category)
    {
        $categories = Category::all();
        $donuts = $category->donuts()->where('is_available', true)->get();
        $selectedCategory = $category;

        return view('menu.index', compact('categories', 'donuts', 'selectedCategory'));
    }

    public function show(Donut $donut)
    {
        $donut->load('category');
        $relatedDonuts = Donut::where('category_id', $donut->category_id)
            ->where('id', '!=', $donut->id)
            ->where('is_available', true)
            ->take(4)
            ->get();

        return view('menu.show', compact('donut', 'relatedDonuts'));
    }
}
