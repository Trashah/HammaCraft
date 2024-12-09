<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['id'];
    $nombredeusuario = $_POST['nombredeusuario'];
    $nombre = $_POST['nombre'];
    $apellido = $_POST['apellido'];
    $email = $_POST['email'];

    // Datos de conexión a la base de datos
    $servidor = "localhost";
    $usuario = "root";
    $password = "";
    $bd = "HammaCraft";

    // Verificar conexión
    $conexion = mysqli_connect($servidor, $usuario, $password, $bd);
    if (!$conexion) {
        die("Error de conexión a la base de datos: " . mysqli_connect_error());
    }

    // Validar entradas
    if (empty($id) || empty($nombredeusuario) || empty($nombre) || empty($apellido) || empty($email)) {
        die("Todos los campos son obligatorios.");
    }

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        die("Correo electrónico inválido.");
    }

    if (!is_numeric($id)) {
        die("ID inválido.");
    }

    // Usar consulta preparada
    $sql = "UPDATE usuarios SET NombreDeUsuario = ?, Nombre = ?, Apellido = ?, Email = ? WHERE ID = ?";
    $stmt = mysqli_prepare($conexion, $sql);

    if (!$stmt) {
        die("Error al preparar la consulta: " . mysqli_error($conexion));
    }

    // Vincular parámetros a la consulta preparada
    mysqli_stmt_bind_param($stmt, "ssssi", $nombredeusuario, $nombre, $apellido, $email, $id);

    // Ejecutar la consulta
    if (mysqli_stmt_execute($stmt)) {
        echo "Registro actualizado correctamente.";
    } else {
        echo "Error al actualizar el registro: " . mysqli_stmt_error($stmt);
    }

    // Cerrar recursos
    mysqli_stmt_close($stmt);
    mysqli_close($conexion);

    // Redirección
    header("Location: ../admin.php");
    exit;
}
?>