<div id="grafica8" class="col s12 col l12 col m12  transp text-blanco" >
            <div class="row ">
                <div class="container">
                    <h3 class="center">Gráfico de género</h3>
                    <form method="post" autocomplete="off">
                        <div class="input-field blanco col l6 alto3">
                            <i class="material-icons prefix">search</i>
                            <input name="txtGrado2" id="buscador4" type="text" class="">
                            <label for="buscador4" class="ajuste">Buscar</label>
                        </div>
                        <div class=" col l2 alto3">
                            <button type="submit" name="buscarGrado2" class="waves-effect waves-light red lighten-1 btn"><i class="material-icons">search</i></button>  
                        </div>
                        <div class=" col l6 alto3">
                            <a href="grafico8.php" name="" class="waves-effect waves-light green lighten-1 btn">Hacer reporte de religiones</a>  
                        </div>
                    </form>
                    <div class="col l12 col s12 col m6">
                        <table class="highlight" id="mi_tabla4">
                            <thead>
                            <tr>
                                <th>Nombre</th> 
                                <th>Acción</th> 
                            </tr>
                            </thead> 
                            <tbody>
                            <?php
                                foreach($data3 as $row){
                                    print('
                                    <tr>
                                    <td>'.$row['grado'].'</td>
                                    <td><a  href="grafico9.php?id='.$row['id'].'" class="waves-effect waves-light  green  btn">Crear grafico</a></td>
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