<?php 
    try{
        require_once("../../../app/models/codigos.class.php");
        require_once("../../../app/controllers/dashboard/administrador/account/autenticacion_portodo.php"); 
        $codigos = new Codigo();
        if(isset($_GET['id'])){
            if($codigos->setId($_GET['id'])){
                if($codigos->readCodigos()){

                }
            }
            if(isset($_POST['btnEliminar'])){
                if($codigos->setId($_GET['id'])){
                    if($codigos->deleteCodigos()){
                        Page::showMessage(1, "Eliminado con exito", "index_codigos.php");
                    }else{
                        Page::showMessage(2, "No se creo la discapacidad", null);
                    }
                }else{
                    throw new Exception("No se envia el dato GET");
                }
            }
        }else{
            Page::showMessage(2, "Seleccione un elemento a modificar", "index_codigos.php");
        }
        require_once("../../../app/views/dashboard/administrador/templates/forms.php");
        Forms::delete4('Eliminar codigo', $codigos->getCodigo() );
    }catch(Exception $error){
        Page::showMessage(2, $error->getMessage(), null);
    }
    
?>