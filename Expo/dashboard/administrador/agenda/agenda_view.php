<main class="hermoso">
    <div class="container">
        <div class="row">
            <div class="col s12">
                <h1 class="center text-blanco">Cursos</h1>
            </div>
        </div>
        <div class="row ">
            <div class="">
                <form method="post">
                    <div class="input-field blanco col l10 alto3">
                        <i class="material-icons prefix">search</i>
                        <input name="txtBuscador" id="buscador" type="text" class="">
                        <label for="buscador" class="ajuste">Buscar por medio del nombre</label>
                    </div>
                    <div class=" col l2 alto3">
                        <button type="submit" name="btnBuscar" class="waves-effect waves-light red lighten-1 btn"><i class="material-icons">search</i></button>  
                    </div>
                </form>
            </div>  
        </div>
        <div class="row">
           
                
                <?php
                foreach($data as $row){
                    print('
                     <div class="col s12 m6 l4">
                        <div class="card">
                            <div class="card-image">
                                <img src="../../../web/img/generales/lapiz.jpg">
                                <span class="card-title trans">'.$row['grado'].'</span>
                            </div>
                            <div class="card-content">
                                <p>'.$row['materia'].'</p>
                            </div>
                            <div class="card-action">
                                <a href="index_agenda.php?id='.$row['id'].'">Ingresar</a>
                            </div>
                        </div>
                    </div>
                    ');
                    
                }
            ?>  
            
            
        </div>
    </div>
</main>
