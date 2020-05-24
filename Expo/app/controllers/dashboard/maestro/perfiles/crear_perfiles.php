<?php 

//ANIDO LA CLASE

require_once("../../../app/models/notas.class.php");
require_once("../../../app/controllers/dashboard/maestro/account/autenticacion_portodo.php");

try{

    //Anido la clase

    $perfiles = new notas;

    //SELECCIONO EL BOTON

    if(isset($_POST['agregar'])){

        //VALIDO LOS ESPACIOS DEL INPUT

        $_POST = $perfiles->validateForm($_POST);

        //MANDO LA INFORMACION DEL GENERO

        if($perfiles->setPerfil($_POST['nombre'])){

            if($perfiles->setTipo($_POST['tipos'])){

                if($perfiles->setCurso($_POST['cursos'])){

                      //MANDO LA INFORMACION DEL ESTADO

                    if($perfiles->setMes($_POST['meses'])){

                        if(!$perfiles->CheckRepetido()){

                            //HAGO LA FUNCION DE CREAR GENEROS

                        if($perfiles->createPerfiles()){

                            //MENSAJE DE EXITO

                            Page::showMessage(1, "Perfil creado correctamente", "perfiles.php?id=$_SESSION[id1]");

                        }

                            else{

                                //MENSAJE POR SI NO SE MANDA EL ESTADO

                                throw new Exception("No manda el dato del byte");

                            }

                        }

                        else{

                            throw new Exception("No puedes ingresar un perfil para ese grado con esa materia pues ya existe uno");

                        } 

                }

                else{

                    throw new Exception("No se mandan los meses");

                }  

            }

            else{

                throw new Exception("No se manda el curso");

            } 

        }else{

            //MENSAJE POR SI NO ENVIA UN NOMBRE CORRECTO

            throw new Exception("tipo incorrecto");

        } 

    }

}

    //CAPTURO LA EXCEPCIN

}catch(Exception $error){

    //ENVIO EL MENSAJE DE EXCEPTION

    Page::showMessage(2, $error->getMessage(), null);

}

//ANIDO EL FORMULARIO

require_once("../../../app/views/dashboard/maestro/perfiles/agregar_perfiles_view.php");

?>