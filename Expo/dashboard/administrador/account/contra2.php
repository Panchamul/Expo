<?php
//Llamamos a la clase "Page"
require_once("../../../app/views/dashboard/administrador/templates/page.class.php");
//Llamamos al encabezado
Page::EncabezadoAdmin("Menu");
//Llamamos el controlador de la contraseña
require_once("../../../app/controllers/dashboard/administrador/account/contra2.php");
//Llamamos al footer
Page::FooterAdmin();
?> 