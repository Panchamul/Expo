<?php 
    try{
        require_once("../../../app/models/preguntas_frecuentes.class.php");
        require_once("../../../app/controllers/dashboard/administrador/account/autenticacion_portodo.php"); 
        $preguntas = new Pregunta();
        if(isset($_POST['btnGuardar'])){
            if($preguntas->setPregunta($_POST['txtPregunta'])){
                if($preguntas->setEstado(0)){
                    if($preguntas->setRespuesta($_POST['txtRespuesta'])){
                        if($preguntas->createPreguntas()){
                            Page::showMessage(1, "Creado con exito", "index1.php");
                        }else{
                            Page::showMessage(2, "No se creo el tipo de codigo familiar", null);
                        }  
                    }else{
                        throw new Exception("No se envia de forma correcta el dato estado");
                    }
                }else{
                    throw new Exception("No se envia de forma correcta el dato estado");
                }
            }else{
                throw new Exception("No se envia de forma correcta");
            }
        }
        require_once("../../../app/views/dashboard/administrador/templates/forms.php");
        Forms::create2('Crear preguntas frecuentes', 'txtPregunta', 'Ingresa una pregunta', 
                        'Pregunta', 'index1.php', 'btnGuardar', 'text', 'txtRespuesta'
                        , 'Ingresa una respuesta', 'Respuesta', 'text');
    }catch(Exception $error){
        Page::showMessage(2, $error->getMessage(), null);
    }
    
?>