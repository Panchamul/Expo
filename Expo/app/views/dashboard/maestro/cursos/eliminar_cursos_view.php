
<main class="hermoso">
    <div class="container">
        <div class="row">
            <div class="col s12">
                <h1 class="text-blanco center">Eliminar Curso</h1>
            </div>
            <div class="altura"></div>
            <div class="altura"></div>
            <form method="post" autocomplete="off">
                <div class="col l12">
                    <h3 class="center text-blanco">Estas seguro que deseas eliminar el curso de </h3>
                    <h3 class="center text-blanco">"<?php echo($curso->getMateria().'   de   '.$curso->getGrado())?>" ?</h3>
                </div>
                <div class="col l12">
                    <p class="center">
                        <button type="submit" name="Eliminar" class="waves-effect green btn">Si</button>
                        <?php print("
                        <a href='cursos.php?id=$_SESSION[id1]' class='waves-effect red btn'>No</a>
                        ") ;?>
                    </p>
                </div>
            </form>
        </div>
    </div>
</main>