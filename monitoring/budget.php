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

  

 

  // $this->Cell(100,7,$fyear,1);

   ////////////////////////////////////  HEADING /////////////////////////////

    $company_id=$_GET["company_id"];

	$this->SetFont('Arial','B',12);

	$this->Cell(200,6,"BUDGET MASTER",0,0,'C');

	$this->ln();



	$this->ln();

	$this->SetFont('Arial','B',10);

	/// FIRST LINE

    $this->Cell(90,5,"Company","L,T,R",0,'L');

    $this->Cell(25,5,"FinYear","L,T,R",0,'L');

    $this->Cell(25,5,"Sales","L,T,R",0,'R');

    $this->Cell(25,5,"Stock","L,T,R",0,'R');

    $this->Cell(25,5,"Date","L,T,R",1,'L');

    $this->SetFont('Arial','',8);

    if($company_id>0)

    {

		$str="select * from emp_reversed_budget where company_id=".$company_id." order by company_id";

	}

	else

	{

		$str="select * from emp_reversed_budget order by company_id";

	}

	$result=mysql_query($str);

    while($row=mysql_fetch_array($result))

    {

		$str="select * from emp_company where company_id=".$row["company_id"]."";

		$rescompany=mysql_query($str);

		$rowcom=mysql_fetch_assoc($rescompany);

		

		$this->Cell(90,5,$rowcom["company_name"],"L,T,R,B",0,'L');

		

		$strsql="select * from emp_fin_year where year=".$row["fin_year"]."";

		$resultfin=mysql_query($strsql);

		$rowfin=mysql_fetch_assoc($resultfin); 

		

		$this->Cell(25,5,$rowfin["fin_year"],"L,T,R,B",0,'L');

		$this->Cell(25,5,$row["sales"],"L,T,R,B",0,'R');

		$this->Cell(25,5,$row["stock"],"L,T,R,B",0,'R');

		$this->Cell(25,5,date("d-m-Y",strtotime($row["edate"])),"L,T,R,B",1,'L');

	}

    

   

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