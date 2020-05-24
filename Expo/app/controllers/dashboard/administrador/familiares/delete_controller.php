<?php 
    try{
        require_once("../../../app/models/familiares.class.php");
        require_once("../../../app/controllers/dashboard/administrador/account/autenticacion_portodo.php"); 
        $familiares = new Familiar();
        if(isset($_GET['id'])){
            if($familiares->setId($_GET['id'])){
                if($familiares->readFamiliares()){

                }
            }
            if(isset($_POST['btnEliminar'])){
                if($familiares->setId($_GET['id'])){
                    if($familiares->deleteFamiliares()){
                        Page::showMessage(1, "Eliminado con exito", "index.php");
                    }else{
                        Page::showMessage(2, "No se creo la religion", null);
                    }
                }else{
                    throw new Exception("No se envia el dato GET");
                }
            }
        }else{
            Page::showMessage(2, "Seleccione un elemento a eliminar", "index_familiares.php");
        }
        require_once("../../../app/views/dashboard/administrador/templates/forms.php");
        Forms::delete('Eliminar familiar', $familiares->getNombre() );
    }catch(Exception $error){
        Page::showMessage(2, $error->getMessage(), null);
    }
    
?>