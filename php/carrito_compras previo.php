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

    $removeProductID = null;
    if (isset($_POST['removeItem']) && isset($_POST['removeProductID'])) {
        $removeProductID = $_POST['removeProductID'];
        $index = array_search($removeProductID, $_SESSION['cart']);
        unset($_SESSION['cart'][$index]);
        $_SESSION['cart'] = array_values($_SESSION['cart']);    
    }
}

function getCurrentItem($productID) {
    $connection = connectToDatabase();
    $sql = "SELECT * FROM productos where ID_P = ?";

    $statement = $connection -> prepare($sql);
    $statement -> bind_param("i", $productID);
    $statement -> execute();
    $result = $statement -> get_result();

    if (!($result -> num_rows > 0)) {
        return null;
    }

    $currentItem = $result -> fetch_assoc();

    return $currentItem;
}

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
    <title>Mi carrito</title>
    <link rel="stylesheet" href="/css/carrito_compras.css">

</head>

<body>

<?php include 'header.php'; ?>

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

            <?php 
            if (isset($_SESSION["cart"])):
            foreach($_SESSION["cart"] as $productID): 
            ?>

            <div class="cart-item">

                <?php $item = getCurrentItem($productID); ?>

                <img src = "/images/<?php echo $item["Imagen"]; ?>" alt = "<?php echo $item["NombreProducto"] ?>">
                <div class="item-details">

                    <h3> <?php echo $item["NombreProducto"]; ?></h3>
                    <p> <?php echo $item["Descripcion"]; ?> </p>
                    <span class="price"> $<?php echo $item["Precio"]; ?> </span>

                </div>

                <?php $_SESSION["total"] += $item["Precio"]; ?>

                <form method = "POST">
                    <input type = "hidden" name = "removeProductID" value = "<?php echo $productID ?>">
                    <button type = "submit" name = "removeItem" class="remove-btn">&times; </button>
                </form>
                    
            </div>

            <?php 
            endforeach;
            endif;
            ?>
            
        <div class="cart-buttons">
            <button class="btn-next" onclick="window.location.href='detalles_de_envio.php'">Siguiente</button>
            <button class="btn-cancel">Cancelar</button>
        </div>

    </section>

    <!-- Resumen del pedido -->
    <aside class="summary">

        <h2>Total</h2>
        <div class="totals">

            <p>Subtotal: <span> $<?php echo $_SESSION["total"]; ?></span></p>
            <p>Envio: <span> GRATIS </span></p>
            <p class="total">TOTAL: <span> $<?php echo $_SESSION["total"]; ?> </span></p>

        </div>

    </aside>

    <?php include "footer.php"; ?>

    <!-- JavaScript -->
    <script src="/javascript/carrito_compras.js"></script>

</body>

</html>
