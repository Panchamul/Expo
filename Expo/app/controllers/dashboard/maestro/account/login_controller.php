<?php

require_once("../../../app/models/logins.class.php");
require_once("../../../app/helpers/random.php");
require_once("../../../app/controllers/dashboard/maestro/account/autenticacion_portodo.php");

try{

	$login = new Logins();

	if(!empty($_SESSION['id1']))

	{

		Page::showMessage(3,"Ya tienes una sesion iniciada","../maestros/menu_maestro.php");

	}

	else

	{

    if($login->getUsuariosAlumnos()){
		if(!isset($_SESSION['intentos1'])){
			$_SESSION['intentos1']=0;
		}
		$tiposr =  null;
		if(isset($_POST['iniciar'])){
			function iniciar($login){
				if($login->setClave($_POST['clave'])){ 
					if($login->checkPasswordMaestro()){
						if($login->readBloqueo1($login->getId())){
							$bloqueo = $login->getAutenticacion();
							if($login->readBloqueoUsuario1($login->getId())){
								$bloqueado = $login->getBloqueo();
								if($bloqueado == 0){
									if($bloqueo != 0){
										if($login->Bloqueo1(1)){
											if($login->AutenticacionRandom1(0)){
												$_SESSION['autenticacion1']=1;
											Page::showMessage(2, "Alguien acaba de entrar en tu cuenta comienza el proceso de autenticación", "../email/index.php");
										
										}
									}
										else{
											Page::showMessage(2, "Error al bloquear", "menuprincipal.php");
										}
									 }else{ 
										if($login->setId($login->getId())){
											if($login->readFecha_contra1()){
												if($login->validarContraseña_fecha($login->getFechaCambio()) == true){
													
													if(true){
													    $login->setId($login->getId());
													    if($login->readEstadoUsuarios()){
													        $tiposr = $login->getEstado(); 
													        $aleatorio = new CodigoRecuperacion();
													        $expediente = $aleatorio->Aleatorio(); 
													        if($tiposr == 0){
													            
													            $login->AutenticacionRandom1($expediente);
													                $tiposr = $login->getEstado();
            														$_SESSION['autenticacion1login'] = $expediente;
            														$_SESSION['correodebasemaestro'] = $login->getCorreo();
            															$_SESSION['al1']=$login->getId();
            														$_SESSION['id1login']=$login->getId();
            														$_SESSION['id_session1login']=$login->getId();
            														$_SESSION['usuariologin'] = $login->getUsuario();
            														$_SESSION['idlogin'] = $login->getId();
            														$_SESSION['nombrelogin'] = $login->getNombre();
            														$_SESSION['apellidologin'] = $login->getApellido();
            														unset($_SESSION['intentos1']);
            														$_SESSION['tiempo1']=time(); 
            														Page::showMessage(1, "Sesion iniciada correctamente",  "../autenticacion/recuperacion_contrasenia.php");    
													            
													            
													            
													        }else if($tiposr == 3){
													            $login->AutenticacionRandom1($expediente);
													            $_SESSION['autenticacion1'] = $expediente; 
													            $tiposr = $login->getEstado();
													            unset($_SESSION['intentos1']);
        														$_SESSION['tiempo1']=time(); 
        														$_SESSION['id1login']=$login->getId();
        														$_SESSION['usuariologin'] = $login->getUsuario();
        														$_SESSION['idlogin'] = $login->getId();
        														$_SESSION['nombrelogin'] = $login->getNombre();
        														$_SESSION['apellidologin'] = $login->getApellido();
													            Page::showMessage(2, "Tienes que autentificar tu cienta de correo", "../autenticacion/index.php");
													        }else{
													            Page::showMessage(2, "El usuario esta dehabilitado         cominicate con tu sipervisor", null);
													        }
													    }else{
													        Page::showMessage(2, "ERRROR EN READ ESTADO", null);
													    }
    														
													}else{
														throw new Exception("Error al insertar random");
													}
												}else{
													unset($_SESSION['intentos1']);
													Page::showMessage(2, "Expiro el tiempo de tu contraseña cambiela ahora", "../account/contra2.php");
												}
											}else{
												throw new Exception("Error de fecha contraseña");
											}
										}else{
											throw new Exception("Er");
										} 	
									}
								}else{
									unset($_SESSION['id_session1']);
									unset($_SESSION['id1']);
									unset($_SESSION['usuario1']);
									Page::showMessage(2, "Esta bloqueada su cuenta envie un correo o espere 3 meses", "../email/index.php");   
								}
							}else{
								throw new Exception("Error de read bloqueo");
							}
						}else{
							throw new Exception("Problemas con el reasBloqueo");
						}
					}else{ 
						if(!isset($_SESSION['idintento1'])){ 
							$_SESSION['idintento1']=$login->getId();
							$_SESSION['intentos1']=$_SESSION['intentos1']+1;
						}
						else{
							if($_SESSION['idintento1']==$login->getId()){
								$_SESSION['intentos1']=$_SESSION['intentos1']+1;
							}
							else{
								$_SESSION['intentos1']=1;
								$_SESSION['idintento1']=$login->getId();
							}
						} 
						if($_SESSION['intentos1']==3){  
							ini_set('date.timezone','America/Tegucigalpa');
							$fechabloqueo = date_create('+1days')->format('Y-m-d H:i');
							unset($_SESSION['idintento1']);
							$_SESSION['intentos1']=0;
							$login->setFecha($fechabloqueo);
							if($login->renovarIntentos1()){
								throw new Exception("Intentos de autenticacion agotados, puedes volver a intentar iniciar sesion hasta el ".$fechabloqueo);
							}
						}
						throw new Exception("Clave inexistente");
					}
				}else{
					throw new Exception("Clave menor a 6 caracteres");
				}
			} 


			$_POST = $login->validateForm($_POST);

			if($login->setUsuario($_POST['alias'])){

				if($login->checkUsuarioMaestro()){ 
					if($login->readInhabilitacion1()){  
						ini_set('date.timezone','America/Tegucigalpa');
						$fechaactual = date_create('now')->format('Y-m-d H:i');  
						if($fechaactual<$login->getFecha()){
						throw new Exception("Intentos de autenticacion agotados, puedes volver a intentar iniciar sesion hasta el ".$login->getFecha());
						}
						else{
							if($login->setFecha(null))
							if($login->renovarIntentos1()){ 
							iniciar($login);
							}
						}
					}
					else{ 
						iniciar($login);
					}
				}else{

					throw new Exception("Alias inexistente");

				}

			}else{

				throw new Exception("Alias incorrecto");

			}

		}

	}else{

		Page::showMessage(3, "No hay usuarios disponibles", null);

	} 

}

}catch (Exception $error){

	Page::showMessage(2, $error->getMessage(), "");

}

require_once("../../../app/views/dashboard/maestro/account/login_view.php");

?>