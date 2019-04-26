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
   
   $fmth=4;
   $tyear=$_GET["tyear"];
   $tmth=$_GET["tmth"];
   $t=$month->getYear($tmth,$tyear);/// for report heading only 
   $fmonth=$month->getMonth($fmth);
   $tmonth=$month->getMonth($tmth);
   $f=$month->getYear($fmth,$tyear);/// for report heading only 
   /*
   if($tmth<=3)
   {
		$fyear=$t-1;
	}
   else
   {
		$fyear=$t;
	}
   */
   //$pref=$fyear-1;
    $fyear=$tyear-1;
   $pref=$fyear;
   $pret=$t-1;
   $preyear=$pref."-".$pret;
  // $this->Cell(100,7,$fyear,1);
   ////////////////////////////////////  HEADING /////////////////////////////
   	$this->SetFont('Arial','',10);
	$this->Cell(190,6,"PERFORMANCE Of PSUs UNDER INDUSTRIES DEPARTMENT ( ".$month->getMonth($tmth)." "
	.substr($tyear,2,2)." - ". substr($tyear,7)." )",0,0,'C');
	$this->ln();
	$this->SetFont('Arial','B',12);
	$this->Cell(190,6,"PROFIT MAKING UNITS",0,0,'C');
	$this->ln();
	
	$this->SetFont('Arial','',8);
	$this->Cell(180,6,"(Rs. in Lakhs)",0,0,'R');
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
    
    
    $this->Cell(25,4,substr($fmonth,0,3)." ".substr($f-1,2,2)." - ".substr($tmonth,0,3)." ".substr($t-1,2,2),1,0,'C');
    $this->Cell(25,4,substr($fmonth,0,3)." ".substr($f,2,2)." - ".substr($tmonth,0,3)." ".substr($t,2,2),1,0,'C');
    
    $this->Cell(25,4,substr($fmonth,0,3)." ".substr($f-1,2,2)." - ".substr($tmonth,0,3)." ".substr($t-1,2,2),1,0,'C');
    $this->Cell(25,4,substr($fmonth,0,3)." ".substr($f,2,2)." - ".substr($tmonth,0,3)." ".substr($t,2,2),1,1,'C');
    /*
	$this->Cell(25,4,substr($month->getMonth($tmth),0,3)." " . $t,"L,R,B",0,'C');
      $this->Cell(25,4,substr($month->getMonth($fmth),0,3)." " . substr($fyear,2,2). " - ".substr($month->getMonth($tmth),0,3)." " . substr($t,2,2),"L,R,B",1,'C');
      */
      
    ///////////// BODY OF REPORT ///////////////////
     $slno=1;
	  $tyear=substr($_GET["tyear"],5);
   $fyear=$tyear-1;
   
   $strsql="update emp_monthly_report a set cumulative_net_profit=(select max(cumulative_net_profit) from emp_monthlyreport_tot where
company_id=a.company_id and fin_year=a.fin_year and month=a.month) where fin_year=".$t." and month=".$tmth."";
mysql_query($strsql); 

    $strsql="select company_id from 
			emp_monthly_report where fin_year=".$tyear." and month=".$tmth." and cumulative_net_profit>0 and status='A'
			   order by cumulative_net_profit desc";
	//$this->Cell(100,4,$strsql,"L,R,B",1,'C');	
    $result=mysql_query($strsql);
    $totpreturn=0;
	$totturn=0;
	$totprepandl=0;
	$totpandl=0;
    while($row=mysql_fetch_array($result))
    {    	
		$preturn=0;
		$turn=0;
		$pandl=0;
		$prepandl=0;
		$sqlcheck="SELECT status from emp_monthly_report WHERE company_id=".$row["company_id"]." and 
				 fin_year=".$tyear." and month=".$tmth." ";
		$resultcheck=mysql_query($sqlcheck);
		$rowcheck=mysql_fetch_row($resultcheck);
		
		$sqlcheck1="SELECT status from emp_monthly_report WHERE company_id=".$row["company_id"]." and 
				 fin_year=".substr($fyear,0,4)." and month=".$tmth." ";
		$resultcheck1=mysql_query($sqlcheck1);
		$rowcheck1=mysql_fetch_row($resultcheck1);
		
		//$this->ln();
		//$this->Cell(100,4,$strsqlcheck,"L,R,B",1,'C');	
		if($rowcheck[0]=="A")
		{
			$strsqlcom="SELECT * FROM emp_company where company_id=".$row[0]."";
			$resultcom=mysql_query($strsqlcom);
			$rowcom=mysql_fetch_assoc($resultcom);	
			if(strlen($rowcom["company_name"])>55)
		    {
				$len=55;
				$pos=55;
				$no=0;
				$this->Cell(10,4,$slno,"L,R",0,'C');
				$this->Cell(80,4,substr($rowcom["company_name"],0,55),"R",0,'L');
				$this->Cell(25,4,"","L,R",0,'C');
	     		$this->Cell(25,4,"","L,R",0,'C');
	    		$this->Cell(25,4,"","L,R",0,'C');
	      		$this->Cell(25,4,"","L,R",0,'C');
				    
				while($no<strlen($rowcom["company_name"])-55)
				{	
					$pos=$len;
					if((strlen($rowcom["company_name"])-$pos)>55)
					{
						$len=55;
					}
					else
					{
						$len=(strlen($rowcom["company_name"])-$pos);
					}
					$this->ln();
					$this->Cell(10,4,"","L,R,B",0,'C');
					$this->Cell(80,4,substr($rowcom["company_name"],$pos,$len),"R,B",0,'L');
				
					$no=$pos;
					$pos=$pos+$len;
				}
				
			}
			else
			{
				$this->Cell(10,4,$slno,"L,R,B",0,'C');
				$this->Cell(80,4,substr($rowcom["company_name"],0,55),"R,B",0,'L');
			}		
	
				//$this->Cell(10,4,$slno,"L,R,B",0,'C');
				//$this->Cell(80,4,$rowcom["company_name"],"R,B",0,'L');
			
	    	if($rowcheck1[0]=="A")
	    	{
		    	$strsql="select * from emp_profirability_statement where company_id=".$row["company_id"]." 
				and fin_year=".$fyear." and month=".$tmth." and status='A'";
		    	$result1=mysql_query($strsql);
		    	$row1=mysql_fetch_assoc($result1);
				$preturn=$row1["cumulative_sale"];
				
				$strsql="select * from emp_monthlyreport_tot where company_id=".$row["company_id"]." 
				and fin_year=".$fyear." and month=".$tmth." and status='A'";
		    	$result1=mysql_query($strsql);
		    	$row1=mysql_fetch_assoc($result1);
				$prepandl=$row1["cumulative_net_profit"];
				
				//echo $strsql;
			}
			
			
			$strsql="select * from emp_profirability_statement where company_id=".$row["company_id"]." and 
			fin_year=".$tyear."	and month=".$tmth." and status='A'";
	    	$result1=mysql_query($strsql);
	    	$row1=mysql_fetch_assoc($result1);
			$turn=$row1["cumulative_sale"];
			
			$strsql="select * from emp_monthlyreport_tot where company_id=".$row["company_id"]." 
			and fin_year=".$tyear." and month=".$tmth." and status='A'";
	    	$result1=mysql_query($strsql);
	    	$row1=mysql_fetch_assoc($result1);
			$pandl=$row1["cumulative_net_profit"];
			
			    	
	    	$this->Cell(25,4,number_format($preturn,2,'.',''),"L,R,B",0,'R');
	    	$this->Cell(25,4,number_format($turn,2,'.',''),"L,R,B",0,'R');
	    	$this->Cell(25,4,number_format($prepandl,2,'.',''),"L,R,B",0,'R');
	    	$this->Cell(25,4,number_format($pandl,2,'.',''),"L,R,B",1,'R');
	    	
	    	$slno=$slno+1;
	    	$totpreturn+=$preturn;
	    	$totturn+=$turn;
	    	$totpandl+=$pandl;
	    	$totprepandl+=$prepandl;
	    	
	    }
    }
    if($totpandl>0 || $totpreturn>0 || $totturn>0 || $totprepandl>0 || $totpandl>0 )
			{	
				$this->SetFont('Arial','B',9);
				$this->Cell(10,6,"","L,R,B",0,'C');
				$this->Cell(80,6,"Total","R,B",0,'C');
				$this->Cell(25,6,number_format($totpreturn,2,'.',''),"L,R,B",0,'R');
		    	$this->Cell(25,6,number_format($totturn,2,'.',''),"L,R,B",0,'R');
		    	$this->Cell(25,6,number_format($totprepandl,2,'.',''),"L,R,B",0,'R');
		    	$this->Cell(25,6,number_format($totpandl,2,'.',''),"L,R,B",0,'R');
		    }
		    $this->ln();
		    $this->ln();
		    $this->Cell(10,4,"",0,0,'C');
		    $this->Cell(10,4,"Source : Company",0,0,'C');
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