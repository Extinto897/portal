<?php
// Habilitar depuración
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Incluir el archivo de conexión
include 'conexion.php';

// Asegurarse de que la base de datos correcta esté seleccionada
mysqli_set_charset($conexion, "utf8");
mysqli_select_db($conexion, "cimientos & sueños") or die("Error al seleccionar la base de datos: " . mysqli_error($conexion));

// Verificar si la tabla 'usuarios' existe
$result = mysqli_query($conexion, "SHOW TABLES LIKE 'usuarios'");
if (mysqli_num_rows($result) == 0) {
    die("La tabla 'usuarios' no existe en la base de datos 'cimientos & sueños'. Verifique el nombre de la tabla.");
}

// Manejar la eliminación de usuarios
if (isset($_GET['eliminar_usuario']) && is_numeric($_GET['eliminar_usuario']) && $_GET['eliminar_usuario'] > 0) {
    $id = intval($_GET['eliminar_usuario']);
    $query = "DELETE FROM usuarios WHERE id_usuario='$id'";
    if (mysqli_query($conexion, $query)) {
        if (mysqli_affected_rows($conexion) > 0) {
            $mensaje_usuario = "<p style='color:green;'>Usuario eliminado correctamente.</p>";
        } else {
            $mensaje_usuario = "<p style='color:red;'>Error: No se encontró el usuario con ID $id.</p>";
        }
    } else {
        $mensaje_usuario = "<p style='color:red;'>Error al eliminar usuario: " . mysqli_error($conexion) . "</p>";
    }
    // Redirigir para evitar reenvíos de formulario
    header("Location: admin_usuarios.php");
    exit();
}

// Manejar la actualización de datos del usuario
$mensaje_usuario = '';
if (isset($_POST['actualizar_usuario'])) {
    $id = isset($_POST['id']) ? intval($_POST['id']) : 0;
    $nombre = isset($_POST['nombre']) ? trim(mysqli_real_escape_string($conexion, $_POST['nombre'])) : '';
    $rol = isset($_POST['rol']) ? trim(mysqli_real_escape_string($conexion, $_POST['rol'])) : '';
    $email = isset($_POST['email']) ? trim(mysqli_real_escape_string($conexion, $_POST['email'])) : '';
    $contrasena = isset($_POST['contrasena']) ? trim($_POST['contrasena']) : '';

    // Validar los datos
    if ($id > 0 && !empty($nombre) && !empty($rol) && !empty($email) && filter_var($email, FILTER_VALIDATE_EMAIL)) {
        // Construir la consulta de actualización
        $query = "UPDATE usuarios SET nombre='$nombre', rol='$rol', email='$email'";
        
        // Si se proporcionó una contraseña, hashearla y añadirla a la consulta
        if (!empty($contrasena)) {
            if (strlen($contrasena) < 6) {
                $mensaje_usuario = "<p style='color:red;'>Error: La contraseña debe tener al menos 6 caracteres.</p>";
            } else {
                $contrasena_hash = password_hash($contrasena, PASSWORD_DEFAULT);
                $query .= ", contrasena='$contrasena_hash'";
            }
        }

        // Completar la consulta
        $query .= " WHERE id_usuario='$id'";

        // Ejecutar la consulta si no hay error de validación de contraseña
        if (empty($mensaje_usuario)) {
            if (mysqli_query($conexion, $query)) {
                if (mysqli_affected_rows($conexion) > 0) {
                    $mensaje_usuario = "<p style='color:green;'>Usuario actualizado correctamente.</p>";
                } else {
                    $mensaje_usuario = "<p style='color:red;'>Error: No se encontró el usuario con ID $id.</p>";
                }
            } else {
                $mensaje_usuario = "<p style='color:red;'>Error al actualizar usuario: " . mysqli_error($conexion) . "</p>";
            }
        }
    } else {
        $mensaje_usuario = "<p style='color:red;'>Error: Datos inválidos o incompletos. ID: $id, Nombre: $nombre, Rol: $rol, Email: $email</p>";
    }
}

// Obtener datos del usuario para editar
$usuario_editar = null;
if (isset($_GET['id_usuario']) && is_numeric($_GET['id_usuario']) && $_GET['id_usuario'] > 0) {
    $id = intval($_GET['id_usuario']);
    $query = "SELECT * FROM usuarios WHERE id_usuario='$id'";
    $result = mysqli_query($conexion, $query);
    if ($result && mysqli_num_rows($result) > 0) {
        $usuario_editar = mysqli_fetch_assoc($result);
    } else {
        $error_usuario = "<p style='color:red;'>Error: Usuario no encontrado.</p>";
    }
}

// Obtener todos los usuarios
$query_usuarios = "SELECT * FROM usuarios";
$result_usuarios = mysqli_query($conexion, $query_usuarios);
if (!$result_usuarios) {
    $error_lista_usuarios = "<p style='color:red;'>Error en la consulta de usuarios: " . mysqli_error($conexion) . "</p>";
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Gestión de Usuarios</title>
    <link rel="stylesheet" href="css/admin.css">
    <style>
        .delete-link {
            color: red;
            margin-left: 10px;
            text-decoration: none;
        }
        .delete-link:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <h1>Gestión de Usuarios</h1>

    <!-- Mostrar mensajes de éxito/error -->
    <?php if (!empty($mensaje_usuario)) echo $mensaje_usuario; ?>
    <?php if (isset($error_usuario)) echo $error_usuario; ?>

    <!-- Lista de usuarios -->
    <div class="section">
        <h2>Lista de Usuarios</h2>
        <?php if (isset($error_lista_usuarios)): ?>
            <?php echo $error_lista_usuarios; ?>
        <?php elseif ($result_usuarios && mysqli_num_rows($result_usuarios) > 0): ?>
            <table>
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Rol</th>
                    <th>Email</th>
                    <th>Contraseña</th>
                    <th>Acción</th>
                </tr>
                <?php while ($usuario = mysqli_fetch_assoc($result_usuarios)): ?>
                    <tr>
                        <td><?php echo htmlspecialchars($usuario['id_usuario']); ?></td>
                        <td><?php echo htmlspecialchars($usuario['nombre']); ?></td>
                        <td><?php echo htmlspecialchars($usuario['rol']); ?></td>
                        <td><?php echo htmlspecialchars($usuario['email']); ?></td>
                        <td>********</td> <!-- Ocultar la contraseña por seguridad -->
                        <td>
                            <a href="admin_usuarios.php?id_usuario=<?php echo htmlspecialchars($usuario['id_usuario']); ?>" class="edit-link">Editar</a>
                            <a href="admin_usuarios.php?eliminar_usuario=<?php echo htmlspecialchars($usuario['id_usuario']); ?>" class="delete-link" onclick="return confirm('¿Estás seguro de que quieres eliminar este usuario?');">Eliminar</a>
                        </td>
                    </tr>
                <?php endwhile; ?>
            </table>
        <?php else: ?>
            <p class="error">No se encontraron usuarios.</p>
        <?php endif; ?>
    </div>

    <!-- Formulario para modificar usuarios -->
    <?php if ($usuario_editar): ?>
        <div class="form-container">
            <h2>Modificar Usuario</h2>
            <form method="POST" action="admin_usuarios.php">
                <input type="hidden" name="id" value="<?php echo htmlspecialchars($usuario_editar['id_usuario']); ?>">
                
                <label>Nombre:</label>
                <input type="text" name="nombre" value="<?php echo htmlspecialchars($usuario_editar['nombre']); ?>" required>

                <label>Rol:</label>
                <input type="text" name="rol" value="<?php echo htmlspecialchars($usuario_editar['rol']); ?>" required>

                <label>Email:</label>
                <input type="email" name="email" value="<?php echo htmlspecialchars($usuario_editar['email']); ?>" required>

                <label>Contraseña (dejar en blanco para no cambiar):</label>
                <input type="password" name="contrasena" placeholder="Nueva contraseña">

                <div class="button-container">
                    <button type="submit" name="actualizar_usuario">Actualizar Usuario</button>
                    <a href="http://localhost/portal/index.php" class="btn-volver">Volver al Portal</a>
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