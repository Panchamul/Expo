<main class="hermoso">
    <div class="container">
        <div class="row">
            <div class="col s12">
                <h1 class="text-blanco center">Actualizar Materias</h1>
            </div>
            <div class="altura"></div><!--agregamos espacios-->
            <div class="altura"></div>
            <div class="altura"></div>
            <div class="altura"></div>
            <form method="post" autocomplete="off"> 
            <div class="input-field blanco col l6 alto3">
                    <i class="material-icons prefix">account_box</i>
                    <input onpaste="return false" onkeypress="return soloLetras(event)" name="materia" id="buscadorE" type="text" class="" value="<?php print($materia->getMateria())?>">
                    <label for="buscadorE" class="ajuste">Nombre de la materia</label>
                </div> 
                <div class="col l12">
                    <p class="center">
                        <button type="submit" name="actualizar" class="waves-effect green btn">Actualizar Materias</a>
                    </p>
                </div>
            </form>
        </div>
    </div>
</main>