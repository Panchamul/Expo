<?php 
//Llamamos a la clase y el controlador a utilizar 
require_once("../../../app/models/grados.class.php");
require_once("../../../app/controllers/dashboard/administrador/account/autenticacion_portodo.php"); 
try{
    //Aquí obtenemos la ID de la materia 
    if(isset($_GET['id'])){
        $grado=new grados();
        if($grado->setId($_GET['id'])){
            if($grado->readGrados()){
                if(isset($_POST['actualizar'])){//Sí la operación es ejecutada 
                    $_POST = $grado->validateForm($_POST);
                        if($grado->setGrado($_POST['grado'])){ 
                                if($grado->updateGrados()){//Se actualiza la materia 
                                    Page::showMessage(1, "Grado Actualizado", "academico.php#tabgrados");
                                }else {
                                    Page::showMessage(2, "El grado no se puede actualizar", "academico.php#tabgrados");
                                } 
                        }else {
                            throw new Exception("Nombre del oradp incorrecto");
                        }
                }
            }else{
                Page::showMessage(2,"Grado incorrecto", "academico.php#tabgrados");
            }
        }else{
            Page::showMessage(2,"Grado incorrecto", "academico.php#tabgrados");
        }
    }else{
        Page::showMessage(3,"Seleccione una grado", "academico.php#tabgrados");
    }
}catch(Exception $error){
    Page::showMessage(2, $error->getMessage(), null);
}
//Llamamos a la vista correspondiente 
require_once("../../../app/views/dashboard/administrador/academico/actualizar_grados_view.php");
?>