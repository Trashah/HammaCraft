<?php

include '../../.gitignore/config.php';
include '../../php/functions.php';

?>

<!DOCTYPE html>

<html lang="es">

<head>
	
    <meta charset="utf-8">
	<meta name = "viewport" content="width=device-width, initial-scale=1">
	<title> HammaCraft </title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link rel="stylesheet" href="../../css/styles.css">
    <script src = "../../javascript/script.js" defer> </script>
    <style>
        body {
            background-color: #e5fefe; /* Morado claro */
        }
        .navbar {
            background-color: #fbffff; /* Azul celeste */
        }
    </style>

</head>

<body class = "body-hammacraft">

    <header class = "header-hammacraft">

        <nav class = "nav-hammacraft">

            <div>

                <a href = "https://www.hammacraft.lat/">
                <img class = "logo-item" src="../../images/logo.png" alt="Logo"> 
                </a>

            </div>

            <div class = "search-bar-hammacraft">

                <input type = "text" placeholder = "Buscar...">

            </div>

            <div class = "nav-hammacraft-links">

                <a href="https://www.hammacraft.lat/">Pantalla principal</a>
                <a href="https://www.hammacraft.lat/php/catalogo.php">Catálogo</a>
                <a href="https://www.hammacraft.lat/php/pedidos.php">Pedidos</a>


                <button class = "btn btn-dark">
                    <i class="fas fa-shopping-cart"></i> Carrito
                </button>
                <a href="https://www.hammacraft.lat/php/login.php">
                    <button class = "btn btn-dark">
                        <i class="fa-solid fa-user"></i> Iniciar sesión
                    </button>
                </a>

            </div>

        </nav>

    </header>

    <main>

        <div>
            <form class="menu-catalogo">
                <select onchange="this.options[this.selectedIndex].value && (window.location = this.options[this.selectedIndex].value);">
                    <option value="">Seleccione una opción...</option>
                    <option value="https://www.hammacraft.lat/php/catalogo.php">Todos</option>
                    <option value="https://www.hammacraft.lat/php/catalogos_especificos/catalogo_chicos.php">Chicos</option>
                    <option value="https://www.hammacraft.lat/php/catalogos_especificos/catalogo_medianos.php">Medianos</option>
                    <option value="https://www.hammacraft.lat/php/catalogos_especificos/catalogo_grandes.php">Grandes</option>
                    <option value="https://www.hammacraft.lat/php/catalogos_especificos/catalogo_anime.php">Anime</option>
                    <option value="https://www.hammacraft.lat/php/catalogos_especificos/catalogo_videojuegos.php">Videojuegos</option>
                </select>
            </form>
        </div>

        <div class = "catalogo">

            <?php
                $category1 = "Todos"; //Todos, Chicos, Medianos, Grandes
                $category2 = "Anime"; //Todos, Anime, Videojuegos
                echo getProductsCards($connection, $category1, $category2);
            ?>

        </div>

    </main>

<footer>

        <div class="footer-content">

            <div class="footer-section">

                <h3>MENU</h3>

                <ul>

                    <li><a href="https://www.hammacraft.lat">Pantalla principal</a></li>
                    <li><a href="https://www.hammacraft.lat/php/catalogo.php">Tienda</a></li>

                </ul>

            </div>

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

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>
</html>