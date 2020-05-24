<?php 

try{

    require_once("../../app/models/notas.class.php"); 
    require_once("../../app/controllers/public/account/autenticacion_portodo.php");
    $notas = new notas();//incluimos los modelos  

    if(isset($_GET['periodo'])){ 

        $valor=$_GET['periodo'];

        switch($valor){

            case "Primer periodo":

            $mes1=0;//enero y febrero

            $mes=3;

            break;

            case "Segundo periodo":

            $mes1=2;//marzo,abril,mayo

            $mes=6;

            break;

            case "Tercer periodo":

            $mes1=5;// junio,julio,agosto

            $mes=9;

            break;

            case "Cuarto periodo":

            $mes1=8;// septiembre,octubre

            $mes=11;

            break;

            default:

            page::showMessage(4,"No hay un periodo seleccionado","../account/menu_principal.php");

        }

        if($notas->setId($_SESSION['id2'])){

            if($notas->setTipo($mes1))

            {

                if($notas->setMes($mes)){

                    $data=$notas->getNotasAlumno();

                }  

            } 

        }

    }

    else{

        page::showMessage(4,"No hay un periodo seleccionado","../account/menu_principal.php");

    } 

    if($data){

		require_once("../../app/views/public/notas/index_notas.php");

    }

    else{

        Page::showMessage(4,"No hay notas asignadas aun en este periodo","../account/menu_principal.php");

    }  

}catch(Exception $error){

    Page::showMessage(2, $error->getMessage(), "../../../menu_admin.php");

 } 

 ?>