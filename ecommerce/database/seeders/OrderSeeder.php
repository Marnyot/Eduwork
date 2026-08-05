<?php

namespace Database\Seeders;

use App\Models\Order;
use App\Models\Product;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class OrderSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = [
            ['name' => 'Andi Pratama', 'email' => 'andi.pratama@example.com'],
            ['name' => 'Siti Rahmawati', 'email' => 'siti.rahmawati@example.com'],
            ['name' => 'Budi Santoso', 'email' => 'budi.santoso@example.com'],
            ['name' => 'Dewi Lestari', 'email' => 'dewi.lestari@example.com'],
            ['name' => 'Rizky Ramadhan', 'email' => 'rizky.ramadhan@example.com'],
            ['name' => 'Maya Anggraini', 'email' => 'maya.anggraini@example.com'],
            ['name' => 'Agus Wijaya', 'email' => 'agus.wijaya@example.com'],
            ['name' => 'Rina Kusuma', 'email' => 'rina.kusuma@example.com'],
        ];

        $ids = [];
        foreach ($users as $user) {
            $ids[] = User::query()->updateOrCreate(
                ['email' => $user['email']],
                ['name' => $user['name'], 'password' => bcrypt('password')],
            )->id;
        }

        $productIds = Product::query()->pluck('price', 'id')->all();
        $statuses = ['pending', 'processing', 'completed', 'cancelled'];
        $orders = [];

        foreach (range(1, 40) as $index) {
            $productId = array_rand($productIds);
            $quantity = random_int(1, 3);

            $orders[] = [
                'user_id' => $ids[array_rand($ids)],
                'product_id' => $productId,
                'quantity' => $quantity,
                'total' => $productIds[$productId] * $quantity,
                'status' => $statuses[array_rand($statuses)],
                'created_at' => now()->subDays(random_int(0, 30)),
                'updated_at' => now()->subDays(random_int(0, 30)),
            ];
        }

        Order::query()->insert($orders);
    }
}
