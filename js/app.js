/**
 * Main application entry point
 */
class App {
  constructor() {
    this.navigation = null;
    this.slider = null;
    this.animations = null;
    
    this.init();
  }

  /**
   * Initialize application
   */
  init() {
    // Wait for DOM to be ready
    if (document.readyState === 'loading') {
      document.addEventListener('DOMContentLoaded', () => {
        this.start();
      });
    } else {
      this.start();
    }
  }

  /**
   * Start application components
   */
  start() {
    try {
      // Initialize core components
      this.navigation = new Navigation();
      this.animations = new Animations();
      
      // Initialize slider if present
      if (document.querySelector('.hero-slider')) {
        this.slider = new HeroSlider();
      }
      
      // Setup UI components
      Components.setupModals();
      Components.setupTabs();
      Components.setupLightbox();
      Components.setupFormValidation();
      
      // Setup smooth scrolling
      Animations.setupSmoothScrolling();
      
      // Initialize page-specific functionality
      this.initPageSpecific();
      
      console.log('App initialized successfully');
    } catch (error) {
      console.error('Error initializing app:', error);
    }
  }

  /**
   * Initialize page-specific functionality
   */
  initPageSpecific() {
    const currentPage = Utils.getCurrentPage();
    
    switch (currentPage) {
      case 'home.html':
      case 'index.html':
        this.initHomePage();
        break;
      case 'gallery.html':
        this.initGalleryPage();
        break;
      case 'product.html':
        this.initProductPage();
        break;
      // Add more page-specific initializations as needed
    }
  }

  /**
   * Initialize home page specific functionality
   */
  initHomePage() {
    // Home page specific code
    console.log('Home page initialized');
  }

  /**
   * Initialize gallery page specific functionality
   */
  initGalleryPage() {
    // Gallery page specific code
    console.log('Gallery page initialized');
  }

  /**
   * Initialize product page specific functionality
   */
  initProductPage() {
    // Product page specific code
    console.log('Product page initialized');
  }

  /**
   * Destroy application instance
   */
  destroy() {
    if (this.animations) {
      this.animations.destroy();
    }
    
    if (this.slider) {
      this.slider.destroy();
    }
    
    console.log('App destroyed');
  }
}

// Initialize application
const app = new App();

// Make app globally available for debugging
window.app = app;