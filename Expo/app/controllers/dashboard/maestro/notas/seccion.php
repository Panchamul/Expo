<?php 

try{

    require_once("../../../app/models/notas.class.php"); 

    require_once("../../../app/models/perfiles.class.php"); 

    require_once("../../../app/controllers/dashboard/maestro/account/autenticacion_portodo.php");

    $seccion = new Notas();//incluimos el modelos  

    if(isset($_GET['id'])){  

        if($seccion->setId($_GET['id'])){

            if(isset($_POST['buscar'])){

                $_POST = $seccion->validateForm($_POST);

                $data = $seccion->searchMateriasAdmin($_POST['busqueda']);

                if($data){

                    $row = count($data);

                   Page::showMessage(4, "Se encontraron $row resuldatos", null);

                }else{

                    Page::showMessage(4, "No se encontraron resultados", null);

                    $data = $seccion->getSeccion();  

                }

            }else{

                $data = $seccion->getSeccion(); 

            }

            if($data){

                require_once("../../../app/views/dashboard/maestro/notas/seccion_view.php");

            }

            else{

                Page::showMessage(4,"No hay alumnos registrados aun en este curso","../maestros/menu_maestro.php");

            } 

        }

    }

    else{

        Page::showMessage(4,"No hay id","../../maestro/maestros/menu_maestro.php");

    } 

}

catch(Exception $error){

    Page::showMessage(2, $error->getMessage(), null);

}

?>