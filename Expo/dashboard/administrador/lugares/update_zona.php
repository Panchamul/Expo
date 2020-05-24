<?php

require_once("../../../app/views/dashboard/administrador/templates/page.class.php");

Page::encabezadoAdmin("Menu de lugares");
$_SESSION['permiso']=1;  
$_SESSION['permisomodificar']=2;
require_once("../../../app/controllers/dashboard/administrador/account/permisos_controller.php");
require_once("../../../app/controllers/dashboard/administrador/lugares/update_zona_controller.php");

Page::footerAdmin();

?>             