<?php
    try{
        require_once("../../../app/models/observaciones.class.php");
        require_once("../../../app/controllers/dashboard/maestro/account/autenticacion_portodo.php");
        $observaciones = new Observacion();
        if(isset($_GET['id'])){
            if(isset($_POST['btnBuscar'])){
                $_POST = $observaciones->validateForm($_POST);
                //Se envia el dato por medio de una busqueda de tipo codigo
                $data = $observaciones->SearchObservaciones($_POST['txtBuscador']);
                if($data){
                    $row = count($data);
                    Page::showMessage(4, "Se encontraron $row resuldatos", null);
                }else{
                    Page::showMessage(4, "No se encontraron resultados", null);
                    $data = $observaciones->getObservacionesNulas();
                }
            }else{
                if($observaciones->setIdAlumno($_GET['id'])){
                    $data = $observaciones->getObservacionesNulas();
                }else{
                    Page::showMessage(4, "No se que pedo", null);  
                }
            }
            if($data){
            require_once("../../../app/views/dashboard/maestro/observaciones/habilitar_view.php");
            }else{
                Page::showMessage(2, "No se encontraron resultados", "index_observaciones.php");
            }
        }else{
            Page::showMessage(2, "seleccione un alumno", "index_observaciones.php");
        }

    }catch(Exception $error){

    }
  
     
?>