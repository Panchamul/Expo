<?php

require_once("../../../app/views/dashboard/administrador/templates/page.class.php");

Page::encabezadoAdmin("Inicio");
$_SESSION['permiso']=21;   
require_once("../../../app/controllers/dashboard/administrador/account/permisos_controller.php");
require_once("../../../app/views/dashboard/administrador/estadisticas/grafica0.php");

Page::footerAdmin();

?>             