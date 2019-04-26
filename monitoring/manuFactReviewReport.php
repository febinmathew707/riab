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
require('fpdfa3.php');

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
   $year=$_GET["year"];
   $mth=$_GET["mth"];
   
	$y=$year-1;
	if($mth>3)
		$prnyear=$year-1;
	else
		$prnyear=$year;
				   
   $strsql="select * from emp_fin_year where year<=".$y." order by year desc LIMIT 2";
   $resultFin=mysql_query($strsql);
   $rowFin=mysql_fetch_assoc($resultFin);
   $fin1=$rowFin["fin_year"];
   $y1=$rowFin["year"];
   //$rowFin=mysql_fetch_assoc($resultFin);  
   $y2=$y1-1;
   $yy=$y2-1;
   $fin2=$yy."-".$y2;
   ////////////////////////////////////  HEADING /////////////////////////////
   $this->SetFont('Arial','B',12);
	$this->Cell(380,10,'REVIEW OF MANUFCATURING SECTOR PSUs UNDER INDUSTRIES DEPARTMENT ('.$month->getMonth($mth).' , '.$prnyear.')',0,0,'C');
	$this->ln();
	$this->SetFont('Arial','',8);
    $this->Cell(10,10,"","L,T,R",0,'C');
    $this->Cell(130,10,"","T",0,'C');
    $this->Cell(40,10,"","L,T,R",0,'C');
    $this->Cell(40,10,"","L,T,R",0,'C');
    $this->Cell(40,10,"","L,T,R",0,'C');
    $this->Cell(20,10,"Production ","L,T,R",0,'C');
    $this->Cell(100,5,"Performance during " .$month->getMonth($mth). " " . $prnyear. " (Rs. lakhs) ",1,1,'C');
    //----------- second line
    $this->Cell(10,5,"Sl.No","L,R",0,'C');
    $this->Cell(130,5,"Company","R",0,'C');
    $this->Cell(40,5,"ManPower (Nos)","L,R",0,'C');
    $this->Cell(40,5,"TurnOver (Lakhs)","L,R",0,'C');
    $this->Cell(40,5,"Profit/Loss (Lakhs)","L,R",0,'C');
    $this->Cell(20,5,"Budget for  ","L,R",0,'C');
    $this->Cell(20,5,"Sales","L,R,T",0,'C');
    $this->Cell(20,5,"Value Of","L,R,T",0,'C');
    $this->Cell(20,5,"Cost Of ","L,R,T",0,'C');
    $this->Cell(20,5,"Cash","L,R,T",0,'C');
    $this->Cell(20,5,"Net","L,R,T",1,'C');
    //------------- third line 
    $this->Cell(10,5,"","L,R",0,'C');
    $this->Cell(130,5,"","R",0,'C');
    $this->Cell(40,5,"","L,R",0,'C');
    $this->Cell(40,5,"","L,R",0,'C');
    $this->Cell(40,5,"","L,R",0,'C');
    $this->Cell(20,5,"the year","L,R",0,'C');
    $this->Cell(20,5,"without","L,R",0,'C');
    $this->Cell(20,5,"Production","L,R",0,'C');
    $this->Cell(20,5,"Production","L,R",0,'C');
    $this->Cell(20,5,"Profit/","L,R",0,'C');
    $this->Cell(20,5,"Profit/","L,R",1,'C');
    //------------- 4th line 
    $this->Cell(10,5,"","L,R",0,'C');
    $this->Cell(130,5,"","R",0,'C');
    $this->Cell(40,5,"","L,R",0,'C');
    $this->Cell(40,5,"","L,R",0,'C');
    $this->Cell(40,5,"","L,R",0,'C');    
    $this->Cell(20,5,"","L,R",0,'C');
    $this->Cell(20,5,"taxs duties","L,R",0,'C');
    $this->Cell(20,5,"","L,R",0,'C');
    $this->Cell(20,5,"","L,R",0,'C');
    $this->Cell(20,5,"Loss","L,R",0,'C');
    $this->Cell(20,5,"Loss","L,R",1,'C');
    //------------- 5th line 
    $this->Cell(10,5,"","L,R,B",0,'C');
    $this->Cell(130,5,"","R,B",0,'C');
    $this->Cell(20,5,"Actual","L,R,T,B",0,'C');
    $this->Cell(20,5,"Effective","L,R,T,B",0,'C');
    $this->Cell(20,5,$fin2,"L,R,T,B",0,'C');
    $this->Cell(20,5,$fin1,"L,R,T,B",0,'C');
    $this->Cell(20,5,$fin2,"L,R,T,B",0,'C');
    $this->Cell(20,5,$fin1,"L,R,T,B",0,'C');    
    $this->Cell(20,5,"","L,R,B",0,'C');
    $this->Cell(20,5,"","L,R,B",0,'C');
    $this->Cell(20,5,"","L,R,B",0,'C');
    $this->Cell(20,5,"","L,R,B",0,'C');
    $this->Cell(20,5,"","L,R,B",0,'C');
    $this->Cell(20,5,"","L,R,B",1,'C');
    
    //////////////////	 BODY OF REPORT //////////////////////////////////
    $slno=1;
    $totCumulativeSale2=0;
    $totCumulativeProfit2=0;
    $totCumulativeSale1=0;
    $totCumulativeProfit1=0;
    $totCapacity="";
    $totProduction=0;
    $totActualSale=0;
    $totActualProduction=0;
    $totActualCost=0;
    $totActualCashProfit=0;
    $totActualNetProfit=0;
    $strsql="SELECT * FROM emp_company where company_id IN(select company_id from emp_monthly_report where
	fin_year=".$year." and month=".$mth." and status='A')order by company_name";
	//echo $strsql;
    $result=mysql_query($strsql);
    while($row=mysql_fetch_array($result))
    {
		
	
			$this->Cell(10,5,$slno,"L,R,B",0,'C');
			$this->Cell(130,5,$row["company_name"],"R,B",0,'L');
		
	    
	    $strsql="SELECT effective_month,actual_manpower FROM emp_manpower WHERE company_id=".$row["company_id"]." and 
				 fin_year=".$year." and month=".$mth." and status='A'";
		$resultManpower=mysql_query($strsql);
		$rowManpower=mysql_fetch_row($resultManpower);	
		$this->Cell(20,5,$rowManpower[1],"L,R,B",0,'R');	
	    $this->Cell(20,5,$rowManpower[0],"L,R,B",0,'R');
	    
	   $strsql="select * from emp_turnover where company_id=".$row["company_id"]." 
			and fin_year=".$y1." ";
		//echo $strsql;
		$resultTurn1=mysql_query($strsql);
		$rowTurn1=mysql_fetch_assoc($resultTurn1);
		
		$strsql="select * from emp_turnover where company_id=".$row["company_id"]." 
			and fin_year=".$y2." ";
			
			
			
		
		$resultTurn2=mysql_query($strsql);
		$rowTurn2=mysql_fetch_assoc($resultTurn2);
		
		$strsql="select * from emp_turnover where company_id=".$row["company_id"]." 
		 and fin_year=".$y1." ";
		
		$resultProfit1=mysql_query($strsql);
		$rowProfit1=mysql_fetch_assoc($resultProfit1);
		
		$strsql="select * from emp_turnover where company_id=".$row["company_id"]." 
		 and fin_year=".$y2." ";
		
		$resultProfit2=mysql_query($strsql);
		$rowProfit2=mysql_fetch_assoc($resultProfit2);
			
	    $this->Cell(20,5,number_format($rowTurn2["turn_over"],2,'.',''),"L,R,B",0,'R');
	    $this->Cell(20,5,number_format($rowTurn1["turn_over"],2,'.',''),"L,R,B",0,'R');
	    $this->Cell(20,5,number_format($rowProfit2["profit_loss"],2,'.',''),"L,R,B",0,'R');
	    $this->Cell(20,5,number_format($rowProfit1["profit_loss"],2,'.',''),"L,R,B",0,'R');
	    /*
	    $strsql="SELECT count(*) FROM emp_products WHERE company_id=".$row["company_id"]." and 
				 fin_year=".$year." ";
		$resulProduct=mysql_query($strsql);
		$rowProduct=mysql_fetch_row($resulProduct);
		if($rowProduct==1)
		{		 
		    $strsql="SELECT * FROM emp_capacity WHERE company_id=".$row["company_id"]." and 
					 fin_year=".$year."";
			
			$resultCapacity=mysql_query($strsql);
			$rowCapacity=mysql_fetch_assoc($resultCapacity);
		    $this->Cell(20,5,number_format($rowCapacity["capacity_utilisation"],2,'.',''),"L,R,B",0,'R');
		}
		else
		{
			$this->Cell(20,5,"","L,R,B",0,'R');
		}*/
	    
	    $strsql="SELECT * FROM emp_reversed_budget WHERE company_id=".$row["company_id"]." and 
				 fin_year=".$year." ";
		
		$resultProduction=mysql_query($strsql);
		$rowProduction=mysql_fetch_assoc($resultProduction);
	    $this->Cell(20,5,number_format($rowProduction["value_of_production"],2,'.',''),"L,R,B",0,'R');
	    
	    $strsql="SELECT * FROM emp_profirability_statement WHERE company_id=".$row["company_id"]." and 
				 fin_year=".$year." and month=".$mth." and status='A'";
		
		$result1=mysql_query($strsql);
		$row1=mysql_fetch_assoc($result1);
		
	    $this->Cell(20,5,number_format($row1["actual_sale"],2,'.',''),"L,R,B",0,'R');
	    $totActualSale+=$row1["actual_sale"];
	    
	    $strsql="SELECT * FROM emp_monthlyreport_tot WHERE company_id=".$row["company_id"]." and 
				 fin_year=".$year." and month=".$mth." and status='A'";
		
		$result1=mysql_query($strsql);
		
		//echo $strsql;
		$row1=mysql_fetch_assoc($result1);
	    $this->Cell(20,5,number_format($row1["actual_production"],2,'.',''),"L,R,B",0,'R');
	    $this->Cell(20,5,number_format($row1["actual_cost"],2,'.',''),"L,R,B",0,'R');
	    $this->Cell(20,5,number_format($row1["actual_cash_profit"],2,'.',''),"L,R,B",0,'R');
	    $this->Cell(20,5,number_format($row1["actual_net_profit"],2,'.',''),"L,R,B",1,'R');
	    
	    $totCumulativeSale2+=$rowTurn2["turn_over"];
	    $totCumulativeProfit2+=$rowProfit2["profit_loss"];
	    $totCumulativeSale1+=$rowTurn1["turn_over"];
	    $totCumulativeProfit1+=$rowProfit1["profit_loss"];
	    $totCapacity="";
	    $totProduction+=$rowProduction["value_of_production"];
	    $totActualProduction+=$row1["actual_production"];
	    $totActualCost+=$row1["actual_cost"];
	    $totActualCashProfit+=$row1["actual_cash_profit"];
	    $totActualNetProfit+=$row1["actual_net_profit"];
	    $slno=$slno+1;
	    
	}
	$this->SetFont('Arial','B',9);
	
	$this->Cell(10,5,"","L,B",0,'C');
	$this->Cell(130,5,"Total","R,B",0,'L');	
	$this->Cell(20,5,"","R,B",0,'L');
	$this->Cell(20,5,"","R,B",0,'L');
	$this->Cell(20,5,number_format($totCumulativeSale2,2,'.',''),"L,R,B",0,'R');
	$this->Cell(20,5,number_format($totCumulativeSale1,2,'.',''),"L,R,B",0,'R');
	$this->Cell(20,5,number_format($totCumulativeProfit2,2,'.',''),"L,R,B",0,'R');
	$this->Cell(20,5,number_format($totCumulativeProfit1,2,'.',''),"L,R,B",0,'R');
	$this->Cell(20,5,number_format($totProduction,2,'.',''),"L,R,B",0,'R');
	$this->Cell(20,5,number_format($totActualSale,2,'.',''),"L,R,B",0,'R');
	$this->Cell(20,5,number_format($totActualProduction,2,'.',''),"L,R,B",0,'R');
    $this->Cell(20,5,number_format($totActualCost,2,'.',''),"L,R,B",0,'R');
    $this->Cell(20,5,number_format($totActualCashProfit,2,'.',''),"L,R,B",0,'R');
    $this->Cell(20,5,number_format($totActualNetProfit,2,'.',''),"L,R,B",1,'R');
    
    $this->ln();
    $this->ln();
    $this->Cell(10,4,"",0,0,'C');
    $this->Cell(10,4,"Source : Company",0,0,'C');
    //foreach($header as $col)
     //   $this->Cell(40,7,$col,1);
   
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