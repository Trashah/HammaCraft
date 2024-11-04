<!DOCTYPE html>
<!-- saved from url=(0042)https://www.hammacraft.lat/php/pedidos.php -->
<html lang="es">
<<<<<<< HEAD

<head>
	
    <meta charset="utf-8">
	<meta name = "viewport" content="width=device-width, initial-scale=1">
	<title> HammaCraft </title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link rel="stylesheet" href="../css/styles.css">
    <script src = "../javascript/script.js" defer> </script>
=======
    
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title> HammaCraft - Pedidos </title>
    <link rel="stylesheet" href="./HammaCraft_files/bootstrap.min.css">
    <link rel="stylesheet" href="./HammaCraft_files/all.min.css">
    <link rel="stylesheet" href="./HammaCraft_files/styles.css">
    <script src="./HammaCraft_files/script.js.descarga" defer=""> </script>
>>>>>>> 32c431caacb4218465ab5788ec26bb2ad4b06e81
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
                <img class = "logo-item" src="../images/logo.png" alt="Logo"> 
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

        <center>
        <h1>¿Tiene algún pedido en especifico?</h1>
        <br>
        <h2>Rellene el siguiente formulario para realizar su pedido personalizado</h2>
        <br>
        <form>
            <label for="NombreP"> Nombre del personaje/objeto: </label> <input type="text"> <br>
            <label for="Desc"> Descripción del personaje/objeto: </label> <br>
            <textarea cols="30" rows="3"></textarea>
            <br>
            <label for="Size"> ¿De qué tamaño sería?</label>
            <input type="radio" name="option"> Chico
            <input type="radio" name="option"> Mediano
            <input type="radio" name="option"> Grande
            <br>
            <label for="Imagen">Subir alguna imagen de referencia del personaje/objeto</label>
            <br>
            <input type="file">
            <br>
            <input type="submit" value="Enviar pedido">
            <br><br>
        </form>
        </center>

    </main>

    <footer>

        <div class="footer-content">

            <div class="footer-section">

                <h3>MENU</h3>

                <ul>

                    <li><a href="https://www.hammacraft.lat/">Pantalla principal</a></li>
                    <li><a href="https://www.hammacraft.lat/php/catalogo.php">Tienda</a></li>

            <div class="footer-section">

                <h3>Siguenos</h3>

                <ul>

                    <li><a href="https://www.hammacraft.lat/php/pedidos.php#facebook">Facebook</a></li>
                    <li><a href="https://www.hammacraft.lat/php/pedidos.php#twitter">Twitter</a></li>
                    <li><a href="https://www.hammacraft.lat/php/pedidos.php#instagram">Instagram</a></li>

                </ul>

            </div>

        </ul></div>

    </div></footer>



</body></html>