<?php session_start(); 
	if($_SESSION['Logged']!="Yes")
	{
		Header("Location: adminindex.html");
		die();
	}
	
?>

<html>
<head>


<meta http-equiv="Content-Language" content="en-us">



</head>
<body topmargin=0 leftmargin=0 marginwidth=0 marginheight=0 bgproperties="fixed"   > 

<?php
 	include("../connectdb/connect.php");
	
 	 mysql_select_db("wavesatlive",$con);
	 if(!$con)
	{
		die('Could not connect to server' . mysql_error());
	} 
	$_SESSION["profile"]=0;
	$_SESSION["page"]="programs";

?>
	
	<table border="0" cellpadding="0" cellspacing="0" 
	style="border-collapse: collapse" width="100%" id="AutoNumber3" height=465>
        
		<tr>
        	<td width="100%" valign="top" align="center">
        		  <br><br>
                  <table border="0" cellpadding="0" cellspacing="0" 
				   style="border-collapse: collapse" width="47%" id="AutoNumber3">
				   		
	        		  
					  <tr>
	        			<td width="100%" valign="top" align="center" 
						 >
							<table border="0" cellpadding="0" cellspacing="0" 
				   			style="border-collapse: collapse" width="100%" 
							   id="AutoNumber3">
							<tr>
				        		<td width="7%" valign="top" height=30></td>
								<td width="90%" valign="top" align="center" 
								class="normaltext" height=30>
				                 	From  &nbsp;&nbsp; &nbsp;&nbsp;&nbsp;:  &nbsp;&nbsp;
									 <select name="cmbFDay" id="cmbFDay">
									 <option value="1">1</option>
		  							 <option value="2">2</option>
		 							 <option value="3">3</option>
		 							 <option value="4">4</option>
		 							 <option value="5">5</option>
		 							 <option value="6">6</option>
		 							 <option value="7">7</option>
		 							 <option value="8">8</option>
		  							 <option value="9">9</option>
		  							 <option value="10">10</option>
		  							 <option value="11">11</option>
		  							 <option value="12">12</option>
		  							 <option value="13" >13</option>
		  							 <option value="14">14</option>
		  							 <option value="15">15</option>
		  							 <option value="16">16</option>
		  							 <option value="17">17</option>
		  							 <option value="18">18</option>
		 							 <option value="19">19</option>
		  							 <option value="20">20</option>
		 							 <option value="21">21</option>
		  							 <option value="22">22</option>
		  							 <option value="23">23</option>
		  							 <option value="24">24</option>
		  							 <option value="25">25</option>
		  							 <option value="26">26</option>
		  							 <option value="27">27</option>
		  							 <option value="28">28</option>
		  							 <option value="29">29</option>
		  							 <option value="30">30</option>
		  							 <option value="31">31</option>

									 </select> 
									 <select name="cmbFMonth" id="cmbFMonth">
									 <option value="01">January</option>
			  							<option value="02">February</option>
			  							<option value="03">March</option>
			   							<option value="04">April</option>
			  							<option value="05">May</option>
			  							<option value="06">June</option>
			  							<option value="07">July</option>
			  							<option value="08">August</option>
			  							<option value="09">September</option>
			  							<option value="10">October</option>
			  							<option value="11">November</option>
			  							<option value="12">December</option>
									 </select> 
									 <select name="cmbFYear" id="cmbFYear">
									 <?php 
									 	$st=date("Y");
									 	$et=$st+10;
									 	while($st<=$et)
									 	{
									 		echo"<option value=".$st.">".$st."</option>";
									 		$st=$st+1;
									 	}
									?>
									 </select> 
								</td>
							</tr>
							<tr>
				        		<td width="7%" valign="top" height=30></td>
								<td width="90%" valign="top" align="center" 
								class="normaltext" height=30>
				                 	To  &nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:  &nbsp;&nbsp;
									 <select name="cmbTDay" id="cmbTDay">
									 <option value="1">1</option>
		  							 <option value="2">2</option>
		 							 <option value="3">3</option>
		 							 <option value="4">4</option>
		 							 <option value="5">5</option>
		 							 <option value="6">6</option>
		 							 <option value="7">7</option>
		 							 <option value="8">8</option>
		  							 <option value="9">9</option>
		  							 <option value="10">10</option>
		  							 <option value="11">11</option>
		  							 <option value="12">12</option>
		  							 <option value="13" >13</option>
		  							 <option value="14">14</option>
		  							 <option value="15">15</option>
		  							 <option value="16">16</option>
		  							 <option value="17">17</option>
		  							 <option value="18">18</option>
		 							 <option value="19">19</option>
		  							 <option value="20">20</option>
		 							 <option value="21">21</option>
		  							 <option value="22">22</option>
		  							 <option value="23">23</option>
		  							 <option value="24">24</option>
		  							 <option value="25">25</option>
		  							 <option value="26">26</option>
		  							 <option value="27">27</option>
		  							 <option value="28">28</option>
		  							 <option value="29">29</option>
		  							 <option value="30">30</option>
		  							 <option value="31">31</option>

									 </select> 
									 <select name="cmbTMonth" id="cmbTMonth">
									<option value="01">January</option>
			  							<option value="02">February</option>
			  							<option value="03">March</option>
			   							<option value="04">April</option>
			  							<option value="05">May</option>
			  							<option value="06">June</option>
			  							<option value="07">July</option>
			  							<option value="08">August</option>
			  							<option value="09">September</option>
			  							<option value="10">October</option>
			  							<option value="11">November</option>
			  							<option value="12">December</option>
									 </select> 
									 <select name="cmbTYear" id="cmbTYear">
									 <?php 
									 	$st=date("Y");
									 	$et=$st+10;
									 	while($st<=$et)
									 	{
									 		echo"<option value=".$st.">".$st."</option>";
									 		$st=$st+1;
									 	}
									?>
									 </select> 
								</td>
							</tr>
				   			
							
							
							
							
							</table>
	                 			      	
						</td>
					  </tr> 
					  
					  
					  <tr>
				        	<td width="100%" valign="top" align="right" class="normaltext">
				        		"List All Videos<input type=checkbox id='chkall' 
								name='chkall'>&nbsp;&nbsp;
				        		<input type=button value="  Show  " 
								onclick="display('List Events')"> &nbsp;&nbsp;&nbsp;
								&nbsp;&nbsp;&nbsp;&nbsp;
				        		
							</td>
						</tr>		
				  </table>    	
			</td>
		</tr>
		<tr>
		<td valign="top" width=100%>
			<div id="show"></div>
		</td>
		</tr>
			
    </table>
          
                    