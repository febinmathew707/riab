<?php session_start(); 
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
	elseif($_SESSION['LogType']!='CO')
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
	$_SESSION["mainpage"]="addemployee";
?>
<table border="0" cellpadding="0" cellspacing="0" style="border-collapse: collapse" width="100%" id="AutoNumber2" height="30" bgcolor="#FFFFFF">
       <div id="w" align="right">
					 </div>
       
       <tr>
         <td width="100%" height="16" valign="top">
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
&nbsp;<table border="0" cellpadding="0" cellspacing="0" style="border-collapse: collapse" bordercolor="#111111" 
 id="AutoNumber4" height="163">
               
               <tr>
                 <td   height="10" valign="top" 
				 align=center>        
				 <form name="frmProfile">
				 <span id="display"></span>
				 <table border="0" cellpadding="5" cellspacing="0" style="border-collapse: collapse" bordercolor="#C0C0C0"  id="AutoNumber5" height="1">
                   <tr>
                     <td width="200" bgcolor="#FFFFFF" bordercolor="#C0C0C0" height="1" 
					 background="images/rowbg1.gif" class="txtright1">
                     First Name <font color="black">*</font>&nbsp;&nbsp;&nbsp; </td>
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
                     <td width="200" bgcolor="#FFFFFF" bordercolor="#C0C0C0" height="1" 
					 background="images/rowbg1.gif" class="txtright1">
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
                     <td width="200" bgcolor="#FFFFFF" bordercolor="#C0C0C0" height="1" 
					 background="images/rowbg1.gif" class="txtright1">
                     Date Of Birth&nbsp;&nbsp;&nbsp; </td>
                     <td width="7" bgcolor="#FFFFFF" bordercolor="#C0C0C0" height="1"
					  background="images/rowbg2.gif" align="center">
                     :</td>
                     <td width="399" bgcolor="#FFFFFF" bordercolor="#C0C0C0" height="1"
					  background="images/rowbg3.gif" class="txtleft">&nbsp;
					  <select name="cmbDay" id="cmbDay" class=combo >
                             <option value="00" selected="selected"> -- Day -- </option>
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
                             <option   value="00" selected> -- Month -- </option>
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

                             </select>&nbsp;&nbsp;&nbsp;
                             <select name="cmbYear" id="cmbYear" class=combo >
                             <option value="0000" selected="selected"> -- Year -- </option>
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
                     <td width="200" bgcolor="#FFFFFF" bordercolor="#C0C0C0" height="1" 
					 background="images/rowbg1.gif" class="txtright1">
                     Gender&nbsp;&nbsp;&nbsp; </td>
                     <td width="7" bgcolor="#FFFFFF" bordercolor="#C0C0C0" height="1" 
					 background="images/rowbg2.gif" align="center">
                     :</td>
                     <td width="399" bgcolor="#FFFFFF" bordercolor="#C0C0C0" height="1" 
					 background="images/rowbg3.gif" class="txtleft">&nbsp;
					 <input type="radio" value="male" checked name="optGender" id="optGender">male&nbsp;                         <input type="radio" value="female" name="optGender" id="optGender">Female</td>
                   </tr>
                   <tr>
                     <td width="200" bgcolor="#FFFFFF" bordercolor="#C0C0C0" height="1" 
					 background="images/rowbg1.gif" class="txtright1">
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
                     <td width="200" bgcolor="#FFFFFF" bordercolor="#C0C0C0" height="1"
					  background="images/rowbg1.gif" class="txtright1">
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
                     <td width="200" bgcolor="#FFFFFF" bordercolor="#C0C0C0" height="1"
					  background="images/rowbg1.gif" class="txtright1">
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
                     <td width="200" bgcolor="#FFFFFF" bordercolor="#C0C0C0" height="1"
					  background="images/rowbg1.gif" class="txtright1">
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
                     <td width="200" bgcolor="#FFFFFF" bordercolor="#C0C0C0" height="1" 
					 background="images/rowbg1.gif" class="txtright1">
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
                     <td width="200" bgcolor="#FFFFFF" bordercolor="#C0C0C0" height="1" 
					 background="images/rowbg1.gif" class="txtright1">
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
                     <td width="200" bgcolor="#FFFFFF" bordercolor="#C0C0C0" height="1" 
					 background="images/rowbg1.gif" class="txtright1">
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
                     <td width="200" bgcolor="#FFFFFF" bordercolor="#C0C0C0" height="1" 
					 background="images/rowbg1.gif" class="txtright1">
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
                     <td width="200" bgcolor="#FFFFFF" bordercolor="#C0C0C0" height="1" 
					 background="images/rowbg1.gif" class="txtright1">
                     Over All Experience</td>
                     <td width="7" bgcolor="#FFFFFF" bordercolor="#C0C0C0" height="1" 
					 background="images/rowbg2.gif" align="center">
                     :</td>
                     <td width="398" bgcolor="#FFFFFF" bordercolor="#C0C0C0" height="1"
					  background="images/rowbg3.gif" class="txtleft">&nbsp;
					<?php echo "<input type=text id=txtExp name=txtExp  class=txtbox size=65>"; ?></td>
                   </tr>
                   <tr>
                     <td width="200" bgcolor="#FFFFFF" bordercolor="#C0C0C0" height="1"
					  background="images/rowbg1.gif" class="txtright1">
                     Experience Current Organization&nbsp;&nbsp; </td>
                     <td width="7" bgcolor="#FFFFFF" bordercolor="#C0C0C0" height="1" 
					 background="images/rowbg2.gif" align="center">
                     :</td>
                     <td width="398" bgcolor="#FFFFFF" bordercolor="#C0C0C0" height="1"
					  background="images/rowbg3.gif" class="txtleft">&nbsp;
					  <?php echo "<input type=text id=txtCurrentExpOrg  name='txtCurrentExpOrg'
					 class=txtbox size=65>"; ?></td>
                   </tr>
                   <tr>
                     <td width="200" bgcolor="#FFFFFF" bordercolor="#C0C0C0" height="1"
					  background="images/rowbg1.gif" class="txtright1">
                     Experience Current Position&nbsp;&nbsp;&nbsp; </td>
                     <td width="7" bgcolor="#FFFFFF" bordercolor="#C0C0C0" height="1" 
					 background="images/rowbg2.gif" align="center">
                     :</td>
                     <td width="398" bgcolor="#FFFFFF" bordercolor="#C0C0C0" height="1"
					  background="images/rowbg3.gif" class="txtleft">&nbsp;
					  <?php echo "<input type=text id=txtCurrentExpPos  name='txtCurrentExpPos'
					 class=txtbox size=65>"; ?></td>
                   </tr>
                   <tr>
                     <td width="200" bgcolor="#FFFFFF" bordercolor="#C0C0C0" height="1" 
					 background="images/rowbg1.gif" class="txtright1">
                     Email <font color="black">*</font></td>
                     <td width="7" bgcolor="#FFFFFF" bordercolor="#C0C0C0" height="1" 
					 background="images/rowbg2.gif" align="center">
                     :</td>
                     <td width="398" bgcolor="#FFFFFF" bordercolor="#C0C0C0" height="1" 
					 background="images/rowbg3.gif" class="txtleft">&nbsp;
					 <?php echo "<input type=text id=txtEmail 
					  				class=txtbox size=65>"; ?></td>
                   </tr>
                   <tr>
                     <td width="200" bgcolor="#FFFFFF" bordercolor="#C0C0C0" height="1" 
					 background="images/rowbg1.gif" class="txtright1">
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
                     <td width="200" bgcolor="#FFFFFF" bordercolor="#C0C0C0" height="1" 
					 background="images/rowbg1.gif" class="txtright1">
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
                     <td width="200" bgcolor="#FFFFFF" bordercolor="#C0C0C0" height="1" 
					 background="images/rowbg1.gif" class="txtright1">
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
                     <td width="200" bgcolor="#FFFFFF" bordercolor="#C0C0C0" height="1" 
					 background="images/rowbg1.gif" class="txtright1">
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
                     <td width="200" bgcolor="#FFFFFF" bordercolor="#C0C0C0" height="1"
					  background="images/rowbg1.gif" class="txtright1">
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
                     <td width="200" bgcolor="#FFFFFF" bordercolor="#C0C0C0" height="1"
					  background="images/rowbg1.gif" class="txtright1">
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
                     <td width="200" bgcolor="#FFFFFF" bordercolor="#C0C0C0" height="1"
					  background="images/rowbg1.gif" class="txtright1">
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
                     <td width="200"  bordercolor="#C0C0C0" height="1" colspan="3" align=right>
                     	<input type="button" value="  Update  " class=button onclick="updateProfile()">
					 </td>
                   </tr>
                 </table>
                 </form>
                 </td>
               </tr>

               <tr>
                 <td   height="35" valign="top" >
				 </td>
               </tr>

             </table>
             <br>
             
             </td>
           </tr>
         </table>
         <br>
         
         </td>
       </tr>
       
     </table>