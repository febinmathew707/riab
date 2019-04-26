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
	elseif($_SESSION['LogType']!='MS' && $_SESSION['LogType']!='CO')
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
?>
<html>
<head>
<meta http-equiv="Content-Language" content="en-us">
<meta name="GENERATOR" content="Microsoft FrontPage 5.0">
<meta name="ProgId" content="FrontPage.Editor.Document">
<meta http-equiv="Content-Type" content="text/html; charset=windows-1252">
<title>MONTHLY REPORT ON OPERATIONS OF PUBLIC SECTOR UNITS</title>
<script src="search.js"></script>
<script src="profile.js"></script>
<script src="login.js">	</script>
<script src="update.js">	</script>
<link href="../styleSheet/employee.css" type=text/css rel=stylesheet>
<link href="../styleSheet/employee_controls.css" type=text/css rel=stylesheet>
</head>
<body topmargin=0 leftmargin=0>
<table border="0" cellpadding="0" cellspacing="0" style="border-collapse: collapse" bordercolor="#111111" width="100%">
  <tr>
    <td width="100%" align="center" valign="top">
    <table border="0" cellpadding="0" cellspacing="0" style="border-collapse: collapse" bordercolor="#111111" width="950" height="100">
      <tr>
        <td width="1000" height="33" align="center" colspan="2">MONTHLY REPORT ON OPERATIONS 
        OF PUBLIC SECTOR UNITS</td>
        
      </tr>
      <tr>
        <td width="1000" height="21" align="right" colspan="2" class="txtright1">
		<b>Logged as <font color=black><?php echo $_SESSION['user_name'] ?></font></b> &nbsp;
		 <a href="logout.php">Logout</a> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		 &nbsp;&nbsp;
		&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		 Month &amp; Year:&nbsp;
     	<select name="cmbMonth"  id="cmbMonth" class=combo1 onchange="JavaScript:dispmonthlyReport()" 
		 onclick="JavaScript:dispmonthlyReport()">
     		<option value=0> ---- select month ----- </option>
     		<option value=1> January </option>
     		<option value=2> February </option>
			<option value=3> March </option>
			<option value=4> April </option>
			<option value=5> May </option>
			<option value=6> June </option>
			<option value=7> July </option>
			<option value=8> August </option>
			<option value=9> September </option>
			<option value=10> October </option>
			<option value=11> November </option>
			<option value=12> December</option>
     	</select> &nbsp;
		 <select name="cmbYear" id="cmbYear" class=combo1 onchange="JavaScript:dispmonthlyReport()" 
		 onclick="JavaScript:dispmonthlyReport()">
				<option value=0> Financial Year </option>
				<?php
					$sql="select * from emp_fin_year order by year" ;
					$result=mysql_query($sql);
					while($row=mysql_fetch_array($result))
					{
						echo "<option value=".$row["year"].">".$row["fin_year"]."</option>";						
					}
				?>
				</select>
	  </td>
      </tr>
      
      <tr>
        <td width="1000" height="25" class="txtleft" colspan="2">Name of Unit&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 
        :&nbsp; 
		
		<select name="cmbCompany" id="cmbCompany" class=combo1 
		onchange="JavaScript:dispmonthlyReport()" onclick="JavaScript:dispmonthlyReport()">
				<option value=0>--------------------- select company ------------------------</option>
				<?php
					$sql="select * from emp_company where company_id=".$_SESSION["company_id"]."" ;
					//echo $sql;
					
					$result=mysql_query($sql);
					while($row=mysql_fetch_array($result))
					{
						echo "<option value=".$row["company_id"]." selected>".$row["company_name"]."</option>";						
					}
				?>
				</select></td>
      </tr>
      
    </table>
    </td>
  </tr>
</table>
<div id="w"></div>
<div id="disp"></div>
</body>

</html>