<?php 
//ANIDO LA CLASE
require_once("../../../app/models/grados.class.php");
require_once("../../../app/controllers/dashboard/administrador/account/autenticacion_portodo.php");
try{
    //AQUÍ OBTENEMOS LAS ID DE LOS GRADOS
    if(isset($_GET['id'])){
        $grado=new grados();
        if($grado->setId($_GET['id'])){
            if($grado->readGrados()){
                if(isset($_POST['actualizar'])){//SÍ LA OPERACIÓN ES EJECUTADA
                    $_POST = $grado->validateForm($_POST);
                        if($grado->setEstado(0)){ 
                                if($grado->habilitarGrados()){//SE ACTUALIZAN LOS GRADOS 
                                    Page::showMessage(1, "Grado Habilitado", "academico.php#tabgrados");
                                }else {
                                    Page::showMessage(2, "El grado no se puede habilitar", "academico.php#tabgrados");
                                } 
                        }else {
                            throw new Exception("Nombre del grado incorrecto");
                        }
                }
            }else{
                Page::showMessage(2,"Grado inexistente", "academico.php#tabgrados");
            }
        }else{
            Page::showMessage(2,"Grado incorrecta", "academico.php#tabgrados");
        }
    }else{
        Page::showMessage(3,"Seleccione un Grado ", "academico.php#tabgrados");
    }
}catch(Exception $error){
    Page::showMessage(2, $error->getMessage(), null);
}
//ANIDO EL FORMULARIO
require_once("../../../app/views/dashboard/administrador/academico/habilitar_grados_view2.php");
?>