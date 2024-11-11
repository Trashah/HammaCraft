<header class = "header-hammacraft">
    <nav class = "nav-hammacraft">
        <div>
            <a href = "https://www.hammacraft.lat/">
                <img class = "logo-item" src="/images/logo.png" alt="Logo"> 
            </a>

            </div>

            <div class = "search-bar-hammacraft">

                <input type = "text" placeholder = "Buscar...">

            </div>

            <div class = "nav-hammacraft-links">

                <a href="https://www.hammacraft.lat/">Pantalla principal</a>
                <a href="https://www.hammacraft.lat/php/catalogo.php">Catálogo</a>
                <a href="https://www.hammacraft.lat/php/pedidos.php">Pedidos</a>


                <button class = "btn btn-dark">
                    <i class="fas fa-shopping-cart"></i> Carrito
                </button>

                <?php if (isset($_SESSION["userID"])): ?>
                    <button class = "btn btn-dark">
                        <i class="fa-solid fa-user"></i> Traxus
                    </button>
                    <a href = "/php/logout.php">
                    <button class = "btn btn-dark">
                        <i class="fa-solid fa-user"></i> Cerrar sesión
                    </button>
                    </a>
                <?php else: ?>
                    <a href="https://www.hammacraft.lat/php/login.php">
                        <button class = "btn btn-dark">
                        <i class="fa-solid fa-user"></i> Iniciar sesión
                        </button>
                    </a>
                <?php endif; ?>

            </div>

        </nav>

</header>