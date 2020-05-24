<?php 
    try{
        require_once("../../../app/models/familiares.class.php");
        require_once("../../../app/controllers/dashboard/administrador/account/autenticacion_portodo.php"); 
        $familiares = new Familiar();
        if(isset($_GET['id'])){
            if($familiares->setId($_GET['id'])){
                if($familiares->readFamiliaresNulas()){
                }
            }
            if(isset($_POST['btnHabilitar'])){
                if($familiares->setId($_GET['id'])){
                    if($familiares->habilitarFamiliares()){
                        Page::showMessage(1, "Habilitado con exito", "index.php");
                    }else{
                        Page::showMessage(2, "No se creo la discapacidad", null);
                    }
                }else{
                    throw new Exception("No se envia el dato GET");
                }
            }
        }else{
            Page::showMessage(2, "Seleccione un elemento a modificar", "index_familiares.php");
        }
        /*==================================================================
        INICIO DE LA VISTA GENERALIZANA
        ==================================================================)=*/
        require_once("../../../app/views/dashboard/administrador/templates/forms.php");
        Forms::habilitacion('Habilitacion de familiar', $familiares->getNombre(), 'btnHabilitar', 'index_familiares.php');
        /*==================================================================
        FIN DE LA VISTA GENERALIZANA
        ==================================================================)=*/
    }catch(Exception $error){
        Page::showMessage(2, $error->getMessage(), null);
    }
    
?>