<?php 
    try{
        require_once("../../../app/models/observaciones.class.php");
        require_once("../../../app/controllers/dashboard/maestro/account/autenticacion_portodo.php");
        $observaciones = new Observacion();
       if(isset($_GET['id']) && isset($_GET['idAlumno'])){
            /**========================================================
             * INICIO DE LA SECCION EN LA CUAL SE CONOCERAN LOS ELEMENTOS
             ==========================================================*/
            if($observaciones->setIdAlumno($_GET['idAlumno'])){
                if($observaciones->setIdMaestro(8)){
                    if($observaciones->setId($_GET['id'])){
                        $observaciones->readObservacionesAlumno();
                    }else{
                        throw new Exception("No se envia de forma correcta el dato id ");
                    }
                }else{
                    throw new Exception("No se envia de forma correcta el dato id maestrp");
                }
            }else{
                throw new Exception("No se envia de forma correcta el dato id alumno");
            }
            /**========================================================
             * FIN DE LA SECCION EN LA CUAL SE CONOCERAN LOS ELEMENTOS
             ==========================================================*/


            if(isset($_POST['btnEditar'])){
                if($observaciones->setObservacion($_POST['txtObservacion'])){
                    if($observaciones->setEstado(0)){
                        if($observaciones->setIdAlumno($_GET['idAlumno'])){
                            if($observaciones->setIdMaestro(8)){
                                if($observaciones->setFecha(date('Y-m-d'))){
                                    if($observaciones->UpdateObservaciones()){
                                        Page::showMessage(1, "Modificado con exito", "observaciones.php?id=$_GET[idAlumno]");
                                    }else{
                                        Page::showMessage(2, "No se modifico la observación", null);
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
        require_once("../../../app/views/dashboard/maestro/observaciones/update_view.php");
    }catch(Exception $error){
        Page::showMessage(2, $error->getMessage(), null);
    }
    
?>