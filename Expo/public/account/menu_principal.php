<?php
require_once("../../app/views/public/templates/page.class.php");
Page::encabezado("Menu principal");
require_once("../../app/controllers/public/account/menu_principal_controller.php");
Page::footer();
?> 