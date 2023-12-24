<?php include("header.php"); ?>
<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

// Incluir la clase principal de PHPMailer
require '../vendor/phpmailer/src/PHPMailer.php';

// Incluir la clase de SMTP si la necesitas
require '../vendor/phpmailer/src/SMTP.php';

// Incluir la clase de Exception si la necesitas
require '../vendor/phpmailer/src/Exception.php';

$myEmail = $_ENV['EMAIL'];
$emailPassword = $_ENV['EMAIL_PASSWORD'];

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $name = $_POST["name"];
    $email = $_POST["email"];
    $reason = $_POST["reason"];
    $anotherContact = $_POST["anotherContact"];

    $to = "donnarif@outlook.com";
    $subject = "Nuevo mensaje de contacto";
    $message = "Nombre: $name\nEmail: $email\nEn qué puedo ayudarte: $reason\nMedio de contacto: $anotherContact";

    $mail = new PHPMailer;
    $mail->isSMTP();
    $mail->Host = 'smtp-mail.outlook.com';
    $mail->SMTPAuth = true;
    $mail->Username = $myEmail;
    $mail->Password = $emailPassword;
    $mail->SMTPSecure = 'tls';
    $mail->Port = 587;

    $mail->setFrom($email, $name);
    $mail->addAddress($to);
    $mail->Subject = $subject;
    $mail->Body = $message;

    if ($mail->send()) {
        echo '<script>alert("Gracias por contactarme, te contestaré en cuanto pueda");</script>';
    } else {
        echo '<script>alert("Error al enviar el mensaje, por favor intenta de nuevo más tarde");</script>';
    }
}
?>

<div class="container">
    <br />
    <div class="card">
        <div class="card-header">Contactame</div>
        <div class="card-body">
            <form action="contact.php" method="post" onsubmit="return validateForm()">
                <div class="mb-3">
                    <label for="" class=".text-primary">Nombre</label>
                    <input type="text" class="form-control" name="name" aria-describedby="helpId" placeholder="" />
                </div>
                </br>
                <div class="mb-3">
                    <label for="" class=".text-primary">Email</label>
                    <input type="text" class="form-control" name="email" aria-describedby="helpId" placeholder="" />
                </div>
                </br>
                <div class="mb-3">
                    <label for="" class=".text-primary">En que puedo ayudarte</label>
                    <input type="text" class="form-control" name="reason" aria-describedby="helpId" placeholder="" />
                </div>
                </br>
                <div class="mb-3">
                    <label for="" class=".text-primary">Medio de Contacto</label>
                    <input type="text" class="form-control" name="anotherContact" aria-describedby="helpId"
                        placeholder="Es opcional, déjalo vacío si quieres que me contacte por email" />
                </div>
                <input name="" class="btn btn-success" type="submit" value="Enviar" />
            </form>
        </div>
    </div>
    <div class="card-footer text-muted"></div>
</div>

<script>
    function validateForm() {
        var name = document.getElementsByName('name')[0].value;
        var email = document.getElementsByName('email')[0].value;
        var reason = document.getElementsByName('reason')[0].value;

        if (name.trim() === '' || email.trim() === '' || reason.trim() === '') {
            alert('Por favor, completa todos los campos obligatorios');
            return false;
        }

        // Email validation
        var emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        if (!emailRegex.test(email)) {
            alert('Por favor, ingresa un correo electrónico válido');
            return false;
        }

        return true;
    }

</script>
<?php include("footer.php"); ?>
