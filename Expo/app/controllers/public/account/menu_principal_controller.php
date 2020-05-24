<?php

try{

//ANIDO EL FORMULARIO

require_once("../../app/views/public/account/menu_principal.php");
require_once("../../app/controllers/public/account/autenticacion_portodo.php");

if(isset($_POST['seleccionar'])){

    $_SESSION['periodo']=$_POST['periodos'];

    echo"<script language='javascript'>window.location='../notas/index_notas.php?periodo=$_SESSION[periodo]'</script>;";

}

}

catch (Exception $error){

	Page::showMessage(2, $error->getMessage(), "");

} 

?>