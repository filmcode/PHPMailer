<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/Exception.php';
require 'PHPMailer/PHPMailer.php';
require 'PHPMailer/SMTP.php';

// DATOS DEL FORMULARIO
$name = $_POST['name'];
$email = $_POST['mail'];
$phone = $_POST['phone'];
$marca = $_POST['marca'];
$modelo = $_POST['modelo'];
$km = $_POST['km'];
$ano = $_POST['ano'];
$mensaje = $_POST['mensaje'];
$subject = "Nueva Reservacion";

$body = "Este mensaje fue enviado por: " . $name ."\nE-mail: " . $email . "\nTelefono: " . $phone .  "\nmarca: " . $marca . "\nModelo: " . $modelo."\nKm Recorridos: " . $km."\nMensaje: " .$mensaje;
//  IMAGE
$files = $_FILES['files'];

//Create an instance; passing `true` enables exceptions
$mail = new PHPMailer(true);

try {
    //Server settings
    $mail->SMTPDebug =  0;                      //Enable verbose debug output
    $mail->isSMTP();                                            //Send using SMTP
    $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
    $mail->Username   = 'correo@gmail.com';                     //SMTP username
    $mail->Password   = 'clave';                               //SMTP password
    $mail->SMTPSecure = 'tls';            //Enable implicit TLS encryption
    $mail->Port       = 587;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

    //Recipients
    $mail->setFrom('mismo_SMTPAuth_correo@gmail.com', 'Nombre');
    $mail->addAddress('gjaimes@galletamkt.com');  //donde se envia el correo

    //Attachments
    # code...
    if (isset($_FILES['files'])) {
        $files_tmp = $_FILES['files']['tmp_name'];
        $files_name = $_FILES['files']['name'];
        $files_error = $_FILES['files']['error'];
        if ($files_tmp[0]) {
            if ($files_error) {
                foreach ($files_tmp as $key => $file_tmp) {
                    $mail->addAttachment($file_tmp, $files_name[$key]);  //Add attachments
                }
            } 
        }
    }

    //Content
    $mail->isHTML(false);                                  //Set email format to HTML
    $mail->Subject = $subject;
    $mail->Body    = $body;

    $mail->send();
    echo'<script type="text/javascript">
    alert("Formulario enviado correctamente, Gracias por tu solicitud, tu reservación será confirmada vía telefónica.");
    //window.location.href="index.php";
    </script>';
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}