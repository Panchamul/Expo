<?php 
try{   
	require_once("../../../app/views/dashboard/administrador/reportes/index1.php"); 
}catch(Exception $error){
    Page::showMessage(2, $error->getMessage(), "../../../menu_admin.php");
 } 
 ?>