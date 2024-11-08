class Carousel {
    constructor() {
        this.track = document.querySelector('.carousel-track');
        this.slides = Array.from(this.track.children);
        this.nextButton = document.querySelector('.next');
        this.prevButton = document.querySelector('.prev');
        this.currentIndex = 0;
        this.autoSlideInterval = 3000; // 3 segundos para el cambio automático
        this.intervalId = null; // Para almacenar el ID del intervalo

        // Initialize carousel properties
        this.updateSlideDimensions();
        this.initializeCarousel();
        this.addEventListeners();
        this.startAutoSlide(); // Iniciar la reproducción automática
    }

    updateSlideDimensions() {
        this.slideWidth = this.slides[0].getBoundingClientRect().width;
        this.slidesToShow = Math.floor(window.innerWidth / this.slideWidth);
    }

    initializeCarousel() {
        this.slides.forEach((slide, index) => {
            slide.style.left = `${this.slideWidth * index}px`;
        });
    }

    moveToSlide(targetIndex) {
        // Hacer que el carrusel sea infinito
        if (targetIndex < 0) {
            this.currentIndex = this.slides.length - this.slidesToShow;
            this.track.style.transform = `translateX(-${this.currentIndex * this.slideWidth}px)`;
        } else if (targetIndex > this.slides.length - this.slidesToShow) {
            this.currentIndex = 0;
            this.track.style.transform = `translateX(0px)`;
        } else {
            this.track.style.transform = `translateX(-${targetIndex * this.slideWidth}px)`;
            this.currentIndex = targetIndex;
        }

        this.updateButtonsState();
    }

    updateButtonsState() {
        this.prevButton.style.display = this.currentIndex <= 0 ? 'none' : 'block';
        this.nextButton.style.display =
            this.currentIndex >= this.slides.length - this.slidesToShow ? 'none' : 'block';
    }

    addEventListeners() {
        this.nextButton.addEventListener('click', () => {
            this.moveToSlide(this.currentIndex + 1);
            this.resetAutoSlide(); // Reiniciar el intervalo si se hace clic
        });
        this.prevButton.addEventListener('click', () => {
            this.moveToSlide(this.currentIndex - 1);
            this.resetAutoSlide(); // Reiniciar el intervalo si se hace clic
        });

        window.addEventListener('resize', () => this.handleResize());
    }

    handleResize() {
        this.updateSlideDimensions(); // Actualizar ancho del slide y número de slides visibles

        // Reposicionar slides
        this.slides.forEach((slide, index) => {
            slide.style.left = `${this.slideWidth * index}px`;
        });

        // Ajustar índice actual si es necesario
        if (this.currentIndex > this.slides.length - this.slidesToShow) {
            this.currentIndex = this.slides.length - this.slidesToShow;
        }

        this.moveToSlide(this.currentIndex); // Mover a la posición actualizada
    }

    startAutoSlide() {
        this.intervalId = setInterval(() => {
            this.moveToSlide(this.currentIndex + 1);
        }, this.autoSlideInterval);
    }

    resetAutoSlide() {
        clearInterval(this.intervalId);
        this.startAutoSlide();
    }
}

// Initialize the carousel after the DOM has loaded
document.addEventListener('DOMContentLoaded', () => {
    const carousel = new Carousel();
});

// Newsletter form handling
class Newsletter {
    constructor() {
        this.form = document.querySelector('.newsletter-form');
        this.emailInput = this.form.querySelector('input[type="email"]');
        this.initializeForm();
    }

    initializeForm() {
        this.form.addEventListener('submit', (e) => {
            e.preventDefault();
            if (this.validateEmail(this.emailInput.value)) {
                this.submitForm();
            } else {
                this.showError('Please enter a valid email address');
            }
        });
    }

    validateEmail(email) {
        const re = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        return re.test(email);
    }

    showError(message) {
        const errorDiv = document.createElement('div');
        errorDiv.className = 'error-message';
        errorDiv.textContent = message;
        
        // Remove any existing error messages
        const existingError = this.form.querySelector('.error-message');
        if (existingError) existingError.remove();
        
        this.form.appendChild(errorDiv);
        setTimeout(() => errorDiv.remove(), 3000);
    }

    submitForm() {
        // Here you would typically send the data to your backend
        console.log('Newsletter subscription for:', this.emailInput.value);
        this.emailInput.value = '';
        this.showSuccess('Thank you for subscribing!');
    }

    showSuccess(message) {
        const successDiv = document.createElement('div');
        successDiv.className = 'success-message';
        successDiv.textContent = message;
        
        this.form.appendChild(successDiv);
        setTimeout(() => successDiv.remove(), 3000);
    }
}

// Shopping cart functionality
class ShoppingCart {
    constructor() {
        this.cartBtn = document.querySelector('.cart-btn');
        this.cartItems = [];
        this.initializeCart();
    }

    initializeCart() {
        this.cartBtn.addEventListener('click', () => this.toggleCart());
    }

    toggleCart() {
        // Implement cart modal/sidebar logic here
        console.log('Cart items:', this.cartItems);
    }

    addToCart(product) {
        this.cartItems.push(product);
        this.updateCartDisplay();
    }

    updateCartDisplay() {
        // Update cart icon/counter
        this.cartBtn.setAttribute('data-count', this.cartItems.length);
    }
}

// Initialize everything when DOM is loaded
document.addEventListener('DOMContentLoaded', () => {
    const carousel = new Carousel();
    const newsletter = new Newsletter();
    const cart = new ShoppingCart();
});