<?php session_start(); ?>
<?php
 	include("../connectdb/connect.php");
	/// GET ALL PASSED VALUES IN VARIABLES
 	 mysql_select_db("soemonit_pentaclt",$con);
	 if(!$con)
	{
		die('Could not connect to server' . mysql_error());
	} 
	
	$fname=$_GET["fname"];
	$lname=$_GET["lname"];
	$dofb=$_GET["dofb"];
	$sex=$_GET["gender"];
	
	$religion=$_GET["religion"];
	$maritalstatus=$_GET["maritalstatus"];
	$area=$_GET["area"];
	$quali=$_GET["quali"];
	$desig=$_GET["desig"];
	$discipline=$_GET["discipline"];
	$company=$_GET["company"];
	$sector=$_GET["sector"];
	
	$experience=$_GET["experience"];
	$expcurrentorg=$_GET["expcurrentorg"];
	$expcurrentpos=$_GET["expcurrentpos"];
	if($experience=="")
	{
		$experience=0;
	}
	if($expcurrentorg=="")
	{
		$expcurrentorg=0;
	}
	if($expcurrentpos=="")
	{
		$expcurrentpos=0;
	}
		$email=$_GET["email"];
	$cellphone=$_GET["cellphone"];
	$homephone=$_GET["homephone"];
	$add1=$_GET["add1"];
	
	$add2=$_GET["add2"];
	$add3=$_GET["add3"];
	$city=$_GET["city"];
	$country=$_GET["country"];
	
	try
	{
		
		$r=mysql_query("SET AUTOCOMMIT=0");
		$r=mysql_query("START TRANSACTION");
		
		$strsql="INSERT INTO employee(First_Name,Last_Name,Date_Of_Birth,Sex,Religion,Marital_Status,".
				"Area_of_Expertise,Designation,Qualification,Dicipline,Company_Name,Sector,".
				"Over_All_Experience,Exp_in_Current_Org,Exp_in_Current_Pos,Email,Cell_Phone,Home_Phone,".
				"Office_Add1,Office_Add2,Office_Add3,City,Country,company_id)Values(";
		$strsql=$strsql . " '".str_replace("'","`",$fname)."',";
		$strsql=$strsql . " '".str_replace("'","`",$lname)."',";
		$strsql=$strsql . " '".str_replace("'","`",$dofb)."',";
		$strsql=$strsql . " '".str_replace("'","`",$sex)."',";
		$strsql=$strsql . " '".str_replace("'","`",$religion)."',";
		$strsql=$strsql . " '".str_replace("'","`",$maritalstatus)."',";
		$strsql=$strsql . " '".str_replace("'","`",$area)."',";
		$strsql=$strsql . " '".str_replace("'","`",$desig)."',";
		$strsql=$strsql . " '".str_replace("'","`",$quali)."',";
		$strsql=$strsql . " '".str_replace("'","`",$discipline)."',";
		$strsql=$strsql . " '".str_replace("'","`",$company)."',";
		$strsql=$strsql . " '".str_replace("'","`",$sector)."',";
		$strsql=$strsql . " ".$experience.",";
		$strsql=$strsql . " ".$expcurrentorg.",";
		$strsql=$strsql . " ".$expcurrentpos.",";
		$strsql=$strsql . " '".str_replace("'","`",$email)."',";
		$strsql=$strsql . " '".str_replace("'","`",$cellphone)."',";
		$strsql=$strsql . " '".str_replace("'","`",$homephone)."',";
		$strsql=$strsql . " '".str_replace("'","`",$add1)."',";
		$strsql=$strsql . " '".str_replace("'","`",$add2)."',";
		$strsql=$strsql . " '".str_replace("'","`",$add3)."',";
		$strsql=$strsql . " '".str_replace("'","`",$city)."',";
		$strsql=$strsql . " '".str_replace("'","`",$country)."',";
		$strsql=$strsql . " ".$_SESSION["company_id"].")";	
	
		//echo $strsql;
		if(!mysql_query($strsql))
		{
			$r=mysql_query("ROLLBACK");
			die("Sorry,Your request couldn't be completed");
		}
	
		
			$r=mysql_query("COMMIT");
			echo "profile successfully updated";
		}

	catch (Exception $e)
	{
    	$r=mysql_query("ROLLBACK");
		echo 'Caught exception: ',  $e->getMessage(), "/n";
	}
		
?>