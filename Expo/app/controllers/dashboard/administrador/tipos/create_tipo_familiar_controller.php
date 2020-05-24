<?php 
    try{
        require_once("../../../app/models/tipo_familiar.class.php");
        require_once("../../../app/controllers/dashboard/administrador/account/autenticacion_portodo.php"); 
        $tipoFamiliares = new TipoFamiliar();
        if(isset($_POST['btnGuardar'])){
            if($tipoFamiliares->setTipo($_POST['txtTipo'])){
                if($tipoFamiliares->setEstado(0)){
                    if($tipoFamiliares->createTipoFamiliar()){
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
        Forms::create('Crear tipo familiar', 'txtTipo', 'Crear tipo de familiar', 'Crear tipo familiar', 'index1.php', 'btnGuardar');
    }catch(Exception $error){
        Page::showMessage(2, $error->getMessage(), null);
    }
    
?>