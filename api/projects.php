<?php include("header.php"); ?>

<?php
$admin = $_ENV["ADMIN_USERNAME"];
$adminPassword = $_ENV["ADMIN_PASSWORD"];
$projectsFile = "../projects.json"; // Nombre del archivo JSON

class Project {
    public $name;
    public $description;
    public $tecnologies = [];
    public $link;

    public function __construct($name, $description, $tecnologies, $link) {
        $this->name = $name;
        $this->description = $description;
        $this->tecnologies = $tecnologies;
        $this->link = $link;
    }
}

$projects = array(
    array(
        "name" => "Proyecto Individual Dogs",
        "description" => "Para el bootcamp de desarrollador Full Stack de Henry cree una Single Page Application sobre razas de perros que permitia: visualizar las razas traidas desde una Api, realizar busquedas, filtros y ordenamientos y ademas un formulario controlado que permitia crear una raza de perro nueva para añadir a la pagina.",
        "tecnologies" => [
            "javascript",
            "node",
            "react",
            "redux",
            "html",
            "css",
            "sequelize",
            "postgresql"
        ],
        "link" => "https://github.com/Francaios/Dogs"
    ),
    array(
        "name" => "Proyecto Grupal Videogame Store",
        "description" => "Para dar por completado el bootcamp de Henry realizamos una ultima tarea en grupo que constaba de realizar el diseño y desarrollo de una App Ecommerce de videojuegos que incluye: búsqueda de videojuegos (por nombre, con filtrado y ordenamiento), comprar y regalar videojuegos, agregar juegos a favoritos y chatear con amigos.",
        "tecnologies" => [
            "javascript",
            "node",
            "react",
            "redux",
            "html",
            "css",
            "sequelize",
            "postgresql"
        ],
        "link" => "https://github.com/Francaios/pf-videogames"
    ),
    array(
        "name" => "Portfolio",
        "description" => "Empece a aprender PHP y me parecio una buena forma de practicar hacer mi portfolio con PHP, cuenta con una pagina de inicio donde me presento, una pagina con mis proyectos y por ultimo una pagina donde pueden contactarse conmigo por medio de correo electronico.",
        "tecnologies" => [
            "php",
            "javascript",
            "html",
            "css"
        ],
        "link" => "https://github.com/Francaios/Portfolio"
    )
);

if ((isset($_POST['password']) && $_POST['password'] == $adminPassword) && isset($_POST['admin']) && $_POST['admin'] == $admin) {
    if ($_POST) {
        $name = $_POST['name'];
        $description = $_POST['description'];
        $link = $_POST['link'];
        $tecnologiesArray = isset($_POST['tecnologias']) ? $_POST['tecnologias'] : array();
        $newProject = new Project($name, $description, $tecnologiesArray, $link);
        $projects[] = $newProject;

        // Guardar proyectos en el archivo JSON
        file_put_contents($projectsFile, json_encode($projects));
    }
}
?>

<div class="table-responsive">
    <table class="table table-primary opacity-80">
        <thead>
            <tr>
                <th scope="col">Nombre</th>
                <th scope="col">Descripción</th>
                <th scope="col">Lenguajes y tecnologias</th>
                <th scope="col">Repositorio</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($projects as $row) {?>

                <tr class="">
                    <td>
                        <?php echo $row['name']; ?>
                    </td>
                    <td>
                        <?php echo $row['description']; ?>
                    </td>
                    <td>
                        <?php foreach ($row['tecnologies'] as $tecnologia => $valor) { ?>
                            <img src="https://res.cloudinary.com/ddev9dsdl/image/upload/v1703262003/icons/<?php echo $tecnologiasIconos[$valor]; ?>"
                                alt="<?php echo $valor; ?>" width="30" height="30">
                            <?php echo $tecnologiasNombres[$valor]; ?>
                            <br />
                        <?php } ?>

                    </td>
                    <td>
                        <a href="<?php echo $row['link']; ?>" target="_blank"><?php echo $row['link']; ?></a>
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
                <label for="" class="form-label">Nombre de administrador</label>
                <input type="text" class="form-control" name="admin" id="" placeholder=""
                    aria-describedby="fileHelpId" />
                <br />
                <label for="" class="form-label">Contraseña de administrador</label>
                <input type="password" class="form-control" name="password" id="" placeholder=""
                    aria-describedby="fileHelpId" />
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