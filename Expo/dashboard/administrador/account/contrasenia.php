<?php
//Llamamos a la clase "Page"
require_once("../../../app/views/dashboard/administrador/templates/page.class.php");
//Llamamos al encabezado
Page::encabezadoAdmin("Cambiar contrasenia");
//Llamamos         
require_once("../../../app/controllers/dashboard/administrador/account/contrasenia.php");
Page::footerAdmin();
?>