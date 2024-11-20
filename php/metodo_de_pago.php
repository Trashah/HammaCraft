<?php
include 'functions.php';
session_start();
?>
<!DOCTYPE html>
<html lang="en">
@@ -15,29 +12,10 @@
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link rel="stylesheet" href="/css/styles.css">
    <link rel="stylesheet" href="/css/metodo_de_pago.css">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
</head>
<body>
    <?php include 'header.php'; ?>

    <div class="checkout-steps">
        <div class="step">1. Carrito de compras</div>
@@ -50,93 +28,76 @@
            <h2>Payment method</h2>

            <div class="payment-option">
                <input type="radio" id="paypal" name="payment-method" checked>
                <label for="paypal">
                    <strong>Paypal</strong>
                    <p>Paga mediante PayPal</p>
                </label>
                <div class="paypal-form">
                    <a href="AQUI_TU_LINK_DE_PAYPAL" class="btn btn-primary">Pagar con PayPal</a>
                </div>
            </div>

            <div class="action-buttons">
                <button class="btn-next" onclick="handlePayment()">Pagar</button>
                <button class="btn-cancel" onclick="window.location.href='detalles_de_envio.php'">Cancelar</button>
            </div>
        </div>
        <div class="summary-section">
            <h2>Total</h2>
            <div class="totals">
                <p>Subtotal: <span>$<?php echo $_SESSION["total"]; ?></span></p>
                <p>Envio: <span>FREE</span></p>
                <p class="total">Total: <span>$<?php echo $_SESSION["total"]; ?></span></p>
            </div>

            <h3>Dirección de Envío</h3>
            <p><strong>Nombre:</strong> <?php echo $_SESSION["nombre_envio"]; ?></p>
            <p><strong>Dirección:</strong> <?php echo $_SESSION["direccion_envio"]; ?></p>
            <p><strong>Ciudad:</strong> <?php echo $_SESSION["ciudad_envio"]; ?></p>
            <p><strong>Código Postal:</strong> <?php echo $_SESSION["cp_envio"]; ?></p>
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
    <script>
        // Función que maneja el pago y muestra la notificación
        function handlePayment() {
            // Verificar si los datos de envío están completos
            if (<?php echo isset($_SESSION["nombre_envio"]) ? 'true' : 'false'; ?>) {
                // Mostrar notificación de agradecimiento
                alert("¡Gracias por tu compra!");
                // Vaciar el carrito (ejemplo: redirigir al carrito vacío)
                window.location.href = 'carrito.php?vaciar=true';
            } else {
                alert("Por favor, complete todos los campos de dirección antes de continuar.");
            }
        }
    </script>

</body>
</html>
