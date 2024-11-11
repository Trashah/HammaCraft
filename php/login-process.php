<?php

include __DIR__ . '/../.gitignore/config.php';

$invalidLogin = false;

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    if ($_POST["action"] === "Regístrate") {
        signupUser();
    } else if ($_POST["action"] === "Inicia Sesión") {
        loginUser();
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

function loginUser() {
    $connection = connectToDatabase();
    $username = $_POST["loginUsername"];
    $password = $_POST["loginPassword"];
    checkEmptyInputs($username, NULL, $password);

    $sql = sprintf("SELECT * FROM usuarios WHERE Nombre = '%s'", $connection -> real_escape_string($username));
    
    $result = $connection -> query($sql);

    $user = $result -> fetch_assoc();

    if ($user) {
        if (password_verify($password, $user["Password_Hash"])) {
            session_start();
            $_SESSION["userID"] = $user["ID"];
            header("Location: ../index.php");
            exit;
        }
        else {
            die("Login inválido");
        }
    }
}


function signupUser() {
    $connection = connectToDatabase();
    $username = $_POST["signupUsername"];
    $email = $_POST["signupEmail"];
    $password = password_hash($_POST["signupPassword"], PASSWORD_DEFAULT);

    checkEmptyInputs($username, $email, $password);
    checkValidEmail($email);

    $sql = "INSERT INTO usuarios (Nombre, Email, Password_Hash) VALUES (?, ?, ?)";
    $stmt = $connection -> stmt_init();

    if (!$stmt -> prepare($sql)) {
        die("Error de SQL: " . $connection -> error);
    }

    $stmt -> bind_param("sss", $username, $email, $password);

    if($stmt -> execute()) {
        echo "Registro exitoso.";
    }
    else {
        die("Error de SQL: " . $connection->error . " " . $connection->errno);
    }
}