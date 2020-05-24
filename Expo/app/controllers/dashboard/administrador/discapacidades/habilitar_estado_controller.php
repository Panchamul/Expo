<?php
    try{
        require_once("../../../app/models/estado_familiar.class.php");
        require_once("../../../app/controllers/dashboard/administrador/account/autenticacion_portodo.php"); 
        $estados = new Estado();
        if(isset($_POST['buscarDiscapacidad'])){
            $_POST = $estados->validateForm($_POST);
            $data = $estados->searchEstadoFamiliarNula($_POST['buscadorDiscapacidad']);
            if($data){
                $row = count($data);
                Page::showMessage(4, "Se encontraron $row resuldatos", null);
            }else{
                Page::showMessage(4, "No se encontraron resultados", null);
                $data = $estados->getEstadosFamiliaresNulos();
            }
        }else{
            $data = $estados->getEstadosFamiliaresNulos();
        }

        if($data){
            require_once("../../../app/views/dashboard/administrador/discapacidades/habilitar_estado_view.php");
        }else{
            Page::showMessage(4, "No hay estados disponibles", "index1.php");
        }
    }catch(Exception $error){
        Page::showMessage(2, $error->getMessage(), null);
    }
    

?>