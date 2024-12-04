<?php

include 'functions.php';

session_start();

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
        <script src = "../javascript/script.js" defer> </script>
        <script src="javascript\catalago_carrito.js" defer></script>
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
        
            <div class="vistas_sesiones">
   
                <div class="vistas_sesiones_item1"><br>Configuración de Perfil</div>
                
                <div class="vistas_sesiones_item2">
                
                <p>Nombre: <?php echo "Nombre usuario";?></p>
                <p>Correo: <?php echo "Correo usuario"?></p>
                <p>Contraseña: <?php echo "Correo usuario"?></p>
                
                <br>
                
                <form>
                    
                    <p>Nuevo nombre:&nbsp
                    <input type="text" name="nuevo_nombre" size="30">
                    </p>
                    <p>Nuevo correo:&nbsp
                    <input type="text" name="nuevo_correo" size="30">
                    </p>
                    <p>Nueva contraseña:&nbsp
                    <input type="password" name="nueva_pass" size="30">
                    </p>
                    
                </form>
                
                </div>

            </div>

        </main>

        <?php include "footer.php"; ?>

        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    </body>
    
</html>
