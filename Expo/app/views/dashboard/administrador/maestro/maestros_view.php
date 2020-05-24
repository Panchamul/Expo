<main class="bg1"> 
<div class="container">
    <div class="row">
        <div class="col s12">
            <h1 class="  text-blanco" align=center>Informacion de  maestros</h1>
        </div>
    </div>
</div>   
    <div class ="row text-blanco"><!--fila para alinear las tabs-->
      <div class="container ">
        <div class="row">
             <form method="post" autocomplete="off"><!--esto contiene los botones de busqueda-->
                <div class="input-field blanco col l6 alto3">
                    <i class="material-icons prefix">search</i>
                    <input onpaste="return false" onkeypress="return soloLetras(event)"name="busqueda" id="buscadorE3" type="text" class="">
                    <label for="buscadorE3" class="ajuste">Buscar por nombre</label>
                </div>
                <div class=" col l2 alto3">
                    <button type="submit" title="Buscar" name="buscar" class="waves-effect waves-light red lighten-1 lighten-1 btn"><i class="material-icons">search</i></button>  
                </div> 
                <?php
                foreach($permisosdisponibles as $row1){ 
                    if($row1['id_permiso']==11){
                    print('<div class=" col l2  alto3">
                    <a href="habilitar_maestro.php" title="Habilitar"class="waves-effect waves-light  btn"><i class="material-icons">visibility</i></a>  
                </div> 
                    ');
                    }
                }
                ?>
                  
            </form>
        <!--div que mostrara datos en una tabla-->
        </div> 
        <div class="col l12 col s12 col m6 ">
            <table class="highlight" id="mi_tabla">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Nombre</th>  
                        <th>Apellido</th>  
                        <th>Usuario</th>  
                        <th>Telefono</th> 
                        <th>Genero</th>    
                        <th>Foto</th> 
                       <?php 
                       foreach($permisosdisponibles as $row1){ 
                            if($row1['id_permiso']==11){
                                print("<th></th>");
                            }
                            if($row1['id_permiso']==12){
                                print("<th></th>");
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
                            <td>$row[usuario]</td> 
                            <td>$row[telefono]</td>
                            <td>$row[id_genero]</td>
                            <td><img src='../../../web/img/maestros/$row[foto]' class='materialboxed' width='100' height='100'></td>
                           ");
                           foreach($permisosdisponibles as $row1){ 
                            if($row1['id_permiso']==11){
                                print("<td>
                                <a href='update_maestros.php?id=$row[id]' title='Modificar'class='waves-effect waves-light amber accent-4 btn '><i class='material-icons'>edit</i></a>
                                 </td>");
                            }
                            if($row1['id_permiso']==12){
                                print(" <td>
                                <a href='delete_maestros.php?id=$row[id]' title='Eliminar'class='waves-effect waves-light red btn'><i class='material-icons'>clear</i></a>
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
</main>