 <table class=" highlight">
    <thead>
    <tr>
        <th>Nombre</th> 
        <th>Apellido</th> 
        <th>fecha nacimiento</th> 
        <th>Ocupación</th> 
        <th>Nombre trabajo</th> 
        <th>Dirección trabajo</th> 
        <th>Teléfono trabajo</th> 
        <th>teléfono</th> 
        <th>Nivel de estudio </th> 
        <th>DUI</th> 
        <th>Habilitar</th> 
    </tr>
    </thead> 
    <tbody>
        <?php
            foreach($data as $row){
                print('
                <tr>
                    <td>'.$row['nombre'].'</td>
                    <td>'.$row['apellido'].'</td>
                    <td>'.$row['fecha_nacimiento'].'</td>
                    <td>'.$row['ocupacion'].'</td>
                    <td>'.$row['nombre_trabajo'].'</td>
                    <td>'.$row['direccion_trabajo'].'</td>
                    <td>'.$row['telefono_trabajo'].'</td>
                    <td>'.$row['telefono'].'</td>
                    <td>'.$row['nivel_estudio'].'</td>
                    <td>'.$row['dui'].'</td>
                    <td><a  href="habilitacion.php?id='.$row['id'].'" class="waves-effect waves-light  teal  btn">  <i class="material-icons">edit</i></a></td>
                </tr>
                ');
            }
        ?>
                
    </tbody>
        
</table> 