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
                <!-- Formulario de Inicio de Sesión -->
                <form action="login-process.php" method="POST" class="sign-in-form" id="loginForm">
                    <h2 class="title">Inicia Sesión</h2>
                    <div class="input-field">
                        <i class="fas fa-user"></i>
                        <input type="text" name="loginUsername" id="loginUsername" placeholder="Nombre de usuario" required>
                    </div>
                    <div class="input-field">
                        <i class="fas fa-lock"></i>
                        <input type="password" name="loginPassword" id="loginPassword" placeholder="Contraseña" required>
                    </div>
                    <input type="submit" name="action" value="Inicia Sesión" class="btn">
                    <div class="social-media">
                        <!-- Social media buttons (optional) -->
                    </div>
                    <p class="account-text">¿No tienes una cuenta? <a href="#" id="sign-up-btn2">Regístrate</a></p>
                </form>

                <!-- Formulario de Registro -->
                <form action="login-process.php" method="POST" class="sign-up-form" id="signupForm">
                    <h2 class="title">Regístrate</h2>
                    <div class="input-field">
                        <i class="fas fa-user"></i>
                        <input type="text" name="signupUsername" id="signupUsername" placeholder="Nombre de usuario" required>
                        <div class="invalid-feedback">El nombre de usuario debe tener al menos 8 caracteres.</div>
                    </div>
                    <div class="input-field">
                        <i class="fas fa-user"></i>
                        <input type="text" name="signupName" id="signupName" placeholder="Nombre" required>
                        <div class="invalid-feedback">El nombre no debe contener números.</div>
                    </div>
                    <div class="input-field">
                        <i class="fas fa-user"></i>
                        <input type="text" name="signupApellido" id="signupApellido" placeholder="Apellido" required>
                        <div class="invalid-feedback">El apellido no debe contener números.</div>
                    </div>
                    <div class="input-field">
                        <i class="fas fa-envelope"></i>
                        <input type="email" name="signupEmail" id="signupEmail" placeholder="Correo electrónico" required>
                        <div class="invalid-feedback">Por favor ingresa un correo válido.</div>
                    </div>
                    <div class="input-field">
                        <i class="fas fa-lock"></i>
                        <input type="password" name="signupPassword" id="signupPassword" placeholder="Contraseña" required>
                        <div class="invalid-feedback">La contraseña debe tener al menos 6 caracteres.</div>
                    </div>
                    <input type="submit" name="action" value="Regístrate" class="btn">
                    <div class="social-media">
                        <!-- Social media buttons (optional) -->
                    </div>
                    <p class="account-text">¿Ya tienes una cuenta? <a href="#" id="sign-in-btn2">Inicia sesión</a></p>
                </form>
            </div>

            <div class="panels-container">
                <div class="panel left-panel">
                    <div class="content">
                        <h3>¿Ya estás registrado?</h3>
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

    <script>
        // Validaciones dinámicas para los campos de registro
        document.addEventListener('DOMContentLoaded', () => {
    const form = document.getElementById('signupForm');

    // Validación de nombre
    form.signupName.addEventListener('blur', function () {
        const feedback = this.nextElementSibling;
        if (/\d/.test(this.value)) {
            this.classList.add('is-invalid');
            feedback.textContent = "El nombre no debe contener números.";
        } else {
            this.classList.remove('is-invalid');
            feedback.textContent = "";
        }
    });

    // Validación de apellido
    form.signupApellido.addEventListener('blur', function () {
        const feedback = this.nextElementSibling;
        if (/\d/.test(this.value)) {
            this.classList.add('is-invalid');
            feedback.textContent = "El apellido no debe contener números.";
        } else {
            this.classList.remove('is-invalid');
            feedback.textContent = "";
        }
    });

    // Validación de nombre de usuario
    form.signupUsername.addEventListener('blur', function () {
        const feedback = this.nextElementSibling;
        if (this.value.length < 8) {
            this.classList.add('is-invalid');
            feedback.textContent = "El nombre de usuario debe tener al menos 8 caracteres.";
        } else {
            this.classList.remove('is-invalid');
            feedback.textContent = "";
        }
    });

    // Validación de correo
    form.signupEmail.addEventListener('blur', function () {
        const feedback = this.nextElementSibling;
        const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        if (!emailRegex.test(this.value)) {
            this.classList.add('is-invalid');
            feedback.textContent = "Por favor ingresa un correo válido.";
        } else {
            this.classList.remove('is-invalid');
            feedback.textContent = "";
        }
    });

    // Validación de contraseña
    form.signupPassword.addEventListener('blur', function () {
        const feedback = this.nextElementSibling;
        if (this.value.length < 6) {
            this.classList.add('is-invalid');
            feedback.textContent = "La contraseña debe tener al menos 6 caracteres.";
        } else {
            this.classList.remove('is-invalid');
            feedback.textContent = "";
        }
    });
});
    </script>

</body>

</html>
