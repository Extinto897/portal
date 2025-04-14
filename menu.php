<nav class="nav-container">
    <ul class="nav-links">
        <li><a href="index.php">Inicio</a></li>
        <li><a href="comprar">Comprar</a></li>
        <li><a href="alquilar">Alquilar</a></li>
        <li><a href="proyectos">Proyectos</a></li>
        <li><a href="contacto.php">Contactos</a></li>
        <?php if (isset($_SESSION['rol']) && ($_SESSION['rol'] === "administrador" || $_SESSION['rol'] === "usuario")): ?>
            <li><a href="propiedades.php">Mis propiedades</a></li>
                <?php endif; ?>
        <?php if (isset($_SESSION['rol']) && $_SESSION['rol'] === "administrador"): ?>
            <li><a href="usuarios.php">Zona Usuarios</a></li>
                <?php endif; ?>
                <?php if (isset($_SESSION['rol']) && ($_SESSION['rol'] === "administrador" || $_SESSION['rol'] === "usuario")): ?>
            <li><a href="tienda.php">Tienda</a></li>
                <?php endif; ?>
    </ul>
    <div id="accessContainer">
        <?php if (isset($_SESSION['rol']) && $_SESSION['rol'] !== "invitado"): ?>
            <button id="logoutButton" class="logout-btn" onclick="logout()">Cerrar Sesión</button>
        <?php else: ?>
            <div id="accessIcon" class="access-icon" onclick="openModal()">
                <img src="img/boton_login.png" alt="Ícono de acceso">
            </div>
        <?php endif; ?>
    </div>
</nav>

<?php if (!isset($_SESSION['rol']) || $_SESSION['rol'] === "invitado"): ?>
<div id="loginModal" class="modal">
    <div class="modal-content">
        <span class="close-btn" onclick="closeModal()">×</span>
        <h2>Iniciar Sesión</h2>
        <form id="loginForm" method="POST" action="index.php">
            <input type="hidden" name="login" value="1">
            <input type="email" id="email" name="email" placeholder="Correo electrónico" required value="<?php echo isset($_POST['email']) ? htmlspecialchars($_POST['email']) : ''; ?>">
            <div id="emailError" class="error"></div>
            <input type="password" id="contrasena" name="contrasena" placeholder="Contraseña" required>
            <div id="passwordError" class="error"><?php echo isset($error) ? $error : ''; ?></div>
            <div class="button-container">
                <button type="submit" class="login-submit">Iniciar Sesión</button>
                <button type="button" class="register-btn" onclick="window.location.href='registro.php'">Registrarse</button>
            </div>
        </form>
    </div>
</div>
<?php endif; ?>

<script>
    function openModal() {
        document.getElementById('loginModal').style.display = 'flex';
        document.getElementById('loginForm').reset();
        document.getElementById('emailError').textContent = '';
        document.getElementById('passwordError').textContent = '';
    }

    function closeModal() {
        document.getElementById('loginModal').style.display = 'none';
        document.getElementById('emailError').textContent = '';
        document.getElementById('passwordError').textContent = '';
    }

    window.onclick = function(event) {
        if (event.target == document.getElementById('loginModal')) {
            closeModal();
        }
    }

    function logout() {
        window.location.href = 'index.php?salir=true';
    }

    // Abrir el modal automáticamente si hay un error
    <?php if (!empty($error)): ?>
        document.getElementById('loginModal').style.display = 'flex';
    <?php endif; ?>
</script>