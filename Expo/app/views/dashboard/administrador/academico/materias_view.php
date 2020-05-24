<div id="tabmaterias" class="col s12 col l12 col m12 transp text-blanco" ><!--div que contiene las tabs--> 
    <div class ="row"><!--fila para alinear las tabs-->
      <div class="container">
        <div class="row">
             <form method="post" autocomplete="off"><!--esto contiene los botones de busqueda-->
                <div class="input-field blanco col l6 alto3">
                    <i class="material-icons prefix">search</i>
                    <input onpaste="return false" onkeypress="return soloLetras(event)" name="busqueda" id="buscadorE1" type="text" class="">
                    <label for="buscadorE1" class="ajuste">Buscar por nombre de la materia</label>
                </div>
                <div class=" col l2 alto3">
                    <button type="submit" title="Buscar" name="buscar" class="waves-effect waves-light red lighten-1 lighten-1 btn"><i class="material-icons">search</i></button>  
                </div>
                <?php
                foreach($permisosdisponibles as $row1){ 
                    if($row1['id_permiso']==3){
                    print('
                    <div class=" col l2  alto3">
                    <a href="create_materias.php" title="Agregar" class="waves-effect waves-light green btn"><i class="material-icons">add</i></a>  
                </div>  '); 
                    }
                    if($row1['id_permiso']==2){
                        print('<div class=" col l2  alto3">
                        <a href="habilitar_materias.php" title="Habilitar"class="waves-effect waves-light  btn"><i class="material-icons">visibility</i></a>  
                    </div>');
                    }
                }
                ?> 
            </form>
        <!--div que mostrara datos en una tabla-->
        </div>
        <div class="col l12 col s12 col m6">
            <table class="highlight" id="mi_tabla">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Materias</th>  
                         <?php
                          foreach($permisosdisponibles as $row1){ 
                                if($row1['id_permiso']==2){
                                print("  
                                <th></th>  "); 
                                }
                                if($row1['id_permiso']==4){
                                    print(" 
                          <th></th> "); 
                                    }
                            }
                          ?>
                    </tr>
                </thead> 
                    <tbody><!--cargamos los datos de las materias-->
                    <?php
                    foreach($data as $row){ 
                        print("
                        <tr> 
                            <td>$row[id]</td>
                            <td>$row[materia]</td>
                            ");
                            foreach($permisosdisponibles as $row1){ 
                                if($row1['id_permiso']==2){ 
                                print("<td>
                                <a href='update_materias.php?id=$row[id]' title='Modificar'class='waves-effect waves-light amber accent-4 btn '><i class='material-icons'>edit</i></a>
                                 </td>");
                            }
                            if($row1['id_permiso']==4){
                                print("<td>
                                <a href='delete_materias.php?id=$row[id]' title='Eliminar'class='waves-effect waves-light red btn'><i class='material-icons'>clear</i></a>
                                </td>");
                            }
                        }
                    }   
                    ?>
                       </tr> 
                    </tbody>
                </table> 
            </div> 
         </div>
        </div> 
    </div>    