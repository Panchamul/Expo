<?php 
require_once("../../../app/models/maestros.class.php");
require_once("../../../app/helpers/confirmacion.class.php");
try{
    $maestro = new Maestros();
    
    $confirmacion = new Confirmacion();
    if(!isset($_POST['p'])){ 
    $_SESSION['letra1']= $confirmacion->Aleatorio(1);
    $_SESSION['letra2']= $confirmacion->Aleatorio(2);
    $_SESSION['letra3'] = $confirmacion->Aleatorio(3); 

    }
    if(isset($_POST['Agregar'])){ 
            $numeros=array();
    $numeros[0]=  $_SESSION['letra1'];
    $numeros[1]=  $_SESSION['letra2'];
    $numeros[2]= $_SESSION['letra3'];
    $confirmado = null; 
        if(empty($_POST['p'])){
			Page::showMessage(3, "Seleccione tres opciones", null);
		}else{
		    $confirmado=$_POST["p"];
		    if(count($confirmado) != 3){
		        Page::showMessage(2, "No puede seleccionar ni mas ni menos de tres elementos", null);
		    }else{
		        $numero = 0;
		        for ($i=0;$i<count($confirmado);$i++){ 
		           for($j=0;$j<count($numeros);$j++){
		               if($numeros[$j]==$confirmado[$i]){
		                   $numero++;
		               }
		           }
		        }
		        if($numero == 3){
		            if($maestro->setId($_GET['id'])){
		                if($maestro->habilitarMaestros(0)){
		                    Page::showMessage(1, "Excelente", "../maestros/menu_maestro.php");
		                    $_SESSION['id_session1'] = $_GET['id'];
		                    $_SESSION['id1'] = $_GET['id'];
							$_SESSION['usuario1'] = $_GET['usuario']; 
							$_SESSION['nombre1'] = $_GET['nombre']; 
							$_SESSION['apellido1'] = $_GET['apellido'];
							$_SESSION['autenticacion1'] = $_GET['expediente'];
		                }else{
		                    Page::showMessage(2, "Errror de habilitar", null);
		                }
		            }else{
		                Page::showMessage(2, "Errror de set", null);
		            }
		            
		        }else{
		            Page::showMessage(2, "No son correctas las selecciones asi que eres un robot".$numero, null);
		        }
		    }
		    
		} 
    }
}catch(Exception $error){
    Page::showMessage(2, $error->getMessage(), null);
}
require_once("../../../app/views/dashboard/maestro/account/confirmacion_view.php");
?>