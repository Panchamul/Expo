<?php
    try{
        require_once("../../../app/models/codigos.class.php");
        require_once("../../../app/controllers/dashboard/maestro/account/autenticacion_portodo.php");
        $codigos = new Codigo();
        if(isset($_GET['idAlumno'])){
            if($codigos->setIdAlumno($_GET['idAlumno'])){
                if($codigos->readAlumnos()){
                }else{
                     throw new Exception("No se envia ejecuta el READ");
                }
            }else{
                throw new Exception("No se envia el dato GET");
            }
            /*========================================================================
            ESTO SUCEDE SI APRETAS EL BOTON DE EDITAR
            ==========================================================================*/
            
        }else{
            Page::showMessage(2, "Seleccione un elemento a modificar", "index_alumnos.php");
        }
        /*===========================================================================
        Mandar la informacion
        ============================================================================*/
        if($codigos->setIdTipo($_GET['tipo'])){
            if($codigos->readCodigosAsignar()){
                if($codigos->getCodigoAsignar()){

                }else{
                    throw new Exception("No fue recibido el READ DE LA ASIGNACION");    
                }
            }else{
                throw new Exception("No fue recibido el READ DE LA ASIGNACION");    
            }
        }else{
            throw new Exception("No fue recibido el tipo del set");    
        }


        /*================================================================================
        ESTO OCURRE CUANDO SE LE DA CLICK AL BOTON DE AGREGAR CODIGOA
        =================================================================================*/
        if(isset($_POST['btnEnviar'])){
            if($codigos->setIdAlumno($_GET['idAlumno'])){
                if($codigos->setIdMaestro(8)){
                    if($codigos->setIdCodigo($_POST['codigo'])){
                        if($codigos->setFecha(date('Y-m-d'))){
                            if($codigos->setDescripcion($_POST['descripcion'])){
                                if($codigos->AsignarCodigos()){
                                    Page::showMessage(1, "Codigo agregado", "index_alumnos.php");
                                }else{
                                    Page::showMessage(2, "No se agrego", "index_alumnos.php");
                                }
                            }else{
                                throw new Exception("No se enviala descripcion");
                            }
                        }else{
                            throw new Exception("No se envia el dato de la fecha");
                        }
                    }else{
                        throw new Exception("No se envia el dato del id del codigo");
                    }
                }else{
                    throw new Exception("No se envia el dato del Maestro");
                }
            }else{
                throw new Exception("No se envia el dato del alumno");
            }
        }
        /*================================================================================
        FIN OCURRE CUANDO SE LE DA CLICK AL BOTON DE AGREGAR CODIGOA
        =================================================================================*/


        require_once("../../../app/views/dashboard/maestro/codigos_maestro/asignar_view.php");
    }catch(Exception $error){
        Page::showMessage(2, $error->getMessage(), null);
    }
    
?>