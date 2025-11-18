<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Product;

class ProductSeeder extends Seeder
{
    public function run()
    {
        $products = [
            [
                'name' => 'Mobile Phone',
                'description' => 'Latest Android smartphone with amazing features.',
                'price' => 15000,
                'stock' => 50,
            ],
            [
                'name' => 'Laptop',
                'description' => 'High performance laptop suitable for work and gaming.',
                'price' => 55000,
                'stock' => 20,
            ],
            [
                'name' => 'Smart Watch',
                'description' => 'Fitness watch with heart rate tracking.',
                'price' => 3000,
                'stock' => 100,
            ],
            [
                'name' => 'Headphones',
                'description' => 'Wireless headphones with noise cancellation.',
                'price' => 2000,
                'stock' => 70,
            ],
            [
                'name' => 'Tablet',
                'description' => '10-inch tablet suitable for media and reading.',
                'price' => 12000,
                'stock' => 30,
            ],
            [
                'name' => 'Bluetooth Speaker',
                'description' => 'Portable speaker with deep bass.',
                'price' => 2500,
                'stock' => 40,
            ],
            [
                'name' => 'Gaming Keyboard',
                'description' => 'Mechanical keyboard with RGB lights.',
                'price' => 3500,
                'stock' => 25,
            ],
            [
                'name' => 'Gaming Mouse',
                'description' => 'High DPI gaming mouse with custom buttons.',
                'price' => 1500,
                'stock' => 60,
            ],
            [
                'name' => 'Monitor',
                'description' => '24-inch Full HD LED monitor.',
                'price' => 9000,
                'stock' => 18,
            ],
            [
                'name' => 'Printer',
                'description' => 'All-in-one inkjet printer.',
                'price' => 8000,
                'stock' => 12,
            ],
            [
                'name' => 'Power Bank',
                'description' => '10000 mAh fast charging power bank.',
                'price' => 1200,
                'stock'=> 80,
            ],
            [
                'name' => 'External Hard Drive',
                'description' => '1TB USB 3.0 external hard drive.',
                'price' => 4500,
                'stock' => 22,
            ],
            [
                'name' => 'USB Flash Drive',
                'description' => '64GB high-speed pen drive.',
                'price' => 600,
                'stock' => 200,
            ],
            [
                'name' => 'WiFi Router',
                'description' => 'Dual-band router with 5GHz support.',
                'price' => 2200,
                'stock' => 35,
            ],
            [
                'name' => 'Smart TV',
                'description' => '42-inch 4K Android Smart TV.',
                'price' => 30000,
                'stock' => 14,
            ],
            [
                'name' => 'Camera',
                'description' => 'DSLR camera with 24MP sensor.',
                'price' => 45000,
                'stock' => 10,
            ],
            [
                'name' => 'Earbuds',
                'description' => 'TWS earbuds with noise isolation.',
                'price' => 1800,
                'stock' => 90,
            ],
            [
                'name' => 'Microphone',
                'description' => 'USB condenser microphone for recording.',
                'price' => 3500,
                'stock' => 28,
            ],
            [
                'name' => 'VR Headset',
                'description' => 'Virtual reality headset with controllers.',
                'price' => 15000,
                'stock' => 8,
            ],
            [
                'name' => 'Graphic Tablet',
                'description' => 'Digital drawing tablet for designers.',
                'price' => 5000,
                'stock' => 20,
            ],
        ];

        foreach ($products as $product) {
            Product::create($product);
        }
    }
}
