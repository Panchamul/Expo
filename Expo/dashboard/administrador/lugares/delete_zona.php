<?php

require_once("../../../app/views/dashboard/administrador/templates/page.class.php");

Page::encabezadoAdmin("Menu de lugares");
$_SESSION['permiso']=1;  
$_SESSION['permisoborrar']=4;
require_once("../../../app/controllers/dashboard/administrador/account/permisos_controller.php");
require_once("../../../app/controllers/dashboard/administrador/lugares/delete_zonas_controller.php");

Page::footerAdmin();

?>             