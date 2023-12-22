<?php include("header.php")?>
<?php
session_start();
$adminUsername = $_ENV['ADMIN_USERNAME'];
$adminPassword = $_ENV['ADMIN_PASSWORD'];
$admin = $_ENV['ADMIN'];
$visitor = $_ENV['VISITOR'];

if ($_POST) {
    if (($_POST['username'] == $adminUsername) && ($_POST['password'] == $adminPassword)) {
        $_SESSION['username'] = $_POST['username'];
        $_SESSION['user'] = $admin;

    } else {
        $_SESSION['username'] = $_POST['username'];
        $_SESSION['user'] = $visitor;
    }
    header('Location: https://donnarifrancisco.vercel.app/api/index.php');
}
?>

<!doctype html>
<html lang="en">

<head>
    <title>Login</title>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />

    <!-- Bootstrap CSS v5.2.1 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous" />
</head>

<body>
    <div class="container">
        <br />
        <div class="card">

            <div class="card-header">Iniciar Sesion</div>
            <div class="card-body">
                <form action="logIn.php" method="post" onsubmit="return validateForm()">

                    <div class="mb-3">
                        <label for="" class=".text-primary">Usuario</label>
                        <input type="text" class="form-control" name="username" id="" aria-describedby="helpId"
                            placeholder="" />
                    </div>
                    <div class="mb-3">
                        <input class="form-check-input" type="checkbox" id="showFormCheckbox"
                            onclick="toggleFormVisibility()" />
                        <label class="form-check-label" for="showFormCheckbox">
                            <h4 class="card-title">Confirmar credenciales</h4>
                        </label>
                        <p class="card-text">Solo necesario para subir proyectos</p>
                    </div>
                    <div class="mb-3" id="passwordField" style="display:none;">
                        <label for="" class=".text-primary">Contraseña</label>
                        <input type="password" class="form-control" name="password" id="" aria-describedby="helpId"
                            placeholder="" />
                        <br />

                    </div>
                    <input name="" id="" class="btn btn-success" type="submit" value="Ingresar" />

                </form>
            </div>
            <div class="card-footer text-muted"></div>
        </div>


    </div>

    <script>
        function validateForm() {
            var username = document.getElementsByName('username')[0].value;

            if (username.trim() === '') {
                alert('Por favor, ingresa tu nombre de usuario o vuelve a Inicio o Proyectos');

                return false;
            }

            return true;
        }

        function toggleFormVisibility() {
            var passwordField = document.getElementById('passwordField');
            passwordField.style.display = (passwordField.style.display == 'none' || passwordField.style.display == '') ? 'block' : 'none';
        }
    </script>
</body>

</html>