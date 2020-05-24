<?php

require_once("../../../app/views/dashboard/administrador/templates/page.class.php");

Page::encabezadoAdmin("Eliminar");
$_SESSION['permiso']=5;  
$_SESSION['permisoborrar']=8;
require_once("../../../app/controllers/dashboard/administrador/account/permisos_controller.php");
require_once("../../../app/controllers/dashboard/administrador/estudiantes/delete_controller.php");

Page::footerAdmin();

?>             