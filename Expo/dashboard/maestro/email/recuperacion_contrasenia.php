<?php 
require '../../../libraries/PHPMailer-master/src/PHPMailer.php';
require '../../../libraries/PHPMailer-master/src/SMTP.php';
require '../../../libraries/PHPMailer-master/src/Exception.php';
require '../../../libraries/PHPMailer-master/src/OAuth.php';
require_once("../../../app/views/dashboard/maestro/templates/page.class.php");
Page::encabezadoMaestro("Enviar correo");
require_once("../../../app/controllers/email/correo.php");
Page::footerMaestro();

?>