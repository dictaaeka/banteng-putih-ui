@extends('layouts.app')

@section('title', 'Desa Bantengputih - Beranda')

@push('styles')
    <style>
        /* Hero Slider Styles */
        .slide {
            transition: opacity 1s ease-in-out;
        }

        .slide.active {
            opacity: 1;
        }

        .hero-btn {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            padding: 12px 32px;
            border-radius: 8px;
            font-weight: 600;
            text-decoration: none;
            transition: all 0.3s ease;
            transform: translateY(0);
        }

        .hero-btn:hover {
            transform: translateY(-2px) scale(1.05);
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.2);
        }

        .hero-btn-primary {
            background-color: #4caf50;
            color: white;
        }

        .hero-btn-primary:hover {
            background-color: #45a049;
        }

        .hero-btn-outline {
            border: 2px solid white;
            color: white;
            background-color: transparent;
        }

        .hero-btn-outline:hover {
            background-color: white;
            color: #4caf50;
        }

        .nav-btn {
            position: absolute;
            top: 50%;
            transform: translateY(-50%);
            background-color: rgba(255, 255, 255, 0.2);
            backdrop-filter: blur(10px);
            color: white;
            border: none;
            border-radius: 50%;
            width: 50px;
            height: 50px;
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            transition: all 0.3s ease;
            z-index: 10;
        }

        .nav-btn:hover {
            background-color: rgba(255, 255, 255, 0.3);
            transform: translateY(-50%) scale(1.1);
        }

        .nav-btn-left {
            left: 20px;
        }

        .nav-btn-right {
            right: 20px;
        }

        .dots-container {
            position: absolute;
            bottom: 30px;
            left: 50%;
            transform: translateX(-50%);
            display: flex;
            gap: 12px;
            z-index: 10;
        }

        .dot {
            width: 12px;
            height: 12px;
            border-radius: 50%;
            background-color: rgba(255, 255, 255, 0.5);
            border: none;
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .dot:hover {
            background-color: rgba(255, 255, 255, 0.8);
            transform: scale(1.2);
        }

        .dot.active {
            background-color: white;
            transform: scale(1.3);
        }
    </style>
@endpush

@section('content')
    <!-- Hero Slider -->
    <section class="relative h-screen overflow-hidden">
        <div class="hero-slider relative w-full h-full">
            <!-- Slide 1 -->
            <div class="slide active absolute inset-0 transition-opacity duration-1000 ease-in-out">
                <img src="{{ asset('img/hero-pemandangan.jpg') }}" alt="Pemandangan Desa Bantengputih"
                    class="w-full h-full object-cover">
                <div class="absolute inset-0 bg-black bg-opacity-40 flex items-center justify-center">
                    <div class="text-center text-white max-w-4xl px-4">
                        <h1 class="text-4xl md:text-6xl font-bold mb-4 animate-fadeInUp">
                            Selamat Datang di Desa Bantengputih
                        </h1>
                        <p class="text-lg md:text-xl mb-8 animate-fadeInUp animation-delay-300">
                            Desa yang maju, mandiri, dan sejahtera untuk seluruh warga
                        </p>
                        <div class="flex flex-col sm:flex-row gap-4 justify-center animate-fadeInUp animation-delay-600">
                            <a href="{{ route('about') }}" class="hero-btn hero-btn-primary">
                                <i class="fas fa-info-circle mr-2"></i>Tentang Kami
                            </a>
                            <a href="{{ route('contact') }}" class="hero-btn hero-btn-outline">
                                <i class="fas fa-phone mr-2"></i>Hubungi Kami
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Slide 2 -->
            <div class="slide absolute inset-0 opacity-0 transition-opacity duration-1000 ease-in-out">
                <img src="{{ asset('img/hero-gotong-royong.jpg') }}" alt="Kegiatan Gotong Royong Warga"
                    class="w-full h-full object-cover">
                <div class="absolute inset-0 bg-black bg-opacity-40 flex items-center justify-center">
                    <div class="text-center text-white max-w-4xl px-4">
                        <h1 class="text-4xl md:text-6xl font-bold mb-4">
                            Gotong Royong Membangun Desa
                        </h1>
                        <p class="text-lg md:text-xl mb-8">
                            Bersama-sama membangun desa yang lebih baik untuk masa depan yang cerah
                        </p>
                        <div class="flex flex-col sm:flex-row gap-4 justify-center">
                            <a href="{{ route('news') }}" class="hero-btn hero-btn-primary">
                                <i class="fas fa-newspaper mr-2"></i>Lihat Kegiatan
                            </a>
                            <a href="{{ route('gallery') }}" class="hero-btn hero-btn-outline">
                                <i class="fas fa-images mr-2"></i>Galeri Foto
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Slide 3 -->
            <div class="slide absolute inset-0 opacity-0 transition-opacity duration-1000 ease-in-out">
                <img src="{{ asset('img/hero-produk.png') }}" alt="Produk Unggulan Desa" class="w-full h-full object-cover">
                <div class="absolute inset-0 bg-black bg-opacity-40 flex items-center justify-center">
                    <div class="text-center text-white max-w-4xl px-4">
                        <h1 class="text-4xl md:text-6xl font-bold mb-4">
                            Produk Unggulan Desa
                        </h1>
                        <p class="text-lg md:text-xl mb-8">
                            Berbagai produk berkualitas tinggi dari hasil karya warga desa
                        </p>
                        <div class="flex flex-col sm:flex-row gap-4 justify-center">
                            <a href="{{ route('product') }}" class="hero-btn hero-btn-primary">
                                <i class="fas fa-shopping-basket mr-2"></i>Lihat Produk
                            </a>
                            <a href="{{ route('contact') }}" class="hero-btn hero-btn-outline">
                                <i class="fas fa-shopping-cart mr-2"></i>Pesan Sekarang
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Navigation buttons -->
            <button onclick="changeSlide(-1)" class="nav-btn nav-btn-left" aria-label="Previous slide" type="button">
                <i class="fas fa-chevron-left text-xl"></i>
            </button>
            <button onclick="changeSlide(1)" class="nav-btn nav-btn-right" aria-label="Next slide" type="button">
                <i class="fas fa-chevron-right text-xl"></i>
            </button>

            <!-- Dots indicator -->
            <div class="dots-container">
                <button onclick="currentSlide(1)" class="dot active" aria-label="Go to slide 1" type="button"></button>
                <button onclick="currentSlide(2)" class="dot" aria-label="Go to slide 2" type="button"></button>
                <button onclick="currentSlide(3)" class="dot" aria-label="Go to slide 3" type="button"></button>
            </div>
        </div>
    </section>

    <!-- Welcome Section -->
    <section class="py-20 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">
                <div>
                    <h2 class="text-3xl md:text-4xl font-bold text-secondary mb-6">
                        Selamat Datang di Desa Bantengputih
                    </h2>
                    <p class="text-gray-600 mb-6 leading-relaxed">
                        Desa Bantengputih adalah sebuah komunitas yang harmonis, terletak di Kecamatan Karanggeneng,
                        Kabupaten Lamongan. Kami bangga dengan warisan budaya yang kaya, alam yang asri, dan semangat gotong
                        royong yang masih terjaga hingga kini.
                    </p>
                    <p class="text-gray-600 mb-8 leading-relaxed">
                        Dengan visi "Terwujudnya Desa Bantengputih Menjadi Desa Mandiri yang Sejahtera", kami terus berupaya
                        memberikan pelayanan terbaik bagi seluruh warga dan pengunjung yang datang ke desa kami.
                    </p>
                    <div class="flex flex-wrap gap-6">
                        <div class="flex items-center space-x-2 text-primary">
                            <i class="fas fa-leaf text-lg"></i>
                            <span class="font-semibold">Pertanian & Perikanan</span>
                        </div>
                        <div class="flex items-center space-x-2 text-primary">
                            <i class="fas fa-users text-lg"></i>
                            <span class="font-semibold">Masyarakat Harmonis</span>
                        </div>
                        <div class="flex items-center space-x-2 text-primary">
                            <i class="fas fa-handshake text-lg"></i>
                            <span class="font-semibold">Gotong Royong</span>
                        </div>
                    </div>
                </div>
                <div class="grid grid-cols-2 gap-4">
                    <img src="{{ asset('img/pemandangan.jpeg') }}" alt="Pemandangan Sawah Desa Bantengputih"
                        class="col-span-2 w-full h-64 object-cover rounded-lg shadow-lg">
                    <img src="{{ asset('img/tambak.png') }}" alt="Tambak Ikan Desa"
                        class="w-full h-32 object-cover rounded-lg shadow-lg">
                    <img src="{{ asset('img/hero-gotong-royong.jpg') }}" alt="Gotong Royong Warga"
                        class="w-full h-32 object-cover rounded-lg shadow-lg">
                </div>
            </div>
        </div>
    </section>

    <!-- Stats Section -->
    <section class="py-20 bg-gradient-to-r from-primary to-accent">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <h2 class="text-3xl md:text-4xl font-bold text-white text-center mb-12">
                Desa Bantengputih dalam Angka
            </h2>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
                <div
                    class="bg-white bg-opacity-10 backdrop-blur-lg rounded-xl p-8 text-center transform hover:scale-105 transition-all duration-300">
                    <div
                        class="bg-white bg-opacity-20 w-16 h-16 rounded-full flex items-center justify-center mx-auto mb-4">
                        <i class="fas fa-users text-2xl text-white"></i>
                    </div>
                    <h3 class="text-3xl font-bold text-white mb-2 counter" data-target="1526">0</h3>
                    <p class="text-white opacity-90">Jumlah Penduduk</p>
                </div>
                <div
                    class="bg-white bg-opacity-10 backdrop-blur-lg rounded-xl p-8 text-center transform hover:scale-105 transition-all duration-300">
                    <div
                        class="bg-white bg-opacity-20 w-16 h-16 rounded-full flex items-center justify-center mx-auto mb-4">
                        <i class="fas fa-home text-2xl text-white"></i>
                    </div>
                    <h3 class="text-3xl font-bold text-white mb-2 counter" data-target="3">0</h3>
                    <p class="text-white opacity-90">Dusun</p>
                </div>
                <div
                    class="bg-white bg-opacity-10 backdrop-blur-lg rounded-xl p-8 text-center transform hover:scale-105 transition-all duration-300">
                    <div
                        class="bg-white bg-opacity-20 w-16 h-16 rounded-full flex items-center justify-center mx-auto mb-4">
                        <i class="fas fa-map text-2xl text-white"></i>
                    </div>
                    <h3 class="text-3xl font-bold text-white mb-2 counter" data-target="179.01">0</h3>
                    <p class="text-white opacity-90">Luas Wilayah (Ha)</p>
                </div>
                <div
                    class="bg-white bg-opacity-10 backdrop-blur-lg rounded-xl p-8 text-center transform hover:scale-105 transition-all duration-300">
                    <div
                        class="bg-white bg-opacity-20 w-16 h-16 rounded-full flex items-center justify-center mx-auto mb-4">
                        <i class="fas fa-users-cog text-2xl text-white"></i>
                    </div>
                    <h3 class="text-3xl font-bold text-white mb-2 counter" data-target="9">0</h3>
                    <p class="text-white opacity-90">RT</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Features Section -->
    <section class="py-20 bg-gray-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <h2 class="text-3xl md:text-4xl font-bold text-secondary text-center mb-12">
                Layanan Unggulan
            </h2>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <a href="{{ route('product') }}"
                    class="group bg-white rounded-xl overflow-hidden shadow-lg hover:shadow-xl transform hover:-translate-y-2 transition-all duration-300">
                    <div class="h-48 overflow-hidden">
                        <img src="https://placehold.co/400x200/4CAF50/FFFFFF?text=Produk+Desa" alt="Produk Desa"
                            class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-300">
                    </div>
                    <div class="p-6 text-center">
                        <i class="fas fa-shopping-basket text-3xl text-primary mb-4"></i>
                        <h3 class="text-xl font-bold text-secondary mb-3">Produk Desa</h3>
                        <p class="text-gray-600">Berbagai produk unggulan dari warga desa dengan kualitas terbaik</p>
                    </div>
                </a>
                <a href="{{ route('complaint') }}"
                    class="group bg-white rounded-xl overflow-hidden shadow-lg hover:shadow-xl transform hover:-translate-y-2 transition-all duration-300">
                    <div class="h-48 overflow-hidden">
                        <img src="https://placehold.co/400x200/4CAF50/FFFFFF?text=Pengaduan+Online" alt="Pengaduan Online"
                            class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-300">
                    </div>
                    <div class="p-6 text-center">
                        <i class="fas fa-comments text-3xl text-primary mb-4"></i>
                        <h3 class="text-xl font-bold text-secondary mb-3">Pengaduan Online</h3>
                        <p class="text-gray-600">Layanan pengaduan masyarakat secara online yang mudah dan cepat</p>
                    </div>
                </a>
                <a href="{{ route('docs') }}"
                    class="group bg-white rounded-xl overflow-hidden shadow-lg hover:shadow-xl transform hover:-translate-y-2 transition-all duration-300">
                    <div class="h-48 overflow-hidden">
                        <img src="https://placehold.co/400x200/4CAF50/FFFFFF?text=Transparansi" alt="Transparansi"
                            class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-300">
                    </div>
                    <div class="p-6 text-center">
                        <i class="fas fa-chart-line text-3xl text-primary mb-4"></i>
                        <h3 class="text-xl font-bold text-secondary mb-3">Transparansi</h3>
                        <p class="text-gray-600">Informasi keuangan dan kinerja desa yang transparan dan akuntabel</p>
                    </div>
                </a>
            </div>
        </div>
    </section>

    <!-- News Preview Section -->
    <section class="py-20 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex flex-col md:flex-row justify-between items-center mb-12">
                <h2 class="text-3xl md:text-4xl font-bold text-secondary mb-4 md:mb-0">
                    Berita Terbaru
                </h2>
                <a href="{{ route('news') }}"
                    class="bg-primary hover:bg-accent text-white px-6 py-2 rounded-lg font-semibold transition-colors duration-300">
                    Lihat Semua Berita
                </a>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <article
                    class="bg-white rounded-xl overflow-hidden shadow-lg hover:shadow-xl transform hover:-translate-y-1 transition-all duration-300">
                    <img src="https://placehold.co/400x250/4CAF50/FFFFFF?text=Peresmian+Jalan+Desa"
                        alt="Peresmian Jalan Desa Baru" class="w-full h-48 object-cover">
                    <div class="p-6">
                        <span class="text-primary font-semibold text-sm">15 Desember 2024</span>
                        <h3 class="text-xl font-bold text-secondary mt-2 mb-3">
                            <a href="{{ route('news.detail', 1) }}"
                                class="hover:text-primary transition-colors duration-200">
                                Peresmian Jalan Desa Baru Sepanjang 2 KM
                            </a>
                        </h3>
                        <p class="text-gray-600">
                            Kepala Desa Musthofa meresmikan pembangunan jalan desa sepanjang 2 kilometer yang menghubungkan
                            dusun terpencil dengan pusat desa...
                        </p>
                        <a href="{{ route('news.detail', 1) }}"
                            class="inline-flex items-center text-primary font-semibold mt-3 hover:text-accent transition-colors duration-200">
                            Baca Selengkapnya <i class="fas fa-arrow-right ml-2"></i>
                        </a>
                    </div>
                </article>
                <article
                    class="bg-white rounded-xl overflow-hidden shadow-lg hover:shadow-xl transform hover:-translate-y-1 transition-all duration-300">
                    <img src="https://placehold.co/400x250/4CAF50/FFFFFF?text=Pelatihan+UMKM" alt="Pelatihan UMKM"
                        class="w-full h-48 object-cover">
                    <div class="p-6">
                        <span class="text-primary font-semibold text-sm">10 Desember 2024</span>
                        <h3 class="text-xl font-bold text-secondary mt-2 mb-3">
                            <a href="{{ route('news.detail', 2) }}"
                                class="hover:text-primary transition-colors duration-200">
                                Pelatihan UMKM untuk Ibu-ibu PKK
                            </a>
                        </h3>
                        <p class="text-gray-600">
                            Kegiatan pelatihan pembuatan produk olahan makanan untuk ibu-ibu PKK dalam rangka meningkatkan
                            ekonomi keluarga...
                        </p>
                        <a href="{{ route('news.detail', 2) }}"
                            class="inline-flex items-center text-primary font-semibold mt-3 hover:text-accent transition-colors duration-200">
                            Baca Selengkapnya <i class="fas fa-arrow-right ml-2"></i>
                        </a>
                    </div>
                </article>
                <article
                    class="bg-white rounded-xl overflow-hidden shadow-lg hover:shadow-xl transform hover:-translate-y-1 transition-all duration-300">
                    <img src="https://placehold.co/400x250/4CAF50/FFFFFF?text=Gotong+Royong"
                        alt="Gotong Royong Bersih Desa" class="w-full h-48 object-cover">
                    <div class="p-6">
                        <span class="text-primary font-semibold text-sm">5 Desember 2024</span>
                        <h3 class="text-xl font-bold text-secondary mt-2 mb-3">
                            <a href="{{ route('news.detail', 3) }}"
                                class="hover:text-primary transition-colors duration-200">
                                Gotong Royong Pembersihan Sungai Desa
                            </a>
                        </h3>
                        <p class="text-gray-600">
                            Warga bergotong royong membersihkan sungai desa untuk menjaga kelestarian lingkungan dan
                            mencegah banjir saat musim hujan...
                        </p>
                        <a href="{{ route('news.detail', 3) }}"
                            class="inline-flex items-center text-primary font-semibold mt-3 hover:text-accent transition-colors duration-200">
                            Baca Selengkapnya <i class="fas fa-arrow-right ml-2"></i>
                        </a>
                    </div>
                </article>
            </div>
        </div>
    </section>
@endsection

@push('scripts')
    <script>
        // Hero Slider Functionality
        let currentSlideIndex = 0;
        const slides = document.querySelectorAll(".slide");
        const dots = document.querySelectorAll(".dot");
        const totalSlides = slides.length;

        function showSlide(index) {
            if (index >= totalSlides) index = 0;
            if (index < 0) index = totalSlides - 1;
            currentSlideIndex = index;

            slides.forEach((slide, i) => {
                slide.classList.remove("active");
                slide.style.opacity = "0";
                slide.style.zIndex = "1";
            });

            dots.forEach((dot) => {
                dot.classList.remove("active");
            });

            if (slides[index]) {
                slides[index].classList.add("active");
                slides[index].style.opacity = "1";
                slides[index].style.zIndex = "2";
            }

            if (dots[index]) {
                dots[index].classList.add("active");
            }
        }

        function nextSlide() {
            currentSlideIndex = (currentSlideIndex + 1) % totalSlides;
            showSlide(currentSlideIndex);
        }

        function prevSlide() {
            currentSlideIndex = (currentSlideIndex - 1 + totalSlides) % totalSlides;
            showSlide(currentSlideIndex);
        }

        function changeSlide(direction) {
            if (direction === 1) {
                nextSlide();
            } else {
                prevSlide();
            }
            stopAutoSlide();
            startAutoSlide();
        }

        function currentSlide(slideNumber) {
            currentSlideIndex = slideNumber - 1;
            showSlide(currentSlideIndex);
            stopAutoSlide();
            startAutoSlide();
        }

        let autoSlideInterval;

        function startAutoSlide() {
            autoSlideInterval = setInterval(nextSlide, 5000);
        }

        function stopAutoSlide() {
            if (autoSlideInterval) {
                clearInterval(autoSlideInterval);
            }
        }

        document.addEventListener("DOMContentLoaded", function() {
            showSlide(0);
            startAutoSlide();

            const heroSection = document.querySelector(".hero-slider");
            if (heroSection) {
                heroSection.addEventListener("mouseenter", stopAutoSlide);
                heroSection.addEventListener("mouseleave", startAutoSlide);
            }
        });

        // Counter animation for stats
        function animateCounters() {
            const counters = document.querySelectorAll(".counter");
            const speed = 2000;

            counters.forEach((counter) => {
                const target = parseFloat(counter.getAttribute("data-target"));
                const increment = target / (speed / 16);
                let count = 0;

                const updateCounter = () => {
                    if (count < target) {
                        count += increment;
                        if (count > target) count = target;

                        if (target % 1 !== 0) {
                            counter.innerText = count.toFixed(1);
                        } else {
                            counter.innerText = Math.floor(count);
                        }

                        requestAnimationFrame(updateCounter);
                    } else {
                        counter.innerText = target % 1 !== 0 ? target.toFixed(1) : target;
                    }
                };

                updateCounter();
            });
        }

        const observer = new IntersectionObserver(
            (entries) => {
                entries.forEach((entry) => {
                    if (entry.isIntersecting) {
                        animateCounters();
                        observer.unobserve(entry.target);
                    }
                });
            }, {
                threshold: 0.5
            }
        );

        document.addEventListener("DOMContentLoaded", () => {
            const statsSection = document.querySelector(".grid.grid-cols-1.md\\:grid-cols-2.lg\\:grid-cols-4");
            if (statsSection) {
                observer.observe(statsSection);
            }
        });
    </script>
@endpush
