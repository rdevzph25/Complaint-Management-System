<?php

session_start();
include('include/config.php');
include_once('libs/fpdf.php');

if(strlen($_SESSION['alogin'])==0)
	{	
header('location:index.php');
}

date_default_timezone_set('Asia/Kolkata');// change according timezone

// filename
//$filename = 'complaints_report_'.$_POST['from_date'].'.csv';

// POST values
$from_barangay = $_POST['from_barangay'];
$from_date = $_POST['from_date'];
$to_date = $_POST['to_date'];

// Select query

class PDF extends FPDF
{

// Page header
function Header()
{
	$from_date = $_POST['from_date'];
	$from_barangay = $_POST['from_barangay'];
	$title = "Complaints Report as of $from_date";
     // Logo
    $this->Image('images/logo.jpg',10,5,20);
    $this->SetFont('Arial','B',12);
    // Move to the right
    $this->Cell(80);
    // Title
    $this->Cell(80,10,$title,1,0,'C');
   // Line break
    $this->Ln(20);
}
 
// Page footer
function Footer()
{
    // Position at 1.5 cm from bottom
    $this->SetY(-15);
    // Arial italic 8
    $this->SetFont('Arial','I',8);
    // Page number
    $this->Cell(0,10,'Page '.$this->PageNo().'/{nb}',0,0,'C');
}
}

$display_heading = array('complaintNumber'=>'Complaint No.', 'userId'=> 'Citizen ID', 'subcategory'=> 'Complaint','regDate'=>'Reg. Date','state'=> 'Barangay','lastUpdationDate' => 'Closed Date',);
if(isset($_POST['from_date']) && isset($_POST['to_date']) && isset($_POST['from_barangay'])){
	if ($_POST["from_barangay"] == ""){ // If Barangay not selected
   $output = mysqli_query($bd, "SELECT complaintNumber, userId, subcategory, state, regDate, lastUpdationDate FROM tblcomplaints where tblcomplaints.status='closed' && lastUpdationDate between '".$from_date."' and '".$to_date."' ORDER BY complaintNumber asc");
}else{
   $output = mysqli_query($bd, "SELECT complaintNumber, userId, subcategory, state, regDate, lastUpdationDate FROM tblcomplaints where tblcomplaints.status='closed' && tblcomplaints.state= '".$from_barangay."' && lastUpdationDate between '".$from_date."' and '".$to_date."' ORDER BY complaintNumber asc");
}}

//$output = mysqli_query($bd, "SELECT complaintNumber, userId, subcategory, state, regDate, lastUpdationDate FROM tblcomplaints where tblcomplaints.status='closed' && lastUpdationDate between '".$from_date."' and '".$to_date."' ORDER BY complaintNumber asc");
$header = mysqli_query($bd, "SHOW columns from test");
$my_pdf = new PDF();

$my_pdf->AddPage();

$my_pdf->AliasNbPages();
$my_pdf->SetFont('Arial','B',12);
foreach($header as $heading) {
 $my_pdf->Cell(32,10,$display_heading[$heading['Field']],1);
}

foreach($output as $row) {
 $my_pdf->SetFont('Arial','',9);
 $my_pdf->Ln();
 foreach($row as $clm)
 $my_pdf->Cell(32,10,$clm,1);
}
$my_pdf->Output();
?>