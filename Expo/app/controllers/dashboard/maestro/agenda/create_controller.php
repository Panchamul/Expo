<?php 

    try{

        require_once("../../../app/models/agenda.class.php");
        require_once("../../../app/controllers/dashboard/maestro/account/autenticacion_portodo.php");

        $agendas = new Agenda();

        if(isset($_GET['id'])){

            $numero = $_GET['id'];

            if(isset($_POST['btnGuardar'])){

                if($agendas->setTitulo($_POST['txtTitulo'])){

                    if($agendas->setCuerpo($_POST['txtCuerpo'])){

                        if($agendas->setFecha(date('Y-m-d'))){

                            if($agendas->setIdMaestro($_SESSION['id1'])){

                                if($agendas->setIdCurso($_GET['id'])){

                                    if($agendas->setEstado(0)){

                                        if($agendas->createAgenda()){

                                            Page::showMessage(1, "Creado con exito", "index_agenda.php?id=$numero");

                                        }else{

                                            Page::showMessage(2, "No se creo el aviso", null);

                                        }  

                                    }else{

                                        Page::showMessage(2, "No se creo el estado", null);

                                    }

                                }else{

                                    Page::showMessage(2, "No se creo el curso", null);

                                }

                            }else{

                                Page::showMessage(2, "No se creo el maestro", null);

                            }

                        }else{

                            throw new Exception("Error de fecha");

                        }

                    }else{

                        throw new Exception("Error en el cuerpo");

                    }

                }else{

                    throw new Exception("Error en el titulo");

                }

            }

            require_once("../../../app/views/dashboard/maestro/agenda/create_view.php");

        }else{

            Page::showMessage(2, "Selecione algun recordatorio", "index_agenda.php?id=$_GET[id]");

        }

    }catch(Exception $error){

        Page::showMessage(2, $error->getMessage(), null);

    }
 
     

?>