<?php 

 session_start(); ?>
<?php
	if(!isset($_SESSION['Logged']))
	{
		Header("Location: home.php");
		die();
	}
	elseif($_SESSION['Logged']=='No')
	{
		Header("Location: home.php");
		die();
	}
	elseif($_SESSION['LogType']!='AD')
	{
		Header("Location: home.php");
		die();
	}
include("../connectdb/connect.php");
/// GET ALL PASSED VALUES IN VARIABLES
 mysql_select_db("soemonit_pentaclt",$con);
if(!$con)
{
	die('Could not connect to server' . mysql_error());
} 
require('fpdf.php');

class PDF extends FPDF
{
//Load data
function LoadData($file)
{
    //Read file lines
    $lines=file($file);
    $data=array();
    foreach($lines as $line)
        $data[]=explode(';',chop($line));
    return $data;
}

//Simple table
function BasicTable($header,$data)
{
   //$pdf=new PDF();
   $this->SetFont('Arial','B',12);
	$this->Cell(280,10,'REVIEW OF MANUFCATURING SECTOR PSUs UNDER INDUSTRIES DEPARTMENT (JANUARY, 2009)',0,0,'C');
	$this->ln();
	$this->SetFont('Arial','',8);
    $this->Cell(10,10,"","L,T,R",0,'C');
    $this->Cell(60,10,"","T",0,'C');
    $this->Cell(30,10,"","L,T,R",0,'C');
    $this->Cell(30,10,"","L,T,R",0,'C');
    $this->Cell(30,10,"","L,T,R",0,'C');
    $this->Cell(20,10,"Capacity ","L,T,R",0,'C');
    $this->Cell(20,10,"Production ","L,T,R",0,'C');
    $this->Cell(80,5,"Performance during January 09 (Rs. lakhs) ",1,1,'C');
    //----------- second line
    $this->Cell(10,6,"Sl.No","L,R",0,'C');
    $this->Cell(60,6,"Company","R",0,'C');
    $this->Cell(30,6,"ManPower (Nos)","L,R",0,'C');
    $this->Cell(30,6,"TurnOver (Lakhs)","L,R",0,'C');
    $this->Cell(30,6,"Profit/Loss (Lakhs)","L,R",0,'C');
    $this->Cell(20,6,"Utilization ","L,R",0,'C');
    $this->Cell(20,6,"Budget for  ","L,R",0,'C');
    $this->Cell(16,6,"Sales","L,R,T",0,'C');
    $this->Cell(16,6,"Value Of","L,R,T",0,'C');
    $this->Cell(16,6,"Cost Of ","L,R,T",0,'C');
    $this->Cell(16,6,"Cash","L,R,T",0,'C');
    $this->Cell(16,6,"Net","L,R,T",1,'C');
    //------------- third line 
    $this->Cell(10,6,"","L,R",0,'C');
    $this->Cell(60,6,"","R",0,'C');
    $this->Cell(30,6,"","L,R",0,'C');
    $this->Cell(30,6,"","L,R",0,'C');
    $this->Cell(30,6,"","L,R",0,'C');
    $this->Cell(20,6,"(%)","L,R",0,'C');
    $this->Cell(20,6,"the year","L,R",0,'C');
    $this->Cell(16,6,"without","L,R",0,'C');
    $this->Cell(16,6,"Production","L,R",0,'C');
    $this->Cell(16,6,"Production","L,R",0,'C');
    $this->Cell(16,6,"Profit/","L,R",0,'C');
    $this->Cell(16,6,"Profit/","L,R",1,'C');
    //------------- 4th line 
    $this->Cell(10,6,"","L,R",0,'C');
    $this->Cell(60,6,"","R",0,'C');
    $this->Cell(30,6,"","L,R",0,'C');
    $this->Cell(30,6,"","L,R",0,'C');
    $this->Cell(30,6,"","L,R",0,'C');
    $this->Cell(20,6,"","L,R",0,'C');
    $this->Cell(20,6,"","L,R",0,'C');
    $this->Cell(16,6,"taxs duties","L,R",0,'C');
    $this->Cell(16,6,"","L,R",0,'C');
    $this->Cell(16,6,"","L,R",0,'C');
    $this->Cell(16,6,"Loss","L,R",0,'C');
    $this->Cell(16,6,"Loss","L,R",1,'C');
    //------------- 5th line 
    $this->Cell(10,6,"","L,R,B",0,'C');
    $this->Cell(60,6,"","R,B",0,'C');
    $this->Cell(15,6,"Actual","L,R,T,B",0,'C');
    $this->Cell(15,6,"Effective","L,R,T,B",0,'C');
    $this->Cell(15,6,"2006-2007","L,R,T,B",0,'C');
    $this->Cell(15,6,"2007-2008","L,R,T,B",0,'C');
    $this->Cell(30,6,"","L,R,B",0,'C');
    $this->Cell(20,6,"","L,R,B",0,'C');
    $this->Cell(20,6,"","L,R,B",0,'C');
    $this->Cell(16,6,"","L,R,B",0,'C');
    $this->Cell(16,6,"","L,R,B",0,'C');
    $this->Cell(16,6,"","L,R,B",0,'C');
    $this->Cell(16,6,"","L,R,B",0,'C');
    $this->Cell(16,6,"","L,R,B",1,'C');
    
	//Header
    //foreach($header as $col)
     //   $this->Cell(40,7,$col,1);
   
}

//Better table
function ImprovedTable($header,$data)
{
    //Column widths
    //$this->Ln();
    $w=array(40,35,40,45);
    //Header
    for($i=0;$i<count($header);$i++)
        $this->Cell($w[$i],7,$header[$i],1,0,'C');
    $this->Ln();
    //Data
    foreach($data as $row)
    {
        $this->Cell($w[0],6,$row[0],'LR');
        $this->Cell($w[1],6,$row[1],'LR');
        $this->Cell($w[2],6,number_format($row[2]),'LR',0,'R');
        $this->Cell($w[3],6,number_format($row[3]),'LR',0,'R');
        $this->Ln();
    }
    //Closure line
    $this->Cell(array_sum($w),0,'','T');
}

//Colored table
function FancyTable($header,$data)
{
    //Colors, line width and bold font
    $this->SetFillColor(255,0,0);
    $this->SetTextColor(255);
    $this->SetDrawColor(128,0,0);
    $this->SetLineWidth(.3);
    $this->SetFont('','B');
    //Header
    $w=array(40,35,40,45);
    for($i=0;$i<count($header);$i++)
        $this->Cell($w[$i],7,$header[$i],1,0,'C',true);
    $this->Ln();
    //Color and font restoration
    $this->SetFillColor(224,235,255);
    $this->SetTextColor(0);
    $this->SetFont('');
    //Data
    $fill=false;
    foreach($data as $row)
    {
        $this->Cell($w[0],6,$row[0],'LR',0,'L',$fill);
        $this->Cell($w[1],6,$row[1],'LR',0,'L',$fill);
        $this->Cell($w[2],6,number_format($row[2]),'LR',0,'R',$fill);
        $this->Cell($w[3],6,number_format($row[3]),'LR',0,'R',$fill);
        $this->Ln();
        $fill=!$fill;
    }
    $this->Cell(array_sum($w),0,'','T');
}
}

$pdf=new PDF();
//Column titles
$header=array('Country','Capital','Area (sq km)','Pop. (thousands)');
//Data loading
$data=$pdf->LoadData('countries.txt');
$pdf->SetFont('Arial','',8);
$pdf->AddPage();
$pdf->BasicTable($header,$data);
$pdf->AddPage();
$pdf->ImprovedTable($header,$data);
$pdf->AddPage();
$pdf->FancyTable($header,$data);
$pdf->Output();
?>