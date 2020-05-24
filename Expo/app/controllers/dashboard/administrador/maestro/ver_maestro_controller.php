<?php 
try{
    require_once("../../../app/models/maestros.class.php"); 
    require_once("../../../app/controllers/dashboard/administrador/account/autenticacion_portodo.php"); 
    $maestro = new Maestros();//incluimos los modelos  
    if(isset($_POST['buscar'])){
        $_POST = $maestro->validateForm($_POST);
        $data = $maestro->searchMaestrosAdmin($_POST['busqueda']);
        if($data){
            $row = count($data);
           Page::showMessage(4, "Se encontraron $row resultados", null);
        }else{
            Page::showMessage(4, "No se encontraron resultados", null);
            $data = $maestro->getMaestrosAdmin(); 
        }
    }else{
        $data = $maestro->getMaestrosAdmin(); 
    }
    if($data){
		require_once("../../../app/views/dashboard/administrador/maestro/maestros_view.php");
    }
    else{
        Page::showMessage(4,"No hay maestros registrados","agregar_maestro.php");
    }  
}catch(Exception $error){
    Page::showMessage(2, $error->getMessage(), "../../../menu_admin.php");
 } 
 ?>