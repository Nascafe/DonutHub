<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class CategorySeeder extends Seeder
{
    public function run(): void
    {
        $categories = [
            [
                'name' => 'Classic',
                'slug' => 'classic',
                'description' => 'Our timeless favorites that never go out of style. Simple, delicious, and always satisfying.',
            ],
            [
                'name' => 'Glazed',
                'slug' => 'glazed',
                'description' => 'Sweet, shiny glazes that add extra indulgence to every bite.',
            ],
            [
                'name' => 'Filled',
                'slug' => 'filled',
                'description' => 'Surprise inside! Cream, jam, and chocolate-filled donuts for the adventurous.',
            ],
            [
                'name' => 'Limited Edition',
                'slug' => 'limited-edition',
                'description' => 'Exclusive flavors available for a limited time only. Get them before they\'re gone!',
            ],
            [
                'name' => 'Box Sets',
                'slug' => 'box-sets',
                'description' => 'Perfect for sharing! Choose from our curated box sets for parties and gatherings.',
            ],
        ];

        foreach ($categories as $category) {
            Category::create($category);
        }
    }
}
