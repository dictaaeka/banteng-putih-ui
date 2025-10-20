@extends('layouts.app')

@section('title', 'Wisata Desa - Desa Bantengputih')

@section('content')
    <!-- Hero Section -->
    <section class="relative bg-gradient-to-r from-primary to-accent py-20 mt-16">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
            <h1 class="text-4xl md:text-5xl font-bold text-white mb-4">Wisata Desa Bantengputih</h1>
            <p class="text-xl text-white opacity-90 max-w-2xl mx-auto">
                Jelajahi keindahan alam dan budaya lokal di Desa Bantengputih
            </p>
            <div class="mt-8">
                <a href="#destinations"
                    class="bg-white text-primary hover:bg-gray-100 px-8 py-3 rounded-full font-semibold transition-colors duration-300">
                    Jelajahi Sekarang
                </a>
            </div>
        </div>
    </section>

    <!-- Tour Packages -->
    <section id="destinations" class="py-20 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-12">
                <h2 class="text-3xl md:text-4xl font-bold text-secondary mb-4">Paket Wisata</h2>
                <p class="text-gray-600 max-w-2xl mx-auto">
                    Pilihan paket wisata untuk menikmati pesona Desa Bantengputih
                </p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8 mb-12">
                <!-- Package 1: Agrowisata -->
                <div
                    class="bg-white rounded-xl shadow-lg overflow-hidden group hover:shadow-2xl transition-shadow duration-300">
                    <div class="relative h-48 bg-gradient-to-br from-green-400 to-green-600">
                        <img src="{{ asset('ui/img/padi.jpg') }}" alt="Agrowisata" class="w-full h-full object-cover">
                        <div
                            class="absolute top-4 left-4 bg-primary text-white px-3 py-1 rounded-full text-sm font-semibold">
                            Populer
                        </div>
                        <div
                            class="absolute inset-0 bg-black bg-opacity-20 group-hover:bg-opacity-30 transition-all duration-300">
                        </div>
                    </div>
                    <div class="p-6">
                        <h3 class="text-xl font-bold text-secondary mb-2">Paket Agrowisata</h3>
                        <p class="text-gray-600 text-sm mb-4">Nikmati pengalaman bertani langsung bersama petani lokal,
                            panen hasil pertanian, dan belajar teknik budidaya modern.</p>

                        <div class="space-y-2 mb-4">
                            <div class="flex items-center text-sm text-gray-600">
                                <i class="fas fa-clock mr-2 text-primary"></i>
                                <span>Durasi: 6 jam</span>
                            </div>
                            <div class="flex items-center text-sm text-gray-600">
                                <i class="fas fa-users mr-2 text-primary"></i>
                                <span>Min. 10 orang</span>
                            </div>
                            <div class="flex items-center text-sm text-gray-600">
                                <i class="fas fa-calendar mr-2 text-primary"></i>
                                <span>Setiap hari</span>
                            </div>
                        </div>

                        <div class="flex justify-between items-center">
                            <div>
                                <span class="text-2xl font-bold text-primary">Rp 75.000</span>
                                <span class="text-sm text-gray-600">/orang</span>
                            </div>
                            <button
                                class="bg-primary hover:bg-accent text-white px-4 py-2 rounded-lg text-sm font-medium transition-colors duration-300">
                                Pesan Sekarang
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Package 2: Tambak Tour -->
                <div
                    class="bg-white rounded-xl shadow-lg overflow-hidden group hover:shadow-2xl transition-shadow duration-300">
                    <div class="relative h-48 bg-gradient-to-br from-blue-400 to-blue-600">
                        <img src="{{ asset('ui/img/tambak.png') }}" alt="Wisata Tambak" class="w-full h-full object-cover">
                        <div
                            class="absolute inset-0 bg-black bg-opacity-20 group-hover:bg-opacity-30 transition-all duration-300">
                        </div>
                    </div>
                    <div class="p-6">
                        <h3 class="text-xl font-bold text-secondary mb-2">Wisata Tambak</h3>
                        <p class="text-gray-600 text-sm mb-4">Kunjungi tambak ikan dan udang, belajar teknik budidaya, dan
                            nikmati hasil panen langsung dari tambak.</p>

                        <div class="space-y-2 mb-4">
                            <div class="flex items-center text-sm text-gray-600">
                                <i class="fas fa-clock mr-2 text-primary"></i>
                                <span>Durasi: 4 jam</span>
                            </div>
                            <div class="flex items-center text-sm text-gray-600">
                                <i class="fas fa-users mr-2 text-primary"></i>
                                <span>Min. 8 orang</span>
                            </div>
                            <div class="flex items-center text-sm text-gray-600">
                                <i class="fas fa-calendar mr-2 text-primary"></i>
                                <span>Senin-Sabtu</span>
                            </div>
                        </div>

                        <div class="flex justify-between items-center">
                            <div>
                                <span class="text-2xl font-bold text-primary">Rp 60.000</span>
                                <span class="text-sm text-gray-600">/orang</span>
                            </div>
                            <button
                                class="bg-primary hover:bg-accent text-white px-4 py-2 rounded-lg text-sm font-medium transition-colors duration-300">
                                Pesan Sekarang
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Package 3: Village Tour -->
                <div
                    class="bg-white rounded-xl shadow-lg overflow-hidden group hover:shadow-2xl transition-shadow duration-300">
                    <div class="relative h-48 bg-gradient-to-br from-purple-400 to-purple-600">
                        <img src="{{ asset('ui/img/hero-gotong-royong.jpg') }}" alt="Village Tour"
                            class="w-full h-full object-cover">
                        <div
                            class="absolute inset-0 bg-black bg-opacity-20 group-hover:bg-opacity-30 transition-all duration-300">
                        </div>
                    </div>
                    <div class="p-6">
                        <h3 class="text-xl font-bold text-secondary mb-2">Keliling Desa</h3>
                        <p class="text-gray-600 text-sm mb-4">Jelajahi keseluruhan desa dengan sepeda, kunjungi rumah
                            tradisional, dan berinteraksi dengan masyarakat lokal.</p>

                        <div class="space-y-2 mb-4">
                            <div class="flex items-center text-sm text-gray-600">
                                <i class="fas fa-clock mr-2 text-primary"></i>
                                <span>Durasi: 3 jam</span>
                            </div>
                            <div class="flex items-center text-sm text-gray-600">
                                <i class="fas fa-users mr-2 text-primary"></i>
                                <span>Min. 5 orang</span>
                            </div>
                            <div class="flex items-center text-sm text-gray-600">
                                <i class="fas fa-calendar mr-2 text-primary"></i>
                                <span>Setiap hari</span>
                            </div>
                        </div>

                        <div class="flex justify-between items-center">
                            <div>
                                <span class="text-2xl font-bold text-primary">Rp 45.000</span>
                                <span class="text-sm text-gray-600">/orang</span>
                            </div>
                            <button
                                class="bg-primary hover:bg-accent text-white px-4 py-2 rounded-lg text-sm font-medium transition-colors duration-300">
                                Pesan Sekarang
                            </button>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Special Packages -->
            <div class="bg-gradient-to-r from-primary to-accent rounded-xl p-8 text-white">
                <div class="text-center mb-8">
                    <h3 class="text-2xl font-bold mb-2">Paket Khusus</h3>
                    <p class="text-white opacity-90">Paket wisata dengan pengalaman lengkap dan mendalam</p>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                    <!-- Weekend Package -->
                    <div class="bg-white bg-opacity-10 rounded-lg p-6">
                        <h4 class="text-xl font-bold mb-3">Paket Weekend Escape</h4>
                        <div class="space-y-2 mb-4 text-sm">
                            <p><i class="fas fa-check mr-2"></i>2 hari 1 malam</p>
                            <p><i class="fas fa-check mr-2"></i>Menginap di homestay</p>
                            <p><i class="fas fa-check mr-2"></i>3x makan</p>
                            <p><i class="fas fa-check mr-2"></i>Semua aktivitas wisata</p>
                            <p><i class="fas fa-check mr-2"></i>Guide lokal</p>
                        </div>
                        <div class="flex justify-between items-center">
                            <div>
                                <span class="text-2xl font-bold">Rp 350.000</span>
                                <span class="text-sm opacity-90">/orang</span>
                            </div>
                            <button
                                class="bg-white text-primary hover:bg-gray-100 px-4 py-2 rounded-lg text-sm font-medium transition-colors duration-300">
                                Detail
                            </button>
                        </div>
                    </div>

                    <!-- Educational Package -->
                    <div class="bg-white bg-opacity-10 rounded-lg p-6">
                        <h4 class="text-xl font-bold mb-3">Paket Edukasi Sekolah</h4>
                        <div class="space-y-2 mb-4 text-sm">
                            <p><i class="fas fa-check mr-2"></i>1 hari penuh</p>
                            <p><i class="fas fa-check mr-2"></i>Program edukatif</p>
                            <p><i class="fas fa-check mr-2"></i>Makan siang</p>
                            <p><i class="fas fa-check mr-2"></i>Sertifikat</p>
                            <p><i class="fas fa-check mr-2"></i>Souvenir khas</p>
                        </div>
                        <div class="flex justify-between items-center">
                            <div>
                                <span class="text-2xl font-bold">Rp 50.000</span>
                                <span class="text-sm opacity-90">/siswa</span>
                            </div>
                            <button
                                class="bg-white text-primary hover:bg-gray-100 px-4 py-2 rounded-lg text-sm font-medium transition-colors duration-300">
                                Detail
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Tourist Attractions -->
    <section class="py-20 bg-gray-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-12">
                <h2 class="text-3xl md:text-4xl font-bold text-secondary mb-4">Objek Wisata</h2>
                <p class="text-gray-600 max-w-2xl mx-auto">
                    Temukan keindahan dan keunikan berbagai objek wisata di Desa Bantengputih
                </p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                <!-- Attraction 1 -->
                <div class="bg-white rounded-xl shadow-lg overflow-hidden">
                    <div class="h-48 bg-gradient-to-br from-green-400 to-green-600">
                        <img src="{{ asset('ui/img/hero-pemandangan.jpg') }}" alt="Pemandangan Alam"
                            class="w-full h-full object-cover">
                    </div>
                    <div class="p-6">
                        <h3 class="text-xl font-bold text-secondary mb-2">Pemandangan Persawahan</h3>
                        <p class="text-gray-600 text-sm mb-4">Hamparan sawah hijau yang memukau dengan sistem irigasi
                            tradisional yang masih terjaga.</p>
                        <div class="flex items-center justify-between">
                            <div class="flex items-center text-sm text-gray-500">
                                <i class="fas fa-map-marker-alt mr-1"></i>
                                <span>Dusun Krajan</span>
                            </div>
                            <div class="flex items-center text-primary">
                                <i class="fas fa-star text-xs mr-1"></i>
                                <span class="text-sm font-medium">4.8</span>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Attraction 2 -->
                <div class="bg-white rounded-xl shadow-lg overflow-hidden">
                    <div class="h-48 bg-gradient-to-br from-blue-400 to-blue-600">
                        <img src="{{ asset('ui/img/tambak.png') }}" alt="Tambak Ikan" class="w-full h-full object-cover">
                    </div>
                    <div class="p-6">
                        <h3 class="text-xl font-bold text-secondary mb-2">Area Tambak</h3>
                        <p class="text-gray-600 text-sm mb-4">Kompleks tambak ikan dan udang dengan teknologi modern yang
                            ramah lingkungan.</p>
                        <div class="flex items-center justify-between">
                            <div class="flex items-center text-sm text-gray-500">
                                <i class="fas fa-map-marker-alt mr-1"></i>
                                <span>Dusun Timur</span>
                            </div>
                            <div class="flex items-center text-primary">
                                <i class="fas fa-star text-xs mr-1"></i>
                                <span class="text-sm font-medium">4.6</span>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Attraction 3 -->
                <div class="bg-white rounded-xl shadow-lg overflow-hidden">
                    <div class="h-48 bg-gradient-to-br from-purple-400 to-purple-600">
                        <img src="{{ asset('ui/img/sejarah-bantengputih.jpg') }}" alt="Rumah Tradisional"
                            class="w-full h-full object-cover">
                    </div>
                    <div class="p-6">
                        <h3 class="text-xl font-bold text-secondary mb-2">Rumah Tradisional</h3>
                        <p class="text-gray-600 text-sm mb-4">Rumah-rumah tradisional Jawa yang masih terawat dengan
                            arsitektur khas dan nilai sejarah.</p>
                        <div class="flex items-center justify-between">
                            <div class="flex items-center text-sm text-gray-500">
                                <i class="fas fa-map-marker-alt mr-1"></i>
                                <span>Dusun Tengah</span>
                            </div>
                            <div class="flex items-center text-primary">
                                <i class="fas fa-star text-xs mr-1"></i>
                                <span class="text-sm font-medium">4.7</span>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Attraction 4 -->
                <div class="bg-white rounded-xl shadow-lg overflow-hidden">
                    <div class="h-48 bg-gradient-to-br from-yellow-400 to-orange-500">
                        <img src="{{ asset('ui/img/hero-produk.png') }}" alt="Pasar Tradisional"
                            class="w-full h-full object-cover">
                    </div>
                    <div class="p-6">
                        <h3 class="text-xl font-bold text-secondary mb-2">Pasar Tani</h3>
                        <p class="text-gray-600 text-sm mb-4">Pasar tradisional dengan hasil bumi segar dan produk olahan
                            khas desa.</p>
                        <div class="flex items-center justify-between">
                            <div class="flex items-center text-sm text-gray-500">
                                <i class="fas fa-map-marker-alt mr-1"></i>
                                <span>Pusat Desa</span>
                            </div>
                            <div class="flex items-center text-primary">
                                <i class="fas fa-star text-xs mr-1"></i>
                                <span class="text-sm font-medium">4.5</span>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Attraction 5 -->
                <div class="bg-white rounded-xl shadow-lg overflow-hidden">
                    <div class="h-48 bg-gradient-to-br from-teal-400 to-teal-600">
                        <img src="{{ asset('ui/img/pemandangan.jpeg') }}" alt="Sungai Desa"
                            class="w-full h-full object-cover">
                    </div>
                    <div class="p-6">
                        <h3 class="text-xl font-bold text-secondary mb-2">Sungai Desa</h3>
                        <p class="text-gray-600 text-sm mb-4">Sungai jernih yang mengalir di tengah desa, cocok untuk
                            aktivitas memancing dan berperahu.</p>
                        <div class="flex items-center justify-between">
                            <div class="flex items-center text-sm text-gray-500">
                                <i class="fas fa-map-marker-alt mr-1"></i>
                                <span>Sepanjang Desa</span>
                            </div>
                            <div class="flex items-center text-primary">
                                <i class="fas fa-star text-xs mr-1"></i>
                                <span class="text-sm font-medium">4.9</span>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Attraction 6 -->
                <div class="bg-white rounded-xl shadow-lg overflow-hidden">
                    <div class="h-48 bg-gradient-to-br from-red-400 to-red-600">
                        <img src="{{ asset('ui/img/hero-gotong-royong.jpg') }}" alt="Balai Desa"
                            class="w-full h-full object-cover">
                    </div>
                    <div class="p-6">
                        <h3 class="text-xl font-bold text-secondary mb-2">Balai Desa Heritage</h3>
                        <p class="text-gray-600 text-sm mb-4">Bangunan bersejarah balai desa dengan arsitektur kolonial
                            yang menjadi pusat kegiatan.</p>
                        <div class="flex items-center justify-between">
                            <div class="flex items-center text-sm text-gray-500">
                                <i class="fas fa-map-marker-alt mr-1"></i>
                                <span>Pusat Desa</span>
                            </div>
                            <div class="flex items-center text-primary">
                                <i class="fas fa-star text-xs mr-1"></i>
                                <span class="text-sm font-medium">4.4</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Activities & Experiences -->
    <section class="py-20 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-12">
                <h2 class="text-3xl md:text-4xl font-bold text-secondary mb-4">Aktivitas Wisata</h2>
                <p class="text-gray-600 max-w-2xl mx-auto">
                    Berbagai kegiatan menarik yang dapat Anda nikmati selama berkunjung
                </p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
                <!-- Activity 1 -->
                <div class="text-center p-6 rounded-xl hover:bg-gray-50 transition-colors duration-300">
                    <div
                        class="w-16 h-16 bg-primary bg-opacity-10 rounded-full flex items-center justify-center mx-auto mb-4">
                        <i class="fas fa-seedling text-primary text-2xl"></i>
                    </div>
                    <h3 class="font-bold text-secondary mb-2">Berkebun Organik</h3>
                    <p class="text-gray-600 text-sm">Belajar teknik bercocok tanam organik dan menanam bibit sendiri</p>
                </div>

                <!-- Activity 2 -->
                <div class="text-center p-6 rounded-xl hover:bg-gray-50 transition-colors duration-300">
                    <div
                        class="w-16 h-16 bg-primary bg-opacity-10 rounded-full flex items-center justify-center mx-auto mb-4">
                        <i class="fas fa-fish text-primary text-2xl"></i>
                    </div>
                    <h3 class="font-bold text-secondary mb-2">Memancing</h3>
                    <p class="text-gray-600 text-sm">Memancing di sungai atau tambak dengan pemandangan yang indah</p>
                </div>

                <!-- Activity 3 -->
                <div class="text-center p-6 rounded-xl hover:bg-gray-50 transition-colors duration-300">
                    <div
                        class="w-16 h-16 bg-primary bg-opacity-10 rounded-full flex items-center justify-center mx-auto mb-4">
                        <i class="fas fa-bicycle text-primary text-2xl"></i>
                    </div>
                    <h3 class="font-bold text-secondary mb-2">Bersepeda</h3>
                    <p class="text-gray-600 text-sm">Berkeliling desa dengan sepeda sambil menikmati udara segar</p>
                </div>

                <!-- Activity 4 -->
                <div class="text-center p-6 rounded-xl hover:bg-gray-50 transition-colors duration-300">
                    <div
                        class="w-16 h-16 bg-primary bg-opacity-10 rounded-full flex items-center justify-center mx-auto mb-4">
                        <i class="fas fa-camera text-primary text-2xl"></i>
                    </div>
                    <h3 class="font-bold text-secondary mb-2">Fotografi</h3>
                    <p class="text-gray-600 text-sm">Hunting foto dengan latar belakang pemandangan alam yang menawan</p>
                </div>

                <!-- Activity 5 -->
                <div class="text-center p-6 rounded-xl hover:bg-gray-50 transition-colors duration-300">
                    <div
                        class="w-16 h-16 bg-primary bg-opacity-10 rounded-full flex items-center justify-center mx-auto mb-4">
                        <i class="fas fa-utensils text-primary text-2xl"></i>
                    </div>
                    <h3 class="font-bold text-secondary mb-2">Kuliner Tradisional</h3>
                    <p class="text-gray-600 text-sm">Memasak dan menikmati makanan khas dengan bahan-bahan lokal</p>
                </div>

                <!-- Activity 6 -->
                <div class="text-center p-6 rounded-xl hover:bg-gray-50 transition-colors duration-300">
                    <div
                        class="w-16 h-16 bg-primary bg-opacity-10 rounded-full flex items-center justify-center mx-auto mb-4">
                        <i class="fas fa-paint-brush text-primary text-2xl"></i>
                    </div>
                    <h3 class="font-bold text-secondary mb-2">Kerajinan</h3>
                    <p class="text-gray-600 text-sm">Membuat kerajinan tangan dari bahan-bahan alami setempat</p>
                </div>

                <!-- Activity 7 -->
                <div class="text-center p-6 rounded-xl hover:bg-gray-50 transition-colors duration-300">
                    <div
                        class="w-16 h-16 bg-primary bg-opacity-10 rounded-full flex items-center justify-center mx-auto mb-4">
                        <i class="fas fa-music text-primary text-2xl"></i>
                    </div>
                    <h3 class="font-bold text-secondary mb-2">Seni Budaya</h3>
                    <p class="text-gray-600 text-sm">Menyaksikan dan belajar seni tradisional seperti gamelan dan tari</p>
                </div>

                <!-- Activity 8 -->
                <div class="text-center p-6 rounded-xl hover:bg-gray-50 transition-colors duration-300">
                    <div
                        class="w-16 h-16 bg-primary bg-opacity-10 rounded-full flex items-center justify-center mx-auto mb-4">
                        <i class="fas fa-bed text-primary text-2xl"></i>
                    </div>
                    <h3 class="font-bold text-secondary mb-2">Homestay</h3>
                    <p class="text-gray-600 text-sm">Menginap bersama keluarga lokal dan merasakan kehidupan desa</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Booking Section -->
    <section class="py-20 bg-gradient-to-r from-primary to-accent">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
            <h2 class="text-3xl md:text-4xl font-bold text-white mb-4">Siap untuk Berpetualang?</h2>
            <p class="text-xl text-white opacity-90 mb-8 max-w-2xl mx-auto">
                Hubungi kami sekarang untuk merencanakan petualangan tak terlupakan di Desa Bantengputih
            </p>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
                <div class="bg-white bg-opacity-10 rounded-lg p-4">
                    <i class="fas fa-phone text-2xl text-white mb-2"></i>
                    <p class="text-white text-sm">Telepon</p>
                    <p class="text-white font-semibold">+62 812-3456-7890</p>
                </div>

                <div class="bg-white bg-opacity-10 rounded-lg p-4">
                    <i class="fas fa-envelope text-2xl text-white mb-2"></i>
                    <p class="text-white text-sm">Email</p>
                    <p class="text-white font-semibold">wisata@bantengputih.id</p>
                </div>

                <div class="bg-white bg-opacity-10 rounded-lg p-4">
                    <i class="fab fa-whatsapp text-2xl text-white mb-2"></i>
                    <p class="text-white text-sm">WhatsApp</p>
                    <p class="text-white font-semibold">+62 812-3456-7890</p>
                </div>
            </div>

            <div class="space-x-4">
                <a href="{{ route('contact') }}"
                    class="bg-white text-primary hover:bg-gray-100 px-8 py-3 rounded-full font-semibold transition-colors duration-300 inline-block">
                    Hubungi Kami
                </a>
                <button
                    class="bg-transparent border-2 border-white text-white hover:bg-white hover:text-primary px-8 py-3 rounded-full font-semibold transition-colors duration-300">
                    Download Brosur
                </button>
            </div>
        </div>
    </section>
@endsection
