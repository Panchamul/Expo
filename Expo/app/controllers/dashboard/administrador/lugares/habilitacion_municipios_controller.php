<?php 
    try{
        require_once("../../../app/models/municipios.class.php");
        require_once("../../../app/controllers/dashboard/administrador/account/autenticacion_portodo.php"); 
        $municipios = new Municipio();
        if(isset($_GET['id'])){
            if($municipios->setId($_GET['id'])){
                if($municipios->readMunicipiosNulas()){
                }
            }
            if(isset($_POST['btnHabilitar'])){
                if($municipios->setId($_GET['id'])){
                    if($municipios->habilitarMunicipios()){
                        Page::showMessage(1, "Habilitado con exito", "menu.php");
                    }else{
                        Page::showMessage(2, "No se habilitar", null);
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
        Forms::habilitacion('Habilitacion de zona', $municipios->getMunicipio(), 'btnHabilitar', 'menu.php');
        /*==================================================================
        FIN DE LA VISTA GENERALIZANA
        ==================================================================)=*/
    }catch(Exception $error){
        Page::showMessage(2, $error->getMessage(), null);
    }
    
?>