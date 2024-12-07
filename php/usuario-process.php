<?php

include __DIR__ . '/../.gitignore/config.php';

// Asegurarse de que la sesión esté activa
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    if ($_POST["action"] === "Confirmar cambios") {
        $newUsername = $_POST["nuevo_usuario"];
        $newName = $_POST["nuevo_nombre"];
        $newLastname = $_POST["nuevo_apellido"];
        $newEmail = $_POST["nuevo_correo"];
        $newPassword = $_POST["nueva_pass"];

        saveNewUserData($newUsername, $newName, $newLastname, $newEmail, $newPassword);
    }
}

function checkEmptyInputsUsuario($newUsername, $newName, $newLastname, $newEmail, $newPassword) {
    if (empty($newUsername) || empty($newName) || empty($newLastname) || empty($newEmail) || empty($newPassword)) {
        echo "<script> 
                alert('Por favor, rellene todos los campos');
                window.location.href = 'usuario.php';
              </script>";
        exit;
    }
}

function checkValidEmailUsuario($newEmail) {
    if (!filter_var($newEmail, FILTER_VALIDATE_EMAIL)) {
        echo "<script> 
                alert('Por favor, ingrese un correo válido');
                window.location.href = 'usuario.php';
              </script>";
        exit;
    }
}

function checkValidName($name) {
    if (preg_match('/\d/', $name)) {
        echo "<script> 
                alert('El nombre no puede contener números');
                window.location.href = 'usuario.php';
              </script>";
        exit;
    }
}

function checkValidLastname($lastname) {
    if (preg_match('/\d/', $lastname)) {
        echo "<script> 
                alert('El apellido no puede contener números');
                window.location.href = 'usuario.php';
              </script>";
        exit;
    }
}

function checkUsernameLength($username) {
    if (strlen($username) < 8) {
        echo "<script> 
                alert('El nombre de usuario debe tener al menos 8 caracteres');
                window.location.href = 'usuario.php';
              </script>";
        exit;
    }
}

function checkPasswordLength($password) {
    if (strlen($password) < 6) {
        echo "<script> 
                alert('La contraseña debe tener al menos 6 caracteres');
                window.location.href = 'usuario.php';
              </script>";
        exit;
    }
}

function logUserChange($username) {
    $connection = connectToDatabase();
    $action = "UPDATE Usuarios";

    $sql = "INSERT INTO Bitacora (Usuario, Operacion) VALUES (?, ?)";

    $statement = $connection -> stmt_init();

    if (!$statement -> prepare($sql)) {
        die("Error de SQL al preparar la consulta de bitácora: " . $connection -> error);
    }
    
    $statement -> bind_param("ss", $username, $action);

    if (!$statement -> execute()) {
        die("Error de SQL al ejecutar la consulta de bitácora: " . $connection -> error);
    }
}

function saveNewUserData($newUsername, $newName, $newLastname, $newEmail, $newPassword) {
    if (!isset($_SESSION['userID'])) {
        die("Error: No has iniciado sesión.");
    }

    $userID = $_SESSION['userID'];
    $newPasswordHash = password_hash($newPassword, PASSWORD_DEFAULT);

    $connection = connectToDatabase();

    // Validar entradas
    checkEmptyInputsUsuario($newUsername, $newName, $newLastname, $newEmail, $newPassword);
    checkValidEmailUsuario($newEmail);
    checkValidName($newName);
    checkValidLastname($newLastname);
    checkUsernameLength($newUsername);
    checkPasswordLength($newPassword);

    try {
        $sql = "UPDATE usuarios 
                SET NombreDeUsuario = ?, 
                    Nombre = ?, 
                    Apellido = ?, 
                    Email = ?, 
                    Password_Hash = ? 
                WHERE ID = ?";
        
        $stmt = $connection->prepare($sql);

        if (!$stmt) {
            throw new Exception("Error al preparar la consulta: " . $connection->error);
        }

        $stmt->bind_param("sssssi", $newUsername, $newName, $newLastname, $newEmail, $newPasswordHash, $userID);

        if ($stmt->execute()) {
            $_SESSION['userName'] = $newUsername;
            $_SESSION['nombre'] = $newName;
            $_SESSION['apellido'] = $newLastname;
            $_SESSION['correoDeUsuario'] = $newEmail;

            logUserChange($newUsername);

            echo "<script>
                    alert('Datos actualizados con éxito.');
                    window.location.href = 'usuario.php';
                  </script>";
            exit;
        } else {
            throw new Exception("Error al ejecutar la consulta: " . $stmt->error);
        }
    } catch (Exception $e) {
        echo "<script>
                alert('Error al actualizar los datos: " . $e->getMessage() . "');
                window.location.href = 'usuario.php';
              </script>";
        exit;
    }
}

?>
