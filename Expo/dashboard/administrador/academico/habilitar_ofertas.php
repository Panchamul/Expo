<?php
//Llamamos a la clase "Page"
require_once("../../../app/views/dashboard/administrador/templates/page.class.php");
//Llamamos al encabezdo 
Page::encabezadoAdmin("Habilitar Ofertas");
$_SESSION['permiso']=1;  
$_SESSION['permisomodificar']=2;
require_once("../../../app/controllers/dashboard/administrador/account/permisos_controller.php");
require_once("../../../app/controllers/dashboard/administrador/academico/habilitar_ofertas_controller.php");
//Llamamos al footer
Page::FooterAdmin();

?> 