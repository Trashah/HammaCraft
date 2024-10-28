<?php

include '.gitignore/config.php';
include 'php/functions.php';

?>

<!DOCTYPE html>

<html lang = "es">

<head>

    <meta charset="UTF-8">
    <meta name = "viewport" content = "width = device-width, initial-scale = 1">
    <title> HammaCraft </title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/styles.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <script src = "javascript/script.js" defer> </script>

</head>

<body>

    <header class = "header-hammacraft">

        <nav class = "nav-hammacraft">

                <a href = "https://www.hammacraft.lat/">
                <img class = "logo-item" src="../images/logo.png" alt="Logo"> 
                </a>

            <div class = "search-bar-hammacraft">

                <input type = "text" placeholder = "Search...">

            </div>

            <div class = "nav-hammacraft-links">

                <a href="https://www.hammacraft.lat/">Pantalla principal</a>
                <a href="https://www.hammacraft.lat/php/catalogo.php">Catálogo</a>

                <button class = "cart-btn-hammacraft">

                    <i class="fas fa-shopping-cart"></i> Cart

                </button>

            </div>

        </nav>

    </header>

    <main>

        <section class = "hero">

            <a href = "https://www.hammacraft.lat/php/catalogo.php">
            <button class = "shop-now">¡Compra ya!</button>
            </a>

        </section>

        <section class = "featured-products">

            <br><br>
            <h2 align = "center">Productos Destacados</h2>

            <div class = "carousel-container">

                <button class = "carousel-btn prev"> &lt; </button>

                <div class = "carousel-track">

                    <?php
                    $lowerLimit = 0;
                    $rowCount = 20;
                    $category = "Todos";
                    echo getProductsCards($connection, $category, $lowerLimit, $rowCount, '', 'card' ,'card-img-top', 'btn btn-primary');
                    ?>

                </div>

                <button class = "carousel-btn next"> &gt; </button>

            </div>

        </section>

        <section class="newsletter">

            <h2> Newsletter </h2>
            <p> Mantente al día con nuestras promociones </p>

            <form class="newsletter-form">

                <input type = "email" placeholder = "Tu correo electronico">
                <button type = "submit"> Súscribete </button>

            </form>

        </section>

        <section class="product-grid">

            <div class="grid-item">

                <img class="card-img" src="images/elbicho.jpg" alt="Product">
                <div class="texts">
                    <h3>EL BICHO XD</h3>
                    <div class="rating">★★★★☆</div>
                    <p class="price">$199</p>
                </div>

            </div>

            <div class="grid-cards">
                <div class="cards">
                    <img class="card-img" src="images/elbicho.jpg" alt="Product">
                    <div class="texts">
                        <h3>EL BICHO XD</h3>
                        <div class="rating">★★★★☆</div>
                        <p class="price">$199</p>
                    </div>
                </div>
                <div class="cards">
                    <img class="card-img" src="images/elbicho.jpg" alt="Product">
                    <div class="texts">
                        <h3>EL BICHO XD</h3>
                        <div class="rating">★★★★☆</div>
                        <p class="price">$199</p>
                    </div>
                </div>
                <div class="cards">
                    <img class="card-img" src="images/elbicho.jpg" alt="Product">
                    <div class="texts">
                        <h3>EL BICHO XD</h3>
                        <div class="rating">★★★★☆</div>
                        <p class="price">$199</p>
                    </div>
                </div>
                <div class="cards">
                    <img class="card-img" src="images/elbicho.jpg" alt="Product">
                    <div class="texts">
                        <h3>EL BICHO XD</h3>
                        <div class="rating">★★★★☆</div>
                        <p class="price">$199</p>
                    </div>
                </div>
                <div class="cards">
                    <img class="card-img" src="images/elbicho.jpg" alt="Product">
                    <div class="texts">
                        <h3>EL BICHO XD</h3>
                        <div class="rating">★★★★☆</div>
                        <p class="price">$199</p>
                    </div>
                </div>
                <div class="cards">
                    <img class="card-img" src="images/elbicho.jpg" alt="Product">
                    <div class="texts">
                        <h3>EL BICHO XD</h3>
                        <div class="rating">★★★★☆</div>
                        <p class="price">$199</p>
                    </div>
                </div>
            </div>
            
        </section>


        <!--
        <section class="about-shop">

            <h2>About Your Shop</h2>
            <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam.</p>

        </section>
        -->

    </main>

    <footer>

        <div class="footer-content">

            <div class="footer-section">

                <h3>MENU</h3>

                <ul>

                    <li><a href="#pantalla principal">Pantalla principal</a></li>
                    <li><a href="#sobre nosotros">Sobre nosotros</a></li>
                    <li><a href="#tienda">Tienda</a></li>
                    <li><a href="#ayuda">Ayuda</a></li>

                </ul>

            </div>

            <div class="footer-section">

                <h3> HammaCraft </h3>

                <ul>

                    <li><a href="#company">The Company</a></li>
                    <li><a href="#careers">Careers</a></li>
                    <li><a href="#press">Press</a></li>

                </ul>

            </div>

            <!--
            <div class="footer-section">

                <h3>CONÉCTATE</h3>

                <ul>

                    <li><a href="#news">Noticias</a></li>
                    <li><a href="#social">Redes Sociales</a></li>

                </ul>

            </div>
            -->

            <div class="footer-section">

                <h3>Siguenos</h3>

                <ul>

                    <li><a href="#facebook">Facebook</a></li>
                    <li><a href="#twitter">Twitter</a></li>
                    <li><a href="#instagram">Instagram</a></li>

                </ul>

            </div>

        </div>

    </footer>

</body>

</html>
