 
<main class="bg1">

<!--Fin de seccion de imagen-->
<!--Seccion de modales para interacctuar -->
<div class="container"> <!--Contenedor-->
<div class="row alto1"><!--Fila con un alto especificado en el css-->
    <div class="col s12 m4 l4">
        <!--Boton trigger de modal-->
        <?php
        print("<a href='../account/perfil.php?id=$_SESSION[id1]'>");
         ?>
            <div class="card-panel hoverable small blue">
                <div class="card-panel-header">
                    <span class="card-panel-icon "><i class="material-icons tamanio2">done</i></span>
                    <span class="card-panel-caption">Mi perfil</span>
                </div>
                <p class="card-panel-content">En esta seccion podrás modificar los datos de tu perfil.</p>
            </div>
        </a>
    </div>

    <div class="col s12 m4 l4">
        <a class=" modal-trigger" href="../codigos_maestro/index_alumnos.php">
            <div class="card-panel hoverable small red">
                <div class="card-panel-header">
                    <span class="card-panel-icon"><i class="material-icons tamanio2">work</i></span>
                    <span class="card-panel-caption">Asignar codigo</span>      
                </div>
                <p class="card-panel-content">Asigna un codigo de conducta a un alumno.</p>
            </div>
        </a>
    </div>
    <?php
    print("
    <div class='col s12 m4 l4'>
        <a href='../cursos/cursos.php?id=$_SESSION[id1]'>
                <div class='card-panel hoverable small green'>
                <div class='card-panel-header'>
                    <span class='card-panel-icon'><i class='material-icons tamanio2'>work</i></span>
                    <span class='card-panel-caption'>Mis cursos</span>      
                </div>
                <p class='card-panel-content'>Agregar , modifica o elimina tus cursos .</p>
            </div>
        </a>
    </div>
</div>
</div>  
    ");
    ?>
    
<!--Fin de la division del parallax-->
<div class="container">
<div class="row "> 
    <!--Fin de la division de parallax-->
    <div class="col s12 m4 l4">
        <a href="../observaciones/index_observaciones.php">
            <div class="card-panel hoverable small cyan">
                <div class="card-panel-header">
                    <span class="card-panel-icon"><i class="material-icons tamanio2">edit</i></span>
                    <span class="card-panel-caption">Observaciones</span>      
                </div>
                <p class="card-panel-content">Consulta, modifica, agrega o elimina observaciones a tus alumnos.</p>
            </div>
        </a>
    </div> 
    <div class="col s12 m4 l4">
    <?php
    print("
    <a href='../notas/cursos.php?id=$_SESSION[id1]'>
    "); 
    ?>
        <div class="card-panel hoverable small lime darken-2">
            <div class="card-panel-header">
            <span class="card-panel-icon"><i class="material-icons tamanio2">school</i></span>
            <span class="card-panel-caption">Notas</span>
            </div>
            <p class="card-panel-content">Agrega o modifica las calificaciones de los alumnos que pertenecen a tus cursos.</p>
        </div>
    </a>
    </div> 
    <div class="col s12 m4 l4">
    <a href="#agenda" class="modal-trigger">
        <div class="card-panel hoverable small #e65100 orange darken-4">
            <div class="card-panel-header">
            <span class="card-panel-icon"><i class="material-icons tamanio2">exit_to_app</i></span>
            <span class="card-panel-caption">Perfiles y recordatorios</span>
            </div>
            <p class="card-panel-content">Verifica tus perfiles y los recordatorios de tus cursos.</p>
        </div>
    </a>
    </div> 
</div>
</div> 

<!-- Modal Structure -->
<div id="agenda" class="modal white-text ancho">
<div class="modal-content fondomodal">
  <h4>Avisos y perfiles</h4>
  <p>Agregalos,modificalos o eliminalos</p>
  <div class="row altominimo">
    <div class="col s12 m6 l6">
        <a href="../agenda/cursos.php">
            <div class="card-panel hoverable small lime darken-2">
                <div class="card-panel-header">
                <span class="card-panel-icon"><i class="material-icons medium">edit</i></span>
                <span class="card-panel-caption ">Recordatorios</span>
                </div>
                <p class="card-panel-content ">Agrega recordatorios para que tus alumnos esten enterados de algun cambio dentro del perfil de evaluación</p>
            </div>
        </a>
    </div>
    <div class="col s12 m6 l6">
    <?php 
    print(" 
    <a href='../perfiles/perfiles.php?id=$_SESSION[id1]'>
    ");
        ?>
            <div class="card-panel hoverable small red">
                <div class="card-panel-header">
                <span class="card-panel-icon"><i class="material-icons medium">school</i></span>
                <span class="card-panel-caption ">Perfiles</span>
                </div>
                <p class="card-panel-content ">Verifica las evaluaciones de los cursos que impartes.</p>
            </div>
        </a>
    </div> 
  </div>
</div>
<div class="modal-footer">
  <a href="#!" class="modal-action modal-close waves-effect waves-green btn-flat">Cancelar</a>
</div>
</div> 
</main> 