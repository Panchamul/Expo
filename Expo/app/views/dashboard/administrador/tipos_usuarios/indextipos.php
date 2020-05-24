<main class="hermoso ">
        <div class="container">
                <div class="col s12">
                    <h1 align=center class="text-blanco" >Tipos de usuarios</h1>
                </div> 
            <div class="row">
            <form method='post' autocomplete=off enctype='multipart/form-data'>
                      <div class="input-field blanco col l6 ">
                    <i class="material-icons prefix">account_box</i>
                    <input onpaste="return false" onkeypress="return soloLetras(event)" name="busqueda" id="buscadorE" type="text" class="" value="">
                    <label for="buscadorE" class="ajuste">Buscar por nombre</label>
                </div>  
                 <div class=" col l2 alto3">
                    <button type="submit" title="Buscar" name="buscar" class="waves-effect waves-light red lighten-1 lighten-1 btn"><i class="material-icons">search</i></button>  
                </div> 
                  <?php 
                        foreach($permisosdisponibles as $row1){ 
                            if($row1['id_permiso']==18){ 
                            print("
                             <div class=' col l2  alto3'>
                    <a href='create.php' title='crear'class='waves-effect waves-light green  btn'><i class=
                    'material-icons'>add</i></a>  
                </div> 
                            "); 
                            } 
                        }
                        ?>
                  </div>   
            </form> 
                <div class="row">
                    <div class="col l12 col s12 col m6">
                        <table class="highlight text-blanco" id="mi_tabla" >
                            <thead>
                                <tr>
                                <th >#</th>
                                <th >Tipo de usuario</th> 
                                <?php
                                foreach($permisosdisponibles as $row1){
                                    if($row1['id_permiso']==19){
                                    print("                
                                  <th></th> 
                                    ");
                                    }
                                    if($row1['id_permiso']==20){
                                    print("
                                     <th></th>
                                    ");   
                            } 
                                } 
                            ?>
                                </tr>
                            </thead>
                            <tbody>	
                            <?php
                            foreach($data as $row){
                                print("
                                <tr>
                                    <td>$row[id_tipo]</td>
                                    <td>$row[tipo]</td>  
                                   
                                ");
                                foreach($permisosdisponibles as $row1){
                                    if($row1['id_permiso']==19){
                                    print("                
                                <td><a  href='update.php?id=$row[id_tipo]' title='actualizar' class='waves-effect waves-light  amber accent-4  btn'>  <i class='material-icons'>edit</i></a></td>

                                    ");
                                    }
                                    if($row1['id_permiso']==20){
                                    print("
                                     <td><a href='delete.php?id=$row[id_tipo]' title='Eliminar'class='waves-effect waves-light red btn'><i class='material-icons'>clear</i></a></td>
                                    ");   
                            }
                        }   
                            }
                            ?>
                                </tr>
                            </tbody>
                        </table>
                </main>