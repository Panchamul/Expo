<?php 
    try{
        require_once("../../../app/models/tipo_codigo.class.php");
        require_once("../../../app/controllers/dashboard/administrador/account/autenticacion_portodo.php"); 
        $tipoCodigos = new TipoCodigo();
        if(isset($_GET['id'])){
            if($tipoCodigos->setId($_GET['id'])){
                if($tipoCodigos->readTipoCodigoNulas()){
                }
            }
            if(isset($_POST['btnHabilitar'])){
                if($tipoCodigos->setId($_GET['id'])){
                    if($tipoCodigos->habilitarTipoCodigo()){
                        Page::showMessage(1, "Habilitado con exito", "index1.php");
                    }else{
                        Page::showMessage(2, "No se habilito el tipo del codigo", null);
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
        Forms::habilitacion('Hebilitacion de tipos de codigo', $tipoCodigos->getTipo(), 'btnHabilitar', 'index1.php');
        /*==================================================================
        FIN DE LA VISTA GENERALIZANA
        ==================================================================)=*/
    }catch(Exception $error){
        Page::showMessage(2, $error->getMessage(), null);
    }
    
?>