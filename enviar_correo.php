<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php';

// Verificar si se envió el formulario
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Capturar y sanitizar los datos del formulario
    $nombre = isset($_POST['nombre']) ? htmlspecialchars($_POST['nombre']) : '';
    $dni = isset($_POST['dni']) ? htmlspecialchars($_POST['dni']) : '';
    $email = isset($_POST['email']) ? htmlspecialchars($_POST['email']) : '';
    $telefono = isset($_POST['telefono']) ? htmlspecialchars($_POST['telefono']) : '';
    $tipo = isset($_POST['tipo']) ? htmlspecialchars($_POST['tipo']) : '';
    $presupuesto = isset($_POST['presupuesto']) ? htmlspecialchars($_POST['presupuesto']) : '';
    $mensaje = isset($_POST['mensaje']) ? htmlspecialchars($_POST['mensaje']) : '';

    // Validar campos obligatorios
    if (empty($nombre) || empty($dni) || empty($email)) {
        die("Los campos obligatorios (Nombre, DNI, Correo) son requeridos.");
    }

    // Crear instancia de PHPMailer
    $mail = new PHPMailer(true);

    try {
        // Configuración SMTP de Mailtrap
        $mail->isSMTP();
        $mail->Host = 'sandbox.smtp.mailtrap.io';
        $mail->SMTPAuth = true;
        $mail->Username = 'b12bbdda2ca6c8'; // Reemplaza con tu username de Mailtrap
        $mail->Password = '4e2f8b27a5b8a0'; // Reemplaza con tu password de Mailtrap
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Port = 2525;

        // Configurar remitente y destinatario
        $mail->setFrom('no-reply@ejemplo.com', 'Cimientos & Sueños');
        $mail->addAddress('destinatario@ejemplo.com'); // Capturado por Mailtrap

        // Contenido del correo con datos del formulario
        $mail->isHTML(true);
        $mail->Subject = 'Nueva consulta desde el formulario web';
        $mail->Body = "
            <h1>Nueva consulta recibida</h1>
            <p><strong>Nombre completo:</strong> $nombre</p>
            <p><strong>DNI/NIE:</strong> $dni</p>
            <p><strong>Correo electrónico:</strong> $email</p>
            <p><strong>Teléfono:</strong> $telefono</p>
            <p><strong>Interesado en:</strong> $tipo</p>
            <p><strong>Presupuesto aproximado:</strong> " . ($presupuesto ? number_format($presupuesto, 0, ',', '.') . ' €' : 'No especificado') . "</p>
            <p><strong>Mensaje:</strong> $mensaje</p>
        ";
        $mail->AltBody = "Nombre: $nombre\nDNI: $dni\nCorreo: $email\nTeléfono: $telefono\nTipo: $tipo\nPresupuesto: $presupuesto\nMensaje: $mensaje";

        // Enviar correo
        $mail->send();
        // Redirigir al formulario con mensaje de éxito
        header("Location: contacto.php?success=1");
        exit;
    } catch (Exception $e) {
        echo "Error al enviar el correo: {$mail->ErrorInfo}";
    }
} else {
    echo "Por favor, envía el formulario.";
}
?>