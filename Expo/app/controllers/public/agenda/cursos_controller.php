<?php



    try{

        require_once("../../app/models/agenda.class.php");
        require_once("../../app/controllers/public/account/autenticacion_portodo.php");
        $agendas = new Agenda();

        if($agendas->setIdEstudiante($_SESSION['id2'])){

            $data = $agendas->getCursosEstudiante();

        }else{

            Page::showMessage(2, "No se ingresaron secion", NULL);

        }

        if($data){

           require_once("../../app/views/public/agenda/cursos_view.php");

        }else{

            Page::showMessage(2, "No se encontraron resuldatos", "create.php");

        }

        

    }catch(Exception $error){

        Page::showMessage(2, $error->getMessage(), null);

    }



    

?>