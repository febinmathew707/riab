<?php
	session_start();
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
	include("../connectdb/connect.php");
 	mysql_select_db("soemonit_pentaclt",$con);
	 if(!$con)
	{
		die('Could not connect to server' . mysql_error());
	} 
	$companyid=$_SESSION["company_id"];
	$month=$_GET["month"];
	$year=$_GET["finyear"];
	$status=$_GET["status"];
	$strsql="SELECT * FROM emp_monthly_report";
	
	
	if($companyid>0)
	{
		if(strpos($strsql,"where")===false)
		{
			$strsql=$strsql . " where company_id=".$companyid.""; 
		}
		else
		{
			$strsql=$strsql . " and company_id=".$companyid.""; 
		}
	}
	if($year!=0)
	{
		if(strpos($strsql,"where")===false)
		{
			$strsql=$strsql . " where fin_year='".$year."'"; 
		}
		else
		{
			$strsql=$strsql . " and fin_year='".$year."'"; 
		}
	}
	if($month>0)
	{
		if(strpos($strsql,"where")===false)
		{
			$strsql=$strsql . " where month=".$month.""; 
		}
		else
		{
			$strsql=$strsql . " and month=".$month.""; 
		}
	}
	if($status!="")
	{
		if(strpos($strsql,"where")===false)
		{
			$strsql=$strsql . " where status='".$status."'"; 
		}
		else
		{
			$strsql=$strsql . " and status='".$status."'"; 
		}
	}
	$strsql=$strsql." order by Rpt_id desc";
	$resultmon=mysql_query($strsql);
	if(mysql_num_rows($resultmon)==0)
	{
		echo"<font color=black size=2 face=verdana>No Matching records found</font>";
		die();
	}
	
?>
<table border="1" cellpadding="0" cellspacing="0" style="border-collapse: collapse" bordercolor="#FFFFFF" width="90%">
<tr ><td valign=middle align=center class=txtcenter1 width=60% height="25"><b>Company</b> </td> 
				 <td valign=middle align=center class=txtcenter1 width=30%><b>Report Status</b></td>
				 <td valign=middle align=center class=txtcenter1 width=10%>  </td></tr>
<?php
	while ($rowmon=mysql_fetch_array($resultmon))
	{
		$strsql="select company_name from emp_company where company_id=".$rowmon["company_id"]."";
		$result=mysql_query($strsql);
		$row=mysql_fetch_row($result);
		//echo $strsql;
		$status="";
		if($rowmon["status"]=="S")
		{
			$status="Pending";
		}
		elseif($rowmon["status"]=="R")
		{
			$status="Rejected";
		}
		elseif($rowmon["status"]=="A")
		{
			$status="Accepted";
		}
		echo"<tr><td valign=middle align=center class=txtcenter1 width=60% height=25> ".$row[0]."</td> 
				 <td valign=middle align=center class=txtcenter1 width=30%> ".$status."</td>
				 <td valign=middle align=center class=txtcenter1 width=10%> 
				 <a href='viewmonthlyreportdetails.php?id=".$rowmon["Rpt_id"]."' > view </a> </td></tr>";
	}
?>
	</table>            