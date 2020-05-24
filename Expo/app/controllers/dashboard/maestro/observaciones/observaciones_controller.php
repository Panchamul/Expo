<?php
    require_once("../../../app/models/observaciones.class.php");
    require_once("../../../app/controllers/dashboard/maestro/account/autenticacion_portodo.php");
    $observaciones = new Observacion();
    try{

        if(isset($_GET['id'])){
            if($observaciones->setIdAlumno($_GET['id'])){
                if($observaciones->setIdMaestro($_SESSION['id1'])){
                    if(isset($_POST['btnBuscar'])){
                        $_POST = $observaciones->validateForm($_POST);
                        //Se envia el dato por medio de una busqueda de tipo codigo
                        $data = $observaciones->SearchObservaciones($_POST['txtBuscador']);
                        if($data){
                            $row = count($data);
                            Page::showMessage(4, "Se encontraron $row resuldatos", null);
                        }else{
                            Page::showMessage(4, "No se encontraron resultados", null);
                            $data = $observaciones->getObservaciones();
                        }
                    }else{
                        $data = $observaciones->getObservacionesVistosPorEstudiantes();
                    }
                    if($data){
                    require_once("../../../app/views/dashboard/maestro/observaciones/observaciones_view.php");
                    }else{
                        Page::showMessage(4, "No hay observaciones disponibles en este alumno", "create.php?id=".$_GET['id']."" );
                    }
                }else{
                    Page::showMessage(4, "error maestro", "create.php");
                }
            }else{
                Page::showMessage(4, "No hay alumnos disponibles", "create.php");
            }
        }else{
            Page::showMessage(4, "Seleccione un alumno", "index_observaciones.php");
        }

    }catch(Exception $error){

    }
    
?>