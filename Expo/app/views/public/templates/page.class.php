<?php 
    require_once("../../app/models/database.class.php");
    require_once("../../app/helpers/validator.class.php");
    require_once("../../app/helpers/component.class.php");

    class Page extends Component{
        public static function Encabezado($title){
            session_start();
            ini_set("date.timezone","America/El_Salvador");
            print('<!DOCTYPE html>
                    <html lang="es">
                    <head>
                    <!--cosas necesarias-->
                        <meta charset="utf-8">
                        <meta http-equiv="X-UA-Compatible" content="IE=edge">
                        <meta name="viewport" content="width=device-width, initial-scale=1">
                        <title>Colegio san francisco de asis</title>
                        <link rel="stylesheet" href="../../web/css/materialize.min.css" rel="stylesheet"> 
                        <link rel="stylesheet" href="../../web/css/Estilos1.css"> 
                        <link rel="stylesheet" href="../../web/css/es1.css">   
                        <link rel="stylesheet" href="../../web/css/material-icons.css">
                        <link rel="stylesheet" href="../../web/css/sweetalert2.min.css">  
                    <script src="../../web/js/sweetalert.min.js"></script>   
                    </head>
                    <body> 
                        <!--inicio del menu y del header--> 
                        <header>
                            <div class="navbar-fixed ">
                            <nav class="teal"> 
                            <div class="nav-wrapper "> 
                                <a href="#" data-activates="mobile-demo" class="button-collapse right"><i class="material-icons">menu</i></a>
                                <a href="#!" class="brand-logo left"><img class=" responsive-img" src="../../web/img/logo3.png"></a>  
                                
                            '); 
                            if (isset($_SESSION['id_session2'])) {
                                //asignar a variable
                                $usernameSesion = $_SESSION['nombre2'];  
                                $apellido=$_SESSION['apellido2'];    
                                print("  
                                        <ul class=' right hide-on-med-and-down'>   
                                        <li><a href='../account/menu_principal.php'>Inicio</a> </li>
                                        <li><a href='../agenda/cursos.php?id=$_SESSION[id2]'>Agenda</a></li> 
                                        <li><a href='../codigos/index_codigos.php?id=$_SESSION[id2]'>Conducta</a></li> 
                                        <li><a class='dropdown-button ' data-beloworigin='true' href='#!' data-activates='dropdown1'>$usernameSesion $apellido<i class='material-icons right tamanio'>arrow_drop_down</i><i class='material-icons right tamanio'>account_circle</i></a></li>
                                        </ul> 
                                    </div> 
                                </nav>
                            </div> 
                            <!-- Dropdown Structure -->
                            <ul id='dropdown1' class='dropdown-content fixed'>
                            <li class=''> <a href='../account/perfil.php?id=$_SESSION[id2]'>Mi Perfil</a></li> 
                            <li class='divider'></li>
                            <li class=''> <a href='../account/contrasenia.php'>Cambia contraseña</a></li> 
                            <li class='divider'></li>
                            <li><a href='../account/logout.php'>Cerrar Sesion</a></li>
                            </ul>
                                <ul class='side-nav ' id='mobile-demo'>
                                <li><a href='../account/menu_principal.php'>Inicio</a> </li>
                                <li><a href='../agenda/cursos.php?id=$_SESSION[id2]'>Agenda</a></li> 
                                <li><a href='../codigos/index_codigos.php?id=$_SESSION[id2]'>Conducta</a></li>  
                                <li><a href='../account/perfil.php?id=$_SESSION[id2]'>Mi perfil</a></li> 
                                <li><a href='../account/contrasenia.php'>Cambiar contraseña</a></li>
                                <li><a href='../account/logout.php'>Cerrar Sesion</a></li> 
                                </ul>  
                        </header> 
                            ");
                        }else{
                            print('
                            <ul class=" right hide-on-med-and-down">   
                            <li><a href="../inicio/index.php">Inicio</a> </li>
                            <li><a href="../inicio/oferta_academica.php">Oferta academica</a></li> 
                            <li><a href="../inicio/institucion.php">Institucion</a></li> 
                            <li><a href="../inicio/equipo_trabajo.php">Desarrolladores</a></li> 
                            <li><a href="../account/login.php">Ingresar</a></li>
                            </ul> 
                        </div> 
                    </nav>
                </div>  
                    <ul class="side-nav " id="mobile-demo">
                    <li><a href="../inicio/index.php">Inicio</a> </li>
                    <li><a href="../inicio/oferta_academica.php">Oferta academica</a></li> 
                    <li><a href="../inicio/institucion.php">Institucion</a></li> 
                    <li><a href="../inicio/equipo_trabajo.php">Desarrolladores</a></li> 
                    <li><a href="../account/login.php">Ingresar</a></li>
                    </ul>  
                            ');
        $filename = basename($_SERVER['PHP_SELF']);
        if($filename != "login.php" && $filename!="contra2.php"&& $filename!="preguntas.php" && $filename!="oferta_academica.php" && $filename!="institucion.php" && $filename != "equipo_trabajo.php" && $filename!="index.php" && $filename!="recuperacion_contra.php" && $filename!="recuperacion_contrasenia.php" && $filename!="recuperacion_final.php"){
        self::showMessage(3, "¡Debe iniciar sesión!", "../account/login.php");
        self::Footer();
        exit;
                    } 
                        } 
        }




        public static function EncabezadoSimple($title){
            session_start();
            ini_set("date.timezone","America/El_Salvador");
            print('<!DOCTYPE html>
                    <html lang="es">
                    <head>
                    <!--cosas necesarias-->
                        <meta charset="utf-8">
                        <meta http-equiv="X-UA-Compatible" content="IE=edge">
                        <meta name="viewport" content="width=device-width, initial-scale=1">
                        <title>Colegio san francisco de asis</title>
                        <link rel="stylesheet" href="../../web/css/materialize.min.css" rel="stylesheet"> 
                        <link rel="stylesheet" href="../../web/css/Estilos1.css"> 
                        <link rel="stylesheet" href="../../web/css/es1.css">   
                        <link rel="stylesheet" href="../../web/css/material-icons.css">
                        <link rel="stylesheet" href="../../web/css/sweetalert2.min.css">  
                    <script src="../../web/js/sweetalert.min.js"></script>   
                    </head>
                    <body> 
                        <!--inicio del menu y del header--> 
                        <header>
                            <div class="navbar-fixed ">
                            <nav class="teal"> 
                            <div class="nav-wrapper "> 
                                <a href="#" data-activates="mobile-demo" class="button-collapse right"><i class="material-icons">menu</i></a>
                                <a href="#!" class="brand-logo left"><img class=" responsive-img" src="../../web/img/logo3.png"></a>  
                                
                            '); 
                            if (isset($_SESSION['id_session2'])) {
                                print('
                            
                        </div> 
                    </nav>
                </div>  
                    
                            ');
        $filename = basename($_SERVER['PHP_SELF']);
        if($filename != "login.php" && $filename!="contra2.php"&& $filename!="preguntas_frecuentes.php" && $filename!="oferta_academica.php" && $filename!="institucion.php" && $filename != "equipo_trabajo.php" && $filename!="index.php" && $filename!="recuperacion_contra.php" && $filename!="recuperacion_contrasenia.php" && $filename!="recuperacion_final.php"){
        self::showMessage(3, "¡Debe iniciar sesión!", "../account/login.php");
        self::Footer();
        exit;
                    } 
                        
                                
                        }else{
                            print('
                            
                        </div> 
                    </nav>
                </div>  
                    
                            ');
        $filename = basename($_SERVER['PHP_SELF']);
        if($filename != "login.php" && $filename!="contra2.php"&& $filename!="preguntas_frecuentes.php" && $filename!="oferta_academica.php" && $filename!="institucion.php" && $filename != "equipo_trabajo.php" && $filename!="index.php" && $filename!="recuperacion_contra.php" && $filename!="recuperacion_contrasenia.php" && $filename!="recuperacion_final.php"){
        self::showMessage(3, "¡Debe iniciar sesión!", "../account/login.php");
        self::Footer();
        exit;
                    } 
                        } 
        }









        public static function footer(){
            print('
                            <!-- inicio del footer-->
                    <footer class="page-footer teal" id="myFooter">
                        <div class="container">
                            <div class="row">
                                <div class="col l3 col m2 col s12">
                                    <h5>Inicio</h5>
                                        <ul>
                                            <li><a href="../inicio/index.php">Pagina Principal</a></li>  
                                        </ul>
                                </div>
                                <div class="col l3 col m3 col s12">
                                    <h5>Conocenos</h5>
                                        <ul>
                                            <li><a href="../inicio/institucion.php">Mision, Vision y Valores </a></li>  
                                            <li><a href="../inicio/equipo_trabajo.php">Desarrolladores</a></li>  
                                        </ul>
                                </div>
                                <div class="col l3 col m3 col s12">
                                    <h5>Soporte </h5>
                                    <ul>
                                        <li><a href="../preguntas/preguntas.php">Preguntas frecuentes</a></li> 
                                     </ul>
                                </div>
                                <div class="col l3  col m4 col s12 ">
                                    <h5>Contactanos</h5>
                                    <p> Telefono: (+503)2272-0779</p>
                                    <p> Direccion: Urbanizacion Bonanza 1, calle Poniente, #29 (1,31 km) Ayutuxtepeque</p>
                                    <p> Correo: sanfrancisco@hotmail.com</p>
                                </div>
                            </div>
                        </div>
                            <div class="footer-copyright"> <!--segunda fila del footer-->
                                <div class="container">
                                    <div class="row">
                                        <div class="col m6 col s6">
                                            <a href="../inicio/index.php"> <h5>COLEGIO SAN FRANCISCO DE ASIS</h5></a> 
                                        </div>   
                                        <div class="col m3 col s6  offset-m3">
                                            <a href="https://www.facebook.com/Colegio-San-Francisco-De-Asis-1009831572481382/"target="_blank" ><img src="../../web/img/descarga.png" class="ajuste "></a>  
                                        </div> 
                                    </div>  
                                </div>
                            </div>
                    </footer>
                    <!--archivos javascript importantes-->
                    <script src="../../web/js/jquery.min.js"></script>
                    <script src="../../web/js/materialize.min.js"></script> 
                    <script src="../../web/js/main.js"></script> 
                </body>     
            </html>
            ');
        }
    }
?>