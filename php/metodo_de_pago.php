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
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link rel="stylesheet" href="/css/styles.css">
    <link rel="stylesheet" href="/css/metodo_de_pago.css">
    <script>
        function processPayment() {
            const messageContainer = document.getElementById('payment-message');
            messageContainer.innerHTML = `
                <div class="alert alert-success" role="alert">
                    <strong>GRACIAS POR COMPRAR</strong>
                </div>
            `;
            setTimeout(() => {
                window.location.href = 'carrito_compras.php';
            }, 2000); // Redirige después de 2 segundos
        }
    </script>
</head>
<body>
    <?php include 'header.php'; ?>

    <div class="checkout-steps">
        <div class="step">1. Carrito de compras</div>
        <div class="step">2. Detalles de envío</div>
        <div class="step active">3. Método de pago</div>
    </div>

    <div id="payment-message" class="container"></div> <!-- Contenedor para el mensaje de agradecimiento -->

    <div class="container">
        <div class="payment-section">
            <h2>Payment method</h2>
            <div class="payment-option">
                <input type="radio" id="paypal" name="payment-method" checked>
                <label for="paypal">
                    <strong>Paypal</strong>
                    <p>Paga mediante PayPal</p>
                </label>
            </div>

            <div class="action-buttons">
                <button class="btn-next" onclick="processPayment()">Pagar</button>
                <button class="btn-cancel" onclick="window.location.href='detalles_de_envio.php'">Cancelar</button>
            </div>
        </div>

        <div class="summary-section">
            <h2>Total</h2>
            <div class="totals">
                <p>Subtotal: <span>$<?php echo $_SESSION["total"]; ?></span></p>
                <p>Envío: <span>FREE</span></p>
                <p class="total">Total: <span>$<?php echo $_SESSION["total"]; ?></span></p>
            </div>
        </div>
    </div>

    <?php include "footer.php"; ?>

</body>
</html>
