<?php 
try{ 
}
catch(Exception $error){
    Page::showMessage(2, $error->getMessage(), null);
} 
require_once("../../../app/views/dashboard/administrador/reportes/reporte7.php");
?>