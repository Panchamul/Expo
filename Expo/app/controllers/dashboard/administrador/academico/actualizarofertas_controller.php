<?php 
//Llamamos a la clase y el controlador a utilizar
require_once("../../../app/models/oferta.class.php");
require_once("../../../app/controllers/dashboard/administrador/account/autenticacion_portodo.php"); 
try{
    //aqui recolecto la id de la materia
    if(isset($_GET['id'])){
        $oferta=new Oferta();
        if($oferta->setId($_GET['id'])){
            if($oferta->readOfertas()){
                if(isset($_POST['actualizar'])){//Sí la operacion es ejecutada 
                    $_POST = $oferta->validateForm($_POST);
                        if($oferta->setMatricula($_POST['matricula'])){
                            if($oferta->setMensualidad($_POST['mensualidad'])) {
                                if($oferta->setDescripcion($_POST['textarea1'])){
                                    if($oferta->setGrado($_POST['grados'])){
                                if($oferta->updateOfertas()){//Se actualiza la Oferta 
                                    Page::showMessage(1, "Oferta Actualizada", "academico.php#taboferta");
                                }else {
                                    Page::showMessage(2, "La oferta no se puede actualizar", "academico.php#taboferta");
                                }
                            }
                        }
                            else{
                                throw new Exception("Descripcion incorrecta");
                            } 
                            }else {
                                throw new Exception("Mensualidad incorrecta");
                            }
                        }else {
                            throw new Exception("Nombre de la oferta incorrecta");
                        }
                }
            }else{
                Page::showMessage(2,"Oferta inexistente", "academico.php#taboferta");
            }
        }else{
            Page::showMessage(2,"Oferta incorrecta", "academico.php#taboferta");
        }
    }else{
        Page::showMessage(3,"Seleccione una oferta", "academico.php#taboferta");
    }
}catch(Exception $error){
    Page::showMessage(2, $error->getMessage(), null);
}
//Llamamos a la vista correspondiente 
require_once("../../../app/views/dashboard/administrador/academico/actualizar_ofertas_view.php");
?>