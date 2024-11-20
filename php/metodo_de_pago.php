<?php
include 'functions.php';
session_start();
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Método de Pago</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link rel="stylesheet" href="/css/styles.css">
</head>
<body>
    <?php include 'header.php'; ?>

    <div class="checkout-steps">
        <div class="step">1. Carrito de compras</div>
        <div class="step">2. Detalles de envío</div>
        <div class="step active">3. Método de pago</div>
    </div>

    <div class="container">
        <form action="confirmacion_compra.php" method="POST">
            <h2>Método de Pago</h2>
            <div class="payment-option">
                <input type="radio" id="credit-card" name="payment-method" value="credit-card" checked>
                <label for="credit-card">Tarjeta de Crédito</label>
                <div class="credit-card-form">
                    <input type="text" placeholder="0000 0000 0000 0000" maxlength="19" required>
                    <input type="text" placeholder="MM / YY" maxlength="5" required>
                    <input type="text" placeholder="CVV" maxlength="3" required>
                    <input type="text" placeholder="Nombre del Titular" required>
                </div>
            </div>
            <div class="payment-option">
                <input type="radio" id="paypal" name="payment-method" value="paypal">
                <label for="paypal">PayPal</label>
            </div>
            <button type="submit" class="btn btn-primary">Finalizar Compra</button>
        </form>
    </div>

    <?php include 'footer.php'; ?>
</body>
</html>
