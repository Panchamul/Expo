<div id="tabdiscapacidades" class="col s12 col l12 col m12  transp text-blanco" >
            <div class="row ">
                <div class="container">
                    <h3 class="center">Gráfico de codigos</h3>
                    <form method="post" autocomplete="off">
                        <div class="input-field blanco col l6 alto3">
                            <i class="material-icons prefix">search</i>
                            <input onpaste="return false" onkeypress="return soloLetras(event)" name="txtAlumno" id="buscador" type="text" class="">
                            <label for="buscador" class="ajuste">Buscar</label>
                        </div>
                        <div class=" col l2 alto3">
                            <button type="submit" name="buscarAlumno" class="waves-effect waves-light red lighten-1 btn"><i class="material-icons">search</i></button>  
                        </div>
                    </form>
                    <div class="col l12 col s12 col m6">
                        <table class="highlight" id="mi_tabla">
                            <thead>
                            <tr>
                                <th>Nombre</th> 
                                <th>Carnet</th> 
                                <th>Accion</th> 
                            </tr>
                            </thead> 
                            <tbody>
                            <?php
                                foreach($data as $row){
                                    print('
                                    <tr>
                                    <td>'.$row['nombre']." ".$row['apellido'].'</td>
                                    <td>'.$row['carnet'].'</td>
                                    <td><a  href="grafico0.php?id='.$row['id'].'" class="waves-effect waves-light  green  btn">Crear grafico</a></td>
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