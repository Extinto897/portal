<link rel="stylesheet" href="css/inicio_sesion.css">
<form name="sesion" method="post" action="<?php echo $_SERVER["PHP_SELF"]; ?>">
    <div class="form-group">
        <label for="usuario">Usuario </label>
        <input type="text" id="usuario" name="usuario">
    </div>

    <div class="form-group">
        <label for="password">Contraseña </label>
        <input type="password" id="password" name="password">
    </div>

    <button type="submit" class="submit-btn">Iniciar sesión</button>
</form>
