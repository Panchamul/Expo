<?php 
try{
    //Llamamos: clases, vistas y modelos a utilizar 
    require_once("../../../app/models/materias.class.php");
    require_once("../../../app/models/grados.class.php");
    require_once("../../../app/models/oferta.class.php");
    require_once("../../../app/views/dashboard/administrador/academico/academico_view.php");
    require_once("../../../app/controllers/dashboard/administrador/account/autenticacion_portodo.php"); 
    $materias = new Materias();//incluimos los modelos de las tabs 
    $grados= new Grados();
    $oferta=new Oferta();
    if(isset($_POST['buscar'])){
        $_POST = $materias->validateForm($_POST);
        $data = $materias->searchMateriasAdmin($_POST['busqueda']);
        if($data){
            $row = count($data);
           Page::showMessage(4, "Se encontraron $row resuldatos", null);
        }else{
            Page::showMessage(4, "No se encontraron resultados", null);
            $data = $materias->getMateriasAdmin(); 
        }
    }else{
        $data = $materias->getMateriasAdmin(); 
    }
    if($data){
		require_once("../../../app/views/dashboard/administrador/academico/materias_view.php");
    }
    else{
        Page::showMessage(4,"No hay materias registradas","create_materias.php");
    }   
    // Aca inicia el apartado de los grados
    if(isset($_POST['buscar1'])){
        $_POST = $grados->validateForm($_POST);
        $data1 = $grados->searchGradosAdmin($_POST['busqueda1']);
        if($data1){
            $row = count($data1);
            echo"<script language='javascript'>window.location='academico.php#tabgrados'</script>;";
           Page::showMessage(4, "Se encontraron $row resultados", null);
        }else{
            echo"<script language='javascript'>window.location='academico.php#tabgrados'</script>;";
            Page::showMessage(4, "No se encontraron resultados", null);
            $data1 = $grados->getGradosAdmin(); 
        }
    }else{
        $data1 = $grados->getGradosAdmin(); 
    }
    if($data1){
        //Aquí llamamos a las vistas 
        require_once("../../../app/views/dashboard/administrador/academico/grados_views.php");
        require_once("../../../app/views/dashboard/administrador/academico/secciones_views.php");
    }
    else{
        Page::showMessage(4,"No hay grados registrados","create_grados.php");
    } 

    $data2=$oferta->getOfertasAdmin();
    // Aca inicia la parte de los grados 
    if(isset($_POST['buscar3'])){
        $_POST = $oferta->validateForm($_POST);
        $data2 = $oferta->searchOfertasAdmin($_POST['busqueda3']);
        if($data2){
            $row = count($data2);
           Page::showMessage(4, "Se encontraron $row resultados", null);
           echo"<script language='javascript'>window.location='academico.php#taboferta'</script>;";

        }else{
            Page::showMessage(4, "No se encontraron resultados", null);
            $data2 = $oferta->getOfertasAdmin(); 
            echo"<script language='javascript'>window.location='academico.php#taboferta'</script>;";
        }
    }else{
        $data2 = $oferta->getOfertasAdmin(); 
    }
    if($data2){
		require_once("../../../app/views/dashboard/administrador/academico/oferta_view.php");
    }
    else{
        Page::showMessage(4,"No hay ofertas academicas registradas","create_oferta.php");
    } 
}catch(Exception $error){
   Page::showMessage(2, $error->getMessage(), "../../menu_admin.php");
} 
?>