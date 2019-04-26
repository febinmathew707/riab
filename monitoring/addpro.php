<?php session_start(); 

	include("../connectdb/connect.php");
	
 	 mysql_select_db("soemonit_pentaclt",$con);
	 if(!$con)
	{
		die('Could not connect to server' . mysql_error());
	} 
?>
<html xmlns:v="urn:schemas-microsoft-com:vml" xmlns:o="urn:schemas-microsoft-com:office:office" xmlns="http://www.w3.org/TR/REC-html40">
<head>

<meta http-equiv="Content-Language" content="en-us">


<script src="profile.js"></script> 

<title>:: WAVE SAT  :: </title>
<style type="text/css">
<!--
A:link { COLOR: black; TEXT-DECORATION: none; font-weight: normal }
A:visited { COLOR: black; TEXT-DECORATION: none; font-weight: normal }
A:active { COLOR:  #B02506; TEXT-DECORATION:none; font-weight: normal }
A:hover { COLOR:  #B02506; TEXT-DECORATION: none; font-weight: normal }
-->
</style>
<link href="../stylesheet/employee.css" type=text/css rel=stylesheet>
<link href="../stylesheet/employee_controls.css" type=text/css rel=stylesheet>
</head>
<?php

echo " <body   topmargin=0 leftmargin=0 marginwidth=0 marginheight=0 bgproperties='fixed'  
 bgcolor='#FFFFFF' > ";
$sql="SELECT * FROM  employee where Auto_No=".$_SESSION["emp_id"]."";
                 		$result=mysql_query($sql);
                 		$row=mysql_fetch_assoc($result);
?> 
 <table border="0" cellpadding="0" marginwidth=0 marginheight=0 cellspacing="0" bgcolor="#C0C0C0" style="border-collapse: collapse"  width="100%" height="100%" bgproperties="fixed" >
 <tr>
 <td width="100%"  valign=top align=center>
 

 <table border="0" cellpadding="0" marginwidth=0 marginheight=0 cellspacing="0" bgcolor="#C0C0C0" style="border-collapse: collapse"  width="1005" height="610" bgproperties="fixed" >
 <tr>
 <td width=100% height=10 valign=top align=center>
 </td>
 </tr>
 <tr>
 <td width=100% height=100% valign=top align="center">
 <table border="0" cellpadding="0" cellspacing="0" style="border-collapse: collapse" width="938" id="AutoNumber1" height="626" bordercolor="#C4E5F9">
   <tr>
     <td width="100%" valign=top align=center height="580" >
    
     <table border="0" cellpadding="0" cellspacing="0" style="border-collapse: collapse" width="100%" id="AutoNumber2" height="30" bgcolor="#C0C0C0">
       <tr>
         <td width="100%" height="37" valign="top">
         <img border="0" src="images/head.gif" width="947" height="30"></td>
       </tr>
       <tr>
         <td width="100%" height="47" background="images/link.gif">
         &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
         <span style="font-size: 9pt">&nbsp;</span><font face="Verdana" size="1"><b>&nbsp;
         </b><a href="">Home</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 
         <a href="">About</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 
         <a href="">Contact</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 
         <a href="">Members List</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 
         <a href="">Privacy Policy</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 
         <a href="">Disclaimer</a> </font><font size="1">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
         </font></td>
       </tr>
       <tr>
         <td width="100%" height="16" valign="top" background="images/bgmiddle.gif">
         <table border="0" cellpadding="0" cellspacing="0" style="border-collapse: collapse" bordercolor="#111111" width="100%" id="AutoNumber3" height="100%">
           <tr>
             <td width="5%" valign="top" align="center">&nbsp;<table border="0" cellpadding="0" cellspacing="0" style="border-collapse: collapse" bordercolor="#111111" width="90%" id="AutoNumber6" height="143">
             	
               <tr>
                 <td width="100%"  height="142" align="center" >
                 
				 
				 </td>
               </tr>
               
             </table>
             </td>
             <div id="loc" style="position: absolute; z-index: 500;left: 180px; width:400; top:170px; ; ">
			</div>
             <td width="95%" align="center" valign="top" height=200><br>
             <span id="wait">
					 </span>&nbsp;&nbsp;&nbsp;
&nbsp;<table border="0" cellpadding="0" cellspacing="0" style="border-collapse: collapse" bordercolor="#111111" width="760" id="AutoNumber4" height="163">
               <tr>
                 <td width="760" background="images/innertop.gif" height="49" valign="top">
                 
                 <table border="0" cellpadding="0" cellspacing="0" style="border-collapse: collapse" bordercolor="#111111" width="760" id="AutoNumber7" height="25">
                   <tr>
                     <td width="300"  class="heading"> Add Profile
                     </td>
					 <td width="332"  class="heading" valign=top>
					 </span>
					 </td>
                     <td width="30" valign="top" align="left"></td>
                   </tr>
                 </table>
                 </td>
               </tr>
               <tr>
                 <td width="760" background="images/innermiddle.gif" height="121" valign="top" 
				 align=center>        
				 
				 <table border="0" cellpadding="5" cellspacing="0" style="border-collapse: collapse" bordercolor="#C0C0C0" width="691" id="AutoNumber5" height="1">
                   <tr>
                     <td width="261" bgcolor="#FFFFFF" bordercolor="#C0C0C0" height="1" 
					 background="images/rowbg1.gif" class="txtright">
                     First Name&nbsp;&nbsp;&nbsp; </td>
                     <td width="7" bgcolor="#FFFFFF" bordercolor="#C0C0C0" height="1" 
					 background="images/rowbg2.gif" align="center">
                     :</td>
                     <td width="399" bgcolor="#FFFFFF" bordercolor="#C0C0C0" height="1" 
					 background="images/rowbg3.gif" class="txtleft">&nbsp;
					 	<?php echo "<input type=text id=txtFirstName 
						 class=txtbox size=65>"; ?>
					 </td>
                   </tr>
                   <tr>
                     <td width="261" bgcolor="#FFFFFF" bordercolor="#C0C0C0" height="1" 
					 background="images/rowbg1.gif" class="txtright">
                     Last Name&nbsp;&nbsp;&nbsp; </td>
                     <td width="7" bgcolor="#FFFFFF" bordercolor="#C0C0C0" height="1" 
					 background="images/rowbg2.gif" align="center">
                     :</td>
                     <td width="399" bgcolor="#FFFFFF" bordercolor="#C0C0C0" height="1" 
					 background="images/rowbg3.gif" class="txtleft">&nbsp;
					 <?php echo "<input type=text id=txtLastName 
					 class=txtbox size=65>"; ?>
					 </td>
                   </tr>
                   <tr>
                     <td width="261" bgcolor="#FFFFFF" bordercolor="#C0C0C0" height="1" 
					 background="images/rowbg1.gif" class="txtright">
                     Date Of Birth&nbsp;&nbsp;&nbsp; </td>
                     <td width="7" bgcolor="#FFFFFF" bordercolor="#C0C0C0" height="1"
					  background="images/rowbg2.gif" align="center">
                     :</td>
                     <td width="399" bgcolor="#FFFFFF" bordercolor="#C0C0C0" height="1"
					  background="images/rowbg3.gif" class="txtleft">&nbsp;
					  <select name="cmbDay" id="cmbDay" class=combo >
                             <option value="day" selected="selected"> -- Day -- </option>
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
                             &nbsp;&nbsp
                             <select name="cmbMonth" id="cmbMonth" class=combo >
                             <option   value="month" selected> -- Month -- </option>
                            <option value="January">January</option>
  							<option value="February">February</option>
  							<option value="March">March</option>
   							<option value="April">April</option>
  							<option value="May">May</option>
  							<option value="June">June</option>
  							<option value="July">July</option>
  							<option value="August">August</option>
  							<option value="September">September</option>
  							<option value="October">October</option>
  							<option value="November">November</option>
  							<option value="December">December</option>

                             </select>&nbsp;&nbsp;&nbsp;
                             <select name="cmbYear" id="cmbYear" class=combo >
                             <option value="0" selected="selected"> -- Year -- </option>
                             <option value="2000">2000</option>
							 <option value="1999">1999</option>
							<option value="1998">1998</option>
							 <option value="1997">1997</option>
							 <option value="1996">1996</option>
							 <option value="1995">1995</option>
							 <option value="1994">1994</option>
							 <option value="1993">1993</option>
							 <option value="1992">1992</option>
							 <option value="1991">1991</option>
							 <option value="1990">1990</option>
                             <option value="1989">1989</option>
  							 <option value="1988">1988</option>
  							 <option value="1987">1987</option>
  							 <option value="1986">1986</option>
 							 <option value="1985">1985</option>
							  <option value="1984" >1984</option>
 							 <option value="1983">1983</option>
 							 <option value="1982">1982</option>
  							 <option value="1981">1981</option>
  							 <option value="1980">1980</option>
  							 <option value="1979">1979</option>
  							 <option value="1978">1978</option>
  							<option value="1977">1977</option>
  							 <option value="1976">1976</option>
  							<option value="1975">1975</option>
  							<option value="1974">1974</option>
  							<option value="1973">1973</option>
  							<option value="1972">1972</option>
  							<option value="1971">1971</option>
  							<option value="1970">1970</option>
  							<option value="1969">1969</option>
  							<option value="1968">1968</option>
  							<option value="1967">1967</option>
  							<option value="1966">1966</option>
  							<option value="1965">1965</option>
  							<option value="1964">1964</option>
  							<option value="1963">1963</option>
  							<option value="1962">1962</option>
  							<option value="1961">1961</option>
  							<option value="1960">1960</option>
  							<option value="1959">1959</option>
  							<option value="1958">1958</option>
  							<option value="1957">1957</option>
  							<option value="1956">1956</option>
  							<option value="1955">1955</option>
  							<option value="1954">1954</option>
  							<option value="1953">1953</option>
  							<option value="1952">1952</option>
  							<option value="1951">1951</option>
  							<option value="1950">1950</option>
  							<option value="1949">1949</option>
  							<option value="1948">1948</option>
							<option value="1947">1947</option>
							<option value="1946">1946</option>
							<option value="1945">1945</option>
							<option value="1944">1944</option>
							<option value="1943">1943</option>
							<option value="1942">1942</option>
							<option value="1941">1941</option>
							<option value="1940">1940</option>
							<option value="1939">1939</option>
							<option value="1938">1938</option>
							<option value="1937">1937</option>
							<option value="1936">1936</option>
							<option value="1935">1935</option>
							<option value="1934">1934</option>
							<option value="1933">1933</option>
							<option value="1932">1932</option>
							<option value="1931">1931</option>
							<option value="1930">1930</option>
							<option value="1929">1929</option>
							<option value="1928">1928</option>
							<option value="1927">1927</option>
							<option value="1926">1926</option>
							<option value="1925">1925</option>
							<option value="1924">1924</option>
							<option value="1923">1923</option>
							<option value="1922">1922</option>
							<option value="1921">1921</option>
							<option value="1920">1920</option>
							<option value="1919">1919</option>
							<option value="1918">1918</option>
							<option value="1917">1917</option>
							<option value="1916">1916</option>
							<option value="1915">1915</option>
							<option value="1914">1914</option>
							<option value="1913">1913</option>
							<option value="1912">1912</option>
							<option value="1911">1911</option>
							<option value="1910">1910</option>							
                             </select>

					  </td>
                   </tr>
                   <tr>
                     <td width="261" bgcolor="#FFFFFF" bordercolor="#C0C0C0" height="1" 
					 background="images/rowbg1.gif" class="txtright">
                     Gender&nbsp;&nbsp;&nbsp; </td>
                     <td width="7" bgcolor="#FFFFFF" bordercolor="#C0C0C0" height="1" 
					 background="images/rowbg2.gif" align="center">
                     :</td>
                     <td width="399" bgcolor="#FFFFFF" bordercolor="#C0C0C0" height="1" 
					 background="images/rowbg3.gif" class="txtleft">&nbsp;
					 <input type="radio" value="male" checked name="optGender" id="optGender">male&nbsp;                         <input type="radio" value="female" name="optGender" id="optGender">Female</td>
                   </tr>
                   <tr>
                     <td width="261" bgcolor="#FFFFFF" bordercolor="#C0C0C0" height="1" 
					 background="images/rowbg1.gif" class="txtright">
                     Religion&nbsp;&nbsp;&nbsp; </td>
                     <td width="7" bgcolor="#FFFFFF" bordercolor="#C0C0C0" height="1" 
					 background="images/rowbg2.gif" align="center">
                     :</td>
                     <td width="399" bgcolor="#FFFFFF" bordercolor="#C0C0C0" height="1"
					  background="images/rowbg3.gif" class="txtleft">&nbsp;
					  <?php echo "<input type=text id=txtReligion 
					  class=txtbox size=65>"; ?>
					  </td>
                   </tr>
                   <tr>
                     <td width="261" bgcolor="#FFFFFF" bordercolor="#C0C0C0" height="1"
					  background="images/rowbg1.gif" class="txtright">
                     Marital Status&nbsp;&nbsp;&nbsp; </td>
                     <td width="7" bgcolor="#FFFFFF" bordercolor="#C0C0C0" height="1" 
					 background="images/rowbg2.gif" align="center">
                     :</td>
                     <td width="399" bgcolor="#FFFFFF" bordercolor="#C0C0C0" height="1"
					  background="images/rowbg3.gif" class="txtleft">&nbsp;
				<?php echo "<input type=text id=txtMaritalStatus 
						class=txtbox size=65>"; ?>
					  </td>
                   </tr>
                   <tr>
                     <td width="261" bgcolor="#FFFFFF" bordercolor="#C0C0C0" height="1"
					  background="images/rowbg1.gif" class="txtright">
                     Area of Expertise&nbsp;&nbsp;&nbsp; </td>
                     <td width="7" bgcolor="#FFFFFF" bordercolor="#C0C0C0" height="1" 
					 background="images/rowbg2.gif" align="center">
                     :</td>
                     <td width="399" bgcolor="#FFFFFF" bordercolor="#C0C0C0" height="1"
					  background="images/rowbg3.gif" class="txtleft">&nbsp;
					  <?php echo "<input type=text id=txtArea 
					  				class=txtbox size=65>"; ?>
					  </td>
                   </tr>
                   <tr>
                     <td width="261" bgcolor="#FFFFFF" bordercolor="#C0C0C0" height="1"
					  background="images/rowbg1.gif" class="txtright">
                     Qualification&nbsp;&nbsp;&nbsp; </td>
                     <td width="7" bgcolor="#FFFFFF" bordercolor="#C0C0C0" height="1"
					  background="images/rowbg2.gif" align="center">
                     :</td>
                     <td width="399" bgcolor="#FFFFFF" bordercolor="#C0C0C0" height="1" 
					 background="images/rowbg3.gif" class="txtleft">&nbsp;
					 <?php echo "<input type=text id=txtQuali 
					 		class=txtbox size=65>"; ?></td>
                   </tr>
                   <tr>
                     <td width="261" bgcolor="#FFFFFF" bordercolor="#C0C0C0" height="1" 
					 background="images/rowbg1.gif" class="txtright">
                     Designation</td>
                     <td width="7" bgcolor="#FFFFFF" bordercolor="#C0C0C0" height="1" 
					 background="images/rowbg2.gif" align="center">
                     :</td>
                     <td width="398" bgcolor="#FFFFFF" bordercolor="#C0C0C0" height="1" 
					 background="images/rowbg3.gif" class="txtleft">&nbsp;
					 <?php echo "<input type=text id=txtDesignation 
					 class=txtbox size=65>"; ?></td>
                   </tr>
                   <tr>
                     <td width="261" bgcolor="#FFFFFF" bordercolor="#C0C0C0" height="1" 
					 background="images/rowbg1.gif" class="txtright">
                     Discipline&nbsp;&nbsp; </td>
                     <td width="7" bgcolor="#FFFFFF" bordercolor="#C0C0C0" height="1" 
					 background="images/rowbg2.gif" align="center">
                     :</td>
                     <td width="398" bgcolor="#FFFFFF" bordercolor="#C0C0C0" height="1" 
					 background="images/rowbg3.gif" class="txtleft">&nbsp;
					 <?php echo "<input type=text id=txtDiscipline 
					 class=txtbox size=65>"; ?></td>
                   </tr>
                   <tr>
                     <td width="261" bgcolor="#FFFFFF" bordercolor="#C0C0C0" height="1" 
					 background="images/rowbg1.gif" class="txtright">
                     Company&nbsp;&nbsp;&nbsp; </td>
                     <td width="7" bgcolor="#FFFFFF" bordercolor="#C0C0C0" height="1"
					  background="images/rowbg2.gif" align="center">
                     :</td>
                     <td width="398" bgcolor="#FFFFFF" bordercolor="#C0C0C0" height="1"
					  background="images/rowbg3.gif" class="txtleft">&nbsp;
					  <?php echo "<input type=text id=txtCompany 
					 class=txtbox size=65>"; ?></td>
                   </tr>
                   <tr>
                     <td width="261" bgcolor="#FFFFFF" bordercolor="#C0C0C0" height="1" 
					 background="images/rowbg1.gif" class="txtright">
                     Sector&nbsp;&nbsp; </td>
                     <td width="7" bgcolor="#FFFFFF" bordercolor="#C0C0C0" height="1" 
					 background="images/rowbg2.gif" align="center">
                     :</td>
                     <td width="398" bgcolor="#FFFFFF" bordercolor="#C0C0C0" height="1" 
					 background="images/rowbg3.gif" class="txtleft">&nbsp;
					 <?php echo "<input type=text id=txtSector 
					 class=txtbox size=65>"; ?></td>
                   </tr>
                   <tr>
                     <td width="261" bgcolor="#FFFFFF" bordercolor="#C0C0C0" height="1" 
					 background="images/rowbg1.gif" class="txtright">
                     Over All Experience</td>
                     <td width="7" bgcolor="#FFFFFF" bordercolor="#C0C0C0" height="1" 
					 background="images/rowbg2.gif" align="center">
                     :</td>
                     <td width="398" bgcolor="#FFFFFF" bordercolor="#C0C0C0" height="1"
					  background="images/rowbg3.gif" class="txtleft">&nbsp;
					<?php echo "<input type=text id=txtExperience 
					 class=txtbox size=65>"; ?></td>
                   </tr>
                   <tr>
                     <td width="261" bgcolor="#FFFFFF" bordercolor="#C0C0C0" height="1"
					  background="images/rowbg1.gif" class="txtright">
                     Experience Current Organization&nbsp;&nbsp; </td>
                     <td width="7" bgcolor="#FFFFFF" bordercolor="#C0C0C0" height="1" 
					 background="images/rowbg2.gif" align="center">
                     :</td>
                     <td width="398" bgcolor="#FFFFFF" bordercolor="#C0C0C0" height="1"
					  background="images/rowbg3.gif" class="txtleft">&nbsp;
					  <?php echo "<input type=text id=txtCurrentExpOrg 
					 class=txtbox size=65>"; ?></td>
                   </tr>
                   <tr>
                     <td width="261" bgcolor="#FFFFFF" bordercolor="#C0C0C0" height="1"
					  background="images/rowbg1.gif" class="txtright">
                     Experience Current Position&nbsp;&nbsp;&nbsp; </td>
                     <td width="7" bgcolor="#FFFFFF" bordercolor="#C0C0C0" height="1" 
					 background="images/rowbg2.gif" align="center">
                     :</td>
                     <td width="398" bgcolor="#FFFFFF" bordercolor="#C0C0C0" height="1"
					  background="images/rowbg3.gif" class="txtleft">&nbsp;
					  <?php echo "<input type=text id=txtCurrentExpPos 
					 class=txtbox size=65>"; ?></td>
                   </tr>
                   <tr>
                     <td width="261" bgcolor="#FFFFFF" bordercolor="#C0C0C0" height="1" 
					 background="images/rowbg1.gif" class="txtright">
                     Email</td>
                     <td width="7" bgcolor="#FFFFFF" bordercolor="#C0C0C0" height="1" 
					 background="images/rowbg2.gif" align="center">
                     :</td>
                     <td width="398" bgcolor="#FFFFFF" bordercolor="#C0C0C0" height="1" 
					 background="images/rowbg3.gif" class="txtleft">&nbsp;
					 <?php echo "<input type=text id=txtEmail 
					  				class=txtbox size=65>"; ?></td>
                   </tr>
                   <tr>
                     <td width="261" bgcolor="#FFFFFF" bordercolor="#C0C0C0" height="1" 
					 background="images/rowbg1.gif" class="txtright">
                     CellPhone&nbsp;&nbsp; </td>
                     <td width="7" bgcolor="#FFFFFF" bordercolor="#C0C0C0" height="1" 
					 background="images/rowbg2.gif" align="center">
                     :</td>
                     <td width="398" bgcolor="#FFFFFF" bordercolor="#C0C0C0" height="1" 
					 background="images/rowbg3.gif" class="txtleft">&nbsp;
					 <?php echo "<input type=text id=txtCellPhone 
					  				class=txtbox size=65>"; ?></td>
                   </tr>
                   <tr>
                     <td width="261" bgcolor="#FFFFFF" bordercolor="#C0C0C0" height="1" 
					 background="images/rowbg1.gif" class="txtright">
                     Home Phone&nbsp;&nbsp;&nbsp; </td>
                     <td width="7" bgcolor="#FFFFFF" bordercolor="#C0C0C0" height="1"
					  background="images/rowbg2.gif" align="center">
                     :</td>
                     <td width="398" bgcolor="#FFFFFF" bordercolor="#C0C0C0" height="1"
					  background="images/rowbg3.gif" class="txtleft">&nbsp;
					  <?php echo "<input type=text id=txtHomePhone 
					  				class=txtbox size=65>"; ?></td>
                   </tr>
                   <tr>
                     <td width="261" bgcolor="#FFFFFF" bordercolor="#C0C0C0" height="1" 
					 background="images/rowbg1.gif" class="txtright">
                     Office Address1&nbsp;&nbsp; </td>
                     <td width="7" bgcolor="#FFFFFF" bordercolor="#C0C0C0" height="1" 
					 background="images/rowbg2.gif" align="center">
                     :</td>
                     <td width="398" bgcolor="#FFFFFF" bordercolor="#C0C0C0" height="1" 
					 background="images/rowbg3.gif" class="txtleft">&nbsp;
					 <?php echo "<input type=text id=txtAdd1 
					  				class=txtbox size=65>"; ?></td>
                   </tr>
                   <tr>
                     <td width="261" bgcolor="#FFFFFF" bordercolor="#C0C0C0" height="1" 
					 background="images/rowbg1.gif" class="txtright">
                     Office Address2</td>
                     <td width="7" bgcolor="#FFFFFF" bordercolor="#C0C0C0" height="1" 
					 background="images/rowbg2.gif" align="center">
                     :</td>
                     <td width="398" bgcolor="#FFFFFF" bordercolor="#C0C0C0" height="1"
					  background="images/rowbg3.gif" class="txtleft">&nbsp;
					  <?php echo "<input type=text id=txtAdd2 
					  				class=txtbox size=65>"; ?></td>
                   </tr>
                   <tr>
                     <td width="261" bgcolor="#FFFFFF" bordercolor="#C0C0C0" height="1"
					  background="images/rowbg1.gif" class="txtright">
                     Office Address3&nbsp;&nbsp; </td>
                     <td width="7" bgcolor="#FFFFFF" bordercolor="#C0C0C0" height="1" 
					 background="images/rowbg2.gif" align="center">
                     :</td>
                     <td width="398" bgcolor="#FFFFFF" bordercolor="#C0C0C0" height="1"
					  background="images/rowbg3.gif" class="txtleft">&nbsp;
					  <?php echo "<input type=text id=txtAdd3 
					  				class=txtbox size=65>"; ?></td>
                   </tr>
                   <tr>
                     <td width="261" bgcolor="#FFFFFF" bordercolor="#C0C0C0" height="1"
					  background="images/rowbg1.gif" class="txtright">
                     City&nbsp;&nbsp;&nbsp; </td>
                     <td width="7" bgcolor="#FFFFFF" bordercolor="#C0C0C0" height="1" 
					 background="images/rowbg2.gif" align="center">
                     :</td>
                     <td width="398" bgcolor="#FFFFFF" bordercolor="#C0C0C0" height="1"
					  background="images/rowbg3.gif" class="txtleft">&nbsp;
					  <?php echo "<input type=text id=txtCity 
					  				class=txtbox size=65>"; ?></td>
                   </tr>
                   <tr>
                     <td width="261" bgcolor="#FFFFFF" bordercolor="#C0C0C0" height="1"
					  background="images/rowbg1.gif" class="txtright">
                     Country&nbsp;&nbsp;&nbsp; </td>
                     <td width="7" bgcolor="#FFFFFF" bordercolor="#C0C0C0" height="1" 
					 background="images/rowbg2.gif" align="center">
                     :</td>
                     <td width="398" bgcolor="#FFFFFF" bordercolor="#C0C0C0" height="1"
					  background="images/rowbg3.gif" class="txtleft">&nbsp;
					  <?php echo "<input type=text id=txtCountry 
					  				class=txtbox size=65>"; ?></td>
                   </tr>
                   <tr>
                     <td width="261"  bordercolor="#C0C0C0" height="1" colspan="3" align=right>
                     	<input type="button" value="  Update  " class=button onclick="updatePersonal()">
					 </td>
                   </tr>
                 </table>
                 </td>
               </tr>

               <tr>
                 <td width="760" background="images/innerbottom.gif" height="35" valign="top" >
				 <span id="wait1"></span></td>
               </tr>

             </table>
             </td>
           </tr>
         </table>
         </td>
       </tr>
       <tr>
         <td width="100%" height="68" valign="top" background="images/bottom.gif">
         &nbsp;</td>
       </tr>
     </table>
    
     </td>
   </tr>
   
 </table>
 </td>
 </tr>
 </table>
 </td>
 </tr>
 </table>
</body>
</html>