<?php 
require_once("../../app/views/public/templates/page.class.php");
Page::EncabezadoSimple("Recuperacion de contraseña");
require_once("../../app/controllers/autenticacion_alumno/recuperacion_final_controller.php");
Page::footer();

?>
