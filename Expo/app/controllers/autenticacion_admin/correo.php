<?php
//Llamamos a los campos para la autentecación por correo 
//Llamamos a la clase 'Correo'
require_once("../../../app/models/correo.class.php");
 require_once("../../../app/helpers/random.php");
//Llamamos al random
try{
 $correos = new Correo();
    $codigo1 = new CodigoRecuperacion();
    if($correos->readCorreoAdminf($_SESSION['al'])){
    }
$correo = $correos->getCount();
$codigo = null;
$nombre = null;
$id = null; 
$mail = new PHPMailer\PHPMailer\PHPMailer(); 
$aleatorio = $codigo1->Aleatorio();
if($correos->setCodigo($aleatorio)){
     if($correos->setCorreo($correo)){
         if(!isset($_SESSION['codigo2'])){
                                if($correos->updateCodigoAdmin()){
                                }
         }
     }
if($correos->readCodigoAdmin($correo)){
    $codigo = $correos->getCodigo();
    $nombre = $correos->getNombre();
    $id = $correos->getId();
    $_SESSION['codigo2']=1;
}else{

}
$mail->isSMTP();
/*
Enable SMTP debugging
0 = off (for production use)
1 = client messages
2 = client and server messages
*/
$mail->SMTPDebug = 0;
$mail->Host = 'smtp.gmail.com';
$mail->Port = 587;
$mail->SMTPSecure = 'tls';
$mail->SMTPAuth = true;
$mail->Username = "colegiosanfranciscosv2@gmail.com";
$mail->Password = "Pxndx124";
$mail->setFrom('colegiosanfranciscosv2@gmail.com', 'Colegio San francisco');
$mail->addAddress($correo, $nombre);
$mail->Subject = 'Asunto';
$mail->Body = '<style>
h1{
bgcolor: red; 
}</style>
                <h1>Ingrese este codigo en la caja de texto de la aplicacion<h1><h2>'.$codigo.'</h2>';
$mail->CharSet = 'UTF-8'; // Con esto ya funcionan los acentos
$mail->IsHTML(true);

if (!$mail->send())
{
    echo "Error al enviar el E-Mail: ".$mail->ErrorInfo;
}
else
{
    print('<main>
    <!--Especificacion para el fondo-->
    <div class=" bg ">
        <div class="row ">
            <div class="col l3 col m2 col s12 ">  </div>
                <div class="col l6 col m8 col s12 ">
                <!--aca inicia el formulario-->
                <form method="post" class=" alto1 form-contenedor" autocomplete="off">
                    <div class="row">
                        <!--Titulo dentro del formulario-->
                        <h5 align=center class="col s12 ">Ingrese el codigo</h5>
                        <div class="input-field col s12 alto3">
                        <!--Logo o icono del input-->
                        <i class="material-icons prefix">account_circle</i>
                        <input id="codigo" name="codigo" type="number" class="validate"  required>
                        <!--Label del usuario-->
                        <label for="correo" class="ajuste">Codigo</label>
                        <!--Secccion del menu principal-->
                        <div class="col s11 col m10 col l8 offset-m2 offset-s1 offset-l3 ">
                        <button class = "waves-effect waves-light btn black alto3" type="submit" name="comparar">Validar correo</button>
                        </div> 
                    </div> 
                </form>
                <!--aca termina el formulario-->
                </div>
            <div class="col-md-4 col-sm-4 col-xs-12"></div>
        </div>
    </div>
</main> 
');

}
if(isset($_POST['comparar'])){
    if($_POST['codigo']== $codigo){
        $_SESSION['id']=$_SESSION['idlogin'];
		$_SESSION['id_session']=$_SESSION['id_sessionlogin'];
		$_SESSION['usuario'] = $_SESSION['usuariologin']; 
		$_SESSION['nombre'] = $_SESSION['nombrelogin']; 
		$_SESSION['apellido'] = $_SESSION['apellidologin'];
		unset($_SESSION['al']);
		unset($_SESSION['codigo2']);
         Page::showMessage(1, "Correcto puedes ingresar a tu cuenta", "../admin/menu_admin.php");
    }else{
    Page::showMessage(2,"El codigo ingresado no es valido",null);
    }
}
}
}
    catch(Exception $error){
    Page::showMessage(2, $error->getMessage(), null);
}
?>