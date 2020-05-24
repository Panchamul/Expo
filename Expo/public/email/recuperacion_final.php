<?php 
require_once("../../app/views/public/templates/page.class.php");
Page::encabezado("Recuperacion de contraseña");
require_once("../../app/controllers/email_publicos/recuperacion_final_controller.php");
Page::footer();

?>
