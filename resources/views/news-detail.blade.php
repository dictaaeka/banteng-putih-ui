@extends('layouts.app')

@section('title', 'Detail Berita - Desa Bantengputih')

@section('content')
    <!-- Breadcrumb -->
    <section class="bg-gray-100 py-4 mt-16">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <nav class="text-sm">
                <ol class="flex items-center space-x-2">
                    <li><a href="{{ route('home') }}" class="text-primary hover:text-accent">Beranda</a></li>
                    <li class="text-gray-400">/</li>
                    <li><a href="{{ route('news') }}" class="text-primary hover:text-accent">Berita</a></li>
                    <li class="text-gray-400">/</li>
                    <li class="text-gray-600">Detail Berita</li>
                </ol>
            </nav>
        </div>
    </section>

    <!-- Article Content -->
    <article class="py-20 bg-white">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
            <!-- Article Header -->
            <header class="mb-8">
                <div class="flex items-center space-x-4 mb-4">
                    <span class="bg-primary text-white px-3 py-1 rounded-full text-sm font-semibold">Infrastruktur</span>
                    <span class="text-gray-500">15 Desember 2024</span>
                    <span class="text-gray-400">•</span>
                    <span class="text-gray-500">Oleh: Admin Desa</span>
                </div>

                <h1 class="text-3xl md:text-4xl font-bold text-secondary mb-4">
                    Peresmian Jalan Desa Baru Sepanjang 2 KM
                </h1>

                <p class="text-xl text-gray-600 leading-relaxed">
                    Kepala Desa H. Musthofa meresmikan pembangunan jalan desa sepanjang 2 kilometer yang menghubungkan dusun
                    terpencil dengan pusat desa dalam rangka meningkatkan akses transportasi warga.
                </p>
            </header>

            <!-- Featured Image -->
            <div class="mb-8">
                <img src="https://placehold.co/800x400/4CAF50/FFFFFF?text=Peresmian+Jalan+Desa" alt="Peresmian Jalan Desa"
                    class="w-full h-96 object-cover rounded-lg shadow-lg">
                <p class="text-sm text-gray-500 mt-2 text-center">
                    Kepala Desa H. Musthofa bersama warga saat peresmian jalan desa baru
                </p>
            </div>

            <!-- Article Body -->
            <div class="prose prose-lg max-w-none">
                <p class="mb-6">
                    <strong>Bantengputih, 15 Desember 2024</strong> - Dalam acara yang dihadiri oleh seluruh perangkat desa
                    dan perwakilan warga dari ketiga dusun, Kepala Desa Bantengputih H. Musthofa, S.Pd secara resmi
                    meresmikan pembangunan jalan desa baru sepanjang 2 kilometer pada hari Minggu pagi.
                </p>

                <p class="mb-6">
                    Jalan yang menghubungkan Dusun Krajan dengan Dusun Tengah ini merupakan hasil kerja keras dan gotong
                    royong warga selama 3 bulan terakhir. Pembangunan jalan ini menggunakan dana dari Anggaran Pendapatan
                    dan Belanja Desa (APBDes) tahun 2024 sebesar Rp 500 juta.
                </p>

                <blockquote class="border-l-4 border-primary bg-gray-50 p-6 my-8 italic">
                    "Pembangunan jalan ini sangat penting untuk memudahkan akses warga, terutama untuk kegiatan ekonomi
                    seperti transportasi hasil pertanian dan perikanan ke pasar," ujar Kepala Desa H. Musthofa dalam
                    sambutannya.
                </blockquote>

                <p class="mb-6">
                    Pembangunan jalan ini tidak terlepas dari partisipasi aktif masyarakat. Warga secara sukarela
                    menyumbangkan tenaga, material lokal, dan bahkan menyediakan konsumsi untuk para pekerja. Semangat
                    gotong royong yang tinggi membuat proyek ini dapat diselesaikan lebih cepat dari jadwal yang
                    direncanakan.
                </p>

                <h3 class="text-2xl font-bold text-secondary mb-4">Manfaat untuk Masyarakat</h3>

                <p class="mb-4">Pembangunan jalan desa baru ini memberikan berbagai manfaat bagi masyarakat:</p>

                <ul class="list-disc list-inside mb-6 space-y-2">
                    <li>Memudahkan akses transportasi untuk kegiatan sehari-hari</li>
                    <li>Mempercepat distribusi hasil pertanian dan perikanan ke pasar</li>
                    <li>Meningkatkan nilai ekonomi tanah dan properti di sekitar jalan</li>
                    <li>Memudahkan akses layanan kesehatan dan pendidikan</li>
                    <li>Mendukung pengembangan wisata desa</li>
                </ul>

                <p class="mb-6">
                    Pak Sukarno (52), salah satu petani dari Dusun Tengah, mengungkapkan rasa terima kasihnya. "Dulu untuk
                    membawa hasil panen ke jalan utama harus memutar jauh. Sekarang dengan adanya jalan baru ini, waktu
                    tempuh bisa lebih singkat dan biaya transportasi juga lebih hemat," katanya.
                </p>

                <h3 class="text-2xl font-bold text-secondary mb-4">Rencana Pembangunan Selanjutnya</h3>

                <p class="mb-6">
                    Kepala Desa juga menyampaikan rencana pembangunan infrastruktur lainnya untuk tahun 2025. "Kami
                    berencana melanjutkan pembangunan jalan menuju area persawahan di Dusun Barat dan juga pembangunan
                    jembatan kecil di Sungai Banteng," tambah H. Musthofa.
                </p>

                <p class="mb-6">
                    Selain itu, pihak desa juga berencana memasang lampu penerangan jalan di sepanjang rute baru ini untuk
                    meningkatkan keamanan, terutama pada malam hari. Dana untuk proyek ini diharapkan bisa diperoleh melalui
                    hibah dari pemerintah kabupaten.
                </p>
            </div>

            <!-- Share Section -->
            <div class="border-t border-gray-200 pt-8 mt-8">
                <div class="flex items-center justify-between">
                    <div>
                        <h4 class="text-lg font-semibold text-secondary mb-2">Bagikan Artikel</h4>
                        <div class="flex space-x-4">
                            <a href="#"
                                class="bg-blue-600 text-white p-2 rounded-lg hover:bg-blue-700 transition-colors duration-200">
                                <i class="fab fa-facebook-f"></i>
                            </a>
                            <a href="#"
                                class="bg-green-600 text-white p-2 rounded-lg hover:bg-green-700 transition-colors duration-200">
                                <i class="fab fa-whatsapp"></i>
                            </a>
                            <a href="#"
                                class="bg-blue-400 text-white p-2 rounded-lg hover:bg-blue-500 transition-colors duration-200">
                                <i class="fab fa-twitter"></i>
                            </a>
                            <a href="#"
                                class="bg-gray-600 text-white p-2 rounded-lg hover:bg-gray-700 transition-colors duration-200">
                                <i class="fas fa-link"></i>
                            </a>
                        </div>
                    </div>
                    <div class="text-right">
                        <p class="text-sm text-gray-500">Diterbitkan:</p>
                        <p class="font-semibold text-secondary">15 Desember 2024</p>
                    </div>
                </div>
            </div>

            <!-- Navigation -->
            <div class="border-t border-gray-200 pt-8 mt-8">
                <div class="flex justify-between">
                    <div>
                        <p class="text-sm text-gray-500 mb-2">Artikel Sebelumnya:</p>
                        <a href="{{ route('news.detail', 2) }}" class="text-primary hover:text-accent font-semibold">
                            ← Pelatihan UMKM untuk Ibu-ibu PKK
                        </a>
                    </div>
                    <div class="text-right">
                        <p class="text-sm text-gray-500 mb-2">Artikel Selanjutnya:</p>
                        <a href="{{ route('news.detail', 3) }}" class="text-primary hover:text-accent font-semibold">
                            Gotong Royong Pembersihan Sungai Desa →
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </article>

    <!-- Related News -->
    <section class="py-20 bg-gray-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <h2 class="text-3xl md:text-4xl font-bold text-secondary text-center mb-12">Berita Terkait</h2>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <article
                    class="bg-white rounded-xl overflow-hidden shadow-lg hover:shadow-xl transform hover:-translate-y-1 transition-all duration-300">
                    <img src="https://placehold.co/400x250/4CAF50/FFFFFF?text=Pelatihan+UMKM" alt="Pelatihan UMKM"
                        class="w-full h-48 object-cover">
                    <div class="p-6">
                        <span class="text-primary font-semibold text-sm">10 Desember 2024</span>
                        <h3 class="text-lg font-bold text-secondary mt-2 mb-3">
                            <a href="{{ route('news.detail', 2) }}"
                                class="hover:text-primary transition-colors duration-200">
                                Pelatihan UMKM untuk Ibu-ibu PKK
                            </a>
                        </h3>
                        <p class="text-gray-600 text-sm">
                            Kegiatan pelatihan pembuatan produk olahan makanan untuk ibu-ibu PKK...
                        </p>
                    </div>
                </article>

                <article
                    class="bg-white rounded-xl overflow-hidden shadow-lg hover:shadow-xl transform hover:-translate-y-1 transition-all duration-300">
                    <img src="https://placehold.co/400x250/4CAF50/FFFFFF?text=Gotong+Royong" alt="Gotong Royong"
                        class="w-full h-48 object-cover">
                    <div class="p-6">
                        <span class="text-primary font-semibold text-sm">5 Desember 2024</span>
                        <h3 class="text-lg font-bold text-secondary mt-2 mb-3">
                            <a href="{{ route('news.detail', 3) }}"
                                class="hover:text-primary transition-colors duration-200">
                                Gotong Royong Pembersihan Sungai Desa
                            </a>
                        </h3>
                        <p class="text-gray-600 text-sm">
                            Warga bergotong royong membersihkan sungai desa untuk menjaga kelestarian...
                        </p>
                    </div>
                </article>

                <article
                    class="bg-white rounded-xl overflow-hidden shadow-lg hover:shadow-xl transform hover:-translate-y-1 transition-all duration-300">
                    <img src="https://placehold.co/400x250/4CAF50/FFFFFF?text=Festival+Budaya" alt="Festival Budaya"
                        class="w-full h-48 object-cover">
                    <div class="p-6">
                        <span class="text-primary font-semibold text-sm">1 Desember 2024</span>
                        <h3 class="text-lg font-bold text-secondary mt-2 mb-3">
                            <a href="{{ route('news.detail', 4) }}"
                                class="hover:text-primary transition-colors duration-200">
                                Festival Budaya Desa Bantengputih 2024
                            </a>
                        </h3>
                        <p class="text-gray-600 text-sm">
                            Perayaan festival budaya tahunan dengan berbagai pertunjukan seni...
                        </p>
                    </div>
                </article>
            </div>
        </div>
    </section>
@endsection
