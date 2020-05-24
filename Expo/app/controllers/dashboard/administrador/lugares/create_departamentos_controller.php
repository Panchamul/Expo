<?php 
    try{
        require_once("../../../app/models/departamentos.class.php");
        require_once("../../../app/controllers/dashboard/administrador/account/autenticacion_portodo.php"); 
        $departamentos = new Departamento();
        if(isset($_POST['btnGuardar'])){
            if($departamentos->setDepartamento($_POST['txtDepartamento'])){
                if($departamentos->setEstado(0)){
                     if($departamentos->createDepartamentos()){
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
        require_once("../../../app/views/dashboard/administrador/lugares/create_departamentos_view.php");
    }catch(Exception $error){
        Page::showMessage(2, $error->getMessage(), null);
    }
?>