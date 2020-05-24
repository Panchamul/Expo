<main class="bg1" > 
<div class="container "> 
<div class="row alto1"> 
<div class="col s12 m6 l4">
<?php print("<a href='../agenda/cursos.php?id=$_SESSION[id2]'>");?>
    <div class="card-panel hoverable small blue">
      <div class="card-panel-header">
        <span class="card-panel-icon "><i class="material-icons medium">book</i></span>
        <span class="card-panel-caption ">Agenda</span>
      </div>
      <p class="card-panel-content tamanio2">En esta seccion podrás ver los recordatorios a cerca de actividades que tus maestros han agregado en tu agenda.</p>
    </div>
  </a>
</div>
<div class="col s12 m6 l4">
<?php
print("<a href='../codigos/index_codigos.php?id=$_SESSION[id2]'>
"); 
  ?>
    <div class="card-panel hoverable small green">
      <div class="card-panel-header">
          <span class="card-panel-icon"><i class="material-icons medium">contact_mail</i></span>
          <span class="card-panel-caption ">Conducta</span>      
      </div>
      <p class="card-panel-content tamanio2">En esta seccion puedes consultar tu registro de codigos y observaciones que se te han asignado en el presente año.</p>
    </div>
  </a>
</div> 
<?php 
print("
<div class='col s12 m6 l4'>
<a href='perfil.php?id=$_SESSION[id2]'>
  <div class='card-panel hoverable small indigo'>
        <div class='card-panel-header'>
            <span class='card-panel-icon'><i class='material-icons medium'>account_circle</i></span>
            <span class='card-panel-caption '>Mi Perfil</span>      
        </div>
        <p class='card-panel-content tamanio2'>Consulta y edita tus datos personales </p>
    </div>
    </a>
</div> 
"); 
?> 
<a class="modal-trigger" href="#modal3">
<div class="col s12 m6 l4"> 
      <div class="card-panel hoverable small lime darken-2">
        <div class="card-panel-header">
          <span class="card-panel-icon"><i class="material-icons medium">school</i></span>
          <span class="card-panel-caption ">Notas</span>
        </div>
        <p class="card-panel-content tamanio2">Verifica el registro de calificaciones que has obtenido en el presente año.</p>
      </div>
</div> 
 </a>
<div class="col s12 m6 l4">
    <a href="logout.php">
      <div class="card-panel hoverable small red">
        <div class="card-panel-header">
            <span class="card-panel-icon"><i class="material-icons medium">exit_to_app</i></span>
            <span class="card-panel-caption ">Cerrar sesión</span>      
        </div>
        <p class="card-panel-content tamanio2">Consulta informacion disponible de los cursos a los que perteneces.</p>
      </div>
    </a>
</div>
</div> 
</div> 
<div class="alto1"> </div> 
   <!-- Modal Structure -->
   <div id="modal3" class="modal white-text col l10 m8 s12">
    <div class="modal-content fondomodalpeque">
      <h4>Selecciona un periodo</h4> 
      <div class="row altominimo"> 
        <div class="col s12 m12 l12"> 
           <!--Combobox para seleccionar GENERO-->
           <form method="post" autocomplete="off">
        <div class="input-field blanco col s12 ">
          <h6>Selecciona un periodo</h6>
          <select name="periodos" required>
          <option value="" disabled selected>Selecciona un periodo</option>
          <option value="Primer periodo">Primer periodo</option>
          <option value="Segundo periodo">Segundo periodo</option> 
          <option value="Tercer periodo">Tercer periodo</option>
          <option value="Cuarto periodo">Cuarto periodo</option> 
          </select> 
        </div> 
        <div class="col s3 alto4">
            <button name="seleccionar"type="submit" class="waves-effect waves-light btn red">Seleccionar</a>                
        </div>
        </form>
        </div> 
      </div>
    </div> 
  </div>
</main> 