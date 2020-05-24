<?php 
//Llamamos a la clase y el controlador 
require_once("../../../app/models/grados.class.php");
require_once("../../../app/controllers/dashboard/administrador/account/autenticacion_portodo.php"); 
try{
    //ANIDO LA CLASE
    $grados = new grados;
    //SELECCIONO EL BOTON
    if(isset($_POST['agregar'])){
        //VALIDAMOS LOS ESPACIOS DEL INPUT
        $_POST = $grados->validateForm($_POST);
        //SE MANDA LA INFORMACION DEL GENERO
        if($grados->setGrado($_POST['grado'])){
            //SE MANDA LA INFORMACION DEL ESTADO
            if($grados->setEstado(0)){
                //REALIZAMOS LA FUNCIÓN PARA CREAR LOS GENEROS 
                if($grados->createGrados()){
                    //SE MUESTRA EL SIGUIENTE MENSAJE CUANDO LA OPERACIÓN FUE REALIZADA CON EXITO 
                    Page::showMessage(1, "Grado agregado correctamente", "academico.php#tabgrados");
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
require_once("../../../app/views/dashboard/administrador/academico/agregar_grados_view.php");
?>