<?php

session_start();

require_once __DIR__ . '/vendor/autoload.php';

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->load();

$adminUsername = $_ENV['ADMIN_USERNAME'];
$adminPassword = $_ENV['ADMIN_PASSWORD'];
$admin = $_ENV['ADMIN'];
$visitor = $_ENV['VISITOR'];

if ($_POST) {
    if (($_POST['username'] == $adminUsername) && ($_POST['password'] == $adminPassword)) {

        $_SESSION['user'] = $admin;

    } else {
        $_SESSION['user'] = $visitor;
    }
    header('location:index.php');
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
    <link rel="stylesheet" href="styles.css">
</head>

<body>
    <div class="container">
        <br />
        <div class="card">

            <div class="card-header">Iniciar Sesion</div>
            <div class="card-body">
                <form action="logIn.php" method="post">

                    <div class="mb-3">
                        <label for="" class=".text-primary">Usuario</label>
                        <input type="text" class="form-control" name="username" id="" aria-describedby="helpId"
                            placeholder="" />
                    </div>
                    <div class="mb-3">
                        <label for="" class=".text-primary">Contraseña</label>
                        <input type="password" class="form-control" name="password" id="" aria-describedby="helpId"
                            placeholder="" />
                        <br />
                        <input name="" id="" class="btn btn-success" type="submit" value="Ingresar" />
                    </div>


                </form>
            </div>
            <div class="card-footer text-muted"></div>
        </div>


    </div>


</body>

</html>