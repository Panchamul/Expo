<?php

require_once("../../../app/views/dashboard/administrador/templates/page.class.php");

Page::encabezadoAdmin("Codigos");
$_SESSION['permiso']=1;  
$_SESSION['permisocrear']=3;
require_once("../../../app/controllers/dashboard/administrador/account/permisos_controller.php");
require_once("../../../app/controllers/dashboard/administrador/tipos/create_tipo_codigo_controller.php");

Page::footerAdmin();

?>             