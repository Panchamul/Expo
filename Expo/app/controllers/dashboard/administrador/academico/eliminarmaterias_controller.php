<?php
//ANIDO LA CLASE
require_once("../../../app/models/materias.class.php");
require_once("../../../app/controllers/dashboard/administrador/account/autenticacion_portodo.php"); 
try{
    if(isset($_GET['id'])){
        $materia = new materias; 
        if($materia->setId($_GET['id'])){//AQUÍ OBTENEMOS LAS ID 
            if($materia->readMaterias()){
                if(isset($_POST['Eliminar'])){
                    $_POST = $materia->validateForm($_POST);
                    if($materia->setEstado(1)){
                        if($materia->deleteMaterias()){
                            Page::showMessage(1,"Materia eliminada correctamente  ", "academico.php");
                        }else{
                            Page::showMessage(2,"No se logro eliminar", null);
                        }
                    }else{
                        throw new Exception("No se envia el dato del valor");
                    }
                }
            }else{
                Page::showMessage(2,"Materia inexistente", "academico.php");
            } 
        }
    }else{
        Page::showMessage(3,"Seleccione una materia", "academico.php");
    }
}catch(Exception $error){
    Page::showMessage(2, $error->getMessage(), null);
}
//ANIDO EL FORMULARIO
require_once("../../../app/views/dashboard/administrador/academico/eliminar_materias_view.php");
?>