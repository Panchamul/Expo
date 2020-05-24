<?php
//ANIDO LA CLASE
require_once("../../../app/models/oferta.class.php");
require_once("../../../app/controllers/dashboard/administrador/account/autenticacion_portodo.php"); 
try{
    if(isset($_GET['id'])){
        $oferta = new Oferta; 
        if($oferta->setId($_GET['id'])){//AQUÍ OBTENEMOS LAS ID 
            if($oferta->readOfertas()){
                if(isset($_POST['Eliminar'])){
                    $_POST = $oferta->validateForm($_POST);
                    if($oferta->setEstado(1)){
                        if($oferta->deleteOfertas()){
                            Page::showMessage(1,"Oferta eliminada correctamente  ", "academico.php#taboferta");
                        }else{
                            Page::showMessage(2,"No se logro eliminar", null);
                        }
                    }else{
                        throw new Exception("No se envia el dato del valor");
                    }
                }
            }else{
                Page::showMessage(2,"Oferta inexistente", "academico.php#taboferta");
            } 
        }
    }else{
        Page::showMessage(3,"Seleccione una oferta", "academico.php#taboferta");
    }
}catch(Exception $error){
    Page::showMessage(2, $error->getMessage(), null);
}
//ANIDO EL FORMULARIO
require_once("../../../app/views/dashboard/administrador/academico/eliminar_ofertas_view.php");
?>