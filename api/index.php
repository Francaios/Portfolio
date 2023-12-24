<?php include("header.php"); ?>

<div class="row align-items-md-stretch">
    <div class="col-md-8">
        <h1 class="text-primary">¡Hola! Soy Francisco Donnari</h1>


        <div class="bg-secondary rounded opacity-75">
            <h3 class="text-info">
                Un apasionado desarrollador Fullstack | Back-End con formación de
                técnico
                en electrónica y actualmente
                estudiando ingeniería en informática.

            </h3>
        </div>


        <div class="bg-secondary rounded opacity-75">
            <h3 class="text-info">Busco contribuir al crecimiento de un equipo y aplicar al máximo mis
                conocimientos en el desarrollo de software. Estoy emocionado por conectar y explorar
                oportunidades
                para
                colaborar en proyectos interesantes. ¡No dudes en contactarme para discutir posibles
                colaboraciones
                o
                ideas innovadoras!</h3>
        </div>


    </div>
    <div class="col-md-4">
        <img src="https://res.cloudinary.com/ddev9dsdl/image/upload/v1703432345/Donnari-Francisco.png"
            class="img-fluid rounded" alt="" />
        <h2 class="text-white bg-secondary rounded opacity-75">Tengo conocimiento en</h2>
        <?php foreach ($knowledges as $tecnologia => $valor) { ?>
            <div class="d-inline-block mr-3 mb-3 rounded bg-secondary opacity-80">
                <img src="https://res.cloudinary.com/ddev9dsdl/image/upload/v1703262003/icons/<?php echo $tecnologiasIconos[$valor]; ?>"
                    alt="<?php echo $valor; ?>" width="30" height="30" class="img-fluid rounded bg-white">
                <span class="text-white p-2 rounded opacity-80">
                    <?php echo $tecnologiasNombres[$valor]; ?>
                </span>
            </div>
        <?php } ?>
    </div>
</div>

<?php include("footer.php"); ?>