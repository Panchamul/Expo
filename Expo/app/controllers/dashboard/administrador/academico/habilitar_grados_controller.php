<?php
//ANIDO LA CLASE 
require_once("../../../app/models/grados.class.php"); 
require_once("../../../app/controllers/dashboard/administrador/account/autenticacion_portodo.php"); 
try{
    $grado = new grados;
    if(isset($_POST['buscar'])){
        $_POST = $grado->validateForm($_POST);
        $data = $grado->searchGradosAdmin1($_POST['busqueda']);
        if($data){
            $row = count($data);
           Page::showMessage(4, "Se encontraron $row resultados", null);
        }else{
            Page::showMessage(4, "No se encontraron resultados", null);
            $data = $grado->getGradosAdmin1(); 
        }
    }else{
        $data = $grado->getGradosAdmin1(); 
    }
    if($data){
		require_once("../../../app/views/dashboard/administrador/academico/habilitar_grados.php");
    }
    else{
        Page::showMessage(4,"No hay grados dadas de baja","academico.php#tabgrados");
    } 
   
}catch(Exception $error){
   Page::showMessage(2, $error->getMessage(), "academico.php#tabgrados");
} 
?>