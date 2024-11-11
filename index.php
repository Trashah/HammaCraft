<?php

include 'php/functions.php';

session_start();

?>

<!DOCTYPE html>

<html lang = "es">

<head>

    <meta charset="UTF-8">
    <meta name = "viewport" content = "width = device-width, initial-scale = 1">
    <title> HammaCraft </title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link rel="stylesheet" href="css/styles.css">
    <script src = "javascript/script.js" defer> </script>
    <style>
        body {
            background-color: #e5fefe; /* Morado claro */
        }
        .navbar {
            background-color: #fbffff; /* Azul celeste */
        }
    </style>

</head>

<body>

    <?php include 'php/header.php'; ?>

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
                    $category1 = "Todos";
                    $category2 = "Todos";
                    echo getProductsCards($category1, $category2);
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
            <div class="grid-cards">
                <div class="cards">
                    <figure>
                        <img class="card-img" src="images/Adachi.png" alt="Product">
                    </figure>
                    <div class="texts">
                        <h3>Adachi</h3>
                        <div class="rating">★★★★☆</div>
                        <p class="price">$40</p>
                    </div>
                </div>
                <div class="cards">
                    <figure>
                        <img class="card-img" src="images/Angemon.png" alt="Product">
                    </figure>
                    <div class="texts">
                        <h3>Angemon</h3>
                        <div class="rating">★★★★☆</div>
                        <p class="price">$55</p>
                    </div>
                </div>
                <div class="cards">
                    <figure>
                    <img class="card-img" src="images/Foxy.png" alt="Product">
                    </figure>
                    <div class="texts">
                        <h3>Foxy</h3>
                        <div class="rating">★★★★☆</div>
                        <p class="price">$45</p>
                    </div>
                </div>
                <div class="cards">
                    <figure>
                    <img class="card-img" src="images/Farfadox.png" alt="Product">
                    </figure>
                    <div class="texts">
                        <h3>Farfadox</h3>
                        <div class="rating">★★★★☆</div>
                        <p class="price">$40</p>
                    </div>
                </div>
                <div class="cards">
                    <figure>
                    <img class="card-img" src="images/Kirby.png" alt="Product">
                    </figure>
                    <div class="texts">
                        <h3>Kirby</h3>
                        <div class="rating">★★★★☆</div>
                        <p class="price">$15</p>
                    </div>
                </div>
                <div class="cards">
                    <figure>
                    <img class="card-img" src="images/KoroSensei.png" alt="Product">
                    </figure>
                    <div class="texts">
                        <h3>KoroSensei</h3>
                        <div class="rating">★★★★☆</div>
                        <p class="price">$90</p>
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

                    <li><a href="https://www.hammacraft.lat">Pantalla principal</a></li>
                    <li><a href="https://www.hammacraft.lat/php/catalogo.php">Tienda</a></li>
                    <!-- <li><a href="#sobre nosotros">Sobre nosotros</a></li>
                    <li><a href="#ayuda">Ayuda</a></li> -->

                </ul>

            </div>

            <!-- <div class="footer-section">

                <h3> HammaCraft </h3>

                <ul>

                    <li><a href="#company">The Company</a></li>
                    <li><a href="#careers">Careers</a></li>
                    <li><a href="#press">Press</a></li>

                </ul>

            </div>

            
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
