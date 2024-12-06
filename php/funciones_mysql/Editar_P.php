<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['id'];
    $nombre = $_POST['nombre'];
    $descripcion = $_POST['descripcion'];
    $precio = $_POST['precio'];
    $categoria1 = $_POST['categoria1'];
    $categoria2 = $_POST['categoria2'];
    $categoria3 = $_POST['categoria3'];
    $stock = $_POST['stock'];

    $servidor = "localhost";
    $usuario = "root";
    $password = "";
    $bd = "HammaCraft";

    $conexion = mysqli_connect($servidor, $usuario, $password, $bd);

    if ($conexion) {
        $sql = "UPDATE productos SET NombreProducto = '$nombre', Descripcion = '$descripcion', Precio = $precio, 
        Categoria1 = $categoria1, Categoria2 = $categoria2, Categoria3 = $categoria3, Stock = $stock WHERE ID_P = $id";
        if (mysqli_query($conexion, $sql)) {
            echo "Registro actualizado correctamente.";
        } else {
            echo "Error al actualizar el registro: " . mysqli_error($conexion);
        }
    } else {
        echo "Error de conexión a la base de datos.";
    }

    mysqli_close($conexion);
    header("/../php/admin.php");
    exit;
}
?>