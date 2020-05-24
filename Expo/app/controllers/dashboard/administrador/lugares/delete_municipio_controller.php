<?php 
    try{
        require_once("../../../app/models/municipios.class.php");
        require_once("../../../app/controllers/dashboard/administrador/account/autenticacion_portodo.php"); 
        $municipios = new Municipio();
        if(isset($_GET['id'])){
            if($municipios->setId($_GET['id'])){
                if($municipios->readMunicipios()){

                }
            }
            if(isset($_POST['btnEliminar'])){
                if($municipios->setId($_GET['id'])){
                    if($municipios->deleteMunicipios()){
                        Page::showMessage(1, "Eliminado con exito", "menu.php");
                    }else{
                        Page::showMessage(2, "No se elimino", null);
                    }
                }else{
                    throw new Exception("No se envia el dato GET");
                }
            }
        }else{
            Page::showMessage(2, "Seleccione un elemento a eliminar", "index_municipio.php");
        }
        require_once("../../../app/views/dashboard/administrador/templates/forms.php");
        Forms::deletebueno('Eliminar municipio', $municipios->getMunicipio(), "menu.php");
    }catch(Exception $error){
        Page::showMessage(2, $error->getMessage(), null);
    }
    
?>