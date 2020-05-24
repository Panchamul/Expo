<?php
//ANIDO LA CLASE
require_once("../../../app/models/materias.class.php"); 
require_once("../../../app/controllers/dashboard/administrador/account/autenticacion_portodo.php"); 
try{
    $materias = new Materias;
    if(isset($_POST['buscar'])){
        $_POST = $materias->validateForm($_POST);//RALIZAMOS LAS VALIDACIONES 
        $data = $materias->searchMateriasAdmin1($_POST['busqueda']);
        if($data){
            $row = count($data);
           Page::showMessage(4, "Se encontraron $row resultados", null);
        }else{
            Page::showMessage(4, "No se encontraron resultados", null);
            $data = $materias->getMateriasAdmin1(); 
        }
    }else{
        $data = $materias->getMateriasAdmin1(); 
    }
    if($data){
		require_once("../../../app/views/dashboard/administrador/academico/habilitar_materias.php");
    }
    else{
        Page::showMessage(4,"No hay materias dadas de baja","academico.php");
    } 
   
}catch(Exception $error){
   Page::showMessage(2, $error->getMessage(), "academico");
} 
?>