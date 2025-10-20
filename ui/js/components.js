/**
 * Reusable UI components
 */
class Components {
  /**
   * Modal functionality
   */
  static setupModals() {
    const modals = document.querySelectorAll('.modal');
    
    modals.forEach(modal => {
      const closeBtn = modal.querySelector('.modal-close');
      const overlay = modal.querySelector('.modal-overlay');
      
      // Close modal function
      const closeModal = () => {
        modal.classList.add('hidden');
        document.body.classList.remove('overflow-hidden');
      };
      
      // Open modal function
      const openModal = () => {
        modal.classList.remove('hidden');
        document.body.classList.add('overflow-hidden');
      };
      
      // Close button
      if (closeBtn) {
        closeBtn.addEventListener('click', closeModal);
      }
      
      // Overlay click
      if (overlay) {
        overlay.addEventListener('click', closeModal);
      }
      
      // Escape key
      document.addEventListener('keydown', (e) => {
        if (e.key === 'Escape' && !modal.classList.contains('hidden')) {
          closeModal();
        }
      });
      
      // Store functions for external access
      modal.openModal = openModal;
      modal.closeModal = closeModal;
    });
  }

  /**
   * Tab functionality
   */
  static setupTabs() {
    const tabGroups = document.querySelectorAll('.tab-group');
    
    tabGroups.forEach(group => {
      const buttons = group.querySelectorAll('.tab-button');
      const contents = group.querySelectorAll('.tab-content');
      
      buttons.forEach(button => {
        button.addEventListener('click', (e) => {
          e.preventDefault();
          
          const targetId = button.getAttribute('data-tab');
          
          // Remove active class from all buttons and contents
          buttons.forEach(btn => btn.classList.remove('active'));
          contents.forEach(content => content.classList.remove('active'));
          
          // Add active class to clicked button and corresponding content
          button.classList.add('active');
          const targetContent = group.querySelector(`#${targetId}`);
          if (targetContent) {
            targetContent.classList.add('active');
          }
        });
      });
    });
  }

  /**
   * Lightbox functionality
   */
  static setupLightbox() {
    const lightboxTriggers = document.querySelectorAll('[data-lightbox]');
    let lightbox = document.querySelector('.lightbox');
    
    // Create lightbox if it doesn't exist
    if (!lightbox && lightboxTriggers.length > 0) {
      lightbox = this.createLightbox();
    }
    
    if (!lightbox) return;
    
    const lightboxImg = lightbox.querySelector('#lightbox-img');
    const closeBtn = lightbox.querySelector('.lightbox-close');
    
    // Open lightbox
    lightboxTriggers.forEach(trigger => {
      trigger.addEventListener('click', (e) => {
        e.preventDefault();
        const imgSrc = trigger.getAttribute('data-lightbox') || trigger.src;
        if (lightboxImg) {
          lightboxImg.src = imgSrc;
        }
        lightbox.classList.remove('hidden');
        document.body.classList.add('overflow-hidden');
      });
    });
    
    // Close lightbox
    const closeLightbox = () => {
      lightbox.classList.add('hidden');
      document.body.classList.remove('overflow-hidden');
    };
    
    if (closeBtn) {
      closeBtn.addEventListener('click', closeLightbox);
    }
    
    lightbox.addEventListener('click', (e) => {
      if (e.target === lightbox) {
        closeLightbox();
      }
    });
    
    document.addEventListener('keydown', (e) => {
      if (e.key === 'Escape' && !lightbox.classList.contains('hidden')) {
        closeLightbox();
      }
    });
  }

  /**
   * Create lightbox element
   * @returns {Element} Lightbox element
   */
  static createLightbox() {
    const lightbox = document.createElement('div');
    lightbox.className = 'lightbox fixed inset-0 bg-black bg-opacity-90 flex items-center justify-center z-50 hidden';
    lightbox.innerHTML = `
      <button class="lightbox-close absolute top-4 right-4 text-white text-2xl hover:text-gray-300">
        <i class="fas fa-times"></i>
      </button>
      <img id="lightbox-img" class="max-w-full max-h-full object-contain" alt="Lightbox Image">
    `;
    document.body.appendChild(lightbox);
    return lightbox;
  }

  /**
   * Setup form validation
   */
  static setupFormValidation() {
    const forms = document.querySelectorAll('form[data-validate]');
    
    forms.forEach(form => {
      form.addEventListener('submit', (e) => {
        if (!this.validateForm(form)) {
          e.preventDefault();
        }
      });
      
      // Real-time validation
      const inputs = form.querySelectorAll('input, textarea, select');
      inputs.forEach(input => {
        input.addEventListener('blur', () => {
          this.validateField(input);
        });
      });
    });
  }

  /**
   * Validate form
   * @param {Element} form - Form element
   * @returns {boolean} Is form valid
   */
  static validateForm(form) {
    let isValid = true;
    const inputs = form.querySelectorAll('input, textarea, select');
    
    inputs.forEach(input => {
      if (!this.validateField(input)) {
        isValid = false;
      }
    });
    
    return isValid;
  }

  /**
   * Validate individual field
   * @param {Element} field - Input field
   * @returns {boolean} Is field valid
   */
  static validateField(field) {
    const value = field.value.trim();
    const type = field.type;
    const required = field.hasAttribute('required');
    let isValid = true;
    let message = '';
    
    // Required validation
    if (required && !value) {
      isValid = false;
      message = 'Field ini wajib diisi';
    }
    
    // Email validation
    if (type === 'email' && value) {
      const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
      if (!emailRegex.test(value)) {
        isValid = false;
        message = 'Format email tidak valid';
      }
    }
    
    // Phone validation
    if (field.name === 'phone' && value) {
      const phoneRegex = /^(\+62|62|0)[0-9]{9,13}$/;
      if (!phoneRegex.test(value)) {
        isValid = false;
        message = 'Format nomor telepon tidak valid';
      }
    }
    
    // Show/hide error message
    this.showFieldError(field, isValid ? '' : message);
    
    return isValid;
  }

  /**
   * Show field error message
   * @param {Element} field - Input field
   * @param {string} message - Error message
   */
  static showFieldError(field, message) {
    let errorEl = field.parentNode.querySelector('.field-error');
    
    if (message) {
      if (!errorEl) {
        errorEl = document.createElement('div');
        errorEl.className = 'field-error text-red-500 text-sm mt-1';
        field.parentNode.appendChild(errorEl);
      }
      errorEl.textContent = message;
      field.classList.add('border-red-500');
    } else {
      if (errorEl) {
        errorEl.remove();
      }
      field.classList.remove('border-red-500');
    }
  }
}