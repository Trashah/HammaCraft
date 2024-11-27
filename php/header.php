<header class = "header-hammacraft">
    <nav class = "nav-hammacraft">
        <div>
            <a href = "/index.php">
                <img class = "logo-item" src="/images/logo_header.png" alt="Logo"> 
            </a>

            </div>

            <div class = "search-bar-hammacraft">

                <input type = "text" placeholder = "Buscar...">

            </div>

            <div class = "nav-hammacraft-links">

            <a href="/index.php" class="<?= basename($_SERVER['SCRIPT_NAME']) == 'index.php' ? 'active' : '' ?>">Pantalla principal</a>
            <a href="/php/catalogo.php" class="<?= basename($_SERVER['SCRIPT_NAME']) == 'catalogo.php' ? 'active' : '' ?>">Catálogo</a>
            <a href="/php/pedidos.php" class="<?= basename($_SERVER['SCRIPT_NAME']) == 'pedidos.php' ? 'active' : '' ?>">Pedidos</a>
                <a href="/php/carrito_compras.php">
                    <button class = "btn btn-dark">
                    <i class="fas fa-shopping-cart"></i> Carrito
                    </button>
                </a>
                

                <?php if (isset($_SESSION["userID"])): ?>
                    <button class = "btn btn-dark">
                        <i class="fa-solid fa-user"></i> <?php echo $_SESSION["userName"]; ?>
                    </button>
                    <a href = "/php/logout.php">
                    <button class = "btn btn-dark">
                        <i class="fa-solid fa-user"></i> Cerrar sesión
                    </button>
                    </a>
                <?php else: ?>
                    <a href="/php/login.php">
                        <button class = "btn btn-dark">
                        <i class="fa-solid fa-user"></i> Iniciar sesión
                        </button>
                    </a>
                <?php endif; ?>

            </div>

        </nav>

</header>