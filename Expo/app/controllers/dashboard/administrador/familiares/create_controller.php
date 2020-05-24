<?php 
    try{
        require_once("../../../app/models/familiares.class.php");
        require_once("../../../app/controllers/dashboard/administrador/account/autenticacion_portodo.php"); 
        $familiares = new Familiar();
        if(isset($_POST['btnGuardar'])){
            if($familiares->setNombre($_POST['txtNombre'])){
                if($familiares->setEstado(0)){
                    if($familiares->setApellido($_POST['txtApellido'])){
                        if($familiares->setFecha($_POST['txtFecha'])){
                            if($familiares->setOcupacion($_POST['txtOcupacion'])){
                                if($familiares->setTrabajo($_POST['txtNombreTrabajo'])){
                                    if($familiares->setDireccionTrabajo($_POST['txtDireccionTrabajo'])){
                                        if($familiares->setTelefonoTrabajo($_POST['txtTelefonoTrabajo'])){
                                            if($familiares->setTelefono($_POST['txtTelefono'])){
                                                if($familiares->setNivelEstudio($_POST['txtNivel'])){
                                                    if($familiares->setDui($_POST['txtDui'])){
                                                        if($familiares->setIdAlumno($_SESSION['id'])){
                                                            if($familiares->createFamiliares()){
                                                                if($familiares->getIdFamiliarAlumno()){
                                                                    Page::showMessage(1, "Creado con exito", "../dt_familiares/create.php?idFamiliar=".$familiares->getIdFamiliarAlumno()."");
                                                                }
                                                            }else{
                                                                Page::showMessage(2, "No se creo ek familiar", null);
                                                            }  
                                                        }else{ 
                                                            throw new Exception("Error del id alumno");
                                                        }
                                                    }else{
                                                        throw new Exception("Error del DUI");
                                                    }
                                                }else{
                                                    throw new Exception("Error del Nivel de estudio");
                                                }
                                            }else{
                                                throw new Exception("Error del telefono");
                                            }
                                        }else{
                                            throw new Exception("Error del telefono trabajo");
                                        }
                                    }else{
                                        throw new Exception("Error de direccion de trabajo");
                                    }
                                }else{
                                    throw new Exception("Error del nombre del trabajo");
                                }
                            }else{
                                throw new Exception("Error del ocupacion");
                            }
                        }else{
                            throw new Exception("Error del fecha");
                        }
                    }else{
                        throw new Exception("Error del apellido");
                    }
                }else{
                    throw new Exception("No se envia de forma correcta el dato estado");
                }
            }else{
                throw new Exception("No se envia de forma correcta el nombre");
            }
        }
        require_once("../../../app/views/dashboard/administrador/familiares/create_view.php");
    }catch(Exception $error){
        Page::showMessage(2, $error->getMessage(), null);
    }
   


     
?>