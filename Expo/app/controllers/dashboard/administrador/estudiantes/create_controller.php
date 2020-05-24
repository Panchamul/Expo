<?php
require_once("../../../app/models/estudiantes.class.php");
    require_once("../../../app/controllers/dashboard/administrador/account/autenticacion_portodo.php"); 
    $hora= date ("h:i:s");
    $fecha= date ("Y-n-j");
    $fecha_exacta = $fecha." ".$hora;
    $estudiantes = new Estudiante;
    if(isset($_POST['btnGuardar'])){
        if($estudiantes->setNombre($_POST['txtNombre'])){
            if($estudiantes->setApellido($_POST['txtApellido'])){
                if($estudiantes->setFecha($_POST['txtFechaN'])){
                    if($estudiantes->setIdMunicipio($_POST['municipio'])){
                        if($estudiantes->setTelefono($_POST['txtTelefono'])){
                            if($estudiantes->setIdZona($_POST['zona'])){
                                if($estudiantes->setNie($_POST['txtNie'])){
                                    if($estudiantes->setGenero($_POST['genero'])){
                                        if($estudiantes->setIdEstadoF($_POST['estadoF'])){
                                            if($estudiantes->setIdReligion($_POST['religion'])){
                                                if($estudiantes->setAnioIngreso($_POST['txtAnioI'])){
                                                    if($estudiantes->setRepiteGrado($_POST['repiteAnio'])){
                                                        if($estudiantes->setTarjetaVacunas($_POST['txtTarjeta'])){
                                                            if($estudiantes->setDescripcion($_POST['txtPreescripcion'])){
                                                                if($estudiantes->setPartida($_POST['txtPartida'])){
                                                                    if($estudiantes->setCertificado($_POST['txtCertificado'])){
                                                                        if($estudiantes->setFechaRegistro($_POST['fechaRegi'])){
                                                                            if($estudiantes->setUsuarios($_POST['txtUsuario'])){
                                                                                if($estudiantes->setCorreo($_POST['txtCorreo']) && $estudiantes->setFechaCambio($fecha_exacta)){
                                                                                    if($estudiantes->setEstado(0)){
                                                                                      if($_POST['txtContrasenia'] == $_POST['txtContrasenia2']){
                                                                                           if($estudiantes->validar_clave($_POST['txtContrasenia'])){
                                                                                                if($estudiantes->setContraseania($_POST['txtContrasenia'])){
                                                                                                    if(is_uploaded_file($_FILES['txtArquivo']['tmp_name'])){
                                                                                                        if($estudiantes->setFoto($_FILES['txtArquivo'])){
                                                                                                            if($estudiantes->setIdDiscapacidad($_POST['discapacidad'])){
                                                                                                                if($estudiantes->setCarnet($_POST['txtCarnet'])){
                                                                                                                    if($estudiantes->createEstudiantes()){
                                                                                                                        if($estudiantes->setUsuarios($_POST['txtUsuario'])){
                                                                                                                            if($estudiantes->readAlumno()){
                                                                                                                                if($estudiantes->getIdAlumno()){
                                                                                                                                    Page::showMessage(1, "Alumno agregado correctamente", "create_secciones.php?id=".$estudiantes->getIdAlumno()."");
                                                                                                                                }else{
                                                                                                                                    Page::showMessage(2, "No se agrego correctamente el alumno", NULL);
                                                                                                                                }
                                                                                                                            }else{
                                                                                                                                Page::showMessage(2, "no se encuentra el usuario", NULL);
                                                                                                                            }
                                                                                                                        }
                                                                                                                    }else{
                                                                                                                         throw new Exception(Database::getException());
                                                                                                                    }
                                                                                                                }else{
                                                                                                                    Page::showMessage(2, "El carne se encuentra mal escrito", NULL);
                                                                                                                }
                                                                                                            }else{
                                                                                                                Page::showMessage(2, "No se selecciono correctamente la discapacidad", NULL);
                                                                                                            }
                                                                                                        }else{
                                                                                                            Page::showMessage(2, "No se guardo la foto, revise que el tamaño sea 500 x 500", NULL);
                                                                                                        }
                                                                                                    }else{
                                                                                                        Page::showMessage(2, "Seleccione una fotografia", NULL);
                                                                                                    }
                                                                                                }else{
                                                                                                    Page::showMessage(2, "No se guardo correctamente la contraseña", NULL);
                                                                                                }
                                                                                            }else{
                                                                                                Page::showMessage(2, "La contraseña no es correcta, verifique que posea mayúscula y números en está", NULL);
                                                                                            }
                                                                                        }else{
                                                                                            Page::showMessage(2, "Las contraseñas no son identicas, escribala nuevamente", NULL);
                                                                                        }
                                                                                    }else{
                                                                                        Page::showMessage(2, "No se agrego correctamente el estado", NULL);
                                                                                    } 
                                                                                }else{
                                                                                    Page::showMessage(2, "No se guardo el correo", NULL);
                                                                                }
                                                                            }else{
                                                                                Page::showMessage(2, "No se agrego el usuario", NULL);
                                                                            }
                                                                        }else{
                                                                            Page::showMessage(2, "No se guardo la fecha de registro", NULL);
                                                                        }
                                                                    }else{
                                                                        Page::showMessage(2, "No guarda el dato de certificado", NULL);
                                                                    }
                                                                }else{
                                                                    Page::showMessage(2, "No guarda el número de partida", NULL);
                                                                }
                                                            }else{
                                                                Page::showMessage(2, "No guarda la preescripcion del estudiante", NULL);
                                                            }
                                                        }else{
                                                            Page::showMessage(2, "No guarda el número de tarjeta de vacunación", NULL);
                                                        }
                                                    }else{
                                                        Page::showMessage(2, "No guarda si repite o no el año", NULL);
                                                    }
                                                }else{
                                                    Page::showMessage(2, "No guarda el año de ingreso del estudiante", NULL);
                                                }
                                            }else{
                                                Page::showMessage(2, "No guarda la religion a la que pertenece", NULL);
                                            }
                                        }else{
                                            Page::showMessage(2, "No guarda el estado familiar del alumno", NULL);
                                        }
                                    }else{
                                        Page::showMessage(2, "No guarda el genero, seleccione uno", NULL);
                                    }
                                }else{
                                    Page::showMessage(2, "No guarda el NIE", NULL);
                                }
                            }else{
                                Page::showMessage(2, "No guarda la zona en que vive", NULL);
                            }
                        }else{
                            Page::showMessage(2, "No guarda el número de teléfono", NULL);
                        }
                    }else{
                        Page::showMessage(2, "No guarda el municipio al que pertenece", NULL);
                    }
                }else{
                    Page::showMessage(2, "No guarda la fecha de nacimiento del alumno", NULL);
                }
            }else{
                Page::showMessage(2, "No guarda el apellido", NULL);
            }
        }else{
            Page::showMessage(2, "No guarda el nombre", NULL);
        }
    }
require_once("../../../app/views/dashboard/administrador/estudiantes/create_view.php");
?>