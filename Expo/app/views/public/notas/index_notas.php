<main class="bg1"> 
<div class="container">
    <div class="row">
        <div class="col s12">
        <?php 
        $periodo=$_GET['periodo'];
        print(" <h1 class='text-blanco' align=center>Notas del $periodo </h1>
        ") ;
            ?>
        </div>
    </div>
</div>   
    <div class ="row text-blanco"><!--fila para alinear las tabs-->
      <div class="container ">
        <div class="row">  
                    <?php
                    foreach($data as $row){   
                        print("  
                        <h4 >$row[materia]</h4>  
                            <div class='col l12 col s12 col m6  '>
                            <table class='highlight'>  
                            <thead>
                            <tr>
                                <th>#</th> 
                                <th>Descripcion</th> 
                                <th>Tipo de prueba</th> 
                                <th>Nota</th> 
                            </tr>
                            </thead> 
                            <tbody><!--cargamos los datos de las materias--> 
                            ");
                        if($notas->setMateria($row['materia'])){
                            $data1=$notas->getNotasAlumnoDetalle();
                            $data2=$notas->getPromedio();
                        foreach($data1 as $row){
                            print("  
                            <tr> 
                            <td>$row[id]</td>
                            <td>$row[perfil]</td>
                            <td>$row[tipo]</td>
                            <td>$row[nota]</td> 
                            <td></td> 
                            </tr> 
                            ");
                        }
                        foreach($data2 as $row){
                            print("  
                            <tr> 
                            <td></td>
                            <td></td>
                            <td></td>
                            <td>Promedio</td> 
                            <td>$row[promedio]</td> 
                            </tr> 
                            ");
                        }
                        print("</tbody>
                        </table> 
                    </div>  
                    ");
                        }  
                    }
                    ?> 
         </div>
        </div>
       </div>    
</main>