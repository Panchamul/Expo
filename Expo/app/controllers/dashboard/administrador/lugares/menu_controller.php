<?php
    try{
        require_once("../../../app/models/zonas.class.php");
        require_once("../../../app/models/departamentos.class.php");
        require_once("../../../app/views/dashboard/administrador/lugares/menu_view.php");
        require_once("../../../app/controllers/dashboard/administrador/account/autenticacion_portodo.php"); 
        $zonas = new Zona();
        $departamentos = new Departamento();
        
        
        /*=====================================================================
        INICIO DE LA SECCION DE APLICACIONES POR TIPO CODIGO
        =======================================================================*/
        //aca se verifica si apretaste el boton de busqueda por tipo codigo
        if(isset($_POST['btnZona'])){
            $_POST = $zonas->validateForm($_POST);
            //Se envia el dato por medio de una busqueda de tipo codigo
            $dataZona = $zonas->searchZonas($_POST['txtZona']);
            if($dataZona){
                $row = count($dataZona);
                Page::showMessage(4, "Se encontraron $row resuldatos", null);
            }else{
                Page::showMessage(4, "No se encontraron resultados", null);
                $dataZona = $zonas->getZonas();
            }
        }else{
            $dataZona = $zonas->getZonas();
        }

        if($dataZona){
            require_once("../../../app/views/dashboard/administrador/lugares/index_zonas_view.php");
        }else{
            Page::showMessage(4, "No hay zonas disponibles", "create_zona.php");
        }

        /*========================================================================
        FIN DE ACCIONES POR MEDIO DE TIPO CODIGO
        ==========================================================================*/




        /*=====================================================================
        INICIO DE LA SECCION DE APLICACIONES POR TIPO FAMILIAR
        =======================================================================*/
        //aca se verifica si apretaste el boton de busqueda por tipo familiar
        $dataDep = $departamentos->getDepartamentos();
        if(isset($_POST['btnDep'])){
            $_POST = $departamentos->validateForm($_POST);
            //Se envia el dato por medio de una busqueda de tipo familiar
            $dataDep = $departamentos->searchDepartamentos($_POST['txtDep']);
            if($dataDep){
                $row = count($dataDep);
                Page::showMessage(4, "Se encontraron $row resuldatos", null);
            }else{
                Page::showMessage(4, "No se encontraron resultados", null);
                $dataDep = $departamentos->getDepartamentos();
            }
        }else{
            $dataDep = $departamentos->getDepartamentos();
        }
        
        if($dataDep){
            require_once("../../../app/views/dashboard/administrador/lugares/index_departamentos_view.php");
        }else{
            Page::showMessage(4, "No hay departamentos disponibles", "create_departamentos.php");
        }

        /*========================================================================
        FIN DE ACCIONES POR MEDIO DE TIPO FAMILIAR
        ==========================================================================*/




        /*=====================================================================
        INICIO DE LA SECCION DE APLICACIONES POR TIPO PRUEBAS
        =======================================================================*/
        //aca se verifica si apretaste el boton de busqueda por religion
        /*$TipoPR = $tipoPruebas->getTipoPrueba();
        if(isset($_POST['btnPruebas'])){
            $_POST = $tipoPruebas->validateForm($_POST);
            //Se envia el dato por medio de una busqueda de religion
            $TipoPR = $tipoPruebas->searchTipoPrueba($_POST['txtPrueba']);
            if($TipoPR){
                $row = count($TipoPR);
                Page::showMessage(4, "Se encontraron $row resuldatos", null);
            }else{
                Page::showMessage(4, "No se encontraron resultados", null);
                $TipoPR = $tipoPruebas->getTipoPrueba();
            }
        }else{
            $TipoPR = $tipoPruebas->getTipoPrueba();
        }
        
        if($TipoPR){
            require_once("../../../app/views/dashboard/administrador/tipos/index_tipo_prueba_view.php");
        }else{
            Page::showMessage(4, "No hay tipo de pruebas  disponibles", "create_tipo_prueba.php");
        }*/

        /*========================================================================
        FIN DE ACCIONES POR MEDIO DE ESTADO TIPO PRUEBAS
        ==========================================================================*/



        /*=====================================================================
        INICIO DE LA SECCION DE APLICACIONES POR PREGUNTAS FRECUENTES
        =======================================================================*/
        //aca se verifica si apretaste el boton de busqueda por preguntas frecuentes
        /*$PR = $preguntas->getPreguntas();
        if(isset($_POST['btnPreguntas'])){
            $_POST = $preguntas->validateForm($_POST);
            //Se envia el dato por medio de una busqueda de preguntas frecuentes
            $PR = $preguntas->searchPreguntas($_POST['txtPreguntas']);
            if($PR){
                $row = count($PR);
                Page::showMessage(4, "Se encontraron $row resuldatos", null);
            }else{
                Page::showMessage(4, "No se encontraron resultados", null);
                $PR = $preguntas->getPreguntas();
            }
        }else{
            $PR = $preguntas->getPreguntas();
        }
        
        if($PR){
            require_once("../../../app/views/dashboard/administrador/tipos/index_preguntas_frecuentes_view.php");
        }else{
            Page::showMessage(4, "No hay preguntas frecuentes disponibles", "create_preguntas_frecuentes.php");
        }
        */
        /*========================================================================
        FIN DE ACCIONES POR MEDIO DE ESTADO PREGUNTAS FRECUENTES
        ==========================================================================*/
    }catch(Exception $error){
        Page::showMessage(2, $error->getMessage(), null);
    }
    

?>