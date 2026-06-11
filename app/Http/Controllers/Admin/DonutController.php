<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Donut;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class DonutController extends Controller
{
    public function index()
    {
        $donuts = Donut::with('category')->latest()->paginate(10);
        return view('admin.donuts.index', compact('donuts'));
    }

    public function create()
    {
        $categories = Category::all();
        return view('admin.donuts.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'price' => 'required|numeric|min:0',
            'category_id' => 'required|exists:categories,id',
            'stock' => 'required|integer|min:0',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'is_featured' => 'nullable|boolean',
            'is_limited' => 'nullable|boolean',
            'is_available' => 'nullable|boolean',
        ]);

        $data = $request->except('image');
        $data['slug'] = Str::slug($request->name);
        $data['is_featured'] = $request->has('is_featured');
        $data['is_limited'] = $request->has('is_limited');
        $data['is_available'] = $request->has('is_available') ? true : true;

        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('donuts', 'public');
            $data['image'] = 'storage/' . $path;
        }

        Donut::create($data);

        return redirect()->route('admin.donuts.index')->with('success', 'Donut created successfully!');
    }

    public function edit(Donut $donut)
    {
        $categories = Category::all();
        return view('admin.donuts.edit', compact('donut', 'categories'));
    }

    public function update(Request $request, Donut $donut)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'price' => 'required|numeric|min:0',
            'category_id' => 'required|exists:categories,id',
            'stock' => 'required|integer|min:0',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $data = $request->except('image');
        $data['slug'] = Str::slug($request->name);
        $data['is_featured'] = $request->has('is_featured');
        $data['is_limited'] = $request->has('is_limited');
        $data['is_available'] = $request->has('is_available');

        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('donuts', 'public');
            $data['image'] = 'storage/' . $path;
        }

        $donut->update($data);

        return redirect()->route('admin.donuts.index')->with('success', 'Donut updated successfully!');
    }

    public function destroy(Donut $donut)
    {
        $donut->delete();
        return redirect()->route('admin.donuts.index')->with('success', 'Donut deleted successfully!');
    }
}
