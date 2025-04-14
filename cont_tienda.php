<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/styles_tienda.css">
</head>
<body>
<h1 class="welcome_to_shop">Bienvenido a la tienda oficial de Cimientos & Sueños</h1>
<h2>Merchandising oficial</h2>
<div class="shop-container">
    <div class="products-grid">
        <!-- Producto 1 -->
        <div class="product-card">
            <img src="img/productos/taza.png" alt="taza" class="product-image">
            <h2 class="product-name">Taza</h2>
            <p class="product-description">Taza color blanco 11 oz.</p>
            <p class="product-price">15.00€</p>
            <p class="product-stock">Stock: <span class="stock-count">500</span></p>
            <button class="buy-button" onclick="addToCart('Taza', 15.00)">Añadir a la cesta</button>
        </div>

        <!-- Producto 2 -->
        <div class="product-card">
            <img src="img/productos/camiseta_unisex.png" alt="camiseta unisex" class="product-image">
            <h2 class="product-name">Camiseta unisex</h2>
            <p class="product-description">Camiseta unisex gris claro.</p>
            <p class="product-price">22.00€</p>
            <p class="product-stock">Stock: <span class="stock-count">500</span></p>
            <button class="buy-button" onclick="addToCart('Camiseta unisex', 22.00)">Añadir a la cesta</button>
        </div>

        <!-- Producto 3 -->
        <div class="product-card">
            <img src="img/productos/sudadera.png" alt="sudadera" class="product-image">
            <h2 class="product-name">Sudadera invierno</h2>
            <p class="product-description">Sudadera invierno con capucha unisex.</p>
            <p class="product-price">35.60€</p>
            <p class="product-stock">Stock: <span class="stock-count">500</span></p>
            <button class="buy-button" onclick="addToCart('Sudadera invierno', 35.60)">Añadir a la cesta</button>
        </div>

        <!-- Producto 4 -->
        <div class="product-card">
            <img src="img/productos/funda.png" alt="funda telefono" class="product-image">
            <h2 class="product-name">Funda para Samsung Galaxy S25 Ultra</h2>
            <p class="product-description">Funda clásica para Samsung Galaxy S25 Ultra.</p>
            <p class="product-price">15.99€</p>
            <p class="product-stock">Stock: <span class="stock-count">500</span></p>
            <button class="buy-button" onclick="addToCart('Funda para Samsung Galaxy S25 Ultra', 15.99)">Añadir a la cesta</button>
        </div>

        <!-- Producto 5 -->
        <div class="product-card">
            <img src="img/productos/mochila.png" alt="mochila" class="product-image">
            <h2 class="product-name">Mochila Under Armour</h2>
            <p class="product-description">Mochila Under Armour resistente.</p>
            <p class="product-price">60.99€</p>
            <p class="product-stock">Stock: <span class="stock-count">500</span></p>
            <button class="buy-button" onclick="addToCart('Mochila Under Armour', 60.99)">Añadir a la cesta</button>
        </div>

        <!-- Producto 6 -->
        <div class="product-card">
            <img src="img/productos/alfombrilla.png" alt="alfombrilla raton" class="product-image">
            <h2 class="product-name">Alfombrilla para ratón</h2>
            <p class="product-description">Alfombrilla para ratón, incluye de regalo ratón y teclado inalámbrico RGB.</p>
            <p class="product-price">16.99€</p>
            <p class="product-stock">Stock: <span class="stock-count">500</span></p>
            <button class="buy-button" onclick="addToCart('Alfombrilla para ratón', 16.99)">Añadir a la cesta</button>
        </div>

        <!-- Producto 7 -->
        <div class="product-card">
            <img src="img/productos/funda_airpod.png" alt="Case for AirPods" class="product-image">
            <h2 class="product-name">Case for AirPods Pro Gen 2</h2>
            <p class="product-description">Funda para AirPods Pro Gen 2 de silicona resistente.</p>
            <p class="product-price">16.94€</p>
            <p class="product-stock">Stock: <span class="stock-count">500</span></p>
            <button class="buy-button" onclick="addToCart('Case for AirPods Pro Gen 2', 16.94)">Añadir a la cesta</button>
        </div>

        <!-- Producto 8 -->
        <div class="product-card">
            <img src="img/productos/bolsa_deporte.png" alt="bolsa deportiva" class="product-image">
            <h2 class="product-name">Bolsa deportiva all over</h2>
            <p class="product-description">Bolsa deportiva all over de alta capacidad.</p>
            <p class="product-price">70.65€</p>
            <p class="product-stock">Stock: <span class="stock-count">500</span></p>
            <button class="buy-button" onclick="addToCart('Bolsa deportiva all over', 70.65)">Añadir a la cesta</button>
        </div>
    </div>
</div>
</body>
</html>