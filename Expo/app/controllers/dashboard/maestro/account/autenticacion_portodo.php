<?php

require_once("../../../app/models/logins.class.php"); 

try{

    $admin = new Logins();

    if(isset($_SESSION['id1'])){

        if($admin->setId($_SESSION['id1'])){

            if($admin->readBloqueo1($_SESSION['id1'])){

                $codigo = $admin->getAutenticacion();

                if($codigo != $_SESSION['autenticacion1']){

                    if($admin->Bloqueo1(1)){ 

                        unset($_SESSION['id_session1']);

                        unset($_SESSION['id1']);

                        unset($_SESSION['usuario1']);

                            if($admin->AutenticacionRandom1(0)){

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

    if (isset($_SESSION['id_session1'])) {



    $tiempo2=time()-$_SESSION['tiempo1'];  

    if($tiempo2<3232323232300){ 

        $_SESSION['tiempo1']=time();

    }

    else{

        $admin=new Logins();

        if(isset($_SESSION['id1'])){

            if($admin->setId($_SESSION['id1'])){

        if($admin->AutenticacionRandom1(0)){ 

            $_SESSION['autenticacion1']=0;

        unset($_SESSION['id_session1']);

        unset($_SESSION['id1']);

        unset($_SESSION['nombre1']);

        unset($_SESSION['apellido1']);

        unset($_SESSION['usuario1']);

        unset($_SESSION['tiempo1']);                           

        page::showMessage(2,"Tiempo de inactividad excedido,cerrando sesion..","../account/index.php");

    }

}

}

}

    }

    

}catch (Exception $error){

	Page::showMessage(2, $error->getMessage(), "");

}



?>