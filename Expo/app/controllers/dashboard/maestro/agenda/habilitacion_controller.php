<?php 
    try{
        require_once("../../../app/models/agenda.class.php");
        require_once("../../../app/controllers/dashboard/maestro/account/autenticacion_portodo.php");
        $agendas = new Agenda();
        if(isset($_GET['id'])){
            $numero = $_GET['id'];
            $numero1 = $_GET['idCurso'];
            if($agendas->setId($_GET['id'])){
                if($agendas->readAgendaNulas()){
                }
            }
            if(isset($_POST['btnHabilitar'])){
                if($agendas->setId($_GET['id'])){
                    if($agendas->habilitarAgenda()){
                        Page::showMessage(1, "Habilitado con exito", "index_agenda.php?id=$numero1");
                    }else{
                        Page::showMessage(2, "No se creo la discapacidad", null);
                    }
                }else{
                    throw new Exception("No se envia el dato GET");
                }
            }
        }else{
            Page::showMessage(2, "Seleccione un elemento a modificar", "index_codigos.php");
        }
        /*==================================================================
        INICIO DE LA VISTA GENERALIZANA
        ==================================================================)=*/
        require_once("../../../app/views/dashboard/maestro/agenda/habilitacion_view.php");
        /*==================================================================
        FIN DE LA VISTA GENERALIZANA
        ==================================================================)=*/
    }catch(Exception $error){
        Page::showMessage(2, $error->getMessage(), null);
    }
    
?>