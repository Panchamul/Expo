<main class="#212121 grey darken-4 completo">
    <div class="#212121 grey darken-4 completo">
        
        <!--Inicio de imagen-->
    <div class="row">
        <div class="col 12 fimg">
            <!--Inicio de seccion de alturas-->
            <div class="altura"></div>
            <div class="altura"></div>
            <div class="alturas"></div>
            <div class="alturas"></div>
            <div class="altura"></div>
            <div class="altura"></div>
            <div class="alturas"></div>
            <div class="alturas"></div>
            <div class="altura"></div>
            <div class="altura"></div>
            <div class="alturas"></div>
            <div class="alturas"></div>
            <div class="altura"></div>
            <!--Fin de bloque en blanco por-->
            <h1 class="center letragrande text-blanco"><?php print($_SESSION['nombre2login']." ".$_SESSION['apellido2login'])?></h1>
            
            <p class="letramedia center white-text"> codigos</p>
            </div>
        </div>
    </div>
    <!--Fin de seccion de imagen-->

<!--Caracteristicas del usuario-->
        <div class="">
            <div class="row white-text">
                <div class="col  s6  l3 offset-s3 offset-l1 ">  
                    <!-- Dropdown Trigger -->
                    <a class='dropdown-button btn z-depth-5' href='detalle_codigos.php?id=<?php echo($_GET['id'])?>'>Ver historial</a>
                </div>
            </div>
        </div>


        <div class="row">
            <div class="col s12 m12 l12">
                <h1 class="center text-blanco">
                    Codigos
                </h1>
            </div>
            <?php
            foreach($data as $row){
                print('
                    <div class="col s12 m6 l4 ">
                        <div class="card-panel alturaCodigos '.$codigos->ColorCodigos($row['tipo']).'">
                            <h4 class="white-text">'.$row['codigo'].'</h4>
                            <span class="white-text">'.$row['descripcion'].'</span>
                            <p>
                                <span class="white-text">'.$row['fecha'].'</span>
                            </p>
                        </div>
                    </div>
                ');
            }
            ?>
            
        </div>
         <div class="row">
            <div class="col s12 m12 l12">
                <h1 class="center text-blanco">
                    Observaciones
                </h1>
            </div>
            <?php
            foreach($datas as $row){
                print('
                    <div class="col s12 m6 l4">
                        <div class="card-panel alturaCodigos1 teal">
                        <h4 class="white-text">'.$row['observacion'].'</h4>
                        <h6 class="white-text"> Realizado por: '.$row['maestro'].'</h6>
                        <p>
                            <span class="white-text">'.$row['fecha'].'</span>
                        </p>
                        
                        </div>
                    </div>
                ');
            }
            ?>
            
        </div>
        <!--Terjetas de principio-->

    </div>
</main>