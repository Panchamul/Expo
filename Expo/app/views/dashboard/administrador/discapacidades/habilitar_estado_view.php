<main class="hermoso">
    <div class="container">
        <div class="row">
            <div class="col s12">
                <h1 class="center text-blanco">Estados dados de baja</h1>
            </div>
            <div class="col l12 col s12 col m6">
                <table class="highlight text-blanco" id="mi_tabla">
                    <thead>
                    <tr>
                        <th>Estado</th>  
                        <th>Habilitar</th> 
                    </tr>
                    </thead> 
                    <tbody>
                    <?php
                        foreach($data as $row){
                            print('
                            <tr>
                            <td>'.$row['estado_familiar'].'</td>
                            <td><a href="habilitacion_estado.php?id='.$row['id'].'" class="waves-effect waves-light green btn"><i class="material-icons">check</i></a></td>
                            </tr>
                            
                            ');
                        }
                    ?> 
                    </tbody>
                        
                </table> 
            </div>
        </div>
    </div>
</main>