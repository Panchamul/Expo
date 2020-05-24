<?php

require_once("../../../app/views/dashboard/administrador/templates/page.class.php");

Page::encabezadoAdmin("Tipo prueba");
$_SESSION['permiso']=1;  
$_SESSION['permisoborrar']=4;
require_once("../../../app/controllers/dashboard/administrador/account/permisos_controller.php");
require_once("../../../app/controllers/dashboard/administrador/tipos/delete_tipo_prueba_controller.php");

Page::footerAdmin();

?>             