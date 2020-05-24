<?php
    try{
        require_once("../../../app/models/tipo_prueba.class.php");
        require_once("../../../app/controllers/dashboard/administrador/account/autenticacion_portodo.php"); 
        $tipoPruebas = new TipoPrueba();
        if(isset($_POST['btnBuscar'])){
            $_POST = $tipoPruebas->validateForm($_POST);
            $data = $tipoPruebas->searchTipoPruebaNulo($_POST['txtBuscador']);
            if($data){
                $row = count($data);
                Page::showMessage(4, "Se encontraron $row resuldatos", null);
            }else{
                Page::showMessage(4, "No se encontraron resultados", null);
                $data = $tipoPruebas->getTipoPruebaNulas();
            }
        }else{
            $data = $tipoPruebas->getTipoPruebaNulas();
        }

        if($data){
            require_once("../../../app/views/dashboard/administrador/tipos/habilitar_tipo_prueba_view.php");
        }else{
            Page::showMessage(4, "No hay productos disponibles", "index1.php");
        }
    }catch(Exception $error){
        Page::showMessage(2, $error->getMessage(), null);
    }
    

?>