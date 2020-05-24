<?php 
    try{
        require_once("../../../app/models/zonas.class.php");
        require_once("../../../app/controllers/dashboard/administrador/account/autenticacion_portodo.php"); 
        $zonas = new Zona();
        if(isset($_POST['btnGuardar'])){
            if($zonas->setZona($_POST['txtZona'])){
                if($zonas->setEstado(0)){
                     if($zonas->createZonas()){
                        Page::showMessage(1, "Creado con exito", "menu.php");
                    }else{
                        Page::showMessage(2, "No se creo ", null);
                    }  
                }else{
                    throw new Exception("No se envia de forma correcta el dato estado");
                }
            }else{
                throw new Exception("No se envia de forma correcta el nombre");
            }
        }
        require_once("../../../app/views/dashboard/administrador/lugares/create_zonas_view.php");
    }catch(Exception $error){
        Page::showMessage(2, $error->getMessage(), null);
    }
?>