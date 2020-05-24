<table class="highlight text-blanco" id="mi_tabla">
    <thead>
    <tr>
        <th>Nombre</th> 
        <th>Apellido</th> 
        <th>Carnet</th> 
        <th>Observaciones</th> 
    </tr>
    </thead> 
    <tbody>
    <?php
        foreach($data as $row){
            print('
            <tr>
            <td>'.$row['nombre'].'</td>
            <td>'.$row['apellido'].'</td>
            <td>'.$row['carnet'].'</td>
            <td><a  href="observaciones.php?id='.$row['id'].'" class="waves-effect waves-light   btn">  <i class="material-icons">check</i></a></td>
            </tr>
            
            ');
        }
    ?> 
    </tbody>
    
</table> 