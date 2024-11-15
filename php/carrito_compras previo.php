<?php

include 'functions.php';

session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST["productID"])) {
        if (!isset($_SESSION["cart"])) {
            $_SESSION["cart"] = [];
        }

        $_SESSION["cart"][] = $_POST["productID"];

    }
}

?>

<!DOCTYPE html>

<html lang="es">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <title>Mi carrito</title>
    <link rel="stylesheet" href="/css/carrito_compras.css">

</head>

<body>

<?php 

foreach ($_SESSION["cart"] as $productID) {
    echo "ID de producto: $productID";
}

?>

<?php include 'header.php'; ?>
    <!-- Cabecera 
    <header class = "header-hammacraft">

        <nav class = "nav-hammacraft">

                <a href = "https://www.hammacraft.lat/">
                <img class = "logo-item" src="../images/logo.png" alt="Logo"> 
                </a>

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

    </header>-->

    <!-- Progreso del pedido -->
    <div class="checkout-steps">

        <div class="step active">1. Carrito de compras</div>
        <div class="step">2. Detalles de envio</div>
        <div class="step">3. Método de pago</div>

    </div>

    <!-- Sección del carrito -->
    <section class="shopping-cart">

        <h2>Shopping Cart</h2>
        <div class="cart-items">

            <div class="cart-item">

                <img src="product1.jpg" alt="Producto 1">
                <div class="item-details">

                    <h3>NOMBRE DEL PRODUCTO</h3>
                    <p>Esto es un ejemplo</p>
                    <span class="price">$300</span>
                    <select>
                        <option value="1">1 pcs</option>
                        <option value="2">2 pcs</option>
                        <option value="3">3 pcs</option>
                    </select>

                </div>
                <button class="remove-btn">&times;</button>
            </div>

            <div class="cart-item">

                <img src="product1.jpg" alt="Producto 1">
                <div class="item-details">

                    <h3>NOMBRE DEL PRODUCTO</h3>
                    <p>Esto es un ejemplo</p>
                    <span class="price">$300</span>
                    <select class="select">
                        <option value="1">1 pcs</option>
                        <option value="2">2 pcs</option>
                        <option value="3">3 pcs</option>
                    </select>

                </div>
                <button class="remove-btn">&times;</button>

            </div>
            
        <div class="cart-buttons">
            <button class="btn-next" onclick="window.location.href='detalles_de_envio.php'">Siguiente</button>
            <button class="btn-cancel">Cancelar</button>
        </div>

    </section>

    <!-- Resumen del pedido -->
    <aside class="summary">

        <h2>Total</h2>
        <div class="totals">

            <p>Subtotal: <span>$600</span></p>
            <p>Envio: <span>FREE</span></p>
            <p>IVA: <span>$13</span></p>
            <p class="total">TOTAL: <span>$613</span></p>

        </div>

    </aside>

 <!-- Footer -->
    <footer>

        <div class="footer-content">

            <div class="footer-section">

                <h3>MENU</h3>
                <ul>
                    <li><a href="#home">Home</a></li>
                    <li><a href="#about">About</a></li>
                    <li><a href="#shop">Shop</a></li>
                    <li><a href="#help">Help</a></li>
                </ul>
            </div>
            
            <div class="footer-section">
                <h3>SIGUENOS</h3>
                <ul>
                    <li><a href="#facebook">Facebook</a></li>
                    <li><a href="#twitter">Twitter</a></li>
                    <li><a href="#instagram">Instagram</a></li>
                </ul>
            </div>

        </div>

    </footer>

    <!-- JavaScript -->
    <script src="/javascript/carrito_compras.js"></script>

</body>

</html>