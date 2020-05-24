<?php 
    try{
        /*=======================================================
        INICIO DE SECCION PARA PODER VER LOS FAMILIARES
        ========================================================*/
        require_once("../../../app/models/familiares.class.php");
        $familiares = new Familiar();
        require_once("../../../app/models/dt_familiar.class.php");
        $dtFamiliar = new DtFamiliar();
        require_once("../../../app/models/tipo_familiar.class.php");
        require_once("../../../app/controllers/dashboard/administrador/account/autenticacion_portodo.php"); 
        $tipo = new TipoFamiliar();
        if(isset($_GET['id'])){
            if($familiares->setId($_GET['id'])){
                if($familiares->readFamiliares()){
                    require_once("../../../app/views/dashboard/administrador/dt_familiares/update_view.php");
                }else{
                    throw new Exception("No se recolecta el read familiares");
                }
            }else{
                throw new Exception("No se recolecta el id del alumno  ");
            }

            /*=====================================================
            PARTE PARA CREAR EL DETALLE DESPUES DE PRESIONAR EL BOTON
            ======================================================*/
            
            if(isset($_POST['btnEditar'])){
                if($dtFamiliar->setIdFamiliar($_GET['id'])){
                    if($dtFamiliar->setIdTipo($_POST['tipo'])){
                        if($dtFamiliar->setEncargado($_POST['encargado'])){
                            if($dtFamiliar->updateFamiliares()){
                                Page::showMessage(1, "Modificar con exito", "../familiares/index_familiares.php");
                            }else{
                                Page::showMessage(2, "No se creo el detalle", null);
                            }  
                        }else{

                        }
                    }else{
                        throw new Exception("No se envia de forma correcta el dato estado");
                    }
                }else{
                    throw new Exception("No se envia de forma correcta");
                }
            }
            /*=====================================================
            PARTE PARA CREAR EL DETALLE DESPUES DE PRESIONAR EL BOTON
            ======================================================*/
        }else{
             Page::showMessage(2, "No se envia el get", null);
        }
        /*=======================================================
        INICIO DE SECCION PARA PODER VER LOS FAMILIARES
        ========================================================*/

        
    }catch(Exception $error){

    }
    
?>