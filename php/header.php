<header class = "header-hammacraft">
    <nav class = "nav-hammacraft">
        <div>
            <a href = "/index.php">
                <img class = "logo-item" src="/images/logo_header.png" alt="Logo"> 
            </a>

            </div>


            <div class = "nav-hammacraft-links">

            <a href="/index.php" class="<?= basename($_SERVER['SCRIPT_NAME']) == 'index.php' ? 'active' : '' ?>">Pantalla principal</a>
            <a href="/php/catalogo.php" class="<?= basename($_SERVER['SCRIPT_NAME']) == 'catalogo.php' ? 'active' : '' ?>">Catálogo</a>
            <a href="/php/pedidos.php" class="<?= basename($_SERVER['SCRIPT_NAME']) == 'pedidos.php' ? 'active' : '' ?>">Pedidos</a>
                <a href="/php/carrito_compras.php">
                    <button class = "btn btn-dark custom-btn">
                    <i class="fas fa-shopping-cart"></i> Carrito
                    </button>
                </a>
                

                <?php 

                if (isset($_SESSION["userID"])):

                    if ($_SESSION["tipoDeUsuario"] == "Admin") {
                        $userpageLink = "/php/admin.php";
                    }
                    else {
                        $userpageLink = "/php/usuario.php";
                    }

                ?>

                    <a href = <?php echo $userpageLink ?>>
                    <button class = "btn btn-dark custom-btn">
                        <i class="fa-solid fa-user"></i> <?php echo $_SESSION["userName"]; ?>
                    </button>
                    </a>

                    <a href = "/php/logout.php">
                    <button class = "btn btn-dark custom-btn">
                        <i class="fa-solid fa-user"></i> Cerrar sesión
                    </button>
                    </a>

                <?php else: ?>

                    <a href="/php/login.php">
                        <button class = "btn btn-dark custom-btn">
                        <i class="fa-solid fa-user"></i> Iniciar sesión
                        </button>
                    </a>

                <?php endif; ?>

            </div>

        </nav>

</header>
