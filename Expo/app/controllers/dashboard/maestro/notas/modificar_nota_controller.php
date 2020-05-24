<?php 

//ANIDO LA CLASE

require_once("../../../app/models/notas.class.php");

require_once("../../../app/controllers/dashboard/maestro/account/autenticacion_portodo.php");

try{

    //aqui recolecto la id de la materia

    if(isset($_GET['id'])){
        $_SESSION['devol']=$_GET['evalu'];
        $perfiles=new Notas();

        if($perfiles->setId($_GET['id']) && $perfiles->setTipo($_GET['evalu'])){

            if($perfiles->readNotas()){

                if(isset($_POST['actualizar'])){//si presionan el boton

                    $_POST = $perfiles->validateForm($_POST); 
                    if($_POST['nombre']>=0 && $_POST['nombre']<=10){
                    if($perfiles->setMateria($_POST['nombre'])){

                        if($perfiles->updateNotas()){//actualizo la materia

                            Page::showMessage(1, "calificacion Actualizada", "seccion.php?id=$_SESSION[devol] ");

                        }else {

                            Page::showMessage(2, "La calificacion no se puede actualizar", "seccion.php?id=$_SESSION[devol]");

                        } 

                    } 
                    else{

                        throw new Exception("no se pudo poner la nota");

                    }
                }
                
                else{
                    throw new Exception("Ingresa una calificacion valida");
                }  

                }

            }else{

                Page::showMessage(2,"Este alumno aun no tiene una calificacion asignada", "seccion.php?id=$_SESSION[devol]");

            }

        }else{

            Page::showMessage(2,"datos incorrectos", "seccion.php?id=$_SESSION[devol]");

        }

    }else{

        Page::showMessage(3,"Seleccione un alumno", "seccion.php?id=$_SESSION[devol]");

    }

}catch(Exception $error){

    Page::showMessage(2, $error->getMessage(), null);

}

//ANIDO EL FORMULARIO

require_once("../../../app/views/dashboard/maestro/notas/modificar_nota_view.php");

?>