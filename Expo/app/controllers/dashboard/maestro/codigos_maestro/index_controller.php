<?php
    require_once("../../../app/models/codigos.class.php");
    require_once("../../../app/controllers/dashboard/maestro/account/autenticacion_portodo.php");
    $codigos = new Codigo();
    try{

        if(isset($_POST['btnBuscar'])){
            $_POST = $codigos->validateForm($_POST);
            //Se envia el dato por medio de una busqueda de tipo codigo
            $data = $codigos->SearchAlumnos($_POST['txtBuscador']);
            if($data){
                $row = count($data);
                Page::showMessage(4, "Se encontraron $row resuldatos", null);
            }else{
                Page::showMessage(4, "No se encontraron resultados", null);
                $data = $codigo->getAlumnos();
            }
        }else{
            $data = $codigos->getAlumnos();
        }
        if($data){
            require_once("../../../app/views/dashboard/maestro/codigos_maestro/index_view.php");
        }else{
            Page::showMessage(4, "No hay alumnos disponibles", "create.php");
        }

    }catch(Exception $error){

    }
?>