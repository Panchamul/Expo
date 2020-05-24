<?php
require_once("../../app/views/public/templates/page.class.php");
Page::encabezado("Cerrar sesión");
require_once("../../app/controllers/public/account/logout_controller.php");
Page::footer();
?>