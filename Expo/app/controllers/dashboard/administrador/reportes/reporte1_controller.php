<?php 
try{
    require_once("../../../app/models/notas.class.php");
    require_once("../../../app/views/dashboard/administrador/reportes/reporte1.php");
    $notas=new notas();
    if(isset($_POST['imprimir'])){
        if($notas->setPerfil($_POST['txtcarnet'])){ 
            if($notas->checkCarnet()){   
                $_SESSION['Periodos']=$_POST['Periodos'];
                $_SESSION['txtcarnet']=$_POST['txtcarnet'];
                $_SESSION['nombre']=$notas->getId();
                $_SESSION['apellido']=$notas->getPerfil();
                $_SESSION['grado']=$notas->getTipo();
                echo"<script language='javascript'>window.open('../../../app/views/dashboard/administrador/reportespdf/reporte1.php','_blank')</script>";
             }  
            else{
                Page::showMessage(2,"Ingresa un carnet valido",null);
            }
        }
    }
}
catch(Exception $error){
    Page::showMessage(2, $error->getMessage(), null);
}
?>