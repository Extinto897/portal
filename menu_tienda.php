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
        <!-- Ícono del carrito a la izquierda -->
        <div id="cartIcon" class="cart-icon" onclick="openCartModal()">
            <i class="fa-solid fa-cart-shopping"></i>
        </div>
        <?php if (isset($_SESSION['rol']) && $_SESSION['rol'] !== "invitado"): ?>
            <button id="logoutButton" class="logout-btn" onclick="logout()">Cerrar Sesión</button>
        <?php else: ?>
            <div id="accessIcon" class="access-icon" onclick="openModal()">
                <img src="img/boton_login.png" alt="Ícono de acceso">
            </div>
        <?php endif; ?>
    </div>
</nav>

<!-- Modal del carrito -->
<div id="cartModal" class="cart-modal">
    <div class="cart-modal-content">
        <span class="close-cart-btn" onclick="closeCartModal()">×</span>
        <h2>Carrito de Compras</h2>
        <div id="cartItems"></div>
        <p class="cart-total">Total: <span id="cartTotal">0.00€</span></p>
        <button onclick="clearCart()" class="clear-btn">Vaciar Carrito</button>
        <button onclick="proceedToCheckout()" class="buy-btn" id="buyButton" disabled>Comprar</button>
    </div>
</div>

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
    // Funciones para el modal de inicio de sesión
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
        if (event.target == document.getElementById('cartModal')) {
            closeCartModal();
        }
    }

    function logout() {
        window.location.href = 'index.php?salir=true';
    }

    // Abrir el modal automáticamente si hay un error
    <?php if (!empty($error)): ?>
        document.getElementById('loginModal').style.display = 'flex';
    <?php endif; ?>

    // Funciones para el carrito
    let cart = [];

    function openCartModal() {
        document.getElementById('cartModal').style.display = 'flex';
        updateCartDisplay();
    }

    function closeCartModal() {
        document.getElementById('cartModal').style.display = 'none';
    }

    function addToCart(productName, price) {
        // Buscar si el producto ya está en el carrito
        const existingItem = cart.find(item => item.name === productName);
        if (existingItem) {
            existingItem.quantity += 1; // Incrementar cantidad
        } else {
            cart.push({ name: productName, price: price, quantity: 1 }); // Añadir nuevo producto
        }
        updateCartDisplay();
    }

    function increaseQuantity(index) {
        cart[index].quantity += 1;
        updateCartDisplay();
    }

    function decreaseQuantity(index) {
        if (cart[index].quantity > 1) {
            cart[index].quantity -= 1;
        } else {
            cart.splice(index, 1); // Eliminar el producto si la cantidad es 0
        }
        updateCartDisplay();
    }

    function clearCart() {
        cart = [];
        updateCartDisplay();
    }

    function proceedToCheckout() {
        if (cart.length === 0) {
            alert('El carrito está vacío.');
            return;
        }
        window.location.href = 'checkout.php';
    }

    function updateCartDisplay() {
        const cartItemsDiv = document.getElementById('cartItems');
        const buyButton = document.getElementById('buyButton');
        const cartTotalSpan = document.getElementById('cartTotal');
        cartItemsDiv.innerHTML = '';

        if (cart.length === 0) {
            cartItemsDiv.innerHTML = '<p class="empty-cart">El carrito está vacío.</p>';
            buyButton.disabled = true;
            buyButton.classList.remove('enabled');
            cartTotalSpan.textContent = '0.00€';
        } else {
            cart.forEach((item, index) => {
                const itemDiv = document.createElement('div');
                itemDiv.className = 'cart-item';
                itemDiv.innerHTML = `
                    <span>${item.name}</span>
                    <div class="quantity-controls">
                        <button class="quantity-btn" onclick="decreaseQuantity(${index})">−</button>
                        <span class="quantity">${item.quantity}</span>
                        <button class="quantity-btn" onclick="increaseQuantity(${index})">+</button>
                    </div>
                    <span>${(item.price * item.quantity).toFixed(2)}€</span>
                `;
                cartItemsDiv.appendChild(itemDiv);
            });
            buyButton.disabled = false;
            buyButton.classList.add('enabled');

            // Calcular el total
            const total = cart.reduce((sum, item) => sum + item.price * item.quantity, 0);
            cartTotalSpan.textContent = `${total.toFixed(2)}€`;
        }
    }
</script>