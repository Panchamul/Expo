<div id="tabdiscapacidades" class="col s12 col l12 col m12  transp text-blanco" >
            <div class="row ">
                <div class="container">
                    <form method="post" autocomplete="off">
                        <div class="input-field blanco col l6 alto3">
                            <i class="material-icons prefix">search</i>
                            <input onpaste="return false" onkeypress="return soloLetras(event)" name="buscadorDiscapacidad" id="buscador" type="text" class="">
                            <label for="buscador" class="ajuste">Buscar</label>
                        </div>
                        <div class=" col l2 alto3">
                            <button type="submit" name="buscarDiscapacidad" class="waves-effect waves-light red lighten-1 btn"><i class="material-icons">search</i></button>  
                        </div>
                        <?php 
                foreach($permisosdisponibles as $row1){ 
                        if($row1['id_permiso']==3){
                            print('<div class=" col l2  alto3">
                            <a href="create.php" class="waves-effect waves-light green btn"><i class="material-icons">add</i></a>  
                        </div>  ');
                        }
                        if($row1['id_permiso']==2){
                            print(' <div class=" col l2  alto3">
                            <a href="habilitar.php"class="waves-effect waves-light  btn"><i class="material-icons">visibility</i></a>  
                        </div> ');
                        }
                    }
                    ?>   
                    </form>
                    <div class="col l12 col s12 col m6">
                        <table class="highlight" id="mi_tabla">
                            <thead>
                            <tr>
                                <th>Discapacidad</th> 
                                <?php
                                foreach($permisosdisponibles as $row1){ 
                                        if($row1['id_permiso']==2){
                                            print('<th></th>
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
                                foreach($data as $row){
                                    print('
                                    <tr>
                                    <td>'.$row['discapacidad'].'</td>
                                    ');
                                    foreach($permisosdisponibles as $row1){ 
                                        if($row1['id_permiso']==2){
                                            print(' <td><a  href="update.php?id='.$row['id'].'" class="waves-effect waves-light  amber accent-4  btn">  <i class="material-icons">edit</i></a></td>
                                            ');
                                        }
                                        if($row1['id_permiso']==4){
                                            print(' <td><a href="delete.php?id='.$row['id'].'" class="waves-effect waves-light red btn"><i class="material-icons">clear</i></a></td>
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
    