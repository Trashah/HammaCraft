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
    <link rel="stylesheet" href="../css/pedidos.css"> 
    <script src = "../javascript/script.js" defer> </script>
    <style>
        body {
            background-color: #e5fefe; /* Morado claro */
            margin: 0;
            padding: 0;
        }
        .navbar {
            background-color: #fbffff; /* Azul celeste */
        }
        .formulario {
        width: 90%;
        max-width: 500px;
        margin: 2rem auto;
        background-color: #ffffff;
        border-radius: 10px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        padding: 20px;
        text-align: center;
        }
        .formulario .nombreusuario input[type="text"],
        .formulario .correousuario input[type="text"] {
            width: 100% !important;
            padding: 0.8rem !important;
            margin-bottom: 1rem !important;
            border: 1px solid #ccc !important;
            border-radius: 5px !important;
            font-size: 1rem !important;
        }
        /* Etiquetas */
        .formulario label {
            display: block;
            margin-bottom: 0.5rem;
            font-weight: bold;
        }
        /* Campos de texto */
        .formulario input[type="text"],
        .formulario textarea,
        .formulario input[type="file"] {
            width: 100%;
            padding: 0.8rem;
            margin-bottom: 1rem;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 1rem;
        }
        /* Botones */
        .formulario input[type="reset"],
        .formulario input[type="submit"] {
            width: 100%;
            padding: 0.8rem;
            margin-top: 1rem;
            font-size: 1rem;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            color: #fff;
            transition: background-color 0.3s ease;
        }
        /* Botón limpiar */
        .formulario input[type="reset"] {
            background-color: #f44336;
            width: 50%;
            padding: 0.6rem; /* Ajusta el relleno interno */
            font-size: 0.9rem; /* Reduce el tamaño del texto */
            margin-top: 1rem; /* Separación superior */
            border: none;
            border-radius: 5px;
            cursor: pointer;
            background-color: #f44336;
            color: #fff;
            transition: background-color 0.3s ease;
            display: block; /* Centra el botón si es necesario */
            margin-left: auto;
            margin-right: auto;
        }
        .formulario input[type="reset"]:hover {
            background-color: #d32f2f;
        }
        /* Botón enviar */
        .formulario input[type="submit"] {
            background-color: #4caf50;
        }
        .formulario input[type="submit"]:hover {
            background-color: #388e3c;
        }
        /* Opciones de tamaño */
        .formulario .sizeped input[type="radio"] {
            margin-right: 0.5rem;
            accent-color: #4caf50;
        }
        /* Título y alineación */
        center {
            text-align: center;
        }
        /* Ajuste de espacios */
        textarea {
            resize: none;
        }
    </style>

</head>

<body class = "body-hammacraft">

    <?php include 'header.php'; ?>

<main>
    <br>
    <div class="intro">
    <h1 class="titulo" style="line-height: 65px">¿Tiene algún pedido en especifico?</h1>
    <h2 class="descripcion">Rellene el siguiente formulario para realizar su pedido personalizado</h2>
    <br>
    </div>
    <script>
            
    function mostrarMensaje(event) {
    alert("Solicitud Enviada");
    }

    </script>
 
<div class="formulario">
 <form action = "pedidos-process.php" onsubmit="mostrarMensaje(event)" method="POST">
    <div class="nombreusuario">
      <label for="NombreU"> Ingrese su nombre: </label>
      <input type="text" name="NombreCliente">
    </div>

    <div class="correousuario">
      <label for="CorreoU"> Ingrese su correo de contacto: </label>
      <input type="text" name="CorreoCliente">
    </div>

    <div class="nombreped">
      <label for="NombreP"> Nombre del personaje/objeto: </label> 
      <input type="text" name="NombreP"> 
    </div>

    <div class="descped">
      <label for="Desc"> Descripción del personaje/objeto: </label> 
      <textarea cols="30" rows="3" name="Desc"></textarea>
    </div>
        
    <div class="sizeped">
      <label for="Size">¿De qué tamaño sería?</label>
      <input type="radio" name="Size" value="Chico"> Chico<br>
      <input type="radio" name="Size" value="Mediano"> Mediano<br>
      <input type="radio" name="Size" value="Grande"> Grande<br>
    </div>
        
    <br>

    <div class="imagenped">
      <label for="Imagen">Subir alguna imagen de referencia del personaje/objeto</label>
      <input type="file" name="Imagen">
    </div>

  <div class="submitped">
      <input type="submit" name = "action" value="Enviar Pedido">
  </div>

    <div class="resetped">
      <input type="reset" value=" Limpiar Solicitud ">
  </div>

 </form>
</div>

      
<div class=mecha>
    <center>
        <style>
            video {
                display: none;
                margin: 0 auto;
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

    <?php include "footer.php"; ?>
<script src = "javascript/script.js" defer> </script>

</body></html>
