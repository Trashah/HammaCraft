<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['id'] ?? null;
    $nombredeusuario = $_POST['nombredeusuario'] ?? null;
    $nombreu = $_POST['nombreu'] ?? null;
    $apellido = $_POST['apellido'] ?? null;
    $email = $_POST['email'] ?? null;

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
    if (empty($id) || empty($nombredeusuario) || empty($nombreu) || empty($apellido) || empty($email)) {
        die("Todos los campos son obligatorios.");
    }

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        die("Correo electrónico inválido.");
    }

    // Usar consulta preparada
    $sql = "UPDATE productos SET NombreDeUsuario = ?, Nombre = ?, Apellido = ?, Email = ? WHERE ID = ?";
    $stmt = mysqli_prepare($conexion, $sql);
    if (!$stmt) {
        die("Error al preparar la consulta: " . mysqli_error($conexion));
    }

    mysqli_stmt_bind_param($stmt, "ssssi", $nombredeusuario, $nombreu, $apellido, $email, $id);
    if (mysqli_stmt_execute($stmt)) {
        echo "Registro actualizado correctamente.";
    } else {
        echo "Error al actualizar el registro: " . mysqli_stmt_error($stmt);
    }

    mysqli_stmt_close($stmt);
    mysqli_close($conexion);

    // Redirección
    header("Location: ../admin.php");
    exit;
}
?>