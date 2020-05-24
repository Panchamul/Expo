<?php
//ANIDO LA CLASE
require_once("../../../app/views/dashboard/administrador/templates/page.class.php");
//LLAMAMOS AL ENCABEZADO 
Page::encabezadoAdmin("actualizar");
$_SESSION['permiso']=13;  
$_SESSION['permisomodificar']=15;
require_once("../../../app/controllers/dashboard/administrador/account/permisos_controller.php");
require_once("../../../app/controllers/dashboard/administrador/codigos/update_controller.php");

Page::footerAdmin();

?>             