<nav class="bg-white shadow-lg fixed top-0 w-full z-50 transition-all duration-300" id="navbar">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between items-center h-16">
            <!-- Logo -->
            <div class="flex items-center space-x-3">
                <img src="https://placehold.co/40x40/4CAF50/FFFFFF?text=LOGO" alt="Logo Desa"
                    class="w-10 h-10 rounded-full">
                <span class="text-xl font-bold text-secondary">BANTENGPUTIH</span>
            </div>

            <!-- Desktop Navigation -->
            <div class="hidden lg:flex items-center space-x-8">
                <a href="{{ route('home') }}"
                    class="nav-link {{ request()->routeIs('home') ? 'active' : '' }} text-secondary hover:text-primary font-medium transition-colors duration-300 flex items-center space-x-2">
                    <i class="fas fa-home"></i>
                    <span>Beranda</span>
                </a>

                <!-- Profil Dropdown -->
                <div class="relative group">
                    <button
                        class="nav-link text-secondary hover:text-primary font-medium transition-colors duration-300 flex items-center space-x-2">
                        <i class="fas fa-info-circle"></i>
                        <span>Profil Desa</span>
                        <i
                            class="fas fa-chevron-down text-xs transform group-hover:rotate-180 transition-transform duration-300"></i>
                    </button>
                    <div
                        class="absolute top-full left-0 w-56 bg-white shadow-xl rounded-lg border border-gray-100 opacity-0 invisible group-hover:opacity-100 group-hover:visible transform translate-y-2 group-hover:translate-y-0 transition-all duration-300">
                        <a href="{{ route('about') }}"
                            class="flex items-center space-x-3 px-4 py-3 text-gray-700 hover:bg-gray-50 hover:text-primary transition-colors duration-200 first:rounded-t-lg">
                            <i class="fas fa-building text-primary w-4"></i>
                            <span>Tentang Kami</span>
                        </a>
                        <a href="{{ route('gallery') }}"
                            class="flex items-center space-x-3 px-4 py-3 text-gray-700 hover:bg-gray-50 hover:text-primary transition-colors duration-200 border-t border-gray-100">
                            <i class="fas fa-images text-primary w-4"></i>
                            <span>Galeri</span>
                        </a>
                        <a href="{{ route('news') }}"
                            class="flex items-center space-x-3 px-4 py-3 text-gray-700 hover:bg-gray-50 hover:text-primary transition-colors duration-200 border-t border-gray-100 last:rounded-b-lg">
                            <i class="fas fa-newspaper text-primary w-4"></i>
                            <span>Berita & Kegiatan</span>
                        </a>
                    </div>
                </div>

                <!-- Layanan Dropdown -->
                <div class="relative group">
                    <button
                        class="nav-link text-secondary hover:text-primary font-medium transition-colors duration-300 flex items-center space-x-2">
                        <i class="fas fa-cogs"></i>
                        <span>Layanan</span>
                        <i
                            class="fas fa-chevron-down text-xs transform group-hover:rotate-180 transition-transform duration-300"></i>
                    </button>
                    <div
                        class="absolute top-full left-0 w-56 bg-white shadow-xl rounded-lg border border-gray-100 opacity-0 invisible group-hover:opacity-100 group-hover:visible transform translate-y-2 group-hover:translate-y-0 transition-all duration-300">
                        <a href="{{ route('service') }}"
                            class="flex items-center space-x-3 px-4 py-3 text-gray-700 hover:bg-gray-50 hover:text-primary transition-colors duration-200 first:rounded-t-lg">
                            <i class="fas fa-file-alt text-primary w-4"></i>
                            <span>Informasi Layanan</span>
                        </a>
                        <a href="{{ route('complaint') }}"
                            class="flex items-center space-x-3 px-4 py-3 text-gray-700 hover:bg-gray-50 hover:text-primary transition-colors duration-200 border-t border-gray-100">
                            <i class="fas fa-comments text-primary w-4"></i>
                            <span>Pengaduan Online</span>
                        </a>
                        <a href="{{ route('docs') }}"
                            class="flex items-center space-x-3 px-4 py-3 text-gray-700 hover:bg-gray-50 hover:text-primary transition-colors duration-200 border-t border-gray-100 last:rounded-b-lg">
                            <i class="fas fa-chart-line text-primary w-4"></i>
                            <span>Transparansi</span>
                        </a>
                    </div>
                </div>

                <a href="{{ route('product') }}"
                    class="nav-link text-secondary hover:text-primary font-medium transition-colors duration-300 flex items-center space-x-2">
                    <i class="fas fa-box"></i>
                    <span>Produk Desa</span>
                </a>

                <a href="{{ route('contact') }}"
                    class="nav-link text-secondary hover:text-primary font-medium transition-colors duration-300 flex items-center space-x-2">
                    <i class="fas fa-phone"></i>
                    <span>Kontak</span>
                </a>
            </div>

            <!-- Mobile menu button -->
            <div class="lg:hidden">
                <button id="mobile-menu-button"
                    class="text-gray-700 hover:text-primary focus:outline-none focus:text-primary transition-colors duration-200">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M4 6h16M4 12h16M4 18h16"></path>
                    </svg>
                </button>
            </div>
        </div>

        <!-- Mobile Navigation Menu -->
        <div id="mobile-menu" class="lg:hidden hidden fixed inset-0 bg-white z-50 overflow-y-auto">
            <!-- Close button -->
            <div class="flex justify-end p-4">
                <button id="mobile-menu-close" class="text-gray-500 hover:text-gray-700">
                    <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12">
                        </path>
                    </svg>
                </button>
            </div>

            <div class="px-6 py-4 space-y-4">
                <a href="{{ route('home') }}"
                    class="block px-4 py-3 text-lg font-medium {{ request()->routeIs('home') ? 'text-secondary border-l-4 border-primary bg-green-50' : 'text-gray-700 hover:text-primary hover:bg-gray-50' }} rounded-r-lg">
                    <i class="fas fa-home w-6 mr-4"></i>Beranda
                </a>

                <!-- Mobile Profil Dropdown -->
                <div class="mobile-dropdown">
                    <button
                        class="mobile-dropdown-btn w-full flex items-center justify-between px-4 py-3 text-lg font-medium text-gray-700 hover:text-primary hover:bg-gray-50 rounded-lg transition-colors duration-200">
                        <span><i class="fas fa-info-circle w-6 mr-4"></i>Profil Desa</span>
                        <i class="fas fa-chevron-down transform transition-transform duration-200"></i>
                    </button>
                    <div class="mobile-dropdown-content hidden bg-gray-50 ml-6 mt-2 rounded-lg">
                        <a href="{{ route('about') }}"
                            class="block px-4 py-3 text-gray-600 hover:text-primary hover:bg-gray-100 rounded-lg transition-colors duration-200">
                            <i class="fas fa-building w-5 mr-4"></i>Tentang Kami
                        </a>
                        <a href="{{ route('gallery') }}"
                            class="block px-4 py-3 text-gray-600 hover:text-primary hover:bg-gray-100 rounded-lg transition-colors duration-200">
                            <i class="fas fa-images w-5 mr-4"></i>Galeri
                        </a>
                        <a href="{{ route('news') }}"
                            class="block px-4 py-3 text-gray-600 hover:text-primary hover:bg-gray-100 rounded-lg transition-colors duration-200">
                            <i class="fas fa-newspaper w-5 mr-4"></i>Berita & Kegiatan
                        </a>
                    </div>
                </div>

                <!-- Mobile Layanan Dropdown -->
                <div class="mobile-dropdown">
                    <button
                        class="mobile-dropdown-btn w-full flex items-center justify-between px-4 py-3 text-lg font-medium text-gray-700 hover:text-primary hover:bg-gray-50 rounded-lg transition-colors duration-200">
                        <span><i class="fas fa-cogs w-6 mr-4"></i>Layanan</span>
                        <i class="fas fa-chevron-down transform transition-transform duration-200"></i>
                    </button>
                    <div class="mobile-dropdown-content hidden bg-gray-50 ml-6 mt-2 rounded-lg">
                        <a href="{{ route('service') }}"
                            class="block px-4 py-3 text-gray-600 hover:text-primary hover:bg-gray-100 rounded-lg transition-colors duration-200">
                            <i class="fas fa-file-alt w-5 mr-4"></i>Informasi Layanan
                        </a>
                        <a href="{{ route('complaint') }}"
                            class="block px-4 py-3 text-gray-600 hover:text-primary hover:bg-gray-100 rounded-lg transition-colors duration-200">
                            <i class="fas fa-comments w-5 mr-4"></i>Pengaduan Online
                        </a>
                        <a href="{{ route('docs') }}"
                            class="block px-4 py-3 text-gray-600 hover:text-primary hover:bg-gray-100 rounded-lg transition-colors duration-200">
                            <i class="fas fa-chart-line w-5 mr-4"></i>Transparansi
                        </a>
                    </div>
                </div>

                <a href="{{ route('product') }}"
                    class="block px-4 py-3 text-lg font-medium text-gray-700 hover:text-primary hover:bg-gray-50 rounded-lg transition-colors duration-200">
                    <i class="fas fa-box w-6 mr-4"></i>Produk Desa
                </a>

                <a href="{{ route('contact') }}"
                    class="block px-4 py-3 text-lg font-medium text-gray-700 hover:text-primary hover:bg-gray-50 rounded-lg transition-colors duration-200">
                    <i class="fas fa-phone w-6 mr-4"></i>Kontak
                </a>
            </div>
        </div>
    </div>
</nav>
