<?php

require_once("../../../app/views/dashboard/administrador/templates/page.class.php");

Page::encabezadoAdmin("eliminar");
$_SESSION['permiso']=1;  
$_SESSION['permisoborrar']=4;
require_once("../../../app/controllers/dashboard/administrador/account/permisos_controller.php");
require_once("../../../app/controllers/dashboard/administrador/discapacidades/delete_religion_controller.php");

Page::footerAdmin();

?>     