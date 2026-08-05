<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $products = [
            ['name' => 'Smartphone Galaxy S24 8/256GB', 'desc' => 'Ponsel flagship dengan layar AMOLED 6,2 inci, kamera 50MP, dan baterai tahan seharian.', 'price' => 12499000, 'stock' => 25, 'category' => 'elektronik'],
            ['name' => 'Laptop ProBook 14 16GB/512GB SSD', 'desc' => 'Laptop ringan 1,4 kg dengan prosesor Intel Core i7, cocok untuk kerja dan kuliah.', 'price' => 14500000, 'stock' => 12, 'category' => 'elektronik'],
            ['name' => 'Earbuds TWS Pro ANC', 'desc' => 'TWS dengan peredam bising aktif, water resistance IPX5, dan daya tahan 30 jam.', 'price' => 899000, 'stock' => 80, 'category' => 'elektronik'],
            ['name' => 'Smart TV 43" Ultra HD 4K', 'desc' => 'TV 4K dengan HDR10+, Android TV, dan bezel tipis untuk pengalaman menonton terbaik.', 'price' => 3999000, 'stock' => 18, 'category' => 'elektronik'],
            ['name' => 'Kamera Mirrorless EOS R50', 'desc' => 'Kamera mirrorless 24MP dengan video 4K, ideal untuk content creator.', 'price' => 9800000, 'stock' => 9, 'category' => 'elektronik'],
            ['name' => 'Kemeja Oxford Pria Lengan Panjang', 'desc' => 'Kemeja bahan katun oxford premium, adem, dan tidak mudah kusut.', 'price' => 179000, 'stock' => 150, 'category' => 'fashion'],
            ['name' => 'Kaos Polos Oversize Pria/Wanita', 'desc' => 'Kaos polos bahan cotton combed 30s, nyaman dipakai sehari-hari.', 'price' => 65000, 'stock' => 300, 'category' => 'fashion'],
            ['name' => 'Sneakers Running Ultralight', 'desc' => 'Sepatu lari berbobot ringan dengan sol empuk dan outsole anti slip.', 'price' => 450000, 'stock' => 60, 'category' => 'fashion'],
            ['name' => 'Jaket Hoodie Sweater Premium', 'desc' => 'Hoodie tebal berbahan fleece, hangat dan cocok untuk cuaca dingin.', 'price' => 210000, 'stock' => 95, 'category' => 'fashion'],
            ['name' => 'Tas Ransel Anti Air 30L', 'desc' => 'Ransel multifungsi dengan kompartemen laptop 15,6 inci dan bahan anti air.', 'price' => 320000, 'stock' => 40, 'category' => 'fashion'],
            ['name' => 'Air Fryer 5,5L Low Watt', 'desc' => 'Penggorengan tanpa minyak kapasitas 5,5L dengan kontrol digital.', 'price' => 689000, 'stock' => 35, 'category' => 'rumah-dan-hidup'],
            ['name' => 'Set Peralatan Dapur 12 Pcs', 'desc' => 'Peralatan masak lengkap berbahan stainless steel food grade.', 'price' => 275000, 'stock' => 55, 'category' => 'rumah-dan-hidup'],
            ['name' => 'Kasur Lipat Busa Tebal 10cm', 'desc' => 'Kasur busa lipat tiga dengan ketebalan 10cm, mudah disimpan.', 'price' => 450000, 'stock' => 20, 'category' => 'rumah-dan-hidup'],
            ['name' => 'Lampu Meja LED Dimmable', 'desc' => 'Lampu belajar LED dengan 5 tingkat kecerahan dan pengisian USB.', 'price' => 125000, 'stock' => 110, 'category' => 'rumah-dan-hidup'],
            ['name' => 'Set Bed Cover Anti Alergi', 'desc' => 'Bed cover berbahan katun jepang halus, motif elegan, satu set lengkap.', 'price' => 389000, 'stock' => 28, 'category' => 'rumah-dan-hidup'],
            ['name' => 'Vitamin C 1000mg Isi 30 Kapsul', 'desc' => 'Suplemen vitamin C untuk daya tahan tubuh, mudah dikonsumsi.', 'price' => 45000, 'stock' => 500, 'category' => 'kesehatan-dan-kecantikan'],
            ['name' => 'Serum Wajah Niacinamide 10%', 'desc' => 'Serum pencerah wajah dengan niacinamide dan hyaluronic acid.', 'price' => 98000, 'stock' => 200, 'category' => 'kesehatan-dan-kecantikan'],
            ['name' => 'Sunblock SPF 50 PA++++', 'desc' => 'Tabir surya ringan, tidak lengket, dan aman untuk kulit sensitif.', 'price' => 75000, 'stock' => 250, 'category' => 'kesehatan-dan-kecantikan'],
            ['name' => 'Masker Wajah Hijau 60 Gram', 'desc' => 'Masker lumpur detoks yang membersihkan pori-pori secara mendalam.', 'price' => 35000, 'stock' => 180, 'category' => 'kesehatan-dan-kecantikan'],
            ['name' => 'Shampo Anti Rontok 300ml', 'desc' => 'Shampo dengan biotin dan keratin untuk mengurangi rambut rontok.', 'price' => 58000, 'stock' => 140, 'category' => 'kesehatan-dan-kecantikan'],
            ['name' => 'Sepeda Lipat 16 Inci Alloy', 'desc' => 'Sepeda lipat ringan dengan rangka alloy dan 7 percepatan.', 'price' => 2350000, 'stock' => 8, 'category' => 'olahraga-dan-outdoor'],
            ['name' => 'Matras Yoga TPE Tebal 8mm', 'desc' => 'Matras yoga anti selip dengan permukaan lembut dan mudah dibersihkan.', 'price' => 149000, 'stock' => 75, 'category' => 'olahraga-dan-outdoor'],
            ['name' => 'Dumbbell Set 20kg Neoprene', 'desc' => 'Set dumbell dengan lapisan neoprene, aman dan nyaman digenggam.', 'price' => 385000, 'stock' => 30, 'category' => 'olahraga-dan-outdoor'],
            ['name' => 'Bola Futsal Ukuran 4 Standar', 'desc' => 'Bola futsal kulit sintetis dengan jahitan kuat dan pantulan stabil.', 'price' => 165000, 'stock' => 65, 'category' => 'olahraga-dan-outdoor'],
            ['name' => 'Tenda Camping 4 Orang Waterproof', 'desc' => 'Tenda dome 4 orang, tahan air tinggi, dan mudah dipasang.', 'price' => 850000, 'stock' => 15, 'category' => 'olahraga-dan-outdoor'],
            ['name' => 'Novel Bumi Manusia - Pramoedya', 'desc' => 'Novel klasik Indonesia karya Pramoedya Ananta Toer, cetakan terbaru.', 'price' => 95000, 'stock' => 90, 'category' => 'buku-dan-alat-tulis'],
            ['name' => 'Pulpen Gel 0,5mm Isi 10', 'desc' => 'Paket pulpen gel ujung 0,5mm dengan tinta halus dan tidak luntur.', 'price' => 28000, 'stock' => 400, 'category' => 'buku-dan-alat-tulis'],
            ['name' => 'Buku Tulis Isi 38 Lembar (1 Lusin)', 'desc' => 'Buku tulis kertas 70gsm, halaman rata dan nyaman ditulis.', 'price' => 42000, 'stock' => 320, 'category' => 'buku-dan-alat-tulis'],
            ['name' => 'Mata Pelajaran Fisika SMA Kelas 10', 'desc' => 'Buku pelajaran fisika kurikulum merdeka untuk kelas 10 SMA.', 'price' => 88000, 'stock' => 70, 'category' => 'buku-dan-alat-tulis'],
            ['name' => 'Sticky Notes Warna Warni 4x4cm', 'desc' => 'Sticky notes isi 100 lembar per blok, 5 warna dalam satu paket.', 'price' => 18500, 'stock' => 260, 'category' => 'buku-dan-alat-tulis'],
        ];

        $categories = Category::query()->pluck('id', 'slug');

        foreach ($products as $product) {
            Product::query()->updateOrCreate(
                ['name' => $product['name']],
                [
                    'desc' => $product['desc'],
                    'price' => $product['price'],
                    'stock' => $product['stock'],
                    'category_id' => $categories[$product['category']] ?? null,
                ],
            );
        }
    }
}
