<?php 
require_once("../../../app/models/conexion.php");
require_once("../../../app/views/dashboard/administrador/estadisticas/index_view.php");
require_once("../../../app/views/dashboard/administrador/estadisticas/tab_estadistica2.php");
require_once("../../../app/controllers/dashboard/administrador/account/autenticacion_portodo.php"); 





try{
        require_once("../../../app/models/estudiantes.class.php");
        require_once("../../../app/models/grados.class.php");
        $estudiantes = new Estudiante();
        $grado = new Grados();


        /*=====================================================================
        INICIO DE LA SECCION DE APLICACIONES POR GRADOS
        =======================================================================*/
        //aca se verifica si apretaste el boton de busqueda por discapacidad
        if(isset($_POST['buscarGrado4'])){
            $_POST = $grado->validateForm($_POST);
            //Se envia el dato por medio de una busqueda de discapacidad
            $data5 = $grado->searchGradosAdmin($_POST['txtGrado4']);
            if($data5){
                $row4 = count($data5);
                Page::showMessage(4, "Se encontraron $row4 resuldatos", null);
            }else{
                Page::showMessage(4, "No se encontraron resultados", null);
                $data5 = $grado->getGradosAdmin();
            }
        }else{
            $data5 = $grado->getGradosAdmin();
        }

        if($data5){
            require_once("../../../app/views/dashboard/administrador/estadisticas/tab_estadistica10.php");
        }else{
            Page::showMessage(4, "No hay discapacidades disponibles", "create.php");
        }


        /*=====================================================================
        INICIO DE LA SECCION DE APLICACIONES POR GRADOS




        /*=====================================================================
        INICIO DE LA SECCION DE APLICACIONES POR GRADOS
        =======================================================================*/
        //aca se verifica si apretaste el boton de busqueda por discapacidad
        if(isset($_POST['buscarGrado2'])){
            $_POST = $grado->validateForm($_POST);
            //Se envia el dato por medio de una busqueda de discapacidad
            $data3 = $grado->searchGradosAdmin($_POST['txtGrado2']);
            if($data3){
                $row3 = count($data3);
                Page::showMessage(4, "Se encontraron $row3 resuldatos", null);
            }else{
                Page::showMessage(4, "No se encontraron resultados", null);
                $data3 = $grado->getGradosAdmin();
            }
        }else{
            $data3 = $grado->getGradosAdmin();
        }

        if($data3){
            require_once("../../../app/views/dashboard/administrador/estadisticas/tab_estadistica8.php");
        }else{
            Page::showMessage(4, "No hay discapacidades disponibles", "create.php");
        }


        /*=====================================================================
        INICIO DE LA SECCION DE APLICACIONES POR GRADOS
        =======================================================================*/
        //aca se verifica si apretaste el boton de busqueda por discapacidad
        if(isset($_POST['buscarGrado1'])){
            $_POST = $grado->validateForm($_POST);
            //Se envia el dato por medio de una busqueda de discapacidad
            $data2 = $grado->searchGradosAdmin($_POST['txtGrado1']);
            if($data2){
                $row2 = count($data2);
                Page::showMessage(4, "Se encontraron $row2 resuldatos", null);
            }else{
                Page::showMessage(4, "No se encontraron resultados", null);
                $data2 = $grado->getGradosAdmin();
            }
        }else{
            $data2 = $grado->getGradosAdmin();
        }

        if($data2){
            require_once("../../../app/views/dashboard/administrador/estadisticas/tab_estadistica6.php");
        }else{
            Page::showMessage(4, "No hay discapacidades disponibles", "create.php");
        }

        /*========================================================================
        FIN DE ACCIONES POR MEDIO DE GRADOS
        ==========================================================================*/

        /*=====================================================================
        INICIO DE LA SECCION DE APLICACIONES POR GRADOS
        =======================================================================*/
        //aca se verifica si apretaste el boton de busqueda por discapacidad
        if(isset($_POST['buscarGrado'])){
            $_POST = $grado->validateForm($_POST);
            //Se envia el dato por medio de una busqueda de discapacidad
            $data1 = $grado->searchGradosAdmin($_POST['txtGrado']);
            if($data1){
                $row1 = count($data1);
                Page::showMessage(4, "Se encontraron $row1 resuldatos", null);
            }else{
                Page::showMessage(4, "No se encontraron resultados", null);
                $data1 = $grado->getGradosAdmin();
            }
        }else{
            $data1 = $grado->getGradosAdmin();
        }

        if($data1){
            require_once("../../../app/views/dashboard/administrador/estadisticas/tab_estadistica3.php");
        }else{
            Page::showMessage(4, "No hay discapacidades disponibles", "create.php");
        }

        /*========================================================================
        FIN DE ACCIONES POR MEDIO DE GRADOS
        ==========================================================================*/

        

        /*=====================================================================
        INICIO DE LA SECCION DE APLICACIONES POR DISCAPACIDAD
        =======================================================================*/
        //aca se verifica si apretaste el boton de busqueda por discapacidad
        if(isset($_POST['buscarAlumno'])){
            $_POST = $estudiantes->validateForm($_POST);
            //Se envia el dato por medio de una busqueda de discapacidad
            $data = $estudiantes->searchEstudiantes($_POST['txtAlumno']);
            if($data){
                $row = count($data);
                Page::showMessage(4, "Se encontraron $row resuldatos", null);
            }else{
                Page::showMessage(4, "No se encontraron resultados", null);
                $data = $estudiantes->getEstudiantes();
            }
        }else{
            $data = $estudiantes->getEstudiantes();
        }

        if($data){
            
            require_once("../../../app/views/dashboard/administrador/estadisticas/tab_estadistica1.php");

        }else{
            Page::showMessage(4, "No hay discapacidades disponibles", "create.php");
        }

        /*========================================================================
        FIN DE ACCIONES POR MEDIO DE DISCAPACIDAD
        ==========================================================================*/


        

        
        

    }catch(Exception $error){
        Page::showMessage(2, $error->getMessage(), null);
    }
?>


