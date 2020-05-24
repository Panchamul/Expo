<?php 

//ANIDO LA CLASE

require_once("../../../app/models/cursos.class.php");
require_once("../../../app/controllers/dashboard/maestro/account/autenticacion_portodo.php");

try{

    //Anido la clase

    $curso = new cursos;

    //SELECCIONO EL BOTON

    if(isset($_POST['agregar'])){

        //VALIDO LOS ESPACIOS DEL INPUT

        $_POST = $curso->validateForm($_POST);

        //MANDO LA INFORMACION DEL GENERO

        if($curso->setGrado($_POST['grados'])){

            if($curso->setMateria($_POST['materias'])){

                if($curso->setMaestro($_SESSION['id1'])){

                      //MANDO LA INFORMACION DEL ESTADO

                    if($curso->setEstado(0)){

                        if(!$curso->CheckRepetido()){

                            //HAGO LA FUNCION DE CREAR GENEROS

                        if($curso->createCursos()){

                            //MENSAJE DE EXITO

                            Page::showMessage(1, "Curso creado correctamente", "cursos.php?id=$_SESSION[id1]");

                        }

                            else{

                                //MENSAJE POR SI NO SE MANDA EL ESTADO

                                throw new Exception("No manda el dato del byte");

                            }

                        }

                        else{

                            throw new Exception("No puedes ingresar un curso para ese grado con esa materia pues ya existe uno");

                        } 

                }

                else{

                    throw new Exception("No se manda el maestro");

                }  

            }

            else{

                throw new Exception("No se manda la materia");

            } 

        }else{

            //MENSAJE POR SI NO ENVIA UN NOMBRE CORRECTO

            throw new Exception("Nombre incorrecto");

        } 

    }

}

    //CAPTURO LA EXCEPCIN

}catch(Exception $error){

    //ENVIO EL MENSAJE DE EXCEPTION

    Page::showMessage(2, $error->getMessage(), null);

}

//ANIDO EL FORMULARIO

require_once("../../../app/views/dashboard/maestro/cursos/agregar_cursos_view.php");

?>