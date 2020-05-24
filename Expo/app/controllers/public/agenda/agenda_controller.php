<?php

    try{

        /**

         * ACA SE MANDARON A LLAMAR LOS ELEMNTOS A UTILIXAR

         */

        require_once("../../app/models/agenda.class.php");
        require_once("../../app/controllers/public/account/autenticacion_portodo.php");
        $agendas = new Agenda();

        

        if(isset($_GET['id'])){

            $numero = $_GET['id'];

             /**

             * ACA SE MANDARON A LLAMAR LOS ELEMNTOS A UTILIXAR

             */

            if($agendas->setIdCurso($_GET['id'])){

                    $data = $agendas->getAgenda();

                

            }else{

                Page::showMessage(2, "ERROR", null);

            }

            if($data){

                require_once("../../app/views/public/agenda/agenda_view.php");  

            }else{

                Page::showMessage(4, "No hay avisos disponibles", "cursos.php?id=$numero");

            }

        }else{

             Page::showMessage(4, "No se paso la informacion seleccione un curso", "cursos.php?id=$numero");

        }

    }catch(Exception $error){

        Page::showMessage(2, $error->getMessage(), null);

    }

    

?>