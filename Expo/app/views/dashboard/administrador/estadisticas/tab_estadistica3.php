<div id="grafica4" class="col s12 col l12 col m12  transp text-blanco" >
            <div class="row ">
                <div class="container">
                    <h3 class="center">Gráfico de códigos por grado</h3>
                    <form method="post" autocomplete="off">
                        <div class="input-field blanco col l6 alto3">
                            <i class="material-icons prefix">search</i>
                            <input onpaste="return false" onkeypress="return soloLetras(event)" name="txtGrado" id="buscador1" type="text" class="">
                            <label for="buscador1" class="ajuste">Buscar</label>
                        </div>
                        <div class=" col l2 alto3">
                            <button type="submit" name="buscarGrado" class="waves-effect waves-light red lighten-1 btn"><i class="material-icons">search</i></button>  
                        </div>
                    </form>
                    <div class="col l12 col s12 col m6">
                        <table class="highlight" id="mi_tabla1">
                            <thead>
                            <tr>
                                <th>Nombre</th> 
                                <th>Acción</th> 
                            </tr>
                            </thead> 
                            <tbody>
                            <?php
                                foreach($data1 as $row){
                                    print('
                                    <tr>
                                    <td>'.$row['grado'].'</td>
                                    <td><a  href="grafico5.php?id='.$row['id'].'" class="waves-effect waves-light  green  btn">Crear grafico</a></td>
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