<?php
    try{
        require_once("../../../app/models/religiones.class.php");
        require_once("../../../app/controllers/dashboard/administrador/account/autenticacion_portodo.php"); 
        $religiones = new Religion();
        if(isset($_POST['buscarDiscapacidad'])){
            $_POST = $religiones->validateForm($_POST);
            $data = $religiones->searchReligionNula($_POST['buscadorDiscapacidad']);
            if($data){
                $row = count($data);
                Page::showMessage(4, "Se encontraron $row resuldatos", null);
            }else{
                Page::showMessage(4, "No se encontraron resultados", null);
                $data = $religiones->getReligionesNulas();
            }
        }else{
            $data = $religiones->getReligionesNulas();
        }

        if($data){
            require_once("../../../app/views/dashboard/administrador/discapacidades/habilitar_religion_view.php");
        }else{
            Page::showMessage(4, "No hay productos disponibles", "index1.php");
        }
    }catch(Exception $error){
        Page::showMessage(2, $error->getMessage(), null);
    }
?>