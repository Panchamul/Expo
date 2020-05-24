<?php 
    try{
        require_once("../../../app/models/religiones.class.php");
        require_once("../../../app/controllers/dashboard/administrador/account/autenticacion_portodo.php"); 
        $religiones = new Religion();
        if(isset($_GET['id'])){
            if($religiones->setId($_GET['id'])){
                if($religiones->readReligiones()){
                }else{
                     throw new Exception("No se envia ejecuta el READ");
                }
            }else{
                throw new Exception("No se envia el dato GET");
            }
            if(isset($_POST['btnEditar'])){
                if($religiones->setReligion($_POST['txtReligion'])){
                    if($religiones->updateReligiones()){
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
        Forms::update1('Actualizar la religion', 'txtReligion', 
                        'Ingresa la religión', $religiones->getReligion(),
                         'Religión', 'btnEditar');
    }catch(Exception $error){
        Page::showMessage(2, $error->getMessage(), null);
    }
    
?>