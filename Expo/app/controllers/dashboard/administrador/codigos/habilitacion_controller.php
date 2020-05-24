<?php 
    try{
        require_once("../../../app/models/codigos.class.php");
        require_once("../../../app/controllers/dashboard/administrador/account/autenticacion_portodo.php"); 
        $codigos = new Codigo();
        if(isset($_GET['id'])){
            if($codigos->setId($_GET['id'])){
                if($codigos->readCodigosNulas()){
                }
            }
            if(isset($_POST['btnHabilitar'])){
                if($codigos->setId($_GET['id'])){
                    if($codigos->habilitarCodigos()){
                        Page::showMessage(1, "Habilitado con exito", "index_codigos.php");
                    }else{
                        Page::showMessage(2, "No se creo la discapacidad", null);
                    }
                }else{
                    throw new Exception("No se envia el dato GET");
                }
            }
        }else{
            Page::showMessage(2, "Seleccione un elemento a modificar", "index_codigos.php");
        }
        /*==================================================================
        INICIO DE LA VISTA GENERALIZANA
        ==================================================================)=*/
        require_once("../../../app/views/dashboard/administrador/templates/forms.php");
        Forms::habilitacion('Habilitacion de codigos', $codigos->getCodigo(), 'btnHabilitar', 'index_codigos.php');
        /*==================================================================
        FIN DE LA VISTA GENERALIZANA
        ==================================================================)=*/
    }catch(Exception $error){
        Page::showMessage(2, $error->getMessage(), null);
    }
    
?>