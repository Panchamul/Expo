<main> 
    <!--Inicio del titulo--> 
    <!--Inicio de laseccion de titulo-->
    <div class="row">
        <div class="col s12">
            <!--Titulo exacto-->
            <h1 class="black-text letragrande" align=center>Oferta academica</h1>
        </div>
    </div>
    <!--Fon de la seccion titulo--> 
    <div class='row'>  
    <?php
     foreach($data as $row){   
    print("  
        <div class='col s12 m6 l4'>
            <!--Contexto completo de la tarjeta-->
            <div class='card'>
                <!--Imagen de la tarjeta-->
                <div class='card-image waves-effect waves-block waves-light'>
                    <!--DIreccion de la tarjeta-->
                    <img class='activator altota' src='../../web/img/generales/pregunta.jpg'>
                </div>
                <!--Contenido dentro de la tarjeta-->
                <div class='card-content'>
                    <!--Oferta academica del grado especifico-->
                    <span class='card-title activator grey-text text-darken-4'>$row[grado]<i class='material-icons right'>more_vert</i></span>
                </div>
                <!--Contenido oculto dentro de la tarjera-->
                <div class='card-reveal'>
                    <!--Titulo oculto dentro de la tarheta-->
                    <span class='card-title grey-text text-darken-4'><h4>$row[grado] </h4><i class='material-icons right'>close</i></span>
                    <h5>Descripcion : $row[descripcion]</h5>
                    <h5>Matricula : $ $row[matricula]</h5>
                    <h5>Mensualidad: $ $row[mensualidad]</h5>
                </div>
            </div>
        </div> 
    ");
     }  
    ?>
     </div>
    <!--Fin del row de preguntas frecuentes-->
</main> 