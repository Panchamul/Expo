<?php
$months ='';
$expenses = '';
$revenues = '';
$dates  = '';
//Get lists from db
$sql = mysqli_query($db_conx, "SELECT COUNT(H.id) AS CantidadCodigos, A.nombre, A.apellido, C.codigo,T.tipo, G.grado  
FROM alumnos A INNER JOIN codigos C USING(id) INNER JOIN historial_codigos H USING(id) 
INNER JOIN tipo_codigo T USING(id) INNER JOIN secciones S USING(id) INNER JOIN grados G
USING(id) WHERE C.id_tipo = 3 GROUP BY A.id ASC LIMIT 10");
//HACER UNA VISTA
while($row = mysqli_fetch_array($sql)){
	$expense	= $row['CantidadCodigos'];//Cantidad
	$date	  =  $row['nombre'];//fecha
	
	$dates = $dates.'"'.$date.'",';
	$expenses = $expenses.$expense.',';
	$revenues = $revenues.$revenue.',';
}
$dates = trim($dates, ",");
$expenses = trim($expenses, ",");
$revenues = trim($revenues, ",");