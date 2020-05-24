
<?php
require_once("../../../app/models/logins.class.php");
$object = new Logins;
if($object->setId($_SESSION['id_session1'])){
    if($object->AutenticacionRandom1(0)){
            unset($_SESSION['id_session1']);
            unset($_SESSION['id1']);
            unset($_SESSION['usuario1']);
            unset($_SESSION['autenticacion1']); 
            unset($_SESSION['nombre1']);
            unset($_SESSION['apellido1']); 
            Page::showMessage(1, "Sesion cerrada correctamente", "../account/index.php");    
    }else{
        Page::showMessage(2, "Ocurrió un problema", "index.php");
    }
}else{

}
?>