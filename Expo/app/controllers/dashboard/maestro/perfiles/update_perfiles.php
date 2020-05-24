<?php 

//ANIDO LA CLASE

require_once("../../../app/models/notas.class.php");
require_once("../../../app/controllers/dashboard/maestro/account/autenticacion_portodo.php");

try{

    //aqui recolecto la id de la materia

    if(isset($_GET['id'])){

        $perfiles=new Notas();

        if($perfiles->setId($_GET['id'])){

            if($perfiles->readPerfiles()){

                if(isset($_POST['actualizar'])){//si presionan el boton

                    $_POST = $perfiles->validateForm($_POST);

                        if($perfiles->setPerfil($_POST['nombre'])){ 

                            if($perfiles->setTipo($_POST['tipos'])){

                                if($perfiles->setCurso($_POST['cursos'])){

                                    if($perfiles->setMes($_POST['meses'])){ 


                                            if($perfiles->updatePerfiles()){//actualizo la materia

                                                Page::showMessage(1, "Perfil Actualizado", "perfiles.php?id=$_SESSION[id1] ");

                                            }else {

                                                Page::showMessage(2, "El perfil no se puede actualizar", "perfiles.php?id=$_SESSION[id1]");

                                            }  

                                    }

                                    else{

                                        throw new Exception("no se pudo poner el mes");

                                    } 

                                } 

                                else{

                                    throw new Exception("no se puede definir el curso");

                                }

                            }else{

                                throw new Exception("tipo de perfil incorrecto");

                            }

                                

                        }else {

                            throw new Exception("Nombre del perfil incorrecto");

                        }

                }

            }else{

                Page::showMessage(2,"Perfil inexistente", "perfiles.php?id=$_SESSION[id1]");

            }

        }else{

            Page::showMessage(2,"perfil incorrecto", "perfiles.php?id=$_SESSION[id1]");

        }

    }else{

        Page::showMessage(3,"Seleccione una perfil", "perfiles.php?id=$_SESSION[id1]");

    }

}catch(Exception $error){

    Page::showMessage(2, $error->getMessage(), null);

}

//ANIDO EL FORMULARIO

require_once("../../../app/views/dashboard/maestro/perfiles/actualizar_perfiles_view.php");

?>