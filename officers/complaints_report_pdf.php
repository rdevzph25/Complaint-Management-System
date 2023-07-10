<?php

session_start();
include('include/config.php');
require('libs/memimage.php');

if(strlen($_SESSION['ologin'])==0)
	{	
header('location:index.php');
}

// POST values
$from_barangay = $_POST['from_barangay'];
$from_date = $_POST['from_date'];
$to_date = $_POST['to_date'];

// Select query

class PDF extends PDF_MemImage
{

// Page header
function Header()
{
	$from_barangay = $_POST['from_barangay'];
    $from_date = $_POST['from_date'];
    $to_date = $_POST['to_date'];
    
	$title = "Complaints Report as of $from_date";
     // Logo
    $this->Image('images/logo.jpg',10,5,20);
    
    $this->SetFont('Arial','B',12);
    // Move to the right
    $this->Cell(80);
    // Title
    //$this->Cell(80,10,$title,1,0,'C');
   // Line break
    $this->Ln(20);
    $text = 'Department Of Public Works and Highways - Sablayan';
    $this->WordWrap($text, 120);    
    $this->Write(5, $text);
    $this->Ln(25);
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
function WordWrap(&$text, $maxwidth)
{
    $text = trim($text);
    if ($text==='')
        return 0;
    $space = $this->GetStringWidth(' ');
    $lines = explode("\n", $text);
    $text = '';
    $count = 0;

    foreach ($lines as $line)
    {
        $words = preg_split('/ +/', $line);
        $width = 0;

        foreach ($words as $word)
        {
            $wordwidth = $this->GetStringWidth($word);
            if ($wordwidth > $maxwidth)
            {
                // Word is too long, we cut it
                for($i=0; $i<strlen($word); $i++)
                {
                    $wordwidth = $this->GetStringWidth(substr($word, $i, 1));
                    if($width + $wordwidth <= $maxwidth)
                    {
                        $width += $wordwidth;
                        $text .= substr($word, $i, 1);
                    }
                    else
                    {
                        $width = $wordwidth;
                        $text = rtrim($text)."\n".substr($word, $i, 1);
                        $count++;
                    }
                }
            }
            elseif($width + $wordwidth <= $maxwidth)
            {
                $width += $wordwidth + $space;
                $text .= $word.' ';
            }
            else
            {
                $width = $wordwidth + $space;
                $text = rtrim($text)."\n".$word.' ';
                $count++;
            }
        }
        $text = rtrim($text)."\n";
        $count++;
    }
    $text = rtrim($text);
    return $count;
}

}

	$pdf=new PDF();
	$pdf->SetFont('Arial','',12);
	$pdf->AddPage();
	$pdf->AliasNbPages();
	$mid_x = 105;
    $text = "Complaints Report";
    $pdf->Text($mid_x - ($pdf->GetStringWidth($text) / 2), 50, $text);

	
	if (empty($from_barangay)){
    	$query="select complaintremark.*,complaintremark.proofFile as prooffile from complaintremark where complaintremark.status='closed' && complaintremark.remarkDate between '".$from_date."' and '".$to_date."'";
    }else{
	$query="select complaintremark.*,complaintremark.proofFile as prooffile from complaintremark where complaintremark.status='closed' && complaintremark.barangay= '".$from_barangay."' && complaintremark.remarkDate between '".$from_date."' and '".$to_date."'";
	}
    
   $result = mysqli_query($bd,$query);
   $total = mysqli_num_rows($result);
   
    $timestamp_from_date =  strtotime("$from_date");
    $new_from_date = date('F d, Y', $timestamp_from_date);

	$timestamp_to_date =  strtotime("$to_date");
    $new_to_date = date('F d, Y', $timestamp_to_date);
	
    if (empty($from_barangay)){
	$report = 'As of '.$new_from_date.' to '.$new_to_date.' there are total of '.$total.' closed complaints from Sablayan, images shown below are the proof of finished works or closed complaints during the date of '.$new_from_date.' to '.$new_to_date.'';
	}else{
     $report = 'As of '.$new_from_date.' to '.$new_to_date.' there are total of '.$total.' closed complaints from Barangay '.$from_barangay.', images shown below are the proof of finished works or closed complaints during the date of '.$new_from_date.' to '.$new_to_date.'';
     }
    $pdf->WordWrap($report, 180);    
    $pdf->Write(5, $report);
    $pdf->Ln(20);
    
    if (empty($from_barangay)){
    	$query="select complaintremark.*,complaintremark.proofFile as prooffile from complaintremark where complaintremark.status='closed' && complaintremark.remarkDate between '".$from_date."' and '".$to_date."'";
    }else{
	$query="select complaintremark.*,complaintremark.proofFile as prooffile from complaintremark where complaintremark.status='closed' && complaintremark.barangay= '".$from_barangay."' && complaintremark.remarkDate between '".$from_date."' and '".$to_date."'";
	}
    
$result = mysqli_query($bd,$query);
$total = mysqli_num_rows($result);

while($runImage = mysqli_fetch_array($result))
{
    $image = $runImage['prooffile'];

$image_height = 45;
$image_width = 60;

//get current X and Y
$start_x = $pdf->GetX();
$start_y = $pdf->GetY();
    
if(empty($image)){
 }else{
// place image and move cursor to proper place. "+ 2" added for buffer
   $pdf->Image('../admin/complaintdocs/'.$runImage['prooffile'].'',$pdf->GetX(), $pdf->GetY(),$image_width,$image_height);
   $pdf->SetXY($start_x + $image_width + 2, $start_y);    
	}
	}
	
	$pdf->Output();
    exit;
    
?>