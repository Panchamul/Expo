<?php
//ANIDAMOS LA CLASE
require_once("../../../app/models/logins.class.php"); 

try{

    $admin = new Logins();

    if(isset($_SESSION['id'])){

        if($admin->setId($_SESSION['id'])){

            if($admin->readBloqueo($_SESSION['id'])){

                $codigo = $admin->getAutenticacion();

                if($codigo != $_SESSION['autenticacion']){

                    if($admin->Bloqueo(1)){ 

                        unset($_SESSION['id_session']);

                        unset($_SESSION['id']);

                        unset($_SESSION['usuario']);

                            if($admin->AutenticacionRandom(0)){

                                Page::showMessage(2, "Alguien acaba de entrar en tu cuenta comienza el proceso de autenticación", "../email/index.php");

                            } 

                    }

                }

            }else{

                throw new Exception("problemas con el read");

            }

        }else{

            throw new Exception("problemas con insercion del id");

        }

    }else{  

       

    }

    if (isset($_SESSION['id_session'])) {



    $tiempo2=time()-$_SESSION['tiempo'];  

    if($tiempo2<3032323232323230){ 

        $_SESSION['tiempo']=time();

    }

    else{

        $admin=new Logins();

        if(isset($_SESSION['id'])){

            if($admin->setId($_SESSION['id'])){

        if($admin->AutenticacionRandom(0)){ 

            $_SESSION['autenticacion']=0;

        unset($_SESSION['id_session']);

        unset($_SESSION['id']);

        unset($_SESSION['nombre']);

        unset($_SESSION['apellido']);

        unset($_SESSION['usuario']);

        unset($_SESSION['tiempo']);                           

        page::showMessage(2,"Tiempo de inactividad excedido(5 mins),cerrando sesion..","../account/index.php");

    }

}

}

}

    }

    

}catch (Exception $error){

	Page::showMessage(2, $error->getMessage(), "");

}



?>