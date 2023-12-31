<?php include("header.php"); ?>
<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require __DIR__ . '/../vendor/autoload.php';

$myEmail = $_ENV['EMAIL'];
$emailPassword = $_ENV['EMAIL_PASSWORD'];

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $name = $_POST["name"];
    $contact = $_POST["contact"];
    $reason = $_POST["reason"];
    $anotherContact = $_POST["anotherContact"];

    $to = "donnarif@outlook.com";
    $subject = "Nuevo mensaje de contacto";
    $message = "Nombre: $name\nContacto: $contact\nAsunto: $reason";

    $mail = new PHPMailer;

    try {
        $mail->isSMTP();
        $mail->Host = 'smtp-mail.outlook.com';
        $mail->SMTPAuth = true;
        $mail->Username = $myEmail;
        $mail->Password = $emailPassword;
        $mail->SMTPSecure = 'tls';
        $mail->Port = 587;

        $mail->setFrom($myEmail, $name);
        $mail->addAddress($to);
        $mail->Subject = $subject;
        $mail->Body = $message;

        if ($mail->send()) {
            echo '<script>alert("Gracias por contactarme, te contestaré en cuanto pueda");</script>';
        } else {
            throw new Exception($mail->ErrorInfo);
        }
    } catch (Exception $e) {
        echo '<script>alert("Error al enviar el mensaje: ' . $e->getMessage() . '");</script>';
    }
}
?>


<div class="container">
    <br />
    <div class="card opacity-80">
        <div class="card-header">Me contactare lo antes posible</div>
        <div class="card-body">
            <form action="contact.php" method="post" onsubmit="return validateForm()">
                <div class="mb-3">
                    <label for="" class=".text-primary">Nombre</label>
                    <input type="text" class="form-control" name="name" aria-describedby="helpId" placeholder="" />
                </div>
                </br>
                <div class="mb-3">
                    <label for="" class=".text-primary">Forma de Contacto</label>
                    <input type="text" class="form-control" name="contact" aria-describedby="helpId" placeholder="Podes poner el medio de contacto que prefieras" />
                </div>
                </br>
                <div class="mb-3">
                    <label for="" class=".text-primary">Asunto</label>
                    <input type="text" class="form-control" name="reason" aria-describedby="helpId" placeholder="" />
                </div>
                </br>
                <input name="" class="btn btn-success" type="submit" value="Enviar" />
            </form>
        </div>
    </div>
    <div class="card-footer text-muted"></div>
</div>

<script>
    function validateForm() {
        var name = document.getElementsByName('name')[0].value;
        var email = document.getElementsByName('contact')[0].value;
        var reason = document.getElementsByName('reason')[0].value;

        if (name.trim() === '' || email.trim() === '' || reason.trim() === '') {
            alert('Por favor, completa todos los campos obligatorios');
            return false;
        }

        return true;
    }

</script>
<?php include("footer.php"); ?>
