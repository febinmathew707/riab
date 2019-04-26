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
include("month.php");
/// GET ALL PASSED VALUES IN VARIABLES
 mysql_select_db("soemonit_soemonit_pentaclt",$con);
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
   //$pdf=new PDF();
   
   $month=new Month();
   
   $fmth=4;
   $tyear=$_GET["tyear"];
   $tmth=$_GET["tmth"];
   $t=$month->getYear($tmth,$tyear);
   if($tmth<=3)
   {
		$fyear=$t-1;
	}
   else
   {
		$fyear=$t;
	}
   
   $pref=$fyear-1;
   $pret=$t-1;
   $preyear=$pref."-".$pret;
   //$this->Cell(100,7,$fyear,1);
   ////////////////////////////////////  HEADING /////////////////////////////
   	$this->SetFont('Arial','',10);
	$this->Cell(200,6,"Performance Report as at the end of ".$month->getMonth($tmth)." ".$t,0,0,'C');
	$this->ln();
	$this->SetFont('Arial','B',12);
	$this->Cell(200,6,"PROFIT MAKING UNITS",0,0,'C');
	$this->ln();
	
	$this->SetFont('Arial','',8);
	$this->Cell(190,6,"(Rs. in Lakhs)",0,0,'R');
	$this->ln();
	$this->SetFont('Arial','',8);
	/// FIRST LINE
    $this->Cell(10,5,"","L,T,R",0,'C');
    $this->Cell(80,5,"","L,T,R",0,'C');
    $this->Cell(50,5,"TURNOVER","L,T,R",0,'C');
    $this->Cell(50,5,"PROFIT/LOSS","L,T,R",1,'C');
    ///////////////// SECOND LINE
	$this->Cell(10,4,"Sl.No","L,R",0,'C');
    $this->Cell(80,4,"COMPANY","L,R",0,'C');
    $this->SetFont('Arial','',6);
    $this->Cell(50,4,"(without taxes and duties)","L,R,B",0,'C');
    $this->Cell(50,4,"","L,R,B",1,'C');
    ////////// THIRD LINE //////////////
    $this->SetFont('Arial','',8);
    $this->Cell(10,4,"","L,R,B",0,'C');
    $this->Cell(80,4,"","L,R,B",0,'C');
    $this->Cell(25,4,substr($month->getMonth($fmth),0,3)." " . substr($preyear,2,2). " - ".substr($month->getMonth($tmth),0,3)." " . substr($preyear,7,2),"L,R,B",0,'C');
     $this->Cell(25,4,substr($month->getMonth($fmth),0,3)." " . substr($fyear,2,2). " - ".substr($month->getMonth($tmth),0,3)." " . substr($t,2,2),"L,R,B",0,'C');
    $this->Cell(25,4,substr($month->getMonth($fmth),0,3)." " . substr($preyear,2,2). " - ".substr($month->getMonth($tmth),0,3)." " . substr($preyear,7,2),"L,R,B",0,'C');
      $this->Cell(25,4,substr($month->getMonth($fmth),0,3)." " . substr($fyear,2,2). " - ".substr($month->getMonth($tmth),0,3)." " . substr($t,2,2),"L,R,B",1,'C');
    ///////////// BODY OF REPORT ///////////////////
     $slno=1;
    $strsql="SELECT * FROM emp_company  where company_id in (select company_id from 
			emp_monthlyreport_tot where fin_year=".substr($tyear,0,4)." and month=".$tmth." and cumulative_net_profit>0) 
			order by company_name";
			
    $result=mysql_query($strsql);
    while($row=mysql_fetch_array($result))
    {    	
		$sqlcheck="SELECT status from emp_monthly_report WHERE company_id=".$row["company_id"]." and 
				 fin_year=".substr($tyear,0,4)." and month=".$tmth." ";
		$resultcheck=mysql_query($sqlcheck);
		$rowcheck=mysql_fetch_row($resultcheck);
		if($rowcheck[0]=="M")
		{
			if(strlen($row["company_name"])>40)
		    {
				$len=40;
				$pos=40;
				$no=0;
				$this->Cell(10,4,$slno,"L,R",0,'C');
				$this->Cell(80,4,substr($row["company_name"],0,40),"R",0,'L');
				$this->Cell(25,4,"","L,R",0,'C');
	     		$this->Cell(25,4,"","L,R",0,'C');
	    		$this->Cell(25,4,"","L,R",0,'C');
	      		$this->Cell(25,4,"","L,R",0,'C');
				    
				while($no<strlen($row["company_name"])-40)
				{	
					$pos=$len;
					if((strlen($row["company_name"])-$pos)>40)
					{
						$len=40;
					}
					else
					{
						$len=(strlen($row["company_name"])-$pos);
					}
					$this->ln();
					$this->Cell(10,4,"","L,R,B",0,'C');
					$this->Cell(80,4,substr($row["company_name"],$pos,$len),"R,B",0,'L');
				
					$no=$pos;
					$pos=$pos+$len;
				}
				
			}
			else
			{
				$this->Cell(10,4,$slno,"L,R,B",0,'C');
				$this->Cell(80,4,substr($row["company_name"],0,40),"R,B",0,'L');
			}
	    	
	    	$strsql="select * from emp_turnover where company_id=".$row["company_id"]." 
			and fin_year=".substr($preyear,0,4)." ";
	    	$result1=mysql_query($strsql);
	    	$row1=mysql_fetch_assoc($result1);
			$preturn=$row1["turn_over"];
			
			$strsql="select * from emp_monthlyreport_tot where company_id=".$row["company_id"]." 
			and fin_year=".substr($preyear,0,4)." and month=".$tmth." ";
	    	$result1=mysql_query($strsql);
	    	$row1=mysql_fetch_assoc($result1);
			$prepandl=$row1["cumulative_net_profit"];
			
			$strsql="select * from emp_turnover where company_id=".$row["company_id"]." and 
			fin_year=".substr($tyear,0,4)."	 ";
	    	$result1=mysql_query($strsql);
	    	$row1=mysql_fetch_assoc($result1);
			$turn=$row1["turn_over"];
			
			$strsql="select * from emp_monthlyreport_tot where company_id=".$row["company_id"]." 
			and fin_year=".substr($tyear,0,4)." and month=".$tmth." ";
	    	$result1=mysql_query($strsql);
	    	$row1=mysql_fetch_assoc($result1);
			$pandl=$row1["cumulative_net_profit"];
			    	
	    	$this->Cell(25,4,$preturn,"L,R,B",0,'C');
	    	$this->Cell(25,4,$turn,"L,R,B",0,'C');
	    	$this->Cell(25,4,$prepandl,"L,R,B",0,'C');
	    	$this->Cell(25,4,$pandl,"L,R,B",1,'C');
	    	
	    	$slno=$slno+1;
	    }
    }
    //foreach($header as $col)     
   
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