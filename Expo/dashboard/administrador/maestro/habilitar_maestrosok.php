<?php

require_once("../../../app/views/dashboard/administrador/templates/page.class.php");

Page::encabezadoAdmin("Habilitar maestros");
$_SESSION['permiso']=9;  
$_SESSION['permisomodificar']=11;
require_once("../../../app/controllers/dashboard/administrador/account/permisos_controller.php");
require_once("../../../app/controllers/dashboard/administrador/maestro/habilitar_maestrosok_controller.php");

Page::FooterAdmin();

?> 