<?php 
//ANIDO LA CLASE
require_once("../../../app/models/oferta.class.php");
require_once("../../../app/controllers/dashboard/administrador/account/autenticacion_portodo.php"); 
try{
    //AQUÍ OBTENGO LAS ID DE LA OFERTA ACADEDMICA
    if(isset($_GET['id'])){
        $oferta=new oferta();
        if($oferta->setId($_GET['id'])){
            if($oferta->readOfertas1()){
                if(isset($_POST['actualizar'])){//SÍ LA OPERACIÓN ES REALIZADA 
                    $_POST = $oferta->validateForm($_POST);
                        if($oferta->setEstado(0)){ 
                                if($oferta->habilitarOfertas()){//SE HABILITAN LAS OFERTAS 
                                    Page::showMessage(1, "Oferta Habilitada", "academico.php#taboferta");
                                }else {
                                    Page::showMessage(2, "La oferta no se puede habilitar", "academico.php#taboferta");
                                } 
                        }else {
                            throw new Exception("Nombre de la oferta incorrecto");
                        }
                }
            }else{
                Page::showMessage(2,"Oferta inexistente", "academico.php#taboferta");
            }
        }else{
            Page::showMessage(2,"oferta incorrecta", "academico.php#taboferta");
        }
    }else{
        Page::showMessage(3,"Seleccione una oferta", "academico.php#taboferta");
    }
}catch(Exception $error){
    Page::showMessage(2, $error->getMessage(), null);
}
//ANIDO EL FORMULARIO
require_once("../../../app/views/dashboard/administrador/academico/habilitar_ofertas_view2.php");
?>