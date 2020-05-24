<main class="bg1"> 
<!--Formularios de datos-->

<div class="container">
    <div class="row">
        <div class="col s12">
            <h1 class="  text-blanco" align=center>Agregar Cursos</h1>
        </div>
    </div>
</div>   
<form method="post" enctype="multipart/form-data" autocomplete="off">
<div class="container">
    <!--Fila de input-->
    <div class="row"> 
        <!--Combobox para seleccionar GENERO-->
        <div class="input-field blanco col l6 ">  
                <?php 
                    Page::showSelect("Seleccione un grado", "grados", $curso->getGrado(), $curso->getGrados()); 
                 ?> 
        </div>   
        <div class="input-field blanco col l6 "> 
            <?php
                Page::showSelect("Seleccione una materia", "materias", $curso->getMateria(), $curso->getMaterias1());
             ?> 
        </div>    
        <div class="row">
        <div class="col s7 alto3">
            <button class="waves-effect waves-light btn green" name="agregar" type="submit">Agregar Curso</button>                
        </div> 
        <div class="col s3 alto3">
        <?php 
        print("
        <a href='cursos.php?id=$_SESSION[id1]'class='waves-effect waves-light btn red'>Cancelar</a>
        ");
        ?>                 
        </div>
        </div>
    </div>
    </div>
    </form> 
<!--Fin del formulario--> 
</main> 