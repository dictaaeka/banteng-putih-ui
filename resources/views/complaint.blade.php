@extends('layouts.app')

@section('title', 'Desa Bantengputih - Pengaduan Online')

@section('content')
    <!-- Hero Section -->
    <section class="relative bg-gradient-to-r from-primary to-accent py-20 mt-16">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
            <h1 class="text-4xl md:text-5xl font-bold text-white mb-4">Pengaduan Online</h1>
            <p class="text-xl text-white opacity-90 max-w-2xl mx-auto">
                Sampaikan keluhan, saran, dan masukan Anda untuk kemajuan Desa Bantengputih
            </p>
        </div>
    </section>

    <!-- Complaint Form Section -->
    <section class="py-20 bg-white">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="bg-white rounded-xl shadow-lg p-8">
                <div class="text-center mb-8">
                    <h2 class="text-3xl font-bold text-secondary mb-4">Form Pengaduan</h2>
                    <p class="text-gray-600">
                        Isi form di bawah ini dengan lengkap dan jelas. Pengaduan Anda akan ditindaklanjuti maksimal 3x24
                        jam.
                    </p>
                </div>

                <form action="#" method="POST" class="space-y-6">
                    @csrf

                    <!-- Personal Info -->
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <label for="name" class="block text-sm font-medium text-gray-700 mb-2">
                                Nama Lengkap <span class="text-red-500">*</span>
                            </label>
                            <input type="text" id="name" name="name" required
                                class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary focus:border-transparent"
                                placeholder="Masukkan nama lengkap">
                        </div>
                        <div>
                            <label for="phone" class="block text-sm font-medium text-gray-700 mb-2">
                                No. Telepon <span class="text-red-500">*</span>
                            </label>
                            <input type="tel" id="phone" name="phone" required
                                class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary focus:border-transparent"
                                placeholder="08xx-xxxx-xxxx">
                        </div>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <label for="email" class="block text-sm font-medium text-gray-700 mb-2">Email</label>
                            <input type="email" id="email" name="email"
                                class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary focus:border-transparent"
                                placeholder="nama@email.com">
                        </div>
                        <div>
                            <label for="address" class="block text-sm font-medium text-gray-700 mb-2">
                                Alamat <span class="text-red-500">*</span>
                            </label>
                            <input type="text" id="address" name="address" required
                                class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary focus:border-transparent"
                                placeholder="RT/RW, Dusun">
                        </div>
                    </div>

                    <!-- Complaint Details -->
                    <div>
                        <label for="category" class="block text-sm font-medium text-gray-700 mb-2">
                            Kategori Pengaduan <span class="text-red-500">*</span>
                        </label>
                        <select id="category" name="category" required
                            class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary focus:border-transparent">
                            <option value="">Pilih kategori pengaduan</option>
                            <option value="infrastruktur">Infrastruktur (Jalan, Jembatan, dll)</option>
                            <option value="pelayanan">Pelayanan Publik</option>
                            <option value="kesehatan">Kesehatan</option>
                            <option value="pendidikan">Pendidikan</option>
                            <option value="lingkungan">Lingkungan</option>
                            <option value="sosial">Masalah Sosial</option>
                            <option value="ekonomi">Ekonomi</option>
                            <option value="lainnya">Lainnya</option>
                        </select>
                    </div>

                    <div>
                        <label for="title" class="block text-sm font-medium text-gray-700 mb-2">
                            Judul Pengaduan <span class="text-red-500">*</span>
                        </label>
                        <input type="text" id="title" name="title" required
                            class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary focus:border-transparent"
                            placeholder="Ringkasan singkat pengaduan">
                    </div>

                    <div>
                        <label for="description" class="block text-sm font-medium text-gray-700 mb-2">
                            Detail Pengaduan <span class="text-red-500">*</span>
                        </label>
                        <textarea id="description" name="description" rows="6" required
                            class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary focus:border-transparent"
                            placeholder="Jelaskan secara detail masalah yang ingin Anda adukan..."></textarea>
                    </div>

                    <div>
                        <label for="location" class="block text-sm font-medium text-gray-700 mb-2">Lokasi Kejadian</label>
                        <input type="text" id="location" name="location"
                            class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary focus:border-transparent"
                            placeholder="Lokasi spesifik tempat kejadian">
                    </div>

                    <div>
                        <label for="evidence" class="block text-sm font-medium text-gray-700 mb-2">Bukti Pendukung</label>
                        <input type="file" id="evidence" name="evidence[]" multiple accept="image/*,application/pdf"
                            class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary focus:border-transparent">
                        <p class="text-sm text-gray-500 mt-1">Upload foto atau dokumen pendukung (maksimal 5MB per file)</p>
                    </div>

                    <!-- Privacy Agreement -->
                    <div class="flex items-start">
                        <input type="checkbox" id="privacy" name="privacy" required class="mt-1 mr-3">
                        <label for="privacy" class="text-sm text-gray-600">
                            Saya menyetujui bahwa data yang saya berikan akan digunakan untuk proses penanganan pengaduan
                            dan dapat dihubungi kembali oleh petugas desa. <span class="text-red-500">*</span>
                        </label>
                    </div>

                    <div class="text-center">
                        <button type="submit"
                            class="bg-primary hover:bg-accent text-white font-semibold px-8 py-3 rounded-lg transform hover:scale-105 transition-all duration-300">
                            <i class="fas fa-paper-plane mr-2"></i>
                            Kirim Pengaduan
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </section>

    <!-- Track Complaint Section -->
    <section class="py-20 bg-gray-50">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-12">
                <h2 class="text-3xl md:text-4xl font-bold text-secondary mb-4">Lacak Status Pengaduan</h2>
                <p class="text-gray-600 max-w-2xl mx-auto">
                    Masukkan nomor tiket pengaduan Anda untuk melihat status dan perkembangan penanganan
                </p>
            </div>

            <div class="bg-white rounded-xl shadow-lg p-8">
                <form action="#" method="GET" class="flex flex-col md:flex-row gap-4">
                    <div class="flex-1">
                        <input type="text" name="ticket" placeholder="Masukkan nomor tiket (contoh: ADU-2024-001)"
                            class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary focus:border-transparent">
                    </div>
                    <button type="submit"
                        class="bg-secondary hover:bg-gray-700 text-white font-semibold px-6 py-3 rounded-lg transition-colors duration-300">
                        <i class="fas fa-search mr-2"></i>Lacak Status
                    </button>
                </form>

                <div class="mt-6 p-4 bg-blue-50 border-l-4 border-blue-400 rounded">
                    <div class="flex">
                        <i class="fas fa-info-circle text-blue-400 mt-1 mr-3"></i>
                        <div>
                            <p class="font-semibold text-blue-800">Informasi:</p>
                            <p class="text-blue-700 text-sm mt-1">
                                Nomor tiket akan dikirimkan melalui SMS/WhatsApp setelah pengaduan berhasil dikirim. Simpan
                                nomor tiket untuk melacak status pengaduan Anda.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Guidelines Section -->
    <section class="py-20 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-12">
                <h2 class="text-3xl md:text-4xl font-bold text-secondary mb-4">Panduan Pengaduan</h2>
                <p class="text-gray-600 max-w-2xl mx-auto">
                    Tips untuk membuat pengaduan yang efektif dan mudah ditindaklanjuti
                </p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                <div class="text-center">
                    <div
                        class="w-16 h-16 bg-primary bg-opacity-10 rounded-full flex items-center justify-center mx-auto mb-4">
                        <i class="fas fa-edit text-2xl text-primary"></i>
                    </div>
                    <h3 class="text-xl font-bold text-secondary mb-3">Tulis dengan Jelas</h3>
                    <p class="text-gray-600">Jelaskan masalah dengan detail, lengkap, dan mudah dipahami. Sertakan
                        informasi waktu, tempat, dan kronologi kejadian.</p>
                </div>

                <div class="text-center">
                    <div
                        class="w-16 h-16 bg-primary bg-opacity-10 rounded-full flex items-center justify-center mx-auto mb-4">
                        <i class="fas fa-camera text-2xl text-primary"></i>
                    </div>
                    <h3 class="text-xl font-bold text-secondary mb-3">Sertakan Bukti</h3>
                    <p class="text-gray-600">Upload foto atau dokumen yang mendukung pengaduan Anda. Bukti yang jelas akan
                        mempercepat proses penanganan.</p>
                </div>

                <div class="text-center">
                    <div
                        class="w-16 h-16 bg-primary bg-opacity-10 rounded-full flex items-center justify-center mx-auto mb-4">
                        <i class="fas fa-phone text-2xl text-primary"></i>
                    </div>
                    <h3 class="text-xl font-bold text-secondary mb-3">Berikan Kontak Aktif</h3>
                    <p class="text-gray-600">Pastikan nomor telepon dan email yang dicantumkan aktif untuk memudahkan
                        petugas menghubungi Anda.</p>
                </div>
            </div>

            <div class="mt-12 text-center">
                <div class="bg-green-50 border-l-4 border-green-400 p-6 max-w-2xl mx-auto">
                    <div class="flex">
                        <div class="flex-shrink-0">
                            <i class="fas fa-clock text-green-400 text-xl"></i>
                        </div>
                        <div class="ml-4">
                            <h4 class="font-semibold text-green-800 mb-2">Waktu Penanganan</h4>
                            <p class="text-green-700 text-sm">
                                Pengaduan akan direspon maksimal 3x24 jam setelah diterima. Penanganan disesuaikan dengan
                                tingkat urgensi dan kompleksitas masalah.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
