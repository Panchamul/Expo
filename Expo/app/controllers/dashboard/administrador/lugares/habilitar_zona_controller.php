<?php
    try{
        require_once("../../../app/models/zonas.class.php");
        require_once("../../../app/controllers/dashboard/administrador/account/autenticacion_portodo.php"); 
        $zonas = new Zona();
         $data = $zonas->getZonasNulas();
        if(isset($_POST['btnBuscar'])){
            $_POST = $zonas->validateForm($_POST);
            //Se envia el dato por medio de una busqueda de tipo codigo
            $data = $zonas->searchFamiliares($_POST['txtBuscador']);
            if($data){
                $row = count($data);
                Page::showMessage(4, "Se encontraron $row resuldatos", null);
            }else{
                Page::showMessage(4, "No se encontraron resultados", null);
                $data = $zonas->getZonasNulas();
            }
        }else{
            $data = $zonas->getZonasNulas();
        }
        if($data){
           require_once("../../../app/views/dashboard/administrador/lugares/habilitar_zona_view.php");
        }else{
            Page::showMessage(2, "No se encontraron resultados", "menu.php");
        }

    }catch(Exception $error){

    }
  
     
?>