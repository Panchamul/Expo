<main class="hermoso">
    <div class="row">
    <div class="container">
        <div class="row">
            <div class="col s12">
                <h1 class="center text-blanco">Cursos dados de baja</h1>
            </div>
        </div>
        <div class="row">
             <form method="post" autocomplete="off"><!--esto contiene los botones de busqueda-->
                <div class="input-field blanco col l6 alto3">
                    <i class="material-icons prefix">search</i>
                    <input onpaste="return false" onkeypress="return soloLetras(event)" name="txtSearchEstado" id="buscadorE" type="text" class="">
                    <label for="buscadorE" class="ajuste">Buscar por nombre de la materia</label>
                </div>
                <div class=" col l2 alto3">
                    <button type="submit" title="Buscar" name="btnSearchEstado" class="waves-effect waves-light red lighten-1 lighten-1 btn"><i class="material-icons">search</i></button>  
                </div>
                  
            </form>
        <!--div que mostrara datos en una tabla-->
        </div>
        <div class="col l12 col s12 col m6 text-blanco">
            <table class="highlight" id="mi_tabla1">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Grado</th>   
                        <th>Materia</th>
                        <th></th>
                    </tr>
                </thead> 
                    <tbody><!--cargamos los datos de las materias-->
                    <?php
                        foreach($data as $row){
                            print('
                            <tr>
                            <td>'.$row['id'].'</td>
                            <td>'.$row['grado'].'</td>
                            <td>'.$row['materia'].'</td>
                            <td><a href="habilitar_cursosok.php?id='.$row['id'].'"  title="Habilitar" class="waves-effect waves-light green btn"><i class="material-icons">check</i></a></td>
                            </tr>
                            
                            ');
                        }
                    ?> 
                    </tbody>
                    </tbody>
                </table> 
            </div> 
            <?php 
            print(" <a href='cursos.php?id=$_SESSION[id1]' title='Cancelar'class='waves-effect waves-light red btn alto3'> cancelar </a>
            "); 
             ?>           
            </div>  
    </div> 
</main> 