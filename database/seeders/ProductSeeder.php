<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Product;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $products = [
            [
                'name' => 'realme C67 5G (Sunny Oasis, 128 GB) (4 GB RAM)',
                'slug' => 'realme C67 5G (Sunny Oasis, 128 GB) (4 GB RAM)',
                'stripe_product' => 'price_1OjwIaSBjzLJAryK8ZOInssT',
                'price' => 12000,
                'description' => 'Experience the future with the Realme C67 5G. Powered by an incredible 6 nm chipset, it delivers unparalleled speed and efficiency. Swiftly recharge with the 33 W SUPERVOOC Charge, reaching 50% in just 29 minutes.'
            ],
            [
                'name' => 'Motorola G34 5G (Ocean Green, 128 GB) (8 GB RAM)',
                'slug' => 'Motorola G34 5G (Ocean Green, 128 GB) (8 GB RAM)',
                'stripe_product' => 'price_1OjwK8SBjzLJAryK9YHvMZ2Y',
                'price' => 25000,
                'description' => 'Look no further than the amazing Moto G34 5G smartphone, which is built to improve performance and add sophistication to your life.'
            ],
            [
                'name' => 'vivo T2 5G (Velocity Wave, 128 GB) (6 GB RAM)',
                'slug' => 'vivo T2 5G (Velocity Wave, 128 GB) (6 GB RAM)',
                'stripe_product' => 'price_1OjwKlSBjzLJAryKWPZvT9LS',
                'price' => 10000,
                'description' => 'The Vivo T2 5G smartphone has an FHD+ AMOLED display for easy access and immersive viewing. The 90 Hz AMOLED display allows you to multitask easily. It has a 64 MP OIS an'
            ],
            [
                'name' => 'Apple iPhone 15 (Blue, 128 GB)',
                'slug' => 'Apple iPhone 15 (Blue, 128 GB)',
                'stripe_product' => 'price_1OjwLVSBjzLJAryK2hdNGj5J',
                'price' => 25000,
                'description' => 'Experience the iPhone 15 – your dynamic companion. Dynamic Island ensures you stay connected, bubbling up alerts seamlessly while you are busy.'
            ]
        ];

        foreach ($products as $product) {
            Product::create($product);
        }
    }
}