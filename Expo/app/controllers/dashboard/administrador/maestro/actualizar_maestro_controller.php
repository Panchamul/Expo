<?php 
//ANIDO LA CLASE
require_once("../../../app/models/maestros.class.php");
require_once("../../../app/controllers/dashboard/administrador/account/autenticacion_portodo.php"); 
try{
    //aqui recolecto la id de la materia
    if(isset($_GET['id'])){
        $maestro=new maestros();
        if($maestro->setId($_GET['id'])){
            if($maestro->readMaestros()){
                $data = $maestro->getMaestrosAdmin1(); 
                if(isset($_POST['actualizar'])){//si presionan el boton
                    $_POST = $maestro->validateForm($_POST);
                    if($maestro->setNombre($_POST['nombre'])){
                        //INFO del apellido
                        if($maestro->setApellido($_POST['apellido'])){
                            //info del dui
                            if($maestro->setDui($_POST['dui'])){
                                //informacion del usuario
                                if($maestro->setUsuario($_POST['usuario'])){  
                                    //mando informacion del correo
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
                                                                                if($maestro->setEstado(0)){
                                                                                    if(is_uploaded_file($_FILES['archivo']['tmp_name'])){
                                                                                        if(!$maestro->setImagen($_FILES['archivo'])){
                                                                                            throw new Exception($maestro->getImageError());
                                                                                        }
                                                                                    }  
                                                                                    if($maestro->UpdateMaestros()){
                                                                                        //MENSAJE DE EXITO
                                                                                        Page::showMessage(1, "Maestro actualizado correctamente", "../admin/menu_admin.php");
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
                Page::showMessage(2,"Maestro incorrecto", "../admin/menu_admin.php");
            }
        }else{
            Page::showMessage(2,"Maestro incorrecto", "../admin/menu_admin.php");
        }
    }else{
        Page::showMessage(3,"Seleccione una maestro", "../admin/menu_admin.php");
    }
}catch(Exception $error){
    Page::showMessage(2, $error->getMessage(), null);
}
//ANIDO EL FORMULARIO
require_once("../../../app/views/dashboard/administrador/maestro/actualizar_maestros_view.php");
?>