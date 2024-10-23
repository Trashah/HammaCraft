<?php
include '.gitignore/config.php';
?>

<!DOCTYPE html>

<html lang="es">

<head>

    <meta charset = "UTF-8">
    <meta name = "viewport" content = "width=device-width, initial-scale=1.0">
    <title> HammaCraft </title>
    <link rel = "stylesheet" href = "css/stylesHenrry.css">

</head>

<body>

    <header>

        <div class = "logo">

            <img src = "logo hammacraft.png" alt = "Logo de la tienda">

        </div>

        <nav>

            <ul>

                <li><a href="#">Home</a></li>
                <li><a href="#">Sobre nosotros</a></li>
                <li><a href="#">Tienda</a></li>
                <li><a href="#">Contacto</a></li>

            </ul>

        </nav>

        <div class="search-cart">

            <input type="text" placeholder="Buscar...">
            <button>Carrito</button>

        </div>

    </header>

    <!-- Banner principal -->
    <section class = "banner">

        <h1>HammaCraft</h1>
        <button class="shop-btn">Compra ahora</button>

    </section>

    <!-- Productos destacados -->
    <section class="featured-products">

        <h2>Productos Destacados</h2>

        <div class = "product-list">

            <?php
            $featuredProductsCount = 3;
            $sql = "SELECT * FROM productos LIMIT $featuredProductsCount";
            $result = $connection->query($sql);

            while ($row = $result->fetch_assoc()): ?>

                <div class="product">

                    <img src="images/<?php echo $row['Imagen']; ?>" alt="<?php echo htmlspecialchars($row['NombreProducto']); ?>">
                    <h3><?php echo htmlspecialchars($row['NombreProducto']); ?></h3>
                    <p>$<?php echo number_format($row['Precio'], 2); ?></p>

                </div>

            <?php endwhile; ?>

        </div>

    </section>

    <!-- Newsletter -->
    <section class="newsletter">

        <h2>¡Suscribete!</h2>
        <p>Suscríbete para recibir actualizaciones y promociones especiales.</p>
        <input type="email" placeholder="Introduce tu email">
        <button>Subscribe</button>

    </section>


     <!-- Carrusel de productos -->
    <section class="product-carousel">

        <h2>Más productos</h2>
        <div class="carousel">

            <div class="carousel-inner">

                <?php
                $carouselProductCount = 15;
                $sql = "SELECT * FROM productos LIMIT $featuredProductsCount, $carouselProductCount";
                $result = $connection->query($sql);

                while ($row = $result->fetch_assoc()): ?>

                <div class="product">

                    <img src="images/<?php echo $row['Imagen']; ?>" alt="<?php echo htmlspecialchars($row['NombreProducto']); ?>">
                    <h3><?php echo htmlspecialchars($row['NombreProducto']); ?></h3>
                    <p>$<?php echo number_format($row['Precio'], 2); ?></p>

                </div>

                <?php endwhile; ?>

            </div>

        </div>

        <!-- Botones para navegar por el carrusel -->
        <button id="prevBtn">Prev</button>
        <button id="nextBtn">Next</button>

        </section>

        <script>

            document.addEventListener('DOMContentLoaded', () => {
                const carouselInner = document.querySelector('.carousel-inner');
                const products = document.querySelectorAll('.carousel .product');
                const totalSlides = products.length;
                const visibleItems = 3;  // Número de productos visibles al mismo tiempo
                let currentIndex = 0;
    
                // Duplicar los productos para crear el efecto infinito
                const clonedFirstItems = [...products].slice(0, visibleItems).map(item => item.cloneNode(true));
                const clonedLastItems = [...products].slice(-visibleItems).map(item => item.cloneNode(true));
    
                clonedFirstItems.forEach(clone => carouselInner.appendChild(clone));
                clonedLastItems.reverse().forEach(clone => carouselInner.insertBefore(clone, carouselInner.firstChild));
    
                const newTotalSlides = totalSlides + visibleItems * 2;
                carouselInner.style.width = `${(newTotalSlides * 100) / visibleItems}%`;
    
                currentIndex = visibleItems;
                carouselInner.style.transform = `translateX(-${(currentIndex * 100) / visibleItems}%)`;
    
                function showSlide(index) {
                    carouselInner.style.transition = 'transform 0.5s ease-in-out';
                    carouselInner.style.transform = `translateX(-${(index * 100) / visibleItems}%)`;
                }
    
                function nextSlide() {
                    currentIndex++;
                    showSlide(currentIndex);
                    if (currentIndex === totalSlides + visibleItems) {
                        setTimeout(() => {
                            carouselInner.style.transition = 'none';
                            currentIndex = visibleItems;
                            carouselInner.style.transform = `translateX(-${(currentIndex * 100) / visibleItems}%)`;
                        }, 500);
                    }
                }
    
                function prevSlide() {
                    currentIndex--;
                    showSlide(currentIndex);
                    if (currentIndex === 0) {
                        setTimeout(() => {
                            carouselInner.style.transition = 'none';
                            currentIndex = totalSlides;
                            carouselInner.style.transform = `translateX(-${(currentIndex * 100) / visibleItems}%)`;
                        }, 500);
                    }
                }
    
                document.getElementById('nextBtn').addEventListener('click', nextSlide);
                document.getElementById('prevBtn').addEventListener('click', prevSlide);
    
                showSlide(currentIndex);
            });

        </script>

    <!-- Sección "Sobre la tienda" -->
    <section class="about">

        <h2>Sobre nosotros</h2>
        <p>Breve presentación sobre la tienda, tu misión y los productos que ofreces.</p>

    </section>

    <!-- Pie de página -->
    <footer>

        <div class="footer-content">

            <div class="menu">

                <h3>Menu</h3>
                <ul>

                    <li><a href="#">Home</a></li>
                    <li><a href="#">Tienda</a></li>
                    <li><a href="#">Contacto</a></li>

                </ul>

            </div>

            <div class="company">

                <h3>Compañia</h3>
                <ul>

                    <li><a href="#">Sobre nosotros</a></li>
                    <li><a href="#">Privacidad</a></li>

                </ul>

            </div>

            <div class="newsletter-footer">

                <h3>Suscribete</h3>
                <input type="email" placeholder="Introduce tu email">
                <button>Subscribe</button>

            </div>

        </div>

        <p>© 2024 HammaCraft. Todos los derechos reservados.</p>

    </footer>

</body>

</html>

<?php
$connection->close();
?>