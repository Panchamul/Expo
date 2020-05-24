<main class="hermoso">
    <div class="container text-blanco">
        <div class="row">
            <div class="col s12">
                <h1 class="center">Estudiantes</h1>
            </div>
        </div>
        <div class="row ">
            <div class="">
                <div class="col l12 col s12 col m6">
                    <table class=" highlight">
                        <thead>
                        <tr>
                            <th>Tirulo</th> 
                            <th>Cuerpo</th> 
                            <th>fecha</th> 
                            <th>Habilitar</th>
                        </tr>
                        </thead> 
                        <tbody>
                            <?php
                                foreach($data as $row){
                                    print('
                                    <tr>
                                        <td>'.$row['titulo'].'</td>
                                        <td>'.$row['cuerpo'].'</td>
                                        <td>'.$row['fecha'].'</td>
                                        <td><a  href="habilitacion.php?id='.$row['id'].'&&idCurso='.$_GET['id'].'" class="waves-effect waves-light  teal btn">  <i class="material-icons">check</i></a></td>
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