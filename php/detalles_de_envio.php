<?php
session_start();

// Redirigir si el carrito está vacío
if (!isset($_SESSION['cart']) || empty($_SESSION['cart'])) {
    header('Location: carrito_compras.php');
    exit;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Validar los datos del formulario
    $errors = [];
    $firstName = $_POST['first-name'] ?? '';
    $lastName = $_POST['last-name'] ?? '';
    $address = $_POST['address'] ?? '';
    $address2 = $_POST['address2'] ?? '';
    $country = $_POST['country'] ?? '';
    $city = $_POST['city'] ?? '';
    $postalCode = $_POST['postal-code'] ?? '';
    $phone = $_POST['phone'] ?? '';
    $shipping = $_POST['shipping'] ?? '';

    if (empty($firstName)) $errors['first-name'] = 'El nombre es obligatorio.';
    if (empty($lastName)) $errors['last-name'] = 'El apellido es obligatorio.';
    if (empty($address)) $errors['address'] = 'La dirección es obligatoria.';
    if (empty($city)) $errors['city'] = 'La ciudad es obligatoria.';
    if (empty($postalCode)) $errors['postal-code'] = 'El código postal es obligatorio.';
    if (empty($phone)) $errors['phone'] = 'El teléfono es obligatorio.';
    if (empty($shipping)) $errors['shipping'] = 'Por favor, selecciona un método de envío.';

    if (empty($errors)) {
        // Guardar los datos de envío en la sesión
        $_SESSION['shipping_details'] = [
            'first_name' => $firstName,
            'last_name' => $lastName,
            'address' => $address,
            'address2' => $address2,
            'country' => $country,
            'city' => $city,
            'postal_code' => $postalCode,
            'phone' => $phone,
            'shipping' => $shipping,
        ];

        // Redirigir al método de pago
        header('Location: metodo_de_pago.php');
        exit;
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <title>Detalles de Envío</title>
    <link rel="stylesheet" href="/css/detalles_de_envio.css">
</head>
<body>

<?php include 'header.php'; ?>

<!-- Progreso del pedido -->
<div class="checkout-steps">
    <div class="step completed">1. Carrito de compras</div>
    <div class="step active">2. Detalles de envío</div>
    <div class="step">3. Método de pago</div>
</div>

<!-- Notificación de error -->
<?php if (!empty($errors)): ?>
    <div class="alert alert-danger">
        <strong>¡Error!</strong> Completa todos los campos para continuar.
    </div>
<?php endif; ?>

<!-- Formulario de detalles de envío -->
<section class="shipping-details">
    <h2>Detalles de Envío</h2>

    <form method="POST" id="shipping-form">
        <div class="form-group">
            <label for="first-name">Nombre:</label>
            <input type="text" id="first-name" name="first-name" class="form-control <?php echo isset($errors['first-name']) ? 'is-invalid' : ''; ?>" value="<?php echo htmlspecialchars($firstName ?? '') ?>" required>
            <?php if (isset($errors['first-name'])): ?>
                <div class="invalid-feedback"><?php echo $errors['first-name']; ?></div>
            <?php endif; ?>
        </div>
        <div class="form-group">
            <label for="last-name">Apellido:</label>
            <input type="text" id="last-name" name="last-name" class="form-control <?php echo isset($errors['last-name']) ? 'is-invalid' : ''; ?>" value="<?php echo htmlspecialchars($lastName ?? '') ?>" required>
            <?php if (isset($errors['last-name'])): ?>
                <div class="invalid-feedback"><?php echo $errors['last-name']; ?></div>
            <?php endif; ?>
        </div>
        <div class="form-group">
            <label for="address">Dirección:</label>
            <input type="text" id="address" name="address" class="form-control <?php echo isset($errors['address']) ? 'is-invalid' : ''; ?>" value="<?php echo htmlspecialchars($address ?? '') ?>" required>
            <?php if (isset($errors['address'])): ?>
                <div class="invalid-feedback"><?php echo $errors['address']; ?></div>
            <?php endif; ?>
        </div>
        <div class="form-group">
            <label for="address2">Dirección 2 (opcional):</label>
            <input type="text" id="address2" name="address2" class="form-control" value="<?php echo htmlspecialchars($address2 ?? '') ?>">
        </div>
        <div class="form-group">
            <label for="country">País:</label>
            <input type="text" id="country" name="country" class="form-control <?php echo isset($errors['country']) ? 'is-invalid' : ''; ?>" value="<?php echo htmlspecialchars($country ?? '') ?>" required>
            <?php if (isset($errors['country'])): ?>
                <div class="invalid-feedback"><?php echo $errors['country']; ?></div>
            <?php endif; ?>
        </div>
        <div class="form-group">
            <label for="city">Ciudad:</label>
            <input type="text" id="city" name="city" class="form-control <?php echo isset($errors['city']) ? 'is-invalid' : ''; ?>" value="<?php echo htmlspecialchars($city ?? '') ?>" required>
            <?php if (isset($errors['city'])): ?>
                <div class="invalid-feedback"><?php echo $errors['city']; ?></div>
            <?php endif; ?>
        </div>
        <div class="form-group">
            <label for="postal-code">Código Postal:</label>
            <input type="text" id="postal-code" name="postal-code" class="form-control <?php echo isset($errors['postal-code']) ? 'is-invalid' : ''; ?>" value="<?php echo htmlspecialchars($postalCode ?? '') ?>" required>
            <?php if (isset($errors['postal-code'])): ?>
                <div class="invalid-feedback"><?php echo $errors['postal-code']; ?></div>
            <?php endif; ?>
        </div>
        <div class="form-group">
            <label for="phone">Teléfono:</label>
            <input type="text" id="phone" name="phone" class="form-control <?php echo isset($errors['phone']) ? 'is-invalid' : ''; ?>" value="<?php echo htmlspecialchars($phone ?? '') ?>" required>
            <?php if (isset($errors['phone'])): ?>
                <div class="invalid-feedback"><?php echo $errors['phone']; ?></div>
            <?php endif; ?>
        </div>
        <div class="form-group">
            <label>Método de Envío:</label>
            <select name="shipping" class="form-control <?php echo isset($errors['shipping']) ? 'is-invalid' : ''; ?>" required>
                <option value="">Selecciona un método</option>
                <option value="standard" <?php echo isset($shipping) && $shipping === 'standard' ? 'selected' : '' ?>>Envío estándar (gratis)</option>
                <option value="express" <?php echo isset($shipping) && $shipping === 'express' ? 'selected' : '' ?>>Envío express ($99)</option>
            </select>
            <?php if (isset($errors['shipping'])): ?>
                <div class="invalid-feedback"><?php echo $errors['shipping']; ?></div>
            <?php endif; ?>
        </div>
        <button type="submit" class="btn btn-primary">Continuar</button>
        <a href="carrito_compras.php" class="btn btn-secondary">Regresar</a>
    </form>
</section>

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
