<main class="hermoso">
    <div class="row">
    <div class="container">
        <div class="row">
            <div class="col s12">
                <h1 class="center text-blanco">Maestros dados de baja</h1>
            </div>
        </div>
        <div class="row">
             <form method="post" autocomplete="off"><!--esto contiene los botones de busqueda-->
                <div class="input-field blanco col l6 alto3">
                    <i class="material-icons prefix">search</i>
                    <input onpaste="return false" onkeypress="return soloLetras(event)" name="busqueda" id="buscadorE" type="text" class="">
                    <label for="buscadorE" class="ajuste">Buscar por nombre del maestro</label>
                </div>
                <div class=" col l2 alto3">
                    <button type="submit" title="Buscar" name="buscar" class="waves-effect waves-light red lighten-1 lighten-1 btn"><i class="material-icons">search</i></button>  
                </div>
                  
            </form>
        <!--div que mostrara datos en una tabla-->
        </div>
        <div class="col l12 col s12 col m6 text-blanco">
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
                        <th></th>
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
                            <td><img src='../../../web/img/maestros/$row[foto]' class='materialboxed' width='110' height='110'></td>
			                <td>
                             <a href='habilitar_maestrosok.php?id=$row[id]' title='Habilitar'class='waves-effect waves-light  btn'><i class='material-icons'>check</i></a>
                             </td>
                        </tr>
                        ");
                    }
                    ?>
                    </tbody>
                </table> 
            </div> 
             <a href='ver_maestro.php' title='Cancelar'class='waves-effect waves-light red btn alto3'> cancelar </a>
                             
            </div>  
    </div> 
</main> 