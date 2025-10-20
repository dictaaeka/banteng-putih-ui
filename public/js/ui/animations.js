/**
 * Animation utilities and effects
 */
class Animations {
  constructor() {
    this.observers = [];
    this.init();
  }

  /**
   * Initialize animations
   */
  init() {
    this.setupScrollAnimations();
    this.setupStatsAnimation();
  }

  /**
   * Setup scroll-based animations
   */
  setupScrollAnimations() {
    const observerOptions = {
      threshold: 0.1,
      rootMargin: '0px 0px -50px 0px'
    };

    // Fade in animation observer
    const fadeInObserver = new IntersectionObserver((entries) => {
      entries.forEach(entry => {
        if (entry.isIntersecting) {
          entry.target.classList.add('animate-fade-in');
          fadeInObserver.unobserve(entry.target);
        }
      });
    }, observerOptions);

    // Slide up animation observer
    const slideUpObserver = new IntersectionObserver((entries) => {
      entries.forEach(entry => {
        if (entry.isIntersecting) {
          entry.target.classList.add('animate-slide-up');
          slideUpObserver.unobserve(entry.target);
        }
      });
    }, observerOptions);

    // Apply to elements with animation classes
    document.querySelectorAll('.fade-in-on-scroll').forEach(el => {
      fadeInObserver.observe(el);
    });

    document.querySelectorAll('.slide-up-on-scroll').forEach(el => {
      slideUpObserver.observe(el);
    });

    this.observers.push(fadeInObserver, slideUpObserver);
  }

  /**
   * Setup stats counter animation
   */
  setupStatsAnimation() {
    const statsSection = document.querySelector('.bg-gradient-to-r');
    if (!statsSection) return;

    const statsObserver = new IntersectionObserver((entries) => {
      entries.forEach(entry => {
        if (entry.isIntersecting) {
          this.animateStats();
          statsObserver.unobserve(entry.target);
        }
      });
    }, { threshold: 0.5 });

    statsObserver.observe(statsSection);
    this.observers.push(statsObserver);
  }

  /**
   * Animate statistics counters
   */
  animateStats() {
    const statNumbers = document.querySelectorAll('.stat-number');
    
    statNumbers.forEach((element, index) => {
      const target = parseInt(element.dataset.target || element.textContent.replace(/\D/g, ''));
      
      setTimeout(() => {
        Utils.animateCounter(element, target, 2000);
      }, index * 200); // Stagger animation
    });
  }

  /**
   * Smooth scroll to element
   * @param {string} selector - CSS selector for target element
   * @param {number} offset - Offset from top in pixels
   */
  static smoothScrollTo(selector, offset = 80) {
    const element = document.querySelector(selector);
    if (!element) return;

    const elementPosition = element.getBoundingClientRect().top;
    const offsetPosition = elementPosition + window.pageYOffset - offset;

    window.scrollTo({
      top: offsetPosition,
      behavior: 'smooth'
    });
  }

  /**
   * Setup smooth scrolling for anchor links
   */
  static setupSmoothScrolling() {
    document.querySelectorAll('a[href^="#"]').forEach(anchor => {
      anchor.addEventListener('click', function (e) {
        e.preventDefault();
        const targetId = this.getAttribute('href');
        if (targetId === '#') return;
        
        Animations.smoothScrollTo(targetId);
      });
    });
  }

  /**
   * Destroy all observers
   */
  destroy() {
    this.observers.forEach(observer => observer.disconnect());
    this.observers = [];
  }
}