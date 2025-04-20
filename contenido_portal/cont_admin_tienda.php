<?php
// Incluir el archivo de conexión
include '../Base_de_datos/conexion.php';

// Asegurarse de que la base de datos correcta esté seleccionada
mysqli_select_db($conexion, "Cimientos & Sueños") or die("Error al seleccionar la base de datos: " . mysqli_error($conexion));

// Verificar si la tabla 'productos' existe
$result = mysqli_query($conexion, "SHOW TABLES LIKE 'productos'");
if (mysqli_num_rows($result) == 0) {
    die("La tabla 'productos' no existe en la base de datos 'Cimientos & Sueños'. Verifique el nombre de la tabla.");
}

// Manejar la actualización de datos del producto
if (isset($_POST['actualizar_producto'])) {
    $id = isset($_POST['id']) ? intval($_POST['id']) : 0;
    $nombre = isset($_POST['nombre']) ? mysqli_real_escape_string($conexion, $_POST['nombre']) : '';
    $foto = isset($_POST['foto']) ? mysqli_real_escape_string($conexion, $_POST['foto']) : '';
    $precio = isset($_POST['precio']) ? floatval($_POST['precio']) : 0;
    $stock = isset($_POST['stock']) ? intval($_POST['stock']) : 0;

    if($id > 0) {
        $query = "UPDATE productos SET nombre='$nombre', foto='$foto', precio='$precio', stock='$stock' WHERE id='$id'";
        if (mysqli_query($conexion, $query)) {
            $mensaje_producto = "<p style='color:green;'>Producto actualizado correctamente.</p>";
        } else {
            $mensaje_producto = "<p style='color:red;'>Error al actualizar producto: " . mysqli_error($conexion) . "</p>";
        }
    }
}

// Obtener datos del producto para editar
$producto_editar = null;
if (isset($_GET['id_producto']) && is_numeric($_GET['id_producto']) && $_GET['id_producto'] > 0) {
    $id = intval($_GET['id_producto']);
    $query = "SELECT * FROM productos WHERE id='$id'";
    $result = mysqli_query($conexion, $query);
    if ($result && mysqli_num_rows($result) > 0) {
        $producto_editar = mysqli_fetch_assoc($result);
    } else {
        $error_producto = "<p style='color:red;'>Error: Producto no encontrado.</p>";
    }
}

// Obtener todos los productos
$query_productos = "SELECT * FROM `productos`";
$result_productos = mysqli_query($conexion, $query_productos);
if (!$result_productos) {
    $error_lista_productos = "<p style='color:red;'>Error en la consulta de productos: " . mysqli_error($conexion) . "</p>";
}
?>
 <link rel="stylesheet" href="../css/admin.css">
    <h1>Gestión de Productos</h1>

    <!-- Mostrar mensajes de éxito/error -->
    <?php if(isset($mensaje_producto)) echo $mensaje_producto; ?>
    <?php if(isset($error_producto)) echo $error_producto; ?>

    <!-- Lista de productos -->
    <div class="section">
        <h2>Lista de Productos</h2>
        <?php if(isset($error_lista_productos)): ?>
            <?php echo $error_lista_productos; ?>
        <?php elseif($result_productos && mysqli_num_rows($result_productos) > 0): ?>
            <table>
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Foto</th>
                    <th>Precio</th>
                    <th>Stock</th>
                    <th>Acción</th>
                </tr>
                <?php while ($producto = mysqli_fetch_assoc($result_productos)): ?>
                    <tr>
                        <td><?php echo htmlspecialchars($producto['id']); ?></td>
                        <td><?php echo htmlspecialchars($producto['nombre']); ?></td>
                        <td><img src="<?php echo htmlspecialchars($producto['foto']); ?>" alt="<?php echo htmlspecialchars($producto['nombre']); ?>" width="50"></td>
                        <td><?php echo htmlspecialchars($producto['precio']); ?></td>
                        <td><?php echo htmlspecialchars($producto['stock']); ?></td>
                        <td><a href="../contenido_portal/cont_tienda.php?id_producto=<?php echo htmlspecialchars($producto['id']); ?>" class="edit-link">Editar</a></td>
                    </tr>
                <?php endwhile; ?>
            </table>
        <?php else: ?>
            <p class="error">No se encontraron productos.</p>
        <?php endif; ?>
    </div>

    <!-- Formulario para modificar productos -->
    <?php if ($producto_editar): ?>
        <div class="form-container">
            <h2>Modificar Producto</h2>
            <form method="POST" action="">
                <input type="hidden" name="id" value="<?php echo htmlspecialchars($producto_editar['id']); ?>">
                
                <label>Nombre:</label>
                <input type="text" name="nombre" value="<?php echo htmlspecialchars($producto_editar['nombre']); ?>" required>

                <label>Foto (ruta de la imagen):</label>
                <input type="text" name="foto" value="<?php echo htmlspecialchars($producto_editar['foto']); ?>" required>

                <label>Precio:</label>
                <input type="number" step="0.01" name="precio" value="<?php echo htmlspecialchars($producto_editar['precio']); ?>" required>

                <label>Stock:</label>
                <input type="number" name="stock" value="<?php echo htmlspecialchars($producto_editar['stock']); ?>" required>

                <div class="button-container">
                    <button type="submit" name="actualizar_producto">Actualizar Producto</button>
                    <a href="http://localhost/portal/elementos_menu/admin_tienda.php" class="btn-volver">Volver al Portal</a>
                </div>
            </form>
        </div>
    <?php endif; ?>

</body>
</html>

<?php
// Cerrar la conexión
mysqli_close($conexion);
?>