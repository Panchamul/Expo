<?php 
    try{
        require_once("../../../app/models/preguntas_frecuentes.class.php");
        require_once("../../../app/controllers/dashboard/administrador/account/autenticacion_portodo.php"); 
        $preguntas = new Pregunta();
        if(isset($_GET['id'])){
            if($preguntas->setId($_GET['id'])){
                if($preguntas->readPreguntas()){
                }else{
                     throw new Exception("No se envia ejecuta el READ");
                }
            }else{
                throw new Exception("No se envia el dato GET");
            }
            if(isset($_POST['btnEditar'])){
                if($preguntas->setPregunta($_POST['txtPregunta'])){
                    if($preguntas->setRespuesta($_POST['txtRespuesta'])){
                        if($preguntas->updatePreguntas()){
                            Page::showMessage(1, "Editado con exito", "index1.php");
                        }else{
                            Page::showMessage(2, "No se creo la pregunta frecuente", null);
                        }  
                    }else{

                    }
                }else{
                    throw new Exception("No se envia de forma correcta");
                }
            }
        }else{
            Page::showMessage(2, "Seleccione un elemento a modificar", "index1.php");
        }
        require_once("../../../app/views/dashboard/administrador/templates/forms.php");
        Forms::update1('Actualizar preguntas frecuentes', 'txtPregunta', 
                        'Ingresa una pregunta', $preguntas->getPregunta(), 'Pregunta', 
                        'btnEditar', 'text'
                       , 'txtRespuesta', 'Ingresa una respuesta', $preguntas->getRespuesta(), 'Respuesta', 'text');
    }catch(Exception $error){
        Page::showMessage(2, $error->getMessage(), null);
    }
    
?>