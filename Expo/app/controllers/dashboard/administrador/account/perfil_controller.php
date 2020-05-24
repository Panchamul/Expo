<?php 
//ANIDO LA CLASE
require_once("../../../app/models/perfiles.class.php");
require_once("../../../app/controllers/dashboard/administrador/account/autenticacion_portodo.php"); 
try{
    //AQUÍ OBTENEMOS LAS ID DE LAS IMAGENES
    if(isset($_GET['id'])){
        $perfil=new Perfiles();
        if($perfil->setId($_GET['id'])){
            if($perfil->readAdmins1()){
                $data=$perfil->getFotoAdmin();
                if(isset($_POST['actualizar'])){//SI LA OPERACIÓN ES REALIZADA 
                    $_POST = $perfil->validateForm($_POST);
                        if($perfil->setNombre($_POST['nombre'])){ 
                            if($perfil->setApellido($_POST['apellido'])){
                                if($perfil->setClave($_POST['usuario'])){ 
                                    if(!$perfil->checkPassword1()){
                                if($perfil->setUsuario($_POST['usuario'])){
                                    if($perfil->setCorreo($_POST['correo'])){
                                        if($perfil->setTelefono($_POST['telefono'])){
                                            if($perfil->setGenero($_POST['Genero'])){
                                                if($perfil->setFecha($_POST['fecha'])){
                                                    if(is_uploaded_file($_FILES['archivo']['tmp_name'])){
                                                        if(!$perfil->setImagen1($_FILES['archivo'])){
                                                            throw new Exception($perfil->getImageError());
                                                        }
                                                    }      
                                                    if($perfil->editarPerfil1()){//SE ACTUALIZA EL PERFIL 
                                                        $_SESSION['nombre'] = $perfil->getNombre();
                                                        $_SESSION['apellido'] = $perfil->getApellido();
                                                        Page::showMessage(1, "Perfil Actualizado", "../admin/menu_admin.php");
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
                Page::showMessage(2,"Perfil Incorrecto", "../admin/menu_admin.php");
            }
        }else{
            Page::showMessage(2,"Perfil incorrecto", "../admin/menu_admin.php");
        }
    }else{
        Page::showMessage(3,"Seleccione una Perfil", "../admin/menu_admin.php");
    }
}catch(Exception $error){
    Page::showMessage(2, $error->getMessage(), null);
}
//ANIDO EL FORMULARIO
require_once("../../../app/views/dashboard/administrador/account/perfil_view.php");
?>