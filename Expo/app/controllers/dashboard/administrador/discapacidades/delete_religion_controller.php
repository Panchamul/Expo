<?php 
    try{
        require_once("../../../app/models/religiones.class.php");
        require_once("../../../app/controllers/dashboard/administrador/account/autenticacion_portodo.php"); 
        $religiones = new Religion();
        if(isset($_GET['id'])){
            if($religiones->setId($_GET['id'])){
                if($religiones->readReligiones()){

                }
            }
            if(isset($_POST['btnEliminar'])){
                if($religiones->setId($_GET['id'])){
                    if($religiones->deleteReligiones()){
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
        Forms::delete2('Eliminar religion', $religiones->getReligion() );
    }catch(Exception $error){
        Page::showMessage(2, $error->getMessage(), null);
    }
    
?>