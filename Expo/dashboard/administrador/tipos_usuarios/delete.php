<?php

require_once("../../../app/views/dashboard/administrador/templates/page.class.php");

Page::encabezadoAdmin("Inicio");
$_SESSION['permiso']=17;  
$_SESSION['permisoborrar']=20;
require_once("../../../app/controllers/dashboard/administrador/account/permisos_controller.php");

require_once("../../../app/controllers/dashboard/administrador/tipos_usuarios/delete_controller.php");

Page::footerAdmin();

?>             