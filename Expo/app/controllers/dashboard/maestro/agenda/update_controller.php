<?php 

    try{

        require_once("../../../app/models/agenda.class.php");
        require_once("../../../app/controllers/dashboard/maestro/account/autenticacion_portodo.php");

        $agendas = new Agenda();

        if(isset($_GET['id']) && $_GET['idCurso']){

            $numero = $_GET['id'];

            $numero1 = $_GET['idCurso'];

            if($agendas->setId($numero)){

                $agendas->readAgenda();

            }else

            {

                 Page::showMessage(2, "Error con el det id", null);

            }

            if(isset($_POST['btnEditar'])){

                if($agendas->setTitulo($_POST['txtTitulo'])){

                    if($agendas->setCuerpo($_POST['txtCuerpo'])){

                        if($agendas->setFecha(date('Y-m-d'))){

                            if($agendas->setIdMaestro($_SESSION['id1'])){

                                if($agendas->setIdCurso($_GET['id'])){

                                    if($agendas->setEstado(0)){

                                        if($agendas->updateAgenda()){

                                            Page::showMessage(1, "Creado con exito", "index_agenda.php?id=$numero1");

                                        }else{

                                            Page::showMessage(2, "No se creo ek familiar", null);

                                        }  

                                    }else{

                                        Page::showMessage(2, "No se creo ek familiar", null);

                                    }

                                }else{

                                    Page::showMessage(2, "No se creo ek familiar", null);

                                }

                            }else{

                                Page::showMessage(2, "No se creo ek familiar", null);

                            }

                        }else{

                            throw new Exception("Error del id alumno");

                        }

                    }else{

                        throw new Exception("Error del DUI");

                    }

                }else{

                    throw new Exception("Error del Nivel de estudio");

                }

            }

            require_once("../../../app/views/dashboard/maestro/agenda/update_view.php");

        }else{

            Page::showMessage(2, "Selecione algun recordatorio", "index_agenda.php?id=$numero1");

        }

    }catch(Exception $error){

        Page::showMessage(2, $error->getMessage(), null);

    }

   



?>