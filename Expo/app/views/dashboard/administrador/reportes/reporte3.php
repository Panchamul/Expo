<main class="hermoso">   
  <div class="row  alto1  ajuste">
    <div class=" col l12 col m12 col s12 alto  text-blanco"><h3 align=center >Reporte de conducta </h3></div> 
    <div class=" col l5 col m5 col s5  text-blanco"><h5 align=center >Grado especifico</h5></div> 
    <div class=" col l6 col m6 col s6   text-blanco"><h5   >Grado especifico por intervalo de fechas</h5></div> 
      <div class="container alto">
    <div class="col l5 m5 s5">
        <form method="post" action="../../../app/views/dashboard/administrador/reportespdf/reporte3.php" target="_blank" autocomplete="off">  
            <div class="row">
            <div class="input-field blanco col s6 ">
            <?php
            page::showSelect("Selecciona un grado","grados",$codigo->getGrado(),$codigo->getGrados());  
            ?>
            </div>  
            <button class="waves-effect waves-light btn green" name="imprimir" type="submit">Imprimir reporte</button>                
               </div>
        </form>
    </div>
    <div class="col l6 m6 s6">
        <form method="post" autocomplete="off">  
            <div class="row">
            <div class="input-field blanco col s6">
            <!--Input con de tipo text con placeholder de telefono-->
            <i class="material-icons prefix">people</i>
            <input name="fecha" id="10" type="text" class="datepicker1"  value="" required>
            <label for="10" class="ajuste">Fecha de inicio</label> 
            </div> 
            <div class="input-field blanco col s6">
            <!--Input con de tipo text con placeholder de telefono-->
            <i class="material-icons prefix">people</i>
            <input name="fecha1" id="11" type="text" class="datepicker1"  value="" required>
            <label for="11" class="ajuste">Fecha final</label> 
            </div> 
            <div class="input-field blanco col s6 ">
            <?php
            page::showSelect("Selecciona un grado","grados1",$codigo->getGrado(),$codigo->getGrados());  
            ?>
            </div> 
            <div class="col s7 alto3">
            <button class="waves-effect waves-light btn green" name="imprimir1" type="submit">Imprimir reporte</button>                
            </div> 
            <div class="col s3 alto3">
                <a href="index1.php"class="waves-effect waves-light btn red">Cancelar</a>                
            </div>
            </div>
        </form>
    </div>
    </div>
</div>

    <div class="alto1"></div>
</main>