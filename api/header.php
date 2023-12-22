<?php

session_start();

?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <style>
        body {
            background-image: url('background.jpg');
            background-size: cover;
            background-repeat: no-repeat;
        }
    </style>
</head>

<body>
    <br />
    <div class="container text-center">
        <div class="row justify-content-between">
            <a class="col-3 btn btn-primary" href="index.php">Inicio</a>
            <a class="col-3 btn btn-info" href="projects.php">Proyectos</a>
            <a class="col-3 btn btn-secondary" href="contact.php">Contactame</a>
            <?php
            if (isset($_SESSION['user'])) {
                echo '<a class="col-2 btn btn-danger" href="logOut.php">Cerrar Sesión</a>';
            } else {
                echo '<a class="col-2 btn btn-primary" href="logIn.php">Iniciar Sesión</a>';
            }

            ?>

        </div>
        </br>