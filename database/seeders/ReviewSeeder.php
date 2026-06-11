<?php

namespace Database\Seeders;

use App\Models\Review;
use App\Models\User;
use Illuminate\Database\Seeder;

class ReviewSeeder extends Seeder
{
    public function run(): void
    {
        $customer = User::where('role', 'customer')->first();

        Review::create([
            'user_id' => $customer->id,
            'rating' => 5,
            'comment' => 'Best donuts in town! The Pisstaco is absolutely amazing. Will definitely come back for more!',
        ]);

        Review::create([
            'user_id' => $customer->id,
            'rating' => 4,
            'comment' => 'Love the variety of flavors. The Chocked donut is a chocolate lover\'s dream. Great experience overall!',
        ]);

        Review::create([
            'user_id' => $customer->id,
            'rating' => 5,
            'comment' => 'The Dozen Box was perfect for our office party. Everyone loved them! Fresh and delicious.',
        ]);
    }
}
