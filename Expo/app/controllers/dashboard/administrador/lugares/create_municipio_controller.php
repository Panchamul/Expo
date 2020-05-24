<?php 
    try{
        require_once("../../../app/models/municipios.class.php");
        require_once("../../../app/controllers/dashboard/administrador/account/autenticacion_portodo.php"); 
        $municipios = new Municipio();
        if(isset($_GET['idDep'])){
            if(isset($_POST['btnGuardar'])){
                if($municipios->setMunicipio($_POST['txtMunicipio'])){
                    if($municipios->setEstado(0)){
                        if($municipios->setDepartamento($_GET['idDep'])){
                            if($municipios->createMunicipios()){
                                Page::showMessage(1, "Creado con exito", "menu.php");
                            }else{
                                Page::showMessage(2, "No se creo ", null);
                            }
                        }else{
                             throw new Exception("No se envia de forma correcta el dato estado");
                        }
                    }else{
                        throw new Exception("No se envia de forma correcta el dato estado");
                    }
                }else{
                    throw new Exception("No se envia de forma correcta el nombre");
                }
            }
        }else{
            Page::showMessage(2, "Seleccione un departamento", "menu.php");
        }
        require_once("../../../app/views/dashboard/administrador/lugares/create_municipio_view.php");
    }catch(Exception $error){
        Page::showMessage(2, $error->getMessage(), null);
    }
?>