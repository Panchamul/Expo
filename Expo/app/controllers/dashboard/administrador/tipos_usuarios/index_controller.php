<?php
require_once("../../../app/models/tipousuario.class.php");
require_once("../../../app/controllers/dashboard/administrador/account/autenticacion_portodo.php");
try{
	$tipo = new Tipousuario;
	if(isset($_POST['buscar'])){
		$_POST = $tipo->validateForm($_POST);
		$data = $tipo->searchTipos($_POST['busqueda']);
		if($data){
			$rows = count($data);
			Page::showMessage(4, "Se encontraron $rows resultados", null);
		}else{
			Page::showMessage(4, "No se encontraron resultados", null);
			$data = $tipo->getTipousuarios();
		}
	}else{
		$data = $tipo->getTipousuarios();
	}
	if($data){
        require_once("../../../app/views/dashboard/administrador/tipos_usuarios/indextipos.php");   
	}else{
		Page::showMessage(3, "No hay tipos de usuarios disponibles", "../tipos_usuarios/create.php");
	}
}catch(Exception $error){
	Page::showMessage(2, $error->getMessage(), "");
}
?>