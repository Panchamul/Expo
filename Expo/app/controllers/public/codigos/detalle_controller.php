



<?php

    try{

        /**

         * ACA SE MANDARON A LLAMAR LOS ELEMNTOS A UTILIXAR

         */

        require_once("../../app/models/codigos.class.php");

        $codigos = new Codigo();

        require_once("../../app/models/observaciones.class.php");
        require_once("../../app/controllers/public/account/autenticacion_portodo.php"); 
        $observaciones = new Observacion();

        

        /**

         * ACA SE MANDARON A LLAMAR LOS ELEMNTOS A UTILIXAR

         */

        if($codigos->setIdAlumno($_GET['id'])){

            if($observaciones->setIdAlumno($_GET['id'])){

                    $data = $codigos->getCodigoAlumnos();

                    $datas = $observaciones->getObservacionesVistosPorEstudiantes();

            }else{



            }

        }else{

            Page::showMessage(2, "ERROR", null);

        }

        if($data && $datas){

            require_once("../../app/views/public/codigos/detalle_view.php");

        }else{

            Page::showMessage(4, "No hay codigos disponibles", "../account/menu_principal.php");

        }

    }catch(Exception $error){

        Page::showMessage(2, $error->getMessage(), null);

    }

    

?>