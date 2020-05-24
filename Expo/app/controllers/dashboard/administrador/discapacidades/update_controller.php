<?php 
    try{
        require_once("../../../app/models/discapacidades.class.php");
        require_once("../../../app/controllers/dashboard/administrador/account/autenticacion_portodo.php"); 
        $discapacidades = new Discapacidad();
        if(isset($_GET['id'])){
            if($discapacidades->setId($_GET['id'])){
                if($discapacidades->readDiscapacidades()){
                }else{
                     throw new Exception("No se envia ejecuta el READ");
                }
            }else{
                throw new Exception("No se envia el dato GET");
            }
            if(isset($_POST['btnEditar'])){
                if($discapacidades->setDiscapacidad($_POST['txtDiscapacidad'])){
                    if($discapacidades->updateDiscapacidades()){
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
        Forms::update1('Actualizar discapacidades', 'txtDiscapacidad', 
                        'Ingresa la discapacidad', $discapacidades->getDiscapacidad(),
                         'Discapacidad', 'btnEditar');
    }catch(Exception $error){
        Page::showMessage(2, $error->getMessage(), null);
    }
    
?>