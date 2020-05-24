<?php

require_once("../../../app/views/dashboard/administrador/templates/page.class.php");

Page::encabezadoAdmin("Preguntas");
$_SESSION['permiso']=1;  
$_SESSION['permisocrear']=3;
require_once("../../../app/controllers/dashboard/administrador/account/permisos_controller.php");
require_once("../../../app/controllers/dashboard/administrador/tipos/create_preguntas_frecuentes_controller.php");

Page::footerAdmin();

?>             