<main class="hermoso">   
  <div class="row  alto1  ajuste">
    <div class=" col l12 col m12 col s12  text-blanco"><h3 align=center >Promedios de los grados</h3></div>  
      <div class="container ">  
    <div class="col l12 m12 s12">
        <form method="post" action="../../../app/views/dashboard/administrador/reportespdf/reporte10.php" target="_blank" autocomplete="off">  
          <div class="input-field blanco col s7  ">
            <h6>Selecciona un periodo</h6>
            <select name="Periodos" required>
            <option value="" disabled selected>Selecciona un periodo</option>
            <option value="1">Primer periodo</option>
            <option value="2">Segundo periodo</option> 
            <option value="3">Tercer periodo</option>
            <option value="4">Cuarto periodo</option> 
            </select> 
        </div>  
        <div class="col s9">
            <button class="waves-effect waves-light btn green" name="imprimir" type="submit">Imprimir todos los promedios</button>                
        </div>
        </form>
    </div> 
    </div>
</div>

    <div class="alto1"></div>
</main>