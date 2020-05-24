<?php

require_once("../../../app/models/perfiles.class.php");

require_once("../../../app/controllers/dashboard/administrador/account/autenticacion_portodo.php");
$codigos=new Perfiles();
try{ 
    if(isset($_POST['btnBuscar'])){

        $_POST = $codigos->validateForm($_POST);

        //Se envia el dato por medio de una busqueda de tipo codigo

        $data = $codigos->searchAdmins1($_POST['txtBuscador']);

        if($data){

            $row = count($data);

            Page::showMessage(4, "Se encontraron $row resultados", null);

        }else{

            Page::showMessage(4, "No se encontraron resultados", null);

            $data = $codigo->getAdmins1();

        }

    }else{

        $data = $codigos->getAdmins1();

    }

    if($data){

        require_once("../../../app/views/dashboard/administrador/admin/habilitar.php");

    }else{

        Page::showMessage(4, "No hay usuarios inhabilitados", "../admin/admin_index.php");

    }



}catch(Exception $error){



}

?>