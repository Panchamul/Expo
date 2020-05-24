<?php
//ANIDO LA CLASE 
require_once("../../../app/models/logins.class.php");
require_once("../../../app/helpers/random.php");
require_once("../../../app/controllers/dashboard/administrador/account/autenticacion_portodo.php"); 

try{
    //ESTABLECEMOS CONDICIONES 
	if(isset($_SESSION['id_session'])){

		page::showMessage(2,"Ya tienes una sesion iniciada","../admin/menu_admin.php");

	}

	else{

		$login = new Logins;

		if($login->getUsuarios()){
			if(!isset($_SESSION['intentos'])){
				$_SESSION['intentos']=0;
			}
			if(isset($_POST['iniciar'])){
				function iniciar($login){
					if($login->setClave($_POST['clave'])){ 
						if($login->checkPasswordAdmin()){
							if($login->readBloqueo($login->getId())){
								$bloqueo = $login->getAutenticacion();
								if($login->readBloqueoUsuario($login->getId())){
									$bloqueado = $login->getBloqueo();
									if($bloqueado == 0){
										if($bloqueo != 0){
											if($login->Bloqueo(1)){
											    if($login->AutenticacionRandom(0)){
													$_SESSION['autenticacion']=1;
												Page::showMessage(2, "Alguien acaba de entrar en tu cuenta comienza el proceso de autenticación", "../email/index.php");
											    }
											}else{
												Page::showMessage(2, "Error al bloquear", "menuprincipal.php");
											}
										 }else{ 
											if($login->setId($login->getId())){
												if($login->readFecha_contra()){
													if($login->validarContraseña_fecha($login->getFechaCambio()) == true){
														$aleatorio = new CodigoRecuperacion();
														$expediente = $aleatorio->Aleatorio();
														if($login->AutenticacionRandom($expediente)){
															$_SESSION['autenticacion'] = $expediente; 
															unset($_SESSION['intentos']);
															$_SESSION['tiempo']=time(); 
															$_SESSION['idlogin']=$login->getId();
															$_SESSION['al']=$login->getId();
                                                        	$_SESSION['id_sessionlogin']=$login->getId();
                                                        	$_SESSION['usuariologin'] = $login->getUsuario(); 
                                                        	$_SESSION['nombrelogin'] = $login->getNombre(); 
                                                        	$_SESSION['apellidologin'] = $login->getApellido();
                                                        	$_SESSION['correodebase'] = $login->getCorreo();
															Page::showMessage(1, "Sesion iniciada correctamente", "../autenticacion/recuperacion_contrasenia.php");
														}else{
															throw new Exception("Error al insertar random");
														}
													}else{
														unset($_SESSION['intentos']);
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
										unset($_SESSION['id_session']);
										unset($_SESSION['id']);
										unset($_SESSION['usuario']);
										Page::showMessage(2, "Esta bloqueada su cuenta envie un correo o espere 3 meses", "index.php");   
									}
								}else{
									throw new Exception("Error de read bloqueo");
								}
							}else{
								throw new Exception("Problemas con el reasBloqueo");
							}
						}else{ 
							if(!isset($_SESSION['idintento'])){ 
								$_SESSION['idintento']=$login->getId();
								$_SESSION['intentos']=$_SESSION['intentos']+1;
							}
							else{
								if($_SESSION['idintento']==$login->getId()){
									$_SESSION['intentos']=$_SESSION['intentos']+1;
								}
								else{
									$_SESSION['intentos']=1;
									$_SESSION['idintento']=$login->getId();
								}
							} 
							if($_SESSION['intentos']==3){  
								ini_set('date.timezone','America/Tegucigalpa');
								$fechabloqueo = date_create('+1days')->format('Y-m-d H:i');
								unset($_SESSION['idintento']);
								$_SESSION['intentos']=0;
								$login->setFecha($fechabloqueo);
								if($login->renovarIntentos()){
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

					if($login->checkUsuarioAdmin()){
						if($login->readInhabilitacion()){  
							ini_set('date.timezone','America/Tegucigalpa');
							$fechaactual = date_create('now')->format('Y-m-d H:i');  
							if($fechaactual<$login->getFecha()){
							throw new Exception("Intentos de autenticacion agotados, puedes volver a intentar iniciar sesion hasta el ".$login->getFecha());
							}
							else{
								if($login->setFecha(null))
								if($login->renovarIntentos()){ 
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

		} 

	else{

		Page::showMessage(3, "No hay usuarios disponibles", "../account/register.php");

	}

	}  

}catch(Exception $error){

	Page::showMessage(2, $error->getMessage(), null);

}
//SE LLAMA A LA VISTA CORRESPONDIENTE 
require_once("../../../app/views/dashboard/administrador/account/index_view.php");

?>