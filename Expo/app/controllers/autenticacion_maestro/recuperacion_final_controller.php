<?php
//Llamamos a la clase "Correo"
require_once("../../../app/models/correo.class.php");
try{
    //Establecemos condiciones para el proceso de recuperación de contrasena 
    $correos = new Correo();
    if(isset($_POST['terminar'])){
        if($_POST['contrasenia1'] == $_POST['contrasenia2']){
            if($correos->setContra($_POST['contrasenia1'])){
                if($correos->setId($_GET['id'])){
                    if($correos->updateContraMaestro()){
                        Page::showMessage(1, "Su contraseña fue modificada", '../account/index.php' );
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
//Una vez el proceso se completa correctamente se mostrará el menú 
require_once("../../../app/views/dashboard/maestro/maestros/menu_maestro.php");
?>