/**
 * Hero Slider functionality
 */
class HeroSlider {
  constructor(selector = '.hero-slider') {
    this.sliderContainer = document.querySelector(selector);
    if (!this.sliderContainer) return;

    this.slides = this.sliderContainer.querySelectorAll('.slide');
    this.dots = this.sliderContainer.querySelectorAll('.dot');
    this.prevBtn = this.sliderContainer.querySelector('.prev-btn');
    this.nextBtn = this.sliderContainer.querySelector('.next-btn');
    
    this.currentSlideIndex = 0;
    this.slideInterval = null;
    this.isAutoPlay = true;
    this.autoPlayDelay = 5000;
    
    if (this.slides.length === 0) return;
    
    this.init();
  }

  /**
   * Initialize slider
   */
  init() {
    this.showSlide(0);
    this.setupControls();
    this.setupAutoPlay();
    this.setupTouchEvents();
  }

  /**
   * Show specific slide
   * @param {number} index - Slide index to show
   */
  showSlide(index) {
    if (index < 0 || index >= this.slides.length) return;

    // Hide all slides
    this.slides.forEach((slide, i) => {
      slide.classList.toggle('active', i === index);
    });

    // Update dots
    this.dots.forEach((dot, i) => {
      dot.classList.toggle('active', i === index);
    });

    this.currentSlideIndex = index;
  }

  /**
   * Go to next slide
   */
  nextSlide() {
    const nextIndex = (this.currentSlideIndex + 1) % this.slides.length;
    this.showSlide(nextIndex);
  }

  /**
   * Go to previous slide
   */
  prevSlide() {
    const prevIndex = this.currentSlideIndex === 0 
      ? this.slides.length - 1 
      : this.currentSlideIndex - 1;
    this.showSlide(prevIndex);
  }

  /**
   * Go to specific slide
   * @param {number} index - Slide index
   */
  goToSlide(index) {
    this.showSlide(index);
  }

  /**
   * Setup slider controls
   */
  setupControls() {
    // Previous button
    if (this.prevBtn) {
      this.prevBtn.addEventListener('click', () => {
        this.prevSlide();
        this.resetAutoPlay();
      });
    }

    // Next button
    if (this.nextBtn) {
      this.nextBtn.addEventListener('click', () => {
        this.nextSlide();
        this.resetAutoPlay();
      });
    }

    // Dots navigation
    this.dots.forEach((dot, index) => {
      dot.addEventListener('click', () => {
        this.goToSlide(index);
        this.resetAutoPlay();
      });
    });

    // Keyboard navigation
    document.addEventListener('keydown', (e) => {
      if (!Utils.isInViewport(this.sliderContainer)) return;
      
      if (e.key === 'ArrowLeft') {
        this.prevSlide();
        this.resetAutoPlay();
      } else if (e.key === 'ArrowRight') {
        this.nextSlide();
        this.resetAutoPlay();
      }
    });
  }

  /**
   * Setup auto-play functionality
   */
  setupAutoPlay() {
    if (!this.isAutoPlay) return;

    this.startAutoPlay();

    // Pause on hover
    this.sliderContainer.addEventListener('mouseenter', () => {
      this.stopAutoPlay();
    });

    this.sliderContainer.addEventListener('mouseleave', () => {
      this.startAutoPlay();
    });

    // Pause when page is not visible
    document.addEventListener('visibilitychange', () => {
      if (document.hidden) {
        this.stopAutoPlay();
      } else {
        this.startAutoPlay();
      }
    });
  }

  /**
   * Start auto-play
   */
  startAutoPlay() {
    this.stopAutoPlay(); // Clear existing interval
    this.slideInterval = setInterval(() => {
      this.nextSlide();
    }, this.autoPlayDelay);
  }

  /**
   * Stop auto-play
   */
  stopAutoPlay() {
    if (this.slideInterval) {
      clearInterval(this.slideInterval);
      this.slideInterval = null;
    }
  }

  /**
   * Reset auto-play timer
   */
  resetAutoPlay() {
    if (this.isAutoPlay) {
      this.startAutoPlay();
    }
  }

  /**
   * Setup touch events for mobile swipe
   */
  setupTouchEvents() {
    let startX = 0;
    let startY = 0;
    let isSwipe = false;

    this.sliderContainer.addEventListener('touchstart', (e) => {
      startX = e.touches[0].clientX;
      startY = e.touches[0].clientY;
      isSwipe = false;
    });

    this.sliderContainer.addEventListener('touchmove', (e) => {
      if (!startX || !startY) return;

      const diffX = Math.abs(e.touches[0].clientX - startX);
      const diffY = Math.abs(e.touches[0].clientY - startY);

      // Determine if it's a horizontal swipe
      if (diffX > diffY && diffX > 50) {
        isSwipe = true;
        e.preventDefault(); // Prevent scrolling
      }
    });

    this.sliderContainer.addEventListener('touchend', (e) => {
      if (!isSwipe || !startX) return;

      const endX = e.changedTouches[0].clientX;
      const diff = startX - endX;

      if (Math.abs(diff) > 50) {
        if (diff > 0) {
          this.nextSlide();
        } else {
          this.prevSlide();
        }
        this.resetAutoPlay();
      }

      startX = 0;
      startY = 0;
      isSwipe = false;
    });
  }

  /**
   * Destroy slider instance
   */
  destroy() {
    this.stopAutoPlay();
    // Remove event listeners if needed
  }
}