<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['id'];
    $nombredeusuario = $_POST['nombredeusuario'];
    $nombre = $_POST['nombre'];
    $apellido = $_POST['apellido'];
    $email = $_POST['email'];

    // Sanitización de entradas para evitar SQL injection
    $id = intval($id); // Para asegurarse de que el ID sea un número
    $nombredeusuario = mysqli_real_escape_string($conexion, $nombredeusuario);
    $nombre = mysqli_real_escape_string($conexion, $nombre);
    $apellido = mysqli_real_escape_string($conexion, $apellido);
    $email = mysqli_real_escape_string($conexion, $email);

    // Establecer conexión a la base de datos
    $servidor = "localhost";
    $usuario = "root";
    $password = "";
    $bd = "HammaCraft";

    $conexion = mysqli_connect($servidor, $usuario, $password, $bd);

    if ($conexion) {
        // Construir la consulta SQL
        $sql = "UPDATE usuarios SET NombreDeUsuario = '$nombredeusuario', Nombre = '$nombre', Apellido = '$apellido', 
        Email = '$email' WHERE ID = $id";

        // Ejecutar la consulta
        if (mysqli_query($conexion, $sql)) {
            // Redirigir antes de cualquier salida
            header("Location: ../admin.php");
            exit; // Asegúrate de que el script se detenga después de la redirección
        } else {
            echo "Error al actualizar el registro: " . mysqli_error($conexion);
        }
    } else {
        echo "Error de conexión a la base de datos.";
    }

    // Cerrar la conexión
    mysqli_close($conexion);
}
?>