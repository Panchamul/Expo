<main class="bg1" > 

<div class="container "> 

<div class="row alto1"> 
<?php
foreach($permisosdisponibles as $row){ 
    $valor=$row['id_permiso'];  
    switch($valor){
         case 1:
         print(" 
         <a class='  modal-trigger' href='#modal1' >
         <div class='col s12 m6 l4'>
         <div class='card-panel hoverable small blue'>
     
             <div class='card-panel-header'>
     
             <span class='card-panel-icon '><i class='material-icons medium'>edit</i></span>
     
             <span class='card-panel-caption '>Configuraciones Generales</span>
     
             </div>
     
             <p class='card-panel-content tamanio2'>Configura el sistema.</p>
     
         </div>
     </div>
       </a> 
         ");
         break;
         case 5:
         print("
         <a class='modal-trigger' href='#modal2'> 
         <div class='col s12 m6 l4'>
    <div class='card-panel hoverable small red'>

        <div class='card-panel-header'>

            <span class='card-panel-icon'><i class='material-icons medium'>person</i></span>

            <span class='card-panel-caption '>Alumnos</span>      

        </div>

        <p class='card-panel-content tamanio2'>Mantenimiento alumnos.</p>
        </div>
    </div> 

</a>
         ");
         break;
         case 9: 
        print('<a class="modal-trigger" href="#modal3">
 
        <div class="col s12 m6 l4">
        <div class="card-panel hoverable small green">
    
            <div class="card-panel-header">
    
                <span class="card-panel-icon"><i class="material-icons medium">person</i></span>
    
                <span class="card-panel-caption ">Maestros</span>      
    
            </div>
    
            <p class="card-panel-content tamanio2">Mantenimiento alumnos.</p>
    
        </div>
        </div>
     
    
    </a> ');
         break;
         case 13:
         print('
         
<a class="modal-trigger" href="../codigos/index_codigos.php"> 
<div class="col s12 m6 l4">
<div class="card-panel hoverable small purple lighten-2">

    <div class="card-panel-header">

        <span class="card-panel-icon"><i class="material-icons medium">person_outline</i></span>

        <span class="card-panel-caption ">Códigos</span>      

    </div>

    <p class="card-panel-content tamanio2">Modifica,Agrega y elimina los códigos que puedes asignar.</p>

</div>
</div>


</a>
         ');
         break;
         case 17: case 23:
         if(!isset($valormenu2)){ 
         print('
         <a class="modal-trigger" href="#modal55">  
         <div class="col s12 m6 l4">
             <div class="card-panel hoverable small lime darken-1">
     
                 <div class="card-panel-header">
     
                     <span class="card-panel-icon"><i class="material-icons medium">person_outline</i></span>
     
                     <span class="card-panel-caption ">Usuarios </span>      
     
                 </div>
     
                 <p class="card-panel-content tamanio2">Crea usuarios y asignale permisos.</p>
     
             </div>
      </div>
     
     </a> 
         ');
         $valormenu2=1;
         }
         break;
         case 21: case 22:
         if(!isset($valormenu)){ 
         print('
         
<a class="modal-trigger" href="#modal4"> 
<div class="col s12 m6 l4"> 
    <div class="card-panel hoverable small orange">

        <div class="card-panel-header">

            <span class="card-panel-icon"><i class="material-icons medium">timeline</i></span>

            <span class="card-panel-caption ">Estadísticas </span>      

        </div>

        <p class="card-panel-content tamanio2">Visualiza reportes o gráficos estadísticos.</p>

    </div> 
</div>
</a>
         ');
         $valormenu=1;
         }
         break; 
    }
}
 ?>

</div>  
</div>
 

<div class="alto1"> </div>  

 <!-- Modal Structure -->

  <div id="modal1" class="modal white-text col l10 m8 s12">

    <div class="modal-content fondomodal">

      <h4>Configuraciones Generales </h4> 

      <div class="row altominimo">

        <div class="col s6 m6 l6">

            <a href="../lugares/menu.php" >

                <div class="card-panel hoverable small lime darken-2">

                    <div class="card-panel-header">

                    <span class="card-panel-icon"><i class="material-icons medium">place</i></span>

                    <span class="card-panel-caption ">Lugares</span>

                    </div>

                    <p class="card-panel-content ">configura la información acerca de los lugares.</p>

                </div>

            </a>

        </div>

        <div class="col s6 m6 l6">

         <a href="../tipos/index1.php" >

            <div class="card-panel hoverable small red">

                <div class="card-panel-header">

                <span class="card-panel-icon"><i class="material-icons medium">settings</i></span>

                <span class="card-panel-caption ">Tipos</span>

                </div>

                <p class="card-panel-content ">Configura los tipos de categorías.</p>

            </div>

        </a>

        </div>

        <div class="col s6 m6 l6">

            <a href="../academico/academico.php">

            <div class="card-panel hoverable small orange">

                <div class="card-panel-header">

                <span class="card-panel-icon"><i class="material-icons medium">edit</i></span>

                <span class="card-panel-caption ">Académico</span>

                </div>

                <p class="card-panel-content ">Configura la información relacionada a lo académico.</p>

            </div>

            </a>

        </div>

        <div class="col s6 m6 l6"> 

            <a href="../discapacidades/index1.php">

                <div class="card-panel hoverable small blue">

                    <div class="card-panel-header">

                    <span class="card-panel-icon"><i class="material-icons medium">person</i></span>

                    <span class="card-panel-caption ">Personas</span>

                    </div>

                    <p class="card-panel-content ">Configura la información acerca de las personas.</p>

                </div>

            </a>

        </div> 

      </div>

    </div>

    <div class="modal-footer">

      <a href="#!" class="modal-action modal-close waves-effect waves-green btn-flat">Cancelar</a>

    </div>

  </div>

  <!---->

   <!-- Modal Structure -->

   <div id="modal3" class="modal white-text col l10 m8 s12">

    <div class="modal-content fondomodal">

      <h4>Maestros</h4> 
      <p>Agrega,modifica, visualiza y elimina maestros</p>
      <div class="row altominimo">
      <?php 
      foreach($permisosdisponibles as $row){ 
    $valor=$row['id_permiso']; 
    if($valor==10){
        print('<div class="col s6 m6 l6">

        <a href="../maestro/agregar_maestro.php" >

            <div class="card-panel hoverable small lime darken-2">

                <div class="card-panel-header">

                <span class="card-panel-icon"><i class="material-icons medium">group_add</i></span>

                <span class="card-panel-caption ">Agrega Maestros</span>

                </div>

                <p class="card-panel-content ">Agrega nuevos maestros.</p>

            </div>

        </a>

    </div>');
    }
}
?>
        

        <div class="col s6 m6 l6">

         <a href="../maestro/ver_maestro.php" >

            <div class="card-panel hoverable small red">

                <div class="card-panel-header">

                <span class="card-panel-icon"><i class="material-icons medium">edit</i></span>

                <span class="card-panel-caption ">Editar/Eliminar maestros</span>

                </div>

                <p class="card-panel-content ">Aquí puedes Editar o eliminar la información de los maestros.</p>

            </div>

        </a>

        </div> 

      </div>

    </div>

    <div class="modal-footer">

      <a href="#!" class="modal-action modal-close waves-effect waves-green btn-flat">Cancelar</a>

    </div>

  </div>

    <!---->

    <div id="modal2" class="modal white-text col l10 m8 s12">

    <div class="modal-content fondomodal">

      <h4>Alumnos</h4>

      <p>Agrega,modifica, visualiza y elimina alumnos</p>

      <div class="row altominimo">
      <?php 
      foreach($permisosdisponibles as $row){ 
    $valor=$row['id_permiso']; 
    if($valor==6){
        print('<div class="col s6 m6 l6">

        <a href="../estudiantes/create.php" >

            <div class="card-panel hoverable small lime darken-2">

                <div class="card-panel-header">

                <span class="card-panel-icon"><i class="material-icons medium">group_add</i></span>

                <span class="card-panel-caption ">Agrega Alumnos</span>

                </div>

                <p class="card-panel-content ">Agrega nuevos alumnos.</p>

            </div>

        </a>

    </div>');
    }
    }
    ?> 

        <div class="col s6 m6 l6">

         <a href="../estudiantes/index_estudiantes.php" >

            <div class="card-panel hoverable small red">

                <div class="card-panel-header">

                <span class="card-panel-icon"><i class="material-icons medium">edit</i></span>

                <span class="card-panel-caption ">Ver/Editar/Eliminar Alumnos</span>

                </div>

                <p class="card-panel-content ">Visualiza y modificar los alumnos.</p>

            </div>

        </a>

        </div> 

      </div>

    </div>

    <div class="modal-footer">

      <a href="#!" class="modal-action modal-close waves-effect waves-green btn-flat">Cancelar</a>

    </div>

  </div> 

  <div id="modal55" class="modal white-text col l10 m8 s12">

    <div class="modal-content fondomodal">

      <h4>Usuarios</h4> 

      <div class="row altominimo"> 
        <?php 
      foreach($permisosdisponibles as $row){ 
    $valor=$row['id_permiso']; 
    if($valor==17){
        print('
        <div class="col s6 m6 l6">

        <a href="../tipos_usuarios/indextipos.php" >

           <div class="card-panel hoverable small red">

               <div class="card-panel-header">

               <span class="card-panel-icon"><i class="material-icons medium">edit</i></span>

               <span class="card-panel-caption ">Tipos de usuario</span>

               </div>

               <p class="card-panel-content ">Agregar, modificar o elimina los tipos de usuarios y sus permisos.</p>

           </div>

       </a>

       </div> ');

    }
    if($valor==23){
        print('<div class="col s6 m6 l6">

        <a href="../admin/admin_index.php" >

            <div class="card-panel hoverable small lime darken-2">

                <div class="card-panel-header">

                <span class="card-panel-icon"><i class="material-icons medium">group_add</i></span>

                <span class="card-panel-caption ">Usuarios</span>

                </div>

                <p class="card-panel-content ">Agrega, modificar o elimina usuarios para administrar el sistema.</p>

            </div>

        </a>

    </div>');
    }
}
?>
       

      </div>

    </div>

    <div class="modal-footer">

      <a href="#!" class="modal-action modal-close waves-effect waves-green btn-flat">Cancelar</a>

    </div>

  </div>
    <!-- Modal Structure -->
    <div id="modal4" class="modal white-text col l10 m8 s12">
    <div class="modal-content fondomodal">
      <h4>Estadísticas del sistema</h4> 
      <div class="row altominimo">
      <?php 
      foreach($permisosdisponibles as $row){ 
    $valor=$row['id_permiso'];  
    if($valor==21){
        print('<div class="col s6 m6 l6">
        <a href="../estadisticas/index1.php" >
            <div class="card-panel hoverable small lime darken-2">
                <div class="card-panel-header">
                <span class="card-panel-icon"><i class="material-icons medium">equalizer</i></span>
                <span class="card-panel-caption ">Gráficos</span>
                </div>
                <p class="card-panel-content ">Muestra la información del sistema en gráficos estadísticos.</p>
            </div>
        </a>
    </div>');
        }
    if($valor==22){
        print(' 
        <div class="col s6 m6 l6">
         <a href="../reportes/index1.php" >
            <div class="card-panel hoverable small red">
                <div class="card-panel-header">
                <span class="card-panel-icon"><i class="material-icons medium">note</i></span>
                <span class="card-panel-caption ">Reportes estadísticos</span>
                </div>
                <p class="card-panel-content ">Visualiza la información del sistema en reportes estadísticos.</p>
            </div>
        </a>
        </div> ');
    }
}
    ?>
       
      </div>
    </div>
    <div class="modal-footer">
      <a href="#!" class="modal-action modal-close waves-effect waves-green btn-flat">Cancelar</a>
    </div>
  </div>

</main> 