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
   ////////////////////////////////////  HEADING /////////////////////////////
   	$this->SetFont('Arial','',10);
	$this->Cell(200,6,"Performance Report as at the end of ".$month->getMonth($tmth)." ".$t,0,0,'C');
	$this->ln();
	$this->SetFont('Arial','B',12);
	$this->Cell(200,6,"PF DUES",0,0,'C');
	$this->ln();
	
	$this->SetFont('Arial','',8);
	$this->Cell(165,6,"(Rs. in Lakhs)",0,0,'R');
	$this->ln();
	$this->SetFont('Arial','',8);

    ///////////////// SECOND LINE
    $this->Cell(25,8,"",0,0,'C');
	$this->Cell(10,8,"Sl.No",1,0,'C');
    $this->Cell(100,8,"COMPANY",1,0,'C');
    $this->Cell(30,8,"PF",1,1,'C');
    ////////////// BODY ////////////////
    $strsql="SELECT * FROM emp_company where company_id in (select company_id from emp_statutory_dues where 
	          fin_year=".substr($tyear,5)." and month=".$tmth." and PF>0)";
    
	$result=mysql_query($strsql);
	$slno=1;
	$totpf=0;
	while($row=mysql_fetch_array($result))
	{
		$sqlcheck="SELECT status from emp_monthly_report WHERE company_id=".$row["company_id"]." and 
				 fin_year=".substr($tyear,5)." and month=".$tmth." ";
		//echo $strsql;
		$resultcheck=mysql_query($sqlcheck);
		$rowcheck=mysql_fetch_row($resultcheck);
		if($rowcheck[0]=="A")
		{
			$strsql1="select * from emp_statutory_dues where  fin_year=".substr($tyear,5)." and month=".$tmth." and company_id=".$row["company_id"]." ";
			
			$result1=mysql_query($strsql1);
			$row1=mysql_fetch_assoc($result1);
		    
			//$this->Cell(25,8,"",0,0,'C');
			if(strlen($row["company_name"])>70)
			    {
					$len=70;
					$pos=70;
					$no=0;
					$this->Cell(25,8,"",0,0,'C');
					$this->Cell(10,8,$slno,"L,R",0,'C');
					$this->Cell(100,8,substr($row["company_name"],0,70),"R",0,'L');
					$this->Cell(30,8,"","R",0,'C');
					    
					while($no<strlen($row["company_name"])-70)
					{	
						$pos=$len;
						if((strlen($row["company_name"])-$pos)>70)
						{
							$len=70;
						}
						else
						{
							$len=(strlen($row["company_name"])-$pos);
						}
						$this->ln();
						$this->Cell(25,8,"",0,0,'C');
						$this->Cell(10,8,"","L,R,B",0,'C');
						$this->Cell(100,8,substr($row["company_name"],$pos,$len),"R,B",0,'L');
						
						$no=$pos;
						$pos=$pos+$len;
					}
					
				}
				else
				{
					$this->Cell(25,8,"",0,0,'C');
					$this->Cell(10,8,$slno,"L,R,B",0,'C');
					$this->Cell(100,8,substr($row["company_name"],0,70),"R,B",0,'L');
				}
	    	$this->Cell(30,8,number_format($row1["PF"],2,'.',''),"L,R,B",1,'R');
	    	
	    	$totpf+=$row1["PF"];
	    	//$this->Cell(200,8,$strsql,0,1,'C');
	    	$slno=$slno+1;
	    }
	}
	$this->Cell(25,8,"",0,0,'C');
	$this->Cell(10,8,"","L,R,B",0,'C');
	$this->Cell(100,8,"Total","R,B",0,'L');
	$this->Cell(30,8,number_format($totpf,2,'.',''),"L,R,B",1,'R');
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