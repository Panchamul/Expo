<?php

require_once("../../../app/views/dashboard/administrador/templates/page.class.php");

Page::encabezadoAdmin("Crear");
$_SESSION['permiso']=5;  
$_SESSION['permisocrear']=6;
require_once("../../../app/controllers/dashboard/administrador/account/permisos_controller.php");
require_once("../../../app/controllers/dashboard/administrador/familiares/create_controller.php");

Page::footerAdmin();

?>             