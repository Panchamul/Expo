<?php
require_once("../../../app/views/dashboard/administrador/templates/page.class.php");
Page::encabezadoAdmin("Cerrar sesión");
require_once("../../../app/controllers/dashboard/administrador/account/logout_controller.php");
Page::footerAdmin();
?>