<main class="#212121 grey darken-4 completo">

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
            <p class="letramedia center white-text">Historial de codigos</p>
            </div>
        </div>
    </div>
    <!--Fin de seccion de imagen-->
    <!--Titulo de la seccion-->
    <div class="container">
        <div class="row">
            <div class="col s12">
                <!--Titulo-->
                <h1 class="white-text letramedia">Historial de codigos</h1>
            </div>
            <div class="col12">
                <!--Sub-titulo-->
                <p class="white-text letrapeque">Crear un reporte de los codigos</p>
            </div>
        </div>
    </div>
    <!--Fin del titulo de la seccion-->
    <!--Boton de crear registro-->
    <form action="../../app/views/public/reporte/conducta.php" target="_blank" method="post">
    <div class="container">
        <div class="col s12">
            <button type="submit" class="btn">Crear reporte</button>
        </div>
    </div>
</form>
    <!--Fin del boton crear registro-->
    <div class="container">
        <div class="col s12 m12 l12">
            <h1 class="center text-blanco">
                Codigos
            </h1>
        </div>
    </div>
    <div class="container">
            <!--Tablas de estuduantes-->
        <div class="row">
            <div class="col s12">
                <table class="bordered white-text">
            <thead>
            <tr>
                <th>Nombre</th>
                <th>Codigo</th>
                <th>Descripcion del codigo</th>
                <th>Fecha del codigo</th>
            </tr>
            </thead>

            <tbody>
            
                <?php
                foreach($data as $row){
                    print('
                        <tr>
                            <td>'.$row['nombre'].' '.$row['apellido'].'</td>
                            <td>'.$row['codigo'].'</td>
                            <td>'.$row['descripcion'].'</td>
                            <td>'.$row['fecha'].'</td>
                        </tr>
                    ');
                }
                ?>
               
            
            </tbody>
        </table>
        
            </div>
        </div>
                
        <!--Fin de tablas de estudiantes-->
    </div>
    <div class="container">
        <div class="col s12 m12 l12">
            <h1 class="center text-blanco">
                Observaciones
            </h1>
        </div>
    </div>
    <div class="container">
            <!--Tablas de estuduantes-->
        <div class="row">
            <div class="col s12">
                <table class="bordered white-text">
            <thead>
            <tr>
                <th>Nombre</th>
                <th>Observacion</th>
                <th>Maestro</th>
                <th>fecha</th>
            </tr>
            </thead>

            <tbody>
            
                <?php
                foreach($datas as $row){
                    print('
                        <tr>
                            <td>'.$row['alumno'].'</td>
                            <td>'.$row['observacion'].'</td>
                            <td>'.$row['maestro'].'</td>
                            <td>'.$row['fecha'].'</td>
                        </tr>
                    ');
                }
                ?>
               
            
            </tbody>
        </table>
        
            </div>
        </div>
                
        <!--Fin de tablas de estudiantes-->
    </div>
</main>