@extends('layouts.app')

@section('title', 'Desa Bantengputih - Berita & Kegiatan')

@section('content')
    <!-- Hero Section -->
    <section class="relative bg-gradient-to-r from-primary to-accent py-20 mt-16">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
            <h1 class="text-4xl md:text-5xl font-bold text-white mb-4">Berita & Kegiatan</h1>
            <p class="text-xl text-white opacity-90 max-w-2xl mx-auto">
                Informasi terkini tentang kegiatan dan perkembangan Desa Bantengputih
            </p>
        </div>
    </section>

    <!-- Featured News -->
    <section class="py-20 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <h2 class="text-3xl md:text-4xl font-bold text-secondary text-center mb-12">Berita Utama</h2>

            <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 mb-16">
                <article
                    class="bg-white rounded-xl overflow-hidden shadow-lg hover:shadow-xl transform hover:-translate-y-1 transition-all duration-300">
                    <img src="https://placehold.co/600x300/4CAF50/FFFFFF?text=Peresmian+Jalan+Desa"
                        alt="Peresmian Jalan Desa" class="w-full h-64 object-cover">
                    <div class="p-6">
                        <div class="flex items-center space-x-4 mb-4">
                            <span
                                class="bg-primary text-white px-3 py-1 rounded-full text-sm font-semibold">Infrastruktur</span>
                            <span class="text-gray-500 text-sm">15 Desember 2024</span>
                        </div>
                        <h3 class="text-2xl font-bold text-secondary mb-3">
                            <a href="{{ route('news.detail', 1) }}"
                                class="hover:text-primary transition-colors duration-200">
                                Peresmian Jalan Desa Baru Sepanjang 2 KM
                            </a>
                        </h3>
                        <p class="text-gray-600 mb-4">
                            Kepala Desa H. Musthofa meresmikan pembangunan jalan desa sepanjang 2 kilometer yang
                            menghubungkan dusun terpencil dengan pusat desa. Pembangunan ini merupakan hasil gotong
                            royong...
                        </p>
                        <a href="{{ route('news.detail', 1) }}"
                            class="inline-flex items-center text-primary font-semibold hover:text-accent transition-colors duration-200">
                            Baca Selengkapnya <i class="fas fa-arrow-right ml-2"></i>
                        </a>
                    </div>
                </article>

                <article
                    class="bg-white rounded-xl overflow-hidden shadow-lg hover:shadow-xl transform hover:-translate-y-1 transition-all duration-300">
                    <img src="https://placehold.co/600x300/4CAF50/FFFFFF?text=Pelatihan+UMKM" alt="Pelatihan UMKM"
                        class="w-full h-64 object-cover">
                    <div class="p-6">
                        <div class="flex items-center space-x-4 mb-4">
                            <span class="bg-accent text-white px-3 py-1 rounded-full text-sm font-semibold">Ekonomi</span>
                            <span class="text-gray-500 text-sm">10 Desember 2024</span>
                        </div>
                        <h3 class="text-2xl font-bold text-secondary mb-3">
                            <a href="{{ route('news.detail', 2) }}"
                                class="hover:text-primary transition-colors duration-200">
                                Pelatihan UMKM untuk Ibu-ibu PKK
                            </a>
                        </h3>
                        <p class="text-gray-600 mb-4">
                            Kegiatan pelatihan pembuatan produk olahan makanan untuk ibu-ibu PKK dalam rangka meningkatkan
                            ekonomi keluarga. Program ini didukung oleh Dinas Koperasi dan UMKM...
                        </p>
                        <a href="{{ route('news.detail', 2) }}"
                            class="inline-flex items-center text-primary font-semibold hover:text-accent transition-colors duration-200">
                            Baca Selengkapnya <i class="fas fa-arrow-right ml-2"></i>
                        </a>
                    </div>
                </article>
            </div>
        </div>
    </section>

    <!-- All News -->
    <section class="py-20 bg-gray-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex flex-col md:flex-row justify-between items-center mb-12">
                <h2 class="text-3xl md:text-4xl font-bold text-secondary mb-4 md:mb-0">Semua Berita</h2>

                <!-- Filter Categories -->
                <div class="flex flex-wrap gap-2">
                    <button class="bg-primary text-white px-4 py-2 rounded-full text-sm font-semibold">Semua</button>
                    <button
                        class="bg-white text-gray-700 px-4 py-2 rounded-full text-sm font-semibold hover:bg-primary hover:text-white transition-colors duration-300">Infrastruktur</button>
                    <button
                        class="bg-white text-gray-700 px-4 py-2 rounded-full text-sm font-semibold hover:bg-primary hover:text-white transition-colors duration-300">Ekonomi</button>
                    <button
                        class="bg-white text-gray-700 px-4 py-2 rounded-full text-sm font-semibold hover:bg-primary hover:text-white transition-colors duration-300">Sosial</button>
                    <button
                        class="bg-white text-gray-700 px-4 py-2 rounded-full text-sm font-semibold hover:bg-primary hover:text-white transition-colors duration-300">Budaya</button>
                </div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                <!-- News Item 1 -->
                <article
                    class="bg-white rounded-xl overflow-hidden shadow-lg hover:shadow-xl transform hover:-translate-y-1 transition-all duration-300">
                    <img src="https://placehold.co/400x250/4CAF50/FFFFFF?text=Gotong+Royong" alt="Gotong Royong"
                        class="w-full h-48 object-cover">
                    <div class="p-6">
                        <div class="flex items-center space-x-4 mb-3">
                            <span class="bg-green-500 text-white px-2 py-1 rounded-full text-xs font-semibold">Sosial</span>
                            <span class="text-gray-500 text-sm">5 Desember 2024</span>
                        </div>
                        <h3 class="text-lg font-bold text-secondary mb-2">
                            <a href="{{ route('news.detail', 3) }}"
                                class="hover:text-primary transition-colors duration-200">
                                Gotong Royong Pembersihan Sungai Desa
                            </a>
                        </h3>
                        <p class="text-gray-600 text-sm mb-3">
                            Warga bergotong royong membersihkan sungai desa untuk menjaga kelestarian lingkungan...
                        </p>
                        <a href="{{ route('news.detail', 3) }}"
                            class="text-primary font-semibold text-sm hover:text-accent transition-colors duration-200">
                            Baca Selengkapnya →
                        </a>
                    </div>
                </article>

                <!-- News Item 2 -->
                <article
                    class="bg-white rounded-xl overflow-hidden shadow-lg hover:shadow-xl transform hover:-translate-y-1 transition-all duration-300">
                    <img src="https://placehold.co/400x250/4CAF50/FFFFFF?text=Festival+Budaya" alt="Festival Budaya"
                        class="w-full h-48 object-cover">
                    <div class="p-6">
                        <div class="flex items-center space-x-4 mb-3">
                            <span
                                class="bg-purple-500 text-white px-2 py-1 rounded-full text-xs font-semibold">Budaya</span>
                            <span class="text-gray-500 text-sm">1 Desember 2024</span>
                        </div>
                        <h3 class="text-lg font-bold text-secondary mb-2">
                            <a href="{{ route('news.detail', 4) }}"
                                class="hover:text-primary transition-colors duration-200">
                                Festival Budaya Desa Bantengputih 2024
                            </a>
                        </h3>
                        <p class="text-gray-600 text-sm mb-3">
                            Perayaan festival budaya tahunan dengan berbagai pertunjukan seni tradisional...
                        </p>
                        <a href="{{ route('news.detail', 4) }}"
                            class="text-primary font-semibold text-sm hover:text-accent transition-colors duration-200">
                            Baca Selengkapnya →
                        </a>
                    </div>
                </article>

                <!-- News Item 3 -->
                <article
                    class="bg-white rounded-xl overflow-hidden shadow-lg hover:shadow-xl transform hover:-translate-y-1 transition-all duration-300">
                    <img src="https://placehold.co/400x250/4CAF50/FFFFFF?text=Panen+Raya" alt="Panen Raya"
                        class="w-full h-48 object-cover">
                    <div class="p-6">
                        <div class="flex items-center space-x-4 mb-3">
                            <span
                                class="bg-yellow-500 text-white px-2 py-1 rounded-full text-xs font-semibold">Ekonomi</span>
                            <span class="text-gray-500 text-sm">25 November 2024</span>
                        </div>
                        <h3 class="text-lg font-bold text-secondary mb-2">
                            <a href="{{ route('news.detail', 5) }}"
                                class="hover:text-primary transition-colors duration-200">
                                Panen Raya Padi Varietas Unggul
                            </a>
                        </h3>
                        <p class="text-gray-600 text-sm mb-3">
                            Petani desa merayakan panen raya dengan hasil yang memuaskan dari varietas padi unggul...
                        </p>
                        <a href="{{ route('news.detail', 5) }}"
                            class="text-primary font-semibold text-sm hover:text-accent transition-colors duration-200">
                            Baca Selengkapnya →
                        </a>
                    </div>
                </article>

                <!-- News Item 4 -->
                <article
                    class="bg-white rounded-xl overflow-hidden shadow-lg hover:shadow-xl transform hover:-translate-y-1 transition-all duration-300">
                    <img src="https://placehold.co/400x250/4CAF50/FFFFFF?text=Posyandu" alt="Posyandu"
                        class="w-full h-48 object-cover">
                    <div class="p-6">
                        <div class="flex items-center space-x-4 mb-3">
                            <span
                                class="bg-red-500 text-white px-2 py-1 rounded-full text-xs font-semibold">Kesehatan</span>
                            <span class="text-gray-500 text-sm">20 November 2024</span>
                        </div>
                        <h3 class="text-lg font-bold text-secondary mb-2">
                            <a href="{{ route('news.detail', 6) }}"
                                class="hover:text-primary transition-colors duration-200">
                                Posyandu Balita dan Lansia Rutin
                            </a>
                        </h3>
                        <p class="text-gray-600 text-sm mb-3">
                            Kegiatan posyandu rutin untuk memantau kesehatan balita dan lansia di desa...
                        </p>
                        <a href="{{ route('news.detail', 6) }}"
                            class="text-primary font-semibold text-sm hover:text-accent transition-colors duration-200">
                            Baca Selengkapnya →
                        </a>
                    </div>
                </article>

                <!-- News Item 5 -->
                <article
                    class="bg-white rounded-xl overflow-hidden shadow-lg hover:shadow-xl transform hover:-translate-y-1 transition-all duration-300">
                    <img src="https://placehold.co/400x250/4CAF50/FFFFFF?text=Renovasi+Masjid" alt="Renovasi Masjid"
                        class="w-full h-48 object-cover">
                    <div class="p-6">
                        <div class="flex items-center space-x-4 mb-3">
                            <span
                                class="bg-blue-500 text-white px-2 py-1 rounded-full text-xs font-semibold">Infrastruktur</span>
                            <span class="text-gray-500 text-sm">15 November 2024</span>
                        </div>
                        <h3 class="text-lg font-bold text-secondary mb-2">
                            <a href="{{ route('news.detail', 7) }}"
                                class="hover:text-primary transition-colors duration-200">
                                Renovasi Masjid Al-Ikhlas Selesai
                            </a>
                        </h3>
                        <p class="text-gray-600 text-sm mb-3">
                            Renovasi Masjid Al-Ikhlas telah selesai dengan fasilitas yang lebih lengkap...
                        </p>
                        <a href="{{ route('news.detail', 7) }}"
                            class="text-primary font-semibold text-sm hover:text-accent transition-colors duration-200">
                            Baca Selengkapnya →
                        </a>
                    </div>
                </article>

                <!-- News Item 6 -->
                <article
                    class="bg-white rounded-xl overflow-hidden shadow-lg hover:shadow-xl transform hover:-translate-y-1 transition-all duration-300">
                    <img src="https://placehold.co/400x250/4CAF50/FFFFFF?text=Pelatihan+Digital" alt="Pelatihan Digital"
                        class="w-full h-48 object-cover">
                    <div class="p-6">
                        <div class="flex items-center space-x-4 mb-3">
                            <span
                                class="bg-indigo-500 text-white px-2 py-1 rounded-full text-xs font-semibold">Teknologi</span>
                            <span class="text-gray-500 text-sm">10 November 2024</span>
                        </div>
                        <h3 class="text-lg font-bold text-secondary mb-2">
                            <a href="{{ route('news.detail', 8) }}"
                                class="hover:text-primary transition-colors duration-200">
                                Pelatihan Literasi Digital untuk Remaja
                            </a>
                        </h3>
                        <p class="text-gray-600 text-sm mb-3">
                            Program pelatihan literasi digital untuk remaja desa dalam rangka peningkatan skill...
                        </p>
                        <a href="{{ route('news.detail', 8) }}"
                            class="text-primary font-semibold text-sm hover:text-accent transition-colors duration-200">
                            Baca Selengkapnya →
                        </a>
                    </div>
                </article>
            </div>

            <!-- Pagination -->
            <div class="flex justify-center mt-12">
                <nav class="flex items-center space-x-2">
                    <button class="px-3 py-2 text-gray-500 hover:text-primary transition-colors duration-200">
                        <i class="fas fa-chevron-left"></i>
                    </button>
                    <button class="px-4 py-2 bg-primary text-white rounded-lg">1</button>
                    <button
                        class="px-4 py-2 text-gray-700 hover:bg-gray-100 rounded-lg transition-colors duration-200">2</button>
                    <button
                        class="px-4 py-2 text-gray-700 hover:bg-gray-100 rounded-lg transition-colors duration-200">3</button>
                    <button class="px-3 py-2 text-gray-500 hover:text-primary transition-colors duration-200">
                        <i class="fas fa-chevron-right"></i>
                    </button>
                </nav>
            </div>
        </div>
    </section>
@endsection
