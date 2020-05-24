<?php
require_once("../../../app/models/logins.class.php"); 
require_once("../../../app/controllers/dashboard/maestro/account/autenticacion_portodo.php");
try{
    $hora= date ("h:i:s");
    $fecha= date ("Y-n-j");
    $fecha_exacta = $fecha." ".$hora;
    if(isset($_POST['registrar'])){
        $admin = new Logins;
        $_POST = $admin->validateForm($_POST);
        if($admin->setId($_SESSION['id1'])){
            if($_POST['contrasenia1'] == $_POST['contrasenia2']){
                if($admin->setClave($_POST['contrasenia1'])){
                    if($admin->checkPasswordMaestro()){
                        if($_POST['contrasenia3'] == $_POST['contrasenia4']){
                            if($admin->setClave($_POST['contrasenia4'])){
                                if($admin->readUsuario1()){
                                    if($admin->getUsuario() != $_POST['contrasenia4']){
                                        if($admin->validar_clave($_POST['contrasenia4'])){
                                            if($admin->setFechaCambio($fecha_exacta)){
                                                if($admin->changePassword1()){
                                                    $_SESSION['autenticacion1']=0;
                                                    Page::showMessage(1, "Clave cambiada, inicia sesion!", "../account/index.php");
                                                }else{
                                                    throw new Exception(Database::getException());
                                                }
                                            }else{
                                                throw new Exception("Error con el serFecha");
                                            }
                                        }else{
                                            throw new Exception("La contraseña tiene que tener un minimo de 6 caracteres, un maximo de 16, con valor numerico, mayuscula y minuscula");
                                       }
                                    }else{
                                        throw new Exception("No se puede tener su contraseña igual al usuario");
                                    }
                                }else{
                                    throw new Exception("Problema con el readUsuario");
                                }
                            }else{
                                throw new Exception("Clave nueva menor a 6 caracteres");
                            }
                        }else{
                            throw new Exception("Claves nuevas diferentes");
                        }
                    }else{
                        throw new Exception("Clave actual incorrecta");
                    }
                }else{
                    throw new Exception("Clave actual menor a 6 caracteres");
                }
            }else{
                throw new Exception("Claves actuales diferentes");
            }
        }else{
            Page::showMessage(2, "Usuario incorrecto", "index.php");
        }
    }
}catch(Exception $error){
    Page::showMessage(2, $error->getMessage(), null);
}
require_once("../../../app/views/dashboard/maestro/account/contra2.php");
?>