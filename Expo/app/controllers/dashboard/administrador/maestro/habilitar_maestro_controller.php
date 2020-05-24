<?php
require_once("../../../app/models/maestros.class.php"); 
require_once("../../../app/controllers/dashboard/administrador/account/autenticacion_portodo.php"); 
try{
    $maestro = new maestros;
    if(isset($_POST['buscar'])){
        $_POST = $maestro->validateForm($_POST);
        $data = $maestro->searchMaestrosAdmin1($_POST['busqueda']);
        if($data){
            $row = count($data);
           Page::showMessage(4, "Se encontraron $row resultados", null);
        }else{
            Page::showMessage(4, "No se encontraron resultados", null);
            $data = $maestro->getMaestrosAdmin2(); 
        }
    }else{
        $data = $maestro->getMaestrosAdmin2(); 
    }
    if($data){
		require_once("../../../app/views/dashboard/administrador/maestro/habilitar_maestros.php");
    }
    else{
        Page::showMessage(4,"No hay maestros dados de baja","ver_maestro.php");
    } 
   
}catch(Exception $error){
   Page::showMessage(2, $error->getMessage(), "ver_maestro.php");
} 
?>