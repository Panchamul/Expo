<main class="hermoso">
    <div class="container">
        <div class="row">
            <div class="col s12">
                <h1 class="center text-blanco">Tipos de familiares dados de baja</h1>
            </div>
            <div class="col l12 col s12 col m6">
                <table id="mi_tabla"class="highlight text-blanco">
                    <thead>
                    <tr>
                        <th>Tipo de familiar</th> 
                        <th>Habilitar</th> 
                    </tr>
                    </thead> 
                    <tbody>
                    <?php
                        foreach($data as $row){
                            print('
                            <tr>
                            <td>'.$row['tipo'].'</td>
                            <td><a href="habilitacion_tipo_familiar.php?id='.$row['id'].'" class="waves-effect waves-light green btn"><i class="material-icons">check</i></a></td>
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