<div id="taboferta" class="col s12 col l12 col m12 transp text-blanco" ><!--div que contiene las tabs--> 
    <div class ="row"><!--fila para alinear las tabs-->
      <div class="container ">
        <div class="row">
             <form method="post" autocomplete="off"><!--esto contiene los botones de busqueda-->
                <div class="input-field blanco col l6 alto3">
                    <i class="material-icons prefix">search</i>
                    <input onpaste="return false" onkeypress="return soloLetras(event)" name="busqueda3" id="buscadorE3" type="text" class="">
                    <label for="buscadorE3" class="ajuste">Buscar por grado</label>
                </div>
                <div class=" col l2 alto3">
                    <button type="submit" title="Buscar" name="buscar3" class="waves-effect waves-light red lighten-1 lighten-1 btn"><i class="material-icons">search</i></button>  
                </div>
                <div class=" col l2  alto3">
                <?php
                foreach($permisosdisponibles as $row1){ 
                    if($row1['id_permiso']==3){
                    print('
                    <a href="create_oferta.php" title="Agregar" class="waves-effect waves-light green btn"><i class="material-icons">add</i></a>  
                    '); 
                    }
                }
                ?>
                 </div>  
                <div class=" col l2  alto3">
                <?php
                foreach($permisosdisponibles as $row1){ 
                    if($row1['id_permiso']==2){
                    print('
                    <a href="habilitar_ofertas.php" title="Habilitar"class="waves-effect waves-light  btn"><i class="material-icons">visibility</i></a>  
                    '); 
                    }
                }
                ?>
                       </div>  
            </form>
        <!--div que mostrara datos en una tabla-->
        </div>
        <div class="col l12 col s12 col m6">
            <table class="highlight" id="mi_tabla1">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Matrícula</th>  
                        <th>Mensualidad</th>  
                        <th>Grado</th> 
                        <th>Descripción</th>  
                         
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
                    foreach($data2 as $row){ 
                        print("
                        <tr> 
                            <td>$row[id_oferta]</td>
                            <td>$$row[matricula]</td>
                            <td>$$row[mensualidad]</td>
                            <td>$row[grado]</td>
                            <td>$row[descripcion]</td>
                            "); 
                            foreach($permisosdisponibles as $row1){ 
                                if($row1['id_permiso']==2){
                                print("
                                <td>
                            <a href='update_ofertas.php?id=$row[id_oferta]' title='Modificar'class='waves-effect waves-light amber accent-4 btn '><i class='material-icons'>edit</i></a>
                             </td>  "); 
                                }
                                if($row1['id_permiso']==4){
                                    print("
                                    <td>
                             <a href='delete_ofertas.php?id=$row[id_oferta]' title='Eliminar'class='waves-effect waves-light red btn'><i class='material-icons'>clear</i></a>
                             </td>  "); 
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
    </div>   