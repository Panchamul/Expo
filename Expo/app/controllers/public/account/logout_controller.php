<?php

require_once("../../app/models/logins.class.php");
$object = new Logins;
if($object->setId($_SESSION['id_session2'])){
    if($object->AutenticacionRandom2(0)){
            unset($_SESSION['id_session2']);
            unset($_SESSION['id2']);
            unset($_SESSION['usuario2']);
            unset($_SESSION['nombre2']);
            unset($_SESSION['apellido2']);
            unset($_SESSION['autenticacion2']);
            Page::showMessage(1, "Sesion cerrada correctamente", "../account/login.php");    
    }else{
        Page::showMessage(2, "Ocurrió un problema", "index.php");
    }
}else{

} 

?> 