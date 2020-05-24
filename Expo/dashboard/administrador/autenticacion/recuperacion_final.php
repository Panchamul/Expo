<?php
//ANIDO LA CLASE 
require_once("../../../app/views/dashboard/administrador/templates/page.class.php");
Page::encabezadoSimple("Enviar correo");
//SE LLAMA AL CONTROLADOR 
require_once("../../../app/controllers/autenticacion_admin/recuperacion_final_controller.php");
Page::footerAdmin();


?>
