<?php session_start(); ?>
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
	elseif($_SESSION['LogType']!='CO')
	{
		Header("Location: home.php");
		die();
	}
include("../connectdb/connect.php");
include("month.php");
/// GET ALL PASSED VALUES IN VARIABLES
mysql_select_db("soemonit_pentaclt",$con);
if(!$con)
{
	die('Could not connect to server' . mysql_error());
} 
require('fpdf_portrait.php');

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
   
   ////////////////////////////////// //  HEADING /////////////////////////////
   	$this->SetTextColor(185,7,7);
	$this->SetFont('Arial','B',12);
	$this->Cell(200,6,"Monthly Subscription Bill",0,0,'L');
	//$this->image("img_new/riab.gif",185,5,15,15);
	$this->ln();
	$this->ln();
	$strsql="SELECT * FROM emp_company where company_id=".$_SESSION["company_id"]."";
	$result=mysql_query($strsql);
	$row=mysql_fetch_assoc($result);
	
	$strsql="SELECT * FROM emp_company_bill where Auto_No=".$_GET["id"]."";
	$resultbill=mysql_query($strsql);
	$rowbill=mysql_fetch_assoc($resultbill);
	
	$this->SetTextColor(0,0,0);
	$this->SetFont('Arial','B',10);
	$this->Cell(150,4,$row["company_name"],0,0,'L');
	$this->SetFont('Arial','',9);
	$this->Cell(150,4,"Bill No    : ".$rowbill["Bill_No"],0,1,'L');	
	$this->Cell(150,4,$row["company_add1"],0,0,'L');
	$this->Cell(150,4,"Bill Date : ".date("d-M-Y",strtotime($rowbill["Bill_Date"])),0,1,'L');
	$this->Cell(200,4,$row["company_add2"],0,1,'L');
	$this->Cell(200,4,"Ph.".$row["Phone"],0,1,'L');

	
	$this->ln();
	$this->SetFillColor(185,7,7);
	$this->SetTextColor(255,255,255);
	$this->SetDrawColor(222,219,219);
	$this->Cell(150,6,"    Particulars",1,0,'L',true);
	$this->Cell(40,6,"    Amount",1,1,'R',true);
	$this->SetTextColor(0,0,0);
	$this->SetDrawColor(175,173,173);
	$strsql="SELECT SUM(Amt_To_Pay) FROM emp_company_bill where Company_Id=".$_SESSION["company_id"]." and
			Bill_No<".$rowbill["Bill_No"]."";
	$result1=mysql_query($strsql);
	$row1=mysql_fetch_row($result1);
	$amttopay=$row1[0];
	
	
	$strsql="SELECT SUM(Paid_Amt) FROM emp_company_bill_paid where Company_Id=".$_SESSION["company_id"]." and
	        Bill_No<".$rowbill["Bill_No"]."";
	$result1=mysql_query($strsql);
	$row1=mysql_fetch_row($result1);
	$paidamt=$row1[0];
	
	$bal=$amttopay-$paidamt;
	if($bal!=0)
	{
		$this->Cell(150,6,"    Previous Balance","L",0,'L',false);
		$this->Cell(40,6,$bal,"L,R",1,'L',false);
	}
	
	$this->Cell(150,6,"    Monthly Charges","L",0,'L',false);
	$this->Cell(40,6,$rowbill["Amt_To_Pay"],"L,R",1,'R',false);
	$this->Cell(150,12,"","L",0,'L',false);
	$this->Cell(40,12,"","L,R",1,'L',false);
	$this->Cell(150,6,"    Total Charges","L,B",0,'L',false);
	$this->SetFillColor(175,173,173);
	$this->SetTextColor(255,255,255);
	$this->Cell(40,6,$rowbill["Amt_To_Pay"],"L,R",1,'R',true);
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

$pdf->Output();
?>