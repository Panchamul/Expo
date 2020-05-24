<?php 
    try{
        require_once("../../../app/models/tipo_familiar.class.php");
        require_once("../../../app/controllers/dashboard/administrador/account/autenticacion_portodo.php"); 
        $tipoFamiliares = new TipoFamiliar();
        if(isset($_GET['id'])){
            if($tipoFamiliares->setId($_GET['id'])){
                if($tipoFamiliares->readTipoFamiliarNulas()){
                }
            }
            if(isset($_POST['btnHabilitar'])){
                if($tipoFamiliares->setId($_GET['id'])){
                    if($tipoFamiliares->habilitarTipoFamiliar()){
                        Page::showMessage(1, "Habilitado con exito", "index1.php");
                    }else{
                        Page::showMessage(2, "No se habilito el tipo de familiar", null);
                    }
                }else{
                    throw new Exception("No se envia el dato GET");
                }
            }
        }else{
            Page::showMessage(2, "Seleccione un elemento a modificar", "index1.php");
        }
        /*==================================================================
        INICIO DE LA VISTA GENERALIZANA
        ==================================================================)=*/
        require_once("../../../app/views/dashboard/administrador/templates/forms.php");
        Forms::habilitacion('Habilitacion de tipos de familiar', $tipoFamiliares->getTipo(), 'btnHabilitar', 'index1.php');
        /*==================================================================
        FIN DE LA VISTA GENERALIZANA
        ==================================================================)=*/
    }catch(Exception $error){
        Page::showMessage(2, $error->getMessage(), null);
    }
    
?>