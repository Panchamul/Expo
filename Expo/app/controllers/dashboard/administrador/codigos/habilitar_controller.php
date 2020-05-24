<?php
    try{
        require_once("../../../app/models/codigos.class.php");
        require_once("../../../app/controllers/dashboard/administrador/account/autenticacion_portodo.php"); 
        $codigos = new Codigo();
        if(isset($_POST['btnBuscar'])){
            $_POST = $codigos->validateForm($_POST);
            $data = $codigos->searchCodigosNulas($_POST['txtBuscar']);
            if($data){
                $row = count($data);
                Page::showMessage(4, "Se encontraron $row resuldatos", null);
            }else{
                Page::showMessage(4, "No se encontraron resultados", null);
                $data = $codigos->getCodigosNulas();
            }
        }else{
            $data = $codigos->getCodigosNulas();
        }

        if($data){
            require_once("../../../app/views/dashboard/administrador/codigos/habilitar_view.php");
        }else{
            Page::showMessage(4, "No hay datos disponibles", "index_codigos.php");
        }
    }catch(Exception $error){
        Page::showMessage(2, $error->getMessage(), null);
    }
    

?>