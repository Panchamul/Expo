<?php
    require_once("../../../app/models/estudiantes.class.php"); 
    require_once("../../../app/controllers/dashboard/administrador/account/autenticacion_portodo.php"); 
    $estudiantes = new Estudiante();
    if(isset($_GET['id'])){
        if($estudiantes->setId($_GET['id'])){
            if($estudiantes->readFamiliares()){

            }else{
                Page::showMessage(2, "No leyo el READ", "index_estudiantes.php");
            }
        }else{
            Page::showMessage(2, "Error en el id de alumno", "index_estudiantes.php");
        }
        if(isset($_POST['btnEditar'])){
            if($estudiantes->setNombre($_POST['txtNombre'])){
                if($estudiantes->setApellido($_POST['txtApellido'])){
                    if($estudiantes->setFecha($_POST['txtFechaN'])){
                        if($estudiantes->setIdMunicipio($_POST['municipio'])){
                            if($estudiantes->setIdZona($_POST['zona'])){
                                if($estudiantes->setIdDiscapacidad($_POST['discapacidad'])){
                                    if($estudiantes->setIdReligion($_POST['religion'])){
                                        if($estudiantes->setIdEstadoF($_POST['estadoF'])){
                                            if($estudiantes->setNie($_POST['txtNie'])){
                                                if($estudiantes->setGenero($_POST['genero'])){
                                                    if($estudiantes->setAnioIngreso($_POST['txtAnioI'])){
                                                        if($estudiantes->setTelefono($_POST['txtTelefono'])){
                                                            if($estudiantes->setRepiteGrado($_POST['repiteAnio'])){
                                                                if($estudiantes->setTarjetaVacunas($_POST['txtTarjeta'])){
                                                                    if($estudiantes->setDescripcion($_POST['txtPreescripcion'])){
                                                                        if($estudiantes->setPartida($_POST['txtPartida'])){
                                                                            if($estudiantes->setCertificado($_POST['txtCertificado'])){
                                                                                if($estudiantes->setFechaRegistro($_POST['fechaRegi'])){
                                                                                    if($estudiantes->setUsuarios($_POST['txtUsuario'])){
                                                                                        if($estudiantes->setCorreo($_POST['txtCorreo'])){
                                                                                            if($estudiantes->setEstado(0)){
                                                                                                if($estudiantes->setCarnet($_POST['txtCarnet'])){
                                                                                                    if(is_uploaded_file($_FILES['txtArquivo']['tmp_name'])){
                                                                                                        if(!$estudiantes->setFoto($_FILES['txtArquivo'])){
                                                                                                            throw new Exception($estudiante->getImageError());
                                                                                                        }
                                                                                                    }
                                                                                                    //HAGO LA FUNCION DE CREAR GENEROS
                                                                                                    if($estudiantes->updateEstudiantes()){
                                                                                                        if($estudiantes->getEstudiantesId()){
                                                                                                                //MENSAJE DE EXITO
                                                                                                            Page::showMessage(1, "Alumno modificado correctamente", "update_secciones.php?id=".$estudiantes->getIdAlumno()."");
                                                                                                        }
                                                                                                    }
                                                                                                    else{
                                                                                                        Page::showMessage(2, "No estoy seguro que paso correo", NULL);
                                                                                                    }  
                                                                                                    
                                                                                                }else{
                                                                                                    Page::showMessage(2, "No estoy seguro que paso correo", NULL);
                                                                                                }
                                                                                            }else{
                                                                                                Page::showMessage(2, "No estoy seguro que paso correo", NULL);
                                                                                            }
                                                                                        }else{
                                                                                                Page::showMessage(2, "No estoy seguro que paso correo", NULL);
                                                                                        }
                                                                                    }else{
                                                                                           Page::showMessage(2,"Error con el usuario",null);
                                                                                    }
                                                                                }else{
                                                                                        Page::showMessage(2, "No estoy seguro que paso fecha registro", NULL);
                                                                                }
                                                                            }else{
                                                                                    Page::showMessage(2, "No estoy seguro que paso certificado", NULL);
                                                                            }
                                                                        }else{
                                                                            Page::showMessage(2, "No estoy seguro que paso partida", NULL);
                                                                        }
                                                                    }else{
                                                                            throw new Exception("Error con la preescripcion");
                                                                    }
                                                                }else{
                                                                        Page::showMessage(2, "No estoy seguro que paso tarjetas vacunas", NULL);
                                                                }
                                                            }else{
                                                                    throw new Exception("Error con el repetir grado");
                                                            }
                                                        }else{
                                                                Page::showMessage(2, "No estoy seguro que paso telefono este es el telefono :".$_POST['txtTelefono']."", NULL);
                                                        }
                                                    }else{
                                                            Page::showMessage(2, "No estoy seguro que paso anio ingreso este es el nie :".$_POST['txtAnioI']."", NULL);
                                                    }
                                                }else{
                                                        throw new Exception("Error con el geneto");
                                                }
                                            }else{
                                                Page::showMessage(2, "No estoy seguro que paso NIE este es el nie :".$_POST['txtNie']."", NULL);
                                            }
                                        }else{
                                                throw new Exception("Error con el estado familiar");
                                        }
                                    }else{
                                            throw new Exception("Error con el id Religion");
                                    }
                                }else{
                                        throw new Exception("Error con el id Discapacidad");
                                }
                            }else{
                                    throw new Exception("Error con la zona");
                            }
                        }else{
                                throw new Exception("Error con el municipio");
                        }
                    }else{
                            throw new Exception("Error con la fecha");
                    }
                }else{
                        throw new Exception("Error con el Apellido");
                }
            }else{
                throw new Exception("Error con el txtNombre");
            }
        }
        
    }else{
        Page::showMessage(2, "Seleccione un alumno porfavot", "index_estudiantes.php");
    }
    require_once("../../../app/views/dashboard/administrador/estudiantes/update_view.php");
?>