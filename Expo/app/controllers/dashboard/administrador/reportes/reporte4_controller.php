<?php 
try{
    require_once("../../../app/models/cursos.class.php");
    $curso=new cursos();
}
catch(Exception $error){
    Page::showMessage(2, $error->getMessage(), null);
} 
require_once("../../../app/views/dashboard/administrador/reportes/reporte4.php");
?>