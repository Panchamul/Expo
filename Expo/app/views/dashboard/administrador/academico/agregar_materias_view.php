<main class="hermoso">
    <div class="container"> 
            <div class="col s12">
                <h1 class="text-blanco center">Agregar Materias</h1>
            </div>
            <div class="altura"></div><!--agregamos espacios-->
            <div class="altura"></div> 
            <form method="post" autocomplete="off"> 
            <div class="input-field blanco col l6 ">
                    <i class="material-icons prefix">account_box</i>
                    <input onpaste="return false" onkeypress="return soloLetras(event)" name="materia" id="buscadorE" type="text" class="" value="<?php print($materia->getMateria())?>">
                    <label for="buscadorE" class="ajuste">Nombre de la materia</label>
                </div>  
                <div class="row">
                <div class="col l5 offset-l1"> 
                        <button type="submit" name="agregar" title="Agregar"class="waves-effect green btn">Agregar Materias</a>
                 </div>
                 <div class="col l4 offset-l1"> 
                       <a href="academico.php"type="submit" name="cancelar" title="Cancelar"class="waves-effect red btn">Cancelar</a> 
                 </div>
                 </div> 
            </form>  
    </div>
</main>