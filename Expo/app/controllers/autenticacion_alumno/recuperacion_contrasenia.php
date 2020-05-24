<?php
//Llamamos a la clase "Correo"
require_once("../../app/models/correo.class.php");
//Llamamos al random para generar el codigo de autenticación 
require_once("../../app/helpers/random.php");
try{
    $correos = new Correo();
    $codigo = new CodigoRecuperacion();
    if(isset($_POST['enviar'])){
        if($_SESSION['correobasepublico'] == $_POST['correo']){
            if($correos->setCorreo($_POST['correo'])){
                if($correos->readCorreoUsuariosPublic($_POST['correo'])){
                    $count = $correos->getCount();
                    if($count != 0){
                        $aleatorio = $codigo->Aleatorio();
                        if($correos->setCodigo($aleatorio)){
                            if($correos->setCorreo($_POST['correo'])){
                                if($correos->updateCodigoPublic()){
                                    $_SESSION['correologinalumno'] = $_POST['correo'];
                                     Page::showMessage(1, "Revisa tu correo resiviras un codigo para recuperar la contraseña", "recuperacion_contrasenia.php");
                                }else{
                                     Page::showMessage(2, "Error al crear", null);
                                }
                            }else{
                                throw new Exception("Ingrese un correo que ya tenga una sesion en la aplicación");
                            }
                        }else{
                             throw new Exception("Error en set aleatorio");
                        }
                    }else{
                        throw new Exception("Ingrese un correo que ya tenga una sesion en la aplicación");
                    }
                }else{
                    throw new Exception("Problemas al ejecutar el READ");
                }
            }else{
                throw new Exception("Ingrese un correo valido");
            }
        }else{
            throw new Exception("Este no es el correo del usuario anterior");
        }
    }
    
}catch(Exception $error){
    Page::showMessage(2, $error->getMessage(), null);
}
//Llamamos a la vista "Correo_view.php"
require_once("../../app/views/public/autenticacion/correo_view.php");
?>