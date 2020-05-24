<?php 

//ANIDO LA CLASE

require_once("../../app/models/perfiles.class.php");
require_once("../../app/controllers/public/account/autenticacion_portodo.php");

try{

    //aqui recolecto la id de la materia

    if(isset($_GET['id'])){

        $perfil=new Perfiles();

        if($perfil->setId($_GET['id'])){

            if($perfil->readAlumnos()){

                $data=$perfil->getFotoAlumno();

                if(isset($_POST['actualizar'])){//si presionan el boton

                    $_POST = $perfil->validateForm($_POST);

                        if($perfil->setNombre($_POST['nombre'])){ 

                            if($perfil->setApellido($_POST['apellido'])){

                                 if($perfil->setClave($_POST['usuario'])){ 
                                    if(!$perfil->checkPassword()){
                                if($perfil->setUsuario($_POST['usuario'])){

                                    if($perfil->setCorreo($_POST['correo'])){

                                        if($perfil->setTelefono($_POST['telefono'])){

                                            if($perfil->setGenero($_POST['generos'])){

                                                if($perfil->setFecha($_POST['fecha'])){

                                                    if(is_uploaded_file($_FILES['archivo']['tmp_name'])){

                                                        if(!$perfil->setImagen($_FILES['archivo'])){

                                                            throw new Exception($perfil->getImageError());

                                                        }

                                                    }      

                                                    if($perfil->editarPerfil()){//actualizo el perfil

                                                        $_SESSION['nombre2'] = $perfil->getNombre();

                                                        $_SESSION['apellido2'] = $perfil->getApellido();

                                                        Page::showMessage(1, "Perfil Actualizado", "../account/menu_principal.php");

                                                    } 

                                                    else{ 

                                                        throw new Exception(Database::getException());

                                                    }  

                                                }

                                                else{

                                                    throw new Exception("Fecha invalida");

                                                }

                                            }

                                            else{

                                                throw new Exception("Genero invalido");

                                            }

                                        }

                                        else{

                                            throw new Exception("telefono invalido");

                                        }

                                    }

                                    else{

                                        throw new Exception("Correo invalido");

                                    }

                                }

                                else{

                                    throw new Exception("perfil invalido");

                                }
                                    }
                            else{
                                throw new Exception("Tu usuario no puede ser igual a tu contraseña");
                            } 
                        }
                        else{
                            throw new Exception("no se puso el usuario");
                        } 

                            }

                            else{

                                throw new Exception("Apellido invalido");

                            } 

                        }else {

                            throw new Exception("Nombre del alumno incorrecto");

                        }

                }

            }else{

                Page::showMessage(2,"Perfil Incorrecto", "menu_principal.php");

            }

        }else{

            Page::showMessage(2,"Perfil incorrecto", "menu_principal.php");

        }

    }else{

        Page::showMessage(3,"Seleccione una Perfil", "menu_principal.php");

    }

}catch(Exception $error){

    Page::showMessage(2, $error->getMessage(), null);

}

//ANIDO EL FORMULARIO

require_once("../../app/views/public/account/perfil_view.php");

?>