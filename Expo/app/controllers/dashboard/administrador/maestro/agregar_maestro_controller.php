<?php 
//ANIDO LA CLASE
require_once("../../../app/models/maestros.class.php");
require_once("../../../app/controllers/dashboard/administrador/account/autenticacion_portodo.php"); 
try{
    //Anido la clase
    $hora= date ("h:i:s");

    $fecha= date ("Y-n-j");

    $fecha_exacta = $fecha." ".$hora;
    $maestro = new Maestros;
    //SELECCIONO EL BOTON
    if(isset($_POST['agregar'])){
        //VALIDO LOS ESPACIOS DEL INPUT
        $_POST = $maestro->validateForm($_POST);
        //MANDO LA INFORMACION DEL Nombre
        if($maestro->setNombre($_POST['nombre'])){
            //INFO del apellido
            if($maestro->setApellido($_POST['apellido'])){
                //info del dui
                if($maestro->setDui($_POST['dui'])){
                    //informacion del usuario
                    if($maestro->setUsuario($_POST['usuario'])){
                        if($_POST['contrasenia1'] == $_POST['contrasenia']){
                            //mando info de la contrasenia
                            if($maestro->setContrasenia($_POST['contrasenia']))
                            {//mando informacion del correo
                                if($maestro->setCorreo($_POST['correo'])){
                                    //informacion del telefono
                                    if($maestro->setTelefono($_POST['telefono'])){
                                        //MANDO LA INFORMACION DEL ESTADO
                                        if($maestro->setDireccion($_POST['direccion']))
                                        {//asigno la direccion
                                            if($maestro->setGenero($_POST['generos'])){
                                                //ASIGNO EL genero
                                                if($maestro->setFecha($_POST['fecha']))
                                                {//asigno la fecha
                                                    if($maestro->setNit($_POST['NIT'])){
                                                        //asigno nit
                                                        if($maestro->setEscalafon($_POST['escalafon'])){
                                                            if(is_uploaded_file($_FILES['archivo1']['tmp_name'])){
                                                                if($maestro->setImagen($_FILES['archivo1'])){
                                                                    if($maestro->setEstado(3)){
                                                                        if($_POST['contrasenia'] != $_POST['usuario']){
                                                                          if($maestro->validar_clave  ($_POST['contrasenia'])){ 
                                                                         if($maestro->setFechaCambio($fecha_exacta)){
                                                                          
                                                                        //HAGO LA FUNCION DE CREAR GENEROS
                                                                        if($maestro->createMaestros()){
                                                                            //MENSAJE DE EXITO
                                                                            Page::showMessage(1, "Maestro agregado correctamente", "../admin/menu_admin.php");
                                                                        }
                                                                        else{
                                                                            if($maestro->unsetImagen()){
                                                                                throw new Exception(Database::getException());
                                                                            }else{
                                                                                throw new Exception("Elimine la imagen manualmente");
                                                                              
                                                                            }
                                                                        }
                                                                    }
                                                                    else{
                                                                        throw new exception("no se manda la fecha de la contraseña");
                                                                    }
                                                                }else{
                                                                    
                                                                        throw new Exception("La contraseña tiene que tener un minimo de 6 caracteres, un maximo de 16, con valor numerico, mayuscula y minuscula");
                                
                                                                    } 
                                
                                                                }else{
                                
                                                                    throw new Exception("No se puede tener una contraseña igual al usuario");
                                
                                                                }
                                                                    }else{
                                                                        //MENSAJE POR SI NO SE MANDA EL ESTADO
                                                                        throw new Exception("No manda el dato del byte");
                                                                    } 
                                                                }else{
                                                                    throw new Exception($maestro->getImageError());
                                                                }
                                                            }else{
                                                                throw new Exception("Seleccione una imagen");
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
                                throw new Exception("Clave menor a 6 digitos");
                            }
                        }
                        else{
                            throw new Exception("Claves diferentes");
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
        }else{
            //MENSAJE POR SI NO ENVIA UN NOMBRE CORRECTO
            throw new Exception("Nombre incorrecto");
        }
    }
    //CAPTURO LA EXCEPCIN
}catch(Exception $error){
    //ENVIO EL MENSAJE DE EXCEPTION
    Page::showMessage(2, $error->getMessage(), null);
}
//ANIDO EL FORMULARIO
require_once("../../../app/views/dashboard/administrador/maestro/agregar_maestros.php");
?>