<?php

//ANIDO LA CLASE

require_once("../../../app/models/cursos.class.php");
require_once("../../../app/controllers/dashboard/maestro/account/autenticacion_portodo.php");

try{

    if(isset($_GET['id'])){

        $curso = new cursos; 

        if($curso->setId($_GET['id'])){

            if($curso->readCursos()){

                if(isset($_POST['Eliminar'])){

                    $_POST = $curso->validateForm($_POST);

                    if($curso->setEstado(1)){

                        if($curso->deleteCursos()){

                            Page::showMessage(1,"Curso eliminado correctamente  ", "cursos.php?id=$_SESSION[id1]");

                        }else{

                            Page::showMessage(2,"No se logro eliminar", null);

                        }

                    }else{

                        throw new Exception("No se envia el dato del valor");

                    }

                }

            }else{

                Page::showMessage(2,"Curso  inexistente", "cursos.php?id=$_SESSION[id1]");

            } 

        }

    }else{

        Page::showMessage(3,"Seleccione un Curso", "cursos.php?id=$_SESSION[id1]");

    }

}catch(Exception $error){

    Page::showMessage(2, $error->getMessage(), null);

}

//ANIDO EL FORMULARIO

require_once("../../../app/views/dashboard/maestro/cursos/eliminar_cursos_view.php");

?>