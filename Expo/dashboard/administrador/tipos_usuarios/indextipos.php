<?php
require_once("../../../app/views/dashboard/administrador/templates/page.class.php");
Page::encabezadoAdmin("Inicio");
$_SESSION['permiso']=17;   
require_once("../../../app/controllers/dashboard/administrador/account/permisos_controller.php");
require_once("../../../app/controllers/dashboard/administrador/tipos_usuarios/index_controller.php");
Page::footerAdmin();
?>             