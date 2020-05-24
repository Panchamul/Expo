<?php

require_once("../../../app/views/dashboard/administrador/templates/page.class.php");

Page::encabezadoAdmin("Eliminar");
$_SESSION['permiso']=13;  
$_SESSION['permisoborrar']=16;
require_once("../../../app/controllers/dashboard/administrador/account/permisos_controller.php");
require_once("../../../app/controllers/dashboard/administrador/codigos/delete_controller.php");

Page::footerAdmin();

?>             