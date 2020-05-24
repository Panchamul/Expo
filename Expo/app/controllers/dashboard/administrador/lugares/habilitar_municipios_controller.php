<?php
    try{
        require_once("../../../app/models/municipios.class.php");
        require_once("../../../app/controllers/dashboard/administrador/account/autenticacion_portodo.php"); 
        $municipios = new Municipio();
        if($municipios->setDepartamento($_GET['idDep'])){
            $data = $municipios->getMunicipiosNulas();    
        }else{
            Page::showMessage(2, "No se  resultados", "menu.php");
        }
        
        if($data){
           require_once("../../../app/views/dashboard/administrador/lugares/habilitar_municipios_view.php");
        }else{
            Page::showMessage(2, "No se encontraron resultados", "menu.php");
        }

    }catch(Exception $error){

    }
  
     
?>