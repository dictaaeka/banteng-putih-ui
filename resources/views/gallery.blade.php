@extends('layouts.app')

@section('title', 'Desa Bantengputih - Galeri')

@section('content')
    <!-- Hero Section -->
    <section class="relative bg-gradient-to-r from-primary to-accent py-20 mt-16">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
            <h1 class="text-4xl md:text-5xl font-bold text-white mb-4">Galeri Foto</h1>
            <p class="text-xl text-white opacity-90 max-w-2xl mx-auto">
                Dokumentasi kegiatan dan keindahan Desa Bantengputih
            </p>
        </div>
    </section>

    <!-- Gallery Grid -->
    <section class="py-20 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                <!-- Gallery Item 1 -->
                <div
                    class="bg-white rounded-xl overflow-hidden shadow-lg hover:shadow-xl transform hover:-translate-y-1 transition-all duration-300">
                    <img src="{{ asset('img/hero-pemandangan.jpg') }}" alt="Pemandangan Desa"
                        class="w-full h-64 object-cover">
                    <div class="p-4">
                        <h3 class="font-bold text-secondary mb-2">Pemandangan Sawah</h3>
                        <p class="text-gray-600 text-sm">Hamparan sawah hijau di Desa Bantengputih</p>
                    </div>
                </div>

                <!-- Gallery Item 2 -->
                <div
                    class="bg-white rounded-xl overflow-hidden shadow-lg hover:shadow-xl transform hover:-translate-y-1 transition-all duration-300">
                    <img src="{{ asset('img/hero-gotong-royong.jpg') }}" alt="Gotong Royong"
                        class="w-full h-64 object-cover">
                    <div class="p-4">
                        <h3 class="font-bold text-secondary mb-2">Gotong Royong Warga</h3>
                        <p class="text-gray-600 text-sm">Semangat gotong royong dalam pembangunan desa</p>
                    </div>
                </div>

                <!-- Gallery Item 3 -->
                <div
                    class="bg-white rounded-xl overflow-hidden shadow-lg hover:shadow-xl transform hover:-translate-y-1 transition-all duration-300">
                    <img src="{{ asset('img/tambak.png') }}" alt="Tambak Ikan" class="w-full h-64 object-cover">
                    <div class="p-4">
                        <h3 class="font-bold text-secondary mb-2">Tambak Ikan</h3>
                        <p class="text-gray-600 text-sm">Usaha perikanan masyarakat desa</p>
                    </div>
                </div>

                <!-- Gallery Item 4 -->
                <div
                    class="bg-white rounded-xl overflow-hidden shadow-lg hover:shadow-xl transform hover:-translate-y-1 transition-all duration-300">
                    <img src="https://placehold.co/400x300/4CAF50/FFFFFF?text=Kegiatan+PKK" alt="Kegiatan PKK"
                        class="w-full h-64 object-cover">
                    <div class="p-4">
                        <h3 class="font-bold text-secondary mb-2">Kegiatan PKK</h3>
                        <p class="text-gray-600 text-sm">Aktivitas rutin ibu-ibu PKK desa</p>
                    </div>
                </div>

                <!-- Gallery Item 5 -->
                <div
                    class="bg-white rounded-xl overflow-hidden shadow-lg hover:shadow-xl transform hover:-translate-y-1 transition-all duration-300">
                    <img src="https://placehold.co/400x300/4CAF50/FFFFFF?text=Festival+Desa" alt="Festival Desa"
                        class="w-full h-64 object-cover">
                    <div class="p-4">
                        <h3 class="font-bold text-secondary mb-2">Festival Budaya</h3>
                        <p class="text-gray-600 text-sm">Perayaan budaya tahunan desa</p>
                    </div>
                </div>

                <!-- Gallery Item 6 -->
                <div
                    class="bg-white rounded-xl overflow-hidden shadow-lg hover:shadow-xl transform hover:-translate-y-1 transition-all duration-300">
                    <img src="https://placehold.co/400x300/4CAF50/FFFFFF?text=Masjid+Desa" alt="Masjid Desa"
                        class="w-full h-64 object-cover">
                    <div class="p-4">
                        <h3 class="font-bold text-secondary mb-2">Masjid Al-Ikhlas</h3>
                        <p class="text-gray-600 text-sm">Tempat ibadah utama warga desa</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
