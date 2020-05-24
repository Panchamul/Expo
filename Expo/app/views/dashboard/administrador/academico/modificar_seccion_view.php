<main class="hermoso">
    <div class="container">
        <div class="row">
            <div class="col s12">
                <h1 class="text-blanco center">Actualizar Secciones</h1>
            </div>
            <div class="altura"></div><!--agregamos espacios-->
            <div class="altura"></div>
            <div class="altura"></div>
            <div class="altura"></div>
            <form method="post" autocomplete="off"> 
            <div class="input-field blanco col l6 m6 alto3">
                    <i class="material-icons prefix">account_box</i>
                    <input onpaste="return false" onkeypress="return soloLetras(event)" disabled name="materia" id="buscadorE" type="text" class="" value="<?php print($seccion->getNombre()." ".$seccion->getApellido())?>">
                     <label for="buscadorE" class="ajuste">Nombre del alumno</label>
            </div> 
            <div class="input-field blanco col l6 m6 alto3 "> 
                <?php
                    Page::showSelect("Seleccione un grado", "grados", $seccion->getUsuario(), $seccion->getGrados()); 
                 ?> 
            </div>
                <div class="col l6 m6"> 
                    <button type="submit" name="actualizar" class="waves-effect green btn">Modificar Secciones</button>
                </div>
                <div class="col l6 m6">
                <?php print("<a href='detalle_secciones.php?id=$_GET[id1]' name='cancelar' class='waves-effect red btn'>Cancelar</a>")?>
                </div>
            </form>
        </div>
    </div>
</main>