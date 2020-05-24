<?php

//ANIDO LA CLASE

require_once("../../../app/models/perfiles.class.php");

require_once("../../../app/controllers/dashboard/administrador/account/autenticacion_portodo.php"); 

try{

    if(isset($_GET['id'])){

        $maestro = new perfiles(); 

        if($maestro->setId($_GET['id'])){

            if($maestro->readAdmins1()){

                if(isset($_POST['Eliminar'])){

                    $_POST = $maestro->validateForm($_POST);

                    if($maestro->setEstado(1)){

                        if($maestro->deleteAdmins()){

                            Page::showMessage(1,"Administrador eliminado correctamente  ", "../admin/admin_index.php");

                        }else{

                            Page::showMessage(2,"No se logro eliminar", null);

                        }

                    }else{

                        throw new Exception("No se envia el dato del valor");

                    }

                }

            }else{

                Page::showMessage(2,"Admin inexistente","../admin/admin_index.php");

            } 

        }

    }else{

        Page::showMessage(3,"Seleccione un admin","../admin/admin_index.php");

    }

}catch(Exception $error){

    Page::showMessage(2, $error->getMessage(), null);

}

//ANIDO EL FORMULARIO

require_once("../../../app/views/dashboard/administrador/admin/delete.php");

?>