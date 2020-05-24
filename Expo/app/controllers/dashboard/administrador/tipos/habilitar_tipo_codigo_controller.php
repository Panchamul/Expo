<?php
    try{
        require_once("../../../app/models/tipo_codigo.class.php");
        require_once("../../../app/controllers/dashboard/administrador/account/autenticacion_portodo.php"); 
        $tipoCodigos = new TipoCodigo();
        if(isset($_POST['btnBuscar'])){
            $_POST = $tipoCodigos->validateForm($_POST);
            $data = $tipoCodigos->searchTipoCodigoNulas($_POST['txtBuscador']);
            if($data){
                $row = count($data);
                Page::showMessage(4, "Se encontraron $row resuldatos", null);
            }else{
                Page::showMessage(4, "No se encontraron resultados", null);
                $data = $tipoCodigos->getTipoCodigosNulas();
            }
        }else{
            $data = $tipoCodigos->getTipoCodigosNulas();
        }

        if($data){
            require_once("../../../app/views/dashboard/administrador/tipos/habilitar_tipo_codigo_view.php");
        }else{
            Page::showMessage(4, "No hay tipos disponibles", "index1.php");
        }
    }catch(Exception $error){
        Page::showMessage(2, $error->getMessage(), null);
    }
    

?>