<?php
//Llamamos a la clase "Page"
require_once("../../../app/views/dashboard/administrador/templates/page.class.php");
//Aquí mandamos a llamar al encabezado
Page::encabezadoAdmin("Crear ofertas academicas");
$_SESSION['permiso']=1;  
$_SESSION['permisocrear']=3;
require_once("../../../app/controllers/dashboard/administrador/account/permisos_controller.php");
require_once("../../../app/controllers/dashboard/administrador/academico/agregarofertas_controller.php");
//Llamamos al footer
Page::FooterAdmin();

?> 