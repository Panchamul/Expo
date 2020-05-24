<?php 
    try{
        require_once("../../../app/models/discapacidades.class.php");
        require_once("../../../app/controllers/dashboard/administrador/account/autenticacion_portodo.php"); 
        $discapacidades = new Discapacidad();
        if(isset($_POST['btnGuardar'])){
            if($discapacidades->setDiscapacidad($_POST['txtDiscapacidad'])){
                if($discapacidades->setEstado(0)){
                    if($discapacidades->createDiscapacidades()){
                        Page::showMessage(1, "Creado con exito", "index1.php");
                    }else{
                        Page::showMessage(2, "No se creo la discapacidad", null);
                    }  
                }else{
                    throw new Exception("No se envia de forma correcta el dato estado");
                }
            }else{
                throw new Exception("No se envia de forma correcta");
            }
        }
        require_once("../../../app/views/dashboard/administrador/discapacidades/create_view.php");
    }catch(Exception $error){
        Page::showMessage(2, $error->getMessage(), null);
    }
    
?>