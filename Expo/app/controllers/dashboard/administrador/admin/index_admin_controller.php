<?php

require_once("../../../app/models/perfiles.class.php");

require_once("../../../app/controllers/dashboard/administrador/account/autenticacion_portodo.php");
$codigos=new Perfiles();
try{ 
    if(isset($_POST['btnBuscar'])){

        $_POST = $codigos->validateForm($_POST);

        //Se envia el dato por medio de una busqueda de tipo codigo

        $data = $codigos->searchAdmins($_POST['txtBuscador']);

        if($data){

            $row = count($data);

            Page::showMessage(4, "Se encontraron $row resultados", null);

        }else{

            Page::showMessage(4, "No se encontraron resultados", null);

            $data = $codigos->getAdmins();

        }

    }else{

        $data = $codigos->getAdmins();

    }

    if($data){

        require_once("../../../app/views/dashboard/administrador/admin/admin_index.php");

    }else{

        Page::showMessage(4, "No hay codigos disponibles", "create.php");

    }



}catch(Exception $error){



}

?>