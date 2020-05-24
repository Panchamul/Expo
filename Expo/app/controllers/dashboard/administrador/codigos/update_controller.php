<?php
    try{
        require_once("../../../app/models/codigos.class.php");
        require_once("../../../app/controllers/dashboard/administrador/account/autenticacion_portodo.php"); 
        $codigos = new Codigo();
        if(isset($_GET['id'])){
            if($codigos->setId($_GET['id'])){
                if($codigos->readCodigos()){
                }else{
                     throw new Exception("No se envia ejecuta el READ");
                }
            }else{
                throw new Exception("No se envia el dato GET");
            }
            /*========================================================================
            ESTO SUCEDE SI APRETAS EL BOTON DE EDITAR
            ==========================================================================*/
            if(isset($_POST['btnEditar'])){
                if($codigos->setCodigo($_POST['txtCodigo'])){
                    if($codigos->setIdCodigo($_POST['tipo'])){
                        if($codigos->updateCodigos()){
                            Page::showMessage(1, "Editado con exito", "index_codigos.php");
                        }else{
                            Page::showMessage(2, "No se creo la discapacidad", null);
                        }  
                    }else{
                        throw new Exception("No se envia de forma correcta");
                    }
                }else{
                    throw new Exception("No se envia de forma correcta");
                }
            }
            require_once("../../../app/views/dashboard/administrador/codigos/update_view.php");
        }else{
            Page::showMessage(2, "Seleccione un elemento a modificar", "index_codigos.php");
        }
        
    }catch(Exception $error){
        Page::showMessage(2, $error->getMessage(), null);
    }

    
?>