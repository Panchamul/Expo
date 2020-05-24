<?php



require_once("../../app/models/logins.class.php");

require_once("../../app/helpers/random.php");

require_once("../../app/controllers/public/account/autenticacion_portodo.php");



try{



	$login = new Logins();



	if(!empty($_SESSION['id_session2']))



	{



		Page::showMessage(3,"Ya tienes una sesion iniciada","menu_principal.php");



	}



	else



	{



    if($login->getUsuariosAlumnos()){

		if(!isset($_SESSION['intentos2'])){

			$_SESSION['intentos2']=0;

		}

		if(isset($_POST['iniciar'])){

			function iniciar($login){

				if($login->setClave($_POST['clave'])){ 

					if($login->checkPasswordAlumno()){

						$_SESSION['id2'] = $login->getId();

						if($login->readBloqueo2($_SESSION['id2'])){

							$bloqueo = $login->getAutenticacion();

							if($login->readBloqueoUsuario2($_SESSION['id2'])){

								$bloqueado = $login->getBloqueo();

								if($bloqueado == 0){

									if($bloqueo != 0){

										if($login->Bloqueo2(1)){

											if($login->AutenticacionRandom2(0)){

												$_SESSION['autenticacion2']=1;

												Page::showMessage(2, "Alguien acaba de entrar en tu cuenta comienza el proceso de autenticación", "../email/index.php");

											}   

										}else{

											Page::showMessage(2, "Error al bloquear", "menuprincipal.php");

										}

									 }else{ 

										if($login->setId($_SESSION['id2'])){

											if($login->readFecha_contra2()){

												if($login->validarContraseña_fecha($login->getFechaCambio()) == true){

													$aleatorio = new CodigoRecuperacion();

													$expediente = $aleatorio->Aleatorio(); 

													if($login->AutenticacionRandom2($expediente)){

														$_SESSION['autenticacion2login'] = $expediente; 
														
														$_SESSION['al2']=$login->getId();
														$_SESSION['id_session2login']=$login->getId();

														$_SESSION['correobasepublico'] = $login->getCorreo();

														$_SESSION['usuario2login'] = $login->getUsuario(); 

														$_SESSION['nombre2login'] = $login->getNombre(); 

														$_SESSION['apellido2login'] = $login->getApellido();

														unset($_SESSION['intentos2']);

														$_SESSION['tiempo2']=time(); 

														Page::showMessage(1, "Sesion iniciada correctamente", "../autenticacion/recuperacion_contrasenia.php");

													}else{

														throw new Exception("Error al insertar random");

													}

												}else{

													unset($_SESSION['intentos2']);

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

									unset($_SESSION['id_session2']);

									unset($_SESSION['id2']);

									unset($_SESSION['usuario2']);

									Page::showMessage(2, "Esta bloqueada su cuenta envie un correo o espere 3 meses", "../inicio/index.php");   

								}

							}else{

								throw new Exception("Error de read bloqueo");

							}

						}else{

							throw new Exception("Problemas con el reasBloqueo");

						}

					}else{ 

						if(!isset($_SESSION['idintento2'])){ 

							$_SESSION['idintento2']=$login->getId();

							$_SESSION['intentos2']=$_SESSION['intentos2']+1;

						}

						else{

							if($_SESSION['idintento2']==$login->getId()){

								$_SESSION['intentos2']=$_SESSION['intentos2']+1;

							}

							else{

								$_SESSION['intentos2']=1;

								$_SESSION['idintento2']=$login->getId();

							}

						} 

						if($_SESSION['intentos2']==3){  

							ini_set('date.timezone','America/Tegucigalpa');

							$fechabloqueo = date_create('+1days')->format('Y-m-d H:i');

							unset($_SESSION['idintento2']);

							$_SESSION['intentos2']=0;

							$login->setFecha($fechabloqueo);

							if($login->renovarIntentos2()){

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



				if($login->checkUsuarioAlumno()){

					if($login->readInhabilitacion2()){  

						ini_set('date.timezone','America/Tegucigalpa');

						$fechaactual = date_create('now')->format('Y-m-d H:i');  

						if($fechaactual<$login->getFecha()){

						throw new Exception("Intentos de autenticacion agotados, puedes volver a intentar iniciar sesion hasta el ".$login->getFecha());

						}

						else{

							if($login->setFecha(null))

							if($login->renovarIntentos2()){ 

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



		Page::showMessage(3, "No hay usuarios disponibles", "register.php");



	} 



}



}catch (Exception $error){



	Page::showMessage(2, $error->getMessage(), "");



}



require_once("../../app/views/public/account/login_view.php");



?>