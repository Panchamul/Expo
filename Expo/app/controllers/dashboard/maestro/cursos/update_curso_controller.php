<?php 

//ANIDO LA CLASE

require_once("../../../app/models/cursos.class.php");
require_once("../../../app/controllers/dashboard/maestro/account/autenticacion_portodo.php");

try{

    //aqui recolecto la id de la materia

    if(isset($_GET['id'])){

        $curso=new cursos();

        if($curso->setId($_GET['id'])){

            if($curso->readCursos()){

                if(isset($_POST['actualizar'])){//si presionan el boton

                    $_POST = $curso->validateForm($_POST);

                        if($curso->setMateria($_POST['materias'])){ 

                            if($curso->setGrado($_POST['grados'])){

                                if(!$curso->checkRepetido()){

                                    if($curso->updateCursos()){//actualizo la materia

                                        Page::showMessage(1, "Materia Actualizada", "cursos.php?id=$_SESSION[id1] ");

                                    }else {

                                        Page::showMessage(2, "La materia no se puede actualizar", "cursos.php?id=$_SESSION[id1]");

                                    } 

                                } 

                                else{

                                    throw new Exception("ya hay un curso con esa materia en ese grado");

                                }

                            }else{

                                throw new Exception("nombre del grado incorrecto");

                            }

                                

                        }else {

                            throw new Exception("Nombre de la materia incorrecto");

                        }

                }

            }else{

                Page::showMessage(2,"Curso inexistente", "cursos.php?id=$_SESSION[id1]");

            }

        }else{

            Page::showMessage(2,"Curso incorrecta", "cursos.php?id=$_SESSION[id1]");

        }

    }else{

        Page::showMessage(3,"Seleccione una curso", "cursos.php?id=$_SESSION[id1]");

    }

}catch(Exception $error){

    Page::showMessage(2, $error->getMessage(), null);

}

//ANIDO EL FORMULARIO

require_once("../../../app/views/dashboard/maestro/cursos/actualizar_cursos_view.php");

?>