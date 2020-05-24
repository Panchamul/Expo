<main class="hermoso text-blanco">
    <div class="container">
        <div class="row">
            <div class="col s12 m12 l12">
                <h1 class="center text-blanco">
                    Municipios
                </h1>
            </div>
        </div>
    </div>
    <div class="row ">
        <div class="container">
            <form method="post" autocomplete="off">
                <div class="input-field blanco col l6 alto3">
                    <i class="material-icons prefix">search</i>
                    <input onpaste="return false" onkeypress="return soloLetras(event)" name="txtMunicipio" id="buscadorFr" type="text" class="">
                    <label for="buscadorFr" class="ajuste">Buscar</label>
                </div>
                <div class=" col l2 alto3">
                    <button type="submit" name="btnBuscar" class="waves-effect waves-light red lighten-1 btn"><i class="material-icons">search</i></button>  
                </div>
                <?php 
                foreach($permisosdisponibles as $row1){ 
                        if($row1['id_permiso']==3){
                            print("<div class='col l2  alto3'>
                            <a href='create_municipio.php?idDep=$numero' class='waves-effect waves-light green btn'><i class='material-icons'>add</i></a>  
                        </div> ");
                        }
                        if($row1['id_permiso']==2){
                            print("  <div class='col l2  alto3'>
                            <a href='habilitar_municipio.php?idDep=$numero'class='waves-effect waves-light  btn'><i class='material-icons'>visibility</i></a>  
                        </div> ");
                        }
                    }
                    ?>
                
               
            </form>
            <div class="col l12 col s12 col m6">
                <table class="highlight" id="mi_tabla4">
                    <thead>
                    <tr>
                        <th>Municipio</th> 
                        <th>Departamento</th> 
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
                        foreach($data as $row){
                            print('
                            <tr>
                            <td>'.$row['municipio'].'</td>
                            <td>'.$row['departamento'].'</td>
                            ');
                            foreach($permisosdisponibles as $row1){ 
                                if($row1['id_permiso']==2){
                                    print(' <td><a  href="update_municipio.php?id='.$row['id'].'&&idDep='.$row['idDep'].'" class="waves-effect waves-light  amber accent-4  btn">  <i class="material-icons">edit</i></a></td>
                                    ');
                                }
                                if($row1['id_permiso']==4){
                                    print(' <td><a href="delete_municipios.php?id='.$row['id'].'" class="waves-effect waves-light red btn"><i class="material-icons">clear</i></a></td>
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
</main>