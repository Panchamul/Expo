<?php 
    try{
        require_once("../../../app/models/observaciones.class.php");
        require_once("../../../app/controllers/dashboard/maestro/account/autenticacion_portodo.php");
        $observaciones = new Observacion();
       if(isset($_GET['id'])){
            if(isset($_POST['btnGuardar'])){
                if($observaciones->setObservacion($_POST['txtObservacion'])){
                    if($observaciones->setEstado(0)){
                        if($observaciones->setIdAlumno($_GET['id'])){
                            if($observaciones->setIdMaestro(8)){
                                if($observaciones->setFecha(date('Y-m-d'))){
                                    if($observaciones->CreateObservaciones()){
                                        Page::showMessage(1, "Creado con exito", "index_observaciones.php");
                                    }else{
                                        Page::showMessage(2, "No se creo la observación", null);
                                    }  
                                }else{
                                    throw new Exception("No se envia de forma correcta el dato fecha");
                                }
                            }else{
                                throw new Exception("No se envia de forma correcta el dato id maestro");
                            }
                        }else{
                            throw new Exception("No se envia de forma correcta el dato id alumno");
                        }
                    }else{
                        throw new Exception("No se envia de forma correcta el dato estado");
                    }
                }else{
                    throw new Exception("No se envia de forma correcta");
                }
            }
       }else{
             Page::showMessage(2, "Seleccione un alumno porfavor", "index_observaciones.php");
       }
        require_once("../../../app/views/dashboard/maestro/observaciones/create_view.php");
    }catch(Exception $error){
        Page::showMessage(2, $error->getMessage(), null);
    }
    
?>