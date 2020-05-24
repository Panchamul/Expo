<?php

require_once("../../../app/views/dashboard/administrador/templates/page.class.php");

Page::encabezadoAdmin("Agregar maestros");
$_SESSION['permiso']=9;  
$_SESSION['permisocrear']=10;
require_once("../../../app/controllers/dashboard/administrador/account/permisos_controller.php");
require_once("../../../app/controllers/dashboard/administrador/maestro/agregar_maestro_controller.php");

Page::FooterAdmin();

?> 