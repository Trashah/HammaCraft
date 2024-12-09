<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['id'];
    $nombredeusuario = $_POST['nombredeusuario'];
    $nombreu = $_POST['nombreu'];
    $apellido = $_POST['apellido'];
    $email = $_POST['email'];

    $servidor = "localhost";
    $usuario = "root";
    $password = "";
    $bd = "HammaCraft";

    $conexion = mysqli_connect($servidor, $usuario, $password, $bd);

    if ($conexion) {
        checkEmptyInputsUsuarioA($nombredeusuario, $nombreu, $apellido, $email);
        checkValidEmailUsuarioA($email);
        checkValidNameA($nombreu);
        checkValidLastnameA($apellido);
        checkUsernameLengthA($nombredeusuario);

        $sql = "UPDATE productos SET NombreDeUsuario = '$nombredeusuario', Nombre = '$nombreu', Apellido = '$apellido', 
        Email = '$email' WHERE ID = $id";
        if (mysqli_query($conexion, $sql)) {
            echo "Registro actualizado correctamente.";
        } else {
            echo "Error al actualizar el registro: " . mysqli_error($conexion);
        }
    } else {
        echo "Error de conexión a la base de datos.";
    }

    mysqli_close($conexion);
    header("Location: ../admin.php");
    exit;
}
?>