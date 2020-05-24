<?php 
    try{
        require_once("../../../app/models/tipo_familiar.class.php");
        require_once("../../../app/controllers/dashboard/administrador/account/autenticacion_portodo.php"); 
        $tipoFamiliares = new TipoFamiliar();
        if(isset($_GET['id'])){
            if($tipoFamiliares->setId($_GET['id'])){
                if($tipoFamiliares->readTipoFamiliar()){

                }
            }
            if(isset($_POST['btnEliminar'])){
                if($tipoFamiliares->setId($_GET['id'])){
                    if($tipoFamiliares->deleteTipoFamiliar()){
                        Page::showMessage(1, "Eliminado con exito", "index1.php");
                    }else{
                        Page::showMessage(2, "No se elimino el tipo de familiar", null);
                    }
                }else{
                    throw new Exception("No se envia el dato GET");
                }
            }
        }else{
            Page::showMessage(2, "Seleccione un elemento a eliminar", "index1.php");
        }
        require_once("../../../app/views/dashboard/administrador/templates/forms.php");
        Forms::delete2('Eliminar tipo de familiar', $tipoFamiliares->getTipo() );
    }catch(Exception $error){
        Page::showMessage(2, $error->getMessage(), null);
    }
    
?>