<?php 
    require_once("../../../app/models/database.class.php");
    require_once("../../../app/helpers/validator.class.php");
    require_once("../../../app/helpers/component.class.php");

    class Page extends Component{
        public static function encabezadoAdmin($title){
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
                    <link rel="stylesheet" href="../../../web/css/materialize.min.css" rel="stylesheet"> 
                    <link rel="stylesheet" href="../../../web/css/Estilos1.css">  
                    <link rel="stylesheet" href="../../../web/css/es1.css"> 
                    <link rel="stylesheet" href="../../../web/css/material-icons.css">  
                    <link rel="stylesheet" href="../../../web/css/sweetalert2.min.css">  
                     <link rel="stylesheet" href="../../../web/css/jquery.dataTables.min.css">
                    <script src="../../../web/js/sweetalert.min.js"></script> 
                </head>
                <body> 
                    <!--inicio del menu y del header--> 
                    <header>
                        <div class="navbar-fixed ">
                            <nav class="indigo darken-4"> 
                                <div class="nav-wrapper "> 
                                    <a href="#" data-activates="mobile-demo" class="button-collapse right"><i class="material-icons">menu</i></a>
                                    <a href="#!" class="brand-logo left"><img class=" responsive-img" src="../../../web/img/logo3.png"></a>  
                                    ');
                                    if(isset($_SESSION['usuario'])){
                                        $nombre = $_SESSION['nombre'];  
                                        $apellido=$_SESSION['apellido'];  
                                        print("
                                        <ul class=' right hide-on-med-and-down'>   
                                            <li><a href='../admin/menu_admin.php'>Inicio</a> </li>  
                                            <li><a class='dropdown-button' href='#!' data-activates='dropdown4'>Administradores<i class='material-icons right tamanio'>arrow_drop_down</i></a></li>
                                            <li><a class='dropdown-button' href='#!' data-activates='dropdown3'>Maestros<i class='material-icons right tamanio'>arrow_drop_down</i></a></li>
                                            <li><a class='dropdown-button' href='#!' data-activates='dropdown2'>Alumnos<i class='material-icons right tamanio'>arrow_drop_down</i></a></li>
                                            <li><a class='dropdown-button' href='#!' data-activates='dropdown1'>$nombre $apellido<i class='material-icons right tamanio'>arrow_drop_down</i><i class='material-icons right tamanio'>account_circle</i></a></li>
                                        </ul> 
                                    </div> 
                                </nav>
                            </div>
                            <!-- Dropdown Structure -->
                            <ul id='dropdown1' class='dropdown-content'>
                                <li><a href='../account/perfil.php?id=$_SESSION[id]'>Mi Perfil</a></li> 
                                <li class='divider'></li>
                                <li><a href='../account/contrasenia.php'>Cambiar contraseña</a></li> 
                                <li class='divider'></li>
                                <li><a href='../account/logout.php'>Cerrar Sesion</a></li>
                            </ul>
                            <ul id='dropdown2' class='dropdown-content'>
                                <li><a href='../estudiantes/create.php'>Agregar Alumno</a></li> 
                                <li><a href='../estudiantes/index_estudiantes.php'>Eliminar/Modificar Alumno</a></li> 
                            </ul>
                            <ul id='dropdown4' class='dropdown-content'>
                                <li><a href='../admin/create.php'>Agregar administradores</a></li> 
                                <li><a href='../admin/admin_index.php'>Eliminar/Modificar administradores</a></li> 
                            </ul>
                            <ul id='dropdown3' class='dropdown-content'>
                                <li><a href='../maestro/agregar_maestro.php'>Agregar maestros</a></li> 
                                <li><a href='../maestro/ver_maestro.php'>Eliminar/Modificar maestros</a></li> 
                            </ul>
                                <ul class='side-nav ' id='mobile-demo'>
                                <li><a href='../admin/menu_admin.php'>Inicio</a> </li>  
                                <li><a href='../maestro/ver_maestro.php' >Maestros</a></li>
                                <li><a href='../estudiantes/index_estudiantes.php'>Alumnos</a></li>
                                <li><a href='../account/perfil.php?id=$_SESSION[id]'>Mi perfil</a></li> 
                                <li><a href='../account/contrasenia.php'>Cambiar contraseña</a></li> 
                                <li><a href='../account/logout.php'>Cerrar Sesion</a></li>
                              </ul>  
                        </header>  
                                        ");
                                    }
                                    else{
                                        print(" 
                                    </div> 
                                </nav>
                            </div>  
                                        ");
                                        $filename = basename($_SERVER['PHP_SELF']);
                                if($filename != "index.php" && $filename!="register.php" && $filename!="contra2.php"&& $filename!="recuperacion_contra.php"&& $filename!="recuperacion_contrasenia.php"&& $filename!="recuperacion_final.php"){
                                self::showMessage(3, "¡Debe iniciar sesión!", "../account/index.php");
                                self::footerMaestro();
                                exit;
                                    }
                                }  
        }
        
        
        
        
        
        
        
        
        
        
        
        
        public static function encabezadoSimple($title){
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
                    <link rel="stylesheet" href="../../../web/css/materialize.min.css" rel="stylesheet"> 
                    <link rel="stylesheet" href="../../../web/css/Estilos1.css">  
                    <link rel="stylesheet" href="../../../web/css/es1.css"> 
                    <link rel="stylesheet" href="../../../web/css/material-icons.css">  
                    <link rel="stylesheet" href="../../../web/css/sweetalert2.min.css"> 
                     <link rel="stylesheet" href="../../../web/css/jquery.dataTables.min.css">
                    <script src="../../../web/js/sweetalert.min.js"></script> 
                </head>
                <body> 
                    <!--inicio del menu y del header--> 
                    <header>
                        <div class="navbar-fixed ">
                            <nav class="indigo darken-4"> 
                                <div class="nav-wrapper "> 
                                    <a href="#" data-activates="mobile-demo" class="button-collapse right"><i class="material-icons">menu</i></a>
                                    <a href="#!" class="brand-logo left"><img class=" responsive-img" src="../../../web/img/logo3.png"></a>  
                                    ');
                                    if(isset($_SESSION['usuario'])){
                                        $nombre = $_SESSION['nombre'];  
                                        $apellido=$_SESSION['apellido'];  
                                        print("
                                        
                                    </div> 
                                </nav>
                            </div>
                            <!-- Dropdown Structure -->
                              
                        </header>  
                                        ");
                                    }
                                    else{
                                        print(" 
                                    </div> 
                                </nav>
                            </div>  
                                        ");
                                        $filename = basename($_SERVER['PHP_SELF']);
                                if($filename != "index.php" && $filename!="register.php" && $filename!="contra2.php"&& $filename!="recuperacion_contra.php"&& $filename!="recuperacion_contrasenia.php"&& $filename!="recuperacion_final.php"){
                                self::showMessage(3, "¡Debe iniciar sesión!", "../account/index.php");
                                self::footerMaestro();
                                exit;
                                    }
                                }  
        }
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        

        public static function footerAdmin(){
            print('<!-- inicio del footer-->
                    <footer class="page-footer #1a237e indigo darken-4" id="myFooter">
                        <div class="container">
                            <div class="row">
                                <div class="col l6 col m6 col s12">
                                    <h5>Inicio</h5>
                                        <ul>
                                            <li><a href="../account/index.php">Pagina Principal</a></li>  
                                        </ul>
                                </div> 
                                <div class="col l6  col m6 col s12 ">
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
                                            <a href="../account/index.php"> <h5>COLEGIO SAN FRANCISCO DE ASIS</h5></a> 
                                        </div>   
                                        <div class="col m3 col s6  offset-m3">
                                            <a href="https://www.facebook.com/Colegio-San-Francisco-De-Asis-1009831572481382/"target="_blank" ><img src="../../../web/img/descarga.png" class="ajuste "></a>  
                                        </div> 
                                    </div>  
                                </div>
                            </div>
                    </footer>
                    <!--archivos javascript importantes-->
                  
                    <script src="../../../web/js/jquery.min.js"></script>
                    <script src="../../../web/js/materialize.min.js"></script>  
                    <script src="../../../web/js/main.js"></script>  
                    <script src="../../../web/js/jquery.dataTables.min.js"></script>  
                <script src="../../../web/js/tabla.js"></script>
                </body>     
            </html>
            ');
        }
    }
?>