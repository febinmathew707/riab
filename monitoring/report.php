<?php	session_start();
	include("../connectdb/connect.php");
 	mysql_select_db("soemonit_pentaclt",$con);
	 if(!$con)
	{
		die('Could not connect to server' . mysql_error());
	} 	
	if(!isset($_SESSION['Logged']))
	{
		Header("Location: home.php");
		die();
	}
?>

<select name="cmbTemplate" id="cmbTemplate" class="combo1">
<option value="">-------------- Select Template ----------------</option>
<?php
	$strsql="select * from emp_rpt_templates";
	$result=mysql_query($strsql);
	while($row=mysql_fetch_array($result))
	{
		echo "<option value=".$row["Temp_Id"].">".$row["Temp_Desc"]."</option>";
	}
?>
</select> &nbsp;&nbsp; <input type="button" value="Print Report" class=button 
onclick="printReport(cmbTemplate.value)"> &nbsp;&nbsp; 
<a href=JavaScript:clear('report')><img src='images/delete1.png' alt='remove' border=0></a>
<br><br>
<font face="verdana" size="2"><b>Create New Template</b>
<br><br>
Type Report name &nbsp;&nbsp;<input type="text" name="txtName" id="txtName" class=txtbox size=20>
<br>
select Fields &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 
<select name="cmbField" id="cmbField" class="combo1">
<option value=""> </option>
<option value="First_Name:40">First Name</option>
<option value="Last_Name:40">Last Name</option>
<option value="Date_Of_Birth:25">Date Of Birth</option>
<option value="Sex:15">Sex</option>
<option value="Religion:25">Religion</option>
<option value="Marital_Status:25">Marital Status</option>
<option value="Area_of_Expertise:50">Area of Expertise</option>
<option value="Designation:55">Designation</option>
<option value="Qualification:65">Qaulification</option>
<option value="Dicipline:60">Dicipline</option>
<option value="Company_Name:60">Company Name</option>
<option value="Sector:40">Sector</option>
<option value="Over_All_Experience:35">Over All Experience</option>
<option value="Exp_in_Current_Org:35">Experience_in_Current Org</option>
<option value="Exp_in_Current_Pos:35">Experience_in_Current Pos</option>
<option value="Email:35">Email </option>
<option value="Cell_Phone:35">Cell Phone</option>
<option value="Home_Phone:35">Home Phone</option>
<option value="Office_Add1:40">Office Add1</option>
<option value="Office_Add2:40">Office Add2</option>
<option value="Office_Add3:40">Office Add3</option>
<option value="City:40">City</option>
<option value="Country:40">Country</option>
</select> &nbsp;<input type="button" value="Add" onclick="addField(cmbField.value)">
<br><br>

<div id="fl0"></div>
<div id="bl0"></div>
<br><input type="button" value="Create Template and Show Report" onclick="createReport()">

