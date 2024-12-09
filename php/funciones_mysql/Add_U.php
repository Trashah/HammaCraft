<?php

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $nombreDeUsuario = $_POST['nombreDeUsuario'];
    $nombreU = $_POST['nombreU'];
    $apellido = $_POST['apellido'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $tipo = $_POST['tipo'];

    $passwordHash = password_hash($password, PASSWORD_DEFAULT);

    $servidor = "localhost";
    $usuario = "root";
    $password = "";
    $bd = "HammaCraft";

    $conexion = mysqli_connect($servidor, $usuario, $password, $bd);

    if (!$conexion) {
        die ("Error de conexión a la base de datos.");
    }

    $sqlUsuario = "INSERT INTO Usuarios
                   (NombreDeUsuario, Nombre, Apellido, Email, Password_Hash, Tipo)
                   VALUES
                   ('$nombreDeUsuario', '$nombreU', '$apellido', '$email', '$passwordHash', '$tipo')
                  ";

    if (!mysqli_query($conexion, $sqlUsuario)) {
        die("Error al actualizar el registro: " . mysqli_error($conexion));
    } 

    echo "Usuario insertado con éxito";

    $sqlBitacora = "INSERT INTO Bitacora (Usuario, Operacion) VALUES ('superadmin', 'INSERT Usuario')";

    if (!mysqli_query($conexion, $sqlBitacora)) {
        die("Error al actualizar la bitacora: " . mysqli_error($conexion));
    } 

    echo "Bitacora actualizada con éxito";

    mysqli_close($conexion);
    header("Location: ../admin.php");
    exit;
}

?>