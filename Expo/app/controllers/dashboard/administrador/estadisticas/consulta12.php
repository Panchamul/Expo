<?php 
//initialize variables  
$id = $_GET['id'];
$months ='';
$expenses = '';
$revenues = '';
$dates  = '';
//Get lists from db
$sql = mysqli_query($db_conx, "SELECT  COUNT(A.id) AS cantidad, A.nombre, A.apellido, M.municipio  FROM alumnos A INNER JOIN municipios M 
USING(id) INNER JOIN departamentos D USING(id) INNER JOIN secciones S USING(id) INNER JOIN grados G WHERE G.id = $id GROUP BY D.id");
//HACER UNA VISTA
while($row = mysqli_fetch_array($sql)){
	$expense	= $row['cantidad'];//Cantidad
	$date	  =  $row['municipio'];//fecha
	
	$dates = $dates.'"'.$date.'",';
	$expenses = $expenses.$expense.',';
	$revenues = $revenues.$revenue.',';
}
$dates = trim($dates, ",");
$expenses = trim($expenses, ",");
$revenues = trim($revenues, ",");
?>