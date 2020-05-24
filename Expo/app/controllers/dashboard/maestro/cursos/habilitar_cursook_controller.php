<?php 

//ANIDO LA CLASE

require_once("../../../app/models/cursos.class.php");
require_once("../../../app/controllers/dashboard/maestro/account/autenticacion_portodo.php");

try{

    //aqui recolecto la id de la materia

    if(isset($_GET['id'])){

        $curso=new Cursos();

        if($curso->setId($_GET['id'])){

            if($curso->readCursos1()){

                if(isset($_POST['actualizar'])){//si presionan el boton

                    $_POST = $curso->validateForm($_POST);

                    if(!$curso->checkRepetido2()){
 

                        if($curso->setEstado(0)){ 

                            if($curso->habilitarCursos()){//actualizo la materia

                                Page::showMessage(1, "Curso Habilitado", "cursos.php?id=$_SESSION[id1]");

                            }else {

                                Page::showMessage(2, "El curso no se puede habilitar", "cursos.php?id=$_SESSION[id1]");

                            } 

                    }else {

                        throw new Exception("Nombre del curso incorrecto");

                    }

                    }

                    else{

                        Page::showMessage(2,"Ya hay un curso en este grado y en esa materia asignado","cursos.php?id=$_SESSION[id1]");

                    } 

                }

            }else{

                Page::showMessage(2,"curso inexistente", "cursos.php?id=$_SESSION[id1]");

            }

        }else{

            Page::showMessage(2,"curso incorrecto", "cursos.php?id=$_SESSION[id1]");

        }

    }else{

        Page::showMessage(3,"Seleccione un curso", "cursos.php?id=$_SESSION[id1]");

    }

}catch(Exception $error){

    Page::showMessage(2, $error->getMessage(), null);

}

//ANIDO EL FORMULARIO

require_once("../../../app/views/dashboard/maestro/cursos/habilitar_cursos_view2.php");

?>