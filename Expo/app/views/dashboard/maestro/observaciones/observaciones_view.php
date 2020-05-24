<main class="hermoso">
    <div class=" text-blanco">
        <div class="row">
            <div class="col s12">
                <h1 class="center">Observaciones</h1>
            </div>
        </div>
        <div class="row ">
            <div class="container">
                <form method="post" autocomplete="off">
                    <div class="input-field blanco col l6 alto3">
                        <i class="material-icons prefix">search</i>
                        <input onpaste="return false" onkeypress="return soloLetras(event)" name="txtBuscador" id="buscador" type="text" class="">
                        <label for="buscador" class="ajuste">Buscar por medio del nombre del estudiante </label>
                    </div>
                    <div class=" col l2 alto3">
                        <button type="submit" name="btnBuscar" class="waves-effect waves-light red lighten-1 btn"><i class="material-icons">search</i></button>  
                    </div>
                    <div class=" col l2  alto3">
                        <a href="create.php?id=<?php echo($_GET['id'])?>" class="waves-effect waves-light green btn"><i class="material-icons">add</i></a>  
                    </div>  
                    <div class=" col l2  alto3">
                        <a href="habilitar.php?id=<?php echo($_GET['id'])?>"class="waves-effect waves-light  btn"><i class="material-icons">visibility</i></a>  
                    </div>  
                </form>
                <div class="col l12 col s12 col m6">
                   <?php 
                        require_once('../../../app/views/dashboard/maestro/observaciones/tabla_observaciones.php');
                   ?>
                </div>
                    
            </div>  
        </div>
    </div>
</main>