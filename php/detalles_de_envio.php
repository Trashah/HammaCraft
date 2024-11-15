<?php

include 'functions.php';

session_start();

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detalles de Envío</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link rel="stylesheet" href="/css/styles.css">
    <link rel="stylesheet" href="/css/detalles_de_envio.css">
</head>
<body>
<?php include 'header.php'; ?>
<!-- Cabecera 
<header>
    <nav>
        <div>
            <img class="logo-item" src="logo hammacraft.png" alt="Logo"> 
        </div>
        <div class="search-bar">
            <input type="text" placeholder="Search...">
        </div>
        <div class="nav-links">
            <a href="#home">Home</a>
            <a href="#about">Sobre nosotros</a>
            <a href="#shop">Tienda</a>
            <a href="#help">Ayuda</a>
            <button class="cart-btn">
                <i class="fas fa-shopping-cart"></i> Carito
            </button>
        </div>
    </nav>
</header>-->

    <!-- Progreso del pedido -->
    <div class="checkout-steps">
        <div class="step">1. Carrito de compras</div>
        <div class="step active">2. Detalles de envio</div>
        <div class="step">3. Métodos de pago</div>
    </div>

    <!-- Detalles de Envío -->
    <section class="shipping-details">
        <h2>Shipping Details</h2>
        <form>
            <div class="form-group">
                <label for="first-name">Nombres</label>
                <input type="text" id="first-name" name="first-name">
            </div>
            <div class="form-group">
                <label for="last-name">Apellidos</label>
                <input type="text" id="last-name" name="last-name">
            </div>
            <div class="form-group">
                <label for="address">Dirección</label>
                <input type="text" id="address" name="address">
            </div>
            <div class="form-group">
                <label for="address2">Dirección 2 (opcional)</label>
                <input type="text" id="address2" name="address2">
            </div>
            <div class="form-group">
                <label for="country">País</label>
                <select id="country" name="country">
                    <option value="mx">Mexico</option>
                    <option value="us">Estados Unidos</option>
                </select>
            </div>
            <div class="form-group">
                <label for="city">Ciudad</label>
                <input type="text" id="city" name="city">
            </div>
            <div class="form-group">
                <label for="postal-code">Zip/Codigo Postal</label>
                <input type="text" id="postal-code" name="postal-code">
            </div>
            <div class="form-group">
                <label for="phone">Numero telefonico</label>
                <input type="text" id="phone" name="phone">
            </div>

            <!-- Opciones de envío -->
            <div class="shipping-options">
                <label>
                    <input type="radio" name="shipping" value="free" checked> Envio gratis (2 - 5 dias de entrega)
                </label>
                <label>
                    <input type="radio" name="shipping" value="express"> Al dia siguiente - $20
                </label>
            </div>

            <div class="form-buttons">
                <button type="button" class="btn-next" onclick="window.location.href='metodo_de_pago.php'">Siguiente</button>
                <button type="button" class="btn-cancel" onclick="window.location.href='carrito_compras.php'">Cancelar</button>
            </div>
        </form>
    </section>

    <!-- Resumen del pedido -->
    <aside class="summary">
        <h2>Total</h2>
        <!--
        <div class="cart-summary">
            <div class="cart-item">
                <img src="product1.jpg" alt="Product Name">
                <p>PRODUCT NAME</p>
                <span class="price">$300</span>
            </div>
            <div class="cart-item">
                <img src="product2.jpg" alt="Product Name">
                <p>PRODUCT NAME</p>
                <span class="price">$300</span>
            </div>
        </div>
        -->

        <div class="totals">
            <p>Subtotal: <span>$<?php echo $_SESSION["total"]; ?></span></p>
            <p>Envio: <span>Gratis</span></p>
            <!-- <p>IVA: <span>$13</span></p> -->
            <p class="total">TOTAL: <span>$<?php echo $_SESSION["total"]; ?></span></p>
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

</body>
</html>