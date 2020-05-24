<?php 
    try{
        require_once("../../../app/models/preguntas_frecuentes.class.php");
        require_once("../../../app/controllers/dashboard/administrador/account/autenticacion_portodo.php"); 
        $preguntas = new Pregunta();
        if(isset($_GET['id'])){
            if($preguntas->setId($_GET['id'])){
                if($preguntas->readPreguntas()){

                }
            }
            if(isset($_POST['btnEliminar'])){
                if($preguntas->setId($_GET['id'])){
                    if($preguntas->deletePreguntas()){
                        Page::showMessage(1, "Eliminado con exito", "index1.php");
                    }else{
                        Page::showMessage(2, "No se elimino la pregunta", null);
                    }
                }else{
                    throw new Exception("No se envia el dato GET");
                }
            }
        }else{
            Page::showMessage(2, "Seleccione un elemento a eliminar", "index1.php");
        }
        require_once("../../../app/views/dashboard/administrador/templates/forms.php");
        Forms::delete2('Eliminar preguntas frecuentes', $preguntas->getPregunta() );
    }catch(Exception $error){
        Page::showMessage(2, $error->getMessage(), null);
    }
    
?>