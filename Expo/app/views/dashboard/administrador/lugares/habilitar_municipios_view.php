<main class="hermoso">
    <div class="container text-blanco">
        <div class="row">
            <div class="col s12">
                <h1 class="center">Municipios</h1>
            </div>
        </div>
        <div class="row ">
            <div class="">
                <div class="col l12 col s12 col m6">
                    <table class=" highlight" id="mi_tabla5">
                        <thead>
                        <tr>
                            <th>Municipio</th> 
                            <th>Habilitar</th>
                        </tr>
                        </thead> 
                        <tbody>
                            <?php
                                foreach($data as $row){
                                    print('
                                    <tr>
                                        <td>'.$row['municipio'].'</td>
                                        <td><a  href="habilitacion_municipio.php?id='.$row['id'].'" class="waves-effect waves-light teal btn"><i class="material-icons">check</i></a></td>
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