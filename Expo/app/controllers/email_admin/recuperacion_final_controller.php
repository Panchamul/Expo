<?php
require_once("../../../app/models/correo.class.php");
try{
    $correos = new Correo();
    if(isset($_POST['terminar'])){
        if($_POST['contrasenia1'] == $_POST['contrasenia2']){
            if($correos->setContra($_POST['contrasenia1'])){
                if($correos->setId($_GET['id'])){
                    if($correos->updateContraAdmin()){
                        if($correos->estadoAdmin($_GET['id'])){
                            Page::showMessage(1, "Su contraseña fue modificada", '../account/index.php' );
                        }else{
                            Page::showMessage(3, "ADIOS", '../account/index.php' );
                        }
                        
                    }else{
                        throw new Exception("Error al modificar la contraseña");
                    }
                }else{
                    throw new Exception("Error al enviar la ID");
                }
        }else{
            throw new Exception("Tiene que tener mas de 6 digitos con mayuscula y minuscula");
        }
        }else{
            throw new Exception("Tienen que ser contraseñas iguales");
        }
    }
}catch(Exception $error){
    Page::showMessage(2, $error->getMessage(), null);
}
require_once("../../../app/views/public/email/correo_final_view.php");
?>