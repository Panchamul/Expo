<?php 
//initialize variables  
$months ='';
$expenses = '';
$revenues = '';
$dates  = '';
//Get lists from db
$sql = mysqli_query($db_conx, "SELECT COUNT(A.id)cantidad  , A.genero FROM alumnos A GROUP BY A.genero");
//HACER UNA VISTA
while($row = mysqli_fetch_array($sql)){
	$expense	= $row['cantidad'];//Cantidad
	$date	  =  $row['genero'];//fecha
	
	$dates = $dates.'"'.$date.'",';
	$expenses = $expenses.$expense.',';
	$revenues = $revenues.$revenue.',';
}
$dates = trim($dates, ",");
$expenses = trim($expenses, ",");
$revenues = trim($revenues, ",");
?>