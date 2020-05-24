<?php

require_once("../../../app/views/dashboard/administrador/templates/page.class.php");

Page::encabezadoAdmin("Menu de lugares");
$_SESSION['permiso']=1;   
require_once("../../../app/controllers/dashboard/administrador/account/permisos_controller.php");
require_once("../../../app/controllers/dashboard/administrador/lugares/menu_controller.php");

Page::footerAdmin();

?>             