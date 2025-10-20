// Enhanced navigation functionality with better mobile support
document.addEventListener("DOMContentLoaded", () => {
  // Mobile menu toggle
  const mobileMenuButton = document.getElementById('mobile-menu-button');
  const mobileMenu = document.getElementById('mobile-menu');
  const mobileMenuClose = document.getElementById('mobile-menu-close');
  
  // Function to close mobile menu
  function closeMobileMenu() {
    if (mobileMenu && mobileMenuButton) {
      mobileMenu.classList.add('hidden');
      document.body.classList.remove('overflow-hidden');
      mobileMenuButton.innerHTML = `
        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
        </svg>
      `;
    }
  }

  // Function to open mobile menu
  function openMobileMenu() {
    if (mobileMenu && mobileMenuButton) {
      mobileMenu.classList.remove('hidden');
      document.body.classList.add('overflow-hidden');
      mobileMenuButton.innerHTML = `
        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
        </svg>
      `;
    }
  }

  // Mobile menu button click handler
  if (mobileMenuButton && mobileMenu) {
    mobileMenuButton.addEventListener('click', (e) => {
      e.preventDefault();
      e.stopPropagation();
      
      const isHidden = mobileMenu.classList.contains('hidden');
      
      if (isHidden) {
        openMobileMenu();
      } else {
        closeMobileMenu();
      }
    });
  }

  // Mobile menu close button handler
  if (mobileMenuClose) {
    mobileMenuClose.addEventListener('click', (e) => {
      e.preventDefault();
      e.stopPropagation();
      closeMobileMenu();
    });
  }

  // Mobile dropdown functionality
  const mobileDropdowns = document.querySelectorAll('.mobile-dropdown');
  
  mobileDropdowns.forEach(dropdown => {
    const button = dropdown.querySelector('.mobile-dropdown-btn');
    const content = dropdown.querySelector('.mobile-dropdown-content');
    const icon = button.querySelector('.fa-chevron-down');
    
    if (button && content && icon) {
      button.addEventListener('click', (e) => {
        e.preventDefault();
        e.stopPropagation();
        
        const isHidden = content.classList.contains('hidden');
        
        // Close all other dropdowns
        mobileDropdowns.forEach(otherDropdown => {
          if (otherDropdown !== dropdown) {
            const otherContent = otherDropdown.querySelector('.mobile-dropdown-content');
            const otherIcon = otherDropdown.querySelector('.fa-chevron-down');
            if (otherContent && otherIcon) {
              otherContent.classList.add('hidden');
              otherIcon.classList.remove('rotate-180');
            }
          }
        });
        
        // Toggle current dropdown
        if (isHidden) {
          content.classList.remove('hidden');
          icon.classList.add('rotate-180');
        } else {
          content.classList.add('hidden');
          icon.classList.remove('rotate-180');
        }
      });
    }
  });

  // Close mobile menu when clicking on links
  const mobileLinks = document.querySelectorAll('#mobile-menu a');
  mobileLinks.forEach(link => {
    link.addEventListener('click', () => {
      closeMobileMenu();
    });
  });

  // Don't close mobile menu when clicking inside it
  if (mobileMenu) {
    mobileMenu.addEventListener('click', (e) => {
      e.stopPropagation();
    });
  }

  // Close mobile menu when clicking outside
  document.addEventListener('click', (e) => {
    if (mobileMenu && mobileMenuButton && !mobileMenu.contains(e.target) && !mobileMenuButton.contains(e.target)) {
      if (!mobileMenu.classList.contains('hidden')) {
        closeMobileMenu();
      }
    }
  });

  // Navbar scroll effect
  const navbar = document.getElementById('navbar');
  if (navbar) {
    window.addEventListener('scroll', () => {
      if (window.scrollY > 50) {
        navbar.classList.add('bg-white', 'bg-opacity-95', 'backdrop-blur-sm');
      } else {
        navbar.classList.remove('bg-opacity-95', 'backdrop-blur-sm');
      }
    });
  }

  // Set active navigation based on current page
  setActiveNavigation();
  
  // Initialize slider if present
  if (document.querySelector('.hero-slider')) {
    initializeSlider();
  }
  
  // Initialize stats animation
  initializeStatsAnimation();
});

// Set active navigation
function setActiveNavigation() {
  const currentPage = window.location.pathname.split('/').pop() || 'home.html';
  const navLinks = document.querySelectorAll('a[href]');
  
  navLinks.forEach(link => {
    const href = link.getAttribute('href');
    if (href === currentPage || (currentPage === '' && href === 'home.html')) {
      link.classList.add('text-primary', 'border-primary', 'bg-green-50');
    }
  });
}

// Hero Slider Functionality
let currentSlideIndex = 0;
let slides = [];
let slideInterval = null;

function initializeSlider() {
  slides = document.querySelectorAll('.slide');
  
  if (slides.length === 0) return;
  
  // Show first slide
  showSlide(0);
  
  // Start auto-play
  startAutoSlide();
  
  // Pause on hover
  const heroSlider = document.querySelector('.hero-slider');
  if (heroSlider) {
    heroSlider.addEventListener('mouseenter', () => {
      if (slideInterval) clearInterval(slideInterval);
    });
    
    heroSlider.addEventListener('mouseleave', () => {
      startAutoSlide();
    });
  }
}

function showSlide(index) {
  if (slides.length === 0) return;
  
  // Hide all slides
  slides.forEach((slide, i) => {
    if (i === index) {
      slide.classList.remove('opacity-0');
      slide.classList.add('opacity-100');
    } else {
      slide.classList.remove('opacity-100');
      slide.classList.add('opacity-0');
    }
  });

  // Update dots
  const dots = document.querySelectorAll('.dot');
  dots.forEach((dot, i) => {
    if (i === index) {
      dot.classList.remove('bg-opacity-50');
      dot.classList.add('bg-opacity-100');
    } else {
      dot.classList.remove('bg-opacity-100');
      dot.classList.add('bg-opacity-50');
    }
  });
}

function changeSlide(direction) {
  if (slides.length === 0) return;
  
  currentSlideIndex += direction;

  if (currentSlideIndex >= slides.length) {
    currentSlideIndex = 0;
  } else if (currentSlideIndex < 0) {
    currentSlideIndex = slides.length - 1;
  }

  showSlide(currentSlideIndex);
}

function currentSlide(index) {
  if (slides.length === 0) return;
  
  currentSlideIndex = index - 1;
  showSlide(currentSlideIndex);
}

function autoSlide() {
  if (slides.length === 0) return;
  
  currentSlideIndex++;
  if (currentSlideIndex >= slides.length) {
    currentSlideIndex = 0;
  }
  showSlide(currentSlideIndex);
}

function startAutoSlide() {
  if (slideInterval) clearInterval(slideInterval);
  slideInterval = setInterval(autoSlide, 5000);
}

// Stats animation
function initializeStatsAnimation() {
  const statsSection = document.querySelector('.bg-gradient-to-r');
  if (!statsSection) return;

  const observer = new IntersectionObserver((entries) => {
    entries.forEach(entry => {
      if (entry.isIntersecting) {
        const stats = entry.target.querySelectorAll('h3');
        stats.forEach(stat => {
          const target = parseInt(stat.textContent.replace(/[^\d]/g, ''));
          if (!isNaN(target)) {
            animateCounter(stat, target);
          }
        });
      }
    });
  }, { threshold: 0.5 });

  observer.observe(statsSection);
}

function animateCounter(element, target, duration = 2000) {
  if (element.dataset.animated === 'true') return;
  element.dataset.animated = 'true';
  
  let start = 0;
  const increment = target / (duration / 16);

  const timer = setInterval(() => {
    start += increment;
    if (start >= target) {
      element.textContent = target;
      clearInterval(timer);
    } else {
      element.textContent = Math.floor(start);
    }
  }, 16);
}

// Tab functionality for other pages
function showTab(tabId, event) {
  const tabContents = document.querySelectorAll('.tab-content');
  tabContents.forEach(content => {
    content.classList.add('hidden');
  });

  const targetTab = document.getElementById(tabId);
  if (targetTab) {
    targetTab.classList.remove('hidden');
  }

  const tabButtons = document.querySelectorAll('.tab-button');
  tabButtons.forEach(button => {
    button.classList.remove('bg-primary', 'text-white');
    button.classList.add('bg-gray-200', 'text-gray-700');
  });
  
  if (event && event.target) {
    event.target.classList.remove('bg-gray-200', 'text-gray-700');
    event.target.classList.add('bg-primary', 'text-white');
  }
}

// Product modal functionality
const productDetails = {
  "keripik-singkong": {
    name: "Keripik Singkong",
    price: "Rp 15.000",
    image: "https://placehold.co/400x300/4CAF50/FFFFFF?text=Keripik+Singkong",
    description: "Keripik singkong renyah dengan berbagai varian rasa. Dibuat dari singkong pilihan yang diolah dengan resep tradisional.",
    features: [
      "Terbuat dari singkong segar pilihan",
      "Tersedia dalam berbagai varian rasa",
      "Tanpa pengawet berbahaya",
      "Kemasan higienis dan tahan lama"
    ],
    contact: "Hubungi: 0812-3456-7890"
  }
  // Add other products as needed
};

function showProductDetail(productId) {
  const product = productDetails[productId];
  if (!product) return;

  // Create modal HTML
  const modalHTML = `
    <div id="productModal" class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50 p-4">
      <div class="bg-white rounded-xl max-w-2xl w-full max-h-[90vh] overflow-y-auto">
        <div class="p-6">
          <div class="flex justify-between items-center mb-4">
            <h2 class="text-2xl font-bold text-secondary">${product.name}</h2>
            <button onclick="closeProductModal()" class="text-gray-500 hover:text-gray-700">
              <i class="fas fa-times text-xl"></i>
            </button>
          </div>
          <img src="${product.image}" alt="${product.name}" class="w-full h-64 object-cover rounded-lg mb-4">
          <div class="text-2xl font-bold text-primary mb-4">${product.price}</div>
          <p class="text-gray-600 mb-4">${product.description}</p>
          <h3 class="text-lg font-semibold text-secondary mb-2">Keunggulan Produk:</h3>
          <ul class="list-disc list-inside mb-4 text-gray-600">
            ${product.features.map(feature => `<li>${feature}</li>`).join('')}
          </ul>
          <div class="bg-gray-50 rounded-lg p-4 mb-4">
            <strong class="text-secondary">${product.contact}</strong>
          </div>
          <div class="flex flex-col sm:flex-row gap-3">
            <a href="https://wa.me/6281331931077?text=Halo,%20saya%20tertarik%20dengan%20produk%20${product.name}" 
               target="_blank" 
               class="bg-primary hover:bg-accent text-white px-6 py-3 rounded-lg font-semibold text-center transition-colors duration-300">
              <i class="fab fa-whatsapp mr-2"></i>Pesan via WhatsApp
            </a>
            <button onclick="closeProductModal()" class="bg-gray-200 hover:bg-gray-300 text-gray-700 px-6 py-3 rounded-lg font-semibold transition-colors duration-300">
              Tutup
            </button>
          </div>
        </div>
      </div>
    </div>
  `;

  document.body.insertAdjacentHTML('beforeend', modalHTML);
}

function closeProductModal() {
  const modal = document.getElementById('productModal');
  if (modal) {
    modal.remove();
  }
}

// Smooth scrolling for anchor links
document.querySelectorAll('a[href^="#"]').forEach(anchor => {
  anchor.addEventListener('click', function (e) {
    e.preventDefault();
    const target = document.querySelector(this.getAttribute('href'));
    if (target) {
      target.scrollIntoView({
        behavior: 'smooth',
        block: 'start'
      });
    }
  });
});

// Handle window resize
window.addEventListener('resize', () => {
  const mobileMenu = document.getElementById('mobile-menu');
  const mobileMenuButton = document.getElementById('mobile-menu-button');
  
  if (window.innerWidth >= 1024) { // lg breakpoint
    if (mobileMenu && !mobileMenu.classList.contains('hidden')) {
      mobileMenu.classList.add('hidden');
      if (mobileMenuButton) {
        mobileMenuButton.innerHTML = `
          <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
          </svg>
        `;
      }
    }
  }
});