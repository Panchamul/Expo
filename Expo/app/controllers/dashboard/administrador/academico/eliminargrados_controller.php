<?php
//ANIDO LA CLASE
require_once("../../../app/models/grados.class.php");
require_once("../../../app/controllers/dashboard/administrador/account/autenticacion_portodo.php"); 
try{
    if(isset($_GET['id'])){
        $grado = new grados; 
        if($grado->setId($_GET['id'])){//AQUÍ OBTENEMOS LAS ID 
            if($grado->readGrados()){
                if(isset($_POST['Eliminar'])){
                    $_POST = $grado->validateForm($_POST);
                    if($grado->setEstado(1)){
                        if($grado->deleteGrados()){
                            Page::showMessage(1,"Grado eliminado correctamente  ", "academico.php#tabgrados");
                        }else{
                            Page::showMessage(2,"No se logro eliminar", null);
                        }
                    }else{
                        throw new Exception("No se envia el dato del valor");
                    }
                }
            }else{
                Page::showMessage(2,"Grado inexistente", "academico.php#tabgrados");
            } 
        }
    }else{
        Page::showMessage(3,"Seleccione un Grado", "academico.php#tabgrados");
    }
}catch(Exception $error){
    Page::showMessage(2, $error->getMessage(), null);
}
//ANIDO EL FORMULARIO
require_once("../../../app/views/dashboard/administrador/academico/eliminar_grados_view.php");
?>