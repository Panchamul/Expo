<?php 
require '../../../libraries/PHPMailer-master/src/PHPMailer.php';
require '../../../libraries/PHPMailer-master/src/SMTP.php';
require '../../../libraries/PHPMailer-master/src/Exception.php';
require '../../../libraries/PHPMailer-master/src/OAuth.php';
require_once("../../../app/views/dashboard/administrador/templates/page.class.php");
Page::encabezadoAdmin("Enviar correo");
require_once("../../../app/controllers/email_admin/correo.php");
Page::footerAdmin();

?>