<?php

    require_once("../../../app/models/codigos.class.php");
    require_once("../../../app/controllers/dashboard/administrador/account/autenticacion_portodo.php"); 
    $codigos = new Codigo();
    try{

        if(isset($_POST['btnBuscar'])){
            $_POST = $codigos->validateForm($_POST);
            //Se envia el dato por medio de una busqueda de tipo codigo
            $data = $codigos->searchCodigos($_POST['txtBuscador']);
            if($data){
                $row = count($data);
                Page::showMessage(4, "Se encontraron $row resuldatos", null);
            }else{
                Page::showMessage(4, "No se encontraron resultados", null);
                $data = $codigo->getCodigos();
            }
        }else{
            $data = $codigos->getCodigos();
        }
        if($data){
            require_once("../../../app/views/dashboard/administrador/codigos/index_codigos_view.php");
        }else{
            Page::showMessage(4, "No hay codigos disponibles", "create.php");
        }

    }catch(Exception $error){

    }
?>