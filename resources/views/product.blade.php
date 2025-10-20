@extends('layouts.app')

@section('title', 'Desa Bantengputih - Produk Desa')

@section('content')
    <!-- Hero Section -->
    <section class="relative bg-gradient-to-r from-primary to-accent py-20 mt-16">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
            <h1 class="text-4xl md:text-5xl font-bold text-white mb-4">Produk Desa</h1>
            <p class="text-xl text-white opacity-90 max-w-2xl mx-auto">
                Produk unggulan dan berkualitas dari masyarakat Desa Bantengputih
            </p>
        </div>
    </section>

    <!-- Products Section -->
    <section class="py-20 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-12">
                <h2 class="text-3xl md:text-4xl font-bold text-secondary mb-4">Produk Unggulan</h2>
                <p class="text-gray-600 max-w-2xl mx-auto">
                    Berbagai produk berkualitas tinggi hasil karya tangan warga desa
                </p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                <!-- Product 1 - Bandeng -->
                <div
                    class="bg-white rounded-xl overflow-hidden shadow-lg hover:shadow-xl transform hover:-translate-y-2 transition-all duration-300">
                    <img src="{{ asset('img/bandeng.webp') }}" alt="Bandeng Segar" class="w-full h-48 object-cover">
                    <div class="p-6">
                        <h3 class="text-xl font-bold text-secondary mb-2">Bandeng Segar</h3>
                        <p class="text-gray-600 mb-4">Bandeng segar hasil tangkapan langsung dari tambak desa dengan
                            kualitas terbaik.</p>
                        <div class="flex justify-between items-center">
                            <span class="text-2xl font-bold text-primary">Rp 25.000/kg</span>
                            <button
                                class="bg-primary hover:bg-accent text-white px-4 py-2 rounded-lg transition-colors duration-300">
                                <i class="fas fa-shopping-cart mr-2"></i>Pesan
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Product 2 - Udang Vannamei -->
                <div
                    class="bg-white rounded-xl overflow-hidden shadow-lg hover:shadow-xl transform hover:-translate-y-2 transition-all duration-300">
                    <img src="{{ asset('img/udang-vannamei.jpeg') }}" alt="Udang Vannamei" class="w-full h-48 object-cover">
                    <div class="p-6">
                        <h3 class="text-xl font-bold text-secondary mb-2">Udang Vannamei</h3>
                        <p class="text-gray-600 mb-4">Udang vannamei segar berkualitas tinggi dari tambak modern desa.</p>
                        <div class="flex justify-between items-center">
                            <span class="text-2xl font-bold text-primary">Rp 85.000/kg</span>
                            <button
                                class="bg-primary hover:bg-accent text-white px-4 py-2 rounded-lg transition-colors duration-300">
                                <i class="fas fa-shopping-cart mr-2"></i>Pesan
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Product 3 - Ikan Nila -->
                <div
                    class="bg-white rounded-xl overflow-hidden shadow-lg hover:shadow-xl transform hover:-translate-y-2 transition-all duration-300">
                    <img src="{{ asset('img/nila.webp') }}" alt="Ikan Nila" class="w-full h-48 object-cover">
                    <div class="p-6">
                        <h3 class="text-xl font-bold text-secondary mb-2">Ikan Nila</h3>
                        <p class="text-gray-600 mb-4">Ikan nila segar hasil budidaya kolam air tawar dengan pakan alami.</p>
                        <div class="flex justify-between items-center">
                            <span class="text-2xl font-bold text-primary">Rp 18.000/kg</span>
                            <button
                                class="bg-primary hover:bg-accent text-white px-4 py-2 rounded-lg transition-colors duration-300">
                                <i class="fas fa-shopping-cart mr-2"></i>Pesan
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Product 4 - Ikan Mas -->
                <div
                    class="bg-white rounded-xl overflow-hidden shadow-lg hover:shadow-xl transform hover:-translate-y-2 transition-all duration-300">
                    <img src="{{ asset('img/ikan-mas.webp') }}" alt="Ikan Mas" class="w-full h-48 object-cover">
                    <div class="p-6">
                        <h3 class="text-xl font-bold text-secondary mb-2">Ikan Mas</h3>
                        <p class="text-gray-600 mb-4">Ikan mas segar dengan daging yang tebal dan rasa yang gurih.</p>
                        <div class="flex justify-between items-center">
                            <span class="text-2xl font-bold text-primary">Rp 22.000/kg</span>
                            <button
                                class="bg-primary hover:bg-accent text-white px-4 py-2 rounded-lg transition-colors duration-300">
                                <i class="fas fa-shopping-cart mr-2"></i>Pesan
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Product 5 - Beras -->
                <div
                    class="bg-white rounded-xl overflow-hidden shadow-lg hover:shadow-xl transform hover:-translate-y-2 transition-all duration-300">
                    <img src="{{ asset('img/padi.jpg') }}" alt="Beras Premium" class="w-full h-48 object-cover">
                    <div class="p-6">
                        <h3 class="text-xl font-bold text-secondary mb-2">Beras Premium</h3>
                        <p class="text-gray-600 mb-4">Beras berkualitas tinggi dari hasil panen sawah organik desa.</p>
                        <div class="flex justify-between items-center">
                            <span class="text-2xl font-bold text-primary">Rp 12.000/kg</span>
                            <button
                                class="bg-primary hover:bg-accent text-white px-4 py-2 rounded-lg transition-colors duration-300">
                                <i class="fas fa-shopping-cart mr-2"></i>Pesan
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Product 6 - Sayuran Organik -->
                <div
                    class="bg-white rounded-xl overflow-hidden shadow-lg hover:shadow-xl transform hover:-translate-y-2 transition-all duration-300">
                    <img src="https://placehold.co/400x250/4CAF50/FFFFFF?text=Sayuran+Organik" alt="Sayuran Organik"
                        class="w-full h-48 object-cover">
                    <div class="p-6">
                        <h3 class="text-xl font-bold text-secondary mb-2">Sayuran Organik</h3>
                        <p class="text-gray-600 mb-4">Berbagai macam sayuran segar organik tanpa pestisikan kimia.</p>
                        <div class="flex justify-between items-center">
                            <span class="text-2xl font-bold text-primary">Rp 8.000/kg</span>
                            <button
                                class="bg-primary hover:bg-accent text-white px-4 py-2 rounded-lg transition-colors duration-300">
                                <i class="fas fa-shopping-cart mr-2"></i>Pesan
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Contact Section -->
    <section class="py-20 bg-gray-50">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
            <h2 class="text-3xl md:text-4xl font-bold text-secondary mb-4">Tertarik dengan Produk Kami?</h2>
            <p class="text-gray-600 mb-8 max-w-2xl mx-auto">
                Hubungi kami untuk pemesanan atau informasi lebih lanjut mengenai produk-produk unggulan Desa Bantengputih
            </p>

            <div class="flex flex-col sm:flex-row gap-4 justify-center">
                <a href="https://wa.me/6281331931077" target="_blank"
                    class="bg-green-500 hover:bg-green-600 text-white font-semibold px-8 py-3 rounded-lg transform hover:scale-105 transition-all duration-300">
                    <i class="fab fa-whatsapp mr-2"></i>WhatsApp
                </a>
                <a href="tel:081331931077"
                    class="bg-primary hover:bg-accent text-white font-semibold px-8 py-3 rounded-lg transform hover:scale-105 transition-all duration-300">
                    <i class="fas fa-phone mr-2"></i>Telepon
                </a>
                <a href="{{ route('contact') }}"
                    class="bg-white text-primary border-2 border-primary hover:bg-primary hover:text-white font-semibold px-8 py-3 rounded-lg transform hover:scale-105 transition-all duration-300">
                    <i class="fas fa-envelope mr-2"></i>Email
                </a>
            </div>
        </div>
    </section>
@endsection
