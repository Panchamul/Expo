<?php 
    try{
        require_once("../../../app/models/zonas.class.php");
        require_once("../../../app/controllers/dashboard/administrador/account/autenticacion_portodo.php"); 
        $zonas = new Zona();
        if(isset($_GET['id'])){
            if($zonas->setId($_GET['id'])){
                if($zonas->readZonasNulas()){
                }
            }
            if(isset($_POST['btnHabilitar'])){
                if($zonas->setId($_GET['id'])){
                    if($zonas->habilitarZonas()){
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
        Forms::habilitacion('Habilitacion de zona', $zonas->getZona(), 'btnHabilitar', 'menu.php');
        /*==================================================================
        FIN DE LA VISTA GENERALIZANA
        ==================================================================)=*/
    }catch(Exception $error){
        Page::showMessage(2, $error->getMessage(), null);
    }
    
?>