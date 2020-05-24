<main class="bg1"> 
<div class="container">
    <div class="row">
        <div class="col s12">
            <h1 class="  text-blanco" align=center>Mis cursos</h1>
        </div>
    </div>
</div>   
    <div class ="row text-blanco"><!--fila para alinear las tabs-->
      <div class="container ">
        <div class="row">
             <form method="post" autocomplete="off"><!--esto contiene los botones de busqueda-->
                <div class="input-field blanco col l6 alto3">
                    <i class="material-icons prefix">search</i>
                    <input onpaste="return false" onkeypress="return soloLetras(event)"name="txtSearchEstado" id="buscadorE3" type="text" class="">
                    <label for="buscadorE3" class="ajuste">Buscar por materia</label>
                </div>
                <div class=" col l2 alto3">
                    <button type="submit" title="Buscar" name="btnSearchEstado" class="waves-effect waves-light red lighten-1 lighten-1 btn"><i class="material-icons">search</i></button>  
                </div>   
            </form>
        <!--div que mostrara datos en una tabla-->
        </div>
        <div class="col l12 col s12 col m6 ">
            <table class="highlight" id="mi_tabla3">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Grado</th>      
                        <th>Materia</th> 
                        <th></th>
                    </tr>
                </thead> 
                    <tbody><!--cargamos los datos de las materias-->
                    <?php
                    foreach($data as $row){ 
                        print("
                        <tr> 
                            <td>$row[id]</td>
                            <td>$row[grado]</td>
                            <td>$row[materia]</td>  
                            <td>
                            <a href='perfiles.php?id=$row[id]' title='Ver perfiles'class='waves-effect waves-light amber accent-4 btn '><i class='material-icons'>edit</i></a>
                             </td> 
                        </tr>
                        ");
                    }
                    ?>
                    </tbody>
                </table> 
            </div> 
         </div>
        </div>
       </div>    
</main>