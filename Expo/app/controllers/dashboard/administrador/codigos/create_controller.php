<?php 
    try{
        require_once("../../../app/models/codigos.class.php");
        require_once("../../../app/controllers/dashboard/administrador/account/autenticacion_portodo.php"); 
        $codigos = new Codigo();
        if(isset($_POST['btnGuardar'])){
            if($codigos->setCodigo($_POST['txtCodigo'])){
                if($codigos->setEstado(0)){
                    if($codigos->setIdCodigo($_POST['tipo'])){
                        if($codigos->createCodigos()){
                            Page::showMessage(1, "Creado con exito", "index_codigos.php");
                        }else{
                            Page::showMessage(2, "No se creo el tipo de codigo familiar", null);
                        }  
                    }else{
                        throw new Exception("No se selecciono el tipo de codigo");
                   }
                }else{
                    throw new Exception("No se envia de forma correcta el dato estado");
                }
            }else{
                throw new Exception("No se envia de forma correcta");
            }
        }
        require_once("../../../app/views/dashboard/administrador/codigos/create_view.php");
    }catch(Exception $error){
        Page::showMessage(2, $error->getMessage(), null);
    }
    
?>