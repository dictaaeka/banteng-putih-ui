/**
 * Navigation functionality
 */
class Navigation {
  constructor() {
    this.mobileMenuButton = document.getElementById('mobile-menu-button');
    this.mobileMenu = document.getElementById('mobile-menu');
    this.mobileMenuClose = document.getElementById('mobile-menu-close');
    this.mobileMenuOverlay = document.getElementById('mobile-menu-overlay');
    this.navbar = document.getElementById('navbar');
    
    this.isMenuOpen = false;
    this.scrollPosition = 0;
    
    this.init();
  }

  /**
   * Initialize navigation functionality
   */
  init() {
    this.setupMobileMenu();
    this.setupNavbarScroll();
    this.setupActiveNavigation();
    this.setupDropdowns();
    this.setupKeyboardNavigation();
    this.setupResizeHandler();
    this.initializeMobileMenuStyles();
  }

  /**
   * Initialize mobile menu styles for animations
   */
  initializeMobileMenuStyles() {
    if (this.mobileMenu) {
      // Set initial transform for slide animation
      this.mobileMenu.style.transform = 'translateX(-100%)';
      this.mobileMenu.style.transition = 'transform 0.3s ease-in-out, opacity 0.3s ease-in-out';
      // Ensure menu is positioned fixed and covers full screen
      this.mobileMenu.style.position = 'fixed';
      this.mobileMenu.style.top = '0';
      this.mobileMenu.style.left = '0';
      this.mobileMenu.style.width = '100%';
      this.mobileMenu.style.height = '100vh';
      this.mobileMenu.style.zIndex = '9999';
    }
  }

  /**
   * Setup mobile menu functionality
   */
  setupMobileMenu() {
    if (!this.mobileMenuButton || !this.mobileMenu) return;

    // Mobile menu button click
    this.mobileMenuButton.addEventListener('click', (e) => {
      e.preventDefault();
      e.stopPropagation();
      this.toggleMobileMenu();
    });

    // Close button click
    if (this.mobileMenuClose) {
      this.mobileMenuClose.addEventListener('click', (e) => {
        e.preventDefault();
        e.stopPropagation();
        this.closeMobileMenu();
      });
    }

    // Overlay click
    if (this.mobileMenuOverlay) {
      this.mobileMenuOverlay.addEventListener('click', (e) => {
        e.preventDefault();
        e.stopPropagation();
        this.closeMobileMenu();
      });
    }

    // Close menu when clicking on links (but not dropdown buttons)
    const mobileLinks = document.querySelectorAll('#mobile-menu a[href]:not(.mobile-dropdown-btn)');
    mobileLinks.forEach(link => {
      link.addEventListener('click', () => {
        this.closeMobileMenu();
      });
    });
  }

  /**
   * Toggle mobile menu
   */
  toggleMobileMenu() {
    if (this.isMenuOpen) {
      this.closeMobileMenu();
    } else {
      this.openMobileMenu();
    }
  }

  /**
   * Open mobile menu with animation
   */
  openMobileMenu() {
    if (this.isMenuOpen) return;
    
    this.isMenuOpen = true;

    // Store current scroll position
    this.scrollPosition = window.pageYOffset || document.documentElement.scrollTop;
    
    // Prevent body scrolling but keep visual position
    document.body.style.position = 'fixed';
    document.body.style.top = `-${this.scrollPosition}px`;
    document.body.style.left = '0';
    document.body.style.right = '0';
    document.body.style.overflow = 'hidden';

    // Ensure menu is positioned correctly (fixed to viewport, not affected by scroll)
    this.mobileMenu.style.position = 'fixed';
    this.mobileMenu.style.top = '0';
    this.mobileMenu.style.left = '0';
    this.mobileMenu.style.width = '100%';
    this.mobileMenu.style.height = '100vh';
    this.mobileMenu.style.zIndex = '9999';
    
    // Show menu with slide animation
    this.mobileMenu.classList.remove('hidden');
    this.mobileMenu.classList.add('block');
    
    // Reset transform to ensure it starts from the left
    this.mobileMenu.style.transform = 'translateX(-100%)';
    this.mobileMenu.style.opacity = '0';
    
    // Force reflow
    this.mobileMenu.offsetHeight;
    
    // Animate in
    requestAnimationFrame(() => {
      this.mobileMenu.style.transform = 'translateX(0)';
      this.mobileMenu.style.opacity = '1';
    });
  }

  /**
   * Close mobile menu with animation
   */
  closeMobileMenu() {
    if (!this.isMenuOpen) return;
    
    this.isMenuOpen = false;

    // Animate out
    this.mobileMenu.style.transform = 'translateX(-100%)';
    this.mobileMenu.style.opacity = '0';

    // Hide menu after animation completes
    setTimeout(() => {
      this.mobileMenu.classList.remove('block');
      this.mobileMenu.classList.add('hidden');
      
      // Restore body scrolling and scroll position
      document.body.style.position = '';
      document.body.style.top = '';
      document.body.style.left = '';
      document.body.style.right = '';
      document.body.style.overflow = '';
      
      // Restore scroll position smoothly
      window.scrollTo({
        top: this.scrollPosition,
        left: 0,
        behavior: 'instant'
      });
    }, 300); // Match transition duration
  }

  /**
   * Setup navbar scroll effect
   */
  setupNavbarScroll() {
    if (!this.navbar) return;

    const handleScroll = Utils.throttle(() => {
      if (window.scrollY > 50) {
        this.navbar.classList.add('bg-white', 'bg-opacity-95', 'backdrop-blur-sm');
      } else {
        this.navbar.classList.remove('bg-opacity-95', 'backdrop-blur-sm');
      }
    }, 16);

    window.addEventListener('scroll', handleScroll);
  }

  /**
   * Set active navigation based on current page
   */
  setupActiveNavigation() {
    const currentPage = Utils.getCurrentPage();
    const navLinks = document.querySelectorAll('a[href]');
    
    navLinks.forEach(link => {
      const href = link.getAttribute('href');
      if (href === currentPage || (currentPage === 'home.html' && href === 'index.html')) {
        link.classList.add('active');
        // Add active state to parent dropdown if applicable
        const dropdown = link.closest('.nav-dropdown');
        if (dropdown) {
          const dropdownToggle = dropdown.querySelector('.dropdown-toggle');
          if (dropdownToggle) {
            dropdownToggle.classList.add('active');
          }
        }
      }
    });
  }

  /**
   * Setup dropdown functionality
   */
  setupDropdowns() {
    const mobileDropdowns = document.querySelectorAll('.mobile-dropdown');
    
    mobileDropdowns.forEach(dropdown => {
      const button = dropdown.querySelector('.mobile-dropdown-btn');
      const content = dropdown.querySelector('.mobile-dropdown-content');
      const icon = button?.querySelector('.fa-chevron-down');
      
      if (button && content && icon) {
        // Initialize dropdown styles
        content.style.maxHeight = '0';
        content.style.overflow = 'hidden';
        content.style.transition = 'max-height 0.3s ease-in-out, opacity 0.3s ease-in-out';
        content.style.opacity = '0';
        
        button.addEventListener('click', (e) => {
          e.preventDefault();
          e.stopPropagation();
          
          const isOpen = content.style.maxHeight !== '0px' && content.style.maxHeight !== '';
          
          // Close all other dropdowns
          this.closeAllDropdowns(dropdown);
          
          // Toggle current dropdown with animation
          if (!isOpen) {
            // Open dropdown
            content.classList.remove('hidden');
            content.classList.add('block');
            
            // Calculate natural height
            content.style.maxHeight = 'none';
            const height = content.scrollHeight;
            content.style.maxHeight = '0';
            
            // Force reflow
            content.offsetHeight;
            
            // Animate to full height
            requestAnimationFrame(() => {
              content.style.maxHeight = height + 'px';
              content.style.opacity = '1';
              icon.style.transform = 'rotate(180deg)';
            });
          } else {
            // Close dropdown
            content.style.maxHeight = '0';
            content.style.opacity = '0';
            icon.style.transform = 'rotate(0deg)';
            
            setTimeout(() => {
              content.classList.remove('block');
              content.classList.add('hidden');
            }, 300);
          }
        });
      }
    });
  }

  /**
   * Close all mobile dropdowns except the specified one
   * @param {Element} except - Dropdown to exclude from closing
   */
  closeAllDropdowns(except = null) {
    const mobileDropdowns = document.querySelectorAll('.mobile-dropdown');
    
    mobileDropdowns.forEach(dropdown => {
      if (dropdown !== except) {
        const content = dropdown.querySelector('.mobile-dropdown-content');
        const icon = dropdown.querySelector('.fa-chevron-down');
        if (content && icon) {
          content.style.maxHeight = '0';
          content.style.opacity = '0';
          icon.style.transform = 'rotate(0deg)';
          
          setTimeout(() => {
            content.classList.remove('block');
            content.classList.add('hidden');
          }, 300);
        }
      }
    });
  }

  /**
   * Setup keyboard navigation
   */
  setupKeyboardNavigation() {
    document.addEventListener('keydown', (e) => {
      if (e.key === 'Escape' && this.isMenuOpen) {
        this.closeMobileMenu();
      }
    });
  }

  /**
   * Setup resize handler
   */
  setupResizeHandler() {
    const handleResize = Utils.debounce(() => {
      if (window.innerWidth >= 1024 && this.isMenuOpen) {
        this.closeMobileMenu();
      }
    }, 250);

    window.addEventListener('resize', handleResize);
  }
}