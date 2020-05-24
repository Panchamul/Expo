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
            <p class="letramedia center white-text">Recordatorios</p>
            </div>
        </div>
    </div>
    <!--Fin de seccion de imagen-->

<!--Caracteristicas del usuario-->
        <div class="">
            <div class="row white-text">
            </div>
            </div>
        </div>


        <div class="row">
            <div class="col s12 m12 l12">
                <h1 class="center text-blanco">
                    Recordatorios
                </h1>
            </div>
            <?php
            foreach($data as $row){
                print('
                    <div class="col s12 m6 l4">
                        <div class="card-panel alturaCodigos1 teal">
                        <h4 class="white-text">'.$row['titulo'].'</h4>
                        <span class="white-text">'.$row['cuerpo'].'</span>
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
                <p class="center">
                    <a href="cursos.php?id=<?php echo($numero)?>" type="submit"class="waves-effect waves-light teal darken-3 btn ">Regresar</a>  
                </p>
            </div>
        </div>
        <!--Terjetas de principio-->

    </div>
</main>