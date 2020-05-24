<?php 
    try{
        require_once("../../../app/models/preguntas_frecuentes.class.php");
        require_once("../../../app/controllers/dashboard/administrador/account/autenticacion_portodo.php"); 
        $preguntas = new Pregunta();
        if(isset($_GET['id'])){
            if($preguntas->setId($_GET['id'])){
                if($preguntas->readPreguntasNulas()){
                }
            }
            if(isset($_POST['btnHabilitar'])){
                if($preguntas->setId($_GET['id'])){
                    if($preguntas->habilitarPreguntas()){
                        Page::showMessage(1, "Habilitado con exito", "index1.php");
                    }else{
                        Page::showMessage(2, "No se habilito el tipo del codigo", null);
                    }
                }else{
                    throw new Exception("No se envia el dato GET");
                }
            }
        }else{
            Page::showMessage(2, "Seleccione un elemento a modificar", "index1.php");
        }
        /*==================================================================
        INICIO DE LA VISTA GENERALIZANA
        ==================================================================)=*/
        require_once("../../../app/views/dashboard/administrador/templates/forms.php");
        Forms::habilitacion('Hebilitacion de preguntas frecuentes', $preguntas->getPregunta(), 'btnHabilitar', 'index1.php');
        /*==================================================================
        FIN DE LA VISTA GENERALIZANA
        ==================================================================)=*/
    }catch(Exception $error){
        Page::showMessage(2, $error->getMessage(), null);
    }
    
?>