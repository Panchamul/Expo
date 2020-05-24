<?php 
    try{
        require_once("../../../app/models/observaciones.class.php");
        require_once("../../../app/controllers/dashboard/maestro/account/autenticacion_portodo.php");
        $observaciones = new Observacion();
        if(isset($_GET['id']) && isset($_GET['idAlumno'])){
            if($observaciones->setId($_GET['id'])){
                if($observaciones->setIdAlumno($_GET['idAlumno'])){
                    if($observaciones->setIdMaestro(8)){
                        if($observaciones->readObservacionesAlumnoNulas()){
                        }else{
                             Page::showMessage(2, "No se creo un set", null);
                        }
                    }else{
                         Page::showMessage(2, "No sse ingreso unser", null);
                    }
                }else{
                     Page::showMessage(2, "No se creo la un set", null);
                }
            }
            if(isset($_POST['btnHabilitar'])){
                if($observaciones->setId($_GET['id'])){
                    if($observaciones->HabilitarObservaciones()){
                        Page::showMessage(1, "Habilitado con exito", "index_observaciones.php");
                    }else{
                        Page::showMessage(2, "No se creo la observacion", null);
                    }
                }else{
                    throw new Exception("No se envia el dato GET");
                }
            }
        }else{
            Page::showMessage(2, "Seleccione un elemento a modificar", "index_observaciones.php");
        }
        /*==================================================================
        INICIO DE LA VISTA GENERALIZANA
        ==================================================================)=*/
        require_once("../../../app/views/dashboard/maestro/templates/forms.php");
        Forms::habilitacion('Habilitacion de las observaciones', $observaciones->getObservacion(), 'btnHabilitar', "habilitar.php?id=$_GET[idAlumno]");
        /*==================================================================
        FIN DE LA VISTA GENERALIZANA
        ==================================================================)=*/
    }catch(Exception $error){
        Page::showMessage(2, $error->getMessage(), null);
    }
    
?>