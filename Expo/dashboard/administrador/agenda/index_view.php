<main class="hermoso">
    <div class="container text-blanco">
        <div class="row">
            <div class="col s12">
                <h1 class="center">Estudiantes</h1>
            </div>
        </div>
        <div class="row ">
            <div class="">
                <form method="post">
                    <div class="input-field blanco col l6 alto3">
                        <i class="material-icons prefix">search</i>
                        <input name="txtBuscador" id="buscador" type="text" class="">
                        <label for="buscador" class="ajuste">Buscar por medio del nombre</label>
                    </div>
                    <div class=" col l2 alto3">
                        <button type="submit" name="btnBuscar" class="waves-effect waves-light red lighten-1 btn"><i class="material-icons">search</i></button>  
                    </div>
                    <div class=" col l2  alto3">
                        <a href="create.php?id=<?php echo($_GET['id'])?>" class="waves-effect waves-light green btn"><i class="material-icons">add</i></a>  
                    </div>  
                    <div class=" col l2  alto3">
                        <a href="habilitar.php?id=<?php echo($_GET['id'])?>"class="waves-effect waves-light  btn"><i class="material-icons">visibility</i></a>  
                    </div>  
                </form>
                <div class="col l12 col s12 col m6">
                    <table class=" highlight">
                        <thead>
                        <tr>
                            <th>Tirulo</th> 
                            <th>Cuerpo</th> 
                            <th>fecha</th> 
                            <th>Modificar</th> 
                            <th>Eliminar</th>
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
                                        <td><a  href="update.php?id='.$row['id'].'&&idCurso='.$_GET['id'].'" class="waves-effect waves-light  amber accent-4  btn">  <i class="material-icons">edit</i></a></td>
                                        <td><a  href="delete.php?id='.$row['id'].'&&idCurso='.$_GET['id'].'" class="waves-effect waves-light red btn"><i class="material-icons">clear</i></a></td>
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