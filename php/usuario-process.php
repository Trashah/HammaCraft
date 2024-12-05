<?php

include __DIR__ . '/../.gitignore/config.php';

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
                alert('Por favor, rellene todos los campos') 
                window.location.href = 'usuario.php';
              </script>";
        exit;
    }
}

function checkValidEmail($newEmail) {
    if (!filter_var($newEmail, FILTER_VALIDATE_EMAIL)) {
        echo "<script> 
                alert('Por favor, ingrese un correo valido') 
                window.location.href = 'usuario.php';
              </script>";
        exit;
    }
}

function saveNewUserData($newUsername, $newName, $newLastname, $newEmail, $newPassword) {
    $connection = connectToDatabase();

    checkEmptyInputs($newUsername, $newName, $newLastname, $newEmail, $newPassword);
    checkValidEmail($newEmail);

    header("Location: usuario.php");
}