<?php 
try{
    require_once("../../../app/models/codigos.class.php");
    require_once("../../../app/views/dashboard/administrador/reportes/reporte2.php");
    $notas=new Codigo();
    if(isset($_POST['imprimir'])){
        if($notas->setIdAlumno($_POST['txtcarnet'])){ 
            if($notas->checkCarnet()){    
                $_SESSION['txtcarnet']=$_POST['txtcarnet'];
                $_SESSION['nombre']=$notas->getId();
                $_SESSION['apellido']=$notas->getCodigo();
                $_SESSION['grado']=$notas->getFoto();
                echo"<script language='javascript'>window.open('../../../app/views/dashboard/administrador/reportespdf/reporte2.php','_blank')</script>";
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