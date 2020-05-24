<?php 
require '../../libraries/PHPMailer-master/src/PHPMailer.php';
require '../../libraries/PHPMailer-master/src/SMTP.php';
require '../../libraries/PHPMailer-master/src/Exception.php';
require '../../libraries/PHPMailer-master/src/OAuth.php';
require_once("../../app/views/public/templates/page.class.php");
Page::encabezado("Enviar correo");
require_once("../../app/controllers/email_publicos/correo.php");
Page::footer();
?>