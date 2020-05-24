<?php 
    try{
        require_once("../../../app/models/tipo_codigo.class.php");
        require_once("../../../app/controllers/dashboard/administrador/account/autenticacion_portodo.php"); 
        $tipoCodigos = new TipoCodigo();
        if(isset($_POST['btnGuardar'])){
            if($tipoCodigos->setTipo($_POST['txtTipo'])){
                if($tipoCodigos->setEstado(0)){
                    if($tipoCodigos->createTipoCodigo()){
                        Page::showMessage(1, "Creado con exito", "index1.php");
                    }else{
                        Page::showMessage(2, "No se creo el tipo de codigo familiar", null);
                    }  
                }else{
                    throw new Exception("No se envia de forma correcta el dato estado");
                }
            }else{
                throw new Exception("No se envia de forma correcta");
            }
        }
        require_once("../../../app/views/dashboard/administrador/templates/forms.php");
        Forms::create('Crear tipo codigo', 'txtTipo', 'Crear tipo de codigo', 'Crear tipo de codigo', 'index1.php', 'btnGuardar');
    }catch(Exception $error){
        Page::showMessage(2, $error->getMessage(), null);
    }
    
?>