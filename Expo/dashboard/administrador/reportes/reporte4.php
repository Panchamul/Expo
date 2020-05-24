<?php

require_once("../../../app/views/dashboard/administrador/templates/page.class.php");

Page::encabezadoAdmin("Reportes");
$_SESSION['permiso']=22;   
require_once("../../../app/controllers/dashboard/administrador/account/permisos_controller.php");
require_once("../../../app/controllers/dashboard/administrador/reportes/reporte4_controller.php");

Page::FooterAdmin();

?> 