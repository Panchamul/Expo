<?php 

//ANIDO LA CLASE

require_once("../../../app/models/perfiles.class.php");

require_once("../../../app/controllers/dashboard/administrador/account/autenticacion_portodo.php"); 

try{

    //aqui recolecto la id de la materia

    if(isset($_GET['id'])){

        $maestro=new perfiles();

        if($maestro->setId($_GET['id'])){

            if($maestro->readUsuarios1()){

                if(isset($_POST['actualizar'])){//si presionan el boton

                    $_POST = $maestro->validateForm($_POST);

                        if($maestro->setEstado(0)){ 

                                if($maestro->habilitarUsuarios()){//actualizo la materia

                                    Page::showMessage(1, "usuario Habilitado", "habilitar.php");

                                }else {

                                    Page::showMessage(2, "El usuario no se puede habilitar", "habilitar.php");

                                } 

                        }else {

                            throw new Exception("Nombre del usuario incorrecto");

                        }

                }

            }else{

                Page::showMessage(2,"usuario inexistente", "habilitar.php");

            }

        }else{

            Page::showMessage(2,"usuario incorrecto", "habilitar.php");

        }

    }else{

        Page::showMessage(3,"Seleccione un usuario ", "habilitar.php");

    }

}catch(Exception $error){

    Page::showMessage(2, $error->getMessage(), null);

}

//ANIDO EL FORMULARIO

require_once("../../../app/views/dashboard/administrador/admin/habilitar1.php");