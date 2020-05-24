<main class="hermoso">
    <div class="container text-blanco">
        <div class="row">
            <div class="col s12">
                <h1 class="center">Códigos de conducta</h1>
            </div>
        </div>
        <div class="row ">
            <div class="">
                <form method="post" autocomplete="off">
                    <div class="input-field blanco col l6 alto3">
                        <i class="material-icons prefix">search</i>
                        <input onpaste="return false" onkeypress="return soloLetras(event)" name="txtBuscador" id="buscador" type="text" class="">
                        <label for="buscador" class="ajuste">Buscar por medio del nombre</label>
                    </div>
                    <div class=" col l2 alto3">
                        <button type="submit" name="btnBuscar" class="waves-effect waves-light red lighten-1 btn"><i class="material-icons">search</i></button>  
                    </div>
                    <?php
                foreach($permisosdisponibles as $row1){ 
                    if($row1['id_permiso']==14){
                    print('<div class=" col l2  alto3">
                    <a href="create.php" class="waves-effect waves-light green btn"><i class="material-icons">add</i></a>  
                </div>');
                    }
                    if($row1['id_permiso']==15){
                        print('<div class=" col l2  alto3">
                        <a href="habilitar.php"class="waves-effect waves-light  btn"><i class="material-icons">visibility</i></a>  
                    </div>');
                    }
                }
                ?>   
                </form>
                <div class="col l12 col s12 col m6">
                    <table class=" highlight" id="mi_tabla">
                        <thead>
                        <tr>
                            <th>Código</th> 
                            <th>Tipo de código</th> 
                           <?php 
                            foreach($permisosdisponibles as $row1){ 
                                    if($row1['id_permiso']==15){
                                        print('<th>Modificar</th>');
                                    }
                                    if($row1['id_permiso']==16){
                                        print('<th>Eliminar</th>
                                        ');
                                    }
                                }
                           ?>
                        </tr>
                        </thead> 
                        <tbody>
                            <?php
                                foreach($data as $row){
                                    print('
                                    <tr>
                                        <td>'.$row['codigo'].'</td>
                                        <td>'.$row['tipo'].'</td>');
                                        foreach($permisosdisponibles as $row1){ 
                                            if($row1['id_permiso']==15){
                                                print(' <td><a  href="update.php?id='.$row['id'].'" class="waves-effect waves-light  amber accent-4  btn">  <i class="material-icons">edit</i></a></td>
                                                ');
                                            }
                                            if($row1['id_permiso']==16){
                                                print(' <td><a  href="delete.php?id='.$row['id'].'" class="waves-effect waves-light red btn"><i class="material-icons">clear</i></a></td>
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
</main>