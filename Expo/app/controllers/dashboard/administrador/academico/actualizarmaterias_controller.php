<?php 
//Llamamos a la clase y al controlador a utilizar 
require_once("../../../app/models/materias.class.php");
require_once("../../../app/controllers/dashboard/administrador/account/autenticacion_portodo.php"); 
try{
    //Aquí obtenemos la ID de la materia 
    if(isset($_GET['id'])){
        $materia=new materias();
        if($materia->setId($_GET['id'])){
            if($materia->readMaterias()){
                if(isset($_POST['actualizar'])){//Sí la operación es realizada 
                    $_POST = $materia->validateForm($_POST);
                        if($materia->setMateria($_POST['materia'])){ 
                                if($materia->updateMaterias()){//Se actualiza la materia 
                                    Page::showMessage(1, "Materia Actualizada", "academico.php#tabmaterias");
                                }else {
                                    Page::showMessage(2, "La materia no se puede actualizar", "academico.php#tabmaterias");
                                } 
                        }else {
                            throw new Exception("Nombre del la materia incorrecto");
                        }
                }
            }else{
                Page::showMessage(2,"Materia inexistente", "academico.php");
            }
        }else{
            Page::showMessage(2,"Materia incorrecta", "academico.php");
        }
    }else{
        Page::showMessage(3,"Seleccione una materia", "academico.php");
    }
}catch(Exception $error){
    Page::showMessage(2, $error->getMessage(), null);
}
//ANIDO EL FORMULARIO
require_once("../../../app/views/dashboard/administrador/academico/actualizar_materias_view.php");
?>