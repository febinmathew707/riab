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
	elseif($_SESSION['LogType']!='AD' && $_SESSION['LogType']!='RP')
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
   //$pdf=new PDF();
   
   $month=new Month();
   //$tmth=4;
   $tyear=$_GET["tyear"];
   $tmth=$_GET["tmth"];
   
   $t=$month->getYear($tmth,$tyear);
   $tmonth=$month->getMonth($tmth);
   
   
   $fmth=4;
   $fmonth=$month->getMonth($fmth);
   $f=$month->getYear($fmth,$tyear);
   
   $tyear=substr($_GET["tyear"],5);
   $fyear=$tyear-1;

   //$this->Cell(80,8,$f." ".$fmonth." ".$t." ".$tmonth,1,0,'R');
   ////////////////////////////////////  HEADING /////////////////////////////
   	$this->SetFont('Arial','',10);	
	$this->SetFont('Arial','B',12);
	$this->Cell(200,6,"PERFORMANCE OF OPERATIONAL MANUFACTURING UNITS UNDER THE PURVIEW OF ",0,0,'C');
	$this->ln();
	$this->Cell(200,6,"INDUSTRIES MINISTRY – A Snap Shot",0,0,'C');
	$this->ln();
	$this->SetFont('Arial','',8);

    ///////////////// SECOND LINE
    $this->Cell(1,8,"",0,0,'R');
	$this->Cell(80,8,"Particular",1,0,'C');
    $this->Cell(35,8,substr($fmonth,0,3)." ".substr($f-1,2,2)." - ".substr($tmonth,0,3)." ".substr($t-1,2,2),1,0,'C');
    $this->Cell(35,8,substr($fmonth,0,3)." ".substr($f,2,2)." - ".substr($tmonth,0,3)." ".substr($t,2,2),1,0,'C');
    $this->Cell(30,8,"Remarks",1,1,'C');
    ///////////////////////////////////
	 $t=substr($_GET["tyear"],5);
   	$f=$t-1;
	 $fyear=$t-1;
     $slno=1;
    $strsql="select count(*) from emp_monthly_report 	where fin_year=".$f." and month=".$tmth."  and status='A'";
    $result=mysql_query($strsql);
    $row=mysql_fetch_row($result);
    if($row[0]==0)
    {
		die();
	}
    $strsql="select count(*) from 	emp_monthlyreport_tot where id in(select max(id) from 	emp_monthlyreport_tot where fin_year=".$f." and month=".$tmth."  and status='A' 	 and cumulative_net_profit>0 group by rpt_id) ";
	
	
	$result=mysql_query($strsql);
	$row=mysql_fetch_row($result);
    $this->Cell(1,8,"",0,0,'R');
	$this->Cell(80,8,"Profit Making Units (Nos)" ,1,0,'L');
    $this->Cell(35,8,$row[0],1,0,'R');
    $strsql="select count(*) from 	emp_monthlyreport_tot where id in(select max(id) from 	emp_monthlyreport_tot where fin_year=".$t." and 
		month=".$tmth."  and status='A' 	 and cumulative_net_profit>0 group by rpt_id) ";
	$result=mysql_query($strsql);
	$row=mysql_fetch_row($result);
    $this->Cell(35,8,$row[0],1,0,'R');
    $this->Cell(30,8,"",1,1,'R');
    ///////////////////////////////////
   
	  $strsql="select sum(cumulative_net_profit) from emp_monthlyreport_tot where id in(select max(id) from 	
	  emp_monthlyreport_tot where fin_year=".$f." 	  and month=".$tmth."  and status='A' 	 and cumulative_net_profit>0 group by rpt_id) ";
	$result=mysql_query($strsql);
	$row=mysql_fetch_row($result);
    $this->Cell(1,8,"",0,0,'R');
	$this->Cell(80,8,"Profit made by profit making units in Rs lakhs",1,0,'L');
    $this->Cell(35,8,$row[0],1,0,'R');
   $strsql="select sum(cumulative_net_profit) from emp_monthlyreport_tot where id in(select max(id) from 	
	  emp_monthlyreport_tot where fin_year=".$t." 	  and month=".$tmth."  and status='A' 	 and cumulative_net_profit>0 group by rpt_id) ";
	$result=mysql_query($strsql);
	$row=mysql_fetch_row($result);
    $this->Cell(35,8,$row[0],1,0,'R');
    $this->Cell(30,8,"",1,1,'R');
    ///////////////////////////////////
   $strsql="select count(*) from emp_monthlyreport_tot where id in(select max(id) from 	
	  emp_monthlyreport_tot where fin_year=".$f." 	  and month=".$tmth."  and status='A' 	 and cumulative_net_profit<0 group by rpt_id) ";
	$result=mysql_query($strsql);
	$row=mysql_fetch_row($result);
    $this->Cell(1,8,"",0,0,'R');
	$this->Cell(80,8,"Loss Making Units (Nos)",1,0,'L');
    $this->Cell(35,8,$row[0],1,0,'R');
   $strsql="select count(*) from emp_monthlyreport_tot where id in(select max(id) from 	
	  emp_monthlyreport_tot where fin_year=".$t." 	  and month=".$tmth."  and status='A' 	 and cumulative_net_profit<0 group by rpt_id) ";
	$result=mysql_query($strsql);
	$row=mysql_fetch_row($result);
    $this->Cell(35,8,$row[0],1,0,'R');
    $this->Cell(30,8,"",1,1,'R');
    ///////////////////////////////////
   $strsql="select sum(cumulative_net_profit) from emp_monthlyreport_tot where id in(select max(id) from 	
	  emp_monthlyreport_tot where fin_year=".$f." 	  and month=".$tmth."  and status='A' 	 and cumulative_net_profit<0 group by rpt_id) ";
	//echo $strsql;
	$result=mysql_query($strsql);
	$row=mysql_fetch_row($result);
    $this->Cell(1,8,"",0,0,'R');
	$this->Cell(80,8,"Loss incurred by loss making units in Rs lakhs",1,0,'L');
    $this->Cell(35,8,$row[0],1,0,'R');
    $strsql="select sum(cumulative_net_profit) from emp_monthlyreport_tot where id in(select max(id) from 	
	  emp_monthlyreport_tot where fin_year=".$t." 	  and month=".$tmth."  and status='A' 	 and cumulative_net_profit<0 group by rpt_id) ";
	$result=mysql_query($strsql);
	$row=mysql_fetch_row($result);
    $this->Cell(35,8,$row[0],1,0,'R');
    $this->Cell(30,8,"",1,1,'R');
    ///////////////////////////////////
      $strsql="select count(*) from emp_monthly_report 	where fin_year=".$f." and month=".$tmth."  and status='A'";
	$result1=mysql_query($strsql);
	$row1=mysql_fetch_row($result1);
	
	 $strsql="select count(*) from emp_monthly_report 	where fin_year=".$t." and month=".$tmth."  and status='A'";
	$result=mysql_query($strsql);
	$row=mysql_fetch_row($result);
    $this->Cell(1,8,"",0,0,'R');
	$this->Cell(80,8,"Total No of units",1,0,'L');
    $this->Cell(35,8,$row1[0],1,0,'R');
    $this->Cell(35,8,$row[0],1,0,'R');
    $this->Cell(30,8,"",1,1,'R');
    ///////////////////////////////////
     
	 
	  $strsql="select sum(cumulative_sale) from emp_profirability_statement where auto_no in(select max(auto_no) from 	
	  emp_profirability_statement where fin_year=".$f." and month=".$tmth."  and status='A' group by rpt_id) ";
	$result=mysql_query($strsql);
	$row=mysql_fetch_row($result);
    $this->Cell(1,8,"",0,0,'R');
	$this->Cell(80,8,"Total Turnover in Rs lakhs",1,0,'L');
    $this->Cell(35,8,$row[0],1,0,'R');
    $strsql="select sum(cumulative_sale) from emp_profirability_statement where auto_no in(select max(auto_no) from 	
	  emp_profirability_statement where fin_year=".$t." and month=".$tmth."  and status='A' group by rpt_id) ";
	$result=mysql_query($strsql);
	$row=mysql_fetch_row($result);
    $this->Cell(35,8,$row[0],1,0,'R');
    $this->Cell(30,8,"",1,1,'R');
    ///////////////////////////////////
   
	
	$strsql="select sum(cumulative_net_profit) from emp_monthlyreport_tot where id in(select max(id) from 	
	  emp_monthlyreport_tot where fin_year=".$f." and month=".$tmth."  and status='A' group by rpt_id) ";
	$result=mysql_query($strsql);
	$row=mysql_fetch_row($result);
    $this->Cell(1,8,"",0,0,'R');
	$this->Cell(80,8,"Net Profit /loss in Rs lakhs",1,0,'L');
    $this->Cell(35,8,$row[0],1,0,'R');
   $strsql="select sum(cumulative_net_profit) from emp_monthlyreport_tot where id in(select max(id) from 	
	  emp_monthlyreport_tot where fin_year=".$t." and month=".$tmth."  and status='A' group by rpt_id) ";
	$result=mysql_query($strsql);
	$row=mysql_fetch_row($result);
    $this->Cell(35,8,$row[0],1,0,'R');
    $this->Cell(30,8,"",1,1,'R');
    ///////////////////////////////////

    $this->Cell(1,8,"",0,0,'R');
   
	$strsql="select sum(sundry_debtors) from emp_financial_indicators where auto_no in(select max(auto_no) from 	
	  emp_financial_indicators where fin_year=".$f." and month=".$tmth."  and status='A' group by rpt_id) ";
	$result=mysql_query($strsql);
	$row=mysql_fetch_row($result);
	$preDb=$row[0];
	$this->Cell(80,8,"Sundry Debtors  in Rs lakhs",1,0,'L');
    $this->Cell(35,8,$row[0],1,0,'R');
   $strsql="select sum(sundry_debtors) from emp_financial_indicators where auto_no in(select max(auto_no) from 	
	  emp_financial_indicators where fin_year=".$t." and month=".$tmth."  and status='A' group by rpt_id) ";
	//echo $strsql;
	$result=mysql_query($strsql);
	$row=mysql_fetch_row($result);
	$afDb=$row[0];
    $this->Cell(35,8,$row[0],1,0,'R');
    $this->Cell(30,8,"",1,1,'R');
     ///////////////////////////////////
     $this->Cell(1,8,"",0,0,'R');
	
		$strsql="select sum(sundry_creditors) from emp_financial_indicators where auto_no in(select max(auto_no) from 	
	  emp_financial_indicators where fin_year=".$f." and month=".$tmth."  and status='A' group by rpt_id) ";
	$result=mysql_query($strsql);
	$row=mysql_fetch_row($result);
	$preCr=$row[0];
	$this->Cell(80,8,"Sundry Creditors  in Rs lakhs",1,0,'L');
    $this->Cell(35,8,$row[0],1,0,'R');
    $strsql="select sum(sundry_creditors) from emp_financial_indicators where auto_no in(select max(auto_no) from 	
	  emp_financial_indicators where fin_year=".$t." and month=".$tmth."  and status='A' group by rpt_id) ";
	$result=mysql_query($strsql);
	$row=mysql_fetch_row($result);
	$afCr=$row[0];
    $this->Cell(35,8,$row[0],1,0,'R');
    $this->Cell(30,8,"",1,1,'R');
     ///////////////////////////////////
    $this->Cell(1,8,"",0,0,'R');
	$this->Cell(80,8,"Net receivables in Rs lakhs",1,0,'L');
	if($preDb>$preCr)
	{
		$preDiff=$preDb-$preCr;
	}
	else
	{
		$preDiff="";
	}
    $this->Cell(35,8,$preDiff,1,0,'R');
    if($afDb>$afCr)
	{
		$afDiff=$afDb-$afCr;
	}
	else
	{
		$afDiff=0;
	}
    $this->Cell(35,8,$afDiff,1,0,'R');
    $this->Cell(30,8,"",1,1,'R');
     ///////////////////////////////////
    
	$slno=1;
	
   
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