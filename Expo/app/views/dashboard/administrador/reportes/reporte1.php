<main class="hermoso">   
  <div class="row  alto1 ajuste">
    <div class=" col l12 col m12 col s12   text-blanco"><h3 align=center >Reporte de notas</h3></div> 
    <div class="container">
        <form method="post" autocomplete="off">
            <div class="row">
            <div class="input-field blanco col l6 alto5">
                <i class="material-icons prefix">account_box</i>
                <input name="txtcarnet"id="buscadorP" type="text" autocomplete="off" class=""  onpaste="return false" onkeypress="return solonumeros(event)" required>
                <label for="buscadorP" class="ajuste">Ingresar codigo</label>
            </div>
             <!--Combobox para seleccionar periodo-->
            <div class="input-field blanco col s6 ">
            <h6>Selecciona un periodo</h6>
            <select name="Periodos" required>
            <option value="" disabled selected>Selecciona un periodo</option>
            <option value="1">Primer periodo</option>
            <option value="2">Segundo periodo</option> 
            <option value="3">Tercer periodo</option>
            <option value="4">Cuarto periodo</option> 
            </select> 
            </div>
            <div class="col s7 alto3">
            <button class="waves-effect waves-light btn green" name="imprimir" type="submit">Imprimir reporte</button>                
            </div> 
            <div class="col s3 alto3">
                <a href="index1.php"class="waves-effect waves-light btn red">Cancelar</a>                
            </div>
            </div>
        </form>
    </div>
    <div class="alto"></div>
</div>
</main>