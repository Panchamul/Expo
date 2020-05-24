<main class="bg1"> 
<!--Formularios de datos--> 
<div class="container">
    <div class="row">
        <div class="col s12">
            <h1 class="  text-blanco" align=center>Actualizar Perfiles</h1>
        </div>
    </div>
</div>   
<form method="post" enctype="multipart/form-data" autocomplete="off">
<div class="container">
    <!--Fila de input-->
    <div class="row"> 
    <div class="input-field blanco col s6">
            <!--Input con de tipo text con placeholder de Nombre-->
            <i class="material-icons prefix">account_box</i>
            <input onpaste="return false" onkeypress="return soloLetras(event)"name="nombre" id="1" type="text" class="validate" value="<?php print($perfiles->getPerfil()) ?>" required>
            <label for="1" class="ajuste">Descripcion del perfil</label> 
        </div>
        <!--Combobox para seleccionar GENERO-->
        <div class="input-field blanco col l6 ">  
                <?php 
                    Page::showSelect("Seleccione un grado", "tipos", $perfiles->getTipo(), $perfiles->getTipos()); 
                 ?> 
        </div>   
        <div class="input-field blanco col l6 "> 
        <h6>Selecciona el codigo del curso</h6>
            <?php 
                Page::showSelect("Seleccione una materia", "cursos", $perfiles->getCurso(), $perfiles->getCursos());
             ?> 
        </div>    
        <div class="input-field blanco col s6 ">
        <h6>Selecciona el mes en que se realizara el perfil</h6>
    <select name="meses" required>
      <option value="" disabled selected>Selecciona un mes</option>
      <option value="1">Enero</option>
      <option value="2">Febrero</option>
      <option value="3">Marzo</option>
      <option value="4">Abril</option>
      <option value="5">Mayo</option>
      <option value="6">Junio</option>
      <option value="7">Julio</option>
      <option value="8">Agosto</option>
      <option value="9">Septiembre</option>
      <option value="10">Octubre</option>
    </select> 
     </div>

        <div class="row">
        <div class="col s7 alto3">
            <button class="waves-effect waves-light btn green" name="actualizar" type="submit">Actualizar Perfil</button>                
        </div> 
        <div class="col s3 alto3">
        <?php 
        print("
        <a href='perfiles.php?id=$_SESSION[id1]'class='waves-effect waves-light btn red'>Cancelar</a>
        ");
        ?>                 
        </div>
        </div>
    </div>
    </div>
    </form> 
<!--Fin del formulario--> 
</main> 