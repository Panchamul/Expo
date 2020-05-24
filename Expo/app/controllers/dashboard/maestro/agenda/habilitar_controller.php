<?php
    try{
        require_once("../../../app/models/agenda.class.php");
        require_once("../../../app/controllers/dashboard/maestro/account/autenticacion_portodo.php");
        $agendas = new Agenda();
        if(isset($_GET['id'])){
            $numero = $_GET['id'];
            if($agendas->setIdCurso($_GET['id'])){
                $data = $agendas->getAgendasNulas();
            }else{
                Page::showMessage(2, "No se ingresaron secion", NULL);
            }
            if($data){
            require_once("../../../app/views/dashboard/maestro/agenda/habilitar_view.php");
            }else{
                Page::showMessage(2, "No se encontraron resuldatos", "index_agenda.php?id=$numero");
            }
        }else{
            Page::showMessage(2, "Seleccione un curso", "cursos.php");
        }
    }catch(Exception $error){
        Page::showMessage(2, $error->getMessage(), null);
    }
    

?>