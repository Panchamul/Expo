<?php
require_once("../../app/views/public/templates/page.class.php");
Page::Encabezado("agenda");
require_once("../../app/controllers/public/agenda/agenda_controller.php");
Page::footer();
?>             