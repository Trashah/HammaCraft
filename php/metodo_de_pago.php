<?php

include 'functions.php';

session_start();

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment Page</title>
    <link rel="stylesheet" href="/css/metodo_de_pago.css">
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
                    <i class="fas fa-shopping-cart"></i> Cart
                </button>
            </div>
        </nav>
    </header>-->

    <div class="checkout-steps">
        <div class="step">1. Carrito de compras</div>
        <div class="step">2. Detalles de envio</div>
        <div class="step active">3. Método de pago</div>
    </div>

    <div class="container">
        <div class="payment-section">
            <h2>Payment method</h2>

            <div class="payment-option">
                <input type="radio" id="credit-card" name="payment-method" checked>
                <label for="credit-card">
                    <strong>Credit Card</strong>
                    <p>Paga mediante tarjeta de debito o credito</p>
                </label>
                <div class="credit-card-form">
                    <input type="text" placeholder="0000 0000 0000 0000" maxlength="19">
                    <input type="text" placeholder="MM / YY" maxlength="5">
                    <input type="text" placeholder="CVV" maxlength="3">
                    <input type="text" placeholder="Card Holder Name">
                </div>
            </div>

            <div class="payment-option">
                <input type="radio" id="paypal" name="payment-method">
                <label for="paypal">
                    <strong>Paypal</strong>
                    <p>Paga mediante paypal</p>
                </label>
            </div>

            <div class="action-buttons">
                <button class="btn-next">Pagar</button>
                <button class="btn-cancel" onclick="window.location.href='detalles_de_envio.html'">Cancelar</button>
            </div>
        </div>

        <div class="summary-section">
            <h2>Total</h2>
            <div class="cart-item">
                <img src="product-placeholder.png" alt="Product Image">
                <p>PRODUCT NAME<br>$300</p>
            </div>
            <div class="cart-item">
                <img src="product-placeholder.png" alt="Product Image">
                <p>PRODUCT NAME<br>$300</p>
            </div>
            <div class="totals">
                <p>Subtotal: <span>$600</span></p>
                <p>Envio: <span>FREE</span></p>
                <p>IVA: <span>$13</span></p>
                <p class="total">Total: <span>$613</span></p>
            </div>
        </div>
    </div>

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