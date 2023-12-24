<?php include("header.php"); ?>

<div class="row align-items-md-stretch">
    <div class="col-md-4">
        <h1 class="text-primary">Bienvenidos a mi Portfolio</h1>
        <h3 class="text-secondary">
            ¡Hola! Soy Francisco Donnari, un apasionado desarrollador con formación técnica en electrónica y actualmente
            estudiando ingeniería informática.
        </h3>
    </div>
    <div class="col-md-4">
        <img src="https://res.cloudinary.com/ddev9dsdl/image/upload/v1703432345/Donnari-Francisco.png"
            class="img-fluid rounded-top" alt="" />
    </div>
    <div class="col-md-4">
        <h2 class="text-secondary">Tengo conocimiento en</h2>
        <?php foreach ($knowledges as $tecnologia => $valor) { ?>
            <div class="d-inline-block mr-3 mb-3">
                <img src="https://res.cloudinary.com/ddev9dsdl/image/upload/v1703262003/icons/<?php echo $tecnologiasIconos[$valor]; ?>"
                    alt="<?php echo $valor; ?>" width="30" height="30" class="img-fluid rounded-top bg-info">
                <span class="bg-info text-white p-2">
                    <?php echo $tecnologiasNombres[$valor]; ?>
                </span>
            </div>
        <?php } ?>
    </div>
</div>

<?php include("footer.php"); ?>