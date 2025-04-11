<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="keywords" content="">
    <meta name="author" content="Alejandro Sanahuja Benitez">
    <title>portal web de pruebas</title>
    <link rel="stylesheet" href="../css/styles.css">
    <link rel="shortcut icon" href="img/favicon.ico"> 
    <script src="https://kit.fontawesome.com/8dd92a9059.js" crossorigin="anonymous"></script>
</head>
<body>
    <nav class="nav-container">
        <ul class="nav-links">
            <li><a href="index.php">Inicio</a></li>
            <li><a href="comprar">Comprar</a></li>
            <li><a href="alquilar">Alquilar</a></li>
            <li><a href="proyectos">Proyectos</a></li>
            <li><a href="contacto.php">Contactos</a></li>
            <li><a href="mis_propiedades">Mis propiedades</a></li>
            <li><a href="usuarios.php">Zona Usuarios</a></li>
        </ul>
        <!-- Ícono de acceso o botón de cerrar sesión -->
        <div id="accessContainer">
            <div id="accessIcon" class="access-icon" onclick="openModal()">
                <img src="img/acceso.png" alt="Ícono de acceso">
            </div>
            <button id="logoutButton" class="logout-btn" onclick="logout()" style="display: none;">Cerrar Sesión</button>
        </div>
    </nav>
    <main>
    </main>

    <!-- Ventana modal -->
    <div id="loginModal" class="modal">
        <div class="modal-content">
            <span class="close-btn" onclick="closeModal()">×</span>
            <h2>Iniciar Sesión</h2>
            <form id="loginForm" onsubmit="return validateForm(event)">
                <input type="email" id="email" placeholder="Correo electrónico" required>
                <div id="emailError" class="error"></div>
                <input type="password" id="password" placeholder="Contraseña" required>
                <div id="passwordError" class="error"></div>
                <div class="button-container">
                    <button type="submit" class="login-submit">Iniciar Sesión</button>
                    <button type="button" class="register-btn" onclick="alert('Redirigiendo a registro...')">Registrarse</button>
                </div>
            </form>
        </div>
    </div>

    <script>
        let isLoggedIn = false; // Estado de autenticación

        // Función para abrir el modal
        function openModal() {
            if (!isLoggedIn) {
                document.getElementById('loginModal').style.display = 'flex';
                document.getElementById('loginForm').reset();
                document.getElementById('emailError').style.display = 'none';
                document.getElementById('passwordError').style.display = 'none';
            }
        }

        // Función para cerrar el modal
        function closeModal() {
            document.getElementById('loginModal').style.display = 'none';
            document.getElementById('emailError').style.display = 'none';
            document.getElementById('passwordError').style.display = 'none';
        }

        // Cerrar el modal al hacer clic fuera de él
        window.onclick = function(event) {
            if (event.target == document.getElementById('loginModal')) {
                closeModal();
            }
        }

        // Función para validar el formulario
        function validateForm(event) {
            event.preventDefault();

            const email = document.getElementById('email').value.trim();
            const password = document.getElementById('password').value;
            const emailError = document.getElementById('emailError');
            const passwordError = document.getElementById('passwordError');
            let isValid = true;
            // Validación del correo
            const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
            if (!email) {
                emailError.textContent = 'El correo electrónico es obligatorio.';
                emailError.style.display = 'block';
                isValid = false;
            } else if (!emailRegex.test(email)) {
                emailError.textContent = 'Por favor, ingrese un correo electrónico válido.';
                emailError.style.display = 'block';
                isValid = false;
            } else {
                emailError.style.display = 'none';
            }

            // Validaciones de la contraseña
            let passwordErrorMessage = '';
            if (password.length < 8) {
                passwordErrorMessage = 'La contraseña debe tener al menos 8 caracteres.';
            } else if (!/[A-Z]/.test(password)) {
                passwordErrorMessage = 'La contraseña debe incluir al menos una letra mayúscula.';
            } else if (!/[a-z]/.test(password)) {
                passwordErrorMessage = 'La contraseña debe incluir al menos una letra minúscula.';
            } else if (!/[0-9]/.test(password)) {
                passwordErrorMessage = 'La contraseña debe incluir al menos un número.';
            } else if (!/[!@#$%^&*(),.?":{}|<>]/.test(password)) {
                passwordErrorMessage = 'La contraseña debe incluir al menos un carácter especial.';
            }

            if (passwordErrorMessage) {
                passwordError.textContent = passwordErrorMessage;
                passwordError.style.display = 'block';
                isValid = false;
            } else {
                passwordError.style.display = 'none';
            }

            // Si todo es válido
            if (isValid) {
                isLoggedIn = true;
                document.getElementById('accessIcon').style.display = 'none';
                document.getElementById('logoutButton').style.display = 'block';
                alert('Inicio de sesión exitoso (simulado).');
                closeModal();
                return true;
            }

            return false;
        }

        // Función para cerrar sesión
        function logout() {
            isLoggedIn = false;
            document.getElementById('accessIcon').style.display = 'block';
            document.getElementById('logoutButton').style.display = 'none';
            alert('Sesión cerrada (simulada).');
        }
    </script>
</body>
</html>