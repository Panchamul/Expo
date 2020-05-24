<?php
//Llamamos a la clase "Page"
require_once("../../../app/views/dashboard/administrador/templates/page.class.php");
//Llamamos al encabezado
Page::encabezadoAdmin("Secciones");
$_SESSION['permiso']=1;   
require_once("../../../app/controllers/dashboard/administrador/account/permisos_controller.php");
require_once("../../../app/controllers/dashboard/administrador/academico/detallesecciones_controller.php");
//Llamamos al footer
Page::FooterAdmin();

?> 