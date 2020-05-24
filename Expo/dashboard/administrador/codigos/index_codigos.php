<?php
//ANIDO LA CLASE 
require_once("../../../app/views/dashboard/administrador/templates/page.class.php");
//LLAMAMOS AL ENCABEZADO
Page::encabezadoAdmin("codigos");
$_SESSION['permiso']=13;   
require_once("../../../app/controllers/dashboard/administrador/account/permisos_controller.php");
require_once("../../../app/controllers/dashboard/administrador/codigos/index_codigos_controller.php");

Page::footerAdmin();

?>             