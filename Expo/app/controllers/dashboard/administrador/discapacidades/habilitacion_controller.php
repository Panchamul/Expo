<?php
    try{
        require_once("../../../app/models/discapacidades.class.php");
        require_once("../../../app/controllers/dashboard/administrador/account/autenticacion_portodo.php"); 
        $discapacidades = new Discapacidad();
        if(isset($_POST['buscarDiscapacidad'])){
            $_POST = $discapacidades->validateForm($_POST);
            $data = $discapacidades->searchDiscapacidad($_POST['buscadorDiscapacidad']);
            if($data){
                $row = count($data);
                Page::showMessage(4, "Se encontraron $row resuldatos", null);
            }else{
                Page::showMessage(4, "No se encontraron resultados", null);
                $data = $discapacidades->getDiscapacidadesNulas();
            }
        }else{
            $data = $discapacidades->getDiscapacidadesNulas();
        }

        if($data){
            require_once("../../../app/views/dashboard/administrador/discapacidades/habilitar_view.php");
        }else{
            Page::showMessage(4, "No hay datos disponibles", "index1.php");
        }
    }catch(Exception $error){
        Page::showMessage(2, $error->getMessage(), null);
    }
    

?>