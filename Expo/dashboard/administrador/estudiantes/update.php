<?php

require_once("../../../app/views/dashboard/administrador/templates/page.class.php");

Page::encabezadoAdmin("Actualizar");
$_SESSION['permiso']=5;  
$_SESSION['permisomodificar']=7;
require_once("../../../app/controllers/dashboard/administrador/account/permisos_controller.php");
require_once("../../../app/controllers/dashboard/administrador/estudiantes/update_controller.php");

Page::footerAdmin();

?>             