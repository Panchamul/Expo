<?php
    try{
        require_once("../../../app/models/estudiantes.class.php");
        require_once("../../../app/controllers/dashboard/administrador/account/autenticacion_portodo.php"); 
        $estudiantes = new Estudiante();
        $data = $estudiantes->getEstudiantesNulas();
        
        if($data){
            require_once("../../../app/views/dashboard/administrador/estudiantes/habilitar_view.php");
        }else{
            Page::showMessage(4, "No hay datos disponibles", "index_estudiantes.php");
        }
    }catch(Exception $error){
        Page::showMessage(2, $error->getMessage(), null);
    }
?>