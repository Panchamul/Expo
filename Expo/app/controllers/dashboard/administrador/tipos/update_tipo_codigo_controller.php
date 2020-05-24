<?php 
    try{
        require_once("../../../app/models/tipo_codigo.class.php");
        require_once("../../../app/controllers/dashboard/administrador/account/autenticacion_portodo.php"); 
        $tipoCodigos = new TipoCodigo();
        if(isset($_GET['id'])){
            if($tipoCodigos->setId($_GET['id'])){
                if($tipoCodigos->readTipoCodigo()){
                }else{
                     throw new Exception("No se envia ejecuta el READ");
                }
            }else{
                throw new Exception("No se envia el dato GET");
            }
            if(isset($_POST['btnEditar'])){
                if($tipoCodigos->setTipo($_POST['txtTipo'])){
                    if($tipoCodigos->updateTipoCodigo()){
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
        Forms::update1('Actualizar el tipo de codigo', 'txtTipo', 
                        'Ingresa el tipo del codigo', $tipoCodigos->getTipo(),
                         'Tipo codigo', 'btnEditar');
    }catch(Exception $error){
        Page::showMessage(2, $error->getMessage(), null);
    }
    
?>