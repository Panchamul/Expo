<?php 
//initialize variables  
$id = $_GET['id'];
$months ='';
$expenses = '';
$revenues = '';
$dates  = '';
//Get lists from db
$sql = mysqli_query($db_conx, "SELECT COUNT(A.id) AS cantidad, A.nombre, A.apellido, D.departamento FROM alumnos A INNER JOIN municipios M USING(id) 
INNER JOIN departamentos D USING(id) GROUP BY D.id
");
//HACER UNA VISTA
while($row = mysqli_fetch_array($sql)){
	$expense	= $row['cantidad'];//Cantidad
	$date	  =  $row['departamento'];//fecha
	
	$dates = $dates.'"'.$date.'",';
	$expenses = $expenses.$expense.',';
}
$dates = trim($dates, ",");
$expenses = trim($expenses, ",");
?>