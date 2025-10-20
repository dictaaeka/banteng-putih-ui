@extends('layouts.app')

@section('title', 'Desa Bantengputih - Tentang Kami')

@section('content')
    <!-- Hero Section -->
    <section class="relative bg-gradient-to-r from-primary to-accent py-20 mt-16">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
            <h1 class="text-4xl md:text-5xl font-bold text-white mb-4">Tentang Desa Bantengputih</h1>
            <p class="text-xl text-white opacity-90 max-w-2xl mx-auto">
                Mengenal lebih dekat sejarah, visi, misi, dan struktur organisasi Desa Bantengputih
            </p>
        </div>
    </section>

    <!-- Sejarah Section -->
    <section class="py-20 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">
                <div>
                    <h2 class="text-3xl md:text-4xl font-bold text-secondary mb-6">Sejarah Desa Bantengputih</h2>
                    <p class="text-gray-600 mb-6 leading-relaxed">
                        Desa Bantengputih memiliki sejarah panjang yang dimulai sejak abad ke-18. Nama "Bantengputih"
                        berasal dari legenda seekor banteng putih yang dipercaya sebagai penjaga spiritual desa.
                    </p>
                    <p class="text-gray-600 mb-6 leading-relaxed">
                        Terletak di Kecamatan Karanggeneng, Kabupaten Lamongan, desa ini telah mengalami berbagai
                        transformasi dari masa ke masa, namun tetap mempertahankan nilai-nilai gotong royong dan kearifan
                        lokal.
                    </p>
                    <p class="text-gray-600 leading-relaxed">
                        Dengan luas wilayah 179,01 hektare, Desa Bantengputih terbagi menjadi 3 dusun dan 9 RT yang dihuni
                        oleh 1.526 jiwa penduduk yang hidup rukun dan harmonis.
                    </p>
                </div>
                <div>
                    <img src="{{ asset('img/sejarah-bantengputih.jpg') }}" alt="Sejarah Desa Bantengputih"
                        class="w-full rounded-lg shadow-lg">
                </div>
            </div>
        </div>
    </section>

    <!-- Visi Misi Section -->
    <section class="py-20 bg-gray-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-12">
                <h2 class="text-3xl md:text-4xl font-bold text-secondary mb-4">Visi & Misi</h2>
                <p class="text-gray-600 max-w-2xl mx-auto">
                    Komitmen kami dalam membangun desa yang maju, mandiri, dan sejahtera
                </p>
            </div>

            <div class="grid grid-cols-1 lg:grid-cols-2 gap-12">
                <!-- Visi -->
                <div class="bg-white rounded-xl p-8 shadow-lg">
                    <div class="flex items-center mb-6">
                        <div class="bg-primary text-white p-3 rounded-lg mr-4">
                            <i class="fas fa-eye text-xl"></i>
                        </div>
                        <h3 class="text-2xl font-bold text-secondary">Visi</h3>
                    </div>
                    <p class="text-gray-600 leading-relaxed text-lg">
                        "Terwujudnya Desa Bantengputih Menjadi Desa Mandiri yang Sejahtera, Religius, dan Berbudaya"
                    </p>
                </div>

                <!-- Misi -->
                <div class="bg-white rounded-xl p-8 shadow-lg">
                    <div class="flex items-center mb-6">
                        <div class="bg-primary text-white p-3 rounded-lg mr-4">
                            <i class="fas fa-bullseye text-xl"></i>
                        </div>
                        <h3 class="text-2xl font-bold text-secondary">Misi</h3>
                    </div>
                    <ul class="space-y-3 text-gray-600">
                        <li class="flex items-start">
                            <i class="fas fa-check-circle text-primary mt-1 mr-3"></i>
                            Meningkatkan kualitas pelayanan kepada masyarakat
                        </li>
                        <li class="flex items-start">
                            <i class="fas fa-check-circle text-primary mt-1 mr-3"></i>
                            Memberdayakan ekonomi masyarakat desa
                        </li>
                        <li class="flex items-start">
                            <i class="fas fa-check-circle text-primary mt-1 mr-3"></i>
                            Melestarikan nilai-nilai budaya dan kearifan lokal
                        </li>
                        <li class="flex items-start">
                            <i class="fas fa-check-circle text-primary mt-1 mr-3"></i>
                            Meningkatkan kualitas infrastruktur desa
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </section>

    <!-- Struktur Organisasi Section -->
    <section class="py-20 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-12">
                <h2 class="text-3xl md:text-4xl font-bold text-secondary mb-4">Struktur Organisasi</h2>
                <p class="text-gray-600 max-w-2xl mx-auto">
                    Perangkat desa yang berkomitmen melayani masyarakat dengan sepenuh hati
                </p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                <!-- Kepala Desa -->
                <div
                    class="bg-gradient-to-br from-primary to-accent text-white rounded-xl p-8 text-center transform hover:scale-105 transition-all duration-300">
                    <div
                        class="w-24 h-24 bg-white bg-opacity-20 rounded-full flex items-center justify-center mx-auto mb-4">
                        <i class="fas fa-user-tie text-3xl"></i>
                    </div>
                    <h3 class="text-xl font-bold mb-2">Kepala Desa</h3>
                    <p class="text-lg font-semibold opacity-90">H. Musthofa, S.Pd</p>
                    <p class="text-sm opacity-75 mt-2">Periode 2019-2025</p>
                </div>

                <!-- Sekretaris Desa -->
                <div
                    class="bg-white border-2 border-primary rounded-xl p-8 text-center hover:shadow-xl transition-all duration-300">
                    <div
                        class="w-24 h-24 bg-primary bg-opacity-10 rounded-full flex items-center justify-center mx-auto mb-4">
                        <i class="fas fa-user-edit text-3xl text-primary"></i>
                    </div>
                    <h3 class="text-xl font-bold text-secondary mb-2">Sekretaris Desa</h3>
                    <p class="text-lg font-semibold text-gray-600">Ahmad Syafi'i</p>
                </div>

                <!-- Bendahara -->
                <div
                    class="bg-white border-2 border-primary rounded-xl p-8 text-center hover:shadow-xl transition-all duration-300">
                    <div
                        class="w-24 h-24 bg-primary bg-opacity-10 rounded-full flex items-center justify-center mx-auto mb-4">
                        <i class="fas fa-calculator text-3xl text-primary"></i>
                    </div>
                    <h3 class="text-xl font-bold text-secondary mb-2">Bendahara</h3>
                    <p class="text-lg font-semibold text-gray-600">Siti Nurhasanah</p>
                </div>

                <!-- Kaur Pemerintahan -->
                <div
                    class="bg-white border-2 border-primary rounded-xl p-8 text-center hover:shadow-xl transition-all duration-300">
                    <div
                        class="w-24 h-24 bg-primary bg-opacity-10 rounded-full flex items-center justify-center mx-auto mb-4">
                        <i class="fas fa-building text-3xl text-primary"></i>
                    </div>
                    <h3 class="text-xl font-bold text-secondary mb-2">Kaur Pemerintahan</h3>
                    <p class="text-lg font-semibold text-gray-600">Bambang Prasetyo</p>
                </div>

                <!-- Kaur Pembangunan -->
                <div
                    class="bg-white border-2 border-primary rounded-xl p-8 text-center hover:shadow-xl transition-all duration-300">
                    <div
                        class="w-24 h-24 bg-primary bg-opacity-10 rounded-full flex items-center justify-center mx-auto mb-4">
                        <i class="fas fa-hammer text-3xl text-primary"></i>
                    </div>
                    <h3 class="text-xl font-bold text-secondary mb-2">Kaur Pembangunan</h3>
                    <p class="text-lg font-semibold text-gray-600">Eko Wahyudi</p>
                </div>

                <!-- Kaur Kesejahteraan -->
                <div
                    class="bg-white border-2 border-primary rounded-xl p-8 text-center hover:shadow-xl transition-all duration-300">
                    <div
                        class="w-24 h-24 bg-primary bg-opacity-10 rounded-full flex items-center justify-center mx-auto mb-4">
                        <i class="fas fa-heart text-3xl text-primary"></i>
                    </div>
                    <h3 class="text-xl font-bold text-secondary mb-2">Kaur Kesejahteraan</h3>
                    <p class="text-lg font-semibold text-gray-600">Rina Widyaningsih</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Geografis Section -->
    <section class="py-20 bg-gray-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-12">
                <h2 class="text-3xl md:text-4xl font-bold text-secondary mb-4">Kondisi Geografis</h2>
                <p class="text-gray-600 max-w-2xl mx-auto">
                    Letak geografis dan kondisi alam Desa Bantengputih
                </p>
            </div>

            <div class="grid grid-cols-1 lg:grid-cols-2 gap-12">
                <div class="space-y-6">
                    <div class="bg-white rounded-lg p-6 shadow-md">
                        <h4 class="font-semibold text-secondary mb-2 flex items-center">
                            <i class="fas fa-map-marker-alt text-primary mr-2"></i>
                            Lokasi
                        </h4>
                        <p class="text-gray-600">Kecamatan Karanggeneng, Kabupaten Lamongan, Jawa Timur</p>
                    </div>

                    <div class="bg-white rounded-lg p-6 shadow-md">
                        <h4 class="font-semibold text-secondary mb-2 flex items-center">
                            <i class="fas fa-expand-arrows-alt text-primary mr-2"></i>
                            Luas Wilayah
                        </h4>
                        <p class="text-gray-600">179,01 Hektare</p>
                    </div>

                    <div class="bg-white rounded-lg p-6 shadow-md">
                        <h4 class="font-semibold text-secondary mb-2 flex items-center">
                            <i class="fas fa-mountain text-primary mr-2"></i>
                            Topografi
                        </h4>
                        <p class="text-gray-600">Dataran rendah dengan ketinggian 8-12 meter di atas permukaan laut</p>
                    </div>

                    <div class="bg-white rounded-lg p-6 shadow-md">
                        <h4 class="font-semibold text-secondary mb-2 flex items-center">
                            <i class="fas fa-thermometer-half text-primary mr-2"></i>
                            Iklim
                        </h4>
                        <p class="text-gray-600">Iklim tropis dengan suhu rata-rata 26-32°C</p>
                    </div>
                </div>

                <div>
                    <div class="bg-white rounded-lg p-6 shadow-md h-full">
                        <h4 class="font-semibold text-secondary mb-4 flex items-center">
                            <i class="fas fa-border-style text-primary mr-2"></i>
                            Batas Wilayah
                        </h4>
                        <div class="space-y-4">
                            <div class="flex justify-between border-b pb-2">
                                <span class="text-gray-600">Utara:</span>
                                <span class="font-medium">Desa Karanggeneng</span>
                            </div>
                            <div class="flex justify-between border-b pb-2">
                                <span class="text-gray-600">Selatan:</span>
                                <span class="font-medium">Desa Sidokelar</span>
                            </div>
                            <div class="flex justify-between border-b pb-2">
                                <span class="text-gray-600">Timur:</span>
                                <span class="font-medium">Desa Kranji</span>
                            </div>
                            <div class="flex justify-between">
                                <span class="text-gray-600">Barat:</span>
                                <span class="font-medium">Desa Sumurgung</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
