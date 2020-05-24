<?php 
    try{
        require_once("../../../app/models/discapacidades.class.php");
        require_once("../../../app/controllers/dashboard/administrador/account/autenticacion_portodo.php"); 
        $discapacidades = new Discapacidad();
        if(isset($_GET['id'])){
            if($discapacidades->setId($_GET['id'])){
                if($discapacidades->readDiscapacidadesNulas()){
                }
            }
            if(isset($_POST['btnHabilitar'])){
                if($discapacidades->setId($_GET['id'])){
                    if($discapacidades->habilitarDiscapacidades()){
                        Page::showMessage(1, "Habilitado con exito", "index1.php");
                    }else{
                        Page::showMessage(2, "No se creo la discapacidad", null);
                    }
                }else{
                    throw new Exception("No se envia el dato GET");
                }
            }
        }else{
            Page::showMessage(2, "Seleccione un elemento a modificar", "index1.php");
        }
        require_once("../../../app/views/dashboard/administrador/discapacidades/habilitacion_view.php");
    }catch(Exception $error){
        Page::showMessage(2, $error->getMessage(), null);
    }
    
?>