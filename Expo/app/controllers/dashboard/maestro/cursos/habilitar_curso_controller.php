<?php

require_once("../../../app/models/cursos.class.php"); 
require_once("../../../app/controllers/dashboard/maestro/account/autenticacion_portodo.php");

try{

    $curso = new Cursos();

    if(isset($_GET['id'])){ 

        if($curso->setId($_GET['id'])){

            if(isset($_POST['buscar'])){

                $_POST = $curso->validateForm($_POST);

                $data = $curso->searchMateriasAdmin1($_POST['busqueda']);

                if($data){

                    $row = count($data);

                   Page::showMessage(4, "Se encontraron $row resuldatos", null);

                }else{

                    Page::showMessage(4, "No se encontraron resultados", null);

                    $data = $curso->getCursos2(); 

                }

            }else{

                $data = $curso->getCursos2(); 

            }

            if($data){

                require_once("../../../app/views/dashboard/maestro/cursos/habilitar_cursos.php");

            }

            else{

                Page::showMessage(4,"No hay cursos dados de baja","cursos.php?id=$_SESSION[id1]");

            } 

        }

        else{

            Page::showMessage(4,"No hay Id","cursos.php?id=$_SESSION[id1]");

        }

    } 

    else{

        Page::showMessage(4,"No hay Id","cursos.php?id=$_SESSION[id1]");

    }

}catch(Exception $error){

   Page::showMessage(2, $error->getMessage(), "cursos.php?id=$_SESSION[id1]");

} 

?>