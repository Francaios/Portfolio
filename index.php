<!-- index.php en la raíz del proyecto -->
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mi Sitio Web</title>
</head>
<body>
    <h1>Bienvenido a Mi Sitio Web</h1>

    <script>
        // Redirige a la página de la API después de un breve retraso (en milisegundos)
        setTimeout(function() {
            window.location.href = '/api/index.php';
        }, 1); // Cambia el valor a la cantidad de milisegundos que desees
    </script>
</body>
</html>
