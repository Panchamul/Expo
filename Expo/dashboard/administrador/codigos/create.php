<?php

require_once("../../../app/views/dashboard/administrador/templates/page.class.php");

Page::encabezadoAdmin("crear");
$_SESSION['permiso']=13;  
$_SESSION['permisocrear']=14;
require_once("../../../app/controllers/dashboard/administrador/account/permisos_controller.php");
require_once("../../../app/controllers/dashboard/administrador/codigos/create_controller.php");

Page::footerAdmin();

?>             