<?php

require_once("../../../app/views/dashboard/administrador/templates/page.class.php");

Page::encabezadoAdmin("Menu Principal");
require_once("../../../app/controllers/dashboard/administrador/account/permisos_controller.php");
require_once("../../../app/controllers/dashboard/administrador/account/autenticacion_portodo.php");
require_once("../../../app/views/dashboard/administrador/admin/menu_admin.php");

Page::FooterAdmin();

?>  