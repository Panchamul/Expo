<?php 
    try{
        require_once("../../../app/models/municipios.class.php");
        require_once("../../../app/controllers/dashboard/administrador/account/autenticacion_portodo.php"); 
        $municipios = new Municipio();
        if(isset($_GET['id'])){
            if($municipios->setId($_GET['id'])){
                if($municipios->readMunicipios()){

                }else{
                    Page::showMessage(2, "No se creo ", null);
                }
            }else{
                Page::showMessage(2, "No se creo ", null);
            }
            if(isset($_POST['btnEditar'])){
                if($municipios->setMunicipio($_POST['txtMunicipio'])){
                    if($municipios->setEstado(0)){
                        if($municipios->setDepartamento($_GET['idDep'])){
                            if($municipios->updateMunicipios()){
                                Page::showMessage(1, "actualizado con exito", "index_municipio.php?id=$_GET[idDep]");
                            }else{
                                Page::showMessage(2, "No se creo ", null);
                            }  
                        }else{

                        }
                    }else{
                        throw new Exception("No se envia de forma correcta el dato estado");
                    }
                }else{
                    throw new Exception("No se envia de forma correcta el nombre");
                }
            }
        }else{
            Page::showMessage(2, "No se creo ", null);
        }
        
        require_once("../../../app/views/dashboard/administrador/lugares/update_municipio_view.php");
    }catch(Exception $error){
        Page::showMessage(2, $error->getMessage(), null);
    }
?>