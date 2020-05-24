<?php
    try{
        require_once("../../../app/models/preguntas_frecuentes.class.php");
        require_once("../../../app/controllers/dashboard/administrador/account/autenticacion_portodo.php"); 
        $preguntas = new Pregunta();
        if(isset($_POST['btnBuscar'])){
            $_POST = $preguntas->validateForm($_POST);
            $data = $preguntas->searchPreguntasNula($_POST['txtBuscador']);
            if($data){
                $row = count($data);
                Page::showMessage(4, "Se encontraron $row resuldatos", null);
            }else{
                Page::showMessage(4, "No se encontraron resultados", null);
                $data = $preguntas->getPreguntasNulas();
            }
        }else{
            $data = $preguntas->getPreguntasNulas();
        }

        if($data){
            require_once("../../../app/views/dashboard/administrador/tipos/habilitar_preguntas_frecuentes_view.php");
        }else{
            Page::showMessage(4, "No hay preguntas disponibles", "index1.php");
        }
    }catch(Exception $error){
        Page::showMessage(2, $error->getMessage(), null);
    }
    

?>