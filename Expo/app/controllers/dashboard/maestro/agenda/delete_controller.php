<?php 
    try{
        require_once("../../../app/models/agenda.class.php");
        require_once("../../../app/controllers/dashboard/maestro/account/autenticacion_portodo.php");
        $agendas = new Agenda();
        if(isset($_GET['id'])){
            if($agendas->setId($_GET['id'])){
                $numero1 = $_GET['idCurso'];
                if($agendas->readAgenda()){

                }
            }
            if(isset($_POST['btnEliminar'])){
                if($agendas->setId($_GET['id'])){
                    if($agendas->deleteAgenda()){
                        Page::showMessage(1, "Eliminado con exito", "index_agenda.php?id=$numero1");
                    }else{
                        Page::showMessage(2, "No se creo la discapacidad", null);
                    }
                }else{
                    throw new Exception("No se envia el dato GET");
                }
            }
        }else{
            Page::showMessage(2, "Seleccione un elemento a modificar", "index_agenda.php?id=$numero1");
        }
        require_once("../../../app/views/dashboard/maestro/agenda/delete_view.php");
    }catch(Exception $error){
        Page::showMessage(2, $error->getMessage(), null);
    }
    
?>