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
    <link rel="stylesheet" href="css/pedidos_per.css">
    <style>
        body {
            background-color: #e5fefe; /* Morado claro */
        }
        .navbar {
            background-color: #fff; /* Azul celeste */
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
                    $category3 = "Todos";
                    echo getProductsCards($category1, $category2, $category3);
                    ?>

                </div>

                <button class = "carousel-btn next"> &gt; </button>

            </div>
        </section>

    <!--seccion de pedidos personalizados-->
    <div class="pedidos_oc">
    <div class="custom-section">
        <div class="image-container">
            <img class="image-placeholder" src="/images/atractive_hamabeads.png" alt="hamma_beads">
        </div>
        <div class="text-container">
            <p>¡Haz que tus personajes favoritos cobren vida! 🎮🌟 Desde héroes de videojuegos hasta íconos de tus series animadas preferidas, personalizamos tus diseños en Hama Beads para que sean tan únicos como tú. ¡Haz tu pedido ahora y lleva tu pasión al siguiente nivel!</p>
            <div class="button-container">
                <a href="/php/pedidos.php" class="custom-button">Hacer pedido</a>
            </div>
        </div>
    </div>
</div>



        

        <section class="product-grid">
            <h2 align = "center">Productos Mejor Valorados</h2>
            <br><br>
            <div class="grid-cards">
                <div class="cards">
                    <figure>
                        <img class="card-img" src="images/Adachi.png" alt="Product">
                    </figure>
                    <div class="texts">
                        <h3>Adachi</h3>
                        <div class="rating">★★★★★</div>
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

    <?php include "php/footer.php"; ?>
    <script src = "javascript/script.js" defer> </script>
</body>

</html>
