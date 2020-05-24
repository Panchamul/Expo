<?php 
//Llamamos la clase y el controlador 
require_once("../../../app/models/maestros.class.php");
require_once("../../../app/controllers/dashboard/administrador/account/autenticacion_portodo.php"); 
try{
    //Aquí obtenemos las "ID"
    if(isset($_GET['id'])){
        $seccion=new Maestros();
        if($seccion->setId($_GET['id'])){
            if($seccion->readSecciones()){
                if(isset($_POST['actualizar'])){//Establecemos condiciones sí la opración es realizada 
                    $_POST = $seccion->validateForm($_POST);
                        if($seccion->setUsuario($_POST['grados'])){ 
                                if($seccion->updateSecciones()){//Se actualiza la sección
                                    Page::showMessage(1, "Seccion Actualizada", "detalle_secciones.php");
                                }else {
                                    Page::showMessage(2, "La seccion no se puede actualizar", "detalle_secciones.php");
                                }
                            } 
                }
            }else{
                Page::showMessage(2,"Seccion inexistente", "academico.php#tabsecciones");
            }
        }else{
            Page::showMessage(2,"Seccion incorrecta", "academico.php#tabsecciones");
        }
    }else{
        Page::showMessage(3,"Seleccione una seccion", "academico.php#tabsecciones");
    }
}catch(Exception $error){
    Page::showMessage(2, $error->getMessage(), null);
}
//Llamamos a la vista correspodiente 
require_once("../../../app/views/dashboard/administrador/academico/modificar_seccion_view.php");
?>