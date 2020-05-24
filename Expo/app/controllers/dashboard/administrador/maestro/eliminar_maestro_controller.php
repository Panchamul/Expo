<?php
//ANIDO LA CLASE
require_once("../../../app/models/maestros.class.php");
require_once("../../../app/controllers/dashboard/administrador/account/autenticacion_portodo.php"); 
try{
    if(isset($_GET['id'])){
        $maestro = new maestros; 
        if($maestro->setId($_GET['id'])){
            if($maestro->readMaestros()){
                if(isset($_POST['Eliminar'])){
                    $_POST = $maestro->validateForm($_POST);
                    if($maestro->setEstado(1)){
                        if($maestro->deleteMaestros()){
                            Page::showMessage(1,"Maestro eliminado correctamente  ", "ver_maestro.php");
                        }else{
                            Page::showMessage(2,"No se logro eliminar", null);
                        }
                    }else{
                        throw new Exception("No se envia el dato del valor");
                    }
                }
            }else{
                Page::showMessage(2,"Maestro inexistente", "ver_maestro.php");
            } 
        }
    }else{
        Page::showMessage(3,"Seleccione una maestro", "ver_maestro.php");
    }
}catch(Exception $error){
    Page::showMessage(2, $error->getMessage(), null);
}
//ANIDO EL FORMULARIO
require_once("../../../app/views/dashboard/administrador/maestro/eliminar_maestros_view.php");
?>