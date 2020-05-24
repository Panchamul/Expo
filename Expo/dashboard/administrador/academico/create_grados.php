<?php

require_once("../../../app/views/dashboard/administrador/templates/page.class.php");

Page::encabezadoAdmin("Agregar Grados");
$_SESSION['permiso']=1;  
$_SESSION['permisocrear']=3;
require_once("../../../app/controllers/dashboard/administrador/account/permisos_controller.php");
require_once("../../../app/controllers/dashboard/administrador/academico/agregargrados_controller.php");

Page::FooterAdmin();

?> 