<?php   
require_once("../../../../../libraries/fpdf.php"); 
require_once("../../../../../app/models/database.class.php");
require_once("../../../../../app/helpers/validator.class.php"); 
require_once("../../../../../app/models/reportes.class.php");  
class PDF extends FPDF {
function Header()
{ 
    if($this->PageNo()==1){
    // fuente del header 
    $this->SetFont('Arial','B',11.5);
    //lineas paralelas(x1,y1,x2,y2) 
    $this->SetLineWidth(0.04);//ancho de las lineas
    $this->Line(1.1,1.2,20.5,1.2);
    $this->Line(1.1,4.6,20.5,4.6);
    // Logo(ruta,posicion x,y,proporcion  de la imagen)
    $this->Image('../../../../../web/img/logo4.png',1.2,1.4,3);  
    // Titulo
    date_default_timezone_set("America/Tegucigalpa");
    $this->Cell(7);
    $fecha=date("d-m-Y ");
    $Hora=date("h:i a");  
    // celda(ancho en cm,alto en cm,texto para mostrar,borde,ajustar celda,alineacion de la celda,color de fondo)
    $this->Cell(5,0.9,'COLEGIO SAN FRANCISCO DE ASIS ',0,0,'C',false); 
    $this->Cell(5.5);    
    $this->Cell(0,0.9,'Fecha: '.$fecha,0,1,'R',false); 
    $this->Cell(7.1);    
    $this->Cell(5,0.9,'Urbanizacion Bonanza 1, calle Poniente, #29 Ayutuxtepeque',0,0,'C',false);
    $this->Cell(0,0.9,'Hora: '.$Hora,0,1,'R',false);    
    $this->Cell(0,0.9,utf8_decode('Correo : sanfrancisco@hotmail.com'),0,0,'C',false); 
    $this->Cell(0,0.9,'Telefono: (+503)2272-0779',0,1,'R',false);
    $this->Cell(0,0.9,'Usuario: '.$_SESSION['usuario'],0,0,'C',false);
    // Line break
    $this->Ln(1.5);
    }
}
function titulo()
{ 
    // fuente del header 
    $this->SetFont('Arial','B',14);   
    // celda(ancho en cm,alto en cm,texto para mostrar,borde,ajustar celda,alineacion de la celda,color de fondo)
    $this->Cell(0,1,'Listado de alumnos  ',0,0,'C',false);  
    $this->Ln();  
}
// Page footer
function Footer()
{ //posicion 
    $this->SetY(-2.5);
    // Arial
    $this->SetFont('Arial','B',14); 
    $this->Cell(0,0.9,utf8_decode('"Donde hay caridad y sabiduría, no hay temor ni ignorancia."'),0,2,'C',false);
    // Page number
    $this->Cell(0,0.9,'Pagina '.$this->PageNo().' de {De}',0,0,'C');
} 
 
// Tabla coloreada
function tabla1($header1,$data1)  
{ 
    // Colores, ancho de línea y fuente en negrita
    $this->SetFillColor(53,60,140);
    $this->SetTextColor(255);
    $this->SetDrawColor(0,0,0);
    $this->SetLineWidth(0.04);
    $this->SetFont('Arial','B',11.5);
    // Cabecera
    $w = array(2,8,4,5.2);
    for($i=0;$i<count($header1);$i++) 
    $this->Cell($w[$i],1,$header1[$i],1,0,'C',true);
    $this->Ln(); 
    // Restauración de colores y fuentes
    $this->SetFillColor(148,169,190);
    $this->SetTextColor(0);
    $this->SetFont('');
    // Datos
    $fill = false;
    $w=array(2,8,4,5.2);
    foreach($data1 as $row)
    {      
         $this->Cell($w[0],1.6,$row[0],'LR',0,'C',$fill);
        $this->Cell($w[1],1.6,$row[1]." ".$row[2],'LR',0,'C',$fill);
        $this->Cell($w[2],1.6,$row[3],'LR',0,'C',$fill);
        $this->Cell($w[3],1.6,$row[5],'LR',0,'C',$fill);    
        $this->Ln();
        $fill = !$fill;
    }
    // Línea de cierre 
    $this->Cell(array_sum($w),0,'','T');
}
}
//llamamos la instancia de la clase(orientacion de la pagina,unidad de medida,tamaño de la pagina) 
$fpdf= new PDF('p','cm','Letter'); 
//le asignamos margenes a la pagina
$fpdf->setMargins(1.1,1.1,1.1);
$fpdf->setTitle('Lista de alumnos');
$fpdf->AliasNbPages('{De}');
//crea una pagina nueva si el contenido excede a la primera
$fpdf->SetAutoPageBreak(true, 3); 
//agregamos una nueva pagina al pdf 
session_start();
$codigos= new reportes();  
$data1=$codigos->get_registro($_POST['Grados']);  
$fpdf->AddPage();  
$fpdf->titulo();   
if($data1!=null){ 
$jeje=null; 
foreach($data1 as $row){
    $jeje=$row['grado'];
}
$fpdf->Cell(0,1,$jeje,0,1,"C",false);

$fpdf->Ln(1);
$header = array("Codigo","Nombre","NIE","Carnet"); 
$fpdf->tabla1($header,$data1);  

$fpdf->Ln(1);      
}
else{
    $fpdf->Ln(5);
    $fpdf->setFont('Arial','B',20);
    $fpdf->Cell(0,1,'No hay alumnos registrados',0,1,'C',false);
}
// celda(ancho en mm,alto en mm,texto para mostrar,borde,ajustar celda,alineacion de la celda,color de fondo)
 $fpdf->Output(); 
?>