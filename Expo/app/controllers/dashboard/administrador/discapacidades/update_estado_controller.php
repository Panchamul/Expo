<?php 
    try{
        require_once("../../../app/models/estado_familiar.class.php");
        require_once("../../../app/controllers/dashboard/administrador/account/autenticacion_portodo.php"); 
        $estados = new Estado();
        if(isset($_GET['id'])){
            if($estados->setId($_GET['id'])){
                if($estados->readEstadoFamiliar()){
                }else{
                     throw new Exception("No se envia ejecuta el READ");
                }
            }else{
                throw new Exception("No se envia el dato GET");
            }
            if(isset($_POST['btnEditar'])){
                if($estados->setEstadoFamiliar($_POST['txtReligion'])){
                    if($estados->updateEstadoFamiliar()){
                        Page::showMessage(1, "Editado con exito", "index1.php");
                    }else{
                        Page::showMessage(2, "No se creo la discapacidad", null);
                    }  
                }else{
                    throw new Exception("No se envia de forma correcta");
                }
            }
        }else{
            Page::showMessage(2, "Seleccione un elemento a modificar", "index1.php");
        }
        require_once("../../../app/views/dashboard/administrador/templates/forms.php");
        Forms::update1('Actualizar el estado familiar', 'txtReligion', 
                        'Ingresa el estado familiar', $estados->getEstadoFamiliar(),
                         'Estado familiar', 'btnEditar');
    }catch(Exception $error){
        Page::showMessage(2, $error->getMessage(), null);
    }
    
?>