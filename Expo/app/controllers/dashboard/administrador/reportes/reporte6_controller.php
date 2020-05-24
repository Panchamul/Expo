<?php 
try{  
    require_once("../../../app/models/codigos.class.php");
    $codigo=new Codigo();
}
catch(Exception $error){
    Page::showMessage(2, $error->getMessage(), null);
} 
require_once("../../../app/views/dashboard/administrador/reportes/reporte6.php");
?>