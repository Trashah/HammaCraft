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

function getProductsCards($category1, $category2) {
    $connection = connectToDatabase();
    $colClass = "col-md-4";
    $cardClass = "card";
    $imgClass = "card-img-top";
    $buttonClass = "btn btn-primary";

    if ($category1 == "Todos" and $category2 == "Todos") {
        $sql = "SELECT * FROM productos";
        $statement = $connection->prepare($sql);
    } else if ($category1 != "Todos" and $category2 == "Todos") {
        $sql = "SELECT * FROM productos WHERE categoria1 = ?";
        $statement = $connection->prepare($sql);
        $statement->bind_param("s", $category1);
    } else if ($category1 == "Todos" and $category2 != "Todos") {
        $sql = "SELECT * FROM productos WHERE categoria2 = ?";
        $statement = $connection->prepare($sql);
        $statement->bind_param("s", $category2);
    } else {
        $sql = "SELECT * FROM productos WHERE categoria1 = ? AND categoria2 = ?";
        $statement = $connection->prepare($sql);
        $statement->bind_param("ss", $category1, $category2);
    }

    $statement->execute();
    $result = $statement->get_result();

    $output = '<div class="row justify-content-center mt-4">';
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
        $output .= '<p class="card-text">$' . number_format($row['Precio'], 2) . '</p>';
        
        // Botón "Añadir a Carrito"
        $output .= '<a href="#" class="' . htmlspecialchars($buttonClass) . '" onclick="agregarAlCarrito({
            id: ' . $row['ID_P'] . ',
            nombre: \'' . htmlspecialchars($row['NombreProducto']) . '\',
            descripcion: \'' . htmlspecialchars($row['Descripcion']) . '\',
            imagen: \'/images/' . htmlspecialchars($row['Imagen']) . '\',
            precio: \'$' . number_format($row['Precio'], 2) . '\'
        })">Añadir a Carrito</a>';
        
        $output .= '</div>';
        $output .= '</div>';
        $output .= '</div>';
    }
    $output .= '</div>';

    $statement->close();
    return $output;
}
