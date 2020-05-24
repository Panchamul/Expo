<?php 
    try{
        require_once("../../../app/models/estado_familiar.class.php");
        require_once("../../../app/controllers/dashboard/administrador/account/autenticacion_portodo.php"); 
        $estados = new Estado();
        if(isset($_POST['btnGuardar'])){
            if($estados->setEstadoFamiliar($_POST['txtEstado'])){
                if($estados->setEstado(0)){
                    if($estados->createEstadoFamiliar()){
                        Page::showMessage(1, "Creado con exito", "index1.php");
                    }else{
                        Page::showMessage(2, "No se creo el estado familiar", null);
                    }  
                }else{
                    throw new Exception("No se envia de forma correcta el dato estado");
                }
            }else{
                throw new Exception("No se envia de forma correcta");
            }
        }
        require_once("../../../app/views/dashboard/administrador/discapacidades/create_estado_view.php");
    }catch(Exception $error){
        Page::showMessage(2, $error->getMessage(), null);
    }
    
?>