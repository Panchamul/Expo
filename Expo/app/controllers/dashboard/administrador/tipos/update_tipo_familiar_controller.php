<?php 
    try{
        require_once("../../../app/models/tipo_familiar.class.php");
        require_once("../../../app/controllers/dashboard/administrador/account/autenticacion_portodo.php"); 
        $tipoFamiliares = new TipoFamiliar();
        if(isset($_GET['id'])){
            if($tipoFamiliares->setId($_GET['id'])){
                if($tipoFamiliares->readTipoFamiliar()){
                }else{
                     throw new Exception("No se envia ejecuta el READ");
                }
            }else{
                throw new Exception("No se envia el dato GET");
            }
            if(isset($_POST['btnEditar'])){
                if($tipoFamiliares->setTipo($_POST['txtTipo'])){
                    if($tipoFamiliares->updateTipoFamiliar()){
                        Page::showMessage(1, "Editado con exito", "index1.php");
                    }else{
                        Page::showMessage(2, "No se creo el tipo de codigo", null);
                    }  
                }else{
                    throw new Exception("No se envia de forma correcta");
                }
            }
        }else{
            Page::showMessage(2, "Seleccione un elemento a modificar", "index1.php");
        }
        require_once("../../../app/views/dashboard/administrador/templates/forms.php");
        Forms::update1('Actualizar el tipo de familiar', 'txtTipo', 
                        'Ingresa el tipo de familiar', $tipoFamiliares->getTipo(),
                         'Tipo familiar', 'btnEditar');
    }catch(Exception $error){
        Page::showMessage(2, $error->getMessage(), null);
    }
    
?>