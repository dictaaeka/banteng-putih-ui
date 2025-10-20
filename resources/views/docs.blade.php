@extends('layouts.app')

@section('title', 'Desa Bantengputih - Transparansi')

@section('content')
    <!-- Hero Section -->
    <section class="relative bg-gradient-to-r from-primary to-accent py-20 mt-16">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
            <h1 class="text-4xl md:text-5xl font-bold text-white mb-4">Transparansi Desa</h1>
            <p class="text-xl text-white opacity-90 max-w-2xl mx-auto">
                Keterbukaan informasi keuangan dan kinerja pemerintahan Desa Bantengputih
            </p>
        </div>
    </section>

    <!-- Budget Overview -->
    <section class="py-20 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-12">
                <h2 class="text-3xl md:text-4xl font-bold text-secondary mb-4">APBDes 2024</h2>
                <p class="text-gray-600 max-w-2xl mx-auto">
                    Anggaran Pendapatan dan Belanja Desa tahun 2024
                </p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8 mb-12">
                <!-- Total Anggaran -->
                <div class="bg-gradient-to-br from-primary to-accent text-white rounded-xl p-6 text-center">
                    <i class="fas fa-wallet text-3xl mb-4"></i>
                    <h3 class="text-xl font-bold mb-2">Total APBDes</h3>
                    <p class="text-2xl font-bold">Rp 2.8 M</p>
                    <p class="text-sm opacity-90">Tahun 2024</p>
                </div>

                <!-- Dana Desa -->
                <div class="bg-white border-2 border-primary rounded-xl p-6 text-center">
                    <i class="fas fa-hand-holding-usd text-3xl text-primary mb-4"></i>
                    <h3 class="text-xl font-bold text-secondary mb-2">Dana Desa</h3>
                    <p class="text-2xl font-bold text-primary">Rp 1.2 M</p>
                    <p class="text-sm text-gray-600">dari Pemerintah</p>
                </div>

                <!-- ADD -->
                <div class="bg-white border-2 border-primary rounded-xl p-6 text-center">
                    <i class="fas fa-coins text-3xl text-primary mb-4"></i>
                    <h3 class="text-xl font-bold text-secondary mb-2">ADD</h3>
                    <p class="text-2xl font-bold text-primary">Rp 800 Jt</p>
                    <p class="text-sm text-gray-600">Alokasi Dana Desa</p>
                </div>

                <!-- PAD -->
                <div class="bg-white border-2 border-primary rounded-xl p-6 text-center">
                    <i class="fas fa-chart-line text-3xl text-primary mb-4"></i>
                    <h3 class="text-xl font-bold text-secondary mb-2">PADes</h3>
                    <p class="text-2xl font-bold text-primary">Rp 800 Jt</p>
                    <p class="text-sm text-gray-600">Pendapatan Asli Desa</p>
                </div>
            </div>

            <!-- Budget Breakdown Chart -->
            <div class="bg-gray-50 rounded-xl p-8">
                <h3 class="text-2xl font-bold text-secondary text-center mb-8">Alokasi Anggaran Belanja</h3>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                    <!-- Chart Placeholder -->
                    <div class="bg-white rounded-lg p-6">
                        <div
                            class="aspect-square bg-gradient-to-br from-primary to-accent rounded-full flex items-center justify-center text-white text-center mb-4">
                            <div>
                                <i class="fas fa-chart-pie text-4xl mb-2"></i>
                                <p class="text-sm">Grafik Alokasi</p>
                            </div>
                        </div>
                    </div>

                    <!-- Breakdown List -->
                    <div class="space-y-4">
                        <div class="flex justify-between items-center p-4 bg-white rounded-lg">
                            <div class="flex items-center">
                                <div class="w-4 h-4 bg-primary rounded mr-3"></div>
                                <span class="font-medium">Bidang Penyelenggaraan Pemerintahan Desa</span>
                            </div>
                            <span class="font-bold text-primary">35%</span>
                        </div>

                        <div class="flex justify-between items-center p-4 bg-white rounded-lg">
                            <div class="flex items-center">
                                <div class="w-4 h-4 bg-accent rounded mr-3"></div>
                                <span class="font-medium">Bidang Pelaksanaan Pembangunan Desa</span>
                            </div>
                            <span class="font-bold text-accent">30%</span>
                        </div>

                        <div class="flex justify-between items-center p-4 bg-white rounded-lg">
                            <div class="flex items-center">
                                <div class="w-4 h-4 bg-green-500 rounded mr-3"></div>
                                <span class="font-medium">Bidang Pembinaan Kemasyarakatan</span>
                            </div>
                            <span class="font-bold text-green-500">20%</span>
                        </div>

                        <div class="flex justify-between items-center p-4 bg-white rounded-lg">
                            <div class="flex items-center">
                                <div class="w-4 h-4 bg-blue-500 rounded mr-3"></div>
                                <span class="font-medium">Bidang Pemberdayaan Masyarakat</span>
                            </div>
                            <span class="font-bold text-blue-500">10%</span>
                        </div>

                        <div class="flex justify-between items-center p-4 bg-white rounded-lg">
                            <div class="flex items-center">
                                <div class="w-4 h-4 bg-purple-500 rounded mr-3"></div>
                                <span class="font-medium">Bidang Penanggulangan Bencana</span>
                            </div>
                            <span class="font-bold text-purple-500">5%</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Development Projects -->
    <section class="py-20 bg-gray-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-12">
                <h2 class="text-3xl md:text-4xl font-bold text-secondary mb-4">Program Pembangunan 2024</h2>
                <p class="text-gray-600 max-w-2xl mx-auto">
                    Daftar program dan kegiatan pembangunan yang dilaksanakan tahun ini
                </p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                <!-- Project 1 -->
                <div class="bg-white rounded-xl shadow-lg p-6">
                    <div class="flex items-center mb-4">
                        <div class="w-12 h-12 bg-primary bg-opacity-10 rounded-full flex items-center justify-center mr-4">
                            <i class="fas fa-road text-primary text-xl"></i>
                        </div>
                        <div>
                            <h3 class="font-bold text-secondary">Pembangunan Jalan</h3>
                            <p class="text-sm text-gray-600">Status: Selesai</p>
                        </div>
                    </div>
                    <div class="mb-4">
                        <p class="text-gray-600 text-sm mb-2">Pembangunan jalan desa sepanjang 2 KM menghubungkan antar
                            dusun</p>
                        <div class="flex justify-between text-sm">
                            <span class="text-gray-500">Anggaran:</span>
                            <span class="font-semibold">Rp 500,000,000</span>
                        </div>
                    </div>
                    <div class="w-full bg-gray-200 rounded-full h-2">
                        <div class="bg-green-500 h-2 rounded-full" style="width: 100%"></div>
                    </div>
                    <p class="text-xs text-gray-500 mt-1">100% Complete</p>
                </div>

                <!-- Project 2 -->
                <div class="bg-white rounded-xl shadow-lg p-6">
                    <div class="flex items-center mb-4">
                        <div class="w-12 h-12 bg-primary bg-opacity-10 rounded-full flex items-center justify-center mr-4">
                            <i class="fas fa-tint text-primary text-xl"></i>
                        </div>
                        <div>
                            <h3 class="font-bold text-secondary">Saluran Irigasi</h3>
                            <p class="text-sm text-gray-600">Status: Berlangsung</p>
                        </div>
                    </div>
                    <div class="mb-4">
                        <p class="text-gray-600 text-sm mb-2">Perbaikan saluran irigasi untuk area persawahan</p>
                        <div class="flex justify-between text-sm">
                            <span class="text-gray-500">Anggaran:</span>
                            <span class="font-semibold">Rp 300,000,000</span>
                        </div>
                    </div>
                    <div class="w-full bg-gray-200 rounded-full h-2">
                        <div class="bg-blue-500 h-2 rounded-full" style="width: 70%"></div>
                    </div>
                    <p class="text-xs text-gray-500 mt-1">70% Complete</p>
                </div>

                <!-- Project 3 -->
                <div class="bg-white rounded-xl shadow-lg p-6">
                    <div class="flex items-center mb-4">
                        <div class="w-12 h-12 bg-primary bg-opacity-10 rounded-full flex items-center justify-center mr-4">
                            <i class="fas fa-lightbulb text-primary text-xl"></i>
                        </div>
                        <div>
                            <h3 class="font-bold text-secondary">Penerangan Jalan</h3>
                            <p class="text-sm text-gray-600">Status: Perencanaan</p>
                        </div>
                    </div>
                    <div class="mb-4">
                        <p class="text-gray-600 text-sm mb-2">Pemasangan lampu penerangan jalan umum</p>
                        <div class="flex justify-between text-sm">
                            <span class="text-gray-500">Anggaran:</span>
                            <span class="font-semibold">Rp 150,000,000</span>
                        </div>
                    </div>
                    <div class="w-full bg-gray-200 rounded-full h-2">
                        <div class="bg-yellow-500 h-2 rounded-full" style="width: 20%"></div>
                    </div>
                    <p class="text-xs text-gray-500 mt-1">20% Complete</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Documents Section -->
    <section class="py-20 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-12">
                <h2 class="text-3xl md:text-4xl font-bold text-secondary mb-4">Dokumen Transparansi</h2>
                <p class="text-gray-600 max-w-2xl mx-auto">
                    Unduh dokumen resmi terkait keuangan dan kinerja desa
                </p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                <!-- Document 1 -->
                <div class="bg-gray-50 rounded-xl p-6 hover:shadow-lg transition-shadow duration-300">
                    <div class="flex items-center mb-4">
                        <i class="fas fa-file-pdf text-red-500 text-2xl mr-4"></i>
                        <div>
                            <h3 class="font-bold text-secondary">APBDes 2024</h3>
                            <p class="text-sm text-gray-600">Rancangan Anggaran</p>
                        </div>
                    </div>
                    <p class="text-gray-600 text-sm mb-4">Dokumen lengkap Anggaran Pendapatan dan Belanja Desa tahun 2024
                    </p>
                    <div class="flex justify-between items-center">
                        <span class="text-xs text-gray-500">PDF • 2.5 MB</span>
                        <button
                            class="bg-primary hover:bg-accent text-white px-4 py-2 rounded text-sm transition-colors duration-300">
                            <i class="fas fa-download mr-1"></i>Unduh
                        </button>
                    </div>
                </div>

                <!-- Document 2 -->
                <div class="bg-gray-50 rounded-xl p-6 hover:shadow-lg transition-shadow duration-300">
                    <div class="flex items-center mb-4">
                        <i class="fas fa-file-excel text-green-500 text-2xl mr-4"></i>
                        <div>
                            <h3 class="font-bold text-secondary">Laporan Keuangan Q3</h3>
                            <p class="text-sm text-gray-600">Triwulan III 2024</p>
                        </div>
                    </div>
                    <p class="text-gray-600 text-sm mb-4">Laporan realisasi keuangan periode Juli-September 2024</p>
                    <div class="flex justify-between items-center">
                        <span class="text-xs text-gray-500">XLSX • 1.8 MB</span>
                        <button
                            class="bg-primary hover:bg-accent text-white px-4 py-2 rounded text-sm transition-colors duration-300">
                            <i class="fas fa-download mr-1"></i>Unduh
                        </button>
                    </div>
                </div>

                <!-- Document 3 -->
                <div class="bg-gray-50 rounded-xl p-6 hover:shadow-lg transition-shadow duration-300">
                    <div class="flex items-center mb-4">
                        <i class="fas fa-file-alt text-blue-500 text-2xl mr-4"></i>
                        <div>
                            <h3 class="font-bold text-secondary">RPJM Desa</h3>
                            <p class="text-sm text-gray-600">2020-2026</p>
                        </div>
                    </div>
                    <p class="text-gray-600 text-sm mb-4">Rencana Pembangunan Jangka Menengah Desa periode 6 tahun</p>
                    <div class="flex justify-between items-center">
                        <span class="text-xs text-gray-500">PDF • 3.2 MB</span>
                        <button
                            class="bg-primary hover:bg-accent text-white px-4 py-2 rounded text-sm transition-colors duration-300">
                            <i class="fas fa-download mr-1"></i>Unduh
                        </button>
                    </div>
                </div>

                <!-- Document 4 -->
                <div class="bg-gray-50 rounded-xl p-6 hover:shadow-lg transition-shadow duration-300">
                    <div class="flex items-center mb-4">
                        <i class="fas fa-chart-bar text-purple-500 text-2xl mr-4"></i>
                        <div>
                            <h3 class="font-bold text-secondary">Laporan Kinerja</h3>
                            <p class="text-sm text-gray-600">Tahun 2023</p>
                        </div>
                    </div>
                    <p class="text-gray-600 text-sm mb-4">Laporan capaian kinerja pemerintahan desa tahun 2023</p>
                    <div class="flex justify-between items-center">
                        <span class="text-xs text-gray-500">PDF • 4.1 MB</span>
                        <button
                            class="bg-primary hover:bg-accent text-white px-4 py-2 rounded text-sm transition-colors duration-300">
                            <i class="fas fa-download mr-1"></i>Unduh
                        </button>
                    </div>
                </div>

                <!-- Document 5 -->
                <div class="bg-gray-50 rounded-xl p-6 hover:shadow-lg transition-shadow duration-300">
                    <div class="flex items-center mb-4">
                        <i class="fas fa-gavel text-orange-500 text-2xl mr-4"></i>
                        <div>
                            <h3 class="font-bold text-secondary">Peraturan Desa</h3>
                            <p class="text-sm text-gray-600">Koleksi Perdes</p>
                        </div>
                    </div>
                    <p class="text-gray-600 text-sm mb-4">Kumpulan Peraturan Desa yang berlaku di Desa Bantengputih</p>
                    <div class="flex justify-between items-center">
                        <span class="text-xs text-gray-500">PDF • 5.7 MB</span>
                        <button
                            class="bg-primary hover:bg-accent text-white px-4 py-2 rounded text-sm transition-colors duration-300">
                            <i class="fas fa-download mr-1"></i>Unduh
                        </button>
                    </div>
                </div>

                <!-- Document 6 -->
                <div class="bg-gray-50 rounded-xl p-6 hover:shadow-lg transition-shadow duration-300">
                    <div class="flex items-center mb-4">
                        <i class="fas fa-users text-teal-500 text-2xl mr-4"></i>
                        <div>
                            <h3 class="font-bold text-secondary">Data Demografi</h3>
                            <p class="text-sm text-gray-600">Update Terbaru</p>
                        </div>
                    </div>
                    <p class="text-gray-600 text-sm mb-4">Data kependudukan dan demografis terbaru Desa Bantengputih</p>
                    <div class="flex justify-between items-center">
                        <span class="text-xs text-gray-500">XLSX • 890 KB</span>
                        <button
                            class="bg-primary hover:bg-accent text-white px-4 py-2 rounded text-sm transition-colors duration-300">
                            <i class="fas fa-download mr-1"></i>Unduh
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
