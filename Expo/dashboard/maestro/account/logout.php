<?php
require_once("../../../app/views/dashboard/maestro/templates/page.class.php");
Page::encabezadoMaestro("Cerrar sesión");
require_once("../../../app/controllers/dashboard/maestro/account/logout_controller.php");
Page::footerMaestro();
?>