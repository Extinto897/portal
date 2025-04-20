<?php
// Incluir el archivo de conexión
include '../Base_de_datos/conexion.php';

// Consulta para obtener todos los productos de la base de datos
$query = "SELECT * FROM productos";
$result = mysqli_query($conexion, $query);

// Verificar si hay errores en la consulta
if (!$result) {
    die("Error al obtener productos: " . mysqli_error($conexion));
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/styles_tienda.css">
    <title>Tienda Cimientos & Sueños</title>
    <link rel="stylesheet" href="../css/tienda.css">
</head>
<body>
<h1 class="welcome_to_shop">Bienvenido a la tienda oficial de Cimientos & Sueños</h1>
<h2>Merchandising oficial</h2>
<div class="shop-container">
    <div class="products-grid">
        <?php while ($producto = mysqli_fetch_assoc($result)): 
            // Determinar clase de stock
            $stockClass = ($producto['stock'] < 10) ? 'stock-low' : '';
        ?>
            <!-- Tarjeta de producto dinámica -->
            <div class="product-card">
                <img src="<?php echo htmlspecialchars($producto['foto']); ?>" alt="<?php echo htmlspecialchars($producto['nombre']); ?>" class="product-image">
                <h2 class="product-name"><?php echo htmlspecialchars($producto['nombre']); ?></h2>
                <p class="product-description"><?php echo htmlspecialchars($producto['descripcion'] ?? 'Descripción no disponible'); ?></p>
                <p class="product-price"><?php echo number_format($producto['precio'], 2); ?>€</p>
                <p class="product-stock">Stock: <span class="stock-count <?php echo $stockClass; ?>"><?php echo htmlspecialchars($producto['stock']); ?></span></p>
                <button class="buy-button" 
                        onclick="addToCart(<?php echo $producto['id']; ?>, '<?php echo htmlspecialchars($producto['nombre']); ?>', <?php echo $producto['precio']; ?>)"
                        <?php echo ($producto['stock'] <= 0) ? 'disabled' : ''; ?>>
                    <?php echo ($producto['stock'] <= 0) ? 'Agotado' : 'Añadir a la cesta'; ?>
                </button>
            </div>
        <?php endwhile; ?>
    </div>
</div>

<script>
// Función para añadir productos al carrito
function addToCart(id, nombre, precio) {
    // Obtener carrito actual de localStorage o crear uno nuevo
    let carrito = JSON.parse(localStorage.getItem('carrito') || '[]');
    
    // Verificar si el producto ya está en el carrito
    const itemExistente = carrito.find(item => item.id === id);
    
    if (itemExistente) {
        itemExistente.cantidad += 1;
    } else {
        carrito.push({
            id: id,
            nombre: nombre,
            precio: precio,
            cantidad: 1
        });
    }
    
    // Guardar en localStorage
    localStorage.setItem('carrito', JSON.stringify(carrito));
    
    // Mostrar notificación
    alert(`"${nombre}" añadido al carrito`);
    
    // Actualizar contador de carrito (si existe)
    if (typeof updateCartCount === 'function') {
        updateCartCount();
    }
}
</script>

<?php
// Cerrar la conexión a la base de datos
mysqli_close($conexion);
?>
<script type="text/javascript">
  (function(d, t) {
      var v = d.createElement(t), s = d.getElementsByTagName(t)[0];
      v.onload = function() {
        window.voiceflow.chat.load({
          verify: { projectID: '6803a2d33a517d28ef9f0354' },
          url: 'https://general-runtime.voiceflow.com',
          versionID: 'production',
          voice: {
            url: "https://runtime-api.voiceflow.com"
          }
        });
      }
      v.src = "https://cdn.voiceflow.com/widget-next/bundle.mjs"; v.type = "text/javascript"; s.parentNode.insertBefore(v, s);
  })(document, 'script');
</script>
</body>
</html>