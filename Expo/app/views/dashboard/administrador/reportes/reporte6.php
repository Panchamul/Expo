<main class="hermoso">   
  <div class="row  alto1  ajuste">
    <div class=" col l12 col m12 col s12  text-blanco"><h3 align=center >Lista de alumnos</h3></div>  
      <div class="container "> 
    <div class="col l6 m6 s6">
        <form method="post" action="../../../app/views/dashboard/administrador/reportespdf/reporte_alumnos.php" target="_blank" autocomplete="off">   
            <div class="row alto1">   
            <button class="waves-effect waves-light btn green" name="imprimir" type="submit">Imprimir todos los alumnos</button>                 
               </div>
        </form>
        
    </div> 
        <form method="post" action="../../../app/views/dashboard/administrador/reportespdf/reporte_alumnos2.php" target="_blank" autocomplete="off">  
           
        <div class="input-field blanco col s6 ">
            <?php
            page::showSelect("Selecciona un grado","Grados",$codigo->getGrado(),$codigo->getGrados());  
            ?>
            </div> 
            <div class="row alto1">   
            <button class="waves-effect waves-light btn green" name="imprimir" type="submit">Imprimir alumnos por grado</button>                
               </div>
        </form>
    </div>
</div>

    <div class="alto1"></div>
</main>