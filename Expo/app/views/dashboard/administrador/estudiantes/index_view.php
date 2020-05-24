<main class="hermoso">
    <div class="container text-blanco">
        <div class="row">
            <div class="col s12">
                <h1 class="center">Estudiantes</h1>
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
                    if($row1['id_permiso']==7){
                    print('<div class=" col l2  alto3">
                        <a href="habilitar.php"class="waves-effect waves-light  btn"><i class="material-icons">visibility</i></a>  
                    </div>
                    ');
                    }
                }
                ?>
                </form>
                <div class="col l12 col s12 col m6">
                    <table class=" highlight" id="mi_tabla">
                        <thead>
                        <tr>
                            <th>Carnet</th> 
                            <th>Nombre Completo</th> 
                            <th>Grado</th>  
                             <?php 
                       foreach($permisosdisponibles as $row1){ 
                            if($row1['id_permiso']==7){
                                print("<th>Modificar</th>");
                            }
                            if($row1['id_permiso']==8){
                                print("<th>Eliminar</th>");
                            }
                        }
                       ?>
                        <th>Ver detalle</th>
                        </tr>
                        </thead> 
                        <tbody>
                            <?php
                                foreach($data as $row){
                                    print('
                                    <tr>
                                        <td>'.$row['carnet'].'</td>
                                        <td>'.$row['nombre'].' '.$row['apellido'].'</td>
                                        <td>'.$row['grado'].'</td>
                                        <td><a  href="update.php?id='.$row['id'].'" class="waves-effect waves-light  amber accent-4  btn">  <i class="material-icons">edit</i></a></td>
                                        <td><a  href="delete.php?id='.$row['id'].'" class="waves-effect waves-light red btn"><i class="material-icons">clear</i></a></td>
                                        <td><a  href="../familiares/index_familiares.php?id='.$row['id'].'" class="waves-effect waves-light teal btn"><i class="material-icons">check</i></a></td>
                                    </tr>
                                    ');
                                }
                            ?>
                        </tbody>
                            
                    </table> 
                </div>
                    
            </div>  
        </div>
    </div>
</main>