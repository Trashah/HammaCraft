<?php

include '../../php/functions.php';

session_start();

?>

<!DOCTYPE html>

<html lang="es">

<head>
	
    <meta charset="utf-8">
	<meta name = "viewport" content="width=device-width, initial-scale=1">
	<title> HammaCraft - Catálogo: Videojuegos </title>
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

    <?php include '../header.php'; ?>

    <main>
        <br>
        <br>
        <div>
            <form class="menu-catalogo">
                <select onchange="this.options[this.selectedIndex].value && (window.location = this.options[this.selectedIndex].value);"  class="menu_catalogo">
                    <option value="/php/catalogo.php">Todos</option>
                    <option value="/php/catalogos_especificos/catalogo_chicos.php">Chicos</option>
                    <option value="/php/catalogos_especificos/catalogo_medianos.php">Medianos</option>
                    <option value="/php/catalogos_especificos/catalogo_grandes.php">Grandes</option>
                    <option value="/php/catalogos_especificos/catalogo_anime.php">Anime</option>
                    <option value="/php/catalogos_especificos/catalogo_videojuegos.php" selected>Videojuegos</option>
                    <option value="/php/catalogos_especificos/catalogo_pokemon.php">Pokemon</option>
                    <option value="/php/catalogos_especificos/catalogo_digimon.php">Digimon</option>
                    <option value="/php/catalogos_especificos/catalogo_youtubers.php">Youtubers</option>
                </select>
            </form>
        </div>

        <div class = "catalogo">

            <?php
                $category1 = "Todos"; //Todos, Chicos, Medianos, Grandes
                $category2 = "Videojuegos"; //Todos, Anime, Videojuegos
                $category3 = "Todos"; //Todos, Pokemon, Digimon, Youtuber
                echo getProductsCards($category1, $category2, $category3);
            ?>

        </div>

    </main>

    <?php include "../footer.php"; ?>


    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>
</html>