<?php

include __DIR__ . '/../.gitignore/config.php';

$invalidLogin = false;

if ($_SERVER["REQUEST_METHOD"] === "POST") {

    if ($_POST["action"] === "Regístrate") {
        $username = $_POST["signupUsername"];
        $Nombre = $_POST["signupName"];
        $Apellido = $_POST["signupApellido"];
        $email = $_POST["signupEmail"];
        $password = $_POST["signupPassword"];
        $passwordHash = password_hash($_POST["signupPassword"], PASSWORD_DEFAULT);

        signupUser($username, $email, $password);
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
            $_SESSION["userName"] = $user["NombreDeUsuario"];
            $_SESSION["tipoDeUsuario"] = $user["Tipo"];
            header("Location: ../index.php");
            exit;
        }
        else {
            die("Login inválido");
        }
    }
}


function signupUser($username, $email, $password) {
    $passwordHash = password_hash($_POST["signupPassword"], PASSWORD_DEFAULT);
    $connection = connectToDatabase();

    checkEmptyInputs($username, $email, $password);
    checkValidEmail($email);

    $sql = "INSERT INTO usuarios (NombreDeUsuario, Email, Password_Hash) VALUES (?, ?, ?)";
    $stmt = $connection -> stmt_init();

    if (!$stmt -> prepare($sql)) {
        die("Error de SQL: " . $connection -> error);
    }

    $stmt -> bind_param("sss", $username, $email, $passwordHash);

    if($stmt -> execute()) {
        loginUser($username, $password);
    }
    else {
        die("Error de SQL: " . $connection->error . " " . $connection->errno);
    }
}