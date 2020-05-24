<?php 
require_once("../../../app/views/dashboard/administrador/templates/page.class.php");
Page::encabezadoAdmin("Enviar correo");
require_once("../../../app/controllers/email_admin/recuperacion_contrasenia.php");
Page::footerAdmin();

?>
