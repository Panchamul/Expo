<main class="hermoso">   
  <div class="row  alto1  ajuste">
    <div class=" col l12 col m12 col s12 alto  text-blanco"><h3 align=center >Cursos disponibles en los grados </h3></div>  
      <div class="container alto">
    <div class="col l5 m5 s5">
        <form method="post" action="../../../app/views/dashboard/administrador/reportespdf/reporte4.php" target="_blank" autocomplete="off">  
            <div class="row">
            <div class="input-field blanco col s6 ">
            <?php
            page::showSelect("Selecciona un grado","grados",$curso->getGrado(),$curso->getGrados());  
            ?>
            </div>  
            <button class="waves-effect waves-light btn green" name="imprimir" type="submit">Imprimir reporte</button>                
               </div>
        </form>
    </div>  
    </div>
</div>

    <div class="alto1"></div>
</main>