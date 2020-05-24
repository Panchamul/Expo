<main class="hermoso"> 
    <div class ="row"><!--fila para alinear las tabs-->
      <div class="container ">
      <div class="row">
            <div class="col s12">
                <h1 class="center text-blanco">Ofertas académicas dadas de baja</h1>
            </div>
        </div>
        <div class="row">
             <form method="post" autocomplete="off"><!--esto contiene los botones de busqueda-->
                <div class="input-field blanco col l6 alto3">
                    <i class="material-icons prefix">search</i>
                    <input onpaste="return false" onkeypress="return soloLetras(event)" name="busqueda" id="buscadorE3" type="text" class="">
                    <label for="buscadorE3" class="ajuste">Buscar por grado</label>
                </div>
                <div class=" col l2 alto3">
                    <button type="submit" title="Buscar" name="buscar" class="waves-effect waves-light red lighten-1 lighten-1 btn"><i class="material-icons">search</i></button>  
                </div> 
            </form>
        <!--div que mostrara datos en una tabla-->
        </div>
        <div class="col l12 col s12 col m6 text-blanco">
            <table class="highlight" id="mi_tabla8">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Matrícula</th>  
                        <th>Mensualidad</th>  
                        <th>Grado</th> 
                        <th>Descripción</th>   
                        <th></th> 
                    </tr>
                </thead> 
                    <tbody><!--cargamos los datos de las materias-->
                    <?php
                    foreach($data as $row){ 
                        print('
                        <tr> 
                            <td>'.$row['id_oferta'].'</td>
                            <td>$'.$row['matricula'].'</td>
                            <td>$'.$row['mensualidad'].'</td>
                            <td>'.$row['grado'].'</td>
                            <td>'.$row['descripcion'].'</td>  
                            <td><a href="habilitar_ofertasok.php?id='.$row['id_oferta'].'"  title="Habilitar" class="waves-effect waves-light green btn"><i class="material-icons">check</i></a></td>
                            </tr>
                        ');
                    }
                    ?>
                    </tbody>
                </table>   
            <a href='academico.php#taboferta' title='Cancelar'class='waves-effect waves-light red btn alto3'> cancelar </a>
            </div>
            </div> 
    </main>