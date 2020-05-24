<?php
    try{
        require_once("../../../app/models/tipo_familiar.class.php");
        require_once("../../../app/controllers/dashboard/administrador/account/autenticacion_portodo.php"); 
        $tipoFamiliares = new TipoFamiliar();
        if(isset($_POST['btnBuscar'])){
            $_POST = $tipoFamiliares->validateForm($_POST);
            $data = $tipoFamiliares->searchTipoFamiliarNula($_POST['txtBuscador']);
            if($data){
                $row = count($data);
                Page::showMessage(4, "Se encontraron $row resuldatos", null);
            }else{
                Page::showMessage(4, "No se encontraron resultados", null);
                $data = $tipoFamiliares->getTipoFamiliarNulas();
            }
        }else{
            $data = $tipoFamiliares->getTipoFamiliarNulas();
        }

        if($data){
            require_once("../../../app/views/dashboard/administrador/tipos/habilitar_tipo_familiar_view.php");
        }else{
            Page::showMessage(4, "No hay  tipos disponibles", "index1.php");
        }
    }catch(Exception $error){
        Page::showMessage(2, $error->getMessage(), null);
    }
    

?>