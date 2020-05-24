<div id="tabsecciones" class="col s12 col l12 col m12 transp text-blanco" ><!--div que contiene las tabs--> 
    <div class ="row"><!--fila para alinear las tabs-->
      <div class="container ">
        <div class="row">
             <form method="post" autocomplete="off"><!--esto contiene los botones de busqueda-->
                <div class="input-field blanco col l6 alto3">
                    <i class="material-icons prefix">search</i>
                    <input name="txtSearchEstado" id="buscadorE" type="text" class="">
                    <label for="buscadorE" class="ajuste">Buscar por nombre del grado</label>
                </div>
                <div class=" col l2 alto3">
                    <button type="submit" title="Buscar" name="btnSearchEstado" class="waves-effect waves-light red lighten-1 lighten-1 btn"><i class="material-icons">search</i></button>  
                </div>  
            </form>
        <!--div que mostrara datos en una tabla-->
        </div>
        <div class="col l12 col s12 col m6">
            <table class="highlight" id="mi_tabla2">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Grados</th>  
                        <th></th> 
                    </tr>
                </thead> 
                    <tbody><!--cargamos los datos de las materias-->
                    <?php
                    foreach($data1 as $row){ 
                        print("
                        <tr> 
                            <td>$row[id]</td>
                            <td>$row[grado]</td> 
                            ");
                            foreach($permisosdisponibles as $row1){ 
                                if($row1['id_permiso']==3){ 
                                print("<td>
                                <a href='detalle_secciones.php?id=$row[id]' title='Ver mas'class='waves-effect waves-light amber accent-4 btn '><i class='material-icons'>edit</i></a>
                            </td> </tr> ");
                            }
                        }
                    }
                        
                    ?>
                    </tbody>
                </table> 
            </div> 
            
         </div>
        </div>
       </div>    