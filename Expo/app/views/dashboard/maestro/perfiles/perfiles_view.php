<main class="bg1"> 
<div class="container">
    <div class="row">
        <div class="col s12">
            <h1 class="  text-blanco" align=center>Evaluaciones</h1>
        </div>
    </div>
</div>   
    <div class ="row text-blanco"><!--fila para alinear las tabs-->
      <div class="container ">
        <div class="row">
             <form method="post" autocomplete="off"><!--esto contiene los botones de busqueda-->
                <div class="input-field blanco col l6 alto3">
                    <i class="material-icons prefix">search</i>
                    <input onpaste="return false" onkeypress="return soloLetras(event)" name="txtSearchEstado" id="buscadorE3" type="text" class="">
                    <label for="buscadorE3" class="ajuste">Buscar por grado</label>
                </div>
                <div class=" col l2 alto3">
                    <button type="submit" title="Buscar" name="btnSearchEstado" class="waves-effect waves-light red lighten-1 lighten-1 btn"><i class="material-icons">search</i></button>  
                </div> 
                <div class=" col l2  alto3">
                <?php 
                print("
                <a href='crear_perfiles.php?id=$_SESSION[id1]' title='Agregar' class='waves-effect waves-light green btn'><i class='material-icons'>add</i></a>  
                 ");
                     ?>
                </div>   
            </form>
        <!--div que mostrara datos en una tabla-->
        </div>
        <div class="col l12 col s12 col m6 ">
            <table class="highlight" id="mi_tabla">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Perfil</th>      
                        <th>Prueba</th> 
                        <th>Cod.Curso</th>
                        <th>Grado</th>      
                        <th>Materia</th> 
                        <th>Mes</th>
                        <th></th>
                    </tr>
                </thead> 
                    <tbody><!--cargamos los datos de las materias-->
                    <?php
                    foreach($data as $row){ 
                        print("
                        <tr> 
                            <td>$row[id]</td>
                            <td>$row[perfil]</td>
                            <td>$row[tipo]</td> 
                            <td>$row[id_curso]</td>
                            <td>$row[grado]</td>
                            <td>$row[materia]</td>  
                        ");
                        switch ($row['id_mes'])
                        {
                            case 1:
                            $valor='enero';
                            break;
                            case 2:
                            $valor='febrero';
                            break;
                            case 3:
                            $valor='marzo';
                            break;
                            case 4:
                            $valor='abril';
                            break;
                            case 5:
                            $valor='mayo';
                            break;
                            case 6:
                            $valor='junio';
                            break;
                            case 7:
                            $valor='julio';
                            break;
                            case 8:
                            $valor='agosto';
                            break;
                            case 9:
                            $valor='septiembre';
                            break;
                            case 10:
                            $valor='octubre';
                            break;
                        }
                        print("
                        <td>$valor</td>
                            <td>
                            <a href='update_perfiles.php?id=$row[id]' title='Modificar'class='waves-effect waves-light amber accent-4 btn '><i class='material-icons'>edit</i></a>
                             </td> 
                        </tr>
                        ");
                    }
                    ?>
                    </tbody>
                </table> 
            </div> 
         </div>
        </div>
       </div>    
</main>