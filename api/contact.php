<?php include("header.php"); ?>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $name = $_POST["name"];
    $email = $_POST["email"];
    $reason = $_POST["reason"];
    $anotherContact = $_POST["anotherContact"];

    $to = "donnarif@outlook.com";
    $subject = "Nuevo mensaje de contacto";
    $message = "Nombre: $name\nEmail: $email\nEn qué puedo ayudarte: $reason\nMedio de contacto: $anotherContact";
    mail($to, $subject, $message);
    echo '<script>alert("Gracias por contactarme te contestare en cuanto pueda");</script>';
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
                    <input type="text" class="form-control" name="name" id="" aria-describedby="helpId"
                        placeholder="" />
                </div>
                </br>
                <div class="mb-3">
                    <label for="" class=".text-primary">Email</label>
                    <input type="text" class="form-control" name="email" id="" aria-describedby="helpId"
                        placeholder="" />
                </div>
                </br>
                <div class="mb-3">
                    <label for="" class=".text-primary">En que puedo ayudarte</label>
                    <input type="text" class="form-control" name="reason" id="" aria-describedby="helpId"
                        placeholder="" />
                </div>
                </br>
                <div class="mb-3">
                    <label for="" class=".text-primary">Medio de Contacto</label>
                    <input type="text" class="form-control" name="anotherContact" id="" aria-describedby="helpId"
                        placeholder="Es opcional, dejalo vacio si quieres que me contacte por email" />
                </div>

                <input name="" id="" class="btn btn-success" type="submit" value="Enviar" />
        </div>


        </form>
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