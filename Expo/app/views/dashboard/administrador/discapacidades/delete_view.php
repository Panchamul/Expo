<main class="hermoso">
    <div class="container">
        <div class="row">
            <div class="col s12">
                <h1 class="text-blanco center">Eliminar discapacidad</h1>
            </div>
            <div class="altura"></div>
            <div class="altura"></div>
            <form method="post" autocomplete="off">
                <div class="col l12">
                    <h3 class="center text-blanco">Enserio deseas eliminar la discapacidad</h3>
                    <h3 class="center text-blanco">"<?php echo($discapacidades->getDiscapacidad())?>"</h3>
                </div>
                <div class="col l12">
                    <p class="center">
                        <button type="submit" name="btnEliminar" class="waves-effect green btn">Si</button>
                        <a href="index1.php" class="waves-effect red btn">No</a>
                    </p>
                </div>
            </form>
        </div>
    </div>
</main>