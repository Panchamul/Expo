<?php
//Llmamos a la clase "Page"
require_once("../../../app/views/dashboard/administrador/templates/page.class.php");
//Llamamos al encabezado
Page::encabezadoAdmin("Academico");
$_SESSION['permiso']=1;   
require_once("../../../app/controllers/dashboard/administrador/account/permisos_controller.php");
require_once("../../../app/controllers/dashboard/administrador/academico/academico_controller.php");
//Llamamos al footer
Page::FooterAdmin();

?> 