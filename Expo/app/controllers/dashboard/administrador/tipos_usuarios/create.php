<?php
require_once("../../../app/models/tipousuario.class.php");
require_once("../../../app/controllers/dashboard/administrador/account/autenticacion_portodo.php");
try{
    $tipo=new Tipousuario();
    if(isset($_POST['Agregar'])){
        if(empty($_POST['p']))
		{
			Page::showMessage(3, "Asignele permisos al usuario", "");
		}
		else { 
            if($tipo->setTipo($_POST['Nombre'])){ 
                if($tipo->createTipos()){
                    $permisos=$_POST["p"]; 
                        for ($i=0;$i<count($permisos);$i++)    
                        {  
                            if( $tipo->searchMaxTipos())
                           {
                            if($tipo->setIdPermiso($permisos[$i])){     
                                    if($tipo->CreateDetallePermisos())
                                    {
                                        Page::showMessage(1, "Tipo de usuario creado correctamente", "../tipos_usuarios/indextipos.php");
                                    }
                                     
                                }  
                           }   
                        }
                    }
                    else{
                        throw new Exception(Database::getException());
                    }  
                }
                else{
                    Page::showMessage(3, "Ingresa un nombre para el tipo de usuario", "");
                } 
            }   
    } 
}catch(Exception $error){
	Page::showMessage(2, $error->getMessage(), "");
}
require_once("../../../app/views/dashboard/administrador/tipos_usuarios/create.php");
?>