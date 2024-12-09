<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    var_dump($_POST); // Muestra todos los datos enviados
    $id = $_POST['id'];
    $nombredeusuario = $_POST['nombredeusuario'];
    $nombreu = $_POST['nombreu'];
    $apellido = $_POST['apellido'];
    $email = $_POST['email'];

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
    $sql = "UPDATE productos SET NombreDeUsuario = $nombredeusuario, Nombre = $nombreu, Apellido = $apellido, Email = $email WHERE ID = $id";
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