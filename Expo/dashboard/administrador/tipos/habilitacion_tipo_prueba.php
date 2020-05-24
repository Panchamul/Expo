<?php

require_once("../../../app/views/dashboard/administrador/templates/page.class.php");

Page::encabezadoAdmin("habilitar");
$_SESSION['permiso']=1;  
$_SESSION['permisomodificar']=4;
require_once("../../../app/controllers/dashboard/administrador/account/permisos_controller.php");
require_once("../../../app/controllers/dashboard/administrador/tipos/habilitacion_tipo_prueba_controller.php");

Page::footerAdmin();

?>             