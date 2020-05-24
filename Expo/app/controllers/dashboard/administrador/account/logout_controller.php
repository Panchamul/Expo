<?php
//LLAMAMOS A LA CLASE LOGINS 
require_once("../../../app/models/logins.class.php");
$object = new Logins;
if($object->setId($_SESSION['id'])){//AQUÍ OBTENEMOS LOS DATOS 
    if($object->AutenticacionRandom(0)){
            unset($_SESSION['id_session']);
            unset($_SESSION['id']);
            unset($_SESSION['usuario']);
            unset($_SESSION['nombre']);
            unset($_SESSION['apellido']);
            unset($_SESSION['autenticacion']);
            Page::showMessage(1, "Sesion cerrada correctamente", "index.php");    
    }else{
        Page::showMessage(2, "Ocurrió un problema", "index.php");
    }
}else{

}
?> 