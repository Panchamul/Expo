<?php 
    try{
        require_once("../../../app/models/tipo_prueba.class.php");
        require_once("../../../app/controllers/dashboard/administrador/account/autenticacion_portodo.php"); 
        $tipoPruebas = new TipoPrueba();
        if(isset($_POST['btnGuardar'])){
            if($tipoPruebas->setTipo($_POST['txtTipo'])){
                if($tipoPruebas->setEstado(0)){
                    if($tipoPruebas->createTipoPrueba()){
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
        Forms::create('Crear tipo prueba', 'txtTipo', 'Crear tipo de prueba', 'Crear tipo prueba', 'index1.php', 'btnGuardar');
    }catch(Exception $error){
        Page::showMessage(2, $error->getMessage(), null);
    }
    
?>