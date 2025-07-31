<?php
// Revisa si la solicitud es de tipo POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Recopila los datos del formulario
    $nombre = htmlspecialchars(trim($_POST["nombre"]));
    $telefono = htmlspecialchars(trim($_POST["telefono"]));
    $fecha = htmlspecialchars(trim($_POST["fecha"]));
    $hora = htmlspecialchars(trim($_POST["hora"]));
    $comentarios = htmlspecialchars(trim($_POST["comentarios"]));

    // Configura el correo electrónico de destino
    $destinatario = "cuarzocristalempresarial@gmail.com";
    $asunto = "Nueva reserva de cita";
    $mensaje = "
        <html>
        <head>
            <title>Nueva reserva</title>
        </head>
        <body>
            <p><strong>Nombre:</strong> $nombre</p>
            <p><strong>Teléfono:</strong> $telefono</p>
            <p><strong>Fecha:</strong> $fecha</p>
            <p><strong>Hora:</strong> $hora</p>
            <p><strong>Comentarios:</strong> $comentarios</p>
        </body>
        </html>
    ";

    // Configura las cabeceras del correo para que sea HTML
    $cabeceras = "MIME-Version: 1.0" . "\r\n";
    $cabeceras .= "Content-type:text/html;charset=UTF-8" . "\r\n";
    $cabeceras .= 'From: <tu_correo_de_envio@ejemplo.com>' . "\r\n"; // Cambia esto por un correo real

    // Envía el correo
    if(mail($destinatario, $asunto, $mensaje, $cabeceras)) {
        echo "¡Gracias! Tu mensaje ha sido enviado correctamente.";
    } else {
        echo "Lo sentimos, hubo un error al enviar tu mensaje.";
    }

} else {
    echo "Método de solicitud no válido.";
}
?>