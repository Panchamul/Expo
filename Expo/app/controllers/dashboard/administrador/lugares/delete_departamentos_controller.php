<?php 
    try{
        require_once("../../../app/models/departamentos.class.php");
        require_once("../../../app/controllers/dashboard/administrador/account/autenticacion_portodo.php"); 
        $departamentos = new Departamento();
        if(isset($_GET['id'])){
            if($departamentos->setId($_GET['id'])){
                if($departamentos->readDepartamentos()){

                }
            }
            if(isset($_POST['btnEliminar'])){
                if($departamentos->setId($_GET['id'])){
                    if($departamentos->deleteDepartamentos()){
                        Page::showMessage(1, "Eliminado con exito", "menu.php");
                    }else{
                        Page::showMessage(2, "No se elimino", null);
                    }
                }else{
                    throw new Exception("No se envia el dato GET");
                }
            }
        }else{
            Page::showMessage(2, "Seleccione un elemento a eliminar", "menu.php");
        }
        require_once("../../../app/views/dashboard/administrador/templates/forms.php");
        Forms::delete1('Eliminar departamento', $departamentos->getDepartamento());
    }catch(Exception $error){
        Page::showMessage(2, $error->getMessage(), null);
    }
    
?>