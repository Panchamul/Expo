<main class="hermoso">
    <div class="container">
        <div class="row">
            <div class="col s12">
                <h1 class="text-blanco center">Secciones</h1>
            </div> 
             <form method="post" autocomplete="off"><!--esto contiene los botones de busqueda-->
                <div class="input-field blanco col l6 alto3">
                    <i class="material-icons prefix">search</i>
                    <input onpaste="return false" onkeypress="return soloLetras(event)" name="busqueda" id="buscadorE4" type="text" class="">
                    <label for="buscadorE4" class="ajuste">Buscar por nombre</label>
                </div>
                <div class=" col l2 alto3">
                    <button type="submit" title="Buscar" name="buscar" class="waves-effect waves-light red lighten-1 lighten-1 btn"><i class="material-icons">search</i></button>  
                </div> 
            </form>
        <!--div que mostrara datos en una tabla-->
        </div>
        <div class="col l12 col s12 col m6 text-blanco">
            <table class="highlight" id="mi_tabla4">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Nombre</th> 
                        <th>Apellido</th> 
                        <th>Grado</th>       
                          <?php
                          foreach($permisosdisponibles as $row1){ 
                                if($row1['id_permiso']==2){
                                print("  
                                <th></th>  "); 
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
                            <td>$row[nombre]</td> 
                            <td>$row[apellido]</td>
                            <td>$row[grado]</td> 
                            ");
                            foreach($permisosdisponibles as $row1){ 
                                if($row1['id_permiso']==2){ 
                                print(" <td>
                                <a href='update_secciones.php?id=$row[id]&&id1=$_GET[id]' title='Modificar'class='waves-effect waves-light amber accent-4 btn '><i class='material-icons'>edit</i></a>
                                 </td></tr> ");
                            }
                        }
                         
                    }
                    ?>
                    </tbody>
                </table> 
            </div> 
            <div class="altura"></div>
            <div class="col l4"> 
                    <a href="academico.php#tabsecciones"type="submit" name="cancelar" title="Cancelar"class="waves-effect red btn">Cancelar</a> 
             </div> 
         </div>
        </div>
       </div>   
    </div>   
    </div>
    <div class="altura"></div>
    </main>