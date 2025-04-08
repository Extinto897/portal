<?php
session_start();
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="keywords" content="">
    <meta name="author" content="Alejandro Sanahuja Benitez">
    <title>Contacto - Cimientos & Sueños Inmobiliaria</title>
    <link rel="shortcut icon" href="img/favicon.ico" alt="">
    <link rel="stylesheet" href="css/contacto.css">
</head>
<body>
    <?php
    if (isset($_GET['success']) && $_GET['success'] == 1) {
        echo '<p style="color: green; text-align: center;">¡Consulta enviada correctamente!</p>';
    }
    ?>
    <div class="contact-form">
        <a href="http://localhost/portal%20web/" class="home-btn">Inicio</a>
        <h2>Cimientos & Sueños<br>Inmobiliaria</h2>
        <form action="enviar_correo.php" method="POST" onsubmit="return validarFormulario()">
            <div class="form-group">
                <label for="nombre">Nombre completo *</label>
                <input type="text" id="nombre" name="nombre" required>
            </div>

            <div class="form-group">
                <label for="dni">DNI/NIE *</label>
                <input type="text" id="dni" name="dni" required placeholder="Ej: 12345678Z">
                <span id="dni-error" class="error-message">Por favor, introduce un DNI válido (8 números y 1 letra)</span>
            </div>

            <div class="form-group">
                <label for="email">Correo electrónico *</label>
                <input type="email" id="email" name="email" required>
            </div>

            <div class="form-group">
                <label for="telefono">Teléfono</label>
                <input type="tel" id="telefono" name="telefono">
            </div>

            <div class="form-group">
                <label for="tipo">Estoy interesado en:</label>
                <select id="tipo" name="tipo">
                    <option value="compra">Compra de propiedad</option>
                    <option value="venta">Venta de propiedad</option>
                    <option value="alquiler">Alquiler</option>
                    <option value="tasacion">Tasación</option>
                </select>
            </div>

            <div class="form-group">
                <label for="presupuesto">Presupuesto aproximado</label>
                <input type="number" id="presupuesto" name="presupuesto" step="1000">
            </div>

            <div class="form-group">
                <label for="mensaje">Mensaje</label>
                <textarea id="mensaje" name="mensaje" rows="4"></textarea>
            </div>

            <button type="submit" class="submit-btn">Enviar consulta</button>
        </form>
    </div>

    <script>
        function validarDNI(dni) {
            const dniRegex = /^\d{8}[A-Z]$/;
            if (!dniRegex.test(dni)) return false;

            const letras = 'TRWAGMYFPDXBNJZSQVHLCKE';
            const numeros = dni.substring(0, 8);
            const letra = dni.substring(8, 9);
            const calculo = parseInt(numeros) % 23;
            const letraCorrecta = letras.charAt(calculo);

            return letra === letraCorrecta;
        }

        function validarFormulario() {
            const dniInput = document.getElementById('dni');
            const dniError = document.getElementById('dni-error');
            const dni = dniInput.value.toUpperCase();

            if (!validarDNI(dni)) {
                dniInput.classList.add('error');
                dniError.style.display = 'block';
                return false;
            } else {
                dniInput.classList.remove('error');
                dniError.style.display = 'none';
                return true;
            }
        }

        document.getElementById('dni').addEventListener('input', function() {
            const dniInput = this;
            const dniError = document.getElementById('dni-error');
            
            if (this.value.length > 0 && !validarDNI(this.value.toUpperCase())) {
                dniInput.classList.add('error');
                dniError.style.display = 'block';
            } else {
                dniInput.classList.remove('error');
                dniError.style.display = 'none';
            }
        });
    </script>
</body>
</html>
<?php
var_dump($_SESSION);
?>