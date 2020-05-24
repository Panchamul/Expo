<?php
    try{
        require_once("../../../app/models/familiares.class.php");
        require_once("../../../app/controllers/dashboard/administrador/account/autenticacion_portodo.php"); 
        $familiares = new Familiar();
         $data = $familiares->getFamiliaresNulas();
        if(isset($_POST['btnBuscar'])){
            $_POST = $familiares->validateForm($_POST);
            //Se envia el dato por medio de una busqueda de tipo codigo
            $data = $familiares->searchFamiliares($_POST['txtBuscador']);
            if($data){
                $row = count($data);
                Page::showMessage(4, "Se encontraron $row resuldatos", null);
            }else{
                Page::showMessage(4, "No se encontraron resultados", null);
                $data = $familiares->getFamiliaresNulas();
            }
        }else{
            $data = $familiares->getFamiliaresNulas();
        }
        if($data){
           require_once("../../../app/views/dashboard/administrador/familiares/habilitar_view.php");
        }else{
            Page::showMessage(2, "No se encontraron resuldatos", "index_familiares.php");
        }

    }catch(Exception $error){

    }
  
     
?>