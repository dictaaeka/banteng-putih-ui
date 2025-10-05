/**
 * Utility functions
 */
class Utils {
  /**
   * Debounce function to limit function calls
   * @param {Function} func - Function to debounce
   * @param {number} wait - Wait time in milliseconds
   * @param {boolean} immediate - Execute immediately
   */
  static debounce(func, wait, immediate) {
    let timeout;
    return function executedFunction(...args) {
      const later = () => {
        timeout = null;
        if (!immediate) func(...args);
      };
      const callNow = immediate && !timeout;
      clearTimeout(timeout);
      timeout = setTimeout(later, wait);
      if (callNow) func(...args);
    };
  }

  /**
   * Throttle function to limit function calls
   * @param {Function} func - Function to throttle
   * @param {number} limit - Time limit in milliseconds
   */
  static throttle(func, limit) {
    let inThrottle;
    return function(...args) {
      if (!inThrottle) {
        func.apply(this, args);
        inThrottle = true;
        setTimeout(() => inThrottle = false, limit);
      }
    };
  }

  /**
   * Get current page name from URL
   * @returns {string} Current page name
   */
  static getCurrentPage() {
    return window.location.pathname.split('/').pop() || 'home.html';
  }

  /**
   * Check if element is in viewport
   * @param {Element} element - Element to check
   * @returns {boolean} Is element in viewport
   */
  static isInViewport(element) {
    const rect = element.getBoundingClientRect();
    return (
      rect.top >= 0 &&
      rect.left >= 0 &&
      rect.bottom <= (window.innerHeight || document.documentElement.clientHeight) &&
      rect.right <= (window.innerWidth || document.documentElement.clientWidth)
    );
  }

  /**
   * Animate counter from 0 to target value
   * @param {Element} element - Element to animate
   * @param {number} target - Target number
   * @param {number} duration - Animation duration in ms
   */
  static animateCounter(element, target, duration = 2000) {
    if (element.dataset.animated === 'true') return;
    element.dataset.animated = 'true';
    
    let start = 0;
    const increment = target / (duration / 16);
    const startTime = performance.now();

    const animate = (currentTime) => {
      const elapsed = currentTime - startTime;
      const progress = Math.min(elapsed / duration, 1);
      
      start = target * this.easeOutQuart(progress);
      element.textContent = Math.floor(start).toLocaleString();
      
      if (progress < 1) {
        requestAnimationFrame(animate);
      } else {
        element.textContent = target.toLocaleString();
      }
    };

    requestAnimationFrame(animate);
  }

  /**
   * Easing function for smooth animations
   * @param {number} t - Time parameter (0-1)
   * @returns {number} Eased value
   */
  static easeOutQuart(t) {
    return 1 - (--t) * t * t * t;
  }
}