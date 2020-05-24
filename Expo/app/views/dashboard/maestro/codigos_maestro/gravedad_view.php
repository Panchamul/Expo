<main class="hermoso">
    <div class="">
        <div class="row">
            <div class="col s12 m12 l12">
                <h1 class="text-blanco center">
                    Asignar codigo 
                </h1>
                <div class="altura"></div>
            </div>
            <div class="col s12 m6 offset-l1 l3">
                <img class="materialboxed anchoBox text-center" src="../../../web/img/estudiantes/<?php echo($codigos->getFoto())?>"><!--../../web/img/alumnos/<?php// echo($codigos->getImagen())?>-->
                
            </div>
            <div class="col s12 m6 l8">
                <h4 class="text-blanco">
                    <p>Nombre: <?php echo($codigos->getNombre()." ".$codigos->getApellido())?></p>
                    <p>Carnet: <?php echo($codigos->getCarnet())?></p>
                </h4>
                <form  method="GET" action="asignar.php" autocomplete="off">
                <div class="col s6 text-blanco">
                    <?php
                    Page::showSelect("Tipo de codigo", "tipo", $codigos->getCodigo(), $codigos->getTipoCodigos());
                    ?>
                    <input type="hidden" name="idAlumno" value="<?php echo($_GET['id'])?>">
                </div>
            </div>
            <div class="col s12">
                
                    <p class="center">
                        <button type="submit" class="waves-effect waves-light   btn">Siguiente paso</button>
                    </p>
                
            </div>
            </form>
        </div>
    </div>
</main>