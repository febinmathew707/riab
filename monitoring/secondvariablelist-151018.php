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
 mysql_select_db("soemonit_soemonit_pentaclt",$con);
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
   //$fyear=$_GET["fyear"];
   $fmth=4;
   $tmth=$_GET["tmth"];
   $tyear=$month->getYear($tmth,$_GET["tyear"]);
   
   if($tmth<=3)
   {
		$fyear=$tyear-1;
	}
   else
   {
		$fyear=$tyear;
	}
   /*
   $strsql="select * from emp_fin_year where year=".$fyear." ";
   $resultFin=mysql_query($strsql);
   $rowFin=mysql_fetch_assoc($resultFin);
   $fin1=$month->getYear($fmth,$rowFin["fin_year"]);
   $strsql="select * from emp_fin_year where year=".$tyear." ";
   $resultFin=mysql_query($strsql);
   $rowFin=mysql_fetch_assoc($resultFin);  
   $fin2=$month->getYear($tmth,$rowFin["fin_year"]);
   */
   $fin1=$fyear;
   $fin2=$tyear;
   $f=mktime(0,0,0,$fmth,1,$fin1);
   $fdate=date("Y-m-d",$f);
   $t=mktime(0,0,0,$tmth,1,$fin2);
   $tdate=date("Y-m-d",$t);
   ////////////////////////////////////  HEADING /////////////////////////////
   //$this->Cell(10,7,$fin1,"L,T,R",0,'C');
   $this->SetFont('Arial','B',12);
	$this->Cell(280,10,'REVIEW OF MANUFCATURING SECTOR PSUs UNDER INDUSTRIES DEPARTMENT ('.$month->getMonth($tmth).' ,
	 '.$fin2.')',0,0,'C');
	$this->ln();
	$this->SetFont('Arial','B',8);
    $this->Cell(10,7,"","L,T,R",0,'C');
    $this->Cell(110,7,"","T",0,'C');
    $this->Cell(182,7,"Performance During ".$month->getMonth($fmth). " ". $fin1." - "
	.$month->getMonth($tmth). " ". $fin2." (Rs.Lakhs)","L,T,R,B",0,'C');
    $this->Cell(18,7,"Sales","L,T,R",0,'C');
    $this->Cell(77,7,"Other Details as at the end of "
	 .$month->getMonth($tmth). " ". $fin2 ,"L,T,R,B",1,'C');
    ////////////////// SECOND LINE ///////////////////////
    $this->SetFont('Arial','B',8);
    $this->Cell(10,4,"Sl","L,R",0,'C');
    $this->Cell(110,4,"","",0,'C');
    $this->Cell(17,4,"Sales","L,T,R",0,'C');
    $this->Cell(17,4,"","L,T,R",0,'C');
    $this->Cell(17,4,"","L,T,R",0,'C');
    $this->Cell(17,4,"","L,T,R",0,'C');
    $this->Cell(17,4,"","L,T,R",0,'C');
    $this->Cell(17,4,"","L,T,R",0,'C');
    $this->Cell(17,4,"","L,T,R",0,'C');
    $this->Cell(15,4,"","L,T,R",0,'C');
    $this->Cell(18,4,"","L,T,R",0,'C');
    $this->Cell(15,4,"","L,T,R",0,'C');
    $this->Cell(15,4,"","L,T,R",0,'C');
    $this->Cell(18,4,"Realisation","L,R",0,'C');
    $this->Cell(15,4,"","L,T,R",0,'C');
    $this->Cell(15,4,"","L,T,R",0,'C');
    $this->Cell(15,4,"","L,T,R",0,'C');
    $this->Cell(15,4,"","L,T,R",0,'C');
    $this->Cell(17,4,"","L,T,R",1,'C');
    ////////////// THIRD LINE //////////////////////
    $this->SetFont('Arial','',8);
    $this->Cell(10,4,"No","L,R",0,'C');
    $this->Cell(110,4,"Company","",0,'C');
    $this->Cell(17,4,"Without","L,R",0,'C');
    $this->Cell(17,4,"Value of","L,R",0,'C');
    $this->Cell(17,4,"Raw","L,R",0,'C');
    $this->Cell(17,4,"Other","L,R",0,'C');
    $this->Cell(17,4,"Employee","L,R",0,'C');
    $this->Cell(17,4,"Other","L,R",0,'C');
    $this->Cell(17,4,"Cost of","L,R",0,'C');
    $this->Cell(15,4,"","L,R",0,'C');
    $this->Cell(18,4,"","L,R",0,'C');
    $this->Cell(15,4,"Other","L,R",0,'C');
    $this->Cell(15,4,"Net","L,R",0,'C');
    $this->Cell(18,4,"during","L,R",0,'C');
    $this->Cell(15,4,"Value of","L,R",0,'C');
    $this->Cell(15,4,"Sundry","L,R",0,'C');
    $this->Cell(15,4,"Sundry","L,R",0,'C');
    $this->Cell(15,4,"Dues","L,R",0,'C');
    $this->Cell(17,4,"Dues","L,R",1,'C');
    ////////////// FOURTH LINE //////////////////////
    $this->SetFont('Arial','',8);
    $this->Cell(10,4,"","L,R",0,'C');
    $this->Cell(110,4,"","",0,'C');
    $this->Cell(17,4,"taxes and","L,R",0,'C');
    $this->Cell(17,4,"Production","L,R",0,'C');
    $this->Cell(17,4,"Material","L,R",0,'C');
    $this->Cell(17,4,"Variable","L,R",0,'C');
    $this->Cell(17,4,"Cost","L,R",0,'C');
    $this->Cell(17,4,"Fixed","L,R",0,'C');
    $this->Cell(17,4,"Production","L,R",0,'C');
    $this->Cell(15,4,"PBDIT","L,R",0,'C');
    $this->Cell(18,4,"PBDT","L,R",0,'C');
    $this->Cell(15,4,"Income","L,R",0,'C');
    $this->Cell(15,4,"Profit / ","L,R",0,'C');
    $this->Cell(18,4,"month","L,R",0,'C');
    $this->Cell(15,4,"Orders","L,R",0,'C');
    $this->Cell(15,4,"Creditors","L,R",0,'C');
    $this->Cell(15,4,"Debtors","L,R",0,'C');
    $this->Cell(15,4,"to PF","L,R",0,'C');
    $this->Cell(17,4,"to ESI","L,R",1,'C');
    ////////////// FIFTH LINE //////////////////////    
    $this->Cell(10,4,"","L,R,B",0,'C');
    $this->Cell(110,4,"","B",0,'C');
    $this->Cell(17,4,"duties","L,R,B",0,'C');
    $this->Cell(17,4,"","L,R,B",0,'C');
    $this->Cell(17,4,"Cost","L,R,B",0,'C');
    $this->Cell(17,4,"Cost","L,R,B",0,'C');
    $this->Cell(17,4,"","L,R,B",0,'C');
    $this->Cell(17,4,"Expenses","L,R,B",0,'C');
    $this->Cell(17,4,"","L,R,B",0,'C');
    $this->Cell(15,4,"","L,R,B",0,'C');
    $this->Cell(18,4,"","L,R,B",0,'C');
    $this->Cell(15,4,"","L,R,B",0,'C');
    $this->Cell(15,4,"Loss","L,R,B",0,'C');
    $this->Cell(18,4,"(Lakhs)","L,R,B",0,'C');
    $this->Cell(15,4,"on hand","L,R,B",0,'C');
    $this->Cell(15,4,"","L,R,B",0,'C');
    $this->Cell(15,4,"","L,R,B",0,'C');
    $this->Cell(15,4,"","L,R,B",0,'C');
    $this->Cell(17,4,"","L,R,B",1,'C');
    $this->SetFont('Arial','',8);
    
    //////////////////	 BODY OF REPORT //////////////////////////////////
    $totCumulativeSale=0;
	$totCumulativeProduction=0;
	$totCumulativeRowmaterial=0;    
	$totCumulativeOtherVariableCost=0;
	$totCumulativeEmployeeCost=0;
	$totCumulativeOtherExpense=0;
	$totCumulativeCost=0;    
	$totCumulative_profit2=0;
	$totCumulative_profit1=0;
	$totCumulativeOtherIncome=0;
	$totCumulativeNetProfit=0;
	$totSalesRealisation=0;	    
    $totValueofOrders=0;
    $totSundryCreditors=0;
    $totSundryDebtors=0;
    $totPF=0;
	$totESI=0;
    $slno=1;
    $strsql="SELECT * FROM emp_company where company_id IN(select company_id from emp_monthly_report where
	rpt_date='".$tdate."' and status='A') order by company_name";
    $result=mysql_query($strsql);
    while($row=mysql_fetch_array($result))
    {
			
		
		//$this->Cell(110,4,$row["company_name"],"R,B",0,'C');   
	    
	   
			$this->Cell(10,4,$slno,"L,R,B",0,'C');
			$this->Cell(110,4,$row["company_name"],"R,B",0,'L');
		
		
	    $strsql="SELECT cumulative_sale from emp_profirability_statement where company_id=".$row["company_id"]." 
		and rpt_date='".$tdate."' and status='A' ";
		$resultsub=mysql_query($strsql);
		$rowsub=mysql_fetch_row($resultsub);
	    $this->Cell(17,4,number_format($rowsub[0],2,'.',''),"L,R,B",0,'R');
	    $totCumulativeSale+=$rowsub[0];
	    
	    $strsql="SELECT cumulative_production from emp_monthlyreport_tot where 
		company_id=".$row["company_id"]." 	and  rpt_date='".$tdate."' and status='A'";
		$resultsub=mysql_query($strsql);
		$rowsub=mysql_fetch_row($resultsub);
	    $this->Cell(17,4,number_format($rowsub[0],2,'.',''),"L,R,B",0,'R');
	    $totCumulativeProduction+=$rowsub[0];
	    
	    $strsql="SELECT cumulative_rowmaterial,cumulative_other_variablecost from emp_variable_expenses where 
		company_id=".$row["company_id"]." 	and rpt_date='".$tdate."' and status='A'";
		$resultsub=mysql_query($strsql);
		$rowsub=mysql_fetch_row($resultsub);
	    $this->Cell(17,4,number_format($rowsub[0],2,'.',''),"L,R,B",0,'R');    
	    $this->Cell(17,4,number_format($rowsub[1],2,'.',''),"L,R,B",0,'R');
	    $totCumulativeRowmaterial+=$rowsub[0];
	    $totCumulativeOtherVariableCost+=$rowsub[1];
	    
	    $strsql="SELECT cumulative_employee_cost,cumulative_other_expense from emp_fixed_expenses where 
		company_id=".$row["company_id"]." 	and rpt_date='".$tdate."' and status='A'";
		$resultsub=mysql_query($strsql);
		$rowsub=mysql_fetch_row($resultsub);
		
	    $this->Cell(17,4,number_format($rowsub[0],2,'.',''),"L,R,B",0,'R');
	    $this->Cell(17,4,number_format($rowsub[1],2,'.',''),"L,R,B",0,'R');
	    $totCumulativeEmployeeCost+=$rowsub[0];
	    $totCumulativeOtherExpense+=$rowsub[1];
	    
	    $strsql="SELECT cumulative_cost,cumulative_profit2,cumulative_profit1 from emp_monthlyreport_tot where 
		company_id=".$row["company_id"]." 	and rpt_date='".$tdate."' and status='A'";
		$resultsub=mysql_query($strsql);
		$rowsub=mysql_fetch_row($resultsub);
	    $this->Cell(17,4,number_format($rowsub[0],2,'.',''),"L,R,B",0,'R');    
	    $this->Cell(15,4,number_format($rowsub[2],2,'.',''),"L,R,B",0,'R');
	    $totCumulativeCost+=$rowsub[0];
	    $totCumulative_profit1+=$rowsub[2];
	    
	    
	    $this->Cell(18,4,number_format($rowsub[1],2,'.',''),"L,R,B",0,'C');
	    
	    $totCumulative_profit2+=$rowsub[1];
	    
	     $strsql="SELECT cumulative_other_income from emp_otherincome_depr where 
		company_id=".$row["company_id"]."  	and rpt_date='".$tdate."' and status='A'";
		$resultsub=mysql_query($strsql);
		$rowsub=mysql_fetch_row($resultsub);
	    $this->Cell(15,4,number_format($rowsub[0],2,'.',''),"L,R,B",0,'R');
	    $totCumulativeOtherIncome+=$rowsub[0];
	    
	    $strsql="SELECT cumulative_net_profit from emp_monthlyreport_tot where 
		company_id=".$row["company_id"]." 	and rpt_date='".$tdate."' and status='A'";
		$resultsub=mysql_query($strsql);
		$rowsub=mysql_fetch_row($resultsub);
	    $this->Cell(15,4,number_format($rowsub[0],2,'.',''),"L,R,B",0,'R');
	    $totCumulativeNetProfit+=$rowsub[0];
	    
	    $strsql="SELECT * from emp_financial_indicators where 
		company_id=".$row["company_id"]." 	and rpt_date='".$tdate."' and status='A'";
		
		//echo $strsql;
		$resultsub=mysql_query($strsql);
		$rowsub=mysql_fetch_assoc($resultsub);
	    $this->Cell(18,4,number_format($rowsub["sales_realisation"],2,'.',''),"L,R,B",0,'R');	    
	    $this->Cell(15,4,number_format($rowsub["value_of_orders"],2,'.',''),"L,R,B",0,'R');
	    $this->Cell(15,4,number_format($rowsub["sundry_creditors"],2,'.',''),"L,R,B",0,'R');
	    $this->Cell(15,4,number_format($rowsub["sundry_debtors"],2,'.',''),"L,R,B",0,'R');
	    $totSalesRealisation+=$rowsub["sales_realisation"];
	    $totValueofOrders+=$rowsub["value_of_orders"];
	    $totSundryCreditors+=$rowsub["sundry_creditors"];
	    $totSundryDebtors+=$rowsub["sundry_debtors"];
	    
	    $strsql="SELECT * from emp_statutory_dues where 
		company_id=".$row["company_id"]." 	and rpt_date='".$tdate."' and status='A'";
		$resultsub=mysql_query($strsql);
		$rowsub=mysql_fetch_assoc($resultsub);
	    $this->Cell(15,4,number_format($rowsub["PF"],2,'.',''),"L,R,B",0,'R');
	    $this->Cell(17,4,number_format($rowsub["ESI"],2,'.',''),"L,R,B",1,'R');
	    $totPF+=$rowsub["PF"];
	    $totESI+=$rowsub["ESI"];
	    $slno=$slno+1;
	}
	$this->Cell(10,4,"","L,B",0,'C');
	$this->SetFont('Arial','B',8);
	$this->Cell(110,4,"Total","R,B",0,'L');
	$this->Cell(17,4,number_format($totCumulativeSale,2,'.',''),"L,R,B",0,'R');
	$this->Cell(17,4,number_format($totCumulativeProduction,2,'.',''),"L,R,B",0,'R');
	$this->Cell(17,4,number_format($totCumulativeRowmaterial,2,'.',''),"L,R,B",0,'R');    
	$this->Cell(17,4,number_format($totCumulativeOtherVariableCost,2,'.',''),"L,R,B",0,'R');
	$this->Cell(17,4,number_format($totCumulativeEmployeeCost,2,'.',''),"L,R,B",0,'R');
	$this->Cell(17,4,number_format($totCumulativeOtherExpense,2,'.',''),"L,R,B",0,'R');
	$this->Cell(17,4,number_format($totCumulativeCost,2,'.',''),"L,R,B",0,'R');    
	$this->Cell(15,4,number_format($totCumulative_profit1,2,'.',''),"L,R,B",0,'R');
	$this->Cell(18,4,number_format($totCumulative_profit2,2,'.',''),"L,R,B",0,'C');
	$this->Cell(15,4,number_format($totCumulativeOtherIncome,2,'.',''),"L,R,B",0,'R');	
	$this->Cell(15,4,number_format($totCumulativeNetProfit,2,'.',''),"L,R,B",0,'R');
	$this->Cell(18,4,number_format($totSalesRealisation,2,'.',''),"L,R,B",0,'R');	    
    $this->Cell(15,4,number_format($totValueofOrders,2,'.',''),"L,R,B",0,'R');
    $this->Cell(15,4,number_format($totSundryCreditors,2,'.',''),"L,R,B",0,'R');
    $this->Cell(15,4,number_format($totSundryDebtors,2,'.',''),"L,R,B",0,'R');
    $this->Cell(15,4,number_format($totPF,2,'.',''),"L,R,B",0,'R');
	$this->Cell(17,4,number_format($totESI,2,'.',''),"L,R,B",1,'R');
	
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