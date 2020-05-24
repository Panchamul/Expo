<?php 
try{
    require_once("../../app/models/oferta.class.php");  
    $ofertas = new oferta(); 
    $data = $ofertas->getOfertasAdmin();  
    if($data){
		require_once("../../app/views/public/inicio/oferta_academica.php");
    }
    else{
        Page::showMessage(4,"No hay materias registradas","index.php");
    }  
}
catch(Exception $error){
    Page::showMessage(2, $error->getMessage(), "../../menu_admin.php");
 } 
 ?>
