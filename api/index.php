<?php include("header.php"); ?>
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
$knowledges = array(
    "javascript",
    "typescript",
    "node",
    "react",
    "redux",
    "html",
    "css",
    "sequelize",
    "postgresql",
    "php",
    "mysql",
);
?>
<div class="row align-items-md-stretch">
    <div class="col-md-4">
        <h1 class="text-primary">Bienvenidos a mi Portfolio</h1>
        <h3 class="text-secondary">
            ¡Hola! Soy Francisco Donnari, un apasionado desarrollador con formación técnica en electrónica y actualmente estudiando ingeniería informática.
        </h3>
    </div>
    <div class="col-md-4">
    <img
            src="https://res.cloudinary.com/ddev9dsdl/image/upload/v1703432345/Donnari-Francisco.png"
            class="img-fluid rounded-top bg-info"
            alt=""
        />        
    </div>
    <div class="col-md-4">
    <h2 class="text-secondary">Tengo conocimiento en</h2>
    <?php foreach ($knowledges as $tecnologia => $valor) { ?>
        <div class="d-inline-block mr-3 mb-3">
                            <img src="https://res.cloudinary.com/ddev9dsdl/image/upload/v1703262003/icons/<?php echo $tecnologiasIconos[$valor]; ?>"
                                alt="<?php echo $valor; ?>" width="30" height="30"  class="img-fluid rounded-top bg-info">
                            <?php echo $tecnologiasNombres[$valor]; ?>
                        <?php } ?>
    </div>
    </div>
</div>

<?php include("footer.php"); ?>