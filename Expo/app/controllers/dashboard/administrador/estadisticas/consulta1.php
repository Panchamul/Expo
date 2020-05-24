<?php
//initialize variables  
$id = $_GET['id'];
$months ='';
$expenses = '';
$revenues = '';
$dates  = '';
//Get lists from db
$sql = mysqli_query($db_conx, "SELECT count(H.id) as CantidadCodigos, A.nombre, A.apellido, C.codigo,T.tipo, G.grado  
FROM alumnos A  INNER JOIN historial_codigos H on h.id_alumno=A.id inner join codigos C on C.id=h.id_codigo 
INNER JOIN tipo_codigo T on T.id=C.id_tipo INNER JOIN secciones S  on S.id_alumno=A.id INNER JOIN grados G
on G.id=S.id_grado WHERE A.id = $id group by T.id ASC");
//HACER UNA VISTA
while($row = mysqli_fetch_array($sql)){
	$expense	= $row['CantidadCodigos'];//Cantidad
	$date	  =  $row['tipo'];//fecha
	
	$dates = $dates.'"'.$date.'",';
	$expenses = $expenses.$expense.',';
	$revenues = $revenues.$revenue.',';
}
$dates = trim($dates, ",");
$expenses = trim($expenses, ",");
$revenues = trim($revenues, ",");
?>