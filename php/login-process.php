<?php

include __DIR__ . '/../.gitignore/config.php';

$invalidLogin = false;

if ($_SERVER["REQUEST_METHOD"] === "POST") {

    if ($_POST["action"] === "Regístrate") {
        $username = $_POST["signupUsername"];
        $nombre = $_POST["signupName"];
        $apellido = $_POST["signupApellido"];
        $email = $_POST["signupEmail"];
        $password = $_POST["signupPassword"];
        $passwordHash = password_hash($_POST["signupPassword"], PASSWORD_DEFAULT);

        signupUser($username, $nombre, $apellido, $email, $password);
    } 

    else if ($_POST["action"] === "Inicia Sesión") {
        $username = $_POST["loginUsername"];
        $password = $_POST["loginPassword"];

        loginUser($username, $password);
    }

}

function checkEmptyInputs($username, $email, $password) {
    if (empty($username) || ($email !== null && empty($email)) || empty($password)) {
        die("Por favor, llene todos los campos.");
    }
}

function checkValidEmail($email) {
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        die("Por favor, ingrese un email válido.");
    }
}

function logUserCreation($username) {
    $connection = connectToDatabase();
    $action = "INSERT Usuarios";

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

function loginUser($username, $password) {
    $connection = connectToDatabase();
    checkEmptyInputs($username, NULL, $password);

    $sql = sprintf("SELECT * FROM usuarios WHERE NombreDeUsuario = '%s'", $connection -> real_escape_string($username));
    
    $result = $connection -> query($sql);

    $user = $result -> fetch_assoc();

    if ($user) {
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
        }
        else {
            die("Login inválido");
        }
    }
}


function signupUser($username, $nombre, $apellido, $email, $password) {
    $passwordHash = password_hash($_POST["signupPassword"], PASSWORD_DEFAULT);
    $connection = connectToDatabase();

    checkEmptyInputs($username, $email, $password);
    checkValidEmail($email);

    $sql = "INSERT INTO usuarios (NombreDeUsuario, Nombre, Apellido, Email, Password_Hash) VALUES (?, ?, ?, ?, ?)";
    $stmt = $connection -> stmt_init();

    if (!$stmt -> prepare($sql)) {
        die("Error de SQL: " . $connection -> error);
    }

    $stmt -> bind_param("sssss", $username, $nombre, $apellido, $email, $passwordHash);

    if($stmt -> execute()) {
        logUserCreation($username);
        loginUser($username, $password);
    }
    else {
        die("Error de SQL: " . $connection->error . " " . $connection->errno);
    }
}
