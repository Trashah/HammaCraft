<?php

include '../.gitignore/config.php';
include '../php/functions.php';

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title></title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
        <style>
        body {
            background-color: #e5fefe; /* Morado claro */
        }
        .navbar {
            background-color: #fbffff; /* Azul celeste */
        }
    </style>

</head>
<body>
<header>
    <nav class="navbar navbar-expand-lg navbar-light">
        <div class="container-fluid">

            <!-- Logo a la izquierda -->
            <a class="navbar-brand" href="https://www.hammacraft.lat/">
                <img src="C:\Users\29312\OneDrive\Desktop\logo2.png" alt="Logo" class="logo-item" style="width: 100px;">
            </a>

            <!-- Barra de búsqueda y botón de filtros centrados -->
            <div class="d-flex mx-auto align-items-center">
                <form class="d-flex me-2">
                    <input class="form-control" type="search" placeholder="Search..." aria-label="Search">
                </form>

                <!-- Botón de filtros -->
                <div class="dropdown">
                    <button class="btn btn-secondary dropdown-toggle" type="button" id="filtersDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                        Filtros
                    </button>
                    <ul class="dropdown-menu" aria-labelledby="filtersDropdown">
                        <li>
                           <a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#filterModal">Seleccionar Filtros</a>
                        </li>
                    </ul>
                </div>
            </div>

            <!-- Enlaces de navegación y botón de carrito a la derecha -->
            <div class="d-flex ms-auto">
                <ul class="navbar-nav mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link" href="https://www.hammacraft.lat/">Pantalla principal</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="https://www.hammacraft.lat/php/catalogo.php">Catálogo</a>
                    </li>
                </ul>
                <button class="btn btn-outline-primary cart-btn ms-3">
                    <i class="fas fa-shopping-cart"></i> Cart
                </button>
            </div>
        </div>
    </nav>

    <!-- Modal para seleccionar filtros -->
    <div class="modal fade" id="filterModal" tabindex="-1" aria-labelledby="filterModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="filterModalLabel">Seleccionar Filtros</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="/browse" method="get">
                        <div class="mb-3">
                            <label for="genre_select" class="form-label">Género</label>
                            <select class="form-select" name="genre" id="genre_select" aria-label="Seleccionar género">
                                <option value="">Seleccionar</option>
                                <option value="Anime">Anime</option>
                                <option value="Video-Juegos">Video Juegos</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="size_select" class="form-label">Tamaño</label>
                            <select class="form-select" name="size" id="size_select" aria-label="Seleccionar tamaño">
                                <option value="">Seleccionar</option>
                                <option value="pequeno">Pequeño</option>
                                <option value="mediano">Mediano</option>
                                <option value="grande">Grande</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="price_range" class="form-label">Rango de Precios</label>
                            <select class="form-select" name="price" id="price_range" aria-label="Seleccionar rango de precios">
                                <option value="">Seleccionar</option>
                                <option value="0-30">$0 - $30 (Pequeño)</option>
                                <option value="31-70">$31 - $70 (Mediano)</option>
                                <option value="71-90">$71 - $90 (Grande)</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="order_select" class="form-label">Ordenar por</label>
                            <select class="form-select" name="order" id="order_select" aria-label="Seleccionar orden">
                                <option value="default">Por Defecto</option>
                                <option value="updated">Recientemente Actualizados</option>
                                <option value="added">Recientemente Agregados</option>
                                <option value="title">Nombre A-Z</option>
                                <option value="rating">Calificación</option>
                            </select>
                        </div>
                        <button type="submit" class="btn btn-primary">Filtrar</button>
                    </form>
                </div>
            </div>
        </div>
    </nav>

</header>


    <div class="container my-5">
        <div class="row justify-content-center">
            <!-- Primera columna con tarjeta -->
            <div class="col-md-4">
                <div class="card" style="width: 18rem;">
                    <img class="card-img-top" src="https://i.pinimg.com/236x/eb/e2/b9/ebe2b93d0c318c661924176d43772371.jpg" width="150" height="250" alt="Card image cap">
                    <div class="card-body">
                        <h5 class="card-title">Adachi</h5>
                        <h6 class="card-title">Descripción</h6>
                        <p class="card-text">Pieza grande</p>
                        <p class="card-text">$40.00</p>
                        <a href="#" class="btn btn-primary">Añadir a Carrito</a>
                    </div>
                </div>
            </div>
            
            <div class="col-md-4">
                <div class="card" style="width: 18rem;">
                    <img class="card-img-top" src="https://i.pinimg.com/236x/eb/e2/b9/ebe2b93d0c318c661924176d43772371.jpg" width="150" height="250" alt="Card image cap">
                    <div class="card-body">
                        <h5 class="card-title">Phoniex Wright</h5>
                        <h6 class="card-title">Descripción</h6>
                        <p class="card-text">Pieza pequeña</p>
                        <p class="card-text">$15.00</p>
                        <a href="#" class="btn btn-primary">Añadir a Carrito</a>
                    </div>
                </div>
            </div>
            
            <div class="col-md-4">
                <div class="card" style="width: 18rem;">
                    <img class="card-img-top" src="https://i.pinimg.com/236x/eb/e2/b9/ebe2b93d0c318c661924176d43772371.jpg" width="150" height="250" alt="Card image cap">
                    <div class="card-body">
                        <h5 class="card-title">Kirby</h5>
                        <h6 class="card-title">Descripción</h6>
                        <p class="card-text">Pieza pequeña</p>
                        <p class="card-text">$15.00</p>
                        <a href="#" class="btn btn-primary">Añadir a Carrito</a>
                    </div>
                </div>
            </div>
        </div>

                       
        <div class="row justify-content-center mt-4">
            <!-- Primera columna con tarjeta -->
            <div class="col-md-4">
                <div class="card" style="width: 18rem;">
                    <img class="card-img-top" src="https://i.pinimg.com/236x/eb/e2/b9/ebe2b93d0c318c661924176d43772371.jpg" width="150" height="250" alt="Card image cap">
                    <div class="card-body">
                        <h5 class="card-title">Adachi</h5>
                        <h6 class="card-title">Descripción</h6>
                        <p class="card-text">Pieza grande</p>
                        <p class="card-text">$40.00</p>
                        <a href="#" class="btn btn-primary">Añadir a Carrito</a>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card" style="width: 18rem;">
                    <img class="card-img-top" src="https://i.pinimg.com/236x/eb/e2/b9/ebe2b93d0c318c661924176d43772371.jpg" width="150" height="250" alt="Card image cap">
                    <div class="card-body">
                        <h5 class="card-title">Phoniex Wright</h5>
                        <h6 class="card-title">Descripción</h6>
                        <p class="card-text">Pieza pequeña</p>
                        <p class="card-text">$15.00</p>
                        <a href="#" class="btn btn-primary">Añadir a Carrito</a>
                    </div>
                </div>
            </div>

            <!-- Primera Fila-->

            <div class="col-md-4">
                <div class="card" style="width: 18rem;">
                    <img class="card-img-top" src="https://i.pinimg.com/236x/eb/e2/b9/ebe2b93d0c318c661924176d43772371.jpg" width="150" height="250" alt="Card image cap">
                    <div class="card-body">
                        <h5 class="card-title">Kirby</h5>
                        <h6 class="card-title">Descripción</h6>
                        <p class="card-text">Pieza pequeña</p>
                        <p class="card-text">$15.00</p>
                        <a href="#" class="btn btn-primary">Añadir a Carrito</a>
                    </div>
                </div>
            </div>
        </div>
                    
        <div class="row justify-content-center mt-4">
            <!-- Primera columna con tarjeta -->
            <div class="col-md-4">
                <div class="card" style="width: 18rem;">
                    <img class="card-img-top" src="https://i.pinimg.com/236x/eb/e2/b9/ebe2b93d0c318c661924176d43772371.jpg" width="150" height="250" alt="Card image cap">
                    <div class="card-body">
                        <h5 class="card-title">Adachi</h5>
                        <h6 class="card-title">Descripción</h6>
                        <p class="card-text">Pieza grande</p>
                        <p class="card-text">$40.00</p>
                        <a href="#" class="btn btn-primary">Añadir a Carrito</a>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card" style="width: 18rem;">
                    <img class="card-img-top" src="https://i.pinimg.com/236x/eb/e2/b9/ebe2b93d0c318c661924176d43772371.jpg" width="150" height="250" alt="Card image cap">
                    <div class="card-body">
                        <h5 class="card-title">Phoniex Wright</h5>
                        <h6 class="card-title">Descripción</h6>
                        <p class="card-text">Pieza pequeña</p>
                        <p class="card-text">$15.00</p>
                        <a href="#" class="btn btn-primary">Añadir a Carrito</a>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card" style="width: 18rem;">
                    <img class="card-img-top" src="https://i.pinimg.com/236x/eb/e2/b9/ebe2b93d0c318c661924176d43772371.jpg" width="150" height="250" alt="Card image cap">
                    <div class="card-body">
                        <h5 class="card-title">Kirby</h5>
                        <h6 class="card-title">Descripción</h6>
                        <p class="card-text">Pieza pequeña</p>
                        <p class="card-text">$15.00</p>
                        <a href="#" class="btn btn-primary">Añadir a Carrito</a>
                    </div>
                </div>
            </div>
        </div>

                        <!-- Cuarta fila de tarjetas (añadida) -->
        <div class="row justify-content-center mt-4">
            <!-- Primera columna con tarjeta -->
            <div class="col-md-4">
                <div class="card" style="width: 18rem;">
                    <img class="card-img-top" src="https://i.pinimg.com/236x/eb/e2/b9/ebe2b93d0c318c661924176d43772371.jpg" width="150" height="250" alt="Card image cap">
                    <div class="card-body">
                        <h5 class="card-title">Adachi</h5>
                        <h6 class="card-title">Descripción</h6>
                        <p class="card-text">Pieza grande</p>
                        <p class="card-text">$40.00</p>
                        <a href="#" class="btn btn-primary">Añadir a Carrito</a>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card" style="width: 18rem;">
                    <img class="card-img-top" src="https://i.pinimg.com/236x/eb/e2/b9/ebe2b93d0c318c661924176d43772371.jpg" width="150" height="250" alt="Card image cap">
                    <div class="card-body">
                        <h5 class="card-title">Phoniex Wright</h5>
                        <h6 class="card-title">Descripción</h6>
                        <p class="card-text">Pieza pequeña</p>
                        <p class="card-text">$15.00</p>
                        <a href="#" class="btn btn-primary">Añadir a Carrito</a>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card" style="width: 18rem;">
                    <img class="card-img-top" src="https://i.pinimg.com/236x/eb/e2/b9/ebe2b93d0c318c661924176d43772371.jpg" width="150" height="250" alt="Card image cap">
                    <div class="card-body">
                        <h5 class="card-title">Kirby</h5>
                        <h6 class="card-title">Descripción</h6>
                        <p class="card-text">Pieza pequeña</p>
                        <p class="card-text">$15.00</p>
                        <a href="#" class="btn btn-primary">Añadir a Carrito</a>
                    </div>
                </div>
            </div>
        </div>

                        <!-- Quinta fila de tarjetas (añadida) -->
        <div class="row justify-content-center mt-4">
            <!-- Primera columna con tarjeta -->
            <div class="col-md-4">
                <div class="card" style="width: 18rem;">
                    <img class="card-img-top" src="https://i.pinimg.com/236x/eb/e2/b9/ebe2b93d0c318c661924176d43772371.jpg" width="150" height="250" alt="Card image cap">
                    <div class="card-body">
                        <h5 class="card-title">Adachi</h5>
                        <h6 class="card-title">Descripción</h6>
                        <p class="card-text">Pieza grande</p>
                        <p class="card-text">$40.00</p>
                        <a href="#" class="btn btn-primary">Añadir a Carrito</a>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card" style="width: 18rem;">
                    <img class="card-img-top" src="https://i.pinimg.com/236x/eb/e2/b9/ebe2b93d0c318c661924176d43772371.jpg" width="150" height="250" alt="Card image cap">
                    <div class="card-body">
                        <h5 class="card-title">Phoniex Wright</h5>
                        <h6 class="card-title">Descripción</h6>
                        <p class="card-text">Pieza pequeña</p>
                        <p class="card-text">$15.00</p>
                        <a href="#" class="btn btn-primary">Añadir a Carrito</a>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card" style="width: 18rem;">
                    <img class="card-img-top" src="https://i.pinimg.com/236x/eb/e2/b9/ebe2b93d0c318c661924176d43772371.jpg" width="150" height="250" alt="Card image cap">
                    <div class="card-body">
                        <h5 class="card-title">Kirby</h5>
                        <h6 class="card-title">Descripción</h6>
                        <p class="card-text">Pieza pequeña</p>
                        <p class="card-text">$15.00</p>
                        <a href="#" class="btn btn-primary">Añadir a Carrito</a>
                    </div>
                </div>
            </div>
        </div>

                        <!-- Sexta fila de tarjetas (añadida) -->
        <div class="row justify-content-center mt-4">
            <!-- Primera columna con tarjeta -->
            <div class="col-md-4">
                <div class="card" style="width: 18rem;">
                    <img class="card-img-top" src="https://i.pinimg.com/236x/eb/e2/b9/ebe2b93d0c318c661924176d43772371.jpg" width="150" height="250" alt="Card image cap">
                    <div class="card-body">
                        <h5 class="card-title">Adachi</h5>
                        <h6 class="card-title">Descripción</h6>
                        <p class="card-text">Pieza grande</p>
                        <p class="card-text">$40.00</p>
                        <a href="#" class="btn btn-primary">Añadir a Carrito</a>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card" style="width: 18rem;">
                    <img class="card-img-top" src="https://i.pinimg.com/236x/eb/e2/b9/ebe2b93d0c318c661924176d43772371.jpg" width="150" height="250" alt="Card image cap">
                    <div class="card-body">
                        <h5 class="card-title">Phoniex Wright</h5>
                        <h6 class="card-title">Descripción</h6>
                        <p class="card-text">Pieza pequeña</p>
                        <p class="card-text">$15.00</p>
                        <a href="#" class="btn btn-primary">Añadir a Carrito</a>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card" style="width: 18rem;">
                    <img class="card-img-top" src="https://i.pinimg.com/236x/eb/e2/b9/ebe2b93d0c318c661924176d43772371.jpg" width="150" height="250" alt="Card image cap">
                    <div class="card-body">
                        <h5 class="card-title">Kirby</h5>
                        <h6 class="card-title">Descripción</h6>
                        <p class="card-text">Pieza pequeña</p>
                        <p class="card-text">$15.00</p>
                        <a href="#" class="btn btn-primary">Añadir a Carrito</a>
                    </div>
                </div>
            </div>
        </div>

                        <!-- Septima fila de tarjetas (añadida) -->
        <div class="row justify-content-center mt-4">
            <!-- Primera columna con tarjeta -->
            <div class="col-md-4">
                <div class="card" style="width: 18rem;">
                    <img class="card-img-top" src="https://i.pinimg.com/236x/eb/e2/b9/ebe2b93d0c318c661924176d43772371.jpg" width="150" height="250" alt="Card image cap">
                    <div class="card-body">
                        <h5 class="card-title">Adachi</h5>
                        <h6 class="card-title">Descripción</h6>
                        <p class="card-text">Pieza grande</p>
                        <p class="card-text">$40.00</p>
                        <a href="#" class="btn btn-primary">Añadir a Carrito</a>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card" style="width: 18rem;">
                    <img class="card-img-top" src="https://i.pinimg.com/236x/eb/e2/b9/ebe2b93d0c318c661924176d43772371.jpg" width="150" height="250" alt="Card image cap">
                    <div class="card-body">
                        <h5 class="card-title">Phoniex Wright</h5>
                        <h6 class="card-title">Descripción</h6>
                        <p class="card-text">Pieza pequeña</p>
                        <p class="card-text">$15.00</p>
                        <a href="#" class="btn btn-primary">Añadir a Carrito</a>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card" style="width: 18rem;">
                    <img class="card-img-top" src="https://i.pinimg.com/236x/eb/e2/b9/ebe2b93d0c318c661924176d43772371.jpg" width="150" height="250" alt="Card image cap">
                    <div class="card-body">
                        <h5 class="card-title">Kirby</h5>
                        <h6 class="card-title">Descripción</h6>
                        <p class="card-text">Pieza pequeña</p>
                        <p class="card-text">$15.00</p>
                        <a href="#" class="btn btn-primary">Añadir a Carrito</a>
                    </div>
                </div>
            </div>
        </div>
    </div>












    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>
</html>