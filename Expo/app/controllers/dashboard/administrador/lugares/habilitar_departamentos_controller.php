<?php
    try{
        require_once("../../../app/models/departamentos.class.php");
        require_once("../../../app/controllers/dashboard/administrador/account/autenticacion_portodo.php"); 
        $departamentos = new Departamento();
         $data = $departamentos->getDepartamentosNulas();
        if(isset($_POST['btnBuscar'])){
            $_POST = $departamentos->validateForm($_POST);
            //Se envia el dato por medio de una busqueda de tipo codigo
            $data = $departamentos->searchFamiliares($_POST['txtBuscador']);
            if($data){
                $row = count($data);
                Page::showMessage(4, "Se encontraron $row resuldatos", null);
            }else{
                Page::showMessage(4, "No se encontraron resultados", null);
                $data = $departamentos->getDepartamentosNulas();
            }
        }else{
            $data = $departamentos->getDepartamentosNulas();
        }
        if($data){
           require_once("../../../app/views/dashboard/administrador/lugares/habilitar_departamentos_view.php");
        }else{
            Page::showMessage(2, "No se encontraron resultados", "menu.php");
        }

    }catch(Exception $error){

    }
  
     
?>