<?php
//LAMAMOS A LA CLASE Y AL CONTROLADOR A UTILIZAR 
require_once("../../../app/models/perfiles.class.php");
require_once("../../../app/controllers/dashboard/administrador/account/autenticacion_portodo.php");
try{
     $hora= date ("h:i:s");
    $fecha= date ("Y-n-j");
    $fecha_exacta = $fecha." ".$hora;
    if(isset($_POST['cambiar'])){
        $usuario = new Perfiles;
        $_POST = $usuario->validateForm($_POST);
        if($usuario->setId($_SESSION['id'])){
            if($_POST['clave_actual_1'] == $_POST['clave_actual_2']){
                if($usuario->setClave($_POST['clave_actual_1'])){
                    if($usuario->checkPassword1()){
                        if($_POST['clave_nueva_1'] == $_POST['clave_nueva_2']){
                            if($usuario->setClave($_POST['clave_nueva_1'])){
                                if($_POST['clave_actual_1']!=$_POST['clave_nueva_1']){
                                    if($usuario->readUsuario1()){
                                        if($usuario->getUsuario() != $_POST['clave_nueva_1']){
                                            if($usuario->validar_clave($_POST['clave_nueva_1'])){
                                                if($usuario->setFechaCambio($fecha_exacta)){
                                if($usuario->changePassword1()){
                                    Page::showMessage(1, "Clave cambiada", "../admin/menu_admin.php");
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
                            }
                            else{
                                throw new Exception("La clave actual y la nueva deben ser diferentes");
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
            Page::showMessage(2, "Usuario incorrecto", "../admin/menu_admin.php");
        }
    }
}catch(Exception $error){
    Page::showMessage(2, $error->getMessage(), null);
}
//LLAMAMOS A LA VISTA
require_once("../../../app/views/dashboard/administrador/account/contrasenia_view.php");
?>