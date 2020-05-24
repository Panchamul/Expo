<?php 
    try{
        require_once("../../../app/models/tipo_prueba.class.php");
        require_once("../../../app/controllers/dashboard/administrador/account/autenticacion_portodo.php"); 
        $tipoPruebas = new TipoPrueba();
        if(isset($_GET['id'])){
            if($tipoPruebas->setId($_GET['id'])){
                if($tipoPruebas->readTipoPrueba()){

                }
            }
            if(isset($_POST['btnEliminar'])){
                if($tipoPruebas->setId($_GET['id'])){
                    if($tipoPruebas->deleteTipoPrueba()){
                        Page::showMessage(1, "Eliminado con exito", "index1.php");
                    }else{
                        Page::showMessage(2, "No se elimino la prueba", null);
                    }
                }else{
                    throw new Exception("No se envia el dato GET");
                }
            }
        }else{
            Page::showMessage(2, "Seleccione un elemento a eliminar", "index1.php");
        }
        require_once("../../../app/views/dashboard/administrador/templates/forms.php");
        Forms::delete2('Eliminar tipo de prueba', $tipoPruebas->getTipo() );
    }catch(Exception $error){
        Page::showMessage(2, $error->getMessage(), null);
    }
    
?>