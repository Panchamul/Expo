<?php 
    try{
        require_once("../../../app/models/estudiantes.class.php");
        require_once("../../../app/controllers/dashboard/administrador/account/autenticacion_portodo.php"); 
        $estudiantes = new Estudiante();
        if(isset($_GET['id'])){
            if($estudiantes->setId($_GET['id'])){
                if($estudiantes->readFamiliares()){

                }else{
                    Page::showMessage(2, "Seleccione un elemento a modificar", "index_estudiantes.php");
                }
            }
            if(isset($_POST['btnEliminar'])){
                if($estudiantes->setId($_GET['id'])){
                    if($estudiantes->deleteEstudiantes()){
                        Page::showMessage(1, "Eliminado con exito", "index_estudiantes.php");
                    }else{
                        Page::showMessage(2, "No se elimino el estado familiar", null);
                    }
                }else{
                    throw new Exception("No se envia el dato GET");
                }
            }
        }else{
            Page::showMessage(2, "Seleccione un elemento a modificar", "index_estudiantes.php");
        }
        require_once("../../../app/views/dashboard/administrador/templates/forms.php");
        Forms::delete0('Eliminar alumno', $estudiantes->getNombre() );
    }catch(Exception $error){
        Page::showMessage(2, $error->getMessage(), null);
    }
    
?>