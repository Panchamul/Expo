<?php 
    try{
        require_once("../../../app/models/religiones.class.php");
        require_once("../../../app/controllers/dashboard/administrador/account/autenticacion_portodo.php"); 
        $religiones = new Religion();
        if(isset($_GET['id'])){
            if($religiones->setId($_GET['id'])){
                if($religiones->readReligionesNulas()){
                }
            }
            if(isset($_POST['btnHabilitar'])){
                if($religiones->setId($_GET['id'])){
                    if($religiones->habilitarReligiones()){
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
        require_once("../../../app/views/dashboard/administrador/discapacidades/habilitacion_religion_view.php");
    }catch(Exception $error){
        Page::showMessage(2, $error->getMessage(), null);
    }
    
?>