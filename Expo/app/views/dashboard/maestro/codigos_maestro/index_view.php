<main class="hermoso">
     <div class="row ">
            <div class="container">
                
                <div class="col s12 m12 l12">
                    <h1 class="text-blanco center">
                        Asignar codigo
                    </h1>
                </div>
                <div class="altura"></div>
                <div class="altura"></div>
                <form method="post" autocomplete="off">
                    <div class="input-field blanco col l10 alto3">
                        <i class="material-icons prefix">search</i>
                        <input onpaste="return false" onkeypress="return soloLetras(event)"name="txtBuscador" id="buscador" type="text" class="">
                        <label for="buscador" class="ajuste">Buscar</label>
                    </div>
                    <div class=" col l2 alto3">
                        <!--Este es el boton en donde se ejecuta la busqueda-->
                        <button type="submit" name="btnBuscar" class="waves-effect waves-light red lighten-1 btn"><i class="material-icons">search</i></button>  
                    </div>
                </form>
                <div class="col l12 col s12 col m6">
                    <table class="highlight text-blanco" id="mi_tabla">
                        <thead>
                        <tr>
                            <th>Nombre</th> 
                            <th>Apellido</th> 
                            <th>Carnet</th> 
                            <th>Agregar codigo</th> 
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
                                <td><a  href="gravedad.php?id='.$row['id'].'" class="waves-effect waves-light   btn">  <i class="material-icons">check</i></a></td>
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