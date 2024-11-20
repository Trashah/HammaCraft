<?php
session_start();

// Verificar que el carrito no esté vacío antes de continuar con el pago
if (empty($_SESSION['cart'])) {
    header('Location: carrito_compras.php');
    exit();
}

// Si ya tienes la dirección de envío almacenada, asegúrate de que se haya completado
if (!isset($_SESSION['shipping_address'])) {
    header('Location: detalles_de_envio.php');
    exit();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Aquí podrías agregar lógica para procesar el pago (esto es solo un ejemplo básico)
    // Guardamos el método de pago en la sesión, o podrías procesar el pago con un API de pago como Stripe, PayPal, etc.
    $_SESSION['payment_method'] = $_POST['payment_method'];
    $_SESSION['payment_details'] = $_POST['payment_details'];

    // Redirigir a una página de confirmación de compra
    header('Location: confirmacion.php');
    exit();
}
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <title>Método de Pago</title>
</head>

<body>

<?php include 'header.php'; ?>

<div class="checkout-steps">
    <div class="step">1. Carrito de compras</div>
    <div class="step">2. Detalles de envío</div>
    <div class="step active">3. Método de pago</div>
</div>

<section class="payment-method">
    <h2>Elige un Método de Pago</h2>
    <form action="" method="POST">
        <div class="form-group">
            <label for="payment_method">Método de Pago</label>
            <select name="payment_method" id="payment_method" class="form-control" required>
                <option value="credit_card">Tarjeta de Crédito/Débito</option>
                <option value="paypal">PayPal</option>
                <!-- Agrega otros métodos de pago si es necesario -->
            </select>
        </div>

        <div class="payment-details">
            <div id="credit_card_details" style="display:none;">
                <h4>Detalles de Tarjeta de Crédito</h4>
                <div class="form-group">
                    <label for="card_number">Número de tarjeta</label>
                    <input type="text" name="payment_details[card_number]" id="card_number" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="expiry_date">Fecha de expiración</label>
                    <input type="month" name="payment_details[expiry_date]" id="expiry_date" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="cvv">CVV</label>
                    <input type="text" name="payment_details[cvv]" id="cvv" class="form-control" required>
                </div>
            </div>

            <div id="paypal_details" style="display:none;">
                <h4>Detalles de PayPal</h4>
                <p>Serás redirigido a PayPal para completar el pago.</p>
            </div>
        </div>

        <button type="submit" class="btn btn-primary">Procesar Pago</button>
    </form>
</section>

<script>
    // Mostrar los detalles del pago según el método seleccionado
    document.getElementById('payment_method').addEventListener('change', function () {
        var paymentMethod = this.value;
        
        if (paymentMethod === 'credit_card') {
            document.getElementById('credit_card_details').style.display = 'block';
            document.getElementById('paypal_details').style.display = 'none';
        } else if (paymentMethod === 'paypal') {
            document.getElementById('credit_card_details').style.display = 'none';
            document.getElementById('paypal_details').style.display = 'block';
        }
    });
</script>

</body>

</html>
