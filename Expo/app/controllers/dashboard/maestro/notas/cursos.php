<?php 
try{
    require_once("../../../app/models/cursos.class.php"); 
    require_once("../../../app/controllers/dashboard/maestro/account/autenticacion_portodo.php");
    $cursos = new Cursos();//incluimos el modelos 
    if(isset($_GET['id'])){ 
        if($cursos->setId($_GET['id'])){
            if(isset($_POST['buscar'])){
                $_POST = $cursos->validateForm($_POST);
                $data = $cursos->searchMateriasAdmin($_POST['busqueda']);
                if($data){
                    $row = count($data);
                   Page::showMessage(4, "Se encontraron $row resuldatos", null);
                }else{
                    Page::showMessage(4, "No se encontraron resultados", null);
                    $data = $cursos->getCursos1(); 
                }
            }else{
                $data = $cursos->getCursos1(); 
            }
            if($data){
                require_once("../../../app/views/dashboard/maestro/notas/cursos_view.php");
            }
            else{
                Page::showMessage(4,"No hay cursos registrados","../cursos/create_cursos.php");
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