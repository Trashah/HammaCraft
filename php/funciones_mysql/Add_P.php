<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $nombreProducto = $_POST['nombreProducto'];
    $descripcion = $_POST['descripcion'];
    $precio = $_POST['precio'];
    $categoria1 = $_POST['categoria1'];
    $categoria2 = $_POST['categoria2'];
    $categoria3 = $_POST['categoria3'];
    $stock = $_POST['stock'];
    $imagen = $_POST['imagen'];

    $servidor = "localhost";
    $usuario = "root";
    $password = "";
    $bd = "HammaCraft";

    $conexion = mysqli_connect($servidor, $usuario, $password, $bd);

    if (!$conexion) {
        die ("Error de conexión a la base de datos.");
    }

    $sql = "INSERT INTO productos
            (NombreProducto, Descripcion, Precio, Categoria1, Categoria2, Categoria3, Stock, Imagen)
            VALUES
            ('$nombreProducto', '$descripcion', '$precio', '$categoria1', '$categoria2', '$categoria3', '$stock', '$imagen')
            ";

    if (!mysqli_query($conexion, $sql)) {
        die("Error al actualizar el registro: " . mysqli_error($conexion));
    } 

    echo "Producto insertado con exito";

    mysqli_close($conexion);
    header("Location: ../admin.php");
    exit;
}

?>