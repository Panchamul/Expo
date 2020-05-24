<?php
    try{
        require_once("../../../app/models/familiares.class.php");
        require_once("../../../app/controllers/dashboard/administrador/account/autenticacion_portodo.php"); 
        $familiares = new Familiar();
         $data = $familiares->getFamiliares();
        if(isset($_POST['btnBuscar'])){
            $_POST = $familiares->validateForm($_POST);
            //Se envia el dato por medio de una busqueda de tipo codigo
            $data = $familiares->searchFamiliares($_POST['txtBuscador']);
            if($data){
                $row = count($data);
                Page::showMessage(4, "Se encontraron $row resuldatos", null);
            }else{
                Page::showMessage(4, "No se encontraron resultados", null);
                $data = $familiares->getFamiliares();
            }
        }else{
            $data = $familiares->getFamiliares();
        }
         require_once("../../../app/views/dashboard/administrador/familiares/index_view.php");
           
        if($data){
           require_once('../../../app/views/dashboard/administrador/familiares/tabla.php');
        }else{
            Page::showMessage(2, "No se encontraron resuldatos", "create.php");
        }

    }catch(Exception $error){

    }
     
?>