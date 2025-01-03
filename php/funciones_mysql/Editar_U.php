<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Obtener los valores del formulario
    $idu = $_POST['idu'];
    $nombredeusuario = $_POST['nombredeusuario'];
    $nombreu = $_POST['nombreu'];
    $apellido = $_POST['apellido'];
    $email = $_POST['email'];

    // Validar campos obligatorios
    if (empty($idu) || empty($nombredeusuario) || empty($nombreu) || empty($apellido) || empty($email)) {
        die("Todos los campos son obligatorios.");
    }

    // Validar formato del email
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        die("El formato del correo electrónico no es válido.");
    }

    // Establecer conexión a la base de datos
    $servidor = "localhost";
    $usuario = "root";
    $password = "";
    $bd = "HammaCraft";

    $conexion = mysqli_connect($servidor, $usuario, $password, $bd);

    // Verificar si la conexión fue exitosa
    if (!$conexion) {
        die("Error de conexión a la base de datos: " . mysqli_connect_error());
    }

    // Sanitización de entradas para evitar SQL injection
    $idu = intval($idu); // Para asegurarse de que el ID sea un número
    $nombredeusuario = mysqli_real_escape_string($conexion, $nombredeusuario);
    $nombreu = mysqli_real_escape_string($conexion, $nombreu);
    $apellido = mysqli_real_escape_string($conexion, $apellido);
    $email = mysqli_real_escape_string($conexion, $email);

    // Validar que el ID sea positivo
    if ($idu <= 0) {
        die("ID de usuario inválido.");
    }

    // Construir la consulta SQL
    $sql = "UPDATE usuarios SET NombreDeUsuario = '$nombredeusuario', Nombre = '$nombreu', Apellido = '$apellido', 
    Email = '$email' WHERE ID = $idu";

    // Ejecutar la consulta
    if (mysqli_query($conexion, $sql)) {
        $sql2 = "INSERT INTO BITACORA(Usuario, Operacion) VALUES('superadmin', 'UPDATE Usuarios')";
        mysqli_query($conexion, $sql2);
        echo "Registro actualizado correctamente.";

        // Redirigir antes de cualquier salida
        header("Location: ../admin.php");
        exit; // Asegúrate de que el script se detenga después de la redirección
    } else {
        echo "Error al actualizar el registro: " . mysqli_error($conexion);
    }

    // Cerrar la conexión
    mysqli_close($conexion);
}
?>