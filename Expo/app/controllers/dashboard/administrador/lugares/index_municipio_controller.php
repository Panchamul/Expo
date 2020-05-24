<?php
    try{
        require_once("../../../app/models/municipios.class.php");
        require_once("../../../app/controllers/dashboard/administrador/account/autenticacion_portodo.php"); 
        $municipios = new Municipio();
        
        
        /*=====================================================================
        INICIO DE LA SECCION DE APLICACIONES POR TIPO CODIGO
        =======================================================================*/
        //aca se verifica si apretaste el boton de busqueda por tipo codigo
        if(isset($_GET['id'])){
            $numero = $_GET['id'];
            $municipios->setDepartamento($_GET['id']);
            if(isset($_POST['btnBuscar'])){
                $_POST = $municipios->validateForm($_POST);
                //Se envia el dato por medio de una busqueda de tipo codigo
                $data = $municipios->searchMunicipios($_POST['txtMunicipio']);
                if($data){
                    $row = count($data);
                    Page::showMessage(4, "Se encontraron $row resuldatos", null);
                }else{
                    Page::showMessage(4, "No se encontraron resultados", null);
                    $data = $municipios->getMunicipios();
                }
            }else{
                $data = $municipios->getMunicipios();
            }

            if($data){
                require_once("../../../app/views/dashboard/administrador/lugares/index_munipicio_view.php");
            }else{
                Page::showMessage(4, "No hay municipio disponibles", "create_municipio.php?idDep=$numero");
            }
        }else{
            Page::showMessage(4, "seleccione un departamento", "menu.php");
        }

        /*========================================================================
        FIN DE ACCIONES POR MEDIO DE TIPO CODIGO
        ==========================================================================*/


    }catch(Exception $error){
        Page::showMessage(2, $error->getMessage(), null);
    }
    

?>