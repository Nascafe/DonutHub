<?php

namespace Database\Seeders;

use App\Models\Donut;
use App\Models\Category;
use Illuminate\Database\Seeder;

class DonutSeeder extends Seeder
{
    public function run(): void
    {
        $classic = Category::where('slug', 'classic')->first();
        $glazed = Category::where('slug', 'glazed')->first();
        $filled = Category::where('slug', 'filled')->first();
        $limited = Category::where('slug', 'limited-edition')->first();
        $boxSets = Category::where('slug', 'box-sets')->first();

        $donuts = [
            // Classic
            [
                'name' => 'Sugar-Coat',
                'slug' => 'sugar-coat',
                'description' => 'A classic donut with a beautiful pink strawberry glaze and colorful rainbow sprinkles. Sweet, fun, and irresistible!',
                'price' => 4.00,
                'image' => 'images/donuts/sugar-coat.png',
                'category_id' => $classic->id,
                'stock' => 50,
                'is_featured' => true,
            ],
            [
                'name' => 'Melted Mellow',
                'slug' => 'melted-mellow',
                'description' => 'Rich dark chocolate glaze that melts in your mouth. A chocolate lover\'s dream come true!',
                'price' => 4.00,
                'image' => 'images/donuts/melted-mellow.png',
                'category_id' => $classic->id,
                'stock' => 45,
                'is_featured' => true,
            ],
            [
                'name' => 'Prinkles',
                'slug' => 'prinkles',
                'description' => 'White vanilla glaze covered in colorful sprinkles. Fun, festive, and perfect for any occasion!',
                'price' => 4.00,
                'image' => 'images/donuts/prinkles.png',
                'category_id' => $glazed->id,
                'stock' => 40,
                'is_featured' => true,
            ],
            // Glazed
            [
                'name' => 'Honey Glaze',
                'slug' => 'honey-glaze',
                'description' => 'A warm, golden honey glaze over a perfectly baked donut. Simple elegance in every bite.',
                'price' => 3.50,
                'image' => 'images/donuts/sugar-coat.png',
                'category_id' => $glazed->id,
                'stock' => 35,
            ],
            [
                'name' => 'Maple Dream',
                'slug' => 'maple-dream',
                'description' => 'Smooth maple glaze with a hint of cinnamon. A breakfast favorite!',
                'price' => 4.50,
                'image' => 'images/donuts/melted-mellow.png',
                'category_id' => $glazed->id,
                'stock' => 30,
            ],
            // Filled
            [
                'name' => 'Cream Burst',
                'slug' => 'cream-burst',
                'description' => 'Filled with luscious vanilla cream and dusted with powdered sugar. A creamy delight!',
                'price' => 5.00,
                'image' => 'images/donuts/prinkles.png',
                'category_id' => $filled->id,
                'stock' => 25,
            ],
            [
                'name' => 'Berry Jam',
                'slug' => 'berry-jam',
                'description' => 'Stuffed with mixed berry jam and topped with a sugar glaze. Fruity and fabulous!',
                'price' => 5.00,
                'image' => 'images/donuts/sugar-coat.png',
                'category_id' => $filled->id,
                'stock' => 20,
            ],
            // Limited Edition
            [
                'name' => 'Pisstaco',
                'slug' => 'pisstaco',
                'description' => 'THE ALL NEW LIMITED PISTACHIO DONUT! Bright green pistachio glaze with crushed pistachio nuts. Taste the green!',
                'price' => 6.00,
                'image' => 'images/donuts/pisstaco.png',
                'category_id' => $limited->id,
                'stock' => 15,
                'is_featured' => true,
                'is_limited' => true,
            ],
            [
                'name' => 'Chocked',
                'slug' => 'chocked',
                'description' => 'Get Chocked! Triple chocolate overload with milk chocolate glaze, white chocolate drizzle, and chocolate chips!',
                'price' => 6.00,
                'image' => 'images/donuts/chocked.png',
                'category_id' => $limited->id,
                'stock' => 15,
                'is_featured' => true,
                'is_limited' => true,
            ],
            [
                'name' => 'FortNuts',
                'slug' => 'fortnuts',
                'description' => 'Caramel glaze topped with a medley of crushed nuts and caramel sauce drizzle. Nutty and irresistible!',
                'price' => 5.50,
                'image' => 'images/donuts/fortnuts.png',
                'category_id' => $limited->id,
                'stock' => 20,
                'is_limited' => true,
            ],
            // Box Sets
            [
                'name' => 'Party of Three',
                'slug' => 'party-of-three',
                'description' => 'Choose any 3 freshly made donuts with your favorite flavors, glazes, and toppings. Perfect for sharing!',
                'price' => 10.00,
                'image' => 'images/donuts/prinkles.png',
                'category_id' => $boxSets->id,
                'stock' => 20,
            ],
            [
                'name' => 'Half-Dozen Box',
                'slug' => 'half-dozen-box',
                'description' => 'Pick any 6 delicious donuts and create your own flavor combination. Perfect for small cravings!',
                'price' => 18.00,
                'image' => 'images/donuts/melted-mellow.png',
                'category_id' => $boxSets->id,
                'stock' => 15,
                'is_featured' => true,
            ],
            [
                'name' => 'The Dozen Box',
                'slug' => 'the-dozen-box',
                'description' => 'Enjoy 12 freshly made donuts customized with your favorite flavors. Perfect for parties and celebrations!',
                'price' => 32.00,
                'image' => 'images/donuts/chocked.png',
                'category_id' => $boxSets->id,
                'stock' => 10,
                'is_featured' => true,
            ],
        ];

        foreach ($donuts as $donut) {
            Donut::create($donut);
        }
    }
}
