<?php

namespace Database\Seeders;

use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Product;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class OrderSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = [
            ['name' => 'Andi Pratama', 'email' => 'andi.pratama@example.com', 'phone' => '081234567801'],
            ['name' => 'Siti Rahmawati', 'email' => 'siti.rahmawati@example.com', 'phone' => '081234567802'],
            ['name' => 'Budi Santoso', 'email' => 'budi.santoso@example.com', 'phone' => '081234567803'],
            ['name' => 'Dewi Lestari', 'email' => 'dewi.lestari@example.com', 'phone' => '081234567804'],
            ['name' => 'Rizky Ramadhan', 'email' => 'rizky.ramadhan@example.com', 'phone' => '081234567805'],
            ['name' => 'Maya Anggraini', 'email' => 'maya.anggraini@example.com', 'phone' => '081234567806'],
            ['name' => 'Agus Wijaya', 'email' => 'agus.wijaya@example.com', 'phone' => '081234567807'],
            ['name' => 'Rina Kusuma', 'email' => 'rina.kusuma@example.com', 'phone' => '081234567808'],
        ];

        $userIds = [];
        foreach ($users as $user) {
            $userIds[] = User::query()->updateOrCreate(
                ['email' => $user['email']],
                ['name' => $user['name'], 'phone' => $user['phone'], 'password' => bcrypt('password')],
            )->id;
        }

        $products = Product::query()->pluck('price', 'id')->all();
        $statuses = ['pending', 'processing', 'completed', 'cancelled'];
        $paymentMethods = ['bank_transfer', 'e_wallet', 'cod'];
        $cities = ['Jakarta', 'Bandung', 'Surabaya', 'Yogyakarta', 'Semarang', 'Medan'];
        $addresses = ['Jl. Merdeka No. 12', 'Jl. Sudirman No. 45', 'Jl. Diponegoro No. 8', 'Jl. Gajah Mada No. 21'];

        foreach (range(1, 40) as $index) {
            $userId = $userIds[array_rand($userIds)];
            $user = User::find($userId);

            $itemCount = random_int(1, 3);
            $items = [];
            $totalAmount = 0;

            foreach (range(1, $itemCount) as $i) {
                $productId = array_rand($products);
                $quantity = random_int(1, 3);
                $price = $products[$productId];

                $items[] = [
                    'product_id' => $productId,
                    'quantity' => $quantity,
                    'price' => $price,
                ];
                $totalAmount += $price * $quantity;
            }

            $order = Order::query()->create([
                'order_number' => 'ORD-'.strtoupper(Str::random(8)),
                'customer_name' => $user->name,
                'customer_phone' => $user->phone,
                'customer_address' => $addresses[array_rand($addresses)].', '.$cities[array_rand($cities)],
                'total_amount' => $totalAmount,
                'status' => $statuses[array_rand($statuses)],
                'payment_method' => $paymentMethods[array_rand($paymentMethods)],
                'user_id' => $userId,
            ]);

            foreach ($items as $item) {
                OrderItem::query()->create([
                    'order_id' => $order->id,
                    ...$item,
                ]);
            }
        }
    }
}
