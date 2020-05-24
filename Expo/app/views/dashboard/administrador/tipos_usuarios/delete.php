<main class="hermoso "> 
        <div class="container">
        <div class="col s12">
                                <h1 class="text-blanco center">Eliminar Tipo de usuario</h1>
                            </div>
                            <div class="altura"></div> 
                            <form method="post">
                                <div class="col l12">
                                    <h3 class="center text-blanco">¿Enserio deseas eliminar el tipo de usuario </h3>
                                    <h3 class="center text-blanco">"<?php print($tipo->getTipo())?>" ?</h3>
                                </div>
                                <div class="col l12">
                                    <p class="center">
                                        <button type="submit" title="Aceptar" name="eliminar" class="waves-effect green btn">Si</button>
                                        <a title="cancelar" href="../tipos_usuarios/indextipos.php" class="waves-effect red btn">No</a>
                                    </p>
                                </div>
                                <div class="altura"></div>
                            </form>
                        </div>
                    </div>

        </div>
</main> 