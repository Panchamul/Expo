<?php

require_once("../../../app/views/dashboard/administrador/templates/page.class.php");

Page::encabezadoAdmin("Ver maestros");
$_SESSION['permiso']=9;   
require_once("../../../app/controllers/dashboard/administrador/account/permisos_controller.php");
require_once("../../../app/controllers/dashboard/administrador/maestro/ver_maestro_controller.php");

Page::FooterAdmin();

?> 