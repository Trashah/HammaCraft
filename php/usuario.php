<?php

include 'functions.php';

session_start();

$loggedIn = true;

if (!isset($_SESSION["userID"])) {
    $loggedIn = false;
}

$devMode = true;

if ($devMode && !$loggedIn) {
    $loggedIn = true;
    echo "<h1> Advertencia: Has entrado a la página sin haber iniciado sesión. Esto es solo posible ya que el modo dev esta activado. </h1> ";
}

if (!$loggedIn) {
    die("No has iniciado sesión >:c");
}

?>

<!DOCTYPE html>

<html lang="es">

    <head>
        
        <meta charset="utf-8">
        <meta name = "viewport" content="width=device-width, initial-scale=1">
        <title> HammaCraft - Página de usuario </title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
        <link rel="stylesheet" href="../css/styles.css">
        <script src = "/javascript/script.js" defer> </script>
        <style>
            body {
                background-color: #e5fefe; /* Morado claro */
            }
            .navbar {
                background-color: #fbffff; /* Azul celeste */
            }
        </style>

    </head>

    <body class = "body-hammacraft">

        <?php include 'header.php'; ?>

        <main>
        
        <br>
        <br>

            <div class="vistas_sesiones">
   
                <div class="vistas_sesiones_item1">  
                    <p class="fondo_conf">
                        <br>Configuración de Perfil
                        <br>&nbsp
                    </p>
                </div>
                
                <div class="vistas_sesiones_item2">
                
                    <br>

                    <p>Nombre de Usuario: <?php echo "$_SESSION[userName]";?></p>
                    <p>Nombre: <?php echo "$_SESSION[nombre]";?></p>
                    <p>Apellido: <?php echo "$_SESSION[apellido]";?></p>
                    <p>Correo: <?php echo "$_SESSION[correoDeUsuario]";?></p>
                
                    <br>
                
                    <form action = "usuario-process.php" method = "POST">
                        
                        <p>Nuevo Nombre de Usuario:<br>
                            <input type="text" name="nuevo_usuario" size="30">
                        </p>
                        
                        <p>Nuevo Nombre:<br>
                            <input type="text" name="nuevo_nombre" size="30">
                        </p>
                        
                        <p>Nuevo Apellido:<br>
                            <input name="nuevo_apellido" size="30">
                        </p>
                        
                        <p>Nuevo Correo:<br>
                            <input name="nuevo_correo" size="30">
                        </p>
                        
                        <p>Nueva Contraseña:<br>
                            <input type="password" name="nueva_pass" id="id_password" size="30">
                            <img src="/images/eyeslash.png" width=3% height=3% id="togglePassword" class="togglePassword">
                        </p>
                        
                        <br>

                        <div class="botones_usuario">
                            <input type="reset" value="Deshacer cambios" class="boton_borrar"> &nbsp&nbsp
                            <input type="submit" name = "action" value="Confirmar cambios" class="boton_enviar">
                        </div>

                    </form>

                    <br>

                </div>

            </div>

            <br>
            <br>
            
        </main>

        <?php include "footer.php"; ?>

        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    </body>
    
</html>
