<?php

include __DIR__ . '/../.gitignore/config.php';

function getProducts($lowerLimit, $rowCount) {
    $connection = connectToDatabase();
    $sql = "SELECT * FROM productos LIMIT ?, ?";
    $statement = $connection->prepare($sql);
    $statement->bind_param("ii", $lowerLimit, $rowCount);
    $statement->execute();
    $result = $statement->get_result(); 

    $output = '';
    while ($row = $result->fetch_assoc()) {
        $output .= '<div class = "product-card">';
        $output .= '<img class = "card-1" src = "../images/' . htmlspecialchars($row['Imagen']) . '" alt = "' . htmlspecialchars($row['NombreProducto']) . '">';
        $output .= '<h3>' . htmlspecialchars($row['NombreProducto']) . '</h3>';
        $output .= '<p>$' . number_format($row['Precio'], 2) . '</p>';
        $output .= '</div>';
    }

    $statement->close();

    return $output;
}

function getQueryResult($category1, $category2, $category3) {
    $connection = connectToDatabase();
    $conditions = [];
    $params = [];
    $types = "";

    if ($category1 !== "Todos") {
        $conditions[] = "categoria1 = ?";
        $params[] = $category1;
        $types .= "s";
    }

    if ($category2 !== "Todos") {
        $conditions[] = "categoria2 = ?";
        $params[] = $category2;
        $types .= "s";
    }

    if ($category3 !== "Todos") {
        $conditions[] = "categoria3 = ?";
        $params[] = $category3;
        $types .= "s";
    }

    $sql = "SELECT * FROM productos";

    if (!empty($conditions)) {
        $sql .= " WHERE " . implode(" AND ", $conditions);
    }

    $statement = $connection -> prepare($sql);

    if (!empty($params)) {
        $statement -> bind_param($types, ...$params);
    }

    $statement -> execute();
    $result = $statement -> get_result();
    $statement -> close();

    return $result;
}

function getProductsCards($category1, $category2, $category3) {

    //category1 = [Todos, Chicos, Medianos, Grandes]
    //category2 = [Todos, Anime, Videojuegos]
    //category3 = [Todos, Pokemon, Digimon, Youtuber]

    $colClass = "";
    $cardClass = "card";
    $imgClass = "card-img-top";
    $buttonClass = "btn btn-primary";

    $result = getQueryResult($category1, $category2, $category3);

    $output = '';

    while ($row = $result->fetch_assoc()) {
        $output .= '<div class="' . htmlspecialchars($colClass) . '">';
        $output .= '<div class="' . htmlspecialchars($cardClass) . '" style="width: 18rem; margin: 50px;">';
        $output .= '<img class="' . htmlspecialchars($imgClass) . '" src="/images/' 
                    . htmlspecialchars($row['Imagen']) . '" width="150" height="250" alt="' 
                    . htmlspecialchars($row['NombreProducto']) . '">';
        $output .= '<div class="card-body">';
        $output .= '<h2 class="card-title font-weight-bold">' . htmlspecialchars($row['NombreProducto']) . '</h2>';
        $output .= '<h5 class="card-title font-weight-bold">Descripción</h5>';
        $output .= '<p class="card-text">' . htmlspecialchars($row['Descripcion']) . '</p>'; 
        $output .= '<h5 class="card-title font-weight-bold">Categorías</h5>';
        $output .= '<p class="card-text">' . htmlspecialchars($row['Categoria1']) . ', ' . htmlspecialchars($row['Categoria2']) .'</p>'; 
        $output .= '<b class="card-text">$' . number_format($row['Precio'], 2) . '</b>';
        
        $output .= '<br><br>';
        
        // Button
        $output .= 
        '<form action = "/php/carrito_compras.php" method = "POST">
        <input type = "hidden" name = "productID" value = "' . htmlspecialchars($row['ID_P']) . '">
        <button type = "submit" class="' . htmlspecialchars($buttonClass) . '">Añadir a Carrito</button>
        </form>';
        $output .= '</div>';
        $output .= '</div>';
        $output .= '</div>';
    }

    return $output;
}
function checkEmptyInputsUsuarioA($newUsername, $newName, $newLastname, $newEmail) {
    if (empty($newUsername) || empty($newName) || empty($newLastname) || empty($newEmail) || empty($newPassword)) {
        echo "<script> 
                alert('Por favor, rellene todos los campos');
                window.location.href = 'admin.php';
              </script>";
        exit;
    }
}

function checkValidEmailUsuarioA($newEmail) {
    if (!filter_var($newEmail, FILTER_VALIDATE_EMAIL)) {
        echo "<script> 
                alert('Por favor, ingrese un correo válido');
                window.location.href = 'admin.php';
              </script>";
        exit;
    }
}

function checkValidNameA($name) {
    if (preg_match('/\d/', $name)) {
        echo "<script> 
                alert('El nombre no puede contener números');
                window.location.href = 'admin.php';
              </script>";
        exit;
    }
}

function checkValidLastnameA($lastname) {
    if (preg_match('/\d/', $lastname)) {
        echo "<script> 
                alert('El apellido no puede contener números');
                window.location.href = 'admin.php';
              </script>";
        exit;
    }
}

function checkUsernameLengthA($username) {
    if (strlen($username) < 8) {
        echo "<script> 
                alert('El nombre de usuario debe tener al menos 8 caracteres');
                window.location.href = 'admin.php';
              </script>";
        exit;
    }
}

function tablasAdmin() {

    $servidor = "localhost";
    $usuario = "root";
    $password = "";
    $bd = "HammaCraft";

    $conexion = mysqli_connect($servidor, $usuario, $password, $bd);

    // Estilos para el diseño
    echo "
        <style>
            body {
                font-family: Arial, sans-serif;
            }
            .section {
                margin: 20px 0;
            }
            .section-header {
                background-color: #DFFFFF; /* Color azul claro */
                color: #808080;;
                font-weight: bold;
                padding: 15px;
                text-transform: uppercase;
            }
            .table-container {
                width: 100%;
                margin: 0 auto;
                border-collapse: collapse;
            }
            .table-container td {
                padding: 10px;
                border: 1px solid #ddd;
                text-align: left;
            }
            .action-buttons {
                display: flex;
                gap: 10px;
            }
            .action-button {
                display: inline-flex;
                align-items: center;
                background-color: #f8f9fa; /* Fondo claro */
                color: #333;
                border: 1px solid #ddd;
                border-radius: 5px;
                padding: 5px 10px;
                text-decoration: none;
                font-size: 14px;
                cursor: pointer;
                transition: background-color 0.3s ease;
            }
            .action-button:hover {
                background-color: #e9ecef;
            }
            .action-button.edit {
                color: #ffc107; /* Amarillo */
            }
            .action-button.delete {
                color: #ff6961; /* Rojo */
            }

            .modal {
                display: none;
                position: fixed;
                z-index: 1000;
                left: 0;
                top: 0;
                width: 100%;
                height: 100%;
                overflow: auto;
                background-color: rgba(0, 0, 0, 0.5); /* Fondo semi-transparente */
                justify-content: center;
                align-items: center;
            }

            .modal-button {
                display: inline-flex;
                align-items: center;
                background-color: #ffc107;
                color: white;
                border: none;
                border-radius: 5px;
                padding: 10px 15px;
                font-size: 14px;
                cursor: pointer;
                transition: background-color 0.3s ease;
            }
            .modal-button:hover {
                background-color: #e0a800;
            }

            .modal-content {
                background-color: white;
                padding: 20px;
                border-radius: 5px;
                width: 50%;
                box-shadow: 0 5px 15px rgba(0, 0, 0, 0.3);
            }
            .modal-header {
                font-weight: bold;
                margin-bottom: 10px;
            }
            .modal-close {
                float: right;
                cursor: pointer;
                color: #aaa;
                font-size: 18px;
            }
            .modal-close:hover {
                color: #000;
            }
        </style>
    ";

    // Script para manejar el modal
    echo "
    <script>
        function openModal_p(id, nombre, descripcion, precio, categoria1, categoria2, categoria3, stock) {
            const modal = document.getElementById('editModal_p');
            modal.style.display = 'flex';
            document.getElementById('editId').value = id;
            document.getElementById('editNombre').value = nombre;
            document.getElementById('editDescripcion').value = descripcion;
            document.getElementById('editPrecio').value = precio;
            document.getElementById('editCategoria1').value = categoria1;
            document.getElementById('editCategoria2').value = categoria2;
            document.getElementById('editCategoria3').value = categoria3;
            document.getElementById('editStock').value = stock;
        }
        function closeModal_p() {
            const modal = document.getElementById('editModal_p');
            modal.style.display = 'none';
        }

";

echo "
<script>
    function openModal_u(id, nombredeusuario, nombre, apellido, email) {
        document.getElementById('editId').value = id;
        document.getElementById('editNombreDeUsuario').value = nombredeusuario;
        document.getElementById('editNombre').value = nombre;
        document.getElementById('editApellido').value = apellido;
        document.getElementById('editEmail').value = email;

        document.getElementById('editModal_u').style.display = 'block';
    }

    function closeModal_u() {
        const modal = document.getElementById('editModal_u');
        modal.style.display = 'none';
    }
</script>
";

    // Modal Edicion Productos
    echo "
    <div id='editModal_p' class='modal'>
        <div class='modal-content'>
            <span class='modal-close' onclick='closeModal_p()'>&times;</span>
            <div class='modal-header'>Editar Registro Producto</div>
            <form action='funciones_mysql/Editar_p.php' method='POST'>
                <input type='hidden' id='editId' name='id'>
                <label for='editNombre'>Nombre del Producto:</label><br>
                <input type='text' id='editNombre' name='nombre'><br><br>
                <label for='editDescripcion'>Descripción:</label><br>
                <textarea id='editDescripcion' name='descripcion'></textarea><br><br>
                <label for='editPrecio'>Precio del Producto:</label><br>
                <input type='text' id='editPrecio' name='precio'><br><br>
                <label for='editCategoria1'>Primera Categoria del Producto:</label><br>
                <input type='text' id='editCategoria1' name='categoria1'><br><br>
                <label for='editCategoria2'>Segunda Categoria del Producto:</label><br>
                <input type='text' id='editCategoria2' name='categoria2'><br><br>
                <label for='editCategoria3'>Tercera Categoria del Producto:</label><br>
                <input type='text' id='editCategoria3' name='categoria3'><br><br>
                <label for='editStock'>Stock del Producto:</label><br>
                <input type='text' id='editStock' name='stock'><br><br>
                <button type='submit' class='modal-button'>Guardar Cambios</button>
            </form>
        </div>
    </div>
";

echo "
<div id='editModal_u' class='modal' role='dialog' aria-labelledby='modalTitle' aria-hidden='true'>
    <div class='modal-content'>
        <span class='modal-close' onclick='closeModal_u()' aria-label='Cerrar'>&times;</span>
        <h2 id='modalTitle' class='modal-header'>Editar Registro Usuario</h2>
        <form action='funciones_mysql/Editar_U.php' method='POST'>
            <input type='hidden' id='editId' name='id'>

            <label for='editNombreDeUsuario'>Nombre de usuario:</label><br>
            <input type='text' id='editNombreDeUsuario' name='nombredeusuario' required><br><br>
            
            <label for='editNombre'>Nombre:</label><br>
            <input type='text' id='editNombre' name='nombre' required><br><br>
            
            <label for='editApellido'>Apellido:</label><br>
            <input type='text' id='editApellido' name='apellido' required><br><br>
            
            <label for='editEmail'>Dirección de correo:</label><br>
            <input type='email' id='editEmail' name='email' required><br><br>
            
            <button type='submit' class='modal-button'>Guardar Cambios</button>
        </form>
    </div>
</div>
";

    // Sección: Productos
    echo "<div class='section'>";
    echo "<div class='section-header'>Productos</div>";
    echo "<table class='table-container'>";
    echo "<tr><td>ID_P</td><td>NombreProducto</td><td>Descripcion</td><td>Precio</td><td>Categoria1</td>
    <td>Categoria2</td><td>Categoria3</td><td>Stock</td><td>Imagen</td><td>Acciones</td></tr>";

    $consulta = "select * from productos";
    $resultado = mysqli_query($conexion, $consulta);

    while ($row = mysqli_fetch_array($resultado)) {
        echo "<tr>";
        echo "<td>$row[0]</td>";
        echo "<td>$row[1]</td>";
        echo "<td>$row[2]</td>";
        echo "<td>$row[3]</td>";
        echo "<td>$row[4]</td>";
        echo "<td>$row[5]</td>";
        echo "<td>$row[6]</td>";
        echo "<td>$row[7]</td>";
        echo "<td>$row[8]</td>";
        echo "<td class='action-buttons'>";
        echo    "<a href='#' class='action-button edit' onclick='openModal_p($row[0],
                \"$row[1]\", \"$row[2]\", \"$row[3]\", \"$row[4]\", \"$row[5]\", \"$row[6]\", \"$row[7]\")'>Editar</a>";
        echo    "<a href='funciones_mysql/Borrar_P.php?id=".$row[0]."' class='action-button delete'>Eliminar</a>'";
        echo "</td>";
        echo "</tr>";
    }

    echo "</table>";
    echo "</div>";

    // Sección: Usuarios
    echo "<div class='section'>";
    echo "<div class='section-header'>Usuarios</div>";
    echo "<table class='table-container'>";
    echo "<tr><td>ID</td><td>NombreDeUsuario</td><td>Nombre</td><td>Apellido</td><td>Email</td><td>Password_Hash</td>
    <td>Tipo</td><td>Acciones</td></tr>";

    $consulta = "select * from usuarios";
    $resultado = mysqli_query($conexion, $consulta);

    while ($row = mysqli_fetch_array($resultado)) {
        echo "<tr>";
        echo "<td>$row[0]</td>";
        echo "<td>$row[1]</td>";
        echo "<td>$row[2]</td>";
        echo "<td>$row[3]</td>";
        echo "<td>$row[4]</td>";
        echo "<td>$row[5]</td>";
        echo "<td>$row[6]</td>";
        echo "<td class='action-buttons'>";
        echo    "<a href='#' class='action-button edit' onclick='openModal_u(\"$row[0]\", \"$row[1]\", \"$row[2]\", \"$row[3]\", \"$row[4]\")'>Editar</a>";
        echo    "<a href='funciones_mysql/Borrar_U.php?id=".$row[0]."' class='action-button delete'>Eliminar</a>'";
        echo "</td>";
        echo "</tr>";
    }

    echo "</table>";
    echo "</div>";

    //Seccion: Bitácora
    echo "<div class='section'>";
    echo "<div class='section-header'>Bitácora</div>";
    echo "<table class='table-container'>";
    echo "<tr><td>ID</td><td>Usuario</td><td>Fecha</td><td>Hora</td><td>Operación</td></tr>";

    $consulta = "select * from bitacora";
    $resultado = mysqli_query($conexion, $consulta);

    while ($row = mysqli_fetch_array($resultado)) {
        echo "<tr>";
        echo "<td>$row[0]</td>";
        echo "<td>$row[1]</td>";
        echo "<td>$row[2]</td>";
        echo "<td>$row[3]</td>";
        echo "<td>$row[4]</td>";
        echo "</tr>";
    }

    echo "</table>";
    echo "</div>";
}
