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

function checkEmptyInputs($newUsername, $newName, $newLastname, $newEmail, $newPassword) {
    if (empty($newUsername) || empty($newName) || empty($newLastname) || empty($newEmail) || empty($newPassword)) {
        echo "<script> 
                alert('Por favor, rellene todos los campos');
                window.location.href = 'usuario.php';
              </script>";
        exit;
    }
}

function checkValidEmail($newEmail) {
    if (!filter_var($newEmail, FILTER_VALIDATE_EMAIL)) {
        echo "<script> 
                alert('Por favor, ingrese un correo válido');
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

function updateSessionData($newUsername, $newName, $newLastname, $newEmail) {
    $_SESSION["nombre"] = $newName;
    $_SESSION["apellido"] = $newLastname;
    $_SESSION["userName"] = $newUsername;
    $_SESSION["correoDeUsuario"] = $newEmail;
}

function saveNewUserData($newUsername, $newName, $newLastname, $newEmail, $newPassword) {
    if (!isset($_SESSION['userID'])) {
        die("Error: No has iniciado sesión.");
    }

    $userID = $_SESSION['userID'];
    $newPasswordHash = password_hash($newPassword, PASSWORD_DEFAULT);

    $connection = connectToDatabase();

    // Validar entradas
    checkEmptyInputs($newUsername, $newName, $newLastname, $newEmail, $newPassword);
    checkValidEmail($newEmail);

    try {
        // Actualizar datos del usuario en la base de datos
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
            // Actualizar variables de sesión
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
