<?php

session_start();

?>

<!DOCTYPE html>

<html lang="es">

<head>
	
    <meta charset="utf-8">
	<meta name = "viewport" content="width=device-width, initial-scale=1">
	<title> HammaCraft </title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link rel="stylesheet" href="../css/styles.css">
    <script src = "../javascript/script.js" defer> </script>
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

        <center>
        <h1>¿Tiene algún pedido en especifico?</h1>
        <br>
        <br>
        <h2>Rellene el siguiente formulario para realizar su pedido personalizado</h2>
        <br>
        
        <script>
            
            function mostrarMensaje(event) {
                event.preventDefault();
                alert("Solicitud Enviada");
                location.reload();
            }

        </script>
        
        <form onsubmit="mostrarMensaje(event)">
            <label for="NombreP"> Nombre del personaje/objeto: </label> <input type="text"> <br>
            <label for="Desc"> Descripción del personaje/objeto: </label> <br>
            <textarea cols="30" rows="3"></textarea>
            <br>
            <label for="Size"> ¿De qué tamaño sería?</label>
            <input type="radio" name="option"> Chico
            <input type="radio" name="option"> Mediano
            <input type="radio" name="option"> Grande
            <br>
            <label for="Imagen">Subir alguna imagen de referencia del personaje/objeto</label>
            <br>
            <input type="file">
            <br>
            <br>
            <input type="reset" value=" Limpiar Solicitud ">
            <input type="submit" value=" Enviar Pedido ">
            <br>
            <br>
        </form>
        </center>
<div>
    <center>
        <style>
            video {
                display: none;
                

            }
        </style>
    <video id="konamiVideo" controls>
        <source src="mecha.mp4" type="video/mp4">
        Tu navegador no soporta la reproducción de videos.
      </video>
    
      <script>
        // Secuencia del Código Konami: ↑ ↑ ↓ ↓ ← → ← → B A
        const konamiCode = [
          "ArrowUp", "ArrowUp", 
          "ArrowDown", "ArrowDown", 
          "ArrowLeft", "ArrowRight", 
          "ArrowLeft", "ArrowRight", 
          "b", "a"
        ];
        
        let currentIndex = 0;
    
        document.addEventListener("keydown", (event) => {
          // Verificar la tecla presionada
          if (event.key === konamiCode[currentIndex]) {
            currentIndex++;
            // Si la secuencia está completa
            if (currentIndex === konamiCode.length) {
              activateKonamiCode();
              currentIndex = 0; // Reiniciar el índice para futuras ejecuciones
            }
          } else {
            currentIndex = 0; // Reiniciar si la tecla es incorrecta
          }
        });
    
        function activateKonamiCode() {
          const video = document.getElementById("konamiVideo");
          video.style.display = "block"; // Mostrar el video
          video.play(); // Reproducir el video
          alert("¡IT'S MECHA MECHA TIME!");
        }
      </script>
      </center>
</div>


    </main>

    <footer>

        <div class="footer-content">

            <div class="footer-section">

                <h3>MENU</h3>

                <ul>

                    <li><a href="https://www.hammacraft.lat/">Pantalla principal</a></li>
                    <li><a href="https://www.hammacraft.lat/php/catalogo.php">Tienda</a></li>

                </ul>

            </div>

            <div class="footer-section">

                <h3>Siguenos</h3>

                <ul>

                    <li><a href="https://www.hammacraft.lat/#facebook">Facebook</a></li>
                    <li><a href="https://www.hammacraft.lat/#twitter">Twitter</a></li>
                    <li><a href="https://www.hammacraft.lat/#instagram">Instagram</a></li>

                </ul>

            </div>

        </div>

    </footer>

</body></html>
