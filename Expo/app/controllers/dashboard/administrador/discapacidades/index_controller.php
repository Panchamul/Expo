<?php
    try{
        require_once("../../../app/models/discapacidades.class.php");
        require_once("../../../app/models/religiones.class.php");
        require_once("../../../app/models/estado_familiar.class.php");
        require_once("../../../app/views/dashboard/administrador/discapacidades/index_view.php");
        require_once("../../../app/controllers/dashboard/administrador/account/autenticacion_portodo.php"); 
        $discapacidades = new Discapacidad();
        $religiones = new Religion();
        $estados = new Estado();
        
        /*=====================================================================
        INICIO DE LA SECCION DE APLICACIONES POR DISCAPACIDAD
        =======================================================================*/
        //aca se verifica si apretaste el boton de busqueda por discapacidad
        if(isset($_POST['buscarDiscapacidad'])){
            $_POST = $discapacidades->validateForm($_POST);
            //Se envia el dato por medio de una busqueda de discapacidad
            $data = $discapacidades->searchDiscapacidad($_POST['buscadorDiscapacidad']);
            if($data){
                $row = count($data);
                Page::showMessage(4, "Se encontraron $row resuldatos", null);
            }else{
                Page::showMessage(4, "No se encontraron resultados", null);
                $data = $discapacidades->getDiscapacidades();
            }
        }else{
            $data = $discapacidades->getDiscapacidades();
        }

        if($data){
            require_once("../../../app/views/dashboard/administrador/discapacidades/tab_incapacidad_view.php");
        }else{
            Page::showMessage(4, "No hay discapacidades disponibles", "create.php");
        }

        /*========================================================================
        FIN DE ACCIONES POR MEDIO DE DISCAPACIDAD
        ==========================================================================*/




        /*=====================================================================
        INICIO DE LA SECCION DE APLICACIONES POR RELIGION
        =======================================================================*/
        //aca se verifica si apretaste el boton de busqueda por religion
        $dataR = $religiones->getReligiones();
        if(isset($_POST['btnSearchReligion'])){
            $_POST = $religiones->validateForm($_POST);
            //Se envia el dato por medio de una busqueda de religion
            $dataR = $religiones->searchReligion($_POST['txtSearchReligion']);
            if($dataR){
                $row = count($dataR);
                Page::showMessage(4, "Se encontraron $row resuldatos", null);
            }else{
                Page::showMessage(4, "No se encontraron resultados", null);
                $dataR = $religiones->getReligiones();
            }
        }else{
            $dataR = $religiones->getReligiones();
        }
        
        if($dataR){
            require_once("../../../app/views/dashboard/administrador/discapacidades/tab_religiones_view.php");
        }else{
            Page::showMessage(4, "No hay religiones disponibles", "create_religion.php");
        }

        /*========================================================================
        FIN DE ACCIONES POR MEDIO DE RELIGION
        ==========================================================================*/




        /*=====================================================================
        INICIO DE LA SECCION DE APLICACIONES POR ESTADO FAMILIAR
        =======================================================================*/
        //aca se verifica si apretaste el boton de busqueda por religion
        $dataE = $estados->getEstadosFamiliares();
        if(isset($_POST['btnSearchEstado'])){
            $_POST = $estados->validateForm($_POST);
            //Se envia el dato por medio de una busqueda de religion
            $dataE = $estados->searchEstadoFamiliar($_POST['txtSearchEstado']);
            if($dataE){
                $row = count($dataE);
                Page::showMessage(4, "Se encontraron $row resuldatos", null);
            }else{
                Page::showMessage(4, "No se encontraron resultados", null);
                $dataE = $estados->getEstadosFamiliares();
            }
        }else{
            $dataE = $estados->getEstadosFamiliares();
        }
        
        if($dataE){
            require_once("../../../app/views/dashboard/administrador/discapacidades/tab_estado_view.php");
        }else{
            Page::showMessage(4, "No hay estados familiares disponibles", "create_estado.php");
        }

        /*========================================================================
        FIN DE ACCIONES POR MEDIO DE ESTADO FAMILIAR
        ==========================================================================*/
    }catch(Exception $error){
        Page::showMessage(2, $error->getMessage(), null);
    }
    

?>