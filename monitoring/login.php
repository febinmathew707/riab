<?php session_start(); ?>
<?php
 	include("../connectdb/connect.php");
 	include("../transform.php");
	$uname=$_GET["usname"];
 	$pwd=$_GET["uspass"];
 	$captcha=$_GET["captcha"];
 	$_SESSION["company_id"]=0;
	 mysql_select_db("soemonit_pentaclt",$con);
	 if(!$con)
	{
		die('Could not connect to server' . mysql_error());
	}
	
	if(strpos($uname,"@")>0)
	{//############################# RIAB USER #######################
  	$sql="SELECT * FROM employee where UserId='".$uname."'";
  //echo $sql;	
  $result=mysql_query($sql);
  $trans=new transform;  
  if(mysql_num_rows($result)<=0)
  {
	die("failed1");
  }
  while($row= mysql_fetch_array($result))
  {
   	//echo "password";
	if($trans->retrieve($row['Pwd'])==$pwd) 
   	{
		//if(strtoupper($captcha)==$_SESSION["captcha_session"])
		//{
			$_SESSION['emp_Logged']="Yes";			
				
				$_SESSION['emp_id']=$row['Auto_No'];
				$_SESSION['profileid']=$row['Auto_No'];
				$_SESSION['profilenm']=$row['First_Name'];
				$_SESSION['photo']=$row['Photo'];
				$_SESSION['type']="edit";	
					
				$_SESSION['user_name']=$uname;
				$_SESSION['pwd']=$row['Pwd'];
				$_SESSION['page']="personal";
				$_SESSION['mainpage']="productmaster";
			
				$_SESSION['errordesc']="";
				$_SESSION['Logged']="Yes";
				$_SESSION['LogType']="EM";
				echo "EM";
			break;
			
		//}
		//else
		//{
		//	echo "failed2";
		//}

	}
	else
	{
		$_SESSION['Logged']="No";
		echo "failed".$trans->retrieve($row['Pwd']);
	}
  } 
  }
  else
  {
	$sql="SELECT * FROM emp_user_setting where id=(SELECT ID FROM emp_user where UNAME='".$uname."') group by id";

  	
  $result=mysql_query($sql);
  $trans=new transform;  
  if(mysql_num_rows($result)<=0)
  {
	die("failed1 ");
  }
  while($row= mysql_fetch_array($result))
  {	
	if($trans->retrieve($row['UDESC'])==$pwd) 
   	{
		//if(strtoupper($captcha)==$_SESSION["captcha_session"])
		//{
			
			$_SESSION['emp_Logged']="Yes";	
			$_SESSION['mem_id']=$row["ID"];	
			if($row['UTYPE']=="CO" || $row['UTYPE']=="MS" || $row['UTYPE']=="HR")
			{
				
				$_SESSION["company_id"]=$row["COMPANY_ID"];
				$strsql="SELECT * FROM emp_company WHERE company_id=".$row["COMPANY_ID"]."";
				$resultCom=mysql_query($strsql);
				$rowcom=mysql_fetch_assoc($resultCom);
				$_SESSION["company"]=$rowcom["company_name"];
				$_SESSION['mainpage']="productmaster";				
			}
			elseif($row['UTYPE']=="RP")
			{
				$_SESSION["company_id"]=0;
				$_SESSION['mainpage']="fvariablelist";
			}
			else
			{
				$_SESSION["company_id"]=0;
				$_SESSION['mainpage']="companymaster";	
			}						
			echo $row["UTYPE"];
			$_SESSION['Logged']="Yes";
			$_SESSION['pwd']=$row['UDESC'];
			$_SESSION['LogType']=$row['UTYPE'];
			$_SESSION['user_name']=$uname;
			
			
		//}
		//else
		//{
		//	echo "failed captcha" . $_SESSION["captcha_session"];
		//}
	}
	else
	{
		$_SESSION['Logged']="No";
		echo "failed";
	}
}
}
 ?>