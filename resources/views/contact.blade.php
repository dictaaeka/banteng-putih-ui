@extends('layouts.app')

@section('title', 'Desa Bantengputih - Kontak')

@section('content')
    <!-- Hero Section -->
    <section class="relative bg-gradient-to-r from-primary to-accent py-20 mt-16">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
            <h1 class="text-4xl md:text-5xl font-bold text-white mb-4">Hubungi Kami</h1>
            <p class="text-xl text-white opacity-90 max-w-2xl mx-auto">
                Kami siap melayani dan membantu kebutuhan masyarakat Desa Bantengputih
            </p>
        </div>
    </section>

    <!-- Contact Info Section -->
    <section class="py-20 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-8 mb-12">
                <!-- Alamat -->
                <div
                    class="bg-gradient-to-br from-primary to-accent text-white rounded-xl p-8 text-center transform hover:scale-105 transition-all duration-300">
                    <div class="w-16 h-16 bg-white bg-opacity-20 rounded-full flex items-center justify-center mx-auto mb-4">
                        <i class="fas fa-map-marker-alt text-2xl"></i>
                    </div>
                    <h3 class="text-xl font-bold mb-2">Alamat</h3>
                    <p class="opacity-90">
                        Desa Bantengputih<br>
                        Kecamatan Karanggeneng<br>
                        Kabupaten Lamongan<br>
                        Jawa Timur 62261
                    </p>
                </div>

                <!-- Telepon -->
                <div
                    class="bg-white border-2 border-primary rounded-xl p-8 text-center hover:shadow-xl transition-all duration-300">
                    <div
                        class="w-16 h-16 bg-primary bg-opacity-10 rounded-full flex items-center justify-center mx-auto mb-4">
                        <i class="fas fa-phone text-2xl text-primary"></i>
                    </div>
                    <h3 class="text-xl font-bold text-secondary mb-2">Telepon</h3>
                    <p class="text-gray-600 mb-2">(0322) 123-4567</p>
                    <p class="text-gray-600">081331931077</p>
                </div>

                <!-- Email -->
                <div
                    class="bg-white border-2 border-primary rounded-xl p-8 text-center hover:shadow-xl transition-all duration-300">
                    <div
                        class="w-16 h-16 bg-primary bg-opacity-10 rounded-full flex items-center justify-center mx-auto mb-4">
                        <i class="fas fa-envelope text-2xl text-primary"></i>
                    </div>
                    <h3 class="text-xl font-bold text-secondary mb-2">Email</h3>
                    <p class="text-gray-600">bantengputih@lamongan.go.id</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Contact Form Section -->
    <section class="py-20 bg-gray-50">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-12">
                <h2 class="text-3xl md:text-4xl font-bold text-secondary mb-4">Kirim Pesan</h2>
                <p class="text-gray-600 max-w-2xl mx-auto">
                    Silakan hubungi kami jika ada pertanyaan, saran, atau kritik untuk kemajuan desa
                </p>
            </div>

            <div class="bg-white rounded-xl shadow-lg p-8">
                <form action="#" method="POST" class="space-y-6">
                    @csrf
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <label for="name" class="block text-sm font-medium text-gray-700 mb-2">Nama Lengkap</label>
                            <input type="text" id="name" name="name" required
                                class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary focus:border-transparent transition-colors duration-300"
                                placeholder="Masukkan nama lengkap">
                        </div>
                        <div>
                            <label for="email" class="block text-sm font-medium text-gray-700 mb-2">Email</label>
                            <input type="email" id="email" name="email" required
                                class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary focus:border-transparent transition-colors duration-300"
                                placeholder="nama@email.com">
                        </div>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <label for="phone" class="block text-sm font-medium text-gray-700 mb-2">No. Telepon</label>
                            <input type="tel" id="phone" name="phone"
                                class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary focus:border-transparent transition-colors duration-300"
                                placeholder="08xx-xxxx-xxxx">
                        </div>
                        <div>
                            <label for="subject" class="block text-sm font-medium text-gray-700 mb-2">Subjek</label>
                            <select id="subject" name="subject" required
                                class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary focus:border-transparent transition-colors duration-300">
                                <option value="">Pilih subjek</option>
                                <option value="informasi">Informasi Umum</option>
                                <option value="layanan">Layanan Desa</option>
                                <option value="pengaduan">Pengaduan</option>
                                <option value="saran">Saran & Kritik</option>
                                <option value="kerjasama">Kerjasama</option>
                            </select>
                        </div>
                    </div>

                    <div>
                        <label for="message" class="block text-sm font-medium text-gray-700 mb-2">Pesan</label>
                        <textarea id="message" name="message" rows="6" required
                            class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary focus:border-transparent transition-colors duration-300"
                            placeholder="Tulis pesan Anda di sini..."></textarea>
                    </div>

                    <div class="text-center">
                        <button type="submit"
                            class="bg-primary hover:bg-accent text-white font-semibold px-8 py-3 rounded-lg transform hover:scale-105 transition-all duration-300 focus:outline-none focus:ring-2 focus:ring-primary focus:ring-offset-2">
                            <i class="fas fa-paper-plane mr-2"></i>
                            Kirim Pesan
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </section>

    <!-- Office Hours Section -->
    <section class="py-20 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-12">
                <h2 class="text-3xl md:text-4xl font-bold text-secondary mb-4">Jam Pelayanan</h2>
                <p class="text-gray-600 max-w-2xl mx-auto">
                    Informasi jam kerja dan pelayanan Kantor Desa Bantengputih
                </p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                <!-- Hari Kerja -->
                <div class="bg-gray-50 rounded-xl p-6 text-center">
                    <i class="fas fa-calendar-week text-3xl text-primary mb-4"></i>
                    <h3 class="text-xl font-bold text-secondary mb-2">Hari Kerja</h3>
                    <p class="text-gray-600">Senin - Jumat</p>
                    <p class="text-gray-600 font-semibold">08:00 - 15:30 WIB</p>
                </div>

                <!-- Weekend -->
                <div class="bg-gray-50 rounded-xl p-6 text-center">
                    <i class="fas fa-calendar-alt text-3xl text-primary mb-4"></i>
                    <h3 class="text-xl font-bold text-secondary mb-2">Weekend</h3>
                    <p class="text-gray-600">Sabtu</p>
                    <p class="text-gray-600 font-semibold">08:00 - 12:00 WIB</p>
                </div>

                <!-- Libur -->
                <div class="bg-gray-50 rounded-xl p-6 text-center">
                    <i class="fas fa-ban text-3xl text-gray-400 mb-4"></i>
                    <h3 class="text-xl font-bold text-secondary mb-2">Libur</h3>
                    <p class="text-gray-600">Minggu & Hari Libur Nasional</p>
                    <p class="text-gray-600 font-semibold">TUTUP</p>
                </div>
            </div>

            <div class="mt-12 text-center">
                <div class="bg-yellow-50 border-l-4 border-yellow-400 p-4 max-w-2xl mx-auto">
                    <div class="flex">
                        <div class="flex-shrink-0">
                            <i class="fas fa-exclamation-triangle text-yellow-400"></i>
                        </div>
                        <div class="ml-3">
                            <p class="text-sm text-yellow-700">
                                <strong>Penting:</strong> Untuk pelayanan darurat atau urgent, silakan hubungi nomor
                                WhatsApp: 081331931077
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Map Section -->
    <section class="py-20 bg-gray-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-12">
                <h2 class="text-3xl md:text-4xl font-bold text-secondary mb-4">Lokasi Kami</h2>
                <p class="text-gray-600 max-w-2xl mx-auto">
                    Temukan lokasi Kantor Desa Bantengputih
                </p>
            </div>

            <div class="bg-white rounded-xl shadow-lg p-4">
                <div class="aspect-w-16 aspect-h-9 bg-gray-200 rounded-lg flex items-center justify-center">
                    <div class="text-center">
                        <i class="fas fa-map text-4xl text-gray-400 mb-4"></i>
                        <p class="text-gray-500">Peta akan dimuat di sini</p>
                        <p class="text-sm text-gray-400 mt-2">
                            Koordinat: -7.1234, 112.5678<br>
                            (Integrasi dengan Google Maps)
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
