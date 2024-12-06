<?php

include __DIR__ . '/../.gitignore/config.php';

$invalidLogin = false;

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Verificar si es registro o inicio de sesión
    if ($_POST["action"] === "Regístrate") {
        // Obtener los datos del formulario
        $username = $_POST["signupUsername"];
        $nombre = $_POST["signupName"];
        $apellido = $_POST["signupApellido"];
        $email = $_POST["signupEmail"];
        $password = $_POST["signupPassword"];

        // Validaciones
        validateInputs($nombre, $apellido, $username, $email, $password);

        // Crear hash de la contraseña
        $passwordHash = password_hash($password, PASSWORD_DEFAULT);

        // Registrar al usuario
        signupUser($nombre, $apellido, $username, $email, $passwordHash);
    } else if ($_POST["action"] === "Inicia Sesión") {
        // Obtener los datos del formulario de inicio de sesión
        $username = $_POST["loginUsername"];
        $password = $_POST["loginPassword"];

        // Validar y autenticar al usuario
        loginUser($username, $password);
    }
}

// Función para validar los datos del formulario
function validateInputs($nombre, $apellido, $username, $email, $password) {
    // Validar que no haya campos vacíos
    if (empty($nombre) || empty($apellido) || empty($username) || empty($email) || empty($password)) {
        die("Por favor, llene todos los campos.");
    }

    // Validar que el nombre y apellido no contengan números
    if (!preg_match("/^[a-zA-ZáéíóúÁÉÍÓÚñÑ\s]+$/", $nombre)) {
        die("El nombre no debe contener números ni caracteres especiales.");
    }

    if (!preg_match("/^[a-zA-ZáéíóúÁÉÍÓÚñÑ\s]+$/", $apellido)) {
        die("El apellido no debe contener números ni caracteres especiales.");
    }

    // Validar el nombre de usuario (mínimo 8 caracteres)
    if (strlen($username) < 8) {
        die("El nombre de usuario debe tener al menos 8 caracteres.");
    }

    // Validar la contraseña (mínimo 6 caracteres)
    if (strlen($password) < 6) {
        die("La contraseña debe tener al menos 6 caracteres.");
    }

    // Validar el correo electrónico
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        die("Por favor, ingrese un correo electrónico válido.");
    }
}

// Función para iniciar sesión
function loginUser($username, $password) {
    $connection = connectToDatabase();

    // Validar que los campos no estén vacíos
    if (empty($username) || empty($password)) {
        die("Por favor, llene todos los campos.");
    }

    // Consulta para buscar el usuario
    $sql = sprintf("SELECT * FROM usuarios WHERE NombreDeUsuario = '%s'", $connection->real_escape_string($username));
    $result = $connection->query($sql);

    $user = $result->fetch_assoc();

    if ($user) {
        // Verificar la contraseña
        if (password_verify($password, $user["Password_Hash"])) {
            session_start();
            $_SESSION["userID"] = $user["ID"];
            $_SESSION["nombre"] = $user["Nombre"];
            $_SESSION["apellido"] = $user["Apellido"];
            $_SESSION["userName"] = $user["NombreDeUsuario"];
            $_SESSION["tipoDeUsuario"] = $user["Tipo"];
            $_SESSION["correoDeUsuario"] = $user["Email"];
            header("Location: ../index.php");
            exit;
        } else {
            die("Contraseña incorrecta.");
        }
    } else {
        die("Usuario no encontrado.");
    }
}

// Función para registrar al usuario
function signupUser($nombre, $apellido, $username, $email, $passwordHash) {
    $connection = connectToDatabase();

    // Consulta preparada para evitar inyección SQL
    $sql = "INSERT INTO usuarios (Nombre, Apellido, NombreDeUsuario, Email, Password_Hash) VALUES (?, ?, ?, ?, ?)";
    $stmt = $connection->stmt_init();

    if (!$stmt->prepare($sql)) {
        die("Error de SQL: " . $connection->error);
    }

    $stmt->bind_param("sssss", $nombre, $apellido, $username, $email, $passwordHash);

    // Ejecutar la consulta
    if ($stmt->execute()) {
        // Iniciar sesión automáticamente después del registro
        loginUser($username, $_POST["signupPassword"]);
    } else {
        die("Error al registrar al usuario: " . $connection->error);
    }
}
