<?php
//Llamamos a la clase "Page"
require_once("../../../app/views/dashboard/administrador/templates/page.class.php");
//Llamamos al encabezado 
Page::encabezadoAdmin("Actualizar Grados");
$_SESSION['permiso']=1;  
$_SESSION['permisomodificar']=2;
require_once("../../../app/controllers/dashboard/administrador/account/permisos_controller.php");
require_once("../../../app/controllers/dashboard/administrador/academico/actualizargrados_controller.php");
//Llamamos al footer
Page::FooterAdmin();

?> 