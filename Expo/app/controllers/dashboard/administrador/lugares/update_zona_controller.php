<?php 
    try{
        require_once("../../../app/models/zonas.class.php");
        require_once("../../../app/controllers/dashboard/administrador/account/autenticacion_portodo.php"); 
        $zonas = new Zona();
        if(isset($_GET['id'])){
            if($zonas->setId($_GET['id'])){
                if($zonas->readZonas()){

                }else{
                     Page::showMessage(2, "No se READ ", null);
                }
            }else{
                 Page::showMessage(2, "No se envio el id ", null);
            }
            if(isset($_POST['btnEditar'])){
                if($zonas->setZona($_POST['txtZona'])){
                    if($zonas->setEstado(0)){
                        if($zonas->updateZonas()){
                            Page::showMessage(1, "Modificar con exito", "menu.php");
                        }else{
                            Page::showMessage(2, "No se modifico ", null);
                        }  
                    }else{
                        throw new Exception("No se envia de forma correcta el dato estado");
                    }
                }else{
                    throw new Exception("No se envia de forma correcta el nombre");
                }
            }   
        }else{
            Page::showMessage(2, "Seleccione una zona", "menu.php");
        }
        require_once("../../../app/views/dashboard/administrador/lugares/update_zonas_controller.php");
    }catch(Exception $error){
        Page::showMessage(2, $error->getMessage(), null);
    }
?>