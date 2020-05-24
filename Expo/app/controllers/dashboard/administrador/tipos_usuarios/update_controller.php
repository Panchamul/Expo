<?php
require_once("../../../app/models/tipousuario.class.php");

require_once("../../../app/controllers/dashboard/administrador/account/autenticacion_portodo.php");
try{
	if(isset($_GET['id'])){ 
	$tipo = new Tipousuario; 
	if($tipo->setId($_GET['id'])){ 
		if($tipo->readTipo()){
			$tipo->setIdTipo($_GET['id']);
			$data = $tipo->getTipor();
			$datar = $tipo->getTipos();
		if(isset($_POST['Modificar'])){ 
		if(empty($_POST['p']))
		{
			Page::showMessage(3, "Asignele permisos al usuario", "");
		}
		else { 
			$permisos=$_POST["p"]; 
			
			$tipo->setId($_GET['id']);
			$permisosaplicados=$tipo->getTipos1();
				foreach($permisosaplicados as $row){
			 	for($j=0;$j<count($permisos);$j++){
					 if($row['permis']==$permisos[$j]){
						 
					 }
					 else{
						if($tipo->setTipo($row['detalle'])){
							if($tipo->deletePermisos1()){

							}
						 }
					 }
				}
			}
			for ($i=0;$i<count($permisos);$i++)    
			{    
				if($tipo->setIdPermiso($permisos[$i])){ 
					if($tipo->setIdTipo($_GET['id'])){ 
					if($tipo->checkPermiso()) {     
					} 
					else{  
						if($tipo->CreateDetallePermisos())
						{
							Page::showMessage(1, "Permisos actualizados correctamente", "../tipos_usuarios/indextipos.php");
						}
						} 
					} 
				}
			}
			if($tipo->setIdTipo($_GET['id'])){ 
				if($tipo->setTipo($_POST['Nombre'])){
					if($tipo->updateTipo())
					{
						Page::showMessage(1, "Permisos actualizados correctamente", "../tipos_usuarios/indextipos.php");
					}
					else{
						throw new Exception(Database::getException());
					}
				} 
			}
		}
		} 
}else{
	Page::showMessage(3, "Seleccione un tipo de usuario", "../tipos_usuarios/indextipos.php");
}
}
}
}catch(Exception $error){
    Page::showMessage(2, $error->getMessage(), null);
}
require_once("../../../app/views/dashboard/administrador/tipos_usuarios/update.php");
?>