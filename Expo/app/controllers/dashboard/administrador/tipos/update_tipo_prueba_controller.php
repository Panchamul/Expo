<?php 
    try{
        require_once("../../../app/models/tipo_prueba.class.php");
        require_once("../../../app/controllers/dashboard/administrador/account/autenticacion_portodo.php"); 
        $tipoPruebas = new TipoPrueba();
        if(isset($_GET['id'])){
            if($tipoPruebas->setId($_GET['id'])){
                if($tipoPruebas->readTipoPrueba()){
                }else{
                     throw new Exception("No se envia ejecuta el READ");
                }
            }else{
                throw new Exception("No se envia el dato GET");
            }
            if(isset($_POST['btnEditar'])){
                if($tipoPruebas->setTipo($_POST['txtTipo'])){
                    if($tipoPruebas->updateTipoPrueba()){
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
        Forms::update1('Actualizar el tipo de prueba', 'txtTipo', 
                        'Ingresa el tipo de prueba', $tipoPruebas->getTipo(),
                         'Tipo prueba', 'btnEditar');
    }catch(Exception $error){
        Page::showMessage(2, $error->getMessage(), null);
    }
    
?>