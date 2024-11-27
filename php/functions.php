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

    // Agrega condiciones dinámicamente si no son "Todos"
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

    // Construye la consulta
    $sql = "SELECT * FROM productos";
    if (!empty($conditions)) {
        $sql .= " WHERE " . implode(" AND ", $conditions);
    }

    $statement = $connection->prepare($sql);

    // Vincula parámetros si los hay
    if (!empty($params)) {
        $statement->bind_param($types, ...$params);
    }

    $statement -> execute();
    $result = $statement -> get_result();
    $statement -> close();

    return $result;
}

function getProductsCards($category1, $category2, $category3) {

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
