<?php 
    try{
        require_once("../../../app/models/observaciones.class.php");
        require_once("../../../app/controllers/dashboard/maestro/account/autenticacion_portodo.php");
        $observaciones = new Observacion();
        if(isset($_GET['id'])){
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
            if(isset($_POST['btnEliminar'])){
                if($observaciones->setId($_GET['id'])){
                    if($observaciones->DeleteObservaciones()){
                        Page::showMessage(1, "Eliminado con exito", "index_observaciones.php");
                    }else{
                        Page::showMessage(2, "No se creo la observacion", null);
                    }
                }else{
                    throw new Exception("No se envia el dato GET");
                }
            }
        }else{
            Page::showMessage(2, "Seleccione un elemento a eliminar", "index_observaciones.php");
        }
        require_once("../../../app/views/dashboard/maestro/templates/forms.php"); 
        Forms::delete('Eliminar observacion', $observaciones->getObservacion());
    }catch(Exception $error){
        Page::showMessage(2, $error->getMessage(), null);
    }
    
?>