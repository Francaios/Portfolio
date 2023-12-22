<?php include("header.php"); ?>
<?php include("connection.php"); ?>
<?php

$admin = $_ENV['ADMIN'];

if (isset($_SESSION['user']) && $_SESSION['user'] == $admin) {

    /* Para cargarles en cloudinary
        require 'vendor/autoload.php';
        \Cloudinary::config(array(
            "cloud_name" => "tu_cloud_name",
            "api_key" => "tu_api_key",
            "api_secret" => "tu_api_secret"
        ));
        */
    if ($_POST) {

        $name = $_POST['name'];
        $description = $_POST['description'];
        $link = $_POST['link'];
        $tecnologiasArray = isset($_POST['tecnologias']) ? $_POST['tecnologias'] : array();

        $tecnologias = json_encode($tecnologiasArray);

        $objConnection = new connection();

        $sql = "INSERT INTO `portfolio` (`name`, `description`, `tecnologias`, `repositorio`) VALUES ('$name', '$description', '$tecnologias', '$link');";

        $objConnection->execute($sql);


        /* Subir las imagenes a un directorio local
        $imagen = $_FILES['imagen'];

        // Directorio donde se guardarán las imágenes
        $uploadDir = 'uploads/';

        // Ruta completa del archivo de imagen
        $uploadPath = $uploadDir . basename($imagen['name']);

        // Mover la imagen al directorio de carga
        if (move_uploaded_file($imagen['tmp_name'], $uploadPath)) {
            // Insertar la información en la base de datos
            $objConnection = new connection();
            $sql = "INSERT INTO `portfolio` (`name`, `imagen`, `tecnologias`, `repositorio`) VALUES ('$name', '$uploadPath', '$tecnologias', '$link')";
            $objConnection->execute($sql);
        } else {
            echo "Error al subir la imagen.";
        }
        */

        /* Para subirlas a cloudinary
            $imagen_temporal = $_FILES['imagen']['tmp_name'];
            $resultado = \Cloudinary\Uploader::upload($imagen_temporal);
            $imagen_url = $resultado['secure_url'];

            $tecnologias = json_encode($tecnologiasArray);

            $objConnection = new connection();

            $sql = "INSERT INTO `portfolio` (`name`, `imagen`, `tecnologias`, `repositorio`) VALUES ('$name', '$imagen_url', '$tecnologias', '$link');";

            $objConnection->execute($sql);
        */
    }
}

$objConnection = new connection();
$res = $objConnection->request("SELECT * FROM `portfolio` ")
    ?>

<?php
$tecnologiasIconos = array(
    'javascript' => 'javascript.png',
    'node' => 'node.png',
    'react' => 'react.png',
    'redux' => 'redux.png',
    'css' => 'css.png',
    'php' => 'php.png',
    'sequelize' => 'sequelize.png',
    'typescript' => 'typescript.png',
    'laravel' => 'laravel.png',
    'postgresql' => 'postgresql.png',
    'mysql' => 'mysql.png',
    'html' => 'html.png',
);
$tecnologiasNombres = array(
    'javascript' => 'JavaScript',
    'node' => 'Node.js',
    'react' => 'React',
    'redux' => 'Redux',
    'css' => 'CSS',
    'php' => 'PHP',
    'sequelize' => 'Sequelize',
    'typescript' => 'TypeScript',
    'laravel' => 'Laravel',
    'postgresql' => 'PostgreSQL',
    'mysql' => 'MySQL',
    'html' => 'HTML',
);
?>


<div class="table-responsive">
    <table class="table table-primary">
        <?php echo "<tr>$res</tr>" ?>
        <thead>
            <tr>
                <th scope="col">Nombre</th>
                <th scope="col">Descripción</th>
                <th scope="col">Lenguajes y tecnologias</th>
                <th scope="col">Repositorio</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($res as $row) {
                $tecnologiasArray = json_decode($row['tecnologias'], true); ?>

                <tr class="">
                    <td>
                        <?php echo $row['name'] ?>
                    </td>
                    <td>
                        <?php echo $row['description'] ?>
                    </td>
                    <td>
                        <?php foreach ($tecnologiasArray as $tecnologia => $valor) { ?>
                            <img src="https://res.cloudinary.com/ddev9dsdl/image/upload/v1703262003/icons/<?php echo $tecnologiasIconos[$valor]; ?>"
                                alt="<?php echo $valor; ?>" width="30" height="30">
                            <?php echo $tecnologiasNombres[$valor]; ?>
                            <br />
                        <?php } ?>

                    </td>
                    <td>
                        <?php echo $row['repositorio'] ?>
                    </td>
                </tr>
            <?php }
            ;
            ?>

        </tbody>
    </table>
</div>

<div class="card text-white bg-secondary">
    <div class="card-body">
        <input class="form-check-input" type="checkbox" id="showFormCheckbox" onclick="toggleFormVisibility()" />
        <label class="form-check-label" for="showFormCheckbox">
            <h4 class="card-title">Mostrar Formulario</h4>
        </label>
        <p class="card-text">Solo se pueden subir proyectos si iniciaste sesion con las credenciales de administrador
        </p>
    </div>
</div>

<br />

<div id="projectFormContainer" style="display: none;">
    <div class="card">
        <div class="card-header">Nuevo Proyecto</div>
        <div class="card-body">
            <form action="projects.php" method="post" enctype="multipart/form-data">
                <label for="" class="form-label">Nombre</label>
                <input type="text" class="form-control" name="name" id="" placeholder=""
                    aria-describedby="fileHelpId" />
                <br />
                <label for="" class="form-label">Descripción</label>
                <input type="text" class="form-control" name="description" id="" placeholder=""
                    aria-describedby="fileHelpId" />
                <br />
                <label for="" class="form-label">Link al repositorio</label>
                <input type="text" class="form-control" name="link" id="" placeholder=""
                    aria-describedby="fileHelpId" />
                <br />
                <label for="" class="form-label">Tecnologias y/o herramientas</label>
                <br />
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="checkbox" id="" value="javascript" name="tecnologias[]" />
                    <label class="form-check-label" for="">Javascript</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="checkbox" id="" value="node" name="tecnologias[]" />
                    <label class="form-check-label" for="">Node.js</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="checkbox" id="" value="react" name="tecnologias[]" />
                    <label class="form-check-label" for="">React.js</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="checkbox" id="" value="redux" name="tecnologias[]" />
                    <label class="form-check-label" for="">Redux</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="checkbox" id="" value="css" name="tecnologias[]" />
                    <label class="form-check-label" for="">CSS</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="checkbox" id="" value="php" name="tecnologias[]" />
                    <label class="form-check-label" for="">PHP</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="checkbox" id="" value="sequelize" name="tecnologias[]" />
                    <label class="form-check-label" for="">Sequelize</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="checkbox" id="" value="typescript" name="tecnologias[]" />
                    <label class="form-check-label" for="">Typescript</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="checkbox" id="" value="laravel" name="tecnologias[]" />
                    <label class="form-check-label" for="">Laravel</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="checkbox" id="" value="postgresql" name="tecnologias[]" />
                    <label class="form-check-label" for="">PostgreSQL</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="checkbox" id="" value="mysql" name="tecnologias[]" />
                    <label class="form-check-label" for="">MySQL</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="checkbox" id="" value="html" name="tecnologias[]" />
                    <label class="form-check-label" for="">HTML</label>
                </div>
                <br />

                <button type="submit" class="btn btn-primary btn-sm" value="enviar proyecto">
                    Subir Proyecto
                </button>
            </form>
        </div>
        <div class="d-grid gap-2 d-md-block">
        </div>
        <br />
    </div>
</div>
<script>
    function toggleFormVisibility() {
        var formContainer = document.getElementById('projectFormContainer');
        formContainer.style.display = formContainer.style.display === 'none' ? 'block' : 'none';
    }
</script>

<?php include("footer.php"); ?>