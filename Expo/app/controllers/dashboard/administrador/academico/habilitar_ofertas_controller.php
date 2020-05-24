<?php
//ANIDO LA CLASE
require_once("../../../app/models/oferta.class.php"); 
require_once("../../../app/controllers/dashboard/administrador/account/autenticacion_portodo.php"); 
try{
    $ofertas = new Oferta;
    if(isset($_POST['buscar'])){
        $_POST = $ofertas->validateForm($_POST);
        $data = $ofertas->searchOfertasAdmin1($_POST['busqueda']);
        if($data){
            $row = count($data);
           Page::showMessage(4, "Se encontraron $row resuldatos", null);
        }else{
            Page::showMessage(4, "No se encontraron resultados", null);
            $data = $ofertas->getOfertasAdmin1(); 
        }
    }else{
        $data = $ofertas->getOfertasAdmin1(); 
    }
    if($data){
		require_once("../../../app/views/dashboard/administrador/academico/habilitar_ofertas_view.php");
    }
    else{
        Page::showMessage(4,"No hay ofertas dadas de baja que se puedan habilitar","academico.php#taboferta");
    } 
   
}catch(Exception $error){
   Page::showMessage(2, $error->getMessage(), "academico");
} 
?>