<?php
//ANIDO LA CLASE 
require_once("../../../app/models/perfiles.class.php");
try{
    $permisos=new Perfiles();
    if($permisos->setId($_SESSION['id'])){
    $permisosdisponibles=$permisos->getPermisos(); 
     } 
     if(isset($_SESSION['permiso'])){ 
        $permisos->comprobarpermisos($_SESSION['permiso'],$permisosdisponibles);  
		unset($_SESSION['permiso']); 
     }
     if(isset($_SESSION['permisocrear'])){
        $permisos->comprobarpermisos($_SESSION['permisocrear'],$permisosdisponibles);  
		unset($_SESSION['permisocrear']); 
     }
     if(isset($_SESSION['permisomodificar'])){
        $permisos->comprobarpermisos($_SESSION['permisomodificar'],$permisosdisponibles);  
		unset($_SESSION['permisomodificar']); 
     }
     if(isset($_SESSION['permisoborrar'])){
        $permisos->comprobarpermisos($_SESSION['permisoborrar'],$permisosdisponibles);  
		unset($_SESSION['permisoborrar']); 
     }
}
catch(Exception $error){
    Page::showMessage(2, $error->getMessage(), null);
} 

?>