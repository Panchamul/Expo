<?php 
//ANIDO LA CLASE
require_once("../../../app/models/maestros.class.php");
require_once("../../../app/controllers/dashboard/administrador/account/autenticacion_portodo.php"); 
try{
    //aqui recolecto la id de la materia
    if(isset($_GET['id'])){
        $maestro=new maestros();
        if($maestro->setId($_GET['id'])){
            if($maestro->readMaestros1()){
                if(isset($_POST['actualizar'])){//si presionan el boton
                    $_POST = $maestro->validateForm($_POST);
                        if($maestro->setEstado(0)){ 
                                if($maestro->habilitarMaestros()){//actualizo la materia
                                    Page::showMessage(1, "Maestro Habilitado", "habilitar_maestro.php");
                                }else {
                                    Page::showMessage(2, "El maestro no se puede habilitar", "habilitar_maestro.php");
                                } 
                        }else {
                            throw new Exception("Nombre del maestro incorrecto");
                        }
                }
            }else{
                Page::showMessage(2,"Maestro inexistente", "habilitar_maestro.php");
            }
        }else{
            Page::showMessage(2,"Maestro incorrecta", "habilitar_maestro.php");
        }
    }else{
        Page::showMessage(3,"Seleccione un Maestro ", "habilitar_maestro.php");
    }
}catch(Exception $error){
    Page::showMessage(2, $error->getMessage(), null);
}
//ANIDO EL FORMULARIO
require_once("../../../app/views/dashboard/administrador/maestro/habilitar_maestros_view2.php");