<?php
require_once("../../app/models/logins.class.php"); 
try{
    $admin = new Logins();
    if(isset($_SESSION['id2'])){
        if($admin->setId($_SESSION['id2'])){
            if($admin->readBloqueo2($_SESSION['id2'])){
                $codigo = $admin->getAutenticacion();
                if($codigo != $_SESSION['autenticacion2']){
                    if($admin->Bloqueo2(1)){ 
                        unset($_SESSION['id_session2']);
                        unset($_SESSION['id2']);
                        unset($_SESSION['usuario2']);
                            if($admin->AutenticacionRandom2(0)){
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
    if (isset($_SESSION['id_session2'])) {

    $tiempo2=time()-$_SESSION['tiempo2'];  
    if($tiempo2<2323232323232323300){ 
        $_SESSION['tiempo2']=time();
    }
    else{
        $admin=new Logins();
        if(isset($_SESSION['id2'])){
            if($admin->setId($_SESSION['id2'])){
        if($admin->AutenticacionRandom2(0)){ 
            $_SESSION['autenticacion2']=0;
        unset($_SESSION['id_session2']);
        unset($_SESSION['id2']);
        unset($_SESSION['nombre2']);
        unset($_SESSION['apellido2']);
        unset($_SESSION['usuario2']);
        unset($_SESSION['tiempo2']);                           
        page::showMessage(2,"Tiempo de inactividad excedido,cerrando sesion..","../account/login.php");
    }
}
}
}
    }
    
}catch (Exception $error){
	Page::showMessage(2, $error->getMessage(), "");
}

?>