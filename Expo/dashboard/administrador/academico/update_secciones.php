<?php
//Llamamos a la "Page"
require_once("../../../app/views/dashboard/administrador/templates/page.class.php");
//Llamamos al encabezado
Page::encabezadoAdmin("Actualizar Secciones");
$_SESSION['permiso']=1;  
$_SESSION['permisomodificar']=2;
require_once("../../../app/controllers/dashboard/administrador/account/permisos_controller.php");
require_once("../../../app/controllers/dashboard/administrador/academico/actualizarsecciones_controller.php");
//Llamamos al footer 
Page::FooterAdmin();

?> 