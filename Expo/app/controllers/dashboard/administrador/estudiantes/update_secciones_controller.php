<?php 
    require_once("../../../app/models/estudiantes.class.php"); 
    require_once("../../../app/controllers/dashboard/administrador/account/autenticacion_portodo.php"); 
    $estudiantes = new Estudiante();
    if(isset($_GET['id'])){
        if(isset($_POST['btnGuardar'])){
            if($estudiantes->setIdGrado($_POST['grado'])){
                if($estudiantes->setIdAlumnor($_GET['id'])){
                    if($estudiantes->UpdateSecciones()){
                        Page::showMessage(1, "Creado con exito", "index_estudiantes.php");
                    }else{
                        Page::showMessage(2, "No se creo la seccion", "index_estudiantes.php");
                    }
                }else{
                     Page::showMessage(2, "Error con el id alumno", "");
                }
            }else{
                 Page::showMessage(2, "Error con el grado", "");
            }
        }
    }else{
        Page::showMessage(2, "Seleccione un alumno", "index_estudiantes.php");
    }
    require_once("../../../app/views/dashboard/administrador/estudiantes/create_secciones_view.php");
?>