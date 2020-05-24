<?php 
require_once("../../app/views/public/templates/page.class.php");
Page::Encabezado("Enviar correo");
require_once("../../app/controllers/email_publicos/recuperacion_contrasenia.php");
Page::footer();

?>
