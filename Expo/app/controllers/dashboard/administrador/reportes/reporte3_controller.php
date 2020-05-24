<?php 
try{
    require_once("../../../app/models/codigos.class.php");
    $codigo=new Codigo();
    if(isset($_POST['imprimir1'])){ 
        if($_POST['fecha']>$_POST['fecha1']){
            page::showMessage(2,"Ingresa un rango de fechas valido",null);
        }
        else{ 
            if($codigo->setId($_POST['grados1'])){
                if($codigo->readGrados2()){
                    $_SESSION['grados1']=$codigo->getCodigo();
                    $_SESSION['grados']=$_POST['grados1'];
                    $_SESSION['fecha1']=$_POST['fecha'];
                    $_SESSION['fecha2']=$_POST['fecha1']; 
                    echo"<script language='javascript'>window.open('../../../app/views/dashboard/administrador/reportespdf/reporte33.php','_blank')</script>";
                    }
            }  
           }
    }
}
catch(Exception $error){
    Page::showMessage(2, $error->getMessage(), null);
}

require_once("../../../app/views/dashboard/administrador/reportes/reporte3.php");
?>