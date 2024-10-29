<?php

include __DIR__ . '/../.gitignore/config.php';

function getProducts($connection, $lowerLimit, $rowCount) {
    
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

function getProductsCards($connection, $category, $lowerLimit, $rowCount, $colClass, $cardClass, $imgClass, $buttonClass) {
    if ($category == "Todos") {
        $sql = "SELECT * FROM productos LIMIT ?, ?";
        $statement = $connection->prepare($sql);
        $statement->bind_param("ii", $lowerLimit, $rowCount);
    }
    else {
        $sql = "SELECT * FROM productos LIMIT ?, ? WHERE categoria = ?";
        $statement = $connection->prepare($sql);
        $statement->bind_param("iis", $lowerLimit, $rowCount, $category);
    }
    $statement->execute();
    $result = $statement->get_result();

    $output = '';
    while ($row = $result->fetch_assoc()) {
        $output .= '<div class="' . htmlspecialchars($colClass) . '">';
        $output .= '<div class="' . htmlspecialchars($cardClass) . '" style="width: 18rem; margin: 50px;">';

        // Image
        $output .= '<img class="' . htmlspecialchars($imgClass) . '" src="../images/' . htmlspecialchars($row['Imagen']) . '" width="150" height="250" alt="' . htmlspecialchars($row['NombreProducto']) . '">';

        // Card body
        $output .= '<div class="card-body">';
        $output .= '<h2 class="card-title font-weight-bold">' . htmlspecialchars($row['NombreProducto']) . '</h2>';
        $output .= '<h5 class="card-title font-weight-bold">Descripción</h5>';
        $output .= '<p class="card-text">' . htmlspecialchars($row['Descripcion']) . '</p>'; 
        $output .= '<h5 class="card-title font-weight-bold">Categorías</h5>';
        $output .= '<p class="card-text">' . htmlspecialchars($row['Categoria1']) . ', ' . htmlspecialchars($row['Categoria2']) .'</p>'; 
        $output .= '<p class="card-text">$' . number_format($row['Precio'], 2) . '</p>';
        
        // Button
        $output .= '<a href="#" class="' . htmlspecialchars($buttonClass) . '">Añadir a Carrito</a>';
        $output .= '</div>'; // Close card-body

        $output .= '</div>'; // Close card
        $output .= '</div>'; // Close col
    }

    $statement->close();

    return $output;
}
