const products = [
  // ── Electronics ──────────────────────────────────────────────
  {
    id: 1,
    name: "iPhone 15 Pro",
    category: "electronics",
    price: 19999000,
    description: "Smartphone flagship Apple dengan chip A17 Pro dan kamera 48MP.",
    image: "https://i.pinimg.com/originals/47/a8/88/47a888b347b9e6c7543d357cfa9eb94c.jpg",
  },
  {
    id: 2,
    name: "Samsung Galaxy S24",
    category: "electronics",
    price: 14999000,
    description: "Android flagship dengan fitur AI Galaxy dan layar Dynamic AMOLED 2X.",
    image: "https://i.pinimg.com/736x/dd/c6/54/ddc654a81c9cde44513dbfadeabae2a4.jpg",
  },
  {
    id: 3,
    name: "MacBook Air M3",
    category: "electronics",
    price: 24999000,
    description: "Laptop ultra-tipis bertenaga chip Apple M3 dengan baterai 18 jam.",
    image: "https://i.pinimg.com/originals/9d/19/1d/9d191d12b6ad50d1317d4715d9715e76.jpg",
  },
  {
    id: 4,
    name: "Dell XPS 15",
    category: "electronics",
    price: 22500000,
    description: "Laptop premium layar OLED 15.6\" dengan Intel Core i9 Gen 13.",
    image: "https://i.pinimg.com/originals/0a/52/ba/0a52ba04884b6fbf28c7b21f59e064a5.jpg",
  },
  {
    id: 5,
    name: "Sony WH-1000XM5",
    category: "electronics",
    price: 4999000,
    description: "Headphone over-ear ANC terbaik dengan audio Hi-Res 30 jam baterai.",
    image: "https://i.pinimg.com/originals/5c/e6/dd/5ce6dd7871519d18d415f721997cd226.jpg",
  },
  {
    id: 6,
    name: "iPad Air M2",
    category: "electronics",
    price: 12999000,
    description: "Tablet serbaguna bertenaga M2 dengan layar Liquid Retina 11\".",
    image: "https://i.pinimg.com/originals/2a/2c/95/2a2c95e2f7c3ea922c03e5a5baeca65e.jpg",
  },
  {
    id: 7,
    name: "Apple Watch Series 9",
    category: "electronics",
    price: 8499000,
    description: "Smartwatch dengan chip S9, selalu aktif, dan fitur kesehatan lengkap.",
    image: "https://i.pinimg.com/736x/ee/7a/72/ee7a72217a87b947425c21c31c12e57d.jpg",
  },
  {
    id: 8,
    name: "LG OLED TV 55\"",
    category: "electronics",
    price: 18750000,
    description: "Smart TV OLED 4K dengan teknologi Dolby Vision & Atmos.",
    image: "https://i.pinimg.com/originals/6f/ab/4a/6fab4a0025e5ca99ffa91636705bdb10.jpg",
  },
  {
    id: 9,
    name: "Canon EOS R50",
    category: "electronics",
    price: 11500000,
    description: "Mirrorless kamera 24.2MP ideal untuk vlogger dan fotografer pemula.",
    image: "https://i.pinimg.com/originals/39/55/a7/3955a7cdbe450b9f9febf82b4b5ee657.jpg",
  },
  {
    id: 10,
    name: "PlayStation 5",
    category: "electronics",
    price: 8799000,
    description: "Konsol gaming gen terbaru dengan SSD ultra-cepat dan DualSense.",
    image: "https://i.pinimg.com/originals/90/52/bb/9052bb009cd89cb7f6c7b2efb654cd1e.jpg",
  },
  {
    id: 11,
    name: "Nintendo Switch OLED",
    category: "electronics",
    price: 5199000,
    description: "Konsol hybrid dengan layar OLED 7\" yang lebih cerah dan jernih.",
    image: "https://i.pinimg.com/originals/b7/46/ed/b746ed6b01ae0e4dadd8a4b9e28ddbfa.jpg",
  },
  {
    id: 12,
    name: "JBL Flip 6",
    category: "electronics",
    price: 1899000,
    description: "Speaker Bluetooth portabel tahan air dengan suara bass yang kuat.",
    image: "https://i.pinimg.com/originals/84/ba/ee/84baeefcaced1e88cc1892e0de7f9b22.jpg",
  },
  {
    id: 13,
    name: "Xiaomi Robot Vacuum",
    category: "electronics",
    price: 3499000,
    description: "Robot penyedot debu pintar dengan navigasi LiDAR dan kontrol app.",
    image: "https://i.pinimg.com/736x/fe/16/2d/fe162df0b506e2adddf3689b4023ba2c.jpg",
  },
  {
    id: 14,
    name: "Logitech MX Master 3",
    category: "electronics",
    price: 1599000,
    description: "Mouse ergonomis produktivitas tinggi dengan scroll MagSpeed.",
    image: "https://i.pinimg.com/originals/ad/66/a6/ad66a666083253c843c5af297351b649.jpg",
  },
  {
    id: 15,
    name: "Samsung Galaxy Tab S9",
    category: "electronics",
    price: 13999000,
    description: "Tablet Android premium dengan layar Dynamic AMOLED 11\" dan S Pen.",
    image: "https://i.pinimg.com/736x/a8/fe/0f/a8fe0f3ac2ef30948a79fb731d8f3372.jpg",
  },

  // ── Fashion ──────────────────────────────────────────────────
  {
    id: 16,
    name: "Nike Air Max 270",
    category: "fashion",
    price: 2199000,
    description: "Sneaker kasual dengan unit Air Max 270 untuk kenyamanan seharian.",
    image: "https://i.pinimg.com/736x/d2/a4/ba/d2a4bafe090ce447c2b2ad73c43ef229.jpg",
  },
  {
    id: 17,
    name: "Adidas Ultraboost 22",
    category: "fashion",
    price: 2499000,
    description: "Sepatu lari dengan sol Boost yang responsif dan upper Primeknit.",
    image: "https://i.pinimg.com/736x/5c/d5/e3/5cd5e3e2cb3bfa2ae01148f39de40d49.jpg",
  },
  {
    id: 18,
    name: "Levi's 501 Jeans",
    category: "fashion",
    price: 899000,
    description: "Celana jeans straight-fit ikonik dengan bahan denim premium.",
    image: "https://i.pinimg.com/736x/1a/8a/21/1a8a21049275381a2982d1fc21020487.jpg",
  },
  {
    id: 19,
    name: "Zara Casual Blazer",
    category: "fashion",
    price: 1299000,
    description: "Blazer kasual unisex potongan slim untuk tampilan smart-casual.",
    image: "https://i.pinimg.com/736x/3a/16/96/3a16967201d0190539c41a5726cacdfb.jpg",
  },
  {
    id: 20,
    name: "H&M Basic T-Shirt",
    category: "fashion",
    price: 199000,
    description: "Kaos katun basic essential dengan berbagai pilihan warna.",
    image: "https://i.pinimg.com/736x/43/0c/9b/430c9bcdaa057249b08f41ad61f2ab35.jpg",
  },
  {
    id: 21,
    name: "Uniqlo Fleece Jacket",
    category: "fashion",
    price: 699000,
    description: "Jaket fleece ringan dan hangat, cocok untuk musim dingin.",
    image: "https://i.pinimg.com/736x/dd/0d/43/dd0d434090660ee6ee5716ad88289928.jpg",
  },
  {
    id: 22,
    name: "Canvas Tote Bag",
    category: "fashion",
    price: 349000,
    description: "Tas tote kanvas serbaguna dengan desain minimalis dan tahan lama.",
    image: "https://i.pinimg.com/736x/a8/98/68/a89868a0b4b593c1960f8e4c55945571.jpg",
  },
  {
    id: 23,
    name: "Ray-Ban Aviator",
    category: "fashion",
    price: 2899000,
    description: "Kacamata hitam aviator klasik dengan lensa polarized UV400.",
    image: "https://i.pinimg.com/736x/e9/23/1c/e9231c97136fa14ebcba3a3f97a4f3e5.jpg",
  },
  {
    id: 24,
    name: "Fossil Men's Watch",
    category: "fashion",
    price: 1999000,
    description: "Jam tangan pria analog kasual dengan tali kulit coklat.",
    image: "https://i.pinimg.com/736x/c9/19/0b/c9190bebab9561c2aec9f66ba6ef22dd.jpg",
  },
  {
    id: 25,
    name: "New Balance 574",
    category: "fashion",
    price: 1599000,
    description: "Sneaker lifestyle ikonik dengan ENCAP midsole dan upper suede.",
    image: "https://i.pinimg.com/736x/1b/e0/8f/1be08f8d228fc5479072c86c2cef2db3.jpg",
  },
  {
    id: 26,
    name: "Polo Ralph Lauren Shirt",
    category: "fashion",
    price: 1199000,
    description: "Kemeja polo klasik dari cotton pique dengan logo kuda ikonik.",
    image: "https://i.pinimg.com/736x/62/d0/38/62d0387769020a49d60044195942b1f2.jpg",
  },
  {
    id: 27,
    name: "Converse Chuck Taylor",
    category: "fashion",
    price: 799000,
    description: "Sneaker kanvas legendaris dengan outsole karet vulkanisasi.",
    image: "https://i.pinimg.com/736x/9f/1f/73/9f1f7340bea8bdffa5e73452a6a5acde.jpg",
  },
  {
    id: 28,
    name: "Leather Wallet",
    category: "fashion",
    price: 599000,
    description: "Dompet kulit asli slim dengan banyak slot kartu dan RFID blocking.",
    image: "https://i.pinimg.com/736x/52/ab/03/52ab03a44f08bdf896c5bbd5422a41e5.jpg",
  },
  {
    id: 29,
    name: "Bucket Hat Trendy",
    category: "fashion",
    price: 249000,
    description: "Topi bucket trendi dari bahan cotton twill tersedia banyak warna.",
    image: "https://i.pinimg.com/736x/35/6f/94/356f94f12f94217ee6c29e41baa63435.jpg",
  },
  {
    id: 30,
    name: "Gucci Belt",
    category: "fashion",
    price: 6500000,
    description: "Ikat pinggang kulit GG Supreme dengan gesper double G signature.",
    image: "https://i.pinimg.com/736x/60/76/b1/6076b1eca0d36cd33a5c4698ef172a7c.jpg",
  },

  // ── Sports & Fitness ─────────────────────────────────────────
  {
    id: 46,
    name: "Yoga Mat Premium",
    category: "sports",
    price: 449000,
    description: "Matras yoga anti-slip 6mm dari bahan TPE ramah lingkungan.",
    image: "https://i.pinimg.com/736x/6e/d9/29/6ed929d2879c1cf7309d5acf98d2bd61.jpg",
  },
  {
    id: 47,
    name: "Dumbbell Set 20kg",
    category: "sports",
    price: 1299000,
    description: "Set dumbbell hexagonal cast iron 2x10kg dengan grip anti-slip.",
    image: "https://i.pinimg.com/736x/47/0a/5c/470a5ced2d52f4e534362ab96257f4c7.jpg",
  },
  {
    id: 48,
    name: "Sepeda Statis Lipat",
    category: "sports",
    price: 2499000,
    description: "Sepeda statis lipat dengan 8 level resistansi dan display LCD.",
    image: "https://i.pinimg.com/736x/0e/c0/2c/0ec02c0b67797397ec33a07f5afceafa.jpg",
  },
  {
    id: 49,
    name: "Treadmill Elektrik",
    category: "sports",
    price: 7999000,
    description: "Treadmill lipat dengan kecepatan 0–14 km/h dan incline otomatis.",
    image: "https://i.pinimg.com/736x/cf/b9/a0/cfb9a06711bb81d4a4085906dc6a13e0.jpg",
  },
  {
    id: 50,
    name: "Resistance Band Set",
    category: "sports",
    price: 199000,
    description: "Set 5 resistance band latex dengan level tahanan berbeda.",
    image: "https://i.pinimg.com/736x/b2/17/cd/b217cda97beafb730d586c1bbfe99909.jpg",
  },
  {
    id: 51,
    name: "Protein Whey 2kg",
    category: "sports",
    price: 599000,
    description: "Whey protein isolate 25g protein per serving, rasa coklat.",
    image: "https://i.pinimg.com/736x/98/ed/aa/98edaaff944bfbb0794b58c22757d386.jpg",
  },
  {
    id: 52,
    name: "Raket Badminton Yonex",
    category: "sports",
    price: 1199000,
    description: "Raket Yonex Nanoflare series ultraringan 80g untuk smash keras.",
    image: "https://i.pinimg.com/736x/50/b6/39/50b639e8a4448520c31579bbb5ae5e16.jpg",
  },
  {
    id: 53,
    name: "Sepatu Running Asics",
    category: "sports",
    price: 1799000,
    description: "Sepatu lari Asics Gel-Nimbus dengan teknologi FlyteFoam.",
    image: "https://i.pinimg.com/736x/16/1c/c8/161cc8dc381e7657228f45af2b1847c6.jpg",
  },
  {
    id: 54,
    name: "Jump Rope Speed",
    category: "sports",
    price: 149000,
    description: "Skipping rope kecepatan tinggi dengan bantalan bearing presisi.",
    image: "https://i.pinimg.com/736x/eb/ee/cf/ebeecf8f4d18f0f7d66d4ee8f3ddc6b7.jpg",
  },
  {
    id: 55,
    name: "Pull-Up Bar Pintu",
    category: "sports",
    price: 349000,
    description: "Pull-up bar tanpa bor, cocok untuk pintu 60–100cm.",
    image: "https://i.pinimg.com/736x/c4/9a/4a/c49a4a043478579ebd48dfb85c2eb92f.jpg",
  },
  {
    id: 56,
    name: "Foam Roller 90cm",
    category: "sports",
    price: 279000,
    description: "Foam roller grid texture untuk pemulihan otot pasca latihan.",
    image: "https://i.pinimg.com/736x/46/87/1e/46871e252440366247e3bc4c59a1baf6.jpg",
  },
  {
    id: 57,
    name: "Sarung Tinju Muay Thai",
    category: "sports",
    price: 499000,
    description: "Gloves boxing kulit sintetis 14oz dengan padding multi-layer.",
    image: "https://i.pinimg.com/736x/0a/07/c8/0a07c88627aa55ceb9ec17aded85d0c1.jpg",
  },
  {
    id: 58,
    name: "Pelampung Renang",
    category: "sports",
    price: 129000,
    description: "Kickboard EVA ringan untuk latihan teknik kaki di kolam renang.",
    image: "https://i.pinimg.com/736x/93/11/14/93111413af2e1330a82e1ddc038fc67f.jpg",
  },
  {
    id: 59,
    name: "Tas Gym Duffle",
    category: "sports",
    price: 399000,
    description: "Tas gym 40L dengan kompartemen sepatu terpisah dan bahan water-resistant.",
    image: "https://i.pinimg.com/736x/86/55/d5/8655d5075a0793b37bafd5f791f38e24.jpg",
  },
  {
    id: 60,
    name: "Kettlebell 16kg",
    category: "sports",
    price: 699000,
    description: "Kettlebell cast iron 16kg dengan grip lebar untuk swing dan Turkish get-up.",
    image: "https://i.pinimg.com/736x/08/bd/6b/08bd6b438d4483c180e0b4f3a8b74460.jpg",
  },

  // ── Sepatu ───────────────────────────────────────────────────
  {
    id: 61,
    name: "Nike Air Force 1",
    category: "shoes",
    price: 1599000,
    description: "Sneaker ikonik Nike dengan sole rubber tebal dan upper kulit putih.",
    image: "https://i.pinimg.com/736x/77/bb/17/77bb174f2de547564e589e80bd769e6c.jpg",
  },
  {
    id: 62,
    name: "Adidas Stan Smith",
    category: "shoes",
    price: 1299000,
    description: "Sneaker klasik kulit dengan aksen tiga strip dan sol serrated.",
    image: "https://i.pinimg.com/736x/29/44/fb/2944fbc565f0af2d364df0b5de12fdde.jpg",
  },
  {
    id: 63,
    name: "Vans Old Skool",
    category: "shoes",
    price: 999000,
    description: "Sneaker skate klasik Vans dengan side stripe ikonik dan sol waffle.",
    image: "https://i.pinimg.com/736x/c5/01/0d/c5010dacbf832fe2a634773918136f7e.jpg",
  },
  {
    id: 64,
    name: "New Balance 990v6",
    category: "shoes",
    price: 3299000,
    description: "Sneaker lifestyle premium buatan USA dengan cushioning ENCAP.",
    image: "https://i.pinimg.com/736x/6d/72/9e/6d729e5391125dc08988443b3d10027c.jpg",
  },
  {
    id: 65,
    name: "Puma Suede Classic",
    category: "shoes",
    price: 1099000,
    description: "Sneaker suede legendaris dengan formstrip Puma dan sol cupsole.",
    image: "https://i.pinimg.com/736x/e2/8e/09/e28e0937e89cba793b42c67229ff80dd.jpg",
  },
  {
    id: 66,
    name: "Reebok Classic Leather",
    category: "shoes",
    price: 1199000,
    description: "Sepatu kulit klasik Reebok dengan sol EVA untuk kenyamanan harian.",
    image: "https://i.pinimg.com/736x/2a/95/dd/2a95dd5f48230e54000fc5ec2e3191f0.jpg",
  },
  {
    id: 67,
    name: "Dr. Martens 1460",
    category: "shoes",
    price: 3499000,
    description: "Boots kulit 8-lubang ikonik dengan sol AirWair bouncing tahan lama.",
    image: "https://i.pinimg.com/736x/e2/7e/6a/e27e6a120c1b2f93d2fbbc37d020d340.jpg",
  },
  {
    id: 68,
    name: "Skechers D'Lites",
    category: "shoes",
    price: 899000,
    description: "Sneaker chunky dengan Memory Foam insole untuk kenyamanan maksimal.",
    image: "https://i.pinimg.com/736x/3f/81/41/3f81418ce0949a0aaaa2fc6488aedc2d.jpg",
  },
  {
    id: 69,
    name: "Sepatu Pantofel Ecco",
    category: "shoes",
    price: 2499000,
    description: "Sepatu formal kulit sapi full-grain dengan sol FLUIDFORM.",
    image: "https://i.pinimg.com/736x/9d/08/01/9d0801c70cf3fa9d40b6e073dc1fc2e9.jpg",
  },
  {
    id: 70,
    name: "Crocs Classic Clog",
    category: "shoes",
    price: 699000,
    description: "Sandal clog ringan Crocs dengan bahan Croslite tahan air.",
    image: "https://i.pinimg.com/736x/ac/9e/14/ac9e140e1929bdc111e655b44696065f.jpg",
  },
  {
    id: 71,
    name: "Birkenstock Arizona",
    category: "shoes",
    price: 1899000,
    description: "Sandal dua tali ikonik dengan footbed kork anatomis asal Jerman.",
    image: "https://i.pinimg.com/736x/18/29/9a/18299abaccef5c5822753e0a3a3152a4.jpg",
  },
  {
    id: 72,
    name: "Timberland Premium Boot",
    category: "shoes",
    price: 2999000,
    description: "Boots kulit tahan air waterproof dengan sol anti-fatigue 24/7.",
    image: "https://i.pinimg.com/736x/0a/59/41/0a59418ce98c8a868c21bc8dec7591f0.jpg",
  },
  {
    id: 73,
    name: "Sepatu Futsal Mizuno",
    category: "shoes",
    price: 799000,
    description: "Sepatu futsal indoor dengan upper sintetis dan sol non-marking.",
    image: "https://i.pinimg.com/736x/75/7c/3f/757c3f1a66259218b977907c32c16780.jpg",
  },
  {
    id: 74,
    name: "On Running Cloudmonster",
    category: "shoes",
    price: 3199000,
    description: "Sepatu lari dengan CloudTec® Phase ultra-tebal untuk cushioning maksimal.",
    image: "https://i.pinimg.com/736x/d2/56/91/d25691cd8582363023e808447c217c5f.jpg",
  },
  {
    id: 75,
    name: "Havaianas Brasil Logo",
    category: "shoes",
    price: 299000,
    description: "Sandal jepit Brasil ikonik berbahan karet alami ringan dan nyaman.",
    image: "https://i.pinimg.com/736x/5e/74/b2/5e74b2b48f96be21a022262b22ffe28d.jpg",
  },

  // ── Books & Stationery ────────────────────────────────────────
  {
    id: 76,
    name: "Atomic Habits",
    category: "books",
    price: 119000,
    description: "Buku best-seller James Clear tentang membangun kebiasaan baik.",
    image: "https://i.pinimg.com/736x/d0/8a/8d/d08a8dbbc3d0674067d4ee9bce3b47b9.jpg",
  },
  {
    id: 77,
    name: "The Psychology of Money",
    category: "books",
    price: 99000,
    description: "Buku Morgan Housel tentang pola pikir finansial yang sehat.",
    image: "https://i.pinimg.com/736x/14/87/a7/1487a75e829bd583926d52b441552f12.jpg",
  },
  {
    id: 78,
    name: "Notebook Leuchtturm A5",
    category: "books",
    price: 299000,
    description: "Buku catatan dot-grid premium 249 halaman dengan hard cover.",
    image: "https://i.pinimg.com/736x/9e/f9/05/9ef905cfd9912df44686a220d70261a7.jpg",
  },
  {
    id: 79,
    name: "Pulpen Uni-Ball Signo",
    category: "books",
    price: 29000,
    description: "Pulpen gel 0.5mm tinta hitam pekat, halus untuk tulisan tangan.",
    image: "https://i.pinimg.com/736x/9e/b7/f6/9eb7f6741785ec013713c1f705cc3bcf.jpg",
  },
  {
    id: 80,
    name: "Stabilo Boss Highlighter",
    category: "books",
    price: 49000,
    description: "Spidol stabilo set 6 warna pastel chisel-tip untuk belajar.",
    image: "https://i.pinimg.com/736x/db/d6/ce/dbd6ce2c394dcc0f3beff2ed77557bd2.jpg",
  },
  {
    id: 81,
    name: "Deep Work — Cal Newport",
    category: "books",
    price: 109000,
    description: "Panduan fokus produktif di dunia yang penuh distraksi digital.",
    image: "https://i.pinimg.com/736x/f7/45/9d/f7459dbeb51b2354865dabd1c52cf272.jpg",
  },
  {
    id: 82,
    name: "Planner 2026 Hardcover",
    category: "books",
    price: 189000,
    description: "Agenda tahunan hardcover dengan layout weekly + monthly planning.",
    image: "https://i.pinimg.com/736x/95/a0/f5/95a0f529367cf68ac188ecc4fb29ea9a.jpg",
  },
  {
    id: 83,
    name: "Sticky Notes Pastel Set",
    category: "books",
    price: 39000,
    description: "Set 6 warna sticky notes pastel 80 lembar per blok ukuran 3x3\".",
    image: "https://i.pinimg.com/1200x/2f/2f/b6/2f2fb64ee71496140c40e1962c9845c6.jpg",
  },
  {
    id: 84,
    name: "The Lean Startup",
    category: "books",
    price: 109000,
    description: "Metodologi Eric Ries untuk membangun startup yang efisien dan adaptif.",
    image: "https://i.pinimg.com/736x/47/e1/5a/47e15a2fa7790dfc782a4f55d83baa77.jpg",
  },
  {
    id: 85,
    name: "Pensil Faber-Castell 2B Set",
    category: "books",
    price: 59000,
    description: "Set 12 pensil grafis 2B premium untuk menggambar dan sketsa.",
    image: "https://i.pinimg.com/736x/7b/28/23/7b2823d9bf5f5bf344e2088feedf13b4.jpg",
  },
  {
    id: 86,
    name: "Zero to One — Peter Thiel",
    category: "books",
    price: 99000,
    description: "Buku Peter Thiel tentang inovasi dan membangun bisnis dari nol.",
    image: "https://i.pinimg.com/736x/fb/57/92/fb57926c5c483c41d724081d8b58f193.jpg",
  },
  {
    id: 87,
    name: "Washi Tape Set 20pcs",
    category: "books",
    price: 79000,
    description: "Set 20 washi tape motif aesthetic untuk journaling dan dekorasi.",
    image: "https://i.pinimg.com/736x/50/62/b7/5062b78c604144484124f03cf86dabce.jpg",
  },
  {
    id: 88,
    name: "Kalender Meja 2026",
    category: "books",
    price: 55000,
    description: "Kalender meja minimalis spiral 2026 dengan ruang catatan harian.",
    image: "https://i.pinimg.com/736x/74/b1/3a/74b13ab8da605eefdf2eba02540b5ddb.jpg",
  },
  {
    id: 89,
    name: "Build — Tony Fadell",
    category: "books",
    price: 119000,
    description: "Panduan membangun produk, tim, dan karir dari bapak iPod.",
    image: "https://i.pinimg.com/736x/f5/f5/d8/f5f5d8a203e94bd5f6a28e722a34f800.jpg",
  },
  {
    id: 90,
    name: "Stapler Mini Kenko",
    category: "books",
    price: 45000,
    description: "Stapler mini portable ukuran saku dengan 1000 isi staples.",
    image: "https://i.pinimg.com/736x/ed/27/7e/ed277eef0296e97324956691125ea9f4.jpg",
  },

  // ── Home & Living ─────────────────────────────────────────────
  {
    id: 31,
    name: "IKEA BILLY Bookcase",
    category: "homeliving",
    price: 1299000,
    description: "Rak buku serbaguna dari IKEA dengan 5 rak adjustable.",
    image: "https://i.pinimg.com/originals/d0/b5/07/d0b507941359b368b36a4762b0b31d1d.jpg",
  },
  {
    id: 32,
    name: "Philips Air Purifier",
    category: "homeliving",
    price: 2999000,
    description: "Pembersih udara HEPA dengan sensor partikel PM2.5 real-time.",
    image: "https://i.pinimg.com/originals/b7/a7/fb/b7a7fbec79f5a78707940c659faa17f7.jpg",
  },
  {
    id: 33,
    name: "Nespresso Vertuo",
    category: "homeliving",
    price: 3499000,
    description: "Mesin kopi kapsul dengan teknologi centrifusion untuk crema sempurna.",
    image: "https://i.pinimg.com/originals/b8/11/f3/b811f344b87a9b734a1aa41e944ea6c3.jpg",
  },
  {
    id: 34,
    name: "Dyson V15 Detect",
    category: "homeliving",
    price: 9999000,
    description: "Vacuum cordless dengan laser dust detection dan HEPA filtration.",
    image: "https://i.pinimg.com/originals/12/c7/1a/12c71ae254d88d2680635d7480355a26.jpg",
  },
  {
    id: 35,
    name: "KitchenAid Stand Mixer",
    category: "homeliving",
    price: 8750000,
    description: "Mixer stand iconic dengan 10 kecepatan dan bowl stainless 4.8L.",
    image: "https://i.pinimg.com/originals/6b/91/e1/6b91e1108f68f18a2d090f297e0f8c5b.jpg",
  },
  {
    id: 36,
    name: "Le Creuset Dutch Oven",
    category: "homeliving",
    price: 5999000,
    description: "Panci cast iron enamel premium 28cm untuk memasak slow cook.",
    image: "https://i.pinimg.com/originals/9c/cb/71/9ccb71008e0dc6b9b57d0c92d94098e6.jpg",
  },
  {
    id: 37,
    name: "Muji Aroma Diffuser",
    category: "homeliving",
    price: 899000,
    description: "Diffuser ultrasonic minimalis dengan timer dan lampu mood light.",
    image: "https://i.pinimg.com/originals/af/6c/8c/af6c8c92cbd2cea23ccf51d2307f9b85.jpg",
  },
  {
    id: 38,
    name: "Xiaomi Smart Bulb Set",
    category: "homeliving",
    price: 449000,
    description: "Set 3 lampu pintar RGB 9W kontrol via app dan suara.",
    image: "https://i.pinimg.com/originals/c2/1b/20/c21b20792d911b74059308b0b0f42e21.jpg",
  },
  {
    id: 39,
    name: "IKEA POANG Chair",
    category: "homeliving",
    price: 1899000,
    description: "Kursi santai ergonomis dengan rangka kayu birch dan busa nyaman.",
    image: "https://i.pinimg.com/originals/e2/64/a7/e264a7711364e939d2be59f0e676fcd4.jpg",
  },
  {
    id: 40,
    name: "Instant Pot Duo 7-in-1",
    category: "homeliving",
    price: 2299000,
    description: "Pressure cooker multifungsi 7-in-1 kapasitas 6 liter.",
    image: "https://i.pinimg.com/originals/9f/e8/ae/9fe8aeae3758f4b2308f4e07be6305ee.jpg",
  },
  {
    id: 41,
    name: "Balmuda Toaster",
    category: "homeliving",
    price: 4999000,
    description: "Toaster premium Jepang dengan teknologi uap untuk roti sempurna.",
    image: "https://i.pinimg.com/originals/93/c9/23/93c923d09bea6d3949210b23954630da.jpg",
  },
  {
    id: 42,
    name: "Bamboo Towel Set",
    category: "homeliving",
    price: 399000,
    description: "Set handuk organik bambu 4 pcs, lembut, anti-bakteri & eco-friendly.",
    image: "https://i.pinimg.com/736x/ac/71/d1/ac71d12a41738e60fd86aa10555e5e82.jpg",
  },
  {
    id: 43,
    name: "Framed Wall Art Print",
    category: "homeliving",
    price: 549000,
    description: "Poster seni abstract minimalis dalam bingkai kayu natural 50x70cm.",
    image: "https://i.pinimg.com/originals/51/e2/15/51e215cf9e5e53c32c9be8aa4d10a3c4.jpg",
  },
  {
    id: 44,
    name: "Ceramic Plant Pot Set",
    category: "homeliving",
    price: 329000,
    description: "Set 3 pot keramik minimalis dengan warna earth tone elegan.",
    image: "https://i.pinimg.com/originals/70/e7/60/70e760a93acd8d338164f9c53f1c119f.png",
  },
  {
    id: 45,
    name: "Memory Foam Pillow",
    category: "homeliving",
    price: 699000,
    description: "Bantal memory foam ergonomis yang menyesuaikan postur leher.",
    image: "https://i.pinimg.com/originals/d0/26/47/d0264797ac52b72c3355f1e8a7bffd29.png",
  },
];

const formatPrice = (price) =>
  "Rp " + price.toLocaleString("id-ID");

function renderProducts(list) {
  const grid = document.getElementById("product-grid");
  const empty = document.getElementById("empty-state");

  if (list.length === 0) {
    grid.innerHTML = "";
    empty.style.display = "block";
    return;
  }

  empty.style.display = "none";
  grid.innerHTML = list
    .map(
      (p) => `
    <div class="product-card">
      <div class="card-img-wrap">
        <img src="${p.image}" alt="${p.name}" loading="lazy" />
        <span class="badge badge-${p.category}">${categoryLabel(p.category)}</span>
      </div>
      <div class="card-body">
        <h3 class="card-title">${p.name}</h3>
        <p class="card-desc">${p.description}</p>
        <div class="card-footer">
          <span class="card-price">${formatPrice(p.price)}</span>
          <button class="btn-cart" onclick="addToCart(${p.id})">+ Keranjang</button>
        </div>
      </div>
    </div>`
    )
    .join("");
}

function categoryLabel(cat) {
  const map = {
    electronics: "Elektronik",
    fashion: "Fashion",
    homeliving: "Rumah & Taman",
    sports: "Olahraga",
    shoes: "Sepatu",
    books: "Buku & ATK",
  };
  return map[cat] ?? cat;
}

let activeFilter = "all";

function setFilter(category) {
  activeFilter = category;

  document.querySelectorAll(".filter-btn").forEach((btn) => {
    btn.classList.toggle("active", btn.dataset.category === category);
  });

  const filtered =
    category === "all"
      ? products
      : products.filter((p) => p.category === category);

  renderProducts(filtered);
  updateCount(filtered.length);
}

function updateCount(n) {
  document.getElementById("product-count").textContent =
    `Menampilkan ${n} produk`;
}

// ── Cart state ────────────────────────────────────────────────
let cart = [];

function addToCart(id) {
  const product = products.find((p) => p.id === id);
  if (!product) return;

  const existing = cart.find((item) => item.id === id);
  if (existing) {
    existing.qty += 1;
  } else {
    cart.push({ ...product, qty: 1 });
  }

  renderCart();
  openCart();
  showToast(`"${product.name}" ditambahkan ke keranjang`);
}

function removeFromCart(id) {
  cart = cart.filter((item) => item.id !== id);
  renderCart();
}

function updateQty(id, delta) {
  const item = cart.find((i) => i.id === id);
  if (!item) return;
  item.qty += delta;
  if (item.qty <= 0) {
    cart = cart.filter((i) => i.id !== id);
  }
  renderCart();
}

function cartTotal() {
  return cart.reduce((sum, item) => sum + item.price * item.qty, 0);
}

function cartCount() {
  return cart.reduce((sum, item) => sum + item.qty, 0);
}

function renderCart() {
  const body = document.getElementById("cart-body");
  const footer = document.getElementById("cart-footer");
  const badge = document.getElementById("cart-badge");
  const headerCount = document.getElementById("cart-header-count");
  const itemCount = document.getElementById("cart-item-count");
  const subtotalEl = document.getElementById("cart-subtotal");
  const totalEl = document.getElementById("cart-total");

  const count = cartCount();
  const total = cartTotal();

  // update badge
  if (count > 0) {
    badge.style.display = "flex";
    badge.textContent = count > 99 ? "99+" : count;
  } else {
    badge.style.display = "none";
  }

  headerCount.textContent = count > 0 ? `(${count})` : "";

  if (cart.length === 0) {
    body.innerHTML = `
      <div class="cart-empty">
        <svg xmlns="http://www.w3.org/2000/svg" width="56" height="56" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.3">
          <path stroke-linecap="round" stroke-linejoin="round" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13l-1.6 8H19M7 13l-1-5M10 21a1 1 0 100-2 1 1 0 000 2zm8 0a1 1 0 100-2 1 1 0 000 2z"/>
        </svg>
        <p>Keranjangmu masih kosong</p>
        <small>Yuk, tambahkan produk favoritmu!</small>
      </div>`;
    footer.style.display = "none";
    return;
  }

  body.innerHTML = cart
    .map(
      (item) => `
    <div class="cart-item">
      <img class="cart-item-img" src="${item.image}" alt="${item.name}" />
      <div class="cart-item-info">
        <p class="cart-item-name">${item.name}</p>
        <p class="cart-item-price">${formatPrice(item.price)}</p>
        <div class="qty-control">
          <button class="qty-btn" onclick="updateQty(${item.id}, -1)">−</button>
          <span class="qty-value">${item.qty}</span>
          <button class="qty-btn" onclick="updateQty(${item.id}, 1)">+</button>
        </div>
      </div>
      <div class="cart-item-right">
        <button class="cart-item-remove" onclick="removeFromCart(${item.id})" title="Hapus">
          <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
            <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12"/>
          </svg>
        </button>
        <p class="cart-item-subtotal">${formatPrice(item.price * item.qty)}</p>
      </div>
    </div>`
    )
    .join("");

  itemCount.textContent = count;
  subtotalEl.textContent = formatPrice(total);
  totalEl.textContent = formatPrice(total);
  footer.style.display = "block";
}

function openCart() {
  document.getElementById("cart-sidebar").classList.add("open");
  document.getElementById("cart-overlay").classList.add("show");
  document.body.style.overflow = "hidden";
}

function closeCart() {
  document.getElementById("cart-sidebar").classList.remove("open");
  document.getElementById("cart-overlay").classList.remove("show");
  document.body.style.overflow = "";
}

function showToast(msg) {
  const toast = document.getElementById("toast");
  toast.textContent = msg;
  toast.classList.add("show");
  setTimeout(() => toast.classList.remove("show"), 2500);
}

// ── Init ──────────────────────────────────────────────────────
document.addEventListener("DOMContentLoaded", () => {
  document.querySelectorAll(".filter-btn").forEach((btn) => {
    btn.addEventListener("click", () => setFilter(btn.dataset.category));
  });

  document.getElementById("cart-toggle").addEventListener("click", openCart);
  document.getElementById("cart-close").addEventListener("click", closeCart);
  document.getElementById("cart-overlay").addEventListener("click", closeCart);

  renderCart();
  setFilter("all");
});
