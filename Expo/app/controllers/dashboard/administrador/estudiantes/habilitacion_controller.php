<?php 
    try{
        require_once("../../../app/models/estudiantes.class.php");
        require_once("../../../app/controllers/dashboard/administrador/account/autenticacion_portodo.php"); 
        $estudiantes = new Estudiante();
        if(isset($_GET['id'])){
            if($estudiantes->setId($_GET['id'])){
                if($estudiantes->readFamiliaresNulas()){
                }
            }
            if(isset($_POST['btnHabilitar'])){
                if($estudiantes->setId($_GET['id'])){
                    if($estudiantes->habilitarEstudiantes()){
                        Page::showMessage(1, "Habilitado con exito", "index_estudiantes.php");
                    }else{
                        Page::showMessage(2, "No se creo la discapacidad", null);
                    }
                }else{
                    throw new Exception("No se envia el dato GET");
                }
            }
        }else{
            Page::showMessage(2, "Seleccione un elemento a modificar", "index_estudiantes.php");
        }
        /*==================================================================
        INICIO DE LA VISTA GENERALIZANA
        ==================================================================)=*/
        require_once("../../../app/views/dashboard/administrador/templates/forms.php");
        Forms::habilitacion('Habilitacion de alumno', $estudiantes->getNombre(), 'btnHabilitar', 'index_estudiantes.php');
        /*==================================================================
        FIN DE LA VISTA GENERALIZANA
        ==================================================================)=*/
    }catch(Exception $error){
        Page::showMessage(2, $error->getMessage(), null);
    }
    
?>