<?php

if (empty($_POST["nombre"])) {
    exit("No has introducido el nombre");
}

if (empty($_POST["correo"])) {
    exit("No has introducido el correo");
}

if (empty($_POST["mensaje"])) {
    exit("No has introducido el mensaje");
}

$nombre = $_POST["nombre"];
$correo = $_POST["correo"];
$mensaje = $_POST["mensaje"];

$correo = filter_var($correo, FILTER_VALIDATE_EMAIL);
if (!$correo) {
    echo "Correo inválido. Inténtalo con otro correo.";
    exit;
}

$asunto = "ArturoCode (Form)";

$datos = "De: $nombre\nCorreo: $correo\nMensaje: $mensaje";
$mensaje = "Has recibido un mensaje desde el formulario de contacto de tu sitio web. Aquí están los detalles:\n$datos";
$destinatario = "arturocodedev@gmail.com";
$encabezados = "Sender: arturocodedev@gmail.com\r\n";
$encabezados .= "From: $nombre <" . $correo . ">\r\n";
$encabezados .= "Reply-To: $nombre <$correo>\r\n";
$resultado = mail($destinatario, $asunto, $mensaje, $encabezados);
if ($resultado) {
    echo "<h1>Mensaje enviado. ¡Gracias por contactarme!</h1>";
    echo "<p>Tu mensaje se ha enviado correctamente.</p>
    <h2>Importante</h2>
    <p>Revisa tu bandeja de SPAM, en ocasiones mis respuestas quedan ahí. </p>";
} else {
    echo "Tu mensaje no se ha enviado. Inténtalo de nuevo.";
}
