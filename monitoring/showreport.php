<?php session_start(); ?>
<?php
 	include("../connectdb/connect.php");
	/// GET ALL PASSED VALUES IN VARIABLES
 	 mysql_select_db("soemonit_pentaclt",$con);
	if(!$con)
	{
		die('Could not connect to server' . mysql_error());
	} 
	require("fpdf.php");
	class PDF extends FPDF
	{
		var  $width= array();
		var $cond="";
		
		function Header()
		{
			//$this->SetFont('Arial','',8);
			
			$this->Cell(180,7,$this->page,0,0,'R');
			$this->Ln();
			$strsql="SELECT * FROM emp_rpt_templates_det where TEMP_ID=".$_GET["rpt_id"]."";
			$result=mysql_query($strsql);
			$flds="SELECT ";
			$i=0;
			while($row=mysql_fetch_array($result))
			{
				$flds=$flds.$row["FLD_NAME"].", ";
				$this->width[$i]=$row["FLD_WIDTH"];
				$this->Cell($this->width[$i],7,$row["FLD_NAME"],1,0,'C');
				$i=$i+1;
				
			}
			$this->Ln();
		}
		function Footer()
		{
			//$this->Cell(50,7,$this->width,1,0,'C');
			$this->Cell(array_sum($this->width),0,'','T');
			$this->Ln();
		}
		function ImprovedTable()
		{
		    //Column widths
		    $w=array(40,35,40,45);
		    //Header
		    /*
		    for($i=0;$i<count($header);$i++)
		        $this->Cell($w[$i],7,$header[$i],1,0,'C');
		    $this->Ln();
		    */
		    //Data	
		    $mrk=-1;
			$strsql="SELECT * FROM emp_rpt_templates_det where TEMP_ID=".$_GET["rpt_id"]."";
			$result=mysql_query($strsql);
			$flds="SELECT ";
			$i=0;
			while($row=mysql_fetch_array($result))
			{
				$flds=$flds.$row["FLD_NAME"].", ";
				
				if($row["FLD_NAME"]=="Date_Of_Birth")
				{
					$mrk=$i;
				}
				//$this->Cell(50,7,$this->width[$i],1,0,'C');
				$i=$i+1;
				
			}
			//$this->Ln();   
			$len=strlen($flds)-2; 
			$flds=substr($flds,0,$len);
			if($this->cond!="")
			{
				$strsql=$flds." FROM employee " . $this->cond;
			}
			else
			{
				$strsql=$flds." FROM employee ";
			}
			//echo "<br>sql=".$strsql;
			//$this->Ln();
			
			
			$result=mysql_query($strsql);
			
			$cnt=mysql_num_fields($result);
			
			
			while($row=mysql_fetch_array($result))					
		    {
		        $x=50;
				for($i=0;$i<=$cnt-1;$i++)
		        {
					//$this->Cell($this->width[$i],7,$this->width[$i],1,0,'C');
					if ($i==$mrk)
					{
						$this->Cell($this->width[$i],6,date('d-m-Y',strtotime($row[$i])),'LR');
					}
					else
					{
						$this->Cell($this->width[$i],6,$row[$i],'LR');
					}	
					//$this->Cell(50,6,$this->width[$i],'LR');
					//$x=$x+5;	        
		        }
		        $this->Ln();
		        
		    }
		    //$this->Cell(200,6,$strsql,'LR');
		    //Closure line
		    $this->Cell(array_sum($this->width),0,'','T');
		    $this->Ln();
		}
		function filter()
		{
			if(isset($_SESSION["cltype"]))
			{
				$clicktype=$_SESSION["cltype"];
			}
			else
			{
				$clicktype="";
			}
			
			if(isset($_SESSION["curval"]))
			{
				$currentval=$_SESSION["curval"];
			}
			else
			{
				$currentval=1;
			}
			if(isset($_SESSION["fval"]))
			{
				$firstval=$_SESSION["fval"];
			}
			else
			{
				$firstval=1;
			}
			if(isset($_SESSION["lval"]))
			{
				$lastval=$_SESSION["lval"];
			}
			else
			{
				$lastval=10;
			}
			if(isset($_SESSION["keyword"]))
			{
				$keyword=$_SESSION["keyword"];
			}
			else
			{
				$keyword="";
			}
			if(isset($_SESSION["s_city"]))
			{
				$city=$_SESSION["s_city"];
			}
			else
			{
				$city="";
			}
			if(isset($_SESSION["quali"]))
			{
				$quali=str_replace("|","&",$_SESSION["quali"]);
			}
			else
			{
				$quali="";
			}
			if(isset($_SESSION["desig"]))
			{
				$desig=str_replace("|","&",$_SESSION["desig"]);
			}
			else
			{
				$desig="";
			}
			if(isset($_SESSION["company"]))
			{
				$company=str_replace("|","&",$_SESSION["company"]);
			}
			else
			{
				$company="";
			}
			
			
			if ($currentval>1)
			{	
				$startno=($currentval*10)-9;		
			}
			else
			{
				$startno=1;
				$firstval=1;
				$lastval=10;
			}
			$endno=$startno+9;
			$beginno=$startno;
			
		//	echo "school=".$school;
			$flg=0;
			$sql="";
				
				if ($keyword!="" )
				{
					$flg=1;
					if(strpos($sql,"where")===false)
					{
						 
						$this->cond=$this->cond . " where First_Name like '%".$keyword."%'"; 
					}
					else
					{
						$sql=$sql . " and First_Name like '%".$keyword."%'"; 
						$this->cond=$this->cond . " and First_Name like '%".$keyword."%'"; 
					}
				}
				//echo("<br> LENGHT=".$quali);
				if (strlen($city)>0 && $city!="All")
				{
					$flg=1;
					if(strpos($sql,"where")===false)
					{
						$sql=$sql . " where City='".$city."' "; 
						$this->cond=$this->cond . " where City='".$city."' "; 
					}
					else
					{
						$sql=$sql . " and City='".$city."' "; 
						$this->cond=$this->cond . " and City='".$city."' "; 
					}
				}
				if (strlen($quali)>0 && $quali!="All")
				{
					$flg=1;
					if(strpos($sql,"where")===false)
					{
						$sql=$sql . " where Qualification='".$quali."' "; 
						$this->cond=$this->cond . " where Qualification='".$quali."' "; 
					}
					else
					{
						$sql=$sql . " and Qualification='".$quali."' "; 
						$this->cond=$this->cond . " and Qualification='".$quali."' "; 
					}
				}
				if ($desig!="" && $desig!="All")
				{
					$flg=1;
					if(strpos($sql,"where")===false)
					{
						$sql=$sql . " where Designation='".$desig."' "; 
						$this->cond=$this->cond . " where Designation='".$desig."' "; 
					}
					else
					{
						$sql=$sql . " and Designation='".$desig."' "; 
						$this->cond=$this->cond . " and Designation='".$desig."' "; 
					}
				}
				if ($company!="" && $company!="All")
				{
					$flg=1;
					if(strpos($sql,"where")===false)
					{
						$sql=$sql . " where company_name='".$company."' "; 
						$this->cond=$this->cond . " where company_name='".$company."' "; 
					}
					else
					{
						$sql=$sql . " and company_name='".$company."' "; 
						$this->cond=$this->cond . " and company_name='".$company."' ";
					}
				}
					$orderby="First_Name";
					$sql=$sql." order by ". $orderby." desc" ;
					$this->cond=$this->cond." order by ". $orderby." desc" ;
			
		}
	}

	$pdf=new PDF();
//Column titles

//Data loading
//$data=$pdf->LoadData('countries.txt');
$pdf->filter();
$pdf->SetFont('Arial','',7.5);
$pdf->AddPage();
$pdf->ImprovedTable();
$pdf->Output();
?>