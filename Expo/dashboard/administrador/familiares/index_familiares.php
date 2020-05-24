<?php

require_once("../../../app/views/dashboard/administrador/templates/page.class.php");

Page::encabezadoAdmin("inicio");
$_SESSION['permiso']=5;   
require_once("../../../app/controllers/dashboard/administrador/account/permisos_controller.php");
require_once("../../../app/controllers/dashboard/administrador/familiares/index_controller.php");

Page::footerAdmin();

?>             