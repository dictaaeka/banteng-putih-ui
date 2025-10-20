@extends('layouts.app')

@section('title', 'Desa Bantengputih - Layanan')

@section('content')
    <!-- Hero Section -->
    <section class="relative bg-gradient-to-r from-primary to-accent py-20 mt-16">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
            <h1 class="text-4xl md:text-5xl font-bold text-white mb-4">Layanan Desa</h1>
            <p class="text-xl text-white opacity-90 max-w-2xl mx-auto">
                Berbagai layanan administrasi dan pelayanan publik untuk masyarakat
            </p>
        </div>
    </section>

    <!-- Services Section -->
    <section class="py-20 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                <!-- Service 1 -->
                <div
                    class="bg-white border-2 border-gray-200 rounded-xl p-6 hover:border-primary hover:shadow-lg transition-all duration-300">
                    <div class="w-16 h-16 bg-primary bg-opacity-10 rounded-full flex items-center justify-center mb-4">
                        <i class="fas fa-id-card text-2xl text-primary"></i>
                    </div>
                    <h3 class="text-xl font-bold text-secondary mb-3">Surat Keterangan</h3>
                    <p class="text-gray-600 mb-4">Pelayanan pembuatan berbagai surat keterangan seperti surat keterangan
                        domisili, tidak mampu, dan lainnya.</p>
                    <ul class="text-sm text-gray-600 space-y-1 mb-4">
                        <li>• Surat Keterangan Domisili</li>
                        <li>• Surat Keterangan Tidak Mampu</li>
                        <li>• Surat Keterangan Usaha</li>
                    </ul>
                    <span class="text-primary font-semibold">Waktu: 1-2 hari kerja</span>
                </div>

                <!-- Service 2 -->
                <div
                    class="bg-white border-2 border-gray-200 rounded-xl p-6 hover:border-primary hover:shadow-lg transition-all duration-300">
                    <div class="w-16 h-16 bg-primary bg-opacity-10 rounded-full flex items-center justify-center mb-4">
                        <i class="fas fa-heart text-2xl text-primary"></i>
                    </div>
                    <h3 class="text-xl font-bold text-secondary mb-3">Pelayanan Kesehatan</h3>
                    <p class="text-gray-600 mb-4">Layanan kesehatan dasar melalui Puskesdes dan Posyandu yang rutin
                        dilaksanakan.</p>
                    <ul class="text-sm text-gray-600 space-y-1 mb-4">
                        <li>• Posyandu Balita & Lansia</li>
                        <li>• Pemeriksaan Kesehatan Rutin</li>
                        <li>• Imunisasi</li>
                    </ul>
                    <span class="text-primary font-semibold">Jadwal: Setiap Rabu</span>
                </div>

                <!-- Service 3 -->
                <div
                    class="bg-white border-2 border-gray-200 rounded-xl p-6 hover:border-primary hover:shadow-lg transition-all duration-300">
                    <div class="w-16 h-16 bg-primary bg-opacity-10 rounded-full flex items-center justify-center mb-4">
                        <i class="fas fa-graduation-cap text-2xl text-primary"></i>
                    </div>
                    <h3 class="text-xl font-bold text-secondary mb-3">Program Pendidikan</h3>
                    <p class="text-gray-600 mb-4">Bantuan dan program pendidikan untuk meningkatkan kualitas SDM masyarakat
                        desa.</p>
                    <ul class="text-sm text-gray-600 space-y-1 mb-4">
                        <li>• Bantuan Pendidikan</li>
                        <li>• Pelatihan Keterampilan</li>
                        <li>• Perpustakaan Desa</li>
                    </ul>
                    <span class="text-primary font-semibold">Info: Kantor Desa</span>
                </div>

                <!-- Service 4 -->
                <div
                    class="bg-white border-2 border-gray-200 rounded-xl p-6 hover:border-primary hover:shadow-lg transition-all duration-300">
                    <div class="w-16 h-16 bg-primary bg-opacity-10 rounded-full flex items-center justify-center mb-4">
                        <i class="fas fa-seedling text-2xl text-primary"></i>
                    </div>
                    <h3 class="text-xl font-bold text-secondary mb-3">Bantuan Pertanian</h3>
                    <p class="text-gray-600 mb-4">Program bantuan dan penyuluhan untuk meningkatkan hasil pertanian dan
                        perikanan.</p>
                    <ul class="text-sm text-gray-600 space-y-1 mb-4">
                        <li>• Bantuan Bibit & Pupuk</li>
                        <li>• Penyuluhan Pertanian</li>
                        <li>• Program Irigasi</li>
                    </ul>
                    <span class="text-primary font-semibold">Koordinator: PPL Desa</span>
                </div>

                <!-- Service 5 -->
                <div
                    class="bg-white border-2 border-gray-200 rounded-xl p-6 hover:border-primary hover:shadow-lg transition-all duration-300">
                    <div class="w-16 h-16 bg-primary bg-opacity-10 rounded-full flex items-center justify-center mb-4">
                        <i class="fas fa-comments text-2xl text-primary"></i>
                    </div>
                    <h3 class="text-xl font-bold text-secondary mb-3">Pengaduan Masyarakat</h3>
                    <p class="text-gray-600 mb-4">Layanan pengaduan dan konsultasi untuk berbagai permasalahan masyarakat.
                    </p>
                    <ul class="text-sm text-gray-600 space-y-1 mb-4">
                        <li>• Pengaduan Online</li>
                        <li>• Konsultasi Langsung</li>
                        <li>• Mediasi Konflik</li>
                    </ul>
                    <span class="text-primary font-semibold">24/7 Online</span>
                </div>

                <!-- Service 6 -->
                <div
                    class="bg-white border-2 border-gray-200 rounded-xl p-6 hover:border-primary hover:shadow-lg transition-all duration-300">
                    <div class="w-16 h-16 bg-primary bg-opacity-10 rounded-full flex items-center justify-center mb-4">
                        <i class="fas fa-hammer text-2xl text-primary"></i>
                    </div>
                    <h3 class="text-xl font-bold text-secondary mb-3">Pembangunan Infrastruktur</h3>
                    <p class="text-gray-600 mb-4">Program pembangunan dan perbaikan infrastruktur desa untuk kesejahteraan
                        bersama.</p>
                    <ul class="text-sm text-gray-600 space-y-1 mb-4">
                        <li>• Perbaikan Jalan</li>
                        <li>• Pembangunan Fasilitas Umum</li>
                        <li>• Program Air Bersih</li>
                    </ul>
                    <span class="text-primary font-semibold">Sesuai APBDes</span>
                </div>
            </div>
        </div>
    </section>

    <!-- Requirements Section -->
    <section class="py-20 bg-gray-50">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-12">
                <h2 class="text-3xl md:text-4xl font-bold text-secondary mb-4">Persyaratan Umum</h2>
                <p class="text-gray-600 max-w-2xl mx-auto">
                    Persyaratan yang harus dipenuhi untuk mengakses layanan administratif desa
                </p>
            </div>

            <div class="bg-white rounded-xl shadow-lg p-8">
                <h3 class="text-xl font-bold text-secondary mb-6">Dokumen yang Diperlukan:</h3>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <h4 class="font-semibold text-gray-700 mb-3">Untuk Warga Desa:</h4>
                        <ul class="space-y-2 text-gray-600">
                            <li class="flex items-start">
                                <i class="fas fa-check text-primary mt-1 mr-3"></i>
                                Fotokopi KTP yang masih berlaku
                            </li>
                            <li class="flex items-start">
                                <i class="fas fa-check text-primary mt-1 mr-3"></i>
                                Fotokopi Kartu Keluarga (KK)
                            </li>
                            <li class="flex items-start">
                                <i class="fas fa-check text-primary mt-1 mr-3"></i>
                                Surat pengantar dari RT/RW
                            </li>
                            <li class="flex items-start">
                                <i class="fas fa-check text-primary mt-1 mr-3"></i>
                                Materai sesuai kebutuhan
                            </li>
                        </ul>
                    </div>

                    <div>
                        <h4 class="font-semibold text-gray-700 mb-3">Untuk Non-Warga:</h4>
                        <ul class="space-y-2 text-gray-600">
                            <li class="flex items-start">
                                <i class="fas fa-check text-primary mt-1 mr-3"></i>
                                Fotokopi KTP yang masih berlaku
                            </li>
                            <li class="flex items-start">
                                <i class="fas fa-check text-primary mt-1 mr-3"></i>
                                Surat keterangan domisili sementara
                            </li>
                            <li class="flex items-start">
                                <i class="fas fa-check text-primary mt-1 mr-3"></i>
                                Surat pengantar dari tempat tinggal
                            </li>
                            <li class="flex items-start">
                                <i class="fas fa-check text-primary mt-1 mr-3"></i>
                                Materai dan biaya administrasi
                            </li>
                        </ul>
                    </div>
                </div>

                <div class="mt-8 p-4 bg-yellow-50 border-l-4 border-yellow-400 rounded">
                    <div class="flex">
                        <i class="fas fa-exclamation-triangle text-yellow-400 mt-1 mr-3"></i>
                        <div>
                            <p class="font-semibold text-yellow-800">Catatan Penting:</p>
                            <p class="text-yellow-700 text-sm mt-1">
                                Persyaratan dapat berbeda untuk setiap jenis layanan. Silakan konfirmasi terlebih dahulu ke
                                petugas desa atau hubungi nomor yang tersedia.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
