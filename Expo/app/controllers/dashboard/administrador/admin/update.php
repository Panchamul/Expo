<?php 

//ANIDO LA CLASE

require_once("../../../app/models/perfiles.class.php");

require_once("../../../app/controllers/dashboard/administrador/account/autenticacion_portodo.php"); 

try{

    //aqui recolecto la id de la materia

    if(isset($_GET['id'])){

        $admin=new perfiles();

        if($admin->setId($_GET['id'])){

            if($admin->readAdmins1()){

                $data = $admin->getAdmin1(); 

                if(isset($_POST['actualizar'])){//si presionan el boton

                    $_POST = $admin->validateForm($_POST);

                    if($admin->setNombre($_POST['nombre'])){

                        //INFO del apellido

                        if($admin->setApellido($_POST['apellido'])){

                            //info del dui

                            if($admin->setDui($_POST['dui'])){

                                //informacion del usuario

                                if($admin->setUsuario($_POST['usuario'])){  

                                    //mando informacion del correo

                                            if($admin->setCorreo($_POST['correo'])){

                                                //informacion del telefono

                                                if($admin->setTelefono($_POST['telefono'])){

                                                    //MANDO LA INFORMACION DEL ESTADO

                                                    if($admin->setDireccion($_POST['direccion']))

                                                    {//asigno la direccion

                                                        if($admin->setGenero($_POST['Genero'])){

                                                            //ASIGNO EL genero

                                                            if($admin->setFecha($_POST['fecha']))

                                                            {//asigno la fecha

                                                                if($admin->setNit($_POST['NIT'])){

                                                                    //asigno nit

                                                                    if($admin->setEscalafon($_POST['escalafon'])){ 

                                                                                if($admin->setId_tipo($_POST['tipo'])){

                                                                                    if(is_uploaded_file($_FILES['archivo']['tmp_name'])){

                                                                                        if(!$admin->setImagen($_FILES['archivo'])){

                                                                                            throw new Exception($admin->getImageError());

                                                                                        }

                                                                                    }  

                                                                                    if($admin->UpdateAdmins()){

                                                                                        //MENSAJE DE EXITO

                                                                                        Page::showMessage(1, "Administrador actualizado correctamente", "../admin/admin_index.php");

                                                                                    }

                                                                                    else{ 

                                                                                        throw new Exception(Database::getException());

                                                                                    }  

                                                                                }else{

                                                                                    //MENSAJE POR SI NO SE MANDA EL ESTADO

                                                                                    throw new Exception("No manda el dato del byte");

                                                                                }   

                                                                    }

                                                                    else{

                                                                        throw new Exception("No manda el escalafon");

                                                                    }                                      

                                                                }

                                                                else{

                                                                    throw new Exception("nit incorrecto");

                                                                }  

                                                            }

                                                            else{

                                                               throw new Exception("Fecha incorrecta"); 

                                                            } 

                                                        }

                                                        else{

                                                            throw new Exception("no manda el genero");

                                                        } 

                                                    }

                                                    else{

                                                        throw new Exception("direccion erronea");

                                                    } 

                                                }

                                                else

                                                {

                                                    throw new Exception("Telefono invalido");

                                                }

                                            }

                                            else{

                                                throw new Exception("correo invalido");

                                            }  

                                }

                                else{

                                    throw new Exceptcion("Usuario invalido");

                                } 

                            }

                            else{

                                throw new Exception("Dui invalido");

                            } 

                        }

                        else{

                            throw new Exception("Apellido incorrecto");

                        } 

                    }

                }

            }else{

                Page::showMessage(2,"Admin incorrecto", "../admin/admin_index.php");

            }

        }else{

            Page::showMessage(2,"Admin incorrecto", "../admin/admin_index.php");

        }

    }else{

        Page::showMessage(3,"Seleccione un admin", "../admin/admin_index.php");

    }

}catch(Exception $error){

    Page::showMessage(2, $error->getMessage(),"../admin/admin_index.php");

}

//ANIDO EL FORMULARIO

require_once("../../../app/views/dashboard/administrador/admin/update.php");

?>