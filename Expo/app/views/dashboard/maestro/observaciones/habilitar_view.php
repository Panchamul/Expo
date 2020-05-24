<main class="hermoso">
    <div class=" text-blanco">
        <div class="row">
            <div class="col s12">
                <h1 class="center">Observaciones</h1>
            </div>
        </div>
        <div class="row ">
            <div class="container">
                <div class="col l12 col s12 col m6">
                    <table class="highlight text-blanco" id="mi_tabla4">
                        <thead>
                        <tr>
                            <th>Carnet</th> 
                            <th>Alumno</th> 
                            <th>Maestro</th> 
                            <th>Observacion</th> 
                            <th>Habilitacion</th> 
                        </tr>
                        </thead> 
                        <tbody>
                        <?php
                            foreach($data as $row){
                                print('
                                <tr>
                                    <td>'.$row['carnet'].'</td>
                                    <td>'.$row['alumno'].'</td>
                                    <td>'.$row['maestro'].'</td>
                                    <td>'.$row['observacion'].'</td>
                                    <td><a  href="habilitacion.php?id='.$row['id'].'&idAlumno='.$row['idAlumno'].'&idMaestro='.$row['idMaestro'].'" class="waves-effect waves-light btn">  <i class="material-icons">check</i></a></td>
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