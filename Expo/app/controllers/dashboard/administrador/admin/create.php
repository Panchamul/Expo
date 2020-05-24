<?php
//LLAMAMOS A LA CLASE PERFILES 
require_once("../../../app/models/perfiles.class.php");
//LLAMAMOS AL CONTROLADOR A UTILIZAR 
require_once("../../../app/controllers/dashboard/administrador/account/autenticacion_portodo.php");

try{

    $hora= date ("h:i:s");

    $fecha= date ("Y-n-j");

    $fecha_exacta = $fecha." ".$hora;

    $admin = new perfiles();

    if(isset($_POST['registrar'])){

        $_POST = $admin->validateForm($_POST);

        if($admin->setNombre($_POST['nombre'])){

            if($admin->setApellido($_POST['apellido'])){ 

                if($admin->setDui($_POST['dui'])){ 

            if($admin->setUsuario($_POST['usuario'])){

                if($admin->setTelefono($_POST['telefono'])){

                    if($admin->setDireccion($_POST['direccion'])){

                        if($admin->setNit($_POST['NIT'])){

                            if($admin->setEscalafon($_POST['escalafon'])){

                if($_POST['contrasenia1'] == $_POST['contrasenia']){

                if($admin->setClave($_POST['contrasenia'])){

                    if($admin->setCorreo($_POST['correo'])){

                        if($admin->setFecha($_POST['fecha'])){ 
                            if($admin->setGenero($_POST['Genero'])){   
                                    if(is_uploaded_file($_FILES['archivo']['tmp_name'])){
                                     
                                        if(!$admin->setImagen($_FILES['archivo'])){ 
                                        throw new Exception($admin->getImageError());

                                    } 

                                }

                                else{

                                throw new Exception("Seleccione una imagen");

                                }

                                if($_POST['contrasenia'] != $_POST['usuario']){

                                    if($admin->validar_clave($_POST['contrasenia'])){   

                                        if($admin->setFechaCambio($fecha_exacta)){ 

                                            if($admin->setEstado(0)){   
                                                if($admin->setId_tipo($_POST['tipo'])){ 
                                            if($admin->createAdmins()){  

                                                Page::showMessage(1, "Administrador creado correctamente", "../admin/menu_admin.php"); 

                                            }else{

                                                throw new Exception(Database::getException());

                                            } 
                                            
                        }else{

                            throw new Exception("Selecciona un tipo");

                        } 

                                        }else{



                                        }

                                        }else{



                                        }

                                    }else{

                                        throw new Exception("La contraseña tiene que tener un minimo de 6 caracteres, un maximo de 16, con valor numerico, mayuscula y minuscula");

                                    } 

                                }else{

                                    throw new Exception("No se puede tener una contraseña igual al usuario");

                                }


                    }

                        else{

                            throw new Exception("Selecciona un genero");

                        }

                        }else{

                            throw new Exception("Ingresa una fecha");

                        }

                    }else{

                        throw new Exception("Ingresa un correo");

                    }

                }else{

                    throw new Exception("Ingresa una contraseña mayor a 6 caracteres");

                }

            }else{

                throw new Exception("Claves diferentes");

            }

        }else{

            throw new Exception("Ingresa una escalafon");

        }

    }else{

        throw new Exception("Ingresa un nit");

    }

        }else{

            throw new Exception("Ingresa una direccion");

        }

        }else{

            throw new Exception("Ingresa un telefono");

        }

            }else{

                throw new Exception("Ingresa un usuario");

            }

        }

        else{

            throw new Exception("ingresa un dui");

        }

        }

        else{

            throw new Exception("ingresa un apellido");

        }

        }else{

            throw new Exception("Ingresa un nombre");

        }

    }

}

catch (Exception $error){

	Page::showMessage(2, $error->getMessage(), "");

}

require_once("../../../app/views/dashboard/administrador/admin/admin.php");

?>