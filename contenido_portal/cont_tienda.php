<?php
// Incluir el archivo de conexión
include 'conexion.php';

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
    <style>
        /* Estilos para la tienda */
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 20px;
            background-color: #f5f5f5;
        }
        .welcome_to_shop {
            text-align: center;
            color: #333;
            margin-bottom: 10px;
        }
        h2 {
            text-align: center;
            color: #555;
            margin-top: 0;
        }
        .shop-container {
            max-width: 1200px;
            margin: 0 auto;
        }
        .products-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(250px, 1fr));
            gap: 20px;
            padding: 20px;
        }
        .product-card {
            background: white;
            border-radius: 8px;
            padding: 15px;
            box-shadow: 0 2px 5px rgba(0,0,0,0.1);
            transition: transform 0.3s ease;
        }
        .product-card:hover {
            transform: translateY(-5px);
        }
        .product-image {
            width: 100%;
            height: 200px;
            object-fit: contain;
            border-bottom: 1px solid #eee;
            padding-bottom: 10px;
            margin-bottom: 10px;
        }
        .product-name {
            font-size: 1.1rem;
            margin: 10px 0;
            color: #333;
        }
        .product-description {
            color: #666;
            font-size: 0.9rem;
            margin: 10px 0;
            min-height: 40px;
        }
        .product-price {
            font-weight: bold;
            color: #e63946;
            font-size: 1.2rem;
            margin: 10px 0;
        }
        .product-stock {
            color: #666;
            font-size: 0.9rem;
        }
        .buy-button {
            width: 100%;
            padding: 10px;
            background-color: #4CAF50;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 1rem;
            margin-top: 10px;
            transition: background-color 0.3s;
        }
        .buy-button:hover {
            background-color: #45a049;
        }
        .stock-low {
            color: #e63946;
            font-weight: bold;
        }
    </style>
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