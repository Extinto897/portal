<?php
// Conexión a la base de datos
$servername = "localhost";
$username = "root"; // Cambia si tu usuario es diferente
$password = ""; // Cambia si tienes una contraseña
$dbname = "cimientos & sueños";

try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "Conexión exitosa<br>";
} catch (PDOException $e) {
    die("Conexión fallida: " . $e->getMessage());
}

// Cargar el archivo cont_tienda.php
$html = file_get_contents('cont_tienda.php');

// Usar DOMDocument para parsear el HTML
$doc = new DOMDocument();
@$doc->loadHTML($html); // @ para evitar warnings de HTML malformado
$productCards = $doc->getElementsByTagName('div');

// Recorrer las tarjetas de productos
foreach ($productCards as $card) {
    if ($card->getAttribute('class') === 'product-card') {
        // Extraer nombre
        $nombre = '';
        $h2s = $card->getElementsByTagName('h2');
        if ($h2s->length > 0) {
            $nombre = $h2s->item(0)->nodeValue;
        }

        // Extraer imagen
        $foto = '';
        $imgs = $card->getElementsByTagName('img');
        if ($imgs->length > 0) {
            $foto = $imgs->item(0)->getAttribute('src');
        }

        // Extraer stock
        $stock = 0;
        $spans = $card->getElementsByTagName('span');
        foreach ($spans as $span) {
            if ($span->getAttribute('class') === 'stock-count') {
                $stock = (int)$span->nodeValue;
                break;
            }
        }

        // Insertar en la base de datos
        if (!empty($nombre) && !empty($foto) && $stock > 0) {
            try {
                $sql = "INSERT INTO productos (nombre, foto, stock) VALUES (:nombre, :foto, :stock)";
                $stmt = $conn->prepare($sql);
                $stmt->bindParam(':nombre', $nombre);
                $stmt->bindParam(':foto', $foto);
                $stmt->bindParam(':stock', $stock);
                $stmt->execute();
                echo "Producto '$nombre' insertado correctamente.<br>";
            } catch (PDOException $e) {
                echo "Error al insertar '$nombre': " . $e->getMessage() . "<br>";
            }
        }
    }
}

// Cerrar conexión
$conn = null;
?>