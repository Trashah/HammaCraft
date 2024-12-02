<?php

include __DIR__ . '/../.gitignore/config.php';

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    if ($_POST["action"] === "Enviar Pedido") {
        $name = $_POST["NombreCliente"];
        $email = $_POST["CorreoCliente"];
        $productName = $_POST["NombreP"];
        $productDescription = $_POST["Desc"];
        $size = $_POST["Size"];

        saveOrder($name, $email, $productName, $productDescription, $size);
    } 
}

function checkEmptyInputs($name, $email, $productName, $productDescription, $size) {
    if (empty($name) || ($email !== null && empty($email)) || empty($productName) || empty($productDescription) || empty($size)) {
        die("Por favor, llene todos los campos.");
    }
}

function checkValidEmail($email) {
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        die("Por favor, ingrese un email válido.");
    }
}

function getUserIDWithEmail($email) {
    $connection = connectToDatabase();

    $sql = "SELECT ID FROM usuarios WHERE Email = ?";
    $statement = $connection -> stmt_init();

    if (!$statement -> prepare($sql)) {
        die("Error de SQL: " . $connection -> error);
    }

    $statement -> bind_param("s", $email);

    if (!$statement -> execute()) {
        die ("Error de SQL: " . $connection -> error . " " . $connection -> errno);
    }

    $statement -> bind_result($ID);

    if (!$statement -> fetch()) {
        $statement -> close();
        die ("Por favor, ingrese un correo registrado");
    }

    $statement -> close();
    return $ID;
}

function saveOrder($name, $email, $productName, $productDescription, $size) {
    $connection = connectToDatabase();

    checkEmptyInputs($name, $email, $productName, $productDescription, $size);
    checkValidEmail($email);

    $IDCliente = getUserIDWithEmail($email);

    $sql = "INSERT INTO pedidos (IDCliente, NombreCliente, CorreoCliente, NombrePO, DescPO, Tamano) VALUES (?, ?, ?, ?, ?, ?)";
    $statement = $connection -> stmt_init();

    if (!$statement -> prepare($sql)) {
        die("Error de SQL: " . $connection -> error);
    }

    $statement -> bind_param("isssss", $IDCliente, $name, $email, $productName, $productDescription, $size);

    if(!$statement -> execute()) {
        $statement -> close();
        die("Error de SQL: " . $connection->error . " " . $connection->errno);
    }
    
    $statement -> close();
    header("Location: pedidos.php");
}