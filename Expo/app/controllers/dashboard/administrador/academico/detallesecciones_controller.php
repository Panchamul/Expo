<?php 
try{
    //ANIDO LA CLASE
    require_once("../../../app/models/maestros.class.php"); 
    require_once("../../../app/controllers/dashboard/administrador/account/autenticacion_portodo.php"); 
    $maestro = new Maestros();//INCLUIMOS LOS MODELOS 
    if(isset($_GET['id'])){ 
        if($maestro->setId($_GET['id'])){
            if(isset($_POST['buscar'])){
                $_POST = $maestro->validateForm($_POST);
                $data = $maestro->searchSeccionesAdmin($_POST['busqueda']);
                if($data){
                    $row = count($data);
                   Page::showMessage(4, "Se encontraron $row resultados", null);
                }else{
                    Page::showMessage(4, "No se encontraron resultados", null);
                    $data = $maestro->getSeccionesAdmin(); 
                }
            }else{
                $data = $maestro->getSeccionesAdmin(); 
            }
            if($data){
                require_once("../../../app/views/dashboard/administrador/academico/secciones_view.php");
            }
            else{
                Page::showMessage(4,"No hay alumnos registrados en esta seccion","academico.php#tabsecciones");
            }  
        }
        }
        else{
            Page::showMessage(4,"No hay id","academico.php#tabsecciones");
        }
    }
   
catch(Exception $error){
    Page::showMessage(2, $error->getMessage(), "../../menu_admin.php");
 } 
 ?>