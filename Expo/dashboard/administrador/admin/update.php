<?php

require_once("../../../app/views/dashboard/administrador/templates/page.class.php");

Page::encabezadoAdmin("codigos");
$_SESSION['permiso']=23;   
$_SESSION['permisomodificar']=25;
require_once("../../../app/controllers/dashboard/administrador/account/permisos_controller.php");
require_once("../../../app/controllers/dashboard/administrador/admin/update.php");

Page::footerAdmin();

?>             