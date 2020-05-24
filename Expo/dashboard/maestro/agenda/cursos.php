<?php
require_once("../../../app/views/dashboard/maestro/templates/page.class.php");
Page::encabezadoMaestro("cursos");
require_once("../../../app/controllers/dashboard/maestro/agenda/cursos_controller.php");
Page::footerMaestro();
?>             