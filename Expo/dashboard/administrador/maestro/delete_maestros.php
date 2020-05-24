<?php

require_once("../../../app/views/dashboard/administrador/templates/page.class.php");

Page::encabezadoAdmin("Eliminar maestros");
$_SESSION['permiso']=9;  
$_SESSION['permisoborrar']=12;
require_once("../../../app/controllers/dashboard/administrador/account/permisos_controller.php");
require_once("../../../app/controllers/dashboard/administrador/maestro/eliminar_maestro_controller.php");

Page::FooterAdmin();

?> 