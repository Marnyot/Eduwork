<?php

namespace Database\Seeders;

use App\Models\ProductCategory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductCategorySeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [
            ['name' => 'Elektronik', 'slug' => 'elektronik'],
            ['name' => 'Fashion', 'slug' => 'fashion'],
            ['name' => 'Rumah & Hidup', 'slug' => 'rumah-dan-hidup'],
            ['name' => 'Kesehatan & Kecantikan', 'slug' => 'kesehatan-dan-kecantikan'],
            ['name' => 'Olahraga & Outdoor', 'slug' => 'olahraga-dan-outdoor'],
            ['name' => 'Buku & Alat Tulis', 'slug' => 'buku-dan-alat-tulis'],
        ];

        foreach ($categories as $category) {
            ProductCategory::query()->updateOrCreate(['slug' => $category['slug']], $category);
        }
    }
}
