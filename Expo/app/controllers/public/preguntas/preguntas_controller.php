<?php
    try{
        /**
         * ACA SE MANDARON A LLAMAR LOS ELEMNTOS A UTILIXAR
         */
        require_once("../../app/models/preguntas_frecuentes.class.php");
        $preguntas = new Pregunta();
        
        /**
         * ACA SE MANDARON A LLAMAR LOS ELEMNTOS A UTILIXAR
         */
        $data = $preguntas->getPreguntas();
        
        if($data){
            require_once("../../app/views/public/preguntas/preguntas_view.php");
        }else{
            Page::showMessage(4, "No hay codigos disponibles", "index.php");
        }
    }catch(Exception $error){
        Page::showMessage(2, $error->getMessage(), null);
    }
    
?>