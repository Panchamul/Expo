<?php

    require_once("../../../app/models/estudiantes.class.php");
    require_once("../../../app/controllers/dashboard/administrador/account/autenticacion_portodo.php"); 
    $estudiantes = new Estudiante();
    try{

        if(isset($_POST['btnBuscar'])){
            $_POST = $estudiantes->validateForm($_POST);
            //Se envia el dato por medio de una busqueda de tipo codigo
            $data = $estudiantes->searchEstudiantes($_POST['txtBuscador']);
            if($data){
                $row = count($data);
                Page::showMessage(4, "Se encontraron $row resuldatos", null);
            }else{
                Page::showMessage(4, "No se encontraron resultados", null);
                $data = $estudiantes->getEstudiantes();
            }
        }else{
            $data = $estudiantes->getEstudiantes();
        }
        if($data){
             require_once("../../../app/views/dashboard/administrador/estudiantes/index_view.php");
        }else{
            Page::showMessage(4, "No hay alumnos disponibles", "create.php");
        }

    }catch(Exception $error){

    }
   
?>