<?php 
    try{
        require_once("../../../app/models/zonas.class.php");
        require_once("../../../app/controllers/dashboard/administrador/account/autenticacion_portodo.php"); 
        $zonas = new Zona();
        if(isset($_GET['id'])){
            if($zonas->setId($_GET['id'])){
                if($zonas->readZonas()){

                }
            }
            if(isset($_POST['btnEliminar'])){
                if($zonas->setId($_GET['id'])){
                    if($zonas->deleteZonas()){
                        Page::showMessage(1, "Eliminado con exito", "index.php");
                    }else{
                        Page::showMessage(2, "No se elimino", null);
                    }
                }else{
                    throw new Exception("No se envia el dato GET");
                }
            }
        }else{
            Page::showMessage(2, "Seleccione un elemento a eliminar", "index_familiares.php");
        }
        require_once("../../../app/views/dashboard/administrador/templates/forms.php");
        Forms::delete1('Eliminar zonas', $zonas->getZona());
    }catch(Exception $error){
        Page::showMessage(2, $error->getMessage(), null);
    }
    
?>