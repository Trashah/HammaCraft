class Carousel {
    constructor() {
        this.track = document.querySelector('.carousel-track');
        this.slides = Array.from(this.track.children);
        this.nextButton = document.querySelector('.next');
        this.prevButton = document.querySelector('.prev');
        this.currentIndex = 1; // Empezamos en 1 por el slide clonado
        this.autoSlideInterval = 3000; // 3 segundos para el cambio automático
        this.intervalId = null; // Para almacenar el ID del intervalo

        // Clonar slides
        this.cloneSlides();
        this.updateSlideDimensions();
        this.initializeCarousel();
        this.addEventListeners();
        this.startAutoSlide(); // Iniciar la reproducción automática
    }

    cloneSlides() {
        const firstSlide = this.slides[0];
        const lastSlide = this.slides[this.slides.length - 1];

        // Clonamos el primer y último slide
        const firstClone = firstSlide.cloneNode(true);
        const lastClone = lastSlide.cloneNode(true);

        // Añadimos clones al track
        this.track.appendChild(firstClone);
        this.track.insertBefore(lastClone, firstSlide);

        // Actualizamos la lista de slides
        this.slides = Array.from(this.track.children);
    }

    updateSlideDimensions() {
        this.slideWidth = this.slides[0].getBoundingClientRect().width;
        this.slidesToShow = Math.floor(window.innerWidth / this.slideWidth);
    }

    initializeCarousel() {
        this.slides.forEach((slide, index) => {
            slide.style.left = `${this.slideWidth * index}px`;
        });

        // Mover el track al primer slide original (posición inicial)
        this.track.style.transform = `translateX(-${this.slideWidth}px)`;
    }

    moveToSlide(targetIndex) {
        this.track.style.transition = 'transform 0.5s ease-in-out';
        this.track.style.transform = `translateX(-${targetIndex * this.slideWidth}px)`;
        this.currentIndex = targetIndex;

        // Esperar a que termine la animación para ajustar el índice si es necesario
        this.track.addEventListener('transitionend', () => {
            if (this.currentIndex === 0) {
                // Estamos en el clon del último slide, saltamos al último slide original
                this.track.style.transition = 'none';
                this.currentIndex = this.slides.length - 2;
                this.track.style.transform = `translateX(-${this.currentIndex * this.slideWidth}px)`;
            }

            if (this.currentIndex === this.slides.length - 1) {
                // Estamos en el clon del primer slide, saltamos al primer slide original
                this.track.style.transition = 'none';
                this.currentIndex = 1;
                this.track.style.transform = `translateX(-${this.currentIndex * this.slideWidth}px)`;
            }
        });
    }

    addEventListeners() {
        this.nextButton.addEventListener('click', () => {
            this.moveToSlide(this.currentIndex + 1);
            this.resetAutoSlide();
        });
        this.prevButton.addEventListener('click', () => {
            this.moveToSlide(this.currentIndex - 1);
            this.resetAutoSlide();
        });

        window.addEventListener('resize', () => this.handleResize());
    }

    handleResize() {
        this.updateSlideDimensions();
        this.slides.forEach((slide, index) => {
            slide.style.left = `${this.slideWidth * index}px`;
        });

        // Mover a la posición actualizada
        this.track.style.transform = `translateX(-${this.currentIndex * this.slideWidth}px)`;
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

//control de las paginas activas
 // Obtener todos los enlaces del menú
/*  const links = document.querySelectorAll('.option-header');
    
    // Comparar la URL actual con los enlaces
    links.forEach(link => {
        if (link.href === window.location.href) {
            link.classList.add('active');
        }
    });*/

//Toggle visibilidad contraseña

const togglePassword =
              document.querySelector('#togglePassword');
 
        const password = 
              document.querySelector('#id_password');
 
        togglePassword.
        addEventListener('click', function (e) {
 
            // Toggle the type attribute 
            const type = password.getAttribute(
                'type') === 'password' ? 'text' : 'password';
            password.setAttribute('type', type);
 
            // Toggle the eye slash icon 
            if (togglePassword.src.match("/images/eyeslash.png")) {
                togglePassword.src ="/images/eye.png";
            } 
            else {
                togglePassword.src ="/images/eyeslash.png";
            }
        });