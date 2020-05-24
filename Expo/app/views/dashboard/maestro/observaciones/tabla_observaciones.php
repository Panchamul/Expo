<table class="highlight text-blanco" id="mi_tabla5">
    <thead>
    <tr>
        <th>Carnet</th> 
        <th>Alumno</th> 
        <th>Maestro</th> 
        <th>Observacion</th> 
        <th>Modificar</th> 
        <th>Eliminar</th> 
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
                <td><a  href="update.php?id='.$row['id'].'&idAlumno='.$row['idAlumno'].'&idMaestro='.$row['idMaestro'].'" class="waves-effect waves-light  amber accent-4  btn">  <i class="material-icons">edit</i></a></td>
                <td><a  href="delete.php?id='.$row['id'].'&idAlumno='.$row['idAlumno'].'&idMaestro='.$row['idMaestro'].'" class="waves-effect waves-light red btn"><i class="material-icons">clear</i></a></td>
            </tr>
            
            ');
        }
    ?> 
    </tbody>
    
</table> 