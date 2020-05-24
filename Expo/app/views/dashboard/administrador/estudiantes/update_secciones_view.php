<main class="hermoso">
    <div class="container">
        <div class="row">
            <div class="col s12">
                <h1 class="text-blanco center">Asignar grado al que pertenece el alumno</h1>
            </div>
            <div class="altura"></div>
            <div class="altura"></div>
            <div class="altura"></div>
            <div class="altura"></div>
            <form method="post" autocomplete="off">
                <div class="col l12">
                    <?php
                        Page::showSelect("Grado", "grado", $estudiantes->getIdGrado(), $estudiantes->getGrados());
                    ?>
                </div>
                <div class="col l12 s12">
                    <p class="center">
                        <button type="submit" name="btnGuardar" class="waves-effect green btn">Agregar</button>
                    </p>
                </div>
            </form>
        </div>
    </div>
</main>