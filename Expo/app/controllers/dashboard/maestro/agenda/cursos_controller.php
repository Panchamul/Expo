<?php 

    try{

        require_once("../../../app/models/agenda.class.php");
        require_once("../../../app/controllers/dashboard/maestro/account/autenticacion_portodo.php");

        $agendas = new Agenda();

        if($agendas->setIdMaestro($_SESSION['id1'])){

            $data = $agendas->getCursos();

        }else{

            Page::showMessage(2, "No se ingresaron secion", NULL);

        }

        if($data){

           require_once("../../../app/views/dashboard/maestro/agenda/agenda_view.php");

        }else{

            Page::showMessage(2, "No se encontraron resultados", "../cursos/create_cursos.php");

        }

        

    }catch(Exception $error){

        Page::showMessage(2, $error->getMessage(), null);

    }

   





     

?>