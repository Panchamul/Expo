<?php
require_once("../../../app/models/tipousuario.class.php");
require_once("../../../app/controllers/dashboard/administrador/account/autenticacion_portodo.php");
try{
	if(isset($_GET['id'])){
		$tipo = new Tipousuario;
		if($tipo->setId($_GET['id'])){
			if($tipo->readTipo()){
				if(isset($_POST['eliminar'])){
					if($tipo->deletePermisos()){
                        if($tipo->deleteTipo()){
                            Page::showMessage(1, "Tipo de usuario eliminado correctamente", "../tipos_usuarios/indextipos.php");
                        }
                        else{
						throw new Exception(Database::getException());
					} 
					}else{
						throw new Exception(Database::getException());
					}
				}
			}else{
				throw new Exception("tipo de usuario inexistente");
			}	
		}else{
			throw new Exception("tipo de usuario incorrecto");
		}
	}else{
		Page::showMessage(3, "Seleccione un tipo de usuario", "../tipos_usuarios/indextipos.php");
	}
}catch (Exception $error){
	Page::showMessage(2, $error->getMessage(), "../tipos_usuarios/indextipos.php");
}
require_once("../../../app/views/dashboard/administrador/tipos_usuarios/delete.php");
?>