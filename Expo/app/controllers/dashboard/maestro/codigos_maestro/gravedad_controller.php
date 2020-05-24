<?php
    try{
        require_once("../../../app/models/codigos.class.php");
        require_once("../../../app/controllers/dashboard/maestro/account/autenticacion_portodo.php");
        $codigos = new Codigo();
        if(isset($_GET['id'])){
            if($codigos->setIdAlumno($_GET['id'])){
                if($codigos->readAlumnos()){
                }else{
                     throw new Exception("No se envia ejecuta el READ");
                }
            }else{
                throw new Exception("No se envia el dato GET");
            }
            /*========================================================================
            ESTO SUCEDE SI APRETAS EL BOTON DE EDITAR
            ==========================================================================*/
            require_once("../../../app/views/dashboard/maestro/codigos_maestro/gravedad_view.php");
        }else{
            Page::showMessage(2, "Seleccione un elemento a modificar", "index_codigos.php");
        }

    }catch(Exception $error){
        Page::showMessage(2, $error->getMessage(), null);
    }
?>
