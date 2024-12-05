    <!DOCTYPE html>
    <html lang="es">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />
        <link rel="stylesheet" href="/css/login.css">
        <link rel="stylesheet" href="../css/styles.css">
        <title>Inicia Sesión</title>
    </head>

    <body>

        <!-- <?php include 'header.php'; ?> -->

        <main>

        <div class="container">
            <div class="signin-signup">
                <form action="login-process.php" method = "POST" class="sign-in-form">
                    <h2 class="title">Inicia Sesión</h2>
                    <div class="input-field">
                        <i class="fas fa-user"></i>
                        <input type="text" name = "loginUsername" placeholder="Nombre de usuario">
                    </div>
                    <div class="input-field">
                        <i class="fas fa-lock"></i>
                        <input type="password" name = "loginPassword" placeholder="Contraseña">
                    </div>
                    <input type="submit" name = "action" value = "Inicia Sesión" class="btn">
                    <div class="social-media">
                        <!--
                        <a href="#" class="social-icon">
                            <i class="fab fa-facebook"></i>
                        </a>
                        <a href="" class="social-icon">
                            <i class="fab fa-twitter"></i>
                        </a>
                        <a href="" class="social-icon">
                            <i class="fab fa-google"></i>
                        </a>
                        <a href="" class="social-icon">
                            <i class="fab fa-linkedin-in"></i>
                        </a>
                        -->
                    </div>
                    <p class="account-text">¿No tienes una cuenta? <a href="#" id="sign-up-btn2">Regístrate</a></p>
                </form>
                <form action = "login-process.php" method = "POST" class="sign-up-form">
                    <h2 class="title">Regístrate</h2>
                    <div class="input-field">
                        <i class="fas fa-user"></i>
                        <input type="text" name = "signupUsername" placeholder="Nombre de usuario">
                    </div>
                    <div class="input-field">
                        <i class="fas fa-user"></i>
                        <input type="text" name = "signupName" placeholder="Nombre">
                    </div>
                    <div class="input-field">
                        <i class="fas fa-user"></i>
                        <input type="text" name = "signupApellido" placeholder="Apellido">
                    </div>
                    <div class="input-field">
                        <i class="fas fa-envelope"></i>
                        <input type="text" name = "signupEmail" placeholder="Correo electrónico">
                    </div>
                    <div class="input-field">
                        <i class="fas fa-lock"></i>
                        <input type="password" name = "signupPassword" placeholder="Contraseña">
                    </div>
                    <input type="submit" name = "action" value="Regístrate" class="btn">
                    <div class="social-media">
                        <!--
                        <a href="#" class="social-icon">
                            <i class="fab fa-facebook"></i>
                        </a>
                        <a href="" class="social-icon">
                            <i class="fab fa-twitter"></i>
                        </a>
                        <a href="" class="social-icon">
                            <i class="fab fa-google"></i>
                        </a>
                        <a href="" class="social-icon">
                            <i class="fab fa-linkedin-in"></i>
                        </a>
                        -->
                    </div>
                    <p class="account-text">¿Ya tienes una cuenta? <a href="#" id="sign-in-btn2">Inicia sesión</a></p>
                </form>
            </div>
            <div class="panels-container">
                <div class="panel left-panel">
                    <div class="content">
                        <h3>¿Ya estas registrado?</h3>
                        <p>Accede a tu cuenta con un solo clic y disfruta de una experiencia personalizada.</p>
                        <button class="btn" id="sign-in-btn">Inicia sesión</button>
                    </div>
                    <img src="signin.svg" alt="" class="image">
                </div>
                <div class="panel right-panel">
                    <div class="content">
                        <h3>¿Te gusta el arte de Hama Beads?</h3>
                        <p>Regístrate para recibir tutoriales exclusivos y descuentos especiales en todos nuestros productos.</p>
                        <button class="btn" id="sign-up-btn">Regístrate</button>
                    </div>
                    <img src="signup.svg" alt="" class="image">
                </div>
            </div>
        </div>

        </main>

        <script src="../javascript/login.js"></script>
    </body>

    </html>
