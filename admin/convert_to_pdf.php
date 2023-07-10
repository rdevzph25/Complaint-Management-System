<?php
session_start();
require('libs/html2pdf.php');
include('include/config.php');
if(strlen($_SESSION['alogin'])==0)
	{
header('location:index.php');
}


class PDF extends PDF_HTML
{

// Page header
function Header()
{
	//$from_date = $_POST['from_date'];
	//$from_barangay = $_POST['from_barangay'];
	//$title = "Complaints Report as of $from_date";
     // Logo
    $this->Image('../img/logo.jpg',10,5,20);
    $this->SetFont('Arial','B',12);
    // Move to the right
    $this->Cell(80);
    // Title
    //$this->Cell(80,10,'Complaint Report 2022',1,0,'C');
   // Line break
    $this->Ln(18);
}

// Page footer
function Footer()
{
    // Position at 1.5 cm from bottom
    $this->SetY(-15);
    // Arial italic 8
    $this->SetFont('Arial','I',8);
    // Page number
    $this->Cell(0,10,'This document was auto generated from DPWH | Sablayan CMS website.',0,0,'C');
}
}

if(isset($_GET['id']))
{
	$pdf=new PDF();
	$pdf->SetFont('Arial','',12);
	$pdf->AddPage();
	$pdf->AliasNbPages();

$query=mysqli_query($bd, "select tblcomplaints.*,users.fullName as name,category.categoryName as catname from tblcomplaints join users on users.id=tblcomplaints.userId join category on category.id=tblcomplaints.category where tblcomplaints.complaintNumber='".$_GET['id']."'");
while($row=mysqli_fetch_array($query))
{
	$name = $row['name'];
	$barangay = $row['state'];
	$reg_date = $row['regDate']; //old date
    $old_reg_date= strtotime($reg_date);   //timestamp
    $new_reg_date = date('F d, Y', $old_reg_date); //new date

    $closed_date = $row['lastUpdationDate']; //old date
    $old_closed_date = strtotime($closed_date);   //timestamp
    $new_closed_date = date('F d, Y', $old_closed_date);   //new date
	$details = $row['complaintDetails'];
	$compfile = $row['complaintFile'];
	
	

$rt=mysqli_query($bd, "select complaintremark.remark as remark, complaintremark.proofFile as prooffile from complaintremark join tblcomplaints on tblcomplaints.complaintNumber=complaintremark.complaintNumber where complaintremark.status='closed' && complaintremark.complaintNumber='".$_GET['id']."'");

while($rw=mysqli_fetch_array($rt))
	{
    $remark = $rw['remark'];
    $prooffile = $rw['prooffile'];
	$text = "<b>Department of Public Works and Highways - Sablayan</b><br><br><br><br>
<b>Complainant Name:</b> $name<br>
<b>Barangay:</b> $barangay<br>
<b>Date of complaint:</b> $new_reg_date<br>
<b>Closed Date:</b> $new_closed_date<br>
<b>Remark:</b> $remark<br>
<b>Complaint Details:</b> $details";

   
	if ($compfile == "" || $compfile == "NULL"){
		$pdf-> Text(12,100,'No Image proof provided!');
	}else{
		$pdf-> Text(12,100,'Image proof submitted by complainant on '.$new_reg_date.'');	
	    $pdf-> Image('../users/complaintdocs/'.$compfile.'',30,103,100,80);
	
	}
	if ($prooffile == "" || $prooffile == "NULL"){
		$pdf-> Text(12,200,'No Image proof provided!');
	}else{
		$pdf-> Text(12,200,'Proof of work submitted on '.$new_closed_date.'');
	    $pdf-> Image('../admin/complaintdocs/'.$prooffile.'',30,203,100,80);
	}
	}
	}
	$pdf->WriteHTML($text);
	$pdf->Output();
	exit;


}

?>