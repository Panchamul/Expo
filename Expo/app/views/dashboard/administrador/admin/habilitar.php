<main class="hermoso">
    <div class="container text-blanco">
        <div class="row">
            <div class="col s12">
                <h1 class="center">Administradores</h1>
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
                </form>
                <div class="col l12 col s12 col m6">
                    <table class=" highlight" id="mi_tabla">
                        <thead>
                        <tr>
                            <th>#</th> 
                            <th>Usuario</th> 
                            <th>Nombre</th> 
                            <th>Genero</th> 
                            <th>Tipo</th> 
                            <th></th>
                            <th></th>
                        </tr>
                        </thead> 
                        <tbody>
                            <?php
                                foreach($data as $row){
                                    print("
                                    <tr>
                                        <td>$row[id]</td>
                                        <td>$row[usuario]</td>
                                        <td>$row[nombre] $row[apellido]</td>
                                        <td>$row[genero]</td>
                                        <td>$row[tipo]</td>
                                        <td><img src='../../../web/img/usuarios/$row[foto]' class='materialboxed' width='130' height='130'></td>");
                                        foreach($permisosdisponibles as $row1){ 
                                            if($row1['id_permiso']==25){
                                                print(' <td><a  href="habilitar1.php?id='.$row['id'].'" title="habilitar"class="waves-effect waves-light  amber accent-4  btn">  <i class="material-icons">edit</i></a></td>
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