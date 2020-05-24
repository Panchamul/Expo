<?php 
    try{
        require_once("../../../app/models/agenda.class.php");
        require_once("../../../app/controllers/dashboard/maestro/account/autenticacion_portodo.php");
        $agendas = new Agenda();
        if(isset($_GET['id'])){
            $numero1 = $_GET['id'];
            if($agendas->setIdCurso($_GET['id'])){
                if(isset($_POST['btnBuscar'])){
                    $_POST = $agendas->validateForm($_POST);
                    //Se envia el dato por medio de una busqueda de tipo codigo
                    $data = $agendas->searchAgenda($_POST['txtBuscador']);
                    if($data){
                        $row = count($data);
                        Page::showMessage(4, "Se encontraron $row resultados", null);
                    }else{
                        Page::showMessage(4, "No se encontraron resultados", null);
                        $data = $agendas->getAgenda();
                    }
                }else {
                    $data = $agendas->getAgenda();
                }
            }else{
                Page::showMessage(2, "No se ingresaron secion",  "create.php?id=$numero1");
            }
            if($data){
            require_once("../../../app/views/dashboard/maestro/agenda/index_view.php");
            }else{
                Page::showMessage(2, "No se encontraron resultados", "create.php?id=$numero1");
            }
        }else{
            Page::showMessage(2, "Seleccione un curso", "cursos.php");
        }
    }catch(Exception $error){
        Page::showMessage(2, $error->getMessage(), null);
    }
   


     
?>