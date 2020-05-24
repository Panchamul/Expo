<?php 
//ANIDO LA CLASE
require_once("../../../app/models/oferta.class.php");
require_once("../../../app/controllers/dashboard/administrador/account/autenticacion_portodo.php"); 
try{
    //ANIDO LA CLASE
    $oferta = new oferta;
    //SELECCIONAMOS EL BOTON
    if(isset($_POST['agregar'])){
        //VALIDAMOS LOS ESPACIOS DEL INPUT
        $_POST = $oferta->validateForm($_POST);
        //MANDAMOS LA INFORMACION DEL GENERO
        if($oferta->setMatricula($_POST['matricula'])){
            if($oferta->setMensualidad($_POST['mensualidad'])){
                if($oferta->setGrado($_POST['grados'])){
                    if($oferta->setDescripcion($_POST['textarea1'])){
            //MANDAMOS LA INFORMACION DEL ESTADO
            if($oferta->setEstado(0)){
                //CREAMOS LA FUNCION DE CREAR GENEROS
                if($oferta->createOferta()){
                    //MENSAJE DE EXITO AL REALIZAR LA OPERACIÓN
                    Page::showMessage(1, "Oferta academica agregada", "academico.php#taboferta");
                }
            }else{
                //MENSAJE POR SI NO SE MANDA EL ESTADO
                throw new Exception("No manda el dato del byte");
            }
            }
            else{
                throw new Exception("No se captura la descripcion");
                echo htmlspecialchars('<br>'.$_POST['textarea1']);
            }
         }
        else{
            //MENSAJE POR SI NO ENVIA UN NOMBRE CORRECTO
            throw new Exception("Grado incorrecto");
        }
        }
        else{
            //MENSAJE POR SI NO ENVIA UN NOMBRE CORRECTO
            throw new Exception("Mensualidad incorrecta");
        }
    }else{
            //MENSAJE POR SI NO ENVIA UN NOMBRE CORRECTO
            throw new Exception("Matricula incorrecta");
        }
    }
    //CAPTURO LA EXCEPCIN
}catch(Exception $error){
    //ENVIO EL MENSAJE DE EXCEPTION
    Page::showMessage(2, $error->getMessage(), null);
}
//ANIDO EL FORMULARIO
require_once("../../../app/views/dashboard/administrador/academico/agregar_ofertas_view.php");
?>