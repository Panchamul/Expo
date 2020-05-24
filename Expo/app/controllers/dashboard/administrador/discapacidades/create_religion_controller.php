<?php 
    try{
        require_once("../../../app/models/religiones.class.php");
        require_once("../../../app/controllers/dashboard/administrador/account/autenticacion_portodo.php"); 
        $religiones = new Religion();
        if(isset($_POST['btnGuardar'])){
            if($religiones->setReligion($_POST['txtReligion'])){
                if($religiones->setEstado(0)){
                    if($religiones->createReligiones()){
                        Page::showMessage(1, "Creado con exito", "index1.php");
                    }else{
                        Page::showMessage(2, "No se creo la religion", null);
                    }  
                }else{
                    throw new Exception("No se envia de forma correcta el dato estado");
                }
            }else{
                throw new Exception("No se envia de forma correcta");
            }
        }
        require_once("../../../app/views/dashboard/administrador/discapacidades/create_religion_view.php");
    }catch(Exception $error){
        Page::showMessage(2, $error->getMessage(), null);
    }
    
?>