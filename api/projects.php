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

$projects = array();

// Cargar proyectos desde el archivo JSON si existe
if (file_exists($projectsFile)) {
    $projectsData = file_get_contents($projectsFile);
    $projects = json_decode($projectsData, true);
}

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
                        <?php echo $row->name ?>
                    </td>
                    <td>
                        <?php echo $row->description ?>
                    </td>
                    <td>
                        <?php foreach ($row->tecnologies as $tecnologia => $valor) { ?>
                            <img src="https://res.cloudinary.com/ddev9dsdl/image/upload/v1703262003/icons/<?php echo $tecnologiasIconos[$valor]; ?>"
                                alt="<?php echo $valor; ?>" width="30" height="30">
                            <?php echo $tecnologiasNombres[$valor]; ?>
                            <br />
                        <?php } ?>

                    </td>
                    <td>
                        <a href="<?php echo $row->link ?>" target="_blank"><?php echo $row->link ?></a>
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