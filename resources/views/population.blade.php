@extends('layouts.app')

@section('title', 'Data Kependudukan - Desa Bantengputih')

@section('content')
    <!-- Hero Section -->
    <section class="relative bg-gradient-to-r from-primary to-accent py-20 mt-16">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
            <h1 class="text-4xl md:text-5xl font-bold text-white mb-4">Data Kependudukan</h1>
            <p class="text-xl text-white opacity-90 max-w-2xl mx-auto">
                Informasi demografi dan statistik kependudukan Desa Bantengputih
            </p>
        </div>
    </section>

    <!-- Population Overview -->
    <section class="py-20 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-12">
                <h2 class="text-3xl md:text-4xl font-bold text-secondary mb-4">Statistik Penduduk</h2>
                <p class="text-gray-600 max-w-2xl mx-auto">
                    Data terbaru per Desember 2024
                </p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8 mb-12">
                <!-- Total Population -->
                <div class="bg-gradient-to-br from-primary to-accent text-white rounded-xl p-6 text-center">
                    <i class="fas fa-users text-4xl mb-4"></i>
                    <h3 class="text-xl font-bold mb-2">Total Penduduk</h3>
                    <p class="text-3xl font-bold counter" data-target="3247">0</p>
                    <p class="text-sm opacity-90">Jiwa</p>
                </div>

                <!-- Male Population -->
                <div class="bg-white border-2 border-blue-500 rounded-xl p-6 text-center">
                    <i class="fas fa-male text-4xl text-blue-500 mb-4"></i>
                    <h3 class="text-xl font-bold text-secondary mb-2">Laki-laki</h3>
                    <p class="text-3xl font-bold text-blue-500 counter" data-target="1623">0</p>
                    <p class="text-sm text-gray-600">49.9%</p>
                </div>

                <!-- Female Population -->
                <div class="bg-white border-2 border-pink-500 rounded-xl p-6 text-center">
                    <i class="fas fa-female text-4xl text-pink-500 mb-4"></i>
                    <h3 class="text-xl font-bold text-secondary mb-2">Perempuan</h3>
                    <p class="text-3xl font-bold text-pink-500 counter" data-target="1624">0</p>
                    <p class="text-sm text-gray-600">50.1%</p>
                </div>

                <!-- Families -->
                <div class="bg-white border-2 border-green-500 rounded-xl p-6 text-center">
                    <i class="fas fa-home text-4xl text-green-500 mb-4"></i>
                    <h3 class="text-xl font-bold text-secondary mb-2">Kepala Keluarga</h3>
                    <p class="text-3xl font-bold text-green-500 counter" data-target="892">0</p>
                    <p class="text-sm text-gray-600">Keluarga</p>
                </div>
            </div>

            <!-- Age Distribution Chart -->
            <div class="bg-gray-50 rounded-xl p-8 mb-12">
                <h3 class="text-2xl font-bold text-secondary text-center mb-8">Distribusi Usia</h3>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                    <!-- Chart Placeholder -->
                    <div class="bg-white rounded-lg p-6">
                        <div class="space-y-4">
                            <div class="flex justify-between items-center">
                                <span class="text-gray-600">0-14 tahun (Anak)</span>
                                <div class="flex items-center">
                                    <div class="w-32 bg-gray-200 rounded-full h-3 mr-3">
                                        <div class="bg-blue-500 h-3 rounded-full" style="width: 28%"></div>
                                    </div>
                                    <span class="font-bold text-blue-500">28%</span>
                                </div>
                            </div>
                            <div class="flex justify-between items-center">
                                <span class="text-gray-600">15-64 tahun (Produktif)</span>
                                <div class="flex items-center">
                                    <div class="w-32 bg-gray-200 rounded-full h-3 mr-3">
                                        <div class="bg-green-500 h-3 rounded-full" style="width: 65%"></div>
                                    </div>
                                    <span class="font-bold text-green-500">65%</span>
                                </div>
                            </div>
                            <div class="flex justify-between items-center">
                                <span class="text-gray-600">65+ tahun (Lansia)</span>
                                <div class="flex items-center">
                                    <div class="w-32 bg-gray-200 rounded-full h-3 mr-3">
                                        <div class="bg-orange-500 h-3 rounded-full" style="width: 7%"></div>
                                    </div>
                                    <span class="font-bold text-orange-500">7%</span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Statistics -->
                    <div class="space-y-4">
                        <div class="bg-white rounded-lg p-4">
                            <div class="flex justify-between items-center">
                                <span class="font-medium text-gray-700">Rasio Jenis Kelamin</span>
                                <span class="font-bold text-primary">99.9</span>
                            </div>
                            <p class="text-xs text-gray-500 mt-1">Laki-laki per 100 perempuan</p>
                        </div>

                        <div class="bg-white rounded-lg p-4">
                            <div class="flex justify-between items-center">
                                <span class="font-medium text-gray-700">Kepadatan Penduduk</span>
                                <span class="font-bold text-primary">324 jiwa/km²</span>
                            </div>
                            <p class="text-xs text-gray-500 mt-1">Per kilometer persegi</p>
                        </div>

                        <div class="bg-white rounded-lg p-4">
                            <div class="flex justify-between items-center">
                                <span class="font-medium text-gray-700">Rata-rata per KK</span>
                                <span class="font-bold text-primary">3.6 jiwa</span>
                            </div>
                            <p class="text-xs text-gray-500 mt-1">Anggota keluarga</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Education Level -->
    <section class="py-20 bg-gray-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-12">
                <h2 class="text-3xl md:text-4xl font-bold text-secondary mb-4">Tingkat Pendidikan</h2>
                <p class="text-gray-600 max-w-2xl mx-auto">
                    Distribusi penduduk berdasarkan tingkat pendidikan tertinggi
                </p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                <!-- Education Stats -->
                <div class="bg-white rounded-xl shadow-lg p-6">
                    <div class="flex items-center mb-4">
                        <i class="fas fa-graduation-cap text-primary text-2xl mr-4"></i>
                        <h3 class="text-xl font-bold text-secondary">Perguruan Tinggi</h3>
                    </div>
                    <div class="text-center">
                        <p class="text-3xl font-bold text-primary mb-2">12%</p>
                        <p class="text-gray-600">389 orang</p>
                    </div>
                </div>

                <div class="bg-white rounded-xl shadow-lg p-6">
                    <div class="flex items-center mb-4">
                        <i class="fas fa-school text-primary text-2xl mr-4"></i>
                        <h3 class="text-xl font-bold text-secondary">SMA/SMK</h3>
                    </div>
                    <div class="text-center">
                        <p class="text-3xl font-bold text-primary mb-2">28%</p>
                        <p class="text-gray-600">909 orang</p>
                    </div>
                </div>

                <div class="bg-white rounded-xl shadow-lg p-6">
                    <div class="flex items-center mb-4">
                        <i class="fas fa-chalkboard-teacher text-primary text-2xl mr-4"></i>
                        <h3 class="text-xl font-bold text-secondary">SMP</h3>
                    </div>
                    <div class="text-center">
                        <p class="text-3xl font-bold text-primary mb-2">25%</p>
                        <p class="text-gray-600">812 orang</p>
                    </div>
                </div>

                <div class="bg-white rounded-xl shadow-lg p-6">
                    <div class="flex items-center mb-4">
                        <i class="fas fa-book-open text-primary text-2xl mr-4"></i>
                        <h3 class="text-xl font-bold text-secondary">SD</h3>
                    </div>
                    <div class="text-center">
                        <p class="text-3xl font-bold text-primary mb-2">30%</p>
                        <p class="text-gray-600">974 orang</p>
                    </div>
                </div>

                <div class="bg-white rounded-xl shadow-lg p-6">
                    <div class="flex items-center mb-4">
                        <i class="fas fa-baby text-primary text-2xl mr-4"></i>
                        <h3 class="text-xl font-bold text-secondary">Belum Sekolah</h3>
                    </div>
                    <div class="text-center">
                        <p class="text-3xl font-bold text-primary mb-2">3%</p>
                        <p class="text-gray-600">97 orang</p>
                    </div>
                </div>

                <div class="bg-white rounded-xl shadow-lg p-6">
                    <div class="flex items-center mb-4">
                        <i class="fas fa-times text-primary text-2xl mr-4"></i>
                        <h3 class="text-xl font-bold text-secondary">Tidak Sekolah</h3>
                    </div>
                    <div class="text-center">
                        <p class="text-3xl font-bold text-primary mb-2">2%</p>
                        <p class="text-gray-600">65 orang</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Occupation Data -->
    <section class="py-20 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-12">
                <h2 class="text-3xl md:text-4xl font-bold text-secondary mb-4">Mata Pencaharian</h2>
                <p class="text-gray-600 max-w-2xl mx-auto">
                    Distribusi penduduk berdasarkan jenis pekerjaan utama
                </p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
                <!-- Farmer -->
                <div class="bg-green-50 border border-green-200 rounded-xl p-6 text-center">
                    <i class="fas fa-seedling text-green-600 text-3xl mb-4"></i>
                    <h3 class="text-lg font-bold text-green-700 mb-2">Petani</h3>
                    <p class="text-2xl font-bold text-green-600 mb-1">45%</p>
                    <p class="text-sm text-green-600">1,461 orang</p>
                </div>

                <!-- Fisherman -->
                <div class="bg-blue-50 border border-blue-200 rounded-xl p-6 text-center">
                    <i class="fas fa-fish text-blue-600 text-3xl mb-4"></i>
                    <h3 class="text-lg font-bold text-blue-700 mb-2">Nelayan</h3>
                    <p class="text-2xl font-bold text-blue-600 mb-1">20%</p>
                    <p class="text-sm text-blue-600">649 orang</p>
                </div>

                <!-- Trader -->
                <div class="bg-purple-50 border border-purple-200 rounded-xl p-6 text-center">
                    <i class="fas fa-store text-purple-600 text-3xl mb-4"></i>
                    <h3 class="text-lg font-bold text-purple-700 mb-2">Pedagang</h3>
                    <p class="text-2xl font-bold text-purple-600 mb-1">15%</p>
                    <p class="text-sm text-purple-600">487 orang</p>
                </div>

                <!-- Civil Servant -->
                <div class="bg-indigo-50 border border-indigo-200 rounded-xl p-6 text-center">
                    <i class="fas fa-building text-indigo-600 text-3xl mb-4"></i>
                    <h3 class="text-lg font-bold text-indigo-700 mb-2">PNS</h3>
                    <p class="text-2xl font-bold text-indigo-600 mb-1">8%</p>
                    <p class="text-sm text-indigo-600">260 orang</p>
                </div>

                <!-- Labor -->
                <div class="bg-orange-50 border border-orange-200 rounded-xl p-6 text-center">
                    <i class="fas fa-hard-hat text-orange-600 text-3xl mb-4"></i>
                    <h3 class="text-lg font-bold text-orange-700 mb-2">Buruh</h3>
                    <p class="text-2xl font-bold text-orange-600 mb-1">7%</p>
                    <p class="text-sm text-orange-600">227 orang</p>
                </div>

                <!-- Others -->
                <div class="bg-gray-50 border border-gray-200 rounded-xl p-6 text-center">
                    <i class="fas fa-briefcase text-gray-600 text-3xl mb-4"></i>
                    <h3 class="text-lg font-bold text-gray-700 mb-2">Lainnya</h3>
                    <p class="text-2xl font-bold text-gray-600 mb-1">3%</p>
                    <p class="text-sm text-gray-600">97 orang</p>
                </div>

                <!-- Student -->
                <div class="bg-yellow-50 border border-yellow-200 rounded-xl p-6 text-center">
                    <i class="fas fa-user-graduate text-yellow-600 text-3xl mb-4"></i>
                    <h3 class="text-lg font-bold text-yellow-700 mb-2">Pelajar</h3>
                    <p class="text-2xl font-bold text-yellow-600 mb-1">1%</p>
                    <p class="text-sm text-yellow-600">32 orang</p>
                </div>

                <!-- Unemployed -->
                <div class="bg-red-50 border border-red-200 rounded-xl p-6 text-center">
                    <i class="fas fa-user-times text-red-600 text-3xl mb-4"></i>
                    <h3 class="text-lg font-bold text-red-700 mb-2">Tidak Bekerja</h3>
                    <p class="text-2xl font-bold text-red-600 mb-1">1%</p>
                    <p class="text-sm text-red-600">32 orang</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Village Areas -->
    <section class="py-20 bg-gray-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-12">
                <h2 class="text-3xl md:text-4xl font-bold text-secondary mb-4">Pembagian Wilayah</h2>
                <p class="text-gray-600 max-w-2xl mx-auto">
                    Distribusi penduduk per dusun di Desa Bantengputih
                </p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                <!-- Dusun 1 -->
                <div class="bg-white rounded-xl shadow-lg p-6">
                    <div class="flex items-center mb-4">
                        <div class="w-12 h-12 bg-primary bg-opacity-10 rounded-full flex items-center justify-center mr-4">
                            <i class="fas fa-map-marker-alt text-primary text-xl"></i>
                        </div>
                        <div>
                            <h3 class="text-xl font-bold text-secondary">Dusun Krajan</h3>
                            <p class="text-sm text-gray-600">Dusun I</p>
                        </div>
                    </div>
                    <div class="space-y-2 text-sm">
                        <div class="flex justify-between">
                            <span class="text-gray-600">Jumlah Penduduk:</span>
                            <span class="font-semibold">1,298 jiwa</span>
                        </div>
                        <div class="flex justify-between">
                            <span class="text-gray-600">Kepala Keluarga:</span>
                            <span class="font-semibold">356 KK</span>
                        </div>
                        <div class="flex justify-between">
                            <span class="text-gray-600">Luas Wilayah:</span>
                            <span class="font-semibold">3.2 km²</span>
                        </div>
                    </div>
                </div>

                <!-- Dusun 2 -->
                <div class="bg-white rounded-xl shadow-lg p-6">
                    <div class="flex items-center mb-4">
                        <div class="w-12 h-12 bg-primary bg-opacity-10 rounded-full flex items-center justify-center mr-4">
                            <i class="fas fa-map-marker-alt text-primary text-xl"></i>
                        </div>
                        <div>
                            <h3 class="text-xl font-bold text-secondary">Dusun Tengah</h3>
                            <p class="text-sm text-gray-600">Dusun II</p>
                        </div>
                    </div>
                    <div class="space-y-2 text-sm">
                        <div class="flex justify-between">
                            <span class="text-gray-600">Jumlah Penduduk:</span>
                            <span class="font-semibold">1,085 jiwa</span>
                        </div>
                        <div class="flex justify-between">
                            <span class="text-gray-600">Kepala Keluarga:</span>
                            <span class="font-semibold">298 KK</span>
                        </div>
                        <div class="flex justify-between">
                            <span class="text-gray-600">Luas Wilayah:</span>
                            <span class="font-semibold">2.8 km²</span>
                        </div>
                    </div>
                </div>

                <!-- Dusun 3 -->
                <div class="bg-white rounded-xl shadow-lg p-6">
                    <div class="flex items-center mb-4">
                        <div class="w-12 h-12 bg-primary bg-opacity-10 rounded-full flex items-center justify-center mr-4">
                            <i class="fas fa-map-marker-alt text-primary text-xl"></i>
                        </div>
                        <div>
                            <h3 class="text-xl font-bold text-secondary">Dusun Timur</h3>
                            <p class="text-sm text-gray-600">Dusun III</p>
                        </div>
                    </div>
                    <div class="space-y-2 text-sm">
                        <div class="flex justify-between">
                            <span class="text-gray-600">Jumlah Penduduk:</span>
                            <span class="font-semibold">864 jiwa</span>
                        </div>
                        <div class="flex justify-between">
                            <span class="text-gray-600">Kepala Keluarga:</span>
                            <span class="font-semibold">238 KK</span>
                        </div>
                        <div class="flex justify-between">
                            <span class="text-gray-600">Luas Wilayah:</span>
                            <span class="font-semibold">4.0 km²</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@push('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Counter animation for statistics
            const counters = document.querySelectorAll('.counter');

            const animateCounter = (counter) => {
                const target = parseInt(counter.getAttribute('data-target'));
                const increment = target / 100;
                let current = 0;

                const timer = setInterval(() => {
                    current += increment;
                    if (current >= target) {
                        current = target;
                        clearInterval(timer);
                    }
                    counter.textContent = Math.floor(current).toLocaleString();
                }, 20);
            };

            // Intersection Observer for counter animation
            const observer = new IntersectionObserver((entries) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        animateCounter(entry.target);
                        observer.unobserve(entry.target);
                    }
                });
            }, {
                threshold: 0.5
            });

            counters.forEach(counter => {
                observer.observe(counter);
            });
        });
    </script>
@endpush
