<?php
//initialize variables  
$months ='';
$expenses = '';
$revenues = '';
$dates  = '';
//Get lists from db
$sql = mysqli_query($db_conx, "SELECT COUNT(A.id) AS conteeo,r.religion  FROM alumnos A inner join religiones R on R.id=A.id_religion");
//HACER UNA VISTA
while($row = mysqli_fetch_array($sql)){
	$expense	= $row['conteeo'];//Cantidad
	$date	  =  $row['religion'];//fecha
	
	$dates = $dates.'"'.$date.'",';
	$expenses = $expenses.$expense.',';
	$revenues = $revenues.$revenue.',';
}
$dates = trim($dates, ",");
$expenses = trim($expenses, ",");
$revenues = trim($revenues, ",");
?>