<?php 
//LLAMAMOS A LAS LIBRERIAS
require '../../../libraries/PHPMailer-master/src/PHPMailer.php';
require '../../../libraries/PHPMailer-master/src/SMTP.php';
require '../../../libraries/PHPMailer-master/src/Exception.php';
require '../../../libraries/PHPMailer-master/src/OAuth.php';
require_once("../../../app/views/dashboard/administrador/templates/page.class.php");
Page::encabezadoSimple("Enviar correo");
//LLAMAMOS AL CONTROLADOR 
require_once("../../../app/controllers/autenticacion_admin/correo.php");
Page::footerAdmin();

?>