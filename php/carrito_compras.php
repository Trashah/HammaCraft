<?php

include 'functions.php';

session_start();

// Asegúrate de que el carrito esté inicializado
if (!isset($_SESSION["cart"])) {
    $_SESSION["cart"] = [];
}

// Procesar el formulario de agregar al carrito
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST["productID"])) {
        $_SESSION["cart"][] = $_POST["productID"];
    }

    // Eliminar un producto
    if (isset($_POST['removeItem']) && isset($_POST['removeProductID'])) {
        $removeProductID = $_POST['removeProductID'];
        // Buscar el índice del producto
        $index = array_search($removeProductID, $_SESSION['cart']);
        if ($index !== false) {
            // Eliminar el producto de la sesión
            unset($_SESSION['cart'][$index]);
            $_SESSION['cart'] = array_values($_SESSION['cart']);  // Reindexar el arreglo
        }
    }
}

// Función para obtener detalles del producto
function getCurrentItem($productID) {
    $connection = connectToDatabase();
    $sql = "SELECT * FROM productos WHERE ID_P = ?";

    $statement = $connection->prepare($sql);
    $statement->bind_param("i", $productID);
    $statement->execute();
    $result = $statement->get_result();

    if ($result->num_rows <= 0) {
        return null;
    }

    return $result->fetch_assoc();
}

// Inicializar el total
$_SESSION["total"] = 0;

?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link rel="stylesheet" href="/css/styles.css">
    <link rel="stylesheet" href="/css/carrito_compras.css">
    <title>Mi carrito</title>
</head>

<body>

<?php include 'header.php'; ?>

<div class="checkout-steps">
    <div class="step active">1. Carrito de compras</div>
    <div class="step">2. Detalles de envío</div>
    <div class="step">3. Método de pago</div>
</div>

<section class="shopping-cart">
    <h2>Carrito de compras</h2>
    <div class="cart-items">
        <?php 
        if (isset($_SESSION["cart"]) && !empty($_SESSION["cart"])): 
            foreach ($_SESSION["cart"] as $productID): 
                $item = getCurrentItem($productID);
                if ($item):
        ?>
            <div class="cart-item">
                <img src="/images/<?php echo $item["Imagen"]; ?>" alt="<?php echo $item["NombreProducto"]; ?>">
                <div class="item-details">
                    <h3><?php echo $item["NombreProducto"]; ?></h3>
                    <p><?php echo $item["Descripcion"]; ?></p>
                    <span class="price">$<?php echo $item["Precio"]; ?></span>
                </div>

                <?php 
                // Actualizar el total
                $_SESSION["total"] += $item["Precio"]; 
                ?>

                <form method="POST" style="display:inline;">
                    <input type="hidden" name="removeProductID" value="<?php echo $productID; ?>">
                    <button type="submit" name="removeItem" class="remove-btn">×</button>
                </form>
            </div>
        <?php 
                endif;
            endforeach;
        else:
        ?>
        <p>No hay productos en tu carrito.</p>
        <?php endif; ?>
    </div>

    <div class="cart-buttons">
        <button class="btn-next" onclick="window.location.href='detalles_de_envio.php'">Siguiente</button>
        <button class="btn-cancel">Cancelar</button>
    </div>
</section>

<aside class="summary">
    <h2>Total</h2>
    <div class="totals">
        <p>Subtotal: <span>$<?php echo $_SESSION["total"]; ?></span></p>
        <p>Envio: <span>GRATIS</span></p>
        <p class="total">TOTAL: <span>$<?php echo $_SESSION["total"]; ?></span></p>
    </div>

    <!-- Mostrar la dirección de envío -->
</aside>

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
            <h3>SÍGUENOS</h3>
            <ul>
                <li><a href="#facebook">Facebook</a></li>
                <li><a href="#twitter">Twitter</a></li>
                <li><a href="#instagram">Instagram</a></li>
            </ul>
        </div>
    </div>
</footer>

<script src="/javascript/carrito_compras.js"></script>

</body>

</html>
