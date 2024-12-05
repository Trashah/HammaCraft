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

function tablasAdmin() {

    $servidor="localhost";
    $usuario="root";
    $password="";
    $bd="HammaCraft";

    $conexion=mysqli_connect($servidor,$usuario,$password,$bd);

    $consulta="select * from productos";
    $resultado=mysqli_query($conexion,$consulta);

    echo "<table border=1>";
    echo "<th align='center' colspan='9'>Productos</th>";
    echo "<tr><td>Campo1</td><td>Campo2</td><td>Campo3</td><td>Campo4</td><td>Campo5</td><td>Campo6</td><td>Campo7</td><td>Campo8</td><td>Campo9</td></tr>";

    while ($row=mysqli_fetch_array($resultado)) {

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
        echo "</tr>";
    }

    echo "</table>";
    echo "<br><br>";

    $consulta="select * from usuarios";
    $resultado=mysqli_query($conexion,$consulta);

    echo "<table border=1>";
    echo "<th align='center' colspan='7'>Usuarios</th>";
    echo "<tr><td>ID</td><td>NombreDeUsuario</td><td>Nombre</td><td>Apellido</td><td>Email</td><td>Password_Hash</td><td>Tipo</td></tr>";

    while ($row=mysqli_fetch_array($resultado)) {

        echo "<tr>";
        echo "<td>$row[0]</td>";
        echo "<td>$row[1]</td>";
        echo "<td>$row[2]</td>";
        echo "<td>$row[3]</td>";
        echo "<td>$row[4]</td>";
        echo "<td>$row[5]</td>";
        echo "<td>$row[6]</td>";
        echo "</tr>";
    }

    echo "</table>";
    echo "<br><br>";

    $consulta="select * from bitacora";
    $resultado=mysqli_query($conexion,$consulta);

    echo "<table border=1>";
    echo "<th align='center' colspan='5'>Bitacora</th>";
    echo "<tr><td>ID</td><td>Usuario</td><td>Fecha</td><td>Hora</td><td>Operacion</td></tr>";

    while ($row=mysqli_fetch_array($resultado)) {

        echo "<tr>";
        echo "<td>$row[0]</td>";
        echo "<td>$row[1]</td>";
        echo "<td>$row[2]</td>";
        echo "<td>$row[3]</td>";
        echo "<td>$row[4]</td>";
        echo "</tr>";
    }

    echo "</table>";
    echo "<br><br>";

}