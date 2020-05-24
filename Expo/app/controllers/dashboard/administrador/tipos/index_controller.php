<?php
    try{
        require_once("../../../app/models/tipo_codigo.class.php");
        require_once("../../../app/models/tipo_familiar.class.php");
        require_once("../../../app/models/tipo_prueba.class.php");
        require_once("../../../app/models/preguntas_frecuentes.class.php");
        require_once("../../../app/views/dashboard/administrador/tipos/index_view.php");
        require_once("../../../app/controllers/dashboard/administrador/account/autenticacion_portodo.php"); 
        $tipoCodigos = new TipoCodigo();
        $tipoFamiliares = new TipoFamiliar();
        $tipoPruebas = new TipoPrueba();
        $preguntas = new Pregunta();
        
        /*=====================================================================
        INICIO DE LA SECCION DE APLICACIONES POR TIPO CODIGO
        =======================================================================*/
        //aca se verifica si apretaste el boton de busqueda por tipo codigo
        if(isset($_POST['btnCodigo'])){
            $_POST = $tipoCodigos->validateForm($_POST);
            //Se envia el dato por medio de una busqueda de tipo codigo
            $codigoD = $tipoCodigos->searchTipoCodigo($_POST['txtCodigo']);
            if($codigoD){
                $row = count($codigoD);
                Page::showMessage(4, "Se encontraron $row resuldatos", null);
            }else{
                Page::showMessage(4, "No se encontraron resultados", null);
                $codigoD = $tipoCodigos->getTipoCodigo();
            }
        }else{
            $codigoD = $tipoCodigos->getTipoCodigo();
        }

        if($codigoD){
            require_once("../../../app/views/dashboard/administrador/tipos/index_tipo_codigo_view.php");
        }else{
            Page::showMessage(4, "No hay tipos de codigos disponibles", "create_tipo_codigo.php");
        }

        /*========================================================================
        FIN DE ACCIONES POR MEDIO DE TIPO CODIGO
        ==========================================================================*/




        /*=====================================================================
        INICIO DE LA SECCION DE APLICACIONES POR TIPO FAMILIAR
        =======================================================================*/
        //aca se verifica si apretaste el boton de busqueda por tipo familiar
        $TipoFR = $tipoFamiliares->getTipoFamiliar();
        if(isset($_POST['btnTipoReligion'])){
            $_POST = $tipoFamiliares->validateForm($_POST);
            //Se envia el dato por medio de una busqueda de tipo familiar
            $TipoFR = $tipoFamiliares->searchTipoFamiliar($_POST['txtReligion']);
            if($TipoFR){
                $row = count($TipoFR);
                Page::showMessage(4, "Se encontraron $row resuldatos", null);
            }else{
                Page::showMessage(4, "No se encontraron resultados", null);
                $TipoFR = $tipoFamiliares->getTipoFamiliar();
            }
        }else{
            $TipoFR = $tipoFamiliares->getTipoFamiliar();
        }
        
        if($TipoFR){
            require_once("../../../app/views/dashboard/administrador/tipos/index_tipo_familiar_view.php");
        }else{
            Page::showMessage(4, "No hay tipo familiar disponibles", "create_tipo_familiar.php");
        }

        /*========================================================================
        FIN DE ACCIONES POR MEDIO DE TIPO FAMILIAR
        ==========================================================================*/




        /*=====================================================================
        INICIO DE LA SECCION DE APLICACIONES POR TIPO PRUEBAS
        =======================================================================*/
        //aca se verifica si apretaste el boton de busqueda por religion
        $TipoPR = $tipoPruebas->getTipoPrueba();
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
        }

        /*========================================================================
        FIN DE ACCIONES POR MEDIO DE ESTADO TIPO PRUEBAS
        ==========================================================================*/



        /*=====================================================================
        INICIO DE LA SECCION DE APLICACIONES POR PREGUNTAS FRECUENTES
        =======================================================================*/
        //aca se verifica si apretaste el boton de busqueda por preguntas frecuentes
        $PR = $preguntas->getPreguntas();
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

        /*========================================================================
        FIN DE ACCIONES POR MEDIO DE ESTADO PREGUNTAS FRECUENTES
        ==========================================================================*/
    }catch(Exception $error){
        Page::showMessage(2, $error->getMessage(), null);
    }
    

?>