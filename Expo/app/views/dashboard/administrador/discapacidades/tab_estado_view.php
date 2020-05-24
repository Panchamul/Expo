<div id="tabestadofamiliar" class="col s12 col l12 col m12  transp text-blanco" >
            <div class="row ">
                <div class="container">
                    <form method="post" autocomplete="off">
                        <div class="input-field blanco col l6 alto3">
                            <i class="material-icons prefix">search</i>
                            <input onpaste="return false" onkeypress="return soloLetras(event)" name="txtSearchEstado" id="buscadorE" type="text" class="">
                            <label for="buscadorE" class="ajuste">Buscar</label>
                        </div>
                        <div class=" col l2 alto3">
                            <button type="submit" name="btnSearchEstado" class="waves-effect waves-light red lighten-1 btn"><i class="material-icons">search</i></button>  
                        </div>
                        <?php 
                foreach($permisosdisponibles as $row1){ 
                        if($row1['id_permiso']==3){
                            print('<div class=" col l2  alto3">
                            <a href="create_estado.php" class="waves-effect waves-light green btn"><i class="material-icons">add</i></a>  
                        </div> ');
                        }
                        if($row1['id_permiso']==2){
                            print('  <div class=" col l2  alto3">
                            <a href="habilitar_estado.php"class="waves-effect waves-light  btn"><i class="material-icons">visibility</i></a>  
                        </div>  ');
                        }
                    }
                    ?> 
                    </form>
                    <div class="col l12 col s12 col m6">
                        <table class="highlight" id="mi_tabla4">
                            <thead>
                            <tr>
                                <th>Estado familiar</th> 
                                 <?php 
                                  foreach($permisosdisponibles as $row1){ 
                                        if($row1['id_permiso']==2){
                                            print(' <th></th>
                                            ');
                                        }
                                        if($row1['id_permiso']==4){
                                            print(' <th></th>
                                            ');
                                        }
                                    } 
                                 ?>
                            </tr>
                            </thead> 
                            <tbody>
                            <?php
                                foreach($dataE as $row){
                                    print('
                                    <tr>
                                    <td>'.$row['estado_familiar'].'</td>
                                    ');
                                    foreach($permisosdisponibles as $row1){ 
                                        if($row1['id_permiso']==2){
                                            print(' <td><a  href="update_estado.php?id='.$row['id'].'" class="waves-effect waves-light  amber accent-4  btn">  <i class="material-icons">edit</i></a></td>
                                            ');
                                        }
                                        if($row1['id_permiso']==4){
                                            print('   <td><a href="delete_estado.php?id='.$row['id'].'" class="waves-effect waves-light red btn"><i class="material-icons">clear</i></a></td>
                                            ');
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
</main>