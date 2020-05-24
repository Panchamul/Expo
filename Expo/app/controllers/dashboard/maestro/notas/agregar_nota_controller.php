<?php 
//ANIDO LA CLASE
require_once("../../../app/models/notas.class.php");
require_once("../../../app/controllers/dashboard/maestro/account/autenticacion_portodo.php");
try{
    //Anido la clase
    $perfiles = new notas;
    //SELECCIONO EL BOTON 
    if($perfiles->setId($_GET['evalu'])){
        if(isset($_POST['agregar'])){
            //VALIDO LOS ESPACIOS DEL INPUT
            $_POST = $perfiles->validateForm($_POST);
            //MANDO LA INFORMACION DEL GENERO
            if($perfiles->setPerfil($_GET['id'])){
                if($perfiles->setTipo($_GET['evalu'])){
                    if($perfiles->setMateria($_POST['nombre'])){ 
                         if($_POST['nombre']>=0 && $_POST['nombre']<=10){
                            if(!$perfiles->CheckRepetido2()){
                                //HAGO LA FUNCION DE CREAR GENEROS
                            if($perfiles->createNotas()){
                                //MENSAJE DE EXITO
                                Page::showMessage(1, "Nota agregada correctamente", "seccion.php?id=$_SESSION[devol]");
                            }
                                else{
                                    //MENSAJE POR SI NO SE MANDA EL ESTADO
                                    throw new Exception("No manda el dato del byte");
                                }
                            }
                            else{
                                throw new Exception("No puedes ingresar una nota para ese perfil pues ya existe una");
                            }    
                        }
                        else{
                    throw new Exception("ingresa una nota valida");
                } 
                }
                else{
                    throw new Exception("No se manda el curso");
                } 
            }else{
                //MENSAJE POR SI NO ENVIA UN NOMBRE CORRECTO
                throw new Exception("tipo incorrecto");
            } 
        }
    }
    } 
    //CAPTURO LA EXCEPCIN
}catch(Exception $error){
    //ENVIO EL MENSAJE DE EXCEPTION
    Page::showMessage(2, $error->getMessage(), null);
}
//ANIDO EL FORMULARIO
require_once("../../../app/views/dashboard/maestro/notas/agregar_notas_view.php");
?>