<?php 
    try{
        require_once("../../../app/models/tipo_codigo.class.php");
        require_once("../../../app/controllers/dashboard/administrador/account/autenticacion_portodo.php"); 
        $tipoCodigos = new TipoCodigo();
        if(isset($_GET['id'])){
            if($tipoCodigos->setId($_GET['id'])){
                if($tipoCodigos->readTipoCodigo()){

                }
            }
            if(isset($_POST['btnEliminar'])){
                if($tipoCodigos->setId($_GET['id'])){
                    if($tipoCodigos->deleteTipoCodigo()){
                        Page::showMessage(1, "Eliminado con exito", "index1.php");
                    }else{
                        Page::showMessage(2, "No se creo la religion", null);
                    }
                }else{
                    throw new Exception("No se envia el dato GET");
                }
            }
        }else{
            Page::showMessage(2, "Seleccione un elemento a eliminar", "index1.php");
        }
        require_once("../../../app/views/dashboard/administrador/templates/forms.php");
        Forms::delete2('Eliminar tipo de codigo', $tipoCodigos->getTipo() );
    }catch(Exception $error){
        Page::showMessage(2, $error->getMessage(), null);
    }
    
?>