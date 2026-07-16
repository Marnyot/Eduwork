const products = [
  // ── Electronics ──────────────────────────────────────────────
  {
    id: 1,
    name: "iPhone 15 Pro",
    category: "electronics",
    price: 19999000,
    description: "Smartphone flagship Apple dengan chip A17 Pro dan kamera 48MP.",
    image: "https://loremflickr.com/300/220/iphone,smartphone?lock=1",
  },
  {
    id: 2,
    name: "Samsung Galaxy S24",
    category: "electronics",
    price: 14999000,
    description: "Android flagship dengan fitur AI Galaxy dan layar Dynamic AMOLED 2X.",
    image: "https://loremflickr.com/300/220/samsung,smartphone?lock=2",
  },
  {
    id: 3,
    name: "MacBook Air M3",
    category: "electronics",
    price: 24999000,
    description: "Laptop ultra-tipis bertenaga chip Apple M3 dengan baterai 18 jam.",
    image: "https://loremflickr.com/300/220/macbook,laptop?lock=3",
  },
  {
    id: 4,
    name: "Dell XPS 15",
    category: "electronics",
    price: 22500000,
    description: "Laptop premium layar OLED 15.6\" dengan Intel Core i9 Gen 13.",
    image: "https://loremflickr.com/300/220/laptop,computer?lock=4",
  },
  {
    id: 5,
    name: "Sony WH-1000XM5",
    category: "electronics",
    price: 4999000,
    description: "Headphone over-ear ANC terbaik dengan audio Hi-Res 30 jam baterai.",
    image: "https://loremflickr.com/300/220/headphone,audio?lock=5",
  },
  {
    id: 6,
    name: "iPad Air M2",
    category: "electronics",
    price: 12999000,
    description: "Tablet serbaguna bertenaga M2 dengan layar Liquid Retina 11\".",
    image: "https://loremflickr.com/300/220/ipad,tablet?lock=6",
  },
  {
    id: 7,
    name: "Apple Watch Series 9",
    category: "electronics",
    price: 8499000,
    description: "Smartwatch dengan chip S9, selalu aktif, dan fitur kesehatan lengkap.",
    image: "https://loremflickr.com/300/220/smartwatch,apple?lock=7",
  },
  {
    id: 8,
    name: "LG OLED TV 55\"",
    category: "electronics",
    price: 18750000,
    description: "Smart TV OLED 4K dengan teknologi Dolby Vision & Atmos.",
    image: "https://loremflickr.com/300/220/television,tv?lock=8",
  },
  {
    id: 9,
    name: "Canon EOS R50",
    category: "electronics",
    price: 11500000,
    description: "Mirrorless kamera 24.2MP ideal untuk vlogger dan fotografer pemula.",
    image: "https://loremflickr.com/300/220/camera,canon?lock=9",
  },
  {
    id: 10,
    name: "PlayStation 5",
    category: "electronics",
    price: 8799000,
    description: "Konsol gaming gen terbaru dengan SSD ultra-cepat dan DualSense.",
    image: "https://loremflickr.com/300/220/playstation,gaming?lock=10",
  },
  {
    id: 11,
    name: "Nintendo Switch OLED",
    category: "electronics",
    price: 5199000,
    description: "Konsol hybrid dengan layar OLED 7\" yang lebih cerah dan jernih.",
    image: "https://loremflickr.com/300/220/nintendo,switch?lock=11",
  },
  {
    id: 12,
    name: "JBL Flip 6",
    category: "electronics",
    price: 1899000,
    description: "Speaker Bluetooth portabel tahan air dengan suara bass yang kuat.",
    image: "https://loremflickr.com/300/220/speaker,bluetooth?lock=12",
  },
  {
    id: 13,
    name: "Xiaomi Robot Vacuum",
    category: "electronics",
    price: 3499000,
    description: "Robot penyedot debu pintar dengan navigasi LiDAR dan kontrol app.",
    image: "https://loremflickr.com/300/220/vacuum,robot?lock=13",
  },
  {
    id: 14,
    name: "Logitech MX Master 3",
    category: "electronics",
    price: 1599000,
    description: "Mouse ergonomis produktivitas tinggi dengan scroll MagSpeed.",
    image: "https://loremflickr.com/300/220/computer,mouse?lock=14",
  },
  {
    id: 15,
    name: "Samsung Galaxy Tab S9",
    category: "electronics",
    price: 13999000,
    description: "Tablet Android premium dengan layar Dynamic AMOLED 11\" dan S Pen.",
    image: "https://loremflickr.com/300/220/tablet,android?lock=15",
  },

  // ── Fashion ──────────────────────────────────────────────────
  {
    id: 16,
    name: "Nike Air Max 270",
    category: "fashion",
    price: 2199000,
    description: "Sneaker kasual dengan unit Air Max 270 untuk kenyamanan seharian.",
    image: "https://loremflickr.com/300/220/nike,sneaker?lock=16",
  },
  {
    id: 17,
    name: "Adidas Ultraboost 22",
    category: "fashion",
    price: 2499000,
    description: "Sepatu lari dengan sol Boost yang responsif dan upper Primeknit.",
    image: "https://loremflickr.com/300/220/adidas,running?lock=17",
  },
  {
    id: 18,
    name: "Levi's 501 Jeans",
    category: "fashion",
    price: 899000,
    description: "Celana jeans straight-fit ikonik dengan bahan denim premium.",
    image: "https://loremflickr.com/300/220/jeans,denim?lock=18",
  },
  {
    id: 19,
    name: "Zara Casual Blazer",
    category: "fashion",
    price: 1299000,
    description: "Blazer kasual unisex potongan slim untuk tampilan smart-casual.",
    image: "https://loremflickr.com/300/220/blazer,fashion?lock=19",
  },
  {
    id: 20,
    name: "H&M Basic T-Shirt",
    category: "fashion",
    price: 199000,
    description: "Kaos katun basic essential dengan berbagai pilihan warna.",
    image: "https://loremflickr.com/300/220/tshirt,clothing?lock=20",
  },
  {
    id: 21,
    name: "Uniqlo Fleece Jacket",
    category: "fashion",
    price: 699000,
    description: "Jaket fleece ringan dan hangat, cocok untuk musim dingin.",
    image: "https://loremflickr.com/300/220/jacket,fleece?lock=21",
  },
  {
    id: 22,
    name: "Canvas Tote Bag",
    category: "fashion",
    price: 349000,
    description: "Tas tote kanvas serbaguna dengan desain minimalis dan tahan lama.",
    image: "https://loremflickr.com/300/220/tote,bag?lock=22",
  },
  {
    id: 23,
    name: "Ray-Ban Aviator",
    category: "fashion",
    price: 2899000,
    description: "Kacamata hitam aviator klasik dengan lensa polarized UV400.",
    image: "https://loremflickr.com/300/220/sunglasses,aviator?lock=23",
  },
  {
    id: 24,
    name: "Fossil Men's Watch",
    category: "fashion",
    price: 1999000,
    description: "Jam tangan pria analog kasual dengan tali kulit coklat.",
    image: "https://loremflickr.com/300/220/watch,analog?lock=24",
  },
  {
    id: 25,
    name: "New Balance 574",
    category: "fashion",
    price: 1599000,
    description: "Sneaker lifestyle ikonik dengan ENCAP midsole dan upper suede.",
    image: "https://loremflickr.com/300/220/sneaker,shoes?lock=25",
  },
  {
    id: 26,
    name: "Polo Ralph Lauren Shirt",
    category: "fashion",
    price: 1199000,
    description: "Kemeja polo klasik dari cotton pique dengan logo kuda ikonik.",
    image: "https://loremflickr.com/300/220/polo,shirt?lock=26",
  },
  {
    id: 27,
    name: "Converse Chuck Taylor",
    category: "fashion",
    price: 799000,
    description: "Sneaker kanvas legendaris dengan outsole karet vulkanisasi.",
    image: "https://loremflickr.com/300/220/converse,sneaker?lock=27",
  },
  {
    id: 28,
    name: "Leather Wallet",
    category: "fashion",
    price: 599000,
    description: "Dompet kulit asli slim dengan banyak slot kartu dan RFID blocking.",
    image: "https://loremflickr.com/300/220/wallet,leather?lock=28",
  },
  {
    id: 29,
    name: "Bucket Hat Trendy",
    category: "fashion",
    price: 249000,
    description: "Topi bucket trendi dari bahan cotton twill tersedia banyak warna.",
    image: "https://loremflickr.com/300/220/hat,cap?lock=29",
  },
  {
    id: 30,
    name: "Gucci Belt",
    category: "fashion",
    price: 6500000,
    description: "Ikat pinggang kulit GG Supreme dengan gesper double G signature.",
    image: "https://loremflickr.com/300/220/belt,luxury?lock=30",
  },

  // ── Sports & Fitness ─────────────────────────────────────────
  {
    id: 46,
    name: "Yoga Mat Premium",
    category: "sports",
    price: 449000,
    description: "Matras yoga anti-slip 6mm dari bahan TPE ramah lingkungan.",
    image: "https://loremflickr.com/300/220/yoga,mat?lock=46",
  },
  {
    id: 47,
    name: "Dumbbell Set 20kg",
    category: "sports",
    price: 1299000,
    description: "Set dumbbell hexagonal cast iron 2x10kg dengan grip anti-slip.",
    image: "https://loremflickr.com/300/220/dumbbell,gym?lock=47",
  },
  {
    id: 48,
    name: "Sepeda Statis Lipat",
    category: "sports",
    price: 2499000,
    description: "Sepeda statis lipat dengan 8 level resistansi dan display LCD.",
    image: "https://loremflickr.com/300/220/bicycle,cycling?lock=48",
  },
  {
    id: 49,
    name: "Treadmill Elektrik",
    category: "sports",
    price: 7999000,
    description: "Treadmill lipat dengan kecepatan 0–14 km/h dan incline otomatis.",
    image: "https://loremflickr.com/300/220/treadmill,fitness?lock=49",
  },
  {
    id: 50,
    name: "Resistance Band Set",
    category: "sports",
    price: 199000,
    description: "Set 5 resistance band latex dengan level tahanan berbeda.",
    image: "https://loremflickr.com/300/220/resistance,band?lock=50",
  },
  {
    id: 51,
    name: "Protein Whey 2kg",
    category: "sports",
    price: 599000,
    description: "Whey protein isolate 25g protein per serving, rasa coklat.",
    image: "https://loremflickr.com/300/220/protein,supplement?lock=51",
  },
  {
    id: 52,
    name: "Raket Badminton Yonex",
    category: "sports",
    price: 1199000,
    description: "Raket Yonex Nanoflare series ultraringan 80g untuk smash keras.",
    image: "https://loremflickr.com/300/220/badminton,racket?lock=52",
  },
  {
    id: 53,
    name: "Sepatu Running Asics",
    category: "sports",
    price: 1799000,
    description: "Sepatu lari Asics Gel-Nimbus dengan teknologi FlyteFoam.",
    image: "https://loremflickr.com/300/220/running,shoes?lock=53",
  },
  {
    id: 54,
    name: "Jump Rope Speed",
    category: "sports",
    price: 149000,
    description: "Skipping rope kecepatan tinggi dengan bantalan bearing presisi.",
    image: "https://loremflickr.com/300/220/jumprope,skipping?lock=54",
  },
  {
    id: 55,
    name: "Pull-Up Bar Pintu",
    category: "sports",
    price: 349000,
    description: "Pull-up bar tanpa bor, cocok untuk pintu 60–100cm.",
    image: "https://loremflickr.com/300/220/pullup,gym?lock=55",
  },
  {
    id: 56,
    name: "Foam Roller 90cm",
    category: "sports",
    price: 279000,
    description: "Foam roller grid texture untuk pemulihan otot pasca latihan.",
    image: "https://loremflickr.com/300/220/foam,roller?lock=56",
  },
  {
    id: 57,
    name: "Sarung Tinju Muay Thai",
    category: "sports",
    price: 499000,
    description: "Gloves boxing kulit sintetis 14oz dengan padding multi-layer.",
    image: "https://loremflickr.com/300/220/boxing,gloves?lock=57",
  },
  {
    id: 58,
    name: "Pelampung Renang",
    category: "sports",
    price: 129000,
    description: "Kickboard EVA ringan untuk latihan teknik kaki di kolam renang.",
    image: "https://loremflickr.com/300/220/swimming,pool?lock=58",
  },
  {
    id: 59,
    name: "Tas Gym Duffle",
    category: "sports",
    price: 399000,
    description: "Tas gym 40L dengan kompartemen sepatu terpisah dan bahan water-resistant.",
    image: "https://loremflickr.com/300/220/gym,bag?lock=59",
  },
  {
    id: 60,
    name: "Kettlebell 16kg",
    category: "sports",
    price: 699000,
    description: "Kettlebell cast iron 16kg dengan grip lebar untuk swing dan Turkish get-up.",
    image: "https://loremflickr.com/300/220/kettlebell,gym?lock=60",
  },

  // ── Sepatu ───────────────────────────────────────────────────
  {
    id: 61,
    name: "Nike Air Force 1",
    category: "shoes",
    price: 1599000,
    description: "Sneaker ikonik Nike dengan sole rubber tebal dan upper kulit putih.",
    image: "https://loremflickr.com/300/220/nike,airforce?lock=61",
  },
  {
    id: 62,
    name: "Adidas Stan Smith",
    category: "shoes",
    price: 1299000,
    description: "Sneaker klasik kulit dengan aksen tiga strip dan sol serrated.",
    image: "https://loremflickr.com/300/220/adidas,sneaker?lock=62",
  },
  {
    id: 63,
    name: "Vans Old Skool",
    category: "shoes",
    price: 999000,
    description: "Sneaker skate klasik Vans dengan side stripe ikonik dan sol waffle.",
    image: "https://loremflickr.com/300/220/vans,skate?lock=63",
  },
  {
    id: 64,
    name: "New Balance 990v6",
    category: "shoes",
    price: 3299000,
    description: "Sneaker lifestyle premium buatan USA dengan cushioning ENCAP.",
    image: "https://loremflickr.com/300/220/sneaker,shoes?lock=64",
  },
  {
    id: 65,
    name: "Puma Suede Classic",
    category: "shoes",
    price: 1099000,
    description: "Sneaker suede legendaris dengan formstrip Puma dan sol cupsole.",
    image: "https://loremflickr.com/300/220/puma,sneaker?lock=65",
  },
  {
    id: 66,
    name: "Reebok Classic Leather",
    category: "shoes",
    price: 1199000,
    description: "Sepatu kulit klasik Reebok dengan sol EVA untuk kenyamanan harian.",
    image: "https://loremflickr.com/300/220/reebok,classic?lock=66",
  },
  {
    id: 67,
    name: "Dr. Martens 1460",
    category: "shoes",
    price: 3499000,
    description: "Boots kulit 8-lubang ikonik dengan sol AirWair bouncing tahan lama.",
    image: "https://loremflickr.com/300/220/boots,leather?lock=67",
  },
  {
    id: 68,
    name: "Skechers D'Lites",
    category: "shoes",
    price: 899000,
    description: "Sneaker chunky dengan Memory Foam insole untuk kenyamanan maksimal.",
    image: "https://loremflickr.com/300/220/chunky,sneaker?lock=68",
  },
  {
    id: 69,
    name: "Sepatu Pantofel Ecco",
    category: "shoes",
    price: 2499000,
    description: "Sepatu formal kulit sapi full-grain dengan sol FLUIDFORM.",
    image: "https://loremflickr.com/300/220/formal,shoes?lock=69",
  },
  {
    id: 70,
    name: "Crocs Classic Clog",
    category: "shoes",
    price: 699000,
    description: "Sandal clog ringan Crocs dengan bahan Croslite tahan air.",
    image: "https://loremflickr.com/300/220/crocs,sandal?lock=70",
  },
  {
    id: 71,
    name: "Birkenstock Arizona",
    category: "shoes",
    price: 1899000,
    description: "Sandal dua tali ikonik dengan footbed kork anatomis asal Jerman.",
    image: "https://loremflickr.com/300/220/birkenstock,sandal?lock=71",
  },
  {
    id: 72,
    name: "Timberland Premium Boot",
    category: "shoes",
    price: 2999000,
    description: "Boots kulit tahan air waterproof dengan sol anti-fatigue 24/7.",
    image: "https://loremflickr.com/300/220/timberland,boots?lock=72",
  },
  {
    id: 73,
    name: "Sepatu Futsal Mizuno",
    category: "shoes",
    price: 799000,
    description: "Sepatu futsal indoor dengan upper sintetis dan sol non-marking.",
    image: "https://loremflickr.com/300/220/futsal,sport?lock=73",
  },
  {
    id: 74,
    name: "On Running Cloudmonster",
    category: "shoes",
    price: 3199000,
    description: "Sepatu lari dengan CloudTec® Phase ultra-tebal untuk cushioning maksimal.",
    image: "https://loremflickr.com/300/220/running,sport?lock=74",
  },
  {
    id: 75,
    name: "Havaianas Brasil Logo",
    category: "shoes",
    price: 299000,
    description: "Sandal jepit Brasil ikonik berbahan karet alami ringan dan nyaman.",
    image: "https://loremflickr.com/300/220/sandal,flipflop?lock=75",
  },

  // ── Books & Stationery ────────────────────────────────────────
  {
    id: 76,
    name: "Atomic Habits",
    category: "books",
    price: 119000,
    description: "Buku best-seller James Clear tentang membangun kebiasaan baik.",
    image: "https://loremflickr.com/300/220/book,reading?lock=76",
  },
  {
    id: 77,
    name: "The Psychology of Money",
    category: "books",
    price: 99000,
    description: "Buku Morgan Housel tentang pola pikir finansial yang sehat.",
    image: "https://loremflickr.com/300/220/book,money?lock=77",
  },
  {
    id: 78,
    name: "Notebook Leuchtturm A5",
    category: "books",
    price: 299000,
    description: "Buku catatan dot-grid premium 249 halaman dengan hard cover.",
    image: "https://loremflickr.com/300/220/notebook,journal?lock=78",
  },
  {
    id: 79,
    name: "Pulpen Uni-Ball Signo",
    category: "books",
    price: 29000,
    description: "Pulpen gel 0.5mm tinta hitam pekat, halus untuk tulisan tangan.",
    image: "https://loremflickr.com/300/220/pen,stationery?lock=79",
  },
  {
    id: 80,
    name: "Stabilo Boss Highlighter",
    category: "books",
    price: 49000,
    description: "Spidol stabilo set 6 warna pastel chisel-tip untuk belajar.",
    image: "https://loremflickr.com/300/220/highlighter,marker?lock=80",
  },
  {
    id: 81,
    name: "Deep Work — Cal Newport",
    category: "books",
    price: 109000,
    description: "Panduan fokus produktif di dunia yang penuh distraksi digital.",
    image: "https://loremflickr.com/300/220/book,work?lock=81",
  },
  {
    id: 82,
    name: "Planner 2026 Hardcover",
    category: "books",
    price: 189000,
    description: "Agenda tahunan hardcover dengan layout weekly + monthly planning.",
    image: "https://loremflickr.com/300/220/planner,agenda?lock=82",
  },
  {
    id: 83,
    name: "Sticky Notes Pastel Set",
    category: "books",
    price: 39000,
    description: "Set 6 warna sticky notes pastel 80 lembar per blok ukuran 3x3\".",
    image: "https://loremflickr.com/300/220/stickynotes,office?lock=83",
  },
  {
    id: 84,
    name: "The Lean Startup",
    category: "books",
    price: 109000,
    description: "Metodologi Eric Ries untuk membangun startup yang efisien dan adaptif.",
    image: "https://loremflickr.com/300/220/book,startup?lock=84",
  },
  {
    id: 85,
    name: "Pensil Faber-Castell 2B Set",
    category: "books",
    price: 59000,
    description: "Set 12 pensil grafis 2B premium untuk menggambar dan sketsa.",
    image: "https://loremflickr.com/300/220/pencil,drawing?lock=85",
  },
  {
    id: 86,
    name: "Zero to One — Peter Thiel",
    category: "books",
    price: 99000,
    description: "Buku Peter Thiel tentang inovasi dan membangun bisnis dari nol.",
    image: "https://loremflickr.com/300/220/book,innovation?lock=86",
  },
  {
    id: 87,
    name: "Washi Tape Set 20pcs",
    category: "books",
    price: 79000,
    description: "Set 20 washi tape motif aesthetic untuk journaling dan dekorasi.",
    image: "https://loremflickr.com/300/220/tape,craft?lock=87",
  },
  {
    id: 88,
    name: "Kalender Meja 2026",
    category: "books",
    price: 55000,
    description: "Kalender meja minimalis spiral 2026 dengan ruang catatan harian.",
    image: "https://loremflickr.com/300/220/calendar,desk?lock=88",
  },
  {
    id: 89,
    name: "Build — Tony Fadell",
    category: "books",
    price: 119000,
    description: "Panduan membangun produk, tim, dan karir dari bapak iPod.",
    image: "https://loremflickr.com/300/220/book,technology?lock=89",
  },
  {
    id: 90,
    name: "Stapler Mini Kenko",
    category: "books",
    price: 45000,
    description: "Stapler mini portable ukuran saku dengan 1000 isi staples.",
    image: "https://loremflickr.com/300/220/stapler,office?lock=90",
  },

  // ── Home & Living ─────────────────────────────────────────────
  {
    id: 31,
    name: "IKEA BILLY Bookcase",
    category: "homeliving",
    price: 1299000,
    description: "Rak buku serbaguna dari IKEA dengan 5 rak adjustable.",
    image: "https://loremflickr.com/300/220/bookcase,shelf?lock=31",
  },
  {
    id: 32,
    name: "Philips Air Purifier",
    category: "homeliving",
    price: 2999000,
    description: "Pembersih udara HEPA dengan sensor partikel PM2.5 real-time.",
    image: "https://loremflickr.com/300/220/airpurifier,home?lock=32",
  },
  {
    id: 33,
    name: "Nespresso Vertuo",
    category: "homeliving",
    price: 3499000,
    description: "Mesin kopi kapsul dengan teknologi centrifusion untuk crema sempurna.",
    image: "https://loremflickr.com/300/220/coffee,machine?lock=33",
  },
  {
    id: 34,
    name: "Dyson V15 Detect",
    category: "homeliving",
    price: 9999000,
    description: "Vacuum cordless dengan laser dust detection dan HEPA filtration.",
    image: "https://loremflickr.com/300/220/vacuum,cleaner?lock=34",
  },
  {
    id: 35,
    name: "KitchenAid Stand Mixer",
    category: "homeliving",
    price: 8750000,
    description: "Mixer stand iconic dengan 10 kecepatan dan bowl stainless 4.8L.",
    image: "https://loremflickr.com/300/220/mixer,kitchen?lock=35",
  },
  {
    id: 36,
    name: "Le Creuset Dutch Oven",
    category: "homeliving",
    price: 5999000,
    description: "Panci cast iron enamel premium 28cm untuk memasak slow cook.",
    image: "https://loremflickr.com/300/220/cookware,pot?lock=36",
  },
  {
    id: 37,
    name: "Muji Aroma Diffuser",
    category: "homeliving",
    price: 899000,
    description: "Diffuser ultrasonic minimalis dengan timer dan lampu mood light.",
    image: "https://loremflickr.com/300/220/diffuser,aroma?lock=37",
  },
  {
    id: 38,
    name: "Xiaomi Smart Bulb Set",
    category: "homeliving",
    price: 449000,
    description: "Set 3 lampu pintar RGB 9W kontrol via app dan suara.",
    image: "https://loremflickr.com/300/220/bulb,light?lock=38",
  },
  {
    id: 39,
    name: "IKEA POANG Chair",
    category: "homeliving",
    price: 1899000,
    description: "Kursi santai ergonomis dengan rangka kayu birch dan busa nyaman.",
    image: "https://loremflickr.com/300/220/chair,furniture?lock=39",
  },
  {
    id: 40,
    name: "Instant Pot Duo 7-in-1",
    category: "homeliving",
    price: 2299000,
    description: "Pressure cooker multifungsi 7-in-1 kapasitas 6 liter.",
    image: "https://loremflickr.com/300/220/cooker,kitchen?lock=40",
  },
  {
    id: 41,
    name: "Balmuda Toaster",
    category: "homeliving",
    price: 4999000,
    description: "Toaster premium Jepang dengan teknologi uap untuk roti sempurna.",
    image: "https://loremflickr.com/300/220/toaster,bread?lock=41",
  },
  {
    id: 42,
    name: "Bamboo Towel Set",
    category: "homeliving",
    price: 399000,
    description: "Set handuk organik bambu 4 pcs, lembut, anti-bakteri & eco-friendly.",
    image: "https://loremflickr.com/300/220/towel,bathroom?lock=42",
  },
  {
    id: 43,
    name: "Framed Wall Art Print",
    category: "homeliving",
    price: 549000,
    description: "Poster seni abstract minimalis dalam bingkai kayu natural 50x70cm.",
    image: "https://loremflickr.com/300/220/wallart,poster?lock=43",
  },
  {
    id: 44,
    name: "Ceramic Plant Pot Set",
    category: "homeliving",
    price: 329000,
    description: "Set 3 pot keramik minimalis dengan warna earth tone elegan.",
    image: "https://loremflickr.com/300/220/plant,pot?lock=44",
  },
  {
    id: 45,
    name: "Memory Foam Pillow",
    category: "homeliving",
    price: 699000,
    description: "Bantal memory foam ergonomis yang menyesuaikan postur leher.",
    image: "https://loremflickr.com/300/220/pillow,bedroom?lock=45",
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
