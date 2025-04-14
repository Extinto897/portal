<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/styles_adminpanel.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Panel de Administración</title>
</head>
<body>
    <?php
    // Incluir archivo de conexión
    include 'conexion.php';

    // Consulta para obtener usuarios
    $query_usuarios = "SELECT id, nombre, email, rol FROM usuarios";
    $query = "SELECT ID_usuario, nombre, email, rol FROM usuarios";

    // Consulta para obtener productos
    $query_productos = "SELECT id, nombre, stock, precio, foto FROM productos";
    $resultado_productos = mysqli_query($conexion, $query_productos);

    // Consulta para obtener pedidos (si deseas mantener esta funcionalidad)
    $query_pedidos = "SELECT p.id, u.nombre AS usuario, pr.nombre AS producto, p.cantidad, p.estado 
                      FROM pedidos p 
                      JOIN usuarios u ON p.id_usuario = u.id 
                      JOIN productos pr ON p.id_producto = pr.id";
    $resultado_pedidos = mysqli_query($conexion, $query_pedidos);
    ?>

    <!-- Navegación entre paneles -->
    <ul class="nav nav-tabs mb-4">
        <li class="nav-item">
            <a class="nav-link active" href="#users" data-bs-toggle="tab">Usuarios</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#products" data-bs-toggle="tab">Productos y Pedidos</a>
        </li>
    </ul>

    <div class="tab-content">
        <!-- Panel de Usuarios -->
        <div class="tab-pane fade show active panel" id="users">
            <h2>Gestión de Usuarios</h2>
            <button class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#userModal">Agregar Usuario</button>
            <div class="table-container">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nombre</th>
                            <th>Email</th>
                            <th>Rol</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody id="userTableBody">
                        <?php while ($usuario = mysqli_fetch_assoc($resultado_usuarios)) { ?>
                            <tr>
                                <td><?php echo $usuario['id']; ?></td>
                                <td><?php echo htmlspecialchars($usuario['nombre']); ?></td>
                                <td><?php echo htmlspecialchars($usuario['email']); ?></td>
                                <td><?php echo htmlspecialchars($usuario['rol']); ?></td>
                                <td>
                                    <button class="btn btn-sm btn-warning" onclick="editUser(<?php echo $usuario['id']; ?>, '<?php echo htmlspecialchars($usuario['nombre']); ?>', '<?php echo htmlspecialchars($usuario['email']); ?>', '<?php echo htmlspecialchars($usuario['rol']); ?>')">Editar</button>
                                    <button class="btn btn-sm btn-danger" onclick="deleteUser(<?php echo $usuario['id']; ?>)">Eliminar</button>
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>

        <!-- Panel de Productos y Pedidos -->
        <div class="tab-pane fade panel" id="products">
            <h2>Gestión de Productos</h2>
            <button class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#productModal">Agregar Producto</button>
            <div class="table-container">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Foto</th>
                            <th>Nombre</th>
                            <th>Stock</th>
                            <th>Precio</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody id="productTableBody">
                        <?php while ($producto = mysqli_fetch_assoc($resultado_productos)) { ?>
                            <tr>
                                <td><?php echo $producto['id']; ?></td>
                                <td>
                                    <?php if ($producto['foto']) { ?>
                                        <img src="images/<?php echo htmlspecialchars($producto['foto']); ?>" alt="<?php echo htmlspecialchars($producto['nombre']); ?>" style="width: 50px; height: auto;">
                                    <?php } else { ?>
                                        Sin imagen
                                    <?php } ?>
                                </td>
                                <td><?php echo htmlspecialchars($producto['nombre']); ?></td>
                                <td><?php echo $producto['stock']; ?></td>
                                <td><?php echo number_format($producto['precio'], 2); ?></td>
                                <td>
                                    <button class="btn btn-sm btn-warning" onclick="editProduct(<?php echo $producto['id']; ?>, '<?php echo htmlspecialchars($producto['nombre']); ?>', <?php echo $producto['stock']; ?>, <?php echo $producto['precio']; ?>, '<?php echo htmlspecialchars($producto['foto']); ?>')">Editar</button>
                                    <button class="btn btn-sm btn-danger" onclick="deleteProduct(<?php echo $producto['id']; ?>)">Eliminar</button>
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>

            <h2 class="mt-4">Pedidos</h2>
            <div class="table-container">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>ID Pedido</th>
                            <th>Usuario</th>
                            <th>Producto</th>
                            <th>Cantidad</th>
                            <th>Estado</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody id="orderTableBody">
                        <?php while ($pedido = mysqli_fetch_assoc($resultado_pedidos)) { ?>
                            <tr>
                                <td><?php echo $pedido['id']; ?></td>
                                <td><?php echo htmlspecialchars($pedido['usuario']); ?></td>
                                <td><?php echo htmlspecialchars($pedido['producto']); ?></td>
                                <td><?php echo $pedido['cantidad']; ?></td>
                                <td><?php echo htmlspecialchars($pedido['estado']); ?></td>
                                <td>
                                    <button class="btn btn-sm btn-warning" onclick="editOrder(<?php echo $pedido['id']; ?>)">Editar</button>
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- Modal para Usuarios -->
    <div class="modal fade" id="userModal" tabindex="-1" aria-labelledby="userModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="userModalLabel">Editar/Agregar Usuario</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="userForm" action="guardar_usuario.php" method="POST">
                        <input type="hidden" id="userId" name="userId">
                        <div class="mb-3">
                            <label for="userName" class="form-label">Nombre</label>
                            <input type="text" class="form-control" id="userName" name="userName" required>
                        </div>
                        <div class="mb-3">
                            <label for="userEmail" class="form-label">Email</label>
                            <input type="email" class="form-control" id="userEmail" name="userEmail" required>
                        </div>
                        <div class="mb-3">
                            <label for="userRole" class="form-label">Rol</label>
                            <select class="form-select" id="userRole" name="userRole" required>
                                <option value="admin">Admin</option>
                                <option value="user">Usuario</option>
                            </select>
                        </div>
                        <button type="submit" class="btn btn-primary">Guardar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal para Productos -->
    <div class="modal fade" id="productModal" tabindex="-1" aria-labelledby="productModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="productModalLabel">Editar/Agregar Producto</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="productForm" action="guardar_producto.php" method="POST" enctype="multipart/form-data">
                        <input type="hidden" id="productId" name="productId">
                        <div class="mb-3">
                            <label for="productName" class="form-label">Nombre</label>
                            <input type="text" class="form-control" id="productName" name="productName" required>
                        </div>
                        <div class="mb-3">
                            <label for="productStock" class="form-label">Stock</label>
                            <input type="number" class="form-control" id="productStock" name="productStock" required>
                        </div>
                        <div class="mb-3">
                            <label for="productPrice" class="form-label">Precio</label>
                            <input type="number" step="0.01" class="form-control" id="productPrice" name="productPrice" required>
                        </div>
                        <div class="mb-3">
                            <label for="productPhoto" class="form-label">Foto</label>
                            <input type="file" class="form-control" id="productPhoto" name="productPhoto" accept="image/*">
                        </div>
                        <button type="submit" class="btn btn-primary">Guardar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // Editar usuario
        function editUser(id, name, email, role) {
            document.getElementById("userId").value = id;
            document.getElementById("userName").value = name;
            document.getElementById("userEmail").value = email;
            document.getElementById("userRole").value = role;
            new bootstrap.Modal(document.getElementById("userModal")).show();
        }

        // Editar producto
        function editProduct(id, name, stock, price, photo) {
            document.getElementById("productId").value = id;
            document.getElementById("productName").value = name;
            document.getElementById("productStock").value = stock;
            document.getElementById("productPrice").value = price;
            // La foto no se puede pre-cargar en un input tipo file por seguridad
            new bootstrap.Modal(document.getElementById("productModal")).show();
        }

        // Eliminar usuario (ejemplo, necesitarás un archivo PHP para procesarlo)
        function deleteUser(id) {
            if (confirm("¿Estás seguro de eliminar este usuario?")) {
                window.location.href = `eliminar_usuario.php?id=${id}`;
            }
        }

        // Eliminar producto (ejemplo, necesitarás un archivo PHP para procesarlo)
        function deleteProduct(id) {
            if (confirm("¿Estás seguro de eliminar este producto?")) {
                window.location.href = `eliminar_producto.php?id=${id}`;
            }
        }

        // Editar pedido (simulación, necesitarás lógica adicional)
        function editOrder(id) {
            alert("Editar pedido ID: " + id + " (funcionalidad no implementada)");
        }
    </script>
</body>
</html>