<?php 
require_once("../../app/views/public/templates/page.class.php");
Page::EncabezadoSimple("Enviar correo");
require_once("../../app/controllers/autenticacion_alumno/recuperacion_contrasenia.php");
Page::footer();

?>
