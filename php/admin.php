<?php

include 'functions.php';

session_start();

?>

<!DOCTYPE html>

<html lang="es">

    <head>
        
        <meta charset="utf-8">
        <meta name = "viewport" content="width=device-width, initial-scale=1">
        <title> Hammacraft - Página de Admin </title>
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
   
                <div class="vistas_sesiones_item1">  
                    <p class="fondo_conf_admin_tablas">
                        <br>Mi Admin
                        <br>&nbsp
                    </p>
                </div>
                
                <div class="vistas_sesiones_item2">
                
                <?php

                    tablasAdmin();

                ?>

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
