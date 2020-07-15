<?php
session_start();
if(!isset($_SESSION['empid'])) {
    header('location:emplogin.php');
}
$emp = $_SESSION['empid'];
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "dbms";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
$billid = $_SESSION['billid'];

$ss1 = "SELECT * FROM bill WHERE bill_id='$billid'";
$rr1 = mysqli_query($conn,$ss1);
$ro1 = $rr1->fetch_assoc();
$email=$ro1['buyer_mail'];

$sql1 = "SELECT * FROM usertable WHERE email='$email'";
$sql2 = "SELECT * FROM sell WHERE status=3 AND owner_id='$email' AND bill_id='$billid'";

$result1 = mysqli_query($conn,$sql1);
$result2 = mysqli_query($conn,$sql2);


$row=$result1->fetch_assoc();
require('pdf/fpdf181/fpdf.php');
//A4 width: 219mm
//default margin: 10mm wach side
//writable horizontal: 219-(10*2)=109mm
$date=$ro1['date'];
$newDate = date("d-m-Y", strtotime($date));
//$count=0;
$pdf = new FPDF('p','mm','A4');

$pdf->AddPage();

//set font to arial,bold,14pt
$pdf->SetFont('Arial','B',14);

//Cell(width, height, text,border, end_line,[align](optional)) 
$pdf->Cell(130,5,"ABC Vehicle Services",0,0);
$pdf->SetFont('Arial','BU',14);
$pdf->cell(59,5,'Acknowledgement: ',0,1);


$pdf->SetFont('Arial','',12);

$pdf->Cell(130,5,'Commercial Street',0,0);
$pdf->Cell(59,5,'',0,1);

$pdf->Cell(130,5,'Bangalore',0,0);
$pdf->Cell(25,5,'Date:',0,0);
$pdf->Cell(34,5,$newDate,0,1);

$pdf->Cell(130,5,'Karnataka',0,0);
$pdf->Cell(25,5,'Invoice #:',0,0);
$pdf->Cell(34,5,$billid,0,1);

$pdf->Cell(130,5,'560042',0,0);
$pdf->Cell(25,5,'Dealer ID:',0,0);
$pdf->Cell(34,5,$_SESSION['empid'],0,1);

//make a dummy empty cell as a vertical spacer
$pdf->Cell(189,10,'',0,1);

//billing address
$pdf->Cell(100,5,'Bill to:',0,1);

//add dummy cell at beginning of each line for indentation
$pdf->Cell(10,5,'',0,0);
$pdf->Cell(90,5,$row["fname"]." ". $row["lname"],0,1);

$pdf->Cell(10,5,'',0,0);
$pdf->Cell(90,5,$row["street"].", ".$row["city"],0,1);

$pdf->Cell(10,5,'',0,0);
$pdf->Cell(90,5,$row["state"].", ".$row["country"],0,1);

$pdf->Cell(10,5,'',0,0);
$pdf->Cell(90,5,$row["phoneno"],0,1);

//make a dummy empty cell as a vertical spacer
$pdf->Cell(189,10,'',0,1);

//invoice contents
$pdf->SetFont('Arial','B',12);

$pdf->Cell(100,10,'Description',1,0);
$pdf->Cell(30,10,'In. Cost',1,0,'C');
$pdf->Cell(25,10,'Taxable',1,0,'C');
$pdf->Cell(34,10,'Amount',1,1,'C');


$sum=0;
$pdf->SetFont('Arial','',12);
if ($result2->num_rows > 0) {
    while($row = $result2->fetch_assoc()) {
        
    $pdf->SetFont('Arial','B',12);
    $pdf->Cell(40,5,'Vehicle Name:',0,0);
    $pdf->SetFont('Arial','',12);
    $pdf->Cell(90,5,$row["vehicle_name"],0,0);
    $pdf->Cell(25,5,'',0,0);
    $pdf->Cell(34,5,'',0,1);
    
    $pdf->SetFont('Arial','B',12);
    $pdf->Cell(40,5,'Model Name:',0,0);
    $pdf->SetFont('Arial','',12);
    $pdf->Cell(60,5,$row["model_name"],0,0);
    $pdf->Cell(30,5,$row['cost'],0,0,'C');
    $pdf->Cell(25,5,'-',0,0,'C');
    $pdf->Cell(34,5,$row['cost'],0,1,'C');
    
    $pdf->SetFont('Arial','B',12);
    $pdf->Cell(40,5,'Vehicle ID:',0,0);
    $pdf->SetFont('Arial','',12);
    $pdf->Cell(90,5,$row["vehicle_id"],0,0);
    $pdf->Cell(25,5,'',0,0);
    $pdf->Cell(34,5,'',0,1);

    $pdf->Cell(189,5,'',0,1);
    $sum = $sum + ($row['cost']);
}
$pdf->SetFont('Arial','B',12);
$pdf->Cell(130,10,'',0,0);
$pdf->Cell(25,10,'Subtotal',1,0);
$pdf->SetFont('Arial','',12);
$pdf->Cell(34,10,$sum,1,1,'C');

$pdf->SetFont('Arial','B',12);
$pdf->Cell(130,10,'',0,0);
$pdf->Cell(25,10,'Taxable',1,0);
$pdf->SetFont('Arial','',12);
$pdf->Cell(34,10,'-',1,1,'C');

$pdf->SetFont('Arial','B',12);
$pdf->Cell(130,10,'',0,0);
$pdf->Cell(25,10,'Taxable',1,0);
$pdf->SetFont('Arial','',12);
$pdf->Cell(34,10,'18%',1,1,'C');

$sum=$sum*(1.18);
$pdf->SetFont('Arial','B',12);
$pdf->Cell(130,10,'',0,0);
$pdf->Cell(25,10,'Total',1,0);
$pdf->SetFont('Arial','',12);
$pdf->Cell(34,10,$sum,1,1,'C');

$pdf->Cell(189,30,'',0,1);
$pdf->SetFont('Arial','B',16);
$pdf->Cell(189,10,'Thank you! Come again!',0,0,'C');



}
$pdf->Output();
?>