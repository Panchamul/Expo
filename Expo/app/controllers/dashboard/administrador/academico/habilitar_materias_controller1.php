<?php 
//ANIDO LA CLASE
require_once("../../../app/models/materias.class.php");
require_once("../../../app/controllers/dashboard/administrador/account/autenticacion_portodo.php"); 
try{
    //AQUÍ OBTENEMOS LAS ID DE LAS MATERIAS
    if(isset($_GET['id'])){
        $materia=new materias();
        if($materia->setId($_GET['id'])){
            if($materia->readMaterias()){
                if(isset($_POST['actualizar'])){//SÍ LA OPERACIÓN ES REALIZADA
                    $_POST = $materia->validateForm($_POST);
                        if($materia->setEstado(0)){ 
                                if($materia->habilitarMaterias()){//SE HABILITAN LAS MATERIAS 
                                    Page::showMessage(1, "Materia Habilitada", "academico.php");
                                }else {
                                    Page::showMessage(2, "La materia no se puede habilitar", "academico.php");
                                } 
                        }else {
                            throw new Exception("Nombre de la materia incorrecto");
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
require_once("../../../app/views/dashboard/administrador/academico/habilitar_materias_view2.php");
?>