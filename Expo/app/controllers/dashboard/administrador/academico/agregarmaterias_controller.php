<?php 
//ANIDO LA CLASE
require_once("../../../app/models/materias.class.php");
require_once("../../../app/controllers/dashboard/administrador/account/autenticacion_portodo.php"); 
try{
    //Anido la clase
    $materia = new materias;
    //SELECCIONAMOS EL BOTON
    if(isset($_POST['agregar'])){
        //VALIDAMOS LOS ESPACIOS DEL INPUT
        $_POST = $materia->validateForm($_POST);
        //MANDAMOS LA INFORMACION DEL GENERO
        if($materia->setMateria($_POST['materia'])){
            //MANDAMOS LA INFORMACION DEL ESTADO
            if($materia->setEstado(0)){
                //REALIZAMOS LA FUNCION DE CREAR GENEROS
                if($materia->createMateria()){
                    //MENSAJE DE EXITO
                    Page::showMessage(1, "Materia agregada", "academico.php");
                }
            }else{
                //MENSAJE POR SI NO SE MANDA EL ESTADO
                throw new Exception("No manda el dato del byte");
            }
        }else{
            //MENSAJE POR SI NO ENVIA UN NOMBRE CORRECTO
            throw new Exception("Nombre incorrecto");
        }
    }
    //CAPTURO LA EXCEPCIN
}catch(Exception $error){
    //ENVIO EL MENSAJE DE EXCEPTION
    Page::showMessage(2, $error->getMessage(), null);
}
//ANIDO EL FORMULARIO
require_once("../../../app/views/dashboard/administrador/academico/agregar_materias_view.php");
?>