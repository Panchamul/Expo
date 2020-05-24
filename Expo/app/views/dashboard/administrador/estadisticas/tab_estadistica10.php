<div id="grafica10" class="col s12 col l12 col m12  transp text-blanco" >
            <div class="row ">
                <div class="container">
                   <h3 class="center">Gráfico de alumnos por departamento y municipio</h3>
                    <form>
                    <div class="altura"></div>
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
                    <div class="altura"></div>
                    <div class="altura"></div>
                     
                    <form method="post" autocomplete="off">
                        <div class=" col l6 alto3">
                            <a href="grafico10.php" name="" class="waves-effect waves-light green lighten-1 btn">Mirar grafico de departamento</a>  
                        </div>
                        <div class=" col l6 alto3">
                            <a href="grafico11.php" name="" class="waves-effect waves-light green lighten-1 btn">Mirar grafico de municipios</a>  
                        </div>
                    </form>
                    <div class="col l12 col s12 col m6">
                        <table class="highlight" id="mi_tabla7">
                            <thead>
                            <tr>
                                <th>Grado</th> 
                                <th>Departamento</th>
                                <th>Municipio</th> 
                            </tr>
                            </thead> 
                            <tbody>
                            <?php
                                foreach($data5 as $row){
                                    print('
                                    <tr>
                                    <td>'.$row['grado'].'</td>
                                    <td><a  href="grafico13.php?id='.$row['id'].'" class="waves-effect waves-light  green  btn">Crear grafico</a></td>
                                    <td><a  href="grafico12.php?id='.$row['id'].'" class="waves-effect waves-light  green  btn">Crear grafico</a></td>
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